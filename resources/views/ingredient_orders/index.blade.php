<x-app-layout>
    <x-slot name="header">Ingrediëntenbestellingen</x-slot>

    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ingrediëntenbestellingen</title>
        <style>
            /* Main Container */
            .orders-container {
                max-width: 1200px;
                margin: 2rem auto;
                padding: 0 2rem;
            }

            /* Header Section */
            .orders-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 2rem;
            }

            /* Page Title */
            .orders-title {
                font-size: 2rem;
                color: #2d3748;
                margin: 0;
            }

            /* Create Button */
            .create-btn {
                display: inline-block;
                padding: 0.75rem 1.5rem;
                background-color: #d97706;
                color: white;
                text-decoration: none;
                border-radius: 8px;
                font-weight: 600;
                transition: all 0.3s ease;
            }

            .create-btn:hover {
                background-color: #b45309;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
            }

            /* Success Message */
            .alert-success {
                padding: 1rem;
                background-color: #d1fae5;
                color: #065f46;
                border-radius: 8px;
                margin-bottom: 1.5rem;
                border-left: 4px solid #059669;
            }

            /* Orders Table */
            .orders-table-container {
                background-color: white;
                padding: 2rem;
                border-radius: 12px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            }

            .orders-table {
                width: 100%;
                border-collapse: separate;
                border-spacing: 0;
            }

            .orders-table th {
                background-color: #D97706;
                color: white;
                padding: 1rem;
                text-align: left;
                font-weight: 600;
            }

            .orders-table td {
                padding: 1rem;
                border-bottom: 1px solid #e5e7eb;
                vertical-align: middle;
            }

            .orders-table tr:last-child td {
                border-bottom: none;
            }

            .orders-table tr:hover {
                background-color: #FFF7ED;
            }

            /* Status Badges */
            .status-badge {
                display: inline-block;
                padding: 0.35rem 0.75rem;
                border-radius: 20px;
                font-size: 0.875rem;
                font-weight: 500;
            }

            .status-pending {
                background-color: #FEF3C7;
                color: #92400E;
            }

            .status-delivered {
                background-color: #D1FAE5;
                color: #065F46;
            }

            .status-processing {
                background-color: #DBEAFE;
                color: #1E40AF;
            }

            .status-cancelled {
                background-color: #FEE2E2;
                color: #991B1B;
            }

            /* Action Links */
            .action-link {
                color: #3B82F6;
                text-decoration: none;
                font-weight: 500;
                transition: all 0.2s;
            }

            .action-link:hover {
                color: #1D4ED8;
                text-decoration: underline;
            }

            /* Responsive Adjustments */
            @media (max-width: 768px) {
                .orders-container {
                    padding: 0 1rem;
                }

                .orders-header {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 1rem;
                }

                .orders-table-container {
                    padding: 1rem;
                }

                .orders-table {
                    display: block;
                    overflow-x: auto;
                }
            }
        </style>
    </head>

    <body>
        <div class="orders-container">
            <div class="orders-header">
                <h1 class="orders-title">Ingrediëntenbestellingen</h1>
                <a href="{{ route('ingredient-orders.create') }}" class="create-btn">+ Nieuwe bestelling</a>
            </div>

            @if (session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="orders-table-container">
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>Ingrediënt</th>
                            <th>Aantal</th>
                            <th>Leverancier</th>
                            <th>Status</th>
                            <th>Leverdatum</th>
                            <th>Acties</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->ingredient_name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->supplier }}</td>
                            <td>
                                <span class="status-badge 
                                    @if($order->status === 'pending') status-pending
                                    @elseif($order->status === 'delivered') status-delivered
                                    @elseif($order->status === 'processing') status-processing
                                    @elseif($order->status === 'cancelled') status-cancelled
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>{{ $order->delivery_date ? \Carbon\Carbon::parse($order->delivery_date)->format('d-m-Y') : '-' }}</td>
                            <td>
                                <a href="{{ route('ingredient-orders.show', $order) }}" class="action-link">Details</a>
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