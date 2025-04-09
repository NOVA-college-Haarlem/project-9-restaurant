<x-app-layout>
    <x-slot name="header">Ingrediënt bewerken: {{ $ingredient->name }}</x-slot>

    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ingrediënt bewerken: {{ $ingredient->name }}</title>
        <style>
            
        </style>
    </head>

    <body>
        <div class="edit-ingredient-container">
            <h1 class="edit-title">Ingrediënt bewerken: {{ $ingredient->name }}</h1>

            <form method="POST" action="{{ route('ingredients.update', $ingredient) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name" class="form-label">Naam</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $ingredient->name) }}" required
                        class="form-control" />
                </div>

                <div class="form-group">
                    <label for="category" class="form-label">Categorie</label>
                    <input type="text" name="category" id="category" value="{{ old('category', $ingredient->category) }}"
                        class="form-control" />
                </div>

                <div class="form-group">
                    <label for="stock_quantity" class="form-label">Voorraad</label>
                    <input type="number" name="stock_quantity" id="stock_quantity"
                        value="{{ old('stock_quantity', $ingredient->stock_quantity) }}" required
                        class="form-control" />
                </div>

                <div class="form-group">
                    <label for="low_stock_threshold" class="form-label">Minimumvoorraad</label>
                    <input type="number" name="low_stock_threshold" id="low_stock_threshold"
                        value="{{ old('low_stock_threshold', $ingredient->low_stock_threshold) }}" required
                        class="form-control" />
                </div>

                <div class="button-container">
                    <button type="submit" class="submit-btn">
                        Bijwerken
                    </button>
                    <a href="{{ route('ingredients.index') }}" class="cancel-link">Annuleren</a>
                </div>
            </form>
        </div>
    </body>

    </html>
</x-app-layout>