<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Menu Item</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container mt-4">
            <h1>Create New Menu Item</h1>

            <form method="POST" action="{{ route('digital-menus.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Category</label>
                        <select name="category" class="form-select" required>
                            <option value="Main">Main</option>
                            <option value="Appetizers">Appetizers</option>
                            <option value="Desserts">Desserts</option>
                            <option value="Beverages">Beverages</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Layout Type</label>
                        <select name="layout_type" class="form-select" required>
                            <option value="main-screen">Main Screen</option>
                            <option value="bar-screen">Bar Screen</option>
                            <option value="drive-thru">Drive Thru</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Special Offer</label>
                        <div class="form-check">
                            <input type="checkbox" name="is_special_offer" value="1" class="form-check-input">
                            <label class="form-check-label">Highlight as Special Offer</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Schedule Start (optional)</label>
                        <input type="datetime-local" name="schedule_start" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Schedule End (optional)</label>
                        <input type="datetime-local" name="schedule_end" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Dietary Preferences</label>
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

                    <div class="col-md-6 mb-3">
                        <label>Allergens</label>
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

                <div class="mb-3">
                    <label>Nutritional Information</label>
                    <textarea name="nutritional_info" class="form-control" placeholder="Calories: ...\nProtein: ..."></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Create Item</button>
                <a href="{{ route('digital-menus.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </body>

    </html>
</x-app-layout>