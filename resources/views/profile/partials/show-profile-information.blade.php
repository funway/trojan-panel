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

<div class="grid grid-cols-4 gap-2 px-2 w-full">
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

    <div class="flex flex-col justify-center rounded-2xl bg-white bg-clip-border px-3 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
    <p class="text-sm text-gray-600">到期时间</p>
    <p class="text-base font-medium text-navy-700 dark:text-white">
        {{ Auth::user()->expire_at }}
        <button id="btnCopySub" class="bg-blue-500 hover:bg-blue-700 text-white px-2 ml-3 rounded">
            续订
        </button>
    </p>
    </div>

    <div class="flex flex-col justify-center rounded-2xl bg-white bg-clip-border px-3 shadow-3xl shadow-shadow-500 dark:!bg-navy-700 dark:shadow-none">
    <p class="text-sm text-gray-600">Trojan Token</p>
    <p class="text-base font-medium text-navy-700 dark:text-white">
        {{ Auth::user()->trojan_token }}
        <button id="btnCopySub" class="bg-red-500 hover:bg-red-700 text-white px-2 ml-3 rounded" data-modal-target="popup-modal" data-modal-toggle="popup-modal" >
            重置
        </button>
    </p>
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
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">重置 Token, 之前手工添加的节点将会失效<br>(不影响使用订阅地址添加的节点). 确定?</h3>
                <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center" onclick="window.location.href='{{ route('subscription.reset', ['field'=>'trojan']) }}';">
                    Yes, I'm sure
                </button>
                <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
            </div>
        </div>
    </div>
</div>


</section>
