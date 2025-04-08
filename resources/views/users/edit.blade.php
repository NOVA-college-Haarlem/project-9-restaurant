<x-app-layout>
    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gebruiker bewerken</title>
    </head>

    <body>
        <h1>Gebruiker bewerken</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Naam:</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required>

            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required>

            <label for="role">Rol:</label>
            <select name="role" id="role">
                <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>

            <button type="submit">Opslaan</button>
        </form>
    </body>

    </html>
</x-app-layout>