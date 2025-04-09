<x-app-layout>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Bestellen</title>
    <style>
        
    </style>
</head>
<body>
    <div class="menu-container">
        <h1 class="menu-title">Menu</h1>

        <form action="{{ route('orders.place') }}" method="POST" class="order-form">
            @csrf

            <div class="menu-items">
                @foreach($menuItems as $item)
                <div class="menu-item">
                    <input type="checkbox" 
                           class="menu-item-checkbox" 
                           name="menu_items[{{ $item->id }}][id]" 
                           value="{{ $item->id }}"
                           id="item_{{ $item->id }}">
                    
                    <label for="item_{{ $item->id }}" class="menu-item-details">
                        <span class="menu-item-name">{{ $item->name }}</span>
                        <span class="menu-item-price">€{{ number_format($item->price, 2) }}</span>
                    </label>
                    
                    <input type="number" 
                           class="menu-item-quantity" 
                           name="menu_items[{{ $item->id }}][quantity]" 
                           value="1" 
                           min="1">
                </div>
                @endforeach
            </div>

            <div class="delivery-section">
                <label for="delivery_type" class="delivery-label">Levering of afhalen:</label>
                <select name="delivery_type" id="delivery_type" class="delivery-select">
                    <option value="delivery">Levering</option>
                    <option value="pickup">Afhalen</option>
                </select>
            </div>

            <button type="submit" class="submit-btn">Bestelling Plaatsen</button>
        </form>
    </div>
</body>
</html>
</x-app-layout>