@extends('admin.layouts.admin')

@section('content')
<div class="reviews-container">
  <h2 class="mb-4">Product Reviews</h2>

  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Product</th>
              <th>User</th>
              <th>Rating</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($reviews as $review)
            <tr>
              <td>{{ $review->id }}</td>
              <td>{{ $review->product->name }}</td>
              <td>{{ $review->user->name }}</td>
              <td>
                @for($i = 1; $i <= 5; $i++)
                  <i class="fas fa-star {{ $i <= $review->rating ? 'text-warning' : 'text-secondary' }}"></i>
                @endfor
              </td>
              <td>{{ $review->created_at->format('d M Y') }}</td>
              <td>
                <a href="{{ route('admin.reviews.show', $review->id) }}" class="btn btn-sm btn-primary">
                  <i class="fas fa-eye"></i>
                </a>
                <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" class="d-inline">
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
        {{ $reviews->links() }}
      </div>
    </div>
  </div>
</div>
@endsection
