<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <div class="text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        我的订阅
                        <span class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                            (过期时间: {{ Auth::User()->expire_at}} UTC)
                        </span>
                    </div>
                    <div class="mt-1">
                        <span class="bg-gray-200 px-2 py-1 rounded-md select-all">
                        {{ route('subscription', ['uid'=>Auth::User()->id, 'subscription_token'=>Auth::User()->subscription_token]) }}
                        </span>
                    </div>
                    <div class="my-2">
                        <button id="btnCopySub" class="bg-blue-500 hover:bg-blue-700 text-white px-2 mr-1 rounded">
                            复制
                        </button>
                        <button id="btnRefreshSub" class="bg-red-500 hover:bg-red-700 text-white px-2 mx-1 rounded">
                            重置
                        </button>
                        <button id="btnSubscribe" class="bg-green-500 hover:bg-green-700 text-white px-2 mx-1 rounded">
                            续订
                        </button>
                    </div>

                    <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">
                        将订阅地址添加到您的梯子 App  (推荐使用 
                            <a href="https://apps.apple.com/us/app/shadowrocket/id932747118" target="_blank" rel="noopener noreferrer" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Shadowrocket</a>), App 会自动添加以及更新 VPN 节点.
                    </p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        VPN 节点
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">如不使用订阅地址，你可以手动将节点添加到您的梯子 App.
                        </p>
                        </caption>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3" title="协议类型">
                                    Type
                                </th>
                                <th scope="col" class="px-6 py-3" title="节点名">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3" title="地址">
                                    Host
                                </th>
                                <th scope="col" class="px-6 py-3" title="端口">
                                    Port
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nodes as $node)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-rose-100 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $node->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $node->type }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $node->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $node->host }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $node->port }}
                                </td>
                                <td class="flex items-center px-6 py-4">
                                    <a href="{{ route('node.qrcode', $node->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">二维码</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $nodes->links() }}

            </div>
        </div>
    </div>



<div class="w-full max-w-[16rem]">
    <div class="relative">
        <label for="npm-install-copy-button" class="sr-only">Label</label>
        <input id="npm-install-copy-button" type="text" class="col-span-6 bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="npm install flowbite" disabled readonly>
        <button data-copy-to-clipboard-target="npm-install-copy-button" data-tooltip-target="tooltip-copy-npm-install-copy-button" class="absolute end-2 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg p-2 inline-flex items-center justify-center">
            <span id="default-icon">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                    <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"/>
                </svg>
            </span>
            <span id="success-icon" class="hidden inline-flex items-center">
                <svg class="w-3.5 h-3.5 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                </svg>
            </span>
        </button>
        <div id="tooltip-copy-npm-install-copy-button" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            <span id="default-tooltip-message">Copy to clipboard</span>
            <span id="success-tooltip-message" class="hidden">Copied!</span>
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

<script type="text/javascript">
    
const clipboard = FlowbiteInstances.getInstance('CopyClipboard', 'npm-install-copy-button');
const tooltip = FlowbiteInstances.getInstance('Tooltip', 'tooltip-copy-npm-install-copy-button');

const $defaultIcon = document.getElementById('default-icon');
const $successIcon = document.getElementById('success-icon');

const $defaultTooltipMessage = document.getElementById('default-tooltip-message');
const $successTooltipMessage = document.getElementById('success-tooltip-message');

clipboard.updateOnCopyCallback((clipboard) => {
    showSuccess();

    // reset to default state
    setTimeout(() => {
        resetToDefault();
    }, 2000);
})

const showSuccess = () => {
    $defaultIcon.classList.add('hidden');
    $successIcon.classList.remove('hidden');
    $defaultTooltipMessage.classList.add('hidden');
    $successTooltipMessage.classList.remove('hidden');    
    tooltip.show();
}

const resetToDefault = () => {
    $defaultIcon.classList.remove('hidden');
    $successIcon.classList.add('hidden');
    $defaultTooltipMessage.classList.remove('hidden');
    $successTooltipMessage.classList.add('hidden');
    tooltip.hide();
}

</script>

</x-app-layout>
