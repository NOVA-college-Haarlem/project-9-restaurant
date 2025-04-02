@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tafelbeheer</h1>

    <a href="{{ route('tables.create') }}" class="btn btn-primary mb-3">Nieuwe Tafel Toevoegen</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Capaciteit</th>
                <th>Status</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tables as $table)
                <tr>
                    <td>{{ $table->name }}</td>
                    <td>{{ $table->capacity }} personen</td>
                    <td>
                        <span class="badge bg-{{ $table->status == 'available' ? 'success' : ($table->status == 'reserved' ? 'warning' : 'danger') }}">
                            {{ ucfirst($table->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('tables.edit', $table) }}" class="btn btn-warning btn-sm">Bewerken</a>
                        <form action="{{ route('tables.destroy', $table) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
