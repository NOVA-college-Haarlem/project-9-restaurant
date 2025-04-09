<x-app-layout>
    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Check Jouw Loyalty Punten</title>
        <style>
            
        </style>
    </head>

    <body>
        <div class="loyalty-container">
            <h1 class="loyalty-title">Check Jouw Loyalty Punten</h1>

            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('loyalty.check') }}" method="POST" class="loyalty-form">
                @csrf
                <input type="email" name="email" placeholder="Jouw E-mail" required class="form-control">
                <button type="submit" class="submit-btn">Bekijk Mijn Punten</button>
            </form>
        </div>
    </body>

    </html>
</x-app-layout>