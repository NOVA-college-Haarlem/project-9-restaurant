<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create New Shift
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('shifts.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-700">Date:</label>
                            <input type="date" name="date" id="date" required min="{{ now()->format('Y-m-d') }}"
                                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div>
                                <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time:</label>
                                <input type="time" name="start_time" id="start_time" required
                                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="end_time" class="block text-sm font-medium text-gray-700">End Time:</label>
                                <input type="time" name="end_time" id="end_time" required
                                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-8">
                            <a href="{{ route('shifts.index') }}"
                                class="text-sm text-blue-600 hover:text-blue-800 hover:underline">
                                Back to shifts
                            </a>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Create Shift
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>