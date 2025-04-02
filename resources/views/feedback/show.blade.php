<x-app-layout>
<div class="container">
    <div class="card">
        <div class="card-header">
            Feedback van {{ $feedback->user_name }} - {{ $feedback->created_at->format('d-m-Y H:i') }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Beoordeling: {{ $feedback->rating }}/10</h5>

            <div class="mb-3">
                <h6>Eten:</h6>
                <p>{{ $feedback->food_comment }}</p>
            </div>

            <div class="mb-3">
                <h6>Service:</h6>
                <p>{{ $feedback->service_comment }}</p>
            </div>

            <div class="mb-3">
                <h6>Sfeer:</h6>
                <p>{{ $feedback->ambiance_comment }}</p>
            </div>

            @if($feedback->photo_path)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $feedback->photo_path) }}" alt="Feedback foto" class="img-thumbnail" style="max-height: 200px;">
            </div>
            @endif

            @if($feedback->admin_response)
            <div class="alert alert-info">
                <h5>Reactie van het restaurant:</h5>
                <p>{{ $feedback->admin_response }}</p>
            </div>
            @else
            <form action="{{ route('feedback.response', $feedback) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="admin_response" class="form-label">Reactie toevoegen</label>
                    <textarea class="form-control" id="admin_response" name="admin_response" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Reactie opslaan</button>
            </form>
            @endif
        </div>
    </div>
</div>
</x-app-layout>