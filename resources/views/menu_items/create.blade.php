<div class="container">
    <h2>Nieuw Gerecht Toevoegen</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('menu.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Naam</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Omschrijving</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prijs (€)</label>
            <input type="number" id="price" name="price" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Categorie</label>
            <input type="text" id="category" name="category" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Toevoegen</button>
    </form>
</div>
