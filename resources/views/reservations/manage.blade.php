@extends('layouts.app')

@section('content')
<h2>Reserveringen</h2>
<a href="{{ route('reservations.create') }}">Nieuwe reservering</a>

<table>
    <tr>
        <th>Datum</th>
        <th>Gasten</th>
        <th>Status</th>
        <th>Acties</th>
    </tr>
    @foreach($reservations as $res)
    <tr>
        <td>{{ $res->date }}</td>
        <td>{{ $res->guests }}</td>
        <td>{{ $res->status }}</td>
        <td>
            <a href="{{ route('reservations.edit', $res) }}">Bewerken</a>
            <form action="{{ route('reservations.destroy', $res) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit">Verwijderen</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
