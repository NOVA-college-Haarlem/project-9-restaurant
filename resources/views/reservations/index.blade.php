<x-app-layout>
<div class="container">
    <h2>Maak een reservering</h2>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="date" class="form-label">Datum en Tijd</label>
            <input type="datetime-local" id="date" name="date" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="guests" class="form-label">Aantal gasten</label>
            <input type="number" id="guests" name="guests" class="form-control" min="1" required>
        </div>
        
        <div class="mb-3">
            <label for="requests" class="form-label">Speciale verzoeken</label>
            <textarea id="requests" name="requests" class="form-control" rows="3"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Reserveren</button>
    </form>
</div>
</x-app-layout>