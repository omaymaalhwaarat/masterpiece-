@extends('admin.layouts.admin')

@section('content')
<div class="categories-container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Categories Management</h2>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
      <i class="fas fa-plus me-2"></i>Add New Category
    </a>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Products Count</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
            <tr>
              <td>{{ $category->id }}</td>
              <td>{{ $category->name }}</td>
              <td>{{ $category->slug }}</td>
              <td>{{ $category->products_count }}</td>
              <td>
                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-warning">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
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
        {{ $categories->links() }}
      </div>
    </div>
  </div>
</div>
@endsection