@extends('admin.layouts.admin')

@section('content')
<div class="order-container">
  <h2>Order #{{ $order->id }} Details</h2>

  <div class="card">
    <div class="card-body">
      <div class="mb-3">
        <strong>Customer:</strong> {{ $order->user->name }}
      </div>
      <div class="mb-3">
        <strong>Order Date:</strong> {{ $order->created_at->format('d M Y') }}
      </div>
      <div class="mb-3">
        <strong>Total Amount:</strong> JD {{ number_format($order->total, 2) }}
      </div>
      <div class="mb-3">
        <strong>Status:</strong> 
        <span class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'pending' ? 'warning' : 'danger') }}">
          {{ ucfirst($order->status) }}
        </span>
      </div>

      <h4>Order Items</h4>
      <table class="table">
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orderItems as $item)
          <tr>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>JD {{ number_format($item->price, 2) }}</td>
            <td>JD {{ number_format($item->total, 2) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
