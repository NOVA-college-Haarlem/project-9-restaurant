    <x-app-layout>
        
        <div class="menu-management-container">
            <div class="menu-header">
                <h1>Manage Digital Menus</h1>
                <a href="{{ route('digital-menus.create') }}" class="btn btn-primary">
                    Create New
                </a>
            </div>



            <div class="table-responsive">
                <table class="menu-table">
                    <thead>
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
                                    class="table-image">
                                @else
                                <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>{{ $menu->name }}</td>
                            <td>${{ number_format($menu->price, 2) }}</td>
                            <td>
                                <span class="badge-secondary">{{ $menu->category }}</span>
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
                                    class="btn btn-outline-warning">
                                    Edit
                                </a>
                                <form action="{{ route('digital-menus.destroy', $menu->id) }}"
                                    method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="btn btn-outline-danger"
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
    </x-app-layout>