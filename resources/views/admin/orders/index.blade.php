@extends('admin.layouts.admin')

@section('content')
<div class="orders-container">
  <h2 class="mb-4">Orders Management</h2>

  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Customer</th>
              <th>Date</th>
              <th>Amount</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              <td>#{{ $order->id }}</td>
              <td>{{ $order->user->name }}</td>
              <td>{{ $order->created_at->format('d M Y') }}</td>
              <td>JD {{ number_format($order->total, 2) }}</td>
              <td>
                <span class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'pending' ? 'warning' : 'danger') }}">
                  {{ ucfirst($order->status) }}
                </span>
              </td>
              <td>
                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary">
                  <i class="fas fa-eye"></i> View
                </a>
                <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-sm btn-warning">
                  <i class="fas fa-edit"></i> Edit
                </a>
                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline">
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
        {{ $orders->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
