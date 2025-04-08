<x-app-layout>
<div class="container mt-5">
    <h1 class="text-center mb-4">Bestellingen</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered shadow">
            <thead class="table-dark">
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
                            <span class="badge bg-{{ $order->status == 'pending' ? 'warning' : ($order->status == 'completed' ? 'success' : 'danger') }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>{{ ucfirst($order->delivery_type) }}</td>
                        <td>€{{ number_format($order->total_price, 2) }}</td>
                        <td>
                            <form action="{{ route('orders.updateStatus', $order) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select d-inline w-auto">
                                    <option value="accepted">Accepteren</option>
                                    <option value="rejected">Afwijzen</option>
                                    <option value="completed">Afgerond</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>