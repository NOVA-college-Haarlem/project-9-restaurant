<x-app-layout>
    <x-slot name="header">Bestelling Bijwerken</x-slot>

    <div class="max-w-2xl mx-auto mt-6">
        <form action="{{ route('ingredient-orders.update', $ingredientOrder) }}" method="POST" class="bg-white p-6 shadow rounded space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="status">Status</label>
                <select name="status" id="status" class="w-full border p-2">
                    <option value="pending" {{ $ingredientOrder->status === 'pending' ? 'selected' : '' }}>In afwachting</option>
                    <option value="ordered" {{ $ingredientOrder->status === 'ordered' ? 'selected' : '' }}>Besteld</option>
                    <option value="delivered" {{ $ingredientOrder->status === 'delivered' ? 'selected' : '' }}>Geleverd</option>
                </select>
            </div>

            <div>
                <label for="delivery_date">Leverdatum</label>
                <input type="date" name="delivery_date" id="delivery_date" class="w-full border p-2" value="{{ $ingredientOrder->delivery_date ? $ingredientOrder->delivery_date->format('Y-m-d') : '' }}">
            </div>

            <div>
                <label for="received_quantity">Aantal ontvangen</label>
                <input type="number" name="received_quantity" id="received_quantity" class="w-full border p-2" value="{{ $ingredientOrder->received_quantity }}">
            </div>
            <button type="submit" class="bg-blue-500 px-4 py-2 rounded">
                Opslaan
            </button>
        </form>
    </div>
</x-app-layout>