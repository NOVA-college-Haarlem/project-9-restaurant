<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Digital Menu Board</title>
        <style>

        </style>
    </head>

    <body>
        <div class="menu-board-container">
            <div class="header-layout">
                <h1 class="menu-title">Our Digital Menu</h1>
            </div>

            <div class="row mb-4 g-3 filter-group">
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

            <div class="menu-items-grid" id="menuItems">
                @forelse($items as $item)
                <div class="menu-item"
                    data-category="{{ $item->category }}"
                    data-dietary="{{ implode(',', $item->dietary_preferences ?? []) }}"
                    data-name="{{ strtolower($item->name) }}">
                    <div class="menu-item-card {{ $item->is_special_offer ? 'special-offer' : '' }}">
                        @if($item->is_special_offer)
                        <div class="special-badge">SPECIAL</div>
                        @endif

                        @if($item->image_path)
                        <img src="{{ asset('storage/'.$item->image_path) }}"
                            class="card-img-top"
                            alt="{{ $item->name }}">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>

                            <div class="mt-auto">
                                <p class="menu-price">${{ number_format($item->price, 2) }}</p>

                                <div class="d-flex gap-2 flex-wrap mb-3">
                                    @foreach($item->dietary_preferences ?? [] as $preference)
                                    <span class="badge bg-success">{{ ucfirst(str_replace('_', ' ', $preference)) }}</span>
                                    @endforeach
                                    @foreach($item->allergens ?? [] as $allergen)
                                    <span class="badge bg-danger">{{ ucfirst($allergen) }}</span>
                                    @endforeach
                                </div>

                                <a href="{{ route('menu-board.show', $item->id) }}"
                                    class="btn btn-outline-primary">
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