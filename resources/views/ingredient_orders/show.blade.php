<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800">Bestelling Details</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-8 bg-white rounded-xl shadow-md overflow-hidden">
        <style>
            
        </style>

        <div class="detail-card">
            <div class="detail-item">
                <span class="detail-label">Ingrediënt:</span>
                <span class="detail-value">{{ $ingredientOrder->ingredient_name }}</span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Aantal:</span>
                <span class="detail-value">{{ $ingredientOrder->quantity }}</span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Leverancier:</span>
                <span class="detail-value">{{ $ingredientOrder->supplier }}</span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Status:</span>
                <span class="detail-value">
                    <span class="status-badge status-{{ strtolower($ingredientOrder->status) }}">
                        {{ ucfirst($ingredientOrder->status) }}
                    </span>
                </span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Leverdatum:</span>
                <span class="detail-value">
                    {{ $ingredientOrder->delivery_date ? \Carbon\Carbon::parse($ingredientOrder->delivery_date)->format('d-m-Y') : '-' }}
                </span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Ontvangen:</span>
                <span class="detail-value">{{ $ingredientOrder->received_quantity ?? '-' }}</span>
            </div>

            <a href="{{ route('ingredient-orders.edit', $ingredientOrder) }}" class="edit-link">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Bestelling bijwerken
            </a>
        </div>
    </div>
</x-app-layout>