
@extends('layouts.app') 

@section('content')
    <div class="container mt-5">
        <h2>{{ $product->title }}</h2>
        <img src="{{ asset($product->image) }}" class="img-fluid" alt="{{ $product->title }}">
        <p>{{ $product->description }}</p>
        <p><strong>Price: ${{ $product->price }}</strong></p>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Product List</a>
    </div>
@endsection
