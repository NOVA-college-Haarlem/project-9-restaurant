<x-app-layout>
    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nieuw Menu-item Toevoegen</title>
    </head>

    <body>
        <h1>Nieuw Menu-item Toevoegen</h1>

        

        <form action="{{ route('menu-items.store') }}" method="POST">
        
            <label>Naam:</label>
            <input type="text" name="name" required>
            <br>

            <label>Beschrijving:</label>
            <textarea name="description"></textarea>
            <br>

            <label>Prijs (€):</label>
            <input type="number" name="prijs" required step="0.01">
            <br>

            <label>Calorieën:</label>
            <input type="number" name="calories">
            <br>

            <label>Eiwitten (g):</label>
            <input type="number" name="protein">
            <br>

            <label>Koolhydraten (g):</label>
            <input type="number" name="carbs">
            <br>

            <label>Vetten (g):</label>
            <input type="number" name="fat">
            <br>

            <label>Allergenen:</label>
            <input type="text" name="allergens">
            <br>

            <label>Vegetarisch:</label>
            <input type="checkbox" name="vegetarian">
            <br>

            <label>Vegan:</label>
            <input type="checkbox" name="vegan">
            <br>

            <label>Glutenvrij:</label>
            <input type="checkbox" name="gluten_free">
            <br>

            <button type="submit">Opslaan</button>
        </form>

        <a href="{{ route('menu-items.index') }}">Terug naar menu</a>
    </body>

    </html>
</x-app-layout>