<x-app-layout>
    <x-slot name="header">Gebruiksgeschiedenis: {{ $ingredient->name }}</x-slot>

    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gebruiksgeschiedenis: {{ $ingredient->name }}</title>
        <style>
            
        </style>
    </head>

    <body>
        <div class="usage-container">
            <h1 class="usage-title">Gebruiksgeschiedenis: {{ $ingredient->name }}</h1>

            <div class="stock-info">
                <span class="stock-label">Huidige voorraad:</span>
                <span class="stock-value">{{ $ingredient->stock_quantity }}</span>
            </div>

            <form method="POST" action="{{ route('ingredients.reduce-stock', $ingredient) }}" class="usage-form">
                @csrf
                <input name="amount_used" type="number" min="1" 
                       placeholder="Hoeveel gebruikt?" required 
                       class="amount-input" />
                <button type="submit" class="submit-btn">Afboeken</button>
            </form>

            <h2 class="history-title">Gebruikshistorie</h2>
            <ul class="usage-list">
                @foreach($usages as $usage)
                <li class="usage-item">
                    <span class="usage-amount">{{ $usage->amount_used }} gebruikt</span>
                    <span class="usage-date">{{ $usage->created_at->format('d-m-Y H:i') }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </body>

    </html>
</x-app-layout>