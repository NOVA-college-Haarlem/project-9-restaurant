<x-app-layout>
    <x-slot name="header">Ingrediënt toevoegen</x-slot>

    <form method="POST" action="{{ route('ingredients.store') }}">
        @csrf
        <input name="name" placeholder="Naam" required />
        <input name="category" placeholder="Categorie" />
        <input name="stock_quantity" type="number" placeholder="Voorraad" required />
        <input name="low_stock_threshold" type="number" placeholder="Minimumvoorraad" required />
        <button type="submit">Opslaan</button>
    </form>
</x-app-layout>
