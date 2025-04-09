<x-app-layout>
    <div class="max-w-2xl mx-auto px-6 py-8 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-semibold text-amber-600 mb-6">Edit Event</h1>

        <form action="{{ route('events.update', $event->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-gray-700 font-semibold">Title</label>
                <input type="text" name="title" id="title" value="{{ $event->title }}" required class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-transparent">
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-semibold">Description</label>
                <textarea name="description" id="description" required class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-transparent" rows="4">{{ $event->description }}</textarea>
            </div>

            <div>
                <label for="event_date" class="block text-gray-700 font-semibold">Event Date</label>
                <input type="date" name="event_date" id="event_date" value="{{ $event->event_date }}" required class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600 focus:border-transparent">
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('events.index') }}" class="text-amber-600 hover:text-amber-700 font-semibold transition-colors">Back to Events</a>
                <button type="submit" class="bg-amber-600 text-white py-3 px-6 rounded-lg hover:bg-amber-700 transition-colors">
                    Update Event
                </button>
            </div>
        </form>
    </div>
</x-app-layout>