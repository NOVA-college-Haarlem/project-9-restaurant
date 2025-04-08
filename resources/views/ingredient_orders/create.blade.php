<x-app-layout>
    <x-slot name="header">Nieuwe Ingrediëntenbestelling</x-slot>

    <div class="max-w-2xl mx-auto mt-6">
        <form action="{{ route('ingredient-orders.store') }}" method="POST" class="bg-white p-6 shadow rounded space-y-4">
            @csrf

            <div>
                <label for="ingredient_name">Ingrediënt</label>
                <input type="text" name="ingredient_name" id="ingredient_name" class="w-full border p-2" required>
            </div>

            <div>
                <label for="quantity">Aantal</label>
                <input type="number" name="quantity" id="quantity" class="w-full border p-2" required>
            </div>

            <div>
                <label for="supplier">Leverancier</label>
                <input type="text" name="supplier" id="supplier" class="w-full border p-2" required>
            </div>
            <button type="submit" class="bg-blue-500 px-4 py-2 rounded">
                Aanmaken
            </button>
        </form>
    </div>
</x-app-layout>