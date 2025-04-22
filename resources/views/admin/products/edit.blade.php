@extends('admin.layouts.admin')

@section('content')
<div class="products-container">
  <h2>Edit Product</h2>
  <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="name">Product Name</label>
      <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
    </div>

    <div class="form-group">
      <label for="price">Price</label>
      <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
    </div>

    <div class="form-group">
      <label for="stock">Stock</label>
      <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" required>
    </div>

    <div class="form-group">
      <label for="category_id">Category</label>
      <select class="form-control" id="category_id" name="category_id" required>
        @foreach($categories as $category)
          <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="discount_id">Discount</label>
      <select class="form-control" id="discount_id" name="discount_id">
        @foreach($discounts as $discount)
        <option value="{{ $discount->id }}" 
          {{ old('discount_id', $product->discount_id) == $discount->id ? 'selected' : '' }}>
          {{ $discount->name }} ({{ $discount->percentage }}% Off)
      </option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
        <label for="how_to_use">How to Use</label>
        <textarea class="form-control" id="how_to_use" name="how_to_use">{{ $product->how_to_use }}</textarea>
      </div>

    <div class="form-group">
      <label for="image">Image</label>
      <input type="file" class="form-control" id="image" name="image[]">
      @if($product->images->count() > 0)
      <img src="{{ asset($product->images->first()->image_path) }}" width="50" height="50" alt="Product Image">
      @endif
  
    </div>

    <button type="submit" class="btn btn-primary">Save Changes</button>
  </form>
</div>
@endsection
