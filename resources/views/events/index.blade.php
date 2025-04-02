
<h1>Special Events</h1>
<a href="{{ route('events.create') }}">Create New Event</a>

<table>
    <tr>
        <th>Title</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    @foreach ($events as $event)
    <tr>
        <td>{{ $event->title }}</td>
        <td>{{ $event->event_date }}</td>
        <td>
            <a href="{{ route('events.edit', $event->id) }}">Edit</a>
            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

