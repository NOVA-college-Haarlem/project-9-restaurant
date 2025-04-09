<x-app-layout>
    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gebruikerslijst</title>
        <style>
            
        </style>
    </head>

    <body>
        <div class="users-container">
            <div class="users-header">
                <h1 class="users-title">Gebruikerslijst</h1>
                <a href="{{ route('users.create') }}" class="create-btn">+ Maak gebruiker aan</a>
            </div>

            <div class="filter-links">
                <a href="{{ route('users.index') }}" class="filter-link {{ !request('role') ? 'active' : '' }}">Alle</a>
                <a href="{{ route('users.index', ['role' => 'admin']) }}" class="filter-link {{ request('role') === 'admin' ? 'active' : '' }}">Alleen Admins</a>
                <a href="{{ route('users.index', ['role' => 'staff']) }}" class="filter-link {{ request('role') === 'staff' ? 'active' : '' }}">Alleen Staff</a>
                <a href="{{ route('users.index', ['role' => 'customer']) }}" class="filter-link {{ request('role') === 'customer' ? 'active' : '' }}">Alleen Customers</a>
            </div>

            <table class="users-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Naam</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="role-badge 
                                @if($user->role === 'admin') role-admin
                                @elseif($user->role === 'staff') role-staff
                                @else role-customer
                                @endif">
                                {{ $user->role }}
                            </span>
                        </td>
                        <td class="action-links">
                            <a href="{{ route('users.edit', $user->id) }}" class="action-link">Bewerken</a>
                            @if($user->role === 'staff' || $user->role === 'admin')
                            <a href="{{ route('users.show', $user->id) }}" class="action-link">Details</a>
                            @endif
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?')">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>

    </html>
</x-app-layout>