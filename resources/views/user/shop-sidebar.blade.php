@include('user.navbar')

@if (session('success'))
  <div class="position-fixed top-50 start-50 translate-middle" style="z-index: 1055;">
    <div id="profileToast" 
         class="toast show text-center border-0" 
         role="alert" 
         style="background-color: rgba(255, 255, 255, 0.85); color: #c85c8e; font-family: 'Poppins', sans-serif; font-size: 1.1rem; padding: 1rem 2rem; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1);">
      {{ session('success') }}
    </div>
  </div>
@endif


<section class="hero-section jarallax">
  <img src="images/banner-large-7.jpg" class="jarallax-img">
  <div class="py-5">
    <div class="container">
      <div class="row mt-5">
        <div class="d-flex flex-wrap flex-column justify-content-center align-items-center my-5 py-5 text-white">
          <h1 class="page-title text-uppercase mt-5 display-4">Shop</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="py-5">
  <div class="container">
    <div class="row flex-md-row-reverse g-5">
      <main class="main-content col-md-9">
        <div class="row py-2">
          <div class="col-md-9">
            <span>Showing 1–12 of 55 results</span>
          </div>
          <div class="col-md-3">
            <form action="{{ route('user.shop-sidebar') }}" method="GET">
              <select name="filter" class="form-select border-0" aria-label="Default select example" onchange="this.form.submit()">
                <option value="" selected>All</option>
                <option value="price">Price</option>
                <option value="best_sellers">Best Sellers</option>
              </select>
            </form>
            
          </div>
        </div>

        <div class="row my-5">
          @foreach ($products as $product)
            <div class="col-md-4 mb-5 product-item">
              <div class="image-holder position-relative">
                <a href="{{ route('user.product.show', $product->id) }}">
                  <img src="{{ asset( $product->images->first()->image_path) }}" alt="categories" class="product-image img-fluid">
                </a>
                <a href="wishlist.html" class="btn-icon btn-wishlist">
                  <svg width="24" height="24" viewBox="0 0 24 24" class="svg-color">
                    <use xlink:href="#heart"></use>
                  </svg>
                </a>
                <a href="wishlist.html" class="btn-icon btn-cart">
                  <svg width="24" height="24" viewBox="0 0 24 24" class="svg-color">
                    <use xlink:href="#cart"></use>
                  </svg>
                </a>
                <div class="product-content">
                  <h5 class="element-title text-uppercase fs-6 mt-3">
                    <a href="{{ route('user.product.show', $product->id) }}">{{ $product->name }}</a>
                  </h5>

                  <!-- عرض السعر الأصلي والسعر بعد الخصم -->
                  @if($product->discount_price)
                    <span class="original-price text-decoration-line-through">${{ number_format($product->price, 2) }}</span>
                    <span class="discounted-price">${{ number_format($product->discount_price, 2) }}</span>
                  @else
                    <span class="price">${{ number_format($product->price, 2) }}</span>
                  @endif
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <nav aria-label="Page navigation" class="d-flex justify-content-center mt-5">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <i class="icon icon-arrow-left"></i>
              </a>
            </li>
            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <i class="icon icon-arrow-right"></i>
              </a>
            </li>
          </ul>
        </nav>
      </main>

      <aside class="col-md-3">
        <div class="sidebar">
          <div class="sidebar-categories border-animation-left mb-5">
            <div class="text-dark text-uppercase mb-4">Browse By Categories:</div>
            <ul class="list-unstyled">
              <li>
                <a href="#" class="item-anchor">All</a>
              </li>
              @foreach ($categories as $category)
                <li>
                  <a href="{{ route('user.shop-sidebar', ['category_id' => $category->id]) }}" class="item-anchor">{{ $category->name }}</a>
                </li>
              @endforeach
            </ul>
          </div>

          <div class="product-filter padding-small">
            <div class="text-dark text-uppercase">Filter By:</div>
            <div class="accordion" id="accordionExample">
              <!-- Accordion items here -->
            </div>
          </div>
        </div>
      </aside>
    </div>
  </div>
</div>

<section class="newsletter my-5" style="background: url(images/newsletter-image.jpg) no-repeat;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 py-5 my-5">
        <div class="subscribe-header text-center pb-3">
          <h3 class="section-title text-uppercase">Sign Up for our newsletter</h3>
        </div>
        <form action="{{ route('user.shop-sidebar') }}" method="GET">
          <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products...">
          <button type="submit">Search</button>
        </form>
 
      </div>
    </div>
  </div>
</section>

<section class="instagram my-5 py-5">
  <div class="container">
    <h4 class="text-center py-3">Follow us on Instagram</h4>
    <div class="row d-flex flex-wrap my-3 g-0">
      <!-- Instagram posts here -->
    </div>
  </div>
</section>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var toastEl = document.getElementById('profileToast');
    if (toastEl) {
      setTimeout(() => {
        toastEl.classList.remove('show');
        toastEl.remove(); // يختفي بعد كم ثانية
      }, 2000); // يختفي بعد 4 ثواني
    }
  });
</script>

@include('user.footer')

