<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Menu Item</title>
    </head>

    <body>
        <div class="menu-form-container">
            <h1 class="menu-form-title">Create New Menu Item</h1>

            <form method="POST" action="{{ route('digital-menus.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="form-label">Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" required>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-control" required>
                            <option value="Main">Main</option>
                            <option value="Appetizers">Appetizers</option>
                            <option value="Desserts">Desserts</option>
                            <option value="Beverages">Beverages</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="form-label">Layout Type</label>
                        <select name="layout_type" class="form-control" required>
                            <option value="main-screen">Main Screen</option>
                            <option value="bar-screen">Bar Screen</option>
                            <option value="drive-thru">Drive Thru</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Image</label>
                        <div class="file-input-wrapper">
                            <label class="file-input-label">
                                <span>Choose file...</span>
                                <input type="file" name="image" class="form-control">
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Special Offer</label>
                        <div class="form-check">
                            <input type="checkbox" name="is_special_offer" value="1" class="form-check-input">
                            <label class="form-check-label">Highlight as Special Offer</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Schedule Start (optional)</label>
                        <input type="datetime-local" name="schedule_start" class="form-control">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Schedule End (optional)</label>
                        <input type="datetime-local" name="schedule_end" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Dietary Preferences</label>
                        <div class="form-check">
                            <input type="checkbox" name="dietary_preferences[]" value="vegetarian" class="form-check-input">
                            <label class="form-check-label">Vegetarian</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="dietary_preferences[]" value="vegan" class="form-check-input">
                            <label class="form-check-label">Vegan</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="dietary_preferences[]" value="gluten_free" class="form-check-input">
                            <label class="form-check-label">Gluten Free</label>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label">Allergens</label>
                        <div class="form-check">
                            <input type="checkbox" name="allergens[]" value="nuts" class="form-check-input">
                            <label class="form-check-label">Nuts</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="allergens[]" value="dairy" class="form-check-input">
                            <label class="form-check-label">Dairy</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="allergens[]" value="shellfish" class="form-check-input">
                            <label class="form-check-label">Shellfish</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="allergens[]" value="gluten" class="form-check-input">
                            <label class="form-check-label">Gluten</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Nutritional Information</label>
                    <textarea name="nutritional_info" class="form-control" placeholder="Calories: ...\nProtein: ..."></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Create Item</button>
                    <a href="{{ route('digital-menus.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </body>

    </html>
</x-app-layout>