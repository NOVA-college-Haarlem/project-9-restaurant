<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $menuItem->name }}</title>
</head>

<body>
    <h1>{{ $menuItem->name }}</h1>

    <p><strong>Beschrijving:</strong> {{ $menuItem->description }}</p>
    <p><strong>Prijs:</strong> €{{ number_format($menuItem->prijs, 2) }}</p>
    <p><strong>Calorieën:</strong> {{ $menuItem->calories ?? 'N/A' }}</p>
    <p><strong>Eiwitten:</strong> {{ $menuItem->protein ?? 'N/A' }}g</p>
    <p><strong>Koolhydraten:</strong> {{ $menuItem->carbs ?? 'N/A' }}g</p>
    <p><strong>Vetten:</strong> {{ $menuItem->fat ?? 'N/A' }}g</p>
    <p><strong>Allergenen:</strong> {{ $menuItem->allergens ?? 'Geen' }}</p>
    <p><strong>Vegetarisch:</strong> {{ $menuItem->vegetarian ? '✅ Ja' : '❌ Nee' }}</p>
    <p><strong>Vegan:</strong> {{ $menuItem->vegan ? '✅ Ja' : '❌ Nee' }}</p>
    <p><strong>Glutenvrij:</strong> {{ $menuItem->gluten_free ? '✅ Ja' : '❌ Nee' }}</p>

    <a href="{{ route('menu-items.index') }}">Terug naar menu</a>
</body>

</html>
