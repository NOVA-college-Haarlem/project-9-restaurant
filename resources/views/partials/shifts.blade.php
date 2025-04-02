@extends('layouts.app')

@section('content')
   
   <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shifts van {{ $user->name }}</title>
    </head>

    <body>
        <h1>Shifts van {{ $user->name }}</h1>

        <p>Totaal gewerkte tijd: {{ $totalHours }} uur en {{ $totalMinutes }} minuten</p>

        <a href="{{ route('shifts.create', $user) }}">Nieuwe Shift Toevoegen</a>

        <table border="1">
            <tr>
                <th>Starttijd</th>
                <th>Eindtijd</th>
                <th>Status</th>
                <th>Acties</th>
            </tr>
            @foreach($shifts as $shift)
            <tr>
                <td>{{ $shift->start_time }}</td>
                <td>{{ $shift->end_time }}</td>
                <td>{{ $shift->status }}</td>
                <td>
                    @if($shift->status == 'assigned')
                    <form action="{{ route('shifts.update-status', $shift) }}" method="POST">
                        @csrf
                        <button type="submit">Markeer als gewerkt</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>

        <a href="{{ route('users.index', ['role' => 'staff']) }}">Terug naar staff overzicht</a>

    </body>

    
    </html>
