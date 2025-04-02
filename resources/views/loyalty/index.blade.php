@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Loyalty Program</h1>

    <p><strong>Huidige punten:</strong> {{ $totalPoints }}</p>

    <h3>Punten Geschiedenis</h3>
    <ul>
        @foreach($history as $entry)
            <li>{{ $entry->description }} - {{ $entry->points }} punten</li>
        @endforeach
    </ul>

    <h3>Beschikbare Beloningen</h3>
    <ul>
        @foreach($rewards as $reward)
            <li>
                {{ $reward->name }} - {{ $reward->points_required }} punten
                @if($totalPoints >= $reward->points_required)
                    <form action="{{ route('loyalty.redeem') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="reward_id" value="{{ $reward->id }}">
                        <button type="submit" class="btn btn-success btn-sm">Inwisselen</button>
                    </form>
                @else
                    <button class="btn btn-secondary btn-sm" disabled>Niet genoeg punten</button>
                @endif
            </li>
        @endforeach
    </ul>
</div>
@endsection
