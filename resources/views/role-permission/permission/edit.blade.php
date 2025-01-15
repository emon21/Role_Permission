<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Permission') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto  lg:px-7 pb-7 bg-gray-200 rounded-lg my-5">
        <div class="flex justify-between py-3">
            <h4 class="py-3 text-lg font-semibold">Edit Permission</h4>
            <a href="{{ route('permission.index') }}"
                class="border border-white bg-blue-500 text-white px-2 py-3 rounded transition-all duration-300 ease-linear">
                Back Permission</a>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-gray-900">
                <form class="my-3 px-4" action="{{ route('permission.update', $permission) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-5">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full"
                            placeholder="Name..." required name="name" value="{{ $permission->name }}" />
                    </div>

                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update Permission</button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
