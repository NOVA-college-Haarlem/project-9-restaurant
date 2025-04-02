<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Items</title>
</head>

<body>

    <h1>Menu Items</h1>

    <!-- Success message -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Link to create a new menu item -->
    <a href="{{ route('menu-items.create') }}">
        <button>Nieuw Menu-item Toevoegen</button>
    </a>

    <!-- Filter form -->
    <h3>Filter Menu Items</h3>
    <form action="{{ route('menu-items.filter') }}" method="GET">
        <div>
            <label>Vegetarisch</label>
            <input type="checkbox" name="vegetarian" value="1" {{ request('vegetarian') == 1 ? 'checked' : '' }}>
        </div>

        <div>
            <label>Vegan</label>
            <input type="checkbox" name="vegan" value="1" {{ request('vegan') == 1 ? 'checked' : '' }}>
        </div>

        <div>
            <label>Glutenvrij</label>
            <input type="checkbox" name="gluten_free" value="1" {{ request('gluten_free') == 1 ? 'checked' : '' }}>
        </div>

        <div>
            <label>Max Calorieën</label>
            <input type="number" name="max_calories" value="{{ request('max_calories') }}">
        </div>

        <div>
            <label>Allergenen Uitsluiten</label>
            <input type="text" name="exclude_allergen" value="{{ request('exclude_allergen') }}">
        </div>

        <div>
            <label>Sorteren op:</label>
            <select name="sort_by">
                <option value="prijs" {{ request('sort_by') == 'prijs' ? 'selected' : '' }}>Prijs</option>
                <option value="popularity" {{ request('sort_by') == 'popularity' ? 'selected' : '' }}>Populariteit</option>
                <option value="calories" {{ request('sort_by') == 'calories' ? 'selected' : '' }}>Calorieën</option>
            </select>
        </div>

        <button type="submit">Filteren</button>
    </form>

    <!-- Displaying filtered menu items -->
    <h3>Menu Items</h3>
    @if($menuItems->isEmpty())
        <p>Geen menu-items gevonden die aan de filtercriteria voldoen.</p>
    @else
        <ul>
            @foreach ($menuItems as $menuItem)
                <li>
                    <h4>{{ $menuItem->name }}</h4>
                    <p>{{ $menuItem->description }}</p>
                    <p><strong>Prijs:</strong> €{{ number_format($menuItem->prijs, 2, ',', '.') }}</p>
                    <p><strong>Calorieën:</strong> {{ $menuItem->calories }}</p>
                    <p><strong>Populariteit:</strong> {{ $menuItem->popularity }} keer verkocht</p>

                    <!-- Display dietary preferences -->
                    <p>
                        @if($menuItem->vegetarian) <strong>Vegetarisch</strong> | @endif
                        @if($menuItem->vegan) <strong>Vegan</strong> | @endif
                        @if($menuItem->gluten_free) <strong>Glutenvrij</strong> | @endif
                    </p>
                    
                    <!-- Display allergens -->
                    @if($menuItem->allergens)
                        <p><strong>Allergenen:</strong> {{ $menuItem->allergens }}</p>
                    @endif

                    <!-- Show link -->
                    <a href="{{ route('menu-items.show', $menuItem->id) }}">Bekijk</a> | 

                    <!-- Edit and Delete -->
                    <a href="{{ route('menu-items.edit', $menuItem->id) }}">Bewerk</a> | 
                    <form action="{{ route('menu-items.destroy', $menuItem->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Verwijder</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif

</body>

</html>
