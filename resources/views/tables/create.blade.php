<x-app-layout>
<div class="container">
    <h1>Nieuwe Tafel Toevoegen</h1>

    <form action="{{ route('tables.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Naam</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Capaciteit</label>
            <input type="number" name="capacity" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="available">Beschikbaar</option>
                <option value="occupied">Bezet</option>
                <option value="reserved">Gereserveerd</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
</x-app-layout>