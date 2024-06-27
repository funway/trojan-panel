@include('human-read')

@php
list($quota, $download, $upload, $remain) = human_string(Auth::user()->quota, Auth::user()->download, Auth::user()->upload);
@endphp
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            个人信息
        </h2>

    </header>

<div class="grid grid-cols-2 gap-4 px-2 w-full">
    <div class="flex flex-col items-start justify-center rounded-2xl bg-white bg-clip-border px-3 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
        <p class="text-sm text-gray-600">Name</p>
        <p class="text-base font-medium text-navy-700 dark:text-white">
            {{ Auth::user()->name }}
        </p>
    </div>

    <div class="flex flex-col justify-center rounded-2xl bg-white bg-clip-border px-3 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
        <p class="text-sm text-gray-600">Email</p>
        <p class="text-base font-medium text-navy-700 dark:text-white">
            {{ Auth::user()->email }}
        </p>
    </div>

    <div class="flex flex-col items-start justify-center rounded-2xl bg-white bg-clip-border px-3 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
    <p class="text-sm text-gray-600">剩余流量</p>
    <p class="text-base font-medium text-navy-700 dark:text-white">
        {{ $remain }}
    </p>
    </div>

    <div class="flex flex-col justify-center rounded-2xl bg-white bg-clip-border px-3 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
    <p class="text-sm text-gray-600">每月限额</p>
    <p class="text-base font-medium text-navy-700 dark:text-white">
        {{ $quota }}
    </p>
    </div>

    <div class="flex flex-col items-start justify-center rounded-2xl bg-white bg-clip-border px-3 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
    <p class="text-sm text-gray-600">当月下载</p>
    <p class="text-base font-medium text-navy-700 dark:text-white">
        {{ $download }}
    </p>
    </div>

    <div class="flex flex-col justify-center rounded-2xl bg-white bg-clip-border px-3 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
    <p class="text-sm text-gray-600">当月上传</p>
    <p class="text-base font-medium text-navy-700 dark:text-white">
        {{ $upload }}
    </p>
    </div>

    <div class="flex flex-col items-start justify-center rounded-2xl bg-white bg-clip-border px-3 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
    <p class="text-sm text-gray-600">至今下载</p>
    <p class="text-base font-medium text-navy-700 dark:text-white">
        {{ human(Auth::user()->total_download + Auth::user()->download) }}
    </p>
    </div>

    <div class="flex flex-col justify-center rounded-2xl bg-white bg-clip-border px-3 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
    <p class="text-sm text-gray-600">至今上传</p>
    <p class="text-base font-medium text-navy-700 dark:text-white">
        {{ human(Auth::user()->total_upload + Auth::user()->upload) }}
    </p>
    </div>
</div>


</section>
