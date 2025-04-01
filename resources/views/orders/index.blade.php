<h1>Bestellingen</h1>
<ul>
    @foreach($orders as $order)
        <li>
            Bestelling #{{ $order->id }} - Status: {{ $order->status }}

            <form action="{{ route('orders.updateStatus', $order) }}" method="POST">
                @csrf
                @method('PATCH')

                <select name="status">
                    <option value="accepted" {{ $order->status == 'accepted' ? 'selected' : '' }}>Accepteren</option>
                    <option value="rejected" {{ $order->status == 'rejected' ? 'selected' : '' }}>Afwijzen</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Afgerond</option>
                </select>
                <button type="submit">Update Status</button>
            </form>
        </li>
    @endforeach
</ul>
