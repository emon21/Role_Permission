<x-app-layout>

    <div class="w-10/12 mx-auto bg-gray-100 my-3 rounded-lg">
        <div class="flex justify-between py-3 px-2">
            <h4 class="py-3 text-lg font-semibold">Create Permission</h4>
            <a href="{{ route('permission.index') }}" class="bg-red-600 text-white px-2 py-3 rounded">
                Go Back</a>
        </div>
        <hr>
        <div class="px-3 py-2 my-5">

            <form class="max-w-sm mx-auto" action="{{ route('permission.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Name..." required name="name" />
                </div>


                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Permission</button>
            </form>


        </div>
    </div>



</x-app-layout>
