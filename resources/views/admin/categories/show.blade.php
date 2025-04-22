@extends('admin.layouts.admin')

@section('content')
<div class="categories-container">
  <h2>Category Details</h2>

  <div class="card">
    <div class="card-body">
      <p><strong>Category Name:</strong> {{ $category->name }}</p>
      <p><strong>Created At:</strong> {{ $category->created_at }}</p>
      <p><strong>Updated At:</strong> {{ $category->updated_at }}</p>
    </div>
  </div>
</div>
@endsection
