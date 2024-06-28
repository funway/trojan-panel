<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        VPN 节点
                        <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">请手动添加到您的梯子 App. (推荐使用 
                            <a href="https://apps.apple.com/us/app/shadowrocket/id932747118" target="_blank" rel="noopener noreferrer" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Shadowrocket</a>)
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
</x-app-layout>
