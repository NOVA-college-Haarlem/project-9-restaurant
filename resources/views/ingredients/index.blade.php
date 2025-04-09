<x-app-layout>
    <x-slot name="header">Voorraadbeheer</x-slot>

    <style>
       
    </style>

    <div class="inventory-container">
        @if ($lowStockIngredients->count() > 0)
        <div class="low-stock-alert">
            <strong>Let op!</strong> De volgende ingrediënten zijn bijna op:
            <ul class="low-stock-list">
                @foreach ($lowStockIngredients as $ingredient)
                <li>{{ $ingredient->name }} (nog {{ $ingredient->stock_quantity }} op voorraad)</li>
                @endforeach
            </ul>
        </div>
        @endif

        <a href="{{ route('ingredients.create') }}" class="new-ingredient-link">+ Nieuw ingrediënt toevoegen</a>

        <table class="inventory-table">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Categorie</th>
                    <th>Voorraad</th>
                    <th>Minimumvoorraad</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ingredients as $ingredient)
                <tr>
                    <td>{{ $ingredient->name }}</td>
                    <td>{{ $ingredient->category }}</td>
                    <td class="stock-quantity {{ $ingredient->stock_quantity <= $ingredient->low_stock_threshold ? 'low' : '' }}">
                        {{ $ingredient->stock_quantity }}
                    </td>
                    <td>{{ $ingredient->low_stock_threshold }}</td>
                    <td>
                        <a href="{{ route('ingredients.edit', $ingredient) }}" class="action-link edit">Bewerk</a>
                        <a href="{{ route('ingredients.usage-history', $ingredient) }}" class="action-link usage">Gebruik</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>