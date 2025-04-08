<x-app-layout>
    <x-slot name="header">Bestelling Details</x-slot>

    <div class="max-w-3xl mx-auto mt-6 space-y-4 bg-white p-6 shadow rounded">
        <p><strong>Ingrediënt:</strong> {{ $ingredientOrder->ingredient_name }}</p>
        <p><strong>Aantal:</strong> {{ $ingredientOrder->quantity }}</p>
        <p><strong>Leverancier:</strong> {{ $ingredientOrder->supplier }}</p>
        <p><strong>Status:</strong> {{ ucfirst($ingredientOrder->status) }}</p>
        <p><strong>Leverdatum:</strong>
            {{ $ingredientOrder->delivery_date ? \Carbon\Carbon::parse($ingredientOrder->delivery_date)->format('d-m-Y') : '-' }}
        </p>
        <p><strong>Ontvangen:</strong> {{ $ingredientOrder->received_quantity ?? '-' }}</p>

        <a href="{{ route('ingredient-orders.edit', $ingredientOrder) }}" class="text-blue-500 underline">Bestelling bijwerken</a>
    </div>
</x-app-layout>