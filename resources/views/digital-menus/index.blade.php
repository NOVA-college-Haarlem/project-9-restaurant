<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Digital Menus</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .table-image {
                max-width: 100px;
                height: auto;
            }

            .action-buttons {
                min-width: 200px;
            }

            .status-indicator {
                width: 15px;
                height: 15px;
                border-radius: 50%;
                display: inline-block;
            }

            .active-status {
                background-color: #28a745;
            }

            .inactive-status {
                background-color: #dc3545;
            }
        </style>
    </head>

    <body>
        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1>Manage Digital Menus</h1>
                <a href="{{ route('digital-menus.create') }}" class="btn btn-primary">
                    Create New
                </a>
            </div>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Schedule</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($menus as $menu)
                        <tr>
                            <td>
                                <span class="status-indicator {{ $menu->isActive() ? 'active-status' : 'inactive-status' }}"
                                    title="{{ $menu->schedule_status }}"></span>
                            </td>
                            <td>
                                @if($menu->image_path)
                                <img src="{{ asset('storage/'.$menu->image_path) }}"
                                    alt="{{ $menu->name }}"
                                    class="table-image img-thumbnail">
                                @else
                                <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>{{ $menu->name }}</td>
                            <td>${{ number_format($menu->price, 2) }}</td>
                            <td>
                                <span class="badge bg-secondary">{{ $menu->category }}</span>
                            </td>
                            <td>
                                @if($menu->schedule_start && $menu->schedule_end)
                                {{ $menu->schedule_start->format('M j, Y H:i') }}<br>
                                to<br>
                                {{ $menu->schedule_end->format('M j, Y H:i') }}
                                @else
                                <span class="text-muted">Always active</span>
                                @endif
                            </td>
                            <td class="action-buttons">
                                <a href="{{ route('digital-menus.edit', $menu->id) }}"
                                    class="btn btn-sm btn-outline-warning">
                                    Edit
                                </a>
                                <form action="{{ route('digital-menus.destroy', $menu->id) }}"
                                    method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Are you sure?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                No menu items found.
                                <a href="{{ route('digital-menus.create') }}">Create one now</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
</x-app-layout>