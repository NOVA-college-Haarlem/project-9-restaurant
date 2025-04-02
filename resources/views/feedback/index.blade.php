<x-app-layout>
<div class="container">
    <h1>Alle feedback</h1>
    
    <div class="mb-3">
        <a href="{{ route('feedback.index') }}" class="btn btn-outline-secondary">Alle feedback</a>
        <a href="{{ route('feedback.index', ['filter' => 'high']) }}" class="btn btn-outline-success">Boven 6</a>
        <a href="{{ route('feedback.index', ['filter' => 'low']) }}" class="btn btn-outline-warning">6 of lager</a>
    </div>
    
    <div class="list-group">
        @foreach($feedback as $item)
        <a href="{{ route('feedback.show', $item) }}" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Beoordeling: {{ $item->rating }}/10</h5>
                <small>{{ $item->created_at->diffForHumans() }}</small>
            </div>
            <p class="mb-1">{{ Str::limit($item->food_comment, 100) }}</p>
            <small>Door: {{ $item->user_name }}</small>
        </a>
        @endforeach
    </div>
    
    <div class="mt-3">
        {{ $feedback->links() }}
    </div>
</div>
</x-app-layout>