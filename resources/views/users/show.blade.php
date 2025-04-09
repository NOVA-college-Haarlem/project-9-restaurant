<x-app-layout>
    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Details van {{ $user->name }}</title>
        <style>
            
        </style>
    </head>

    <body>
        <div class="user-detail-container">
            <h1 class="user-detail-title">Details van {{ $user->name }}</h1>

            <div class="user-info">
                <div class="info-item">
                    <span class="info-label">Email:</span>
                    <span>{{ $user->email }}</span>
                </div>

                <div class="info-item">
                    <span class="info-label">Rol:</span>
                    <span class="role-badge 
                    @if($user->role === 'admin') role-admin
                    @elseif($user->role === 'staff') role-staff
                    @else role-customer
                    @endif">
                        {{ ucfirst($user->role) }}
                    </span>
                </div>

                <div class="info-item">
                    <span class="info-label">Gewerkte uren:</span>
                    <span>{{ $hours }} uur en {{ $minutes }} minuten</span>
                </div>
            </div>

            <h2 class="shifts-title">Toegewezen shifts</h2>

            @if($user->shifts->isEmpty())
            <p class="no-shifts">Geen shifts toegewezen.</p>
            @else
            <table class="shifts-table">
                <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Starttijd</th>
                        <th>Eindtijd</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->shifts as $shift)
                    <tr>
                        <td>{{ $shift->start_time->format('Y-m-d') }}</td>
                        <td>{{ $shift->start_time->format('H:i') }}</td>
                        <td>{{ $shift->end_time->format('H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

            <a href="{{ route('users.index') }}" class="back-link">← Terug naar gebruikerslijst</a>
        </div>
    </body>

    </html>
</x-app-layout>