<x-app-layout>
    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alle feedback</title>
        <style>
           
        </style>
    </head>

    <body>
        <div class="feedback-list-container">
            <h1 class="feedback-list-title">Alle feedback</h1>

            <div class="filter-buttons">
                <a href="{{ route('feedback.index') }}" class="filter-btn btn-all">Alle feedback</a>
                <a href="{{ route('feedback.index', ['filter' => 'high']) }}" class="filter-btn btn-high">Boven 6</a>
                <a href="{{ route('feedback.index', ['filter' => 'low']) }}" class="filter-btn btn-low">6 of lager</a>
            </div>

            <div class="feedback-list">
                @foreach($feedback as $item)
                <a href="{{ route('feedback.show', $item) }}" class="feedback-item">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="feedback-rating 
                            @if($item->rating > 7) rating-high 
                            @elseif($item->rating > 5) rating-medium 
                            @else rating-low 
                            @endif">
                            Beoordeling: {{ $item->rating }}/10
                        </h5>
                        <small class="feedback-time">{{ $item->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="feedback-comment">{{ Str::limit($item->food_comment, 100) }}</p>
                    <small class="feedback-author">Door: {{ $item->user_name }}</small>
                </a>
                @endforeach
            </div>

            <div class="pagination-container">
                {{ $feedback->links() }}
            </div>
        </div>
    </body>

    </html>
</x-app-layout>