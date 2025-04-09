<x-app-layout>
    <style>
        
    </style>

    <div class="absence-container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
            <h1 class="absence-title">Overzicht Afwezigheden</h1>
            <a href="{{ route('absences.create') }}" class="create-btn">
                Afwezigheid aanmaken
            </a>
        </div>

        <table class="absence-table">
            <thead>
                <tr>
                    <th>Medewerker</th>
                    <th>Startdatum</th>
                    <th>Einddatum</th>
                    <th>Aantal dagen</th>
                    <th>Reden</th>
                </tr>
            </thead>
            <tbody>
                @foreach($absences as $absence)
                @php
                    $today = now();
                    $rowClass = '';
                    if ($today->between($absence->start_date, $absence->end_date)) {
                        $rowClass = 'current-absence';
                    } elseif ($today->lt($absence->start_date)) {
                        $rowClass = 'future-absence';
                    }
                @endphp
                <tr class="{{ $rowClass }}">
                    <td>{{ $absence->user->name }}</td>
                    <td>{{ $absence->start_date->format('d-m-Y') }}</td>
                    <td>{{ $absence->end_date->format('d-m-Y') }}</td>
                    <td>{{ $absence->start_date->diffInDays($absence->end_date) + 1 }}</td>
                    <td>{{ $absence->reason ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>