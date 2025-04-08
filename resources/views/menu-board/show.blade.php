<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $item->name }} Details</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .nutrition-table {
                background: #f8f9fa;
                border-radius: 8px;
                overflow: hidden;
            }

            .nutrition-table td {
                padding: 12px 15px;
            }

            .badge-container {
                display: flex;
                gap: 8px;
                flex-wrap: wrap;
            }

            .main-image {
                border-radius: 12px;
                object-fit: cover;
                height: 400px;
                width: 100%;
            }
        </style>
    </head>

    <body>
        <div class="container mt-4">
            <div class="row g-4">
                <!-- Image Column -->
                <div class="col-md-6">
                    @if($item->image_path)
                    <img src="{{ asset('storage/'.$item->image_path) }}"
                        class="main-image shadow"
                        alt="{{ $item->name }}">
                    @else
                    <div class="bg-secondary text-white p-5 rounded text-center">
                        No Image Available
                    </div>
                    @endif
                </div>

                <!-- Details Column -->
                <div class="col-md-6">
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <h1 class="mb-1">{{ $item->name }}</h1>
                            @if($item->is_special_offer)
                            <span class="badge bg-warning text-dark fs-5">Special Offer</span>
                            @endif
                        </div>
                        <h2 class="text-primary">${{ number_format($item->price, 2) }}</h2>
                    </div>

                    <p class="lead mb-4">{{ $item->description }}</p>

                    <!-- Dietary & Allergens -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Dietary Preferences</h5>
                            <div class="badge-container">
                                @forelse($item->dietary_preferences ?? [] as $preference)
                                <span class="badge bg-success">
                                    {{ ucfirst(str_replace('_', ' ', $preference)) }}
                                </span>
                                @empty
                                <span class="text-muted">None specified</span>
                                @endforelse
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h5>Allergens</h5>
                            <div class="badge-container">
                                @forelse($item->allergens ?? [] as $allergen)
                                <span class="badge bg-danger">
                                    {{ ucfirst($allergen) }}
                                </span>
                                @empty
                                <span class="text-muted">None listed</span>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Nutritional Information -->
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">Nutritional Information</h5>
                        </div>
                        <div class="card-body">
                            @if($item->nutritional_info)
                            <div class="nutrition-table">
                                <table class="table mb-0">
                                    <tbody>
                                        @foreach(explode("\n", $item->nutritional_info) as $line)
                                        @if(trim($line))
                                        <tr>
                                            <td>{{ str_replace(':', '</td><td>', $line) }}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <p class="text-muted mb-0">Nutritional information not available</p>
                            @endif
                        </div>
                    </div>

                    <!-- Schedule Information -->
                    @if($item->schedule_start && $item->schedule_end)
                    <div class="alert alert-info">
                        <h5>Available:</h5>
                        <div class="d-flex justify-content-between">
                            <div>
                                <strong>From:</strong><br>
                                {{ $item->schedule_start->format('M j, Y H:i') }}
                            </div>
                            <div>
                                <strong>To:</strong><br>
                                {{ $item->schedule_end->format('M j, Y H:i') }}
                            </div>
                        </div>
                    </div>
                    @endif

                    <a href="{{ route('menu-board.index') }}" class="btn btn-outline-primary">
                        &laquo; Back to Menu
                    </a>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
</x-app-layout>