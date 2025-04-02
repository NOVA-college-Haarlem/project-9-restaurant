@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Betalen voor je Maaltijd</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulier voor betaling -->
    <form action="{{ route('payment.submit') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="payment_method">Kies betaalmethode</label>
            <select id="payment_method" name="payment_method" class="form-control" required>
                <option value="credit_card">Creditcard</option>
                <option value="debit_card">Debitcard</option>
                <option value="paypal">PayPal</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="amount">Bedrag (€)</label>
            <input type="number" id="amount" name="amount" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Betalen</button>
    </form>

    <hr>

    <!-- Formulier voor gesplitste rekening -->
    <form action="{{ route('payment.split') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="split_bill">Aantal Personen</label>
            <input type="number" id="split_bill" name="split_bill" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label for="total_amount">Totale Bedrag (€)</label>
            <input type="number" id="total_amount" name="total_amount" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-secondary">Rekening Splitsen</button>
    </form>

    <hr>

    <!-- Formulier voor fooi -->
    <form action="{{ route('payment.tip') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tip">Fooi (€)</label>
            <input type="number" id="tip" name="tip" class="form-control" min="0">
        </div>

        <div class="mb-3">
            <label for="amount">Bedrag (€)</label>
            <input type="number" id="amount" name="amount" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Fooi Toevoegen</button>
    </form>
</div>
@endsection
