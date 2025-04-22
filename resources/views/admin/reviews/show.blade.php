@extends('admin.layouts.admin')

@section('content')
<div class="review-container">
  <h2>Review Details</h2>

  <div class="card">
    <div class="card-body">
      <h5><strong>Product:</strong> {{ $review->product->name }}</h5>
      <p><strong>Review by:</strong> {{ $review->user->name }}</p>
      <p><strong>Rating:</strong> 
        @for($i = 1; $i <= 5; $i++)
          <i class="fas fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-secondary' }}"></i>
        @endfor
      </p>
      <p><strong>Comment:</strong> {{ $review->comment }}</p>
      <p><strong>Review Date:</strong> {{ $review->created_at->format('d M Y') }}</p>

      <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">Back to Reviews</a>
    </div>
  </div>
</div>
@endsection
