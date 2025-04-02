<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu-item Bewerken</title>
</head>

<body>
    <h1>Menu-item Bewerken</h1>

    <form action="{{ route('menu-items.update', $menuItem->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Naam:</label>
        <input type="text" name="name" value="{{ $menuItem->name }}" required>
        <br>

        <label>Beschrijving:</label>
        <textarea name="description">{{ $menuItem->description }}</textarea>
        <br>

        <label>Prijs (€):</label>
        <input type="number" name="prijs" value="{{ $menuItem->prijs }}" required step="0.01">
        <br>

        <label>Calorieën:</label>
        <input type="number" name="calories" value="{{ $menuItem->calories }}">
        <br>

        <label>Eiwitten (g):</label>
        <input type="number" name="protein" value="{{ $menuItem->protein }}">
        <br>

        <label>Koolhydraten (g):</label>
        <input type="number" name="carbs" value="{{ $menuItem->carbs }}">
        <br>

        <label>Vetten (g):</label>
        <input type="number" name="fat" value="{{ $menuItem->fat }}">
        <br>

        <label>Allergenen:</label>
        <input type="text" name="allergens" value="{{ $menuItem->allergens }}">
        <br>

        <label>Vegetarisch:</label>
        <input type="checkbox" name="vegetarian" {{ $menuItem->vegetarian ? 'checked' : '' }}>
        <br>

        <label>Vegan:</label>
        <input type="checkbox" name="vegan" {{ $menuItem->vegan ? 'checked' : '' }}>
        <br>

        <label>Glutenvrij:</label>
        <input type="checkbox" name="gluten_free" {{ $menuItem->gluten_free ? 'checked' : '' }}>
        <br>

        <button type="submit">Opslaan</button>
    </form>

    <a href="{{ route('menu-items.index') }}">Terug naar menu</a>
</body>

</html>
