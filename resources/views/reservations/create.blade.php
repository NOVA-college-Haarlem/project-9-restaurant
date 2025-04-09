<x-app-layout>
    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Maak een reservering</title>
        
    </head>

    <body>
        <div class="reservation-container">
            <h2 class="reservation-title">Maak een reservering</h2>

            @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="date" class="form-label">Datum en Tijd</label>
                    <input type="datetime-local" id="date" name="date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="guests" class="form-label">Aantal gasten</label>
                    <input type="number" id="guests" name="guests" class="form-control" min="1" required>
                </div>

                <div class="form-group">
                    <label for="requests" class="form-label">Speciale verzoeken</label>
                    <textarea id="requests" name="requests" class="form-control" rows="3"></textarea>
                </div>

                <button type="submit" class="submit-btn">Reserveren</button>
            </form>
        </div>
    </body>

    </html>
</x-app-layout>