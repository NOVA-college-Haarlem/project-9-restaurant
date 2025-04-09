<x-app-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-4xl font-semibold text-amber-600 flex-grow">Special Events</h1>
            <a href="{{ route('events.create') }}" class="bg-amber-600 text-white px-6 py-3 rounded-lg hover:bg-amber-700 transition-colors text-lg">
                Create New Event
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full border-collapse text-left table-auto">
                <thead>
                    <tr class="bg-amber-100">
                        <th class="px-6 py-4 text-gray-700 text-sm font-semibold">Title</th>
                        <th class="px-6 py-4 text-gray-700 text-sm font-semibold">Date</th>
                        <th class="px-6 py-4 text-gray-700 text-sm font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-gray-800">{{ $event->title }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $event->event_date }}</td>
                        <td class="px-6 py-4 space-x-4">
                            <a href="{{ route('events.edit', $event->id) }}" class="text-amber-600 hover:text-amber-800 transition-colors text-sm font-semibold">Edit</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 transition-colors text-sm font-semibold">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>