<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wachtlijst - Toevoegen</title>
</head>
<body>
    <h1>Voeg jezelf toe aan de wachtlijst</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('waitlist.join') }}" method="POST">
        @csrf
        <label>Gebruiker ID:</label>
        <input type="number" name="user_id" required>
        <br>

        <label>Aantal personen:</label>
        <input type="number" name="party_size" required min="1">
        <br>

        <button type="submit">Toevoegen</button>
    </form>

    <a href="{{ route('waitlist.status', ['user_id' => 1]) }}">Bekijk mijn status</a>
</body>
</html>
