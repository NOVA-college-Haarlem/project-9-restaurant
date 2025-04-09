<x-app-layout>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe Tafel Toevoegen</title>
    <style>
        
    </style>
</head>
<body>
    <div class="table-form-container">
        <h1 class="form-title">Nieuwe Tafel Toevoegen</h1>

        <form action="{{ route('tables.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label">Naam</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label class="form-label">Capaciteit</label>
                <input type="number" name="capacity" class="form-control" min="1" required>
            </div>

            <div class="form-group">
                <label class="form-label">Status</label>
                <select name="status" class="form-control form-control-select">
                    <option value="available">Beschikbaar</option>
                    <option value="occupied">Bezet</option>
                    <option value="reserved">Gereserveerd</option>
                </select>
            </div>

            <button type="submit" class="submit-btn">Opslaan</button>
        </form>
    </div>
</body>
</html>
</x-app-layout>