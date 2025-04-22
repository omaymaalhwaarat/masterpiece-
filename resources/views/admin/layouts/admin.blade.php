<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sara Shop - Admin Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

  @stack('styles')
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 col-lg-2 bg-light text-dark p-4" id="sidebar" style="height: 100vh; border-right: 1px solid #ddd;">
        <h4 class="text-center mb-4" style="font-family: 'Lora', serif;">Sara Dashboard</h4>
        <ul class="nav flex-column">
          <li class="nav-item mb-3">
            <a class="nav-link text-dark" href="{{ route('admin.dashboard') }}" style="font-size: 1.1rem;">
              <i class="fas fa-tachometer-alt me-2"></i>Dashboard
            </a>
          </li>
          <li class="nav-item mb-3">
            <a class="nav-link text-dark" href="{{ route('admin.users.index') }}" style="font-size: 1.1rem;">
              <i class="fas fa-users me-2"></i>Users
            </a>
          </li>
          <li class="nav-item mb-3">
            <a class="nav-link text-dark" href="{{ route('admin.categories.index') }}" style="font-size: 1.1rem;">
              <i class="fas fa-tags me-2"></i>Categories
            </a>
          </li>
          <li class="nav-item mb-3">
            <a class="nav-link text-dark" href="{{ route('admin.products.index') }}" style="font-size: 1.1rem;">
              <i class="fas fa-box-open me-2"></i>Products
            </a>
          </li>
          <li class="nav-item mb-3">
            <a class="nav-link text-dark" href="{{ route('admin.orders.index') }}" style="font-size: 1.1rem;">
              <i class="fas fa-shopping-cart me-2"></i>Orders
            </a>
          </li>
          <li class="nav-item mb-3">
            <a class="nav-link text-dark" href="{{ route('admin.reviews.index') }}" style="font-size: 1.1rem;">
              <i class="fas fa-star me-2"></i>Reviews
            </a>
          </li>
          <li class="nav-item mt-5">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="btn btn-danger w-100">
                <i class="fas fa-sign-out-alt me-2"></i>Logout
              </button>
            </form>
          </li>
        </ul>
      </div>

      <!-- Main Content -->
      <div class="col-md-9 col-lg-10 p-4" id="main-content">
        @yield('content')
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  @stack('scripts')
</body>

</html>