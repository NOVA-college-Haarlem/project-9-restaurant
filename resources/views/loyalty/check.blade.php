@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Check Jouw Loyalty Punten</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('loyalty.check') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Jouw E-mail" required class="form-control mb-2">
    <button type="submit" class="btn btn-primary">Bekijk Mijn Punten</button>
</form>

</div>
@endsection
