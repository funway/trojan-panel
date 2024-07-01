<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($node) ? __('Node Edit') : __('Node Create')}}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">

<form method="POST" class="mx-auto" action="{{ $action }}">
  @csrf
  @if($method === 'PUT')
    @method('PUT')
  @endif
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-5/12">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Id
      </label>
    </div>
    <div class="md:w-3/12">
      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight placeholder-gray-400 disabled:cursor-not-allowed" type="text" placeholder="#" value="{{ $node->id ?? '#' }}" disabled>
    </div>
    <div class="md:w-4/12 text-red-500 ps-3">
    </div>
  </div>

  <div class="md:flex md:items-center mb-6">
    <div class="md:w-5/12">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Name
      </label>
    </div>
    <div class="md:w-3/12">
      <input class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight placeholder-gray-400 focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="name" name="name" value="{{ $node->name ?? ''}}" required>
    </div>
    <div class="md:w-4/12 text-red-500 ps-3">
      @error('name')
        {{ $message }}
      @enderror
    </div>
  </div>

  <div class="md:flex md:items-center mb-6">
    <div class="md:w-5/12">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Type
      </label>
    </div>
    <div class="md:w-3/12">
      <select name="type" class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight placeholder-gray-400 focus:outline-none focus:bg-white focus:border-purple-500">
        <option value="trojan" selected>Trojan</option>
        <!-- <option value="vmess">Vmess</option> -->
      </select>
    </div>
    <div class="md:w-4/12 text-red-500 ps-3">
    </div>
  </div>

  <div class="md:flex md:items-center mb-6">
    <div class="md:w-5/12">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Host
      </label>
    </div>
    <div class="md:w-3/12">
      <input class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight placeholder-gray-400 focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="ip or domain" name="host" value="{{ $node->host ?? ''}}" required>
    </div>
    <div class="md:w-4/12 text-red-500 ps-3">
      @error('host')
        {{ $message }}
      @enderror
    </div>
  </div>

  <div class="md:flex md:items-center mb-6">
    <div class="md:w-5/12">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Port
      </label>
    </div>
    <div class="md:w-3/12">
      <input class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight placeholder-gray-400 focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="8443" name="port" pattern="[1-9]\d*" value="{{ $node->port ?? ''}}" required title="请输入正整数">
    </div>
    <div class="md:w-4/12 text-red-500 ps-3">
      @error('port')
        {{ $message }}
      @enderror
    </div>
  </div>

  <div class="md:flex md:items-center">
    <div class="md:w-5/12"></div>
    <div class="md:w-3/12">
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </div>
    <div class="md:w-4/12 text-red-500 ps-3">
    </div>
  </div>
</form>

            </div>
        </div>
    </div>

@push('scripts')
@endpush

</x-app-layout>