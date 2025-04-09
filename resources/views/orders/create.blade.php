<x-app-layout>
    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bestelling Plaatsen</title>
        
    </head>

    <body>
        <div class="order-container">
            <h2 class="order-title">Bestelling Plaatsen</h2>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 1.5rem;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="order-card">
                <form action="{{ route('orders.place') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        @foreach($menuItems as $menuItem)
                        <div class="menu-item">
                            <label for="item_{{ $menuItem->id }}">
                                {{ $menuItem->name }} <span class="price">(€{{ number_format($menuItem->price, 2) }})</span>
                            </label>

                            <input type="hidden" name="menu_items[{{ $menuItem->id }}][id]" value="{{ $menuItem->id }}">

                            <input type="number"
                                id="item_{{ $menuItem->id }}"
                                name="menu_items[{{ $menuItem->id }}][quantity]"
                                min="0"
                                value="0"
                                required>
                        </div>
                        @endforeach
                    </div>

                    <div class="mb-4">
                        <label for="delivery_type" class="form-label">Bezorging of Afhalen</label>
                        <select name="delivery_type" id="delivery_type" class="delivery-select" required>
                            <option value="delivery">Bezorging</option>
                            <option value="pickup">Afhalen</option>
                        </select>
                    </div>

                    <button type="submit" class="submit-btn">Bestellen en Betalen</button>
                </form>
            </div>
        </div>
    </body>

    </html>
</x-app-layout>