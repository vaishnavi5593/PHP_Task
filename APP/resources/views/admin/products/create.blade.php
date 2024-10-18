@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Product</h1>
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Product Name</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label for="amount">Amount</label>
            <input type="number" name="amount" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" required></textarea>
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" name="image">
        </div>
        <button type="submit">Create</button>
    </form>
</div>
@endsection
