<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Edit') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">


<form method="POST" class="max-w-sm mx-auto" action=".">
  @csrf
  @method('PUT')
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Name
      </label>
    </div>
    <div class="md:w-2/3">
      <span class="text-gray-700">{{ $user->name }}</span>
    </div>
  </div>
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Email
      </label>
    </div>
    <div class="md:w-2/3">
      <span class="text-gray-700">{{ $user->email }}</span>
    </div>
  </div>
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
        Password
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight placeholder-gray-400 focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" type="password" placeholder="***" name="password">
    </div>
  </div>
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-quota">
        Quota (in MB)
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight placeholder-gray-400 focus:outline-none focus:bg-white focus:border-purple-500" id="inline-quota" type="text" pattern="^-?\d*\.?\d+$" name="quota" placeholder="{{ $user->quota > 0 ? $user->quota/1048576 : $user->quota }}" title="请输入数值">
    </div>
  </div>

  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-quota">
        Expire at (UTC)
      </label>
    </div>
    <div class="md:w-2/3">

      <div class="relative max-w-sm">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
          </svg>
        </div>
        <input id="expire_picker" type="text" name="expire_at" class="bg-gray-50 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight placeholder-gray-400 focus:outline-none focus:bg-white focus:border-purple-500 ps-10" placeholder="{{ $user->expire_at->format('Y-m-d H:i')}}">
      </div>

    </div>
  </div>

  <div class="md:flex md:items-center">
    <div class="md:w-1/3"></div>
    <div class="md:w-2/3">
      <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </div>
  </div>

</form>

            </div>
        </div>
    </div>

@push('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
      var expire_picker = document.getElementById('expire_picker');
      
      flatpickr(expire_picker, {
          enableTime: true,
          time_24hr: true,
          defaultDate: "{{ $user->expire_at }}",
      });
  });

</script>
@endpush

</x-app-layout>