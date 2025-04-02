@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Bestelling Plaatsen</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow p-4">
        <form action="{{ route('orders.place') }}" method="POST">
            @csrf

            <div class="mb-3">
                @foreach($menuItems as $menuItem)
                <div class="menu-item">
                    <!-- Label voor het menu-item -->
                    <label for="item_{{ $menuItem->id }}">{{ $menuItem->name }} (€{{ $menuItem->price }})</label>

                    <!-- Verborgen invoerveld voor het item-id -->
                    <input type="hidden" name="menu_items[{{ $menuItem->id }}][id]" value="{{ $menuItem->id }}">

                    <!-- Getal invoerveld voor de hoeveelheid -->
                    <input type="number" name="menu_items[{{ $menuItem->id }}][quantity]" min="0" value="0" required>
                </div>
                @endforeach

            </div>

            <div class="mb-3">
                <label for="delivery_type" class="form-label">Bezorging of Afhalen</label>
                <select name="delivery_type" id="delivery_type" class="form-select" required>
                    <option value="delivery">Bezorging</option>
                    <option value="pickup">Afhalen</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success w-100">Bestellen en Betalen</button>
        </form>
    </div>
</div>
@endsection