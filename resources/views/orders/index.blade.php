<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bestellingen</title>
            
    </head>

    <body>
        <div class="orders-container">
            <h1 class="page-title">Bestellingen</h1>

            @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="table-responsive">
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Status</th>
                            <th>Levering</th>
                            <th>Totale Prijs</th>
                            <th>Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                @if($order->status == 'pending')
                                <span class="status-badge status-pending">In behandeling</span>
                                @elseif($order->status == 'completed')
                                <span class="status-badge status-completed">Voltooid</span>
                                @else
                                <span class="status-badge status-rejected">Afgewezen</span>
                                @endif
                            </td>
                            <td class="delivery-type">{{ ucfirst($order->delivery_type) }}</td>
                            <td class="price">€{{ number_format($order->total_price, 2) }}</td>
                            <td>
                                <form action="{{ route('orders.updateStatus', $order) }}" method="POST" class="status-form">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="status-select">
                                        <option value="accepted">Accepteren</option>
                                        <option value="rejected">Afwijzen</option>
                                        <option value="completed">Afgerond</option>
                                    </select>
                                    <button type="submit" class="update-btn">Update</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>

    </html>
</x-app-layout> 