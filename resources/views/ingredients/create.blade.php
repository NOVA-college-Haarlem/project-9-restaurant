<x-app-layout>
    <x-slot name="header">Ingrediënt toevoegen</x-slot>

    <style>
        
    </style>

    <div class="ingredient-form-container">
        <h1 class="form-title">Nieuw Ingrediënt Toevoegen</h1>

        <form method="POST" action="{{ route('ingredients.store') }}">
            @csrf

            <div class="form-group">
                <label for="name" class="form-label">Naam</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Bijv. Tomaten" required>
            </div>

            <div class="form-group">
                <label for="category" class="form-label">Categorie</label>
                <input type="text" id="category" name="category" class="form-control" placeholder="Bijv. Groenten">
            </div>

            <div class="form-group">
                <label for="stock_quantity" class="form-label">Huidige Voorraad</label>
                <input type="number" id="stock_quantity" name="stock_quantity" class="form-control" placeholder="Bijv. 50" required min="0">
            </div>

            <div class="form-group">
                <label for="low_stock_threshold" class="form-label">Minimum Voorraad</label>
                <input type="number" id="low_stock_threshold" name="low_stock_threshold" class="form-control" placeholder="Bijv. 10" required min="0">
            </div>

            <button type="submit" class="submit-btn">Ingrediënt Opslaan</button>
        </form>
    </div>
</x-app-layout>