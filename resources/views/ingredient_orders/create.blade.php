<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">Nieuwe Ingrediëntenbestelling</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-8 px-4 sm:px-6 lg:px-8">
        <style>
            
        </style>

        <form action="{{ route('ingredient-orders.store') }}" method="POST" class="form-container space-y-6">
            @csrf

            <div class="form-group">
                <label for="ingredient_name" class="form-label">Ingrediënt</label>
                <input type="text" name="ingredient_name" id="ingredient_name"
                    class="form-input"
                    placeholder="Voer ingrediëntnaam in"
                    required>
            </div>

            <div class="form-group">
                <label for="quantity" class="form-label">Aantal</label>
                <input type="number" name="quantity" id="quantity"
                    class="form-input"
                    placeholder="Voer aantal in"
                    min="1"
                    required>
            </div>

            <div class="form-group">
                <label for="supplier" class="form-label">Leverancier</label>
                <input type="text" name="supplier" id="supplier"
                    class="form-input"
                    placeholder="Voer leverancier in"
                    required>
            </div>

            <button type="submit" class="submit-btn">
                Bestelling Aanmaken
            </button>
        </form>
    </div>
</x-app-layout>