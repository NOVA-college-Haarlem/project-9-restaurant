<x-app-layout>
    <h1>Menu</h1>
    <form action="{{ route('orders.place') }}" method="POST">
        @csrf
        <div>
            @foreach($menuItems as $item)
                <div>
                    <input type="checkbox" name="menu_items[{{ $item->id }}][id]" value="{{ $item->id }}">
                    {{ $item->name }} - {{ $item->price }} €
                    <input type="number" name="menu_items[{{ $item->id }}][quantity]" value="1" min="1">
                </div>
            @endforeach
        </div>
        <div>
            <label for="delivery_type">Levering of afhalen:</label>
            <select name="delivery_type">
                <option value="delivery">Levering</option>
                <option value="pickup">Afhalen</option>
            </select>
        </div>
        <button type="submit">Bestelling Plaatsen</button>
    </form>
    </x-app-layout>
