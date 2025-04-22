@extends('admin.layouts.admin')

@section('content')
<div class="order-container">
  <h2>Edit Order #{{ $order->id }}</h2>

  <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
      <label for="status">Order Status</label>
      <select class="form-control" id="status" name="status" required>
        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Status</button>
  </form>
</div>
@endsection
