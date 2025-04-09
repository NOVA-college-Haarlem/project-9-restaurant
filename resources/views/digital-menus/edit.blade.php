<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Menu Item</title>
        
    </head>

    <body>
        <div class="edit-form-container">
            <h1 class="edit-form-title">Edit Menu Item</h1>

            <form method="POST" action="{{ route('digital-menus.update', $menu->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $menu->name }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control">{{ $menu->description }}</textarea>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="form-label">Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" value="{{ $menu->price }}" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select" required>
                            <option value="Main" {{ $menu->category == 'Main' ? 'selected' : '' }}>Main</option>
                            <option value="Appetizers" {{ $menu->category == 'Appetizers' ? 'selected' : '' }}>Appetizers</option>
                            <option value="Desserts" {{ $menu->category == 'Desserts' ? 'selected' : '' }}>Desserts</option>
                            <option value="Beverages" {{ $menu->category == 'Beverages' ? 'selected' : '' }}>Beverages</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Layout Type</label>
                        <select name="layout_type" class="form-select" required>
                            <option value="main-screen" {{ $menu->layout_type == 'main-screen' ? 'selected' : '' }}>Main Screen</option>
                            <option value="bar-screen" {{ $menu->layout_type == 'bar-screen' ? 'selected' : '' }}>Bar Screen</option>
                            <option value="drive-thru" {{ $menu->layout_type == 'drive-thru' ? 'selected' : '' }}>Drive Thru</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Image</label>
                        <div class="file-input-wrapper">
                            <label class="file-input-label">
                                <span>Choose new image...</span>
                                <input type="file" name="image" class="form-control">
                            </label>
                        </div>
                        @if($menu->image_path)
                        <img src="{{ asset('storage/'.$menu->image_path) }}" alt="Current image" class="current-image">
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Special Offer</label>
                        <div class="form-check">
                            <input type="checkbox" name="is_special_offer" value="1" class="form-check-input"
                                {{ $menu->is_special_offer ? 'checked' : '' }}>
                            <label class="form-check-label">Highlight as Special Offer</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Schedule Start (optional)</label>
                        <input type="datetime-local" name="schedule_start" class="form-control"
                            value="{{ $menu->schedule_start ? $menu->schedule_start->format('Y-m-d\TH:i') : '' }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Schedule End (optional)</label>
                        <input type="datetime-local" name="schedule_end" class="form-control"
                            value="{{ $menu->schedule_end ? $menu->schedule_end->format('Y-m-d\TH:i') : '' }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Dietary Preferences</label>
                        <div class="form-check">
                            <input type="checkbox" name="dietary_preferences[]" value="vegetarian"
                                class="form-check-input"
                                {{ in_array('vegetarian', $menu->dietary_preferences ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label">Vegetarian</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="dietary_preferences[]" value="vegan"
                                class="form-check-input"
                                {{ in_array('vegan', $menu->dietary_preferences ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label">Vegan</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="dietary_preferences[]" value="gluten_free"
                                class="form-check-input"
                                {{ in_array('gluten_free', $menu->dietary_preferences ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label">Gluten Free</label>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Allergens</label>
                        <div class="form-check">
                            <input type="checkbox" name="allergens[]" value="nuts"
                                class="form-check-input"
                                {{ in_array('nuts', $menu->allergens ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label">Nuts</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="allergens[]" value="dairy"
                                class="form-check-input"
                                {{ in_array('dairy', $menu->allergens ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label">Dairy</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="allergens[]" value="shellfish"
                                class="form-check-input"
                                {{ in_array('shellfish', $menu->allergens ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label">Shellfish</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="allergens[]" value="gluten"
                                class="form-check-input"
                                {{ in_array('gluten', $menu->allergens ?? []) ? 'checked' : '' }}>
                            <label class="form-check-label">Gluten</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Nutritional Information</label>
                    <textarea name="nutritional_info" class="form-control">{{ $menu->nutritional_info }}</textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="{{ route('digital-menus.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </body>

    </html>
</x-app-layout>