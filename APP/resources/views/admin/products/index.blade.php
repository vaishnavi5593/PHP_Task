@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Create Product</a>
    <ul>
        @foreach($products as $product)
            <li>
                {{ $product->name }} - ${{ $product->amount }}
                <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                <a href="{{ route('products.show', $product->id) }}">View</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
