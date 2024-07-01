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
                            (到期时间: {{ Auth::User()->expire_at}} UTC)
                        </span>
                    </div>
                    <div class="mt-2">
                        <span class="bg-gray-200 px-2 py-1 rounded-md select-all">
                        {{ route('subscription.address', ['uid'=>Auth::User()->id, 'subscription_token'=>Auth::User()->subscription_token]) }}
                        </span>
                    </div>

                    <p class="mt-2 text-sm font-normal text-gray-500 dark:text-gray-400">
                        将订阅地址添加到您的梯子 App  (推荐使用 
                            <a href="https://apps.apple.com/us/app/shadowrocket/id932747118" target="_blank" rel="noopener noreferrer" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Shadowrocket</a>), App 会自动添加以及更新 VPN 节点.
                    </p>

                    <div class="mt-2">
                        <button id="btnCopySub" class="bg-blue-500 hover:bg-blue-700 text-white px-2 mr-1 rounded">
                            续订
                        </button>
                        <button id="btnRefreshSub" class="bg-red-500 hover:bg-red-700 text-white px-2 mx-1 rounded" data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                            重置
                        </button>
                    </div>

                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        VPN 节点
                        @if (Auth::user()->isAdmin())
                            <button class="bg-green-500 hover:bg-green-700 text-white px-2 ms-2 rounded text-base font-normal" onclick="window.location.href='{{ route('admin.nodes.create') }}';">
                                新增
                            </button>
                        @endif
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

                                    @if (Auth::user()->isAdmin())
                                    <a href="{{ route('admin.nodes.edit', ['node'=>$node->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline ms-3">Edit</a>

                                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                                    @endif
                                </td>
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

<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">重置订阅地址, 先前的订阅地址将会失效. 确定?</h3>
                <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center" onclick="window.location.href='{{ route('subscription.reset', ['field'=>'addr']) }}';">
                    Yes, I'm sure
                </button>
                <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script type="text/javascript">

</script>
@endpush

</x-app-layout>
