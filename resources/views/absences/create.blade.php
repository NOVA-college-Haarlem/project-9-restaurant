<x-app-layout>
<div class="container">
    <h1>Afwezigheid registreren</h1>

    <form method="POST" action="{{ route('absences.store') }}">
        @csrf

        <div class="form-group">
            <label for="user_id">Medewerker</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Selecteer een medewerker</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">Startdatum</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="end_date">Einddatum</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="reason">Reden (optioneel)</label>
            <textarea name="reason" id="reason" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
</x-app-layout>