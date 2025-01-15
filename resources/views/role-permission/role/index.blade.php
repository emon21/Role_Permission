<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role Management') }}
        </h2>
    </x-slot>

    @if(session('success'))
    <div class="px-2 py-5 text-lg font-semibold text-center text-green-700">{{ session('success') }}</div>
    @endif
    
    <div class="max-w-7xl mx-auto  lg:px-7 pb-7 bg-gray-200 rounded-lg my-5">
        <div class="flex justify-between py-3">
            <h4 class="py-3 text-lg font-semibold">Role</h4>
            <a href="{{ route('role.create') }}"
                class="border border-white bg-blue-500 text-white px-2 py-3 rounded transition-all duration-300 ease-linear">
                Add Role</a>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-gray-900">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 border-b">
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
                        @forelse ($roles as $role)
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->index + 1 }}
                                </th>
                                <td class="px-6 py-4 capitalize">
                                    {{ $role->name }}
                                </td>

                                <td class="px-6 py-4 flex gap-3">
                                    <a href="{{ route('role.edit', $role->id) }}"
                                        class="font-medium text-white bg-green-500 hover:bg-green-700 transition-all duration-300 ease-in-out px-1.5 py-2 rounded">Edit</a>

                                    <form action="{{ route('role.destroy', $role->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="font-medium text-white bg-red-500 hover:bg-red-700 transition-all duration-300 ease-in-out px-1.5 py-2 rounded">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @empty

                            <td colspan="3">
                                <div class="text-red-600 text-lg text-center fond-semibold px-2 py-4">No Data
                                    Found</span>
                            </td>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
