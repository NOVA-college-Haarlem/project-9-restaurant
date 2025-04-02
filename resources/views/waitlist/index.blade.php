<div class="container">
    <h2>Wachtlijst</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulier om klant toe te voegen -->
    <form action="{{ route('waitlist.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">Klant</label>
            <select class="form-control" id="user_id" name="user_id" required>
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
            <input type="number" class="form-control" id="estimated_wait_time" name="estimated_wait_time" required
                min="1">
        </div>
        <button type="submit" class="btn btn-primary">Voeg Klant Toe</button>
    </form>

    <hr>

    <!-- Wachtlijst Tabel -->
    <h3>Wachtende Klanten</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Naam</th>
                <th scope="col">Aantal Personen</th>
                <th scope="col">Geschatte Wachttijd</th>
                <th scope="col">Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($waitlists as $waitlist)
                <tr>
                    <td>{{ $waitlist->user->name }}</td>  <!-- Toegang tot de user naam via relatie -->
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
