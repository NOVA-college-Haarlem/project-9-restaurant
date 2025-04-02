<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wachtlijst Status</title>
</head>
<body>
    <h1>Jouw Wachtlijst Status</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <p><strong>Positie in de rij:</strong> {{ $position }}</p>
    <p><strong>Geschatte wachttijd:</strong> {{ $entry->estimated_wait_time }} minuten</p>

    <form action="{{ route('waitlist.leave') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ $entry->user_id }}">
        <button type="submit">Verwijder mij van de wachtlijst</button>
    </form>
</body>
</html>
