<x-app-layout>
    <x-slot name="header">Gebruiksgeschiedenis: {{ $ingredient->name }}</x-slot>

    <form method="POST" action="{{ route('ingredients.reduce-stock', $ingredient) }}">
        @csrf
        <input name="amount_used" type="number" min="1" placeholder="Hoeveel gebruikt?" required />
        <button type="submit">Afboeken</button>
    </form>

    <ul>
        @foreach($usages as $usage)
        <li>{{ $usage->amount_used }} op {{ $usage->created_at->format('d-m-Y H:i') }}</li>
        @endforeach
    </ul>
</x-app-layout>