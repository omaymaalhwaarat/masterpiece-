@extends('admin.layouts.admin')

@section('content')
<div class="users-container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Edit User</h2>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
      <i class="fas fa-arrow-left me-2"></i>Back to Users
    </a>
  </div>

  <div class="card">
    <div class="card-body">
      <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
        </div>
        
        <div class="mb-3">
          <label for="password" class="form-label">Password (leave blank if not changing)</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        
        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-save me-2"></i>Save Changes
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
