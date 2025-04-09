<x-app-layout>
    <style>
        
    </style>

    <div class="schedule-container">
        <h1 class="schedule-title">Personeelsrooster</h1>

        <div class="view-toggle">
            <a href="{{ route('shifts.schedule', ['view' => 'week']) }}"
                class="view-btn {{ $viewType === 'week' ? 'active' : 'inactive' }}">
                Weekoverzicht
            </a>
            <a href="{{ route('shifts.schedule', ['view' => 'month']) }}"
                class="view-btn {{ $viewType === 'month' ? 'active' : 'inactive' }}">
                Maandoverzicht
            </a>
        </div>

        @foreach($shiftsByDay as $date => $shifts)
        <div class="day-section">
            <h2 class="day-title">
                {{ \Carbon\Carbon::parse($date)->format('l, j F Y') }}
            </h2>

            <div class="shifts-list">
                @foreach($shifts as $shift)
                <div class="shift-item">
                    <div class="shift-info">
                        <span class="shift-time">
                            {{ $shift->start_time->format('H:i') }} - {{ $shift->end_time->format('H:i') }}
                        </span>
                        <span class="shift-assignment {{ !$shift->user ? 'unassigned' : '' }}">
                            @if($shift->user)
                            Toegewezen aan: {{ $shift->user->name }}
                            @else
                            Niet toegewezen
                            @endif
                        </span>
                    </div>

                    @if(!$shift->user)
                    <form action="{{ route('shifts.assign', $shift) }}" method="POST" class="assign-form">
                        @csrf
                        <select name="user_id" class="user-select">
                            @foreach($staff as $staffMember)
                            <option value="{{ $staffMember->id }}">{{ $staffMember->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="assign-btn">
                            Toewijzen
                        </button>
                    </form>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>