
<x-app-layout>

   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ __('Update Role') }}
      </h2>
   </x-slot>

   @if(session('status'))
      <div class="px-2 py-5 text-lg font-semibold text-center text-green-700">{{ session('status') }}</div>
   @endif

   <div class="max-w-7xl mx-auto  lg:px-7 pb-7 bg-gray-200 rounded-lg my-5">
      <div class="flex justify-between py-3">
         <h4 class="py-3 text-lg font-semibold">Role : {{ $role->name }}</h4>
         <a href="{{ route('role.index') }}"
            class="border border-white bg-blue-500 text-white px-2 py-3 rounded transition-all duration-300 ease-linear">
            Back Role</a>
      </div>

      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
         <div class="text-gray-900">
            <form class="my-3 px-4" action="{{ url('role/' . $role->id . '/give-permission') }}" method="POST">
               @csrf
               @method('PUT')
               <div class="mb-5">
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permissions : </label>
                  <div class="flex items-center gap-2 mb-4">
                     @foreach ($permissions as $permission)
                     <input id="{{ $permission->id }}" type="checkbox" value="{{ $permission->name }}"
                     class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2 ">
                     <label for="{{ $permission->id }}" class="px-2 text-sm font-medium text-gray-900 ">
                     {{ $permission->name }}</label>
                @endforeach
                  </div>

               </div>

               <button type="submit"
                  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  Update</button>
            </form>
         </div>
      </div>
   </div>

</x-app-layout>

