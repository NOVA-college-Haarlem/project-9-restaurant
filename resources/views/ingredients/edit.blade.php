<x-app-layout>
    <x-slot name="header">Ingrediënt bewerken: {{ $ingredient->name }}</x-slot>

    <div class="max-w-xl mx-auto mt-6">
        <form method="POST" action="{{ route('ingredients.update', $ingredient) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium">Naam</label>
                <input type="text" name="name" id="name" value="{{ old('name', $ingredient->name) }}" required
                    class="w-full border-gray-300 rounded-md shadow-sm" />
            </div>

            <div>
                <label for="category" class="block text-sm font-medium">Categorie</label>
                <input type="text" name="category" id="category" value="{{ old('category', $ingredient->category) }}"
                    class="w-full border-gray-300 rounded-md shadow-sm" />
            </div>

            <div>
                <label for="stock_quantity" class="block text-sm font-medium">Voorraad</label>
                <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity', $ingredient->stock_quantity) }}" required
                    class="w-full border-gray-300 rounded-md shadow-sm" />
            </div>

            <div>
                <label for="low_stock_threshold" class="block text-sm font-medium">Minimumvoorraad</label>
                <input type="number" name="low_stock_threshold" id="low_stock_threshold" value="{{ old('low_stock_threshold', $ingredient->low_stock_threshold) }}" required
                    class="w-full border-gray-300 rounded-md shadow-sm" />
            </div>

            <div class="pt-4">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Bijwerken
                </button>
                <a href="{{ route('ingredients.index') }}" class="ml-4 underline text-sm text-gray-600 hover:text-gray-900">Annuleren</a>
            </div>
        </form>
    </div>
</x-app-layout>