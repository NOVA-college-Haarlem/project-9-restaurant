<x-app-layout>
    <x-slot name="header">Voorraadbeheer</x-slot>

    <div class="max-w-7xl mx-auto mt-6 space-y-6">

        @if ($lowStockIngredients->count() > 0)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <strong>Let op!</strong> De volgende ingrediënten zijn bijna op:
            <ul class="list-disc list-inside mt-2">
                @foreach ($lowStockIngredients as $ingredient)
                <li>{{ $ingredient->name }} (nog {{ $ingredient->stock_quantity }} op voorraad)</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Tabel met alle ingrediënten -->
        <a href="{{ route('ingredients.create') }}" class="underline text-blue-600">Nieuw ingrediënt</a>
        <div class="bg-white shadow sm:rounded-lg p-6">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="text-left">Naam</th>
                        <th class="text-left">Categorie</th>
                        <th class="text-left">Voorraad</th>
                        <th class="text-left">Minimumvoorraad</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ingredients as $ingredient)
                    <tr class="border-t">
                        <td>{{ $ingredient->name }}</td>
                        <td>{{ $ingredient->category }}</td>
                        <td>{{ $ingredient->stock_quantity }}</td>
                        <td>{{ $ingredient->low_stock_threshold }}</td>
                        <td>
                            <a href="{{ route('ingredients.edit', $ingredient) }}" class="text-blue-500 hover:underline">Bewerk</a>
                        </td>
                        <td>
                            <a href="{{ route('ingredients.usage-history', $ingredient) }}">Gebruik</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>