@extends('admin.layouts.admin')

@section('content')
<div class="users-container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Users Management</h2>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
      <i class="fas fa-plus me-2"></i>Add New User
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
              <th>Email</th>
              <th>Role</th>
              <th>Registered At</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                <span class="badge bg-{{ $user->role === 'admin' ? 'primary' : 'secondary' }}">
                  {{ ucfirst($user->role) }}
                </span>
              </td>
              
              <td>{{ $user->created_at->format('d M Y') }}</td>
              <td>
                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">
                  <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
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
        {{ $users->links() }}
      </div>
    </div>
  </div>
</div>
@endsection