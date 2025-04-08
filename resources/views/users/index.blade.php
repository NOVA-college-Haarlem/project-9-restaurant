<x-app-layout>
    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gebruikerslijst</title>
        <style>
            .action-links {
                display: flex;
                gap: 5px;
            }

            .action-links form {
                margin: 0;
            }
        </style>
    </head>

    <body>
        <h1>Gebruikerslijst</h1>

        <div>
            <a href="{{ route('users.index') }}">Alle</a> |
            <a href="{{ route('users.index', ['role' => 'staff']) }}">Alleen Staff</a> |
            <a href="{{ route('users.index', ['role' => 'customer']) }}">Alleen Customers</a>
        </div>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acties</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td class="action-links">
                    <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                    @if($user->role === 'staff')
                    | <a href="{{ route('users.show', $user->id) }}">Details</a>
                    @endif
                    |
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?')">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </table>
    </body>

    </html>
</x-app-layout>