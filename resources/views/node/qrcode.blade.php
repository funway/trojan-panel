<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Node's QRCode
        </h2>
    </x-slot>

<div class="py-12">
    <div class="bg-white rounded-lg shadow-lg max-w-sm mx-auto">
        <img src="{{ $qrCodeSvg }}" alt="QRCode" class="rounded-t-lg w-full">
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-2"><span class="bg-blue-500 hover:bg-blue-700 rounded text-white px-1"> {{ $node->name }} </span></h2>
            <p class="text-gray-700">
                {{ $node->host }}
            </p>
        </div>
    </div>
</div>

</x-app-layout>
