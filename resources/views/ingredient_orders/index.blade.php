<x-app-layout>
    <x-slot name="header">Ingrediëntenbestellingen</x-slot>

    <div class="max-w-7xl mx-auto mt-6 space-y-6">
        <a href="{{ route('ingredient-orders.create') }}" class="text-blue-500 underline">Nieuwe bestelling</a>

        @if (session('success'))
        <div class="text-green-600">{{ session('success') }}</div>
        @endif

        <div class="bg-white p-6 shadow rounded">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th>Ingrediënt</th>
                        <th>Aantal</th>
                        <th>Leverancier</th>
                        <th>Status</th>
                        <th>Leverdatum</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr class="border-t">
                        <td>{{ $order->ingredient_name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->supplier }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>{{ $order->delivery_date ? \Carbon\Carbon::parse($order->delivery_date)->format('d-m-Y') : '-' }}</td>

                        <td><a href="{{ route('ingredient-orders.show', $order) }}" class="text-blue-500">Details</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>