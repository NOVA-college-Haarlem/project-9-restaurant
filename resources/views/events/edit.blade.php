
<h1>Edit Event</h1>

<form action="{{ route('events.update', $event->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Title</label>
    <input type="text" name="title" value="{{ $event->title }}" required>

    <label>Description</label>
    <textarea name="description" required>{{ $event->description }}</textarea>

    <label>Event Date</label>
    <input type="date" name="event_date" value="{{ $event->event_date }}" required>
    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Bewerken</a>

    <button type="submit">Update Event</button>
</form>

