<x-app-layout>
    <style>
        
    </style>

    <div class="absence-form-container">
        <h1 class="absence-form-title">Afwezigheid Registreren</h1>

        <form method="POST" action="{{ route('absences.store') }}">
            @csrf

            <div class="form-group">
                <label for="user_id" class="form-label">Medewerker</label>
                <select name="user_id" id="user_id" class="form-control form-control-select" required>
                    <option value="">Selecteer een medewerker</option>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="start_date" class="form-label">Startdatum</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="end_date" class="form-label">Einddatum</label>
                <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="reason" class="form-label">Reden (optioneel)</label>
                <textarea name="reason" id="reason" class="form-control form-control-textarea" rows="3"></textarea>
            </div>

            <button type="submit" class="submit-btn">Afwezigheid Opslaan</button>
        </form>
    </div>
</x-app-layout>