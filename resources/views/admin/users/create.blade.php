@extends('admin.layouts.admin')

@section('content')
<div class="users-container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Create New User</h2>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
      <i class="fas fa-arrow-left me-2"></i>Back to Users
    </a>
  </div>

  <div class="card">
    <div class="card-body">
      <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>
        
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        
        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
        
        <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select class="form-select" id="role" name="role" required>
            <option value="user">Regular User</option>
            <option value="admin">Administrator</option>
          </select>
        </div>
        
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-save me-2"></i>Save User
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
