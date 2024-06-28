<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            节点<span class="bg-sky-500 rounded text-white px-1 py-1 mx-1"> {{ $node->name }} </span>的二维码
        </h2>
    </x-slot>

<div class="py-12">
    <div class="bg-white rounded-lg shadow-lg max-w-sm mx-auto">
        <img src="{{ $qrCodeSvg }}" alt="Sample Image" class="rounded-t-lg w-full">
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-2">注意</h2>
            <p class="text-gray-700">添加节点后，请手动修改密码
            </p>
            <p class="text-gray-700">密码格式是<span class="bg-sky-500 rounded text-white px-1 py-1 mx-1">用户名:网站密码</span>
            </p>
        </div>
    </div>
</div>


</x-app-layout>
