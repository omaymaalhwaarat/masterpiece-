@extends('admin.layouts.admin')

@section('content')
<div class="products-container">
  <h2>Product Details</h2>
  <div class="card">
    <div class="card-body">
      <p><strong>Name:</strong> {{ $product->name }}</p>
      <p><strong>Description:</strong> {{ $product->description }}</p>
      <p><strong>Price:</strong> JD {{ number_format($product->price, 2) }}</p>
      <p><strong>Stock:</strong> {{ $product->stock }}</p>
      <p><strong>Category:</strong> {{ $product->category->name }}</p>
      <p><strong>Discount:</strong> {{ $product->discount_id ? $product->discount->name : 'No Discount' }}</p>

      @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" width="150">
      @else
        <img src="{{ asset('images/placeholder.png') }}" width="150">
      @endif
    </div>
  </div>
  <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mt-4">Back to Products</a>
</div>
@endsection
