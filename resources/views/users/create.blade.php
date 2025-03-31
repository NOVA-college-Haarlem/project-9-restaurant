<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe Gebruiker Toevoegen</title>
</head>

<body>
    <h1>Nieuwe Gebruiker Toevoegen</h1>

    @if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label>Naam:</label>
        <input type="text" name="name" required>
        <br>

        <label>Email:</label>
        <input type="email" name="email" required>
        <br>

        <label>Wachtwoord:</label>
        <input type="password" name="password" required>
        <br>

        <label>Bevestig Wachtwoord:</label>
        <input type="password" name="password_confirmation" required>
        <br>

        <label>Rol:</label>
        <select name="role" required>
            <option value="customer">Customer</option>
            <option value="staff">Staff</option>
            <option value="admin">Admin</option>
        </select>
        <br>

        <button type="submit">Gebruiker Aanmaken</button>
    </form>
</body>

</html>