<x-app-layout>
    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tafel Bewerken</title>
        <style>
            
        </style>
    </head>

    <body>
        <div class="edit-table-container">
            <h1 class="edit-title">Tafel Bewerken</h1>

            <form action="{{ route('tables.update', $table) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Naam</label>
                    <input type="text" name="name" class="form-control" value="{{ $table->name }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Capaciteit</label>
                    <input type="number" name="capacity" class="form-control" value="{{ $table->capacity }}" min="1" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-control form-control-select">
                        <option value="available" {{ $table->status == 'available' ? 'selected' : '' }} class="status-option-available">Beschikbaar</option>
                        <option value="occupied" {{ $table->status == 'occupied' ? 'selected' : '' }} class="status-option-occupied">Bezet</option>
                        <option value="reserved" {{ $table->status == 'reserved' ? 'selected' : '' }} class="status-option-reserved">Gereserveerd</option>
                    </select>
                </div>

                <button type="submit" class="submit-btn">Opslaan</button>
            </form>
        </div>
    </body>

    </html>
</x-app-layout>