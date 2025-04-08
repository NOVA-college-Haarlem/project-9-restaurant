<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Digital Menu Board</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .menu-item-card {
                transition: transform 0.2s;
                min-height: 400px;
            }

            .menu-item-card:hover {
                transform: translateY(-5px);
            }

            .special-offer {
                border: 3px solid #ffc107;
                position: relative;
                overflow: hidden;
            }

            .special-badge {
                position: absolute;
                top: 10px;
                right: -30px;
                transform: rotate(45deg);
                width: 120px;
                text-align: center;
                background: #ffc107;
                color: #000;
                font-weight: bold;
            }

            .layout-selector .btn {
                min-width: 120px;
            }

            .filter-group {
                margin-bottom: 1rem;
            }
        </style>
    </head>

    <body>
        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Our Digital Menu</h1>
                <div class="layout-selector">
                    <div class="btn-group">
                        @foreach(['main', 'bar', 'drive_thru', 'mobile'] as $layout)
                        <a href="?layout={{ $layout }}"
                            class="btn btn-outline-primary {{ $selectedLayout === $layout ? 'active' : '' }}">
                            {{ ucfirst(str_replace('_', ' ', $layout)) }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="row mb-4 g-3">
                <div class="col-md-4">
                    <select class="form-select" id="categoryFilter">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-select" id="dietaryFilter">
                        <option value="">All Dietary Needs</option>
                        <option value="vegetarian">Vegetarian</option>
                        <option value="vegan">Vegan</option>
                        <option value="gluten_free">Gluten Free</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search items...">
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" id="menuItems">
                @forelse($items as $item)
                <div class="col menu-item"
                    data-category="{{ $item->category }}"
                    data-dietary="{{ implode(',', $item->dietary_preferences ?? []) }}"
                    data-name="{{ strtolower($item->name) }}">
                    <div class="card h-100 menu-item-card {{ $item->is_special_offer ? 'special-offer' : '' }}">
                        @if($item->is_special_offer)
                        <div class="special-badge">SPECIAL</div>
                        @endif

                        @if($item->image_path)
                        <img src="{{ asset('storage/'.$item->image_path) }}"
                            class="card-img-top"
                            alt="{{ $item->name }}"
                            style="height: 200px; object-fit: cover;">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text flex-grow-1">{{ $item->description }}</p>

                            <div class="mt-auto">
                                <p class="h4 text-primary">${{ number_format($item->price, 2) }}</p>

                                <div class="d-flex gap-2 flex-wrap mb-3">
                                    @foreach($item->dietary_preferences ?? [] as $preference)
                                    <span class="badge bg-success">{{ ucfirst(str_replace('_', ' ', $preference)) }}</span>
                                    @endforeach
                                    @foreach($item->allergens ?? [] as $allergen)
                                    <span class="badge bg-danger">{{ ucfirst($allergen) }}</span>
                                    @endforeach
                                </div>

                                <a href="{{ route('menu-board.show', $item->id) }}"
                                    class="btn btn-outline-primary w-100">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-warning">
                        No menu items found for the selected layout and current time.
                    </div>
                </div>
                @endforelse
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const filters = {
                    category: '',
                    dietary: '',
                    search: ''
                };

                function updateFilter() {
                    const searchTerm = filters.search.toLowerCase().trim();

                    document.querySelectorAll('.menu-item').forEach(item => {
                        const categoryMatch = !filters.category || item.dataset.category === filters.category;
                        const dietaryMatch = !filters.dietary || item.dataset.dietary.includes(filters.dietary);
                        const nameMatch = !searchTerm || item.dataset.name.includes(searchTerm);

                        item.style.display = (categoryMatch && dietaryMatch && nameMatch) ? 'block' : 'none';
                    });
                }

                // Category Filter
                document.getElementById('categoryFilter').addEventListener('change', function() {
                    filters.category = this.value;
                    updateFilter();
                });

                // Dietary Filter
                document.getElementById('dietaryFilter').addEventListener('change', function() {
                    filters.dietary = this.value;
                    updateFilter();
                });

                // Search Filter
                document.getElementById('searchInput').addEventListener('input', function() {
                    filters.search = this.value;
                    updateFilter();
                });

                // Initial filter update
                updateFilter();
            });
        </script>
    </body>

    </html>
</x-app-layout>