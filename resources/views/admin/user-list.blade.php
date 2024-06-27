<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users Manage') }}
        </h2>
    </x-slot>

<!--     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">

                @include('human-read')

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Is Admin
                                </th>
                                <th scope="col" class="px-6 py-3" title="每月限额">
                                    Quota
                                </th>
                                <th scope="col" class="px-6 py-3" title="当月剩余">
                                    Remain
                                </th>
                                <th scope="col" class="px-6 py-3" title="当月下载">
                                    Download
                                </th>
                                <th scope="col" class="px-6 py-3" title="当月上传">
                                    Upload
                                </th>
                                <th scope="col" class="px-6 py-3" title="全部下载">
                                    Total Download
                                </th>
                                <th scope="col" class="px-6 py-3" title="全部上传">
                                    Total Upload
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @php
                                    list($quota, $download, $upload, $remain) = human_string($user->quota, $user->download, $user->upload);
                                @endphp
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-rose-100 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $user-> is_admin ? 'True' : 'False'}}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $quota }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $remain }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $download }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $upload }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ human($user->total_download + $user->download) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ human($user->total_upload+ $user->upload) }}
                                </td>
                                <td class="flex items-center px-6 py-4">
                                    <a href="{{ route('admin.users.edit', ['user'=>$user->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $users->links() }}

            </div>
        </div>
    </div>



</x-app-layout>
