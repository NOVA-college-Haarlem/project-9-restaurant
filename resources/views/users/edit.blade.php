<x-app-layout>
    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gebruiker bewerken</title>
        <style>
           
        </style>
    </head>

    <body>
        <div class="edit-user-container">
            <h1 class="edit-user-title">Gebruiker bewerken</h1>

            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name" class="form-label">Naam:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <div class="form-group">
                    <label for="role" class="form-label">Rol:</label>
                    <select name="role" id="role" class="form-control form-control-select">
                        <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                        <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>

                <button type="submit" class="submit-btn">Opslaan</button>
            </form>
        </div>
    </body>

    </html>
</x-app-layout>