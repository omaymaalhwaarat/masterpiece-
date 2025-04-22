@extends('admin.layouts.admin')

@section('content')
<div class="products-container">
  <h2>Add New Product</h2>
  <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="name">Product Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description" required></textarea>
    </div>

    <div class="form-group">
      <label for="price">Price</label>
      <input type="number" class="form-control" id="price" name="price" required>
    </div>

    <div class="form-group">
      <label for="stock">Stock</label>
      <input type="number" class="form-control" id="stock" name="stock" required>
    </div>

    <div class="form-group">
      <label for="category_id">Category</label>
      <select class="form-control" id="category_id" name="category_id" required>
        @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
        <label for="discount_id">Discount</label>
        <select class="form-control" id="discount_id" name="discount_id">
            <option value="">No Discount</option>
            @foreach($discounts as $discount)
                <option value="{{ $discount->id }}">
                    {{ $discount->code }} ({{ $discount->percentage }}% Off)
                </option>
            @endforeach
        </select>
    </div>
    
    <div class="form-group">
        <label for="how_to_use">How to Use</label>
        <textarea class="form-control" id="how_to_use" name="how_to_use" placeholder="Instructions for using the product"></textarea>
      </div>
    

    <div class="form-group">
      <label for="image">Image</label>
      <input type="file" class="form-control" id="image" name="images[]">
    </div>

    <button type="submit" class="btn btn-primary">Save Product</button>
  </form>
</div>
@endsection
