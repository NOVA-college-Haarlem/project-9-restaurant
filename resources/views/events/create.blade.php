

@section('content')
<h1>Create Event</h1>

<form action="{{ route('events.store') }}" method="POST">
    @csrf
    <label>Title</label>
    <input type="text" name="title" required>

    <label>Description</label>
    <textarea name="description" required></textarea>

    <label>Event Date</label>
    <input type="date" name="event_date" required>

    <button type="submit">Create Event</button>
</form>

