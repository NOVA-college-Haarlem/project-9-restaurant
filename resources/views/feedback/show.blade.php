<x-app-layout>
    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Feedback Details</title>
        <style>
            
        </style>
    </head>

    <body>
        <div class="feedback-detail-container">
            <div class="feedback-header">
                Feedback van {{ $feedback->user_name }} - {{ $feedback->created_at->format('d-m-Y H:i') }}
            </div>

            <div class="feedback-body">
                <h5 class="feedback-rating">
                    <span class="rating-value">{{ $feedback->rating }}/10</span>
                    Beoordeling
                </h5>

                <div class="feedback-section">
                    <h6>Eten:</h6>
                    <p>{{ $feedback->food_comment }}</p>
                </div>

                <div class="feedback-section">
                    <h6>Service:</h6>
                    <p>{{ $feedback->service_comment }}</p>
                </div>

                <div class="feedback-section">
                    <h6>Sfeer:</h6>
                    <p>{{ $feedback->ambiance_comment }}</p>
                </div>

                @if($feedback->photo_path)
                <div class="feedback-section">
                    <img src="{{ asset('storage/' . $feedback->photo_path) }}" alt="Feedback foto" class="feedback-photo">
                </div>
                @endif

                @if($feedback->admin_response)
                <div class="admin-response">
                    <h5>Reactie van het restaurant:</h5>
                    <p>{{ $feedback->admin_response }}</p>
                </div>
                @else
                <form action="{{ route('feedback.response', $feedback) }}" method="POST" class="response-form">
                    @csrf
                    <div class="mb-3">
                        <label for="admin_response" class="form-label">Reactie toevoegen</label>
                        <textarea class="form-control" id="admin_response" name="admin_response" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="submit-btn">Reactie opslaan</button>
                </form>
                @endif
            </div>
        </div>
    </body>

    </html>
</x-app-layout>