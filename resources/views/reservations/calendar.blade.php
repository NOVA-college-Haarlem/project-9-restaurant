<x-app-layout>
<h2>Reserveringen Kalender</h2>
<ul>
    @foreach($reservations as $res)
    <li>{{ $res->date }} - {{ $res->guests }} gasten</li>
    @endforeach
</ul>
</x-app-layout>