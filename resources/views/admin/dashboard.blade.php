@extends('admin.layouts.admin')

@section('content')
<div class="dashboard-container">
  <h2 class="mb-4">Dashboard Overview</h2>
  
  <!-- Stats Cards -->
  <div class="row mb-4">
    <div class="col-md-3">
      <div class="card stat-card bg-primary text-white">
        <div class="card-body">
          <div class="stat-value">{{ $totalOrders }}</div>
          <div class="stat-label">Total Orders</div>
          <i class="fas fa-shopping-cart stat-icon"></i>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card stat-card bg-success text-white">
        <div class="card-body">
          <div class="stat-value">{{ $totalProducts }}</div>
          <div class="stat-label">Total Products</div>
          <i class="fas fa-box-open stat-icon"></i>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card stat-card bg-info text-white">
        <div class="card-body">
          <div class="stat-value">{{ $totalUsers }}</div>
          <div class="stat-label">Total Customers</div>
          <i class="fas fa-users stat-icon"></i>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card stat-card bg-warning text-dark">
        <div class="card-body">
          <div class="stat-value">JD {{ number_format($totalRevenue, 2) }}</div>
          <div class="stat-label">Total Revenue</div>
          <i class="fas fa-money-bill-wave stat-icon"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- Recent Orders -->
  <div class="card mb-4">
    <div class="card-header">
      <h5>Recent Orders</h5>
    </div>
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
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($recentOrders as $order)
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
                  <i class="fas fa-eye"></i>
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection