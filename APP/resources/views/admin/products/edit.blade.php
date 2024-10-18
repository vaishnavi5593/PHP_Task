@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Product Name</label>
            <input type="text" name="name" value="{{ $product->name }}" required>
        </div>
        <div>
            <label for="amount">Amount</label>
            <input type="number" name="amount" value="{{ $product->amount }}" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" required>{{ $product->description }}</textarea>
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" name="image">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" width="100">
            @endif
        </div>
        <button type="submit">Update</button>
    </form>
</div>
@endsection
