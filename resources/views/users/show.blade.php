<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details van {{ $user->name }}</title>
</head>

<body>
    <h1>Details van {{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>
    <p>Rol: {{ ucfirst($user->role) }}</p>
    <p>Totale gewerkte uren: {{ $hours }} uur en {{ $minutes }} minuten</p>

    <h2>Toegewezen shifts</h2>
    @if($user->shifts->isEmpty())
    <p>Geen shifts toegewezen.</p>
    @else
    <table border="1">
        <tr>
            <th>Datum</th>
            <th>Starttijd</th>
            <th>Eindtijd</th>
        </tr>
        @foreach ($user->shifts as $shift)
        <tr>
            <td>{{ $shift->start_time->format('Y-m-d') }}</td>
            <td>{{ $shift->start_time->format('H:i') }}</td>
            <td>{{ $shift->end_time->format('H:i') }}</td>
        </tr>
        @endforeach
    </table>
    @endif

    <a href="{{ route('users.index') }}">Terug naar gebruikerslijst</a>
</body>

</html>