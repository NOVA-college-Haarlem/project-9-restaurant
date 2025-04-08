<x-app-layout>
<div class="container">
    <h1>Tafel Bewerken</h1>

    <form action="{{ route('tables.update', $table) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Naam</label>
            <input type="text" name="name" class="form-control" value="{{ $table->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Capaciteit</label>
            <input type="number" name="capacity" class="form-control" value="{{ $table->capacity }}" min="1" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="available" {{ $table->status == 'available' ? 'selected' : '' }}>Beschikbaar</option>
                <option value="occupied" {{ $table->status == 'occupied' ? 'selected' : '' }}>Bezet</option>
                <option value="reserved" {{ $table->status == 'reserved' ? 'selected' : '' }}>Gereserveerd</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
</x-app-layout>