@extends('admin.layouts.admin')

@section('content')
<div class="products-container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Products Management</h2>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
      <i class="fas fa-plus me-2"></i>Add New Product
    </a>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Image</th>
              <th>Name</th>
              <th>Category</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <td>{{ $product->id }}</td>
              <td>
                
                @foreach ($product->images as $image)
                <img src="{{ asset($image->image_path) }}" alt="Product Image"  width="50">
            @endforeach
                {{-- <img src="{{ asset($product->image ? 'storage/'.$product->image : 'images/placeholder.png') }}" 
                     alt="{{ $product->name }}" width="50"> --}}
              </td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->category->name }}</td>
              <td>JD {{ number_format($product->price, 2) }}</td>
              <td>{{ $product->stock }}</td>
              <td>
                <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-info">
                  <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="mt-4">
        {{ $products->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
