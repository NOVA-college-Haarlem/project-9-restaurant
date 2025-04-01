<div class="container">
    <h2>Bestelling Plaatsen</h2>

    <form action="{{ route('orders.place') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="menu_items" class="form-label">Selecteer gerechten</label>
            <div id="menu_items" class="form-control">
                @foreach($menuItems as $menuItem)
                    <div class="form-check">
                        <input type="checkbox" name="menu_items[{{ $menuItem->id }}][id]" value="{{ $menuItem->id }}" class="form-check-input" id="menu_item_{{ $menuItem->id }}">
                        <label class="form-check-label" for="menu_item_{{ $menuItem->id }}">
                            {{ $menuItem->name }} (€{{ $menuItem->price }})
                        </label>
                        <input type="number" name="menu_items[{{ $menuItem->id }}][quantity]" class="form-control" min="1" value="1">
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label for="delivery_type" class="form-label">Bezorging of Afhalen</label>
            <select name="delivery_type" id="delivery_type" class="form-control" required>
                <option value="delivery">Bezorging</option>
                <option value="pickup">Afhalen</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Bestellen</button>
    </form>
</div>
