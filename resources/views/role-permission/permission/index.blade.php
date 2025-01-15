<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permission') }}
        </h2>
    </x-slot>

    {{-- @section('content')
        <div class="bg-gray-400 w-full py-4">
            <div class="mx-auto bg-green-500 w-10/12">
                <div class="flex justify-between py-3 px-2">
                    <h4 class="py-3 text-lg font-semibold">Permission</h4>
                    <a href="{{ route('permission.create') }}"
                        class="border border-white hover:bg-blue-700 text-white px-2 py-3 rounded transition-all duration-300 ease-linear">Add
                        Permission</a>
                </div>
                <hr>
                <div class=" px-3 py-2">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Natus, dignissimos.
                </div>
            </div>
        </div>
    @endsection --}}

    <div class="w-10/12 mx-auto bg-green-500 my-3 rounded-lg">
        @if (session('success'))
            <div class="text-lg px-3 py-2 text-white">{{ session('success') }}</div>
        @endif
        <div class="flex justify-between py-3 px-2">
            <h4 class="py-3 text-lg font-semibold">Permission</h4>
            <a href="{{ route('permission.create') }}"
                class="border border-white hover:bg-blue-700 text-white px-2 py-3 rounded transition-all duration-300 ease-linear">Add
                Permission</a>
        </div>
        <hr>
        <div class=" px-3 py-2">


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b">
                        <tr class="divide-x divide-gray-300">
                            <th scope="col" class="px-6 py-3">
                                #Sl No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                     @forelse ($permissions as $permission)
                         <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->index + 1 }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $permission->name }}
                            </td>
                           
                            <td class="px-6 py-4">
                                <a href="#"
                                    class="font-medium text-white bg-green-500 hover:bg-green-700 transition-all duration-300 ease-in-out px-1.5 py-2 rounded">Edit</a> |
                                     <a href="#"
                                    class="font-medium text-white bg-red-500 hover:bg-red-700 transition-all duration-300 ease-in-out px-1.5 py-2 rounded">Delete</a>
                            </td>
                        </tr>
                     @empty
                     <span>No Data Found</span>
                         
                     @endforelse
                        

                    </tbody>
                </table>
            </div>

        </div>
    </div>



</x-app-layout>
