@extends('admin.layouts.admin')

@section('content')
<div class="categories-container">
  <h2>Create New Category</h2>

  <div class="card">
    <div class="card-body">
      <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Category Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Save Category</button>
      </form>
    </div>
  </div>
</div>
@endsection
