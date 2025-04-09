<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800">Bestelling Bijwerken</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-8">
        <style>
            
        </style>

        <form action="{{ route('ingredient-orders.update', $ingredientOrder) }}" method="POST" class="form-container space-y-6">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-input form-select">
                    <option value="pending" class="status-option" {{ $ingredientOrder->status === 'pending' ? 'selected' : '' }}>In afwachting</option>
                    <option value="ordered" class="status-option" {{ $ingredientOrder->status === 'ordered' ? 'selected' : '' }}>Besteld</option>
                    <option value="delivered" class="status-option" {{ $ingredientOrder->status === 'delivered' ? 'selected' : '' }}>Geleverd</option>
                </select>
            </div>

            <div class="form-group">
                <label for="delivery_date" class="form-label">Leverdatum</label>
                <input type="date" name="delivery_date" id="delivery_date" 
                       class="form-input" 
                       value="{{ $ingredientOrder->delivery_date ? $ingredientOrder->delivery_date->format('Y-m-d') : '' }}">
            </div>

            <div class="form-group">
                <label for="received_quantity" class="form-label">Aantal ontvangen</label>
                <input type="number" name="received_quantity" id="received_quantity" 
                       class="form-input" 
                       value="{{ $ingredientOrder->received_quantity }}">
            </div>

            <button type="submit" class="submit-btn">
                Opslaan
            </button>
        </form>
    </div>
</x-app-layout>