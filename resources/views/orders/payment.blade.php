@extends('layouts.home')

@section('content')
    <div class="container mt-5">
        <h2>Payment Details</h2>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('process.payment') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="card_number" class="form-label">Card Number</label>
                <input type="text" class="form-control" id="card_number" name="card_number" required>
            </div>

            <div class="mb-3">
                <label for="expiration_date" class="form-label">Expiration Date</label>
                <input type="text" class="form-control" id="expiration_date" name="expiration_date" required>
            </div>

            <div class="mb-3">
                <label for="cvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="cvv" name="cvv" required>
            </div>

            <button type="submit" class="btn btn-primary">Process Payment</button>
        </form>
    </div>
@endsection
