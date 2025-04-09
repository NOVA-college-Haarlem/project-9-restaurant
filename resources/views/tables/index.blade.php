<x-app-layout>
    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tafelbeheer</title>
        <style>
           
        </style>
    </head>

    <body>
        <div class="table-management-container">
            <h1 class="page-title">Tafelbeheer</h1>

            <a href="{{ route('tables.create') }}" class="add-btn">
                Nieuwe Tafel Toevoegen
            </a>

            @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
            @endif

            <table class="tables-table">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Capaciteit</th>
                        <th>Status</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tables as $table)
                    <tr>
                        <td>{{ $table->name }}</td>
                        <td>{{ $table->capacity }} personen</td>
                        <td>
                            <span class="status-badge status-{{ $table->status }}">
                                {{ ucfirst($table->status) }}
                            </span>
                        </td>
                        <td class="action-buttons">
                            <a href="{{ route('tables.edit', $table) }}" class="action-btn edit-btn">Bewerken</a>
                            <form action="{{ route('tables.destroy', $table) }}" method="POST" class="action-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete-btn">Verwijderen</button>
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