<x-app-layout>
    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wachtlijst Beheer</title>
        <style>
            
        </style>
    </head>

    <body>
        <div class="waitlist-container">
            <h1 class="waitlist-title">Wachtlijst</h1>

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Formulier om klant toe te voegen -->
            <form action="{{ route('waitlist.store') }}" method="POST" class="waitlist-form">
                @csrf
                <div class="mb-3">
                    <label for="user_id" class="form-label">Klant</label>
                    <select class="form-control form-control-select" id="user_id" name="user_id" required>
                        <option value="">Selecteer een klant</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="party_size" class="form-label">Aantal Personen</label>
                    <input type="number" class="form-control" id="party_size" name="party_size" required min="1">
                </div>
                <div class="mb-3">
                    <label for="estimated_wait_time" class="form-label">Geschatte Wachttijd (in minuten)</label>
                    <input type="number" class="form-control" id="estimated_wait_time" name="estimated_wait_time" required min="1">
                </div>
                <button type="submit" class="btn btn-primary">Voeg Klant Toe</button>
            </form>

            <hr class="divider">

            <!-- Wachtlijst Tabel -->
            <h3 class="section-title">Wachtende Klanten</h3>
            <table class="waitlist-table">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Aantal Personen</th>
                        <th>Geschatte Wachttijd</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($waitlists as $waitlist)
                        <tr>
                            <td>{{ $waitlist->user->name }}</td>
                            <td>{{ $waitlist->party_size }}</td>
                            <td>{{ $waitlist->estimated_wait_time }} minuten</td>
                            <td>
                                <!-- Verwijderen van klant -->
                                <form action="{{ route('waitlist.destroy', $waitlist->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Verwijder</button>
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