<x-app-layout>
    <div class="max-w-2xl mx-auto px-6 py-8 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-semibold text-amber-600 mb-6">Create Event</h1>

        <form action="{{ route('events.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-gray-700 font-semibold">Title</label>
                <input type="text" name="title" id="title" required class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-transparent">
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-semibold">Description</label>
                <textarea name="description" id="description" required class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-transparent" rows="4"></textarea>
            </div>

            <div>
                <label for="event_date" class="block text-gray-700 font-semibold">Event Date</label>
                <input type="date" name="event_date" id="event_date" required class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-transparent">
            </div>

            <div>
                <button type="submit" class="w-full bg-amber-600 text-white py-3 rounded-lg hover:bg-amber-700 transition-colors">
                    Create Event
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
