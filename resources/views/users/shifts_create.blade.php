@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe Shift Toevoegen</title>
</head>

<body>
    <h1>Nieuwe Shift Toevoegen</h1>

    <form action="{{ route('shifts.store', $user) }}" method="POST">
        @csrf

        <div>
            <label for="user_id">Medewerker:</label>
            <select name="user_id" id="user_id" required>
                @foreach($staff as $staffMember)
                <option value="{{ $staffMember->id }}" {{ $staffMember->id == $user->id ? 'selected' : '' }}>
                    {{ $staffMember->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="start_time">Starttijd:</label>
            <input type="datetime-local" name="start_time" id="start_time" required>
        </div>

        <div>
            <label for="end_time">Eindtijd:</label>
            <input type="datetime-local" name="end_time" id="end_time" required>
        </div>

        <button type="submit">Shift Opslaan</button>
    </form>

    <a href="{{ route('shifts.user', $user) }}">Terug naar shifts</a>
</body>

</html>
@endsection