<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users Manage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">

                @include('human-read')

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-3 py-3">
                                    <div class="flex items-center">
                                        #
                                        <a href="{{ route('admin.users.index', ['sort_by' => 'id', 'sort_direction' => request('sort_direction') === 'asc' ? 'desc' : 'asc']) }}">
                                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-3 py-3">
                                    <div class="flex items-center">
                                        Name
                                        <a href="{{ route('admin.users.index', ['sort_by' => 'name', 'sort_direction' => request('sort_direction') === 'asc' ? 'desc' : 'asc']) }}">
                                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-3 py-3">
                                    <div class="flex items-center">
                                        Email
                                        <a href="{{ route('admin.users.index', ['sort_by' => 'email', 'sort_direction' => request('sort_direction') === 'asc' ? 'desc' : 'asc']) }}">
                                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-3 py-3">
                                    <div class="flex items-center">
                                        Admin
                                        <a href="{{ route('admin.users.index', ['sort_by' => 'is_admin', 'sort_direction' => request('sort_direction') === 'asc' ? 'desc' : 'asc']) }}">
                                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-3 py-3" title="到期时间">
                                    <div class="flex items-center">
                                        Expire
                                        <a href="{{ route('admin.users.index', ['sort_by' => 'expire_at', 'sort_direction' => request('sort_direction') === 'asc' ? 'desc' : 'asc']) }}">
                                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-3 py-3" title="每月限额">
                                    <div class="flex items-center">
                                        Quota
                                        <a href="{{ route('admin.users.index', ['sort_by' => 'quota', 'sort_direction' => request('sort_direction') === 'asc' ? 'desc' : 'asc']) }}">
                                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-3 py-3" title="当月剩余">
                                    Remain
                                </th>
                                <th scope="col" class="px-3 py-3" title="当月下载">
                                    <div class="flex items-center">
                                        Download
                                        <a href="{{ route('admin.users.index', ['sort_by' => 'download', 'sort_direction' => request('sort_direction') === 'asc' ? 'desc' : 'asc']) }}">
                                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-3 py-3" title="当月上传">
                                    <div class="flex items-center">
                                        Upload
                                        <a href="{{ route('admin.users.index', ['sort_by' => 'upload', 'sort_direction' => request('sort_direction') === 'asc' ? 'desc' : 'asc']) }}">
                                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-3 py-3" title="全部下载">
                                    <div class="flex items-center">
                                        Total Download
                                        <a href="{{ route('admin.users.index', ['sort_by' => 'total_download', 'sort_direction' => request('sort_direction') === 'asc' ? 'desc' : 'asc']) }}">
                                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-3 py-3" title="全部上传">
                                    <div class="flex items-center">
                                        Total Upload
                                        <a href="{{ route('admin.users.index', ['sort_by' => 'total_upload', 'sort_direction' => request('sort_direction') === 'asc' ? 'desc' : 'asc']) }}">
                                            <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </th>
                                <th scope="col" class="px-3 py-3">
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
                                <th scope="row" class="px-3 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->id }}
                                </th>
                                <td class="px-3 py-3">
                                    {{ $user->name }}
                                </td>
                                <td class="px-3 py-3">
                                    {{ $user->email }}
                                </td>
                                <td class="px-3 py-3">
                                    {{ $user-> is_admin ? 'True' : 'False'}}
                                </td>
                                <td class="px-3 py-3 {{\Carbon\Carbon::parse($user->expire_at)->isPast() ? 'expired' : 'not-expired'}}">
                                    {{ $user->expire_at }}
                                </td>
                                <td class="px-3 py-3">
                                    {{ $quota }}
                                </td>
                                <td class="px-3 py-3">
                                    {{ $remain }}
                                </td>
                                <td class="px-3 py-3">
                                    {{ $download }}
                                </td>
                                <td class="px-3 py-3">
                                    {{ $upload }}
                                </td>
                                <td class="px-3 py-3">
                                    {{ human($user->total_download + $user->download) }}
                                </td>
                                <td class="px-3 py-3">
                                    {{ human($user->total_upload+ $user->upload) }}
                                </td>
                                <td class="flex items-center px-3 py-3">
                                    <a href="{{ route('admin.users.edit', ['user'=>$user->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $users->appends(request()->except('page'))->links() }}

            </div>
        </div>
    </div>

@push('scripts')
<style type="text/css">
.expired {
/*    text-decoration: line-through;*/
}
.expired::after {
    content: "!";
    color: red;
    font-weight: bold;
    margin-left: 2px;
}
</style>
@endpush

</x-app-layout>
