@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $product->name }}</h1>
    <p>Amount: ${{ $product->amount }}</p>
    <p>Description: {{ $product->description }}</p>
    @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" width="200">
    @endif
</div>
@endsection
