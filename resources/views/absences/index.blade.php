<x-app-layout>
    <div class="container">
        <h1>Overzicht afwezigheden</h1>

        <table class="table">
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
                <tr>
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