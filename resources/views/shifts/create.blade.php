<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create New Shift
        </h2>
    </x-slot>

    <style>
        
    </style>

    <div class="shift-create-container">
        <h1 class="shift-title">Nieuwe Shift Aanmaken</h1>

        <form action="{{ route('shifts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="date" class="form-label">Datum:</label>
                <input type="date" name="date" id="date" required min="{{ now()->format('Y-m-d') }}" class="form-control">
            </div>

            <div class="time-grid">
                <div class="form-group">
                    <label for="start_time" class="form-label">Starttijd:</label>
                    <input type="time" name="start_time" id="start_time" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="end_time" class="form-label">Eindtijd:</label>
                    <input type="time" name="end_time" id="end_time" required class="form-control">
                </div>
            </div>

            <div class="action-container">
                <a href="{{ route('shifts.index') }}" class="back-link">
                    ← Terug naar shifts
                </a>
                <button type="submit" class="submit-btn">
                    Shift Aanmaken
                </button>
            </div>
        </form>
    </div>
</x-app-layout>