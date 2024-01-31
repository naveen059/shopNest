@extends('layouts.home')

@section('content')
    <div class="container mt-5">
        <h2>Your Order History</h2>

        @forelse ($orders as $order)
            <div class="card mb-3">
                <div class="card-header">
                    Order #{{ $order->id }}
                    <span class="float-end">Order Date: {{ $order->created_at->format('Y-m-d H:i:s') }}</span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Ordered Products:</h5>
                    <div class="row">
                        @forelse ($order->products as $product)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <img src="{{ asset($product->image) }}" class="card-img-top" alt="Product Image" style="max-height: 250px; object-fit: contain;">
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $product->title }}</h6>
                                        <p class="card-text">Description: {{ $product->description }}</p>
                                        <p class="card-text">Price: {{ $product->price }}</p>
                                        <p class="card-text">Quantity: {{ $product->pivot->quantity }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No products in this order.</p>
                        @endforelse
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('orders.payment', ['order' => $order->id]) }}" class="btn btn-primary">
                        Continue with Payment
                    </a>
                </div>
            </div>
        @empty
            <p>No order history available.</p>
        @endforelse
    </div>
@endsection
