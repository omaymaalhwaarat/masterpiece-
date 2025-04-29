@include('user.navbar')

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
          <div class="col-md-3">
            <span>Showing 1–12 of 55 results</span>
          </div>
          <div class="col-md-6">
            <form action="{{ route('user.shop-sidebar') }}" method="GET">
              <input class="border-0" type="text" name="search" value="{{ request('search') }}" placeholder="Search products...">
              <button class="border-0" type="submit">Search</button>
            </form>
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
                  <img src="{{ asset($product->images->first()->image_path) }}" alt="categories" class="product-image img-fluid" style="border-radius: 5%">
                </a>
                <!-- إضافة المنتج إلى الـ Wishlist عبر الرابط في الـ Controller -->
                <a href="{{ route('user.addToWishlist', $product->id) }}" class="btn-icon btn-wishlist">
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
              <li><a href="#" class="item-anchor">All</a></li>
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
              <!-- Price Filter -->
              <div class="accordion-item">
                <div class="accordion-header" id="heading-one">
                  <button class="accordion-button py-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse-one" aria-expanded="true" aria-controls="collapse-one">
                    <span class="accordion-title fs-3">Price</span>
                  </button>
                </div>

                <div id="collapse-one" class="accordion-collapse collapse show" aria-labelledby="heading-one">
                  <div class="accordion-body">
                    <form action="{{ route('user.shop-sidebar') }}" method="GET">
                      <div class="mb-3">
                        <label for="price_range" class="form-label">Select Price Range</label>
                        <select name="price_range" class="form-select" aria-label="Price Range" onchange="this.form.submit()">
                          <option value="10.00" {{ request('price_range') == '10.00' ? 'selected' : '' }}>&lt; $10</option>
                          <option value="20.00-40.00" {{ request('price_range') == '20.00-40.00' ? 'selected' : '' }}>$20 - $40</option>
                          <option value="40.00-50.00" {{ request('price_range') == '40.00-50.00' ? 'selected' : '' }}>$40 - $50</option>
                          <option value="50.00-60.00" {{ request('price_range') == '50.00-60.00' ? 'selected' : '' }}>$50 - $60</option>
                          <option value="60.00" {{ request('price_range') == '60' ? 'selected' : '' }}>&gt; $60</option>
                        </select>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- Best Seller Filter -->
              <div class="accordion-item">
                <div class="accordion-header" id="heading-three">
                  <button class="accordion-button py-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse-three" aria-expanded="true" aria-controls="collapse-three">
                    <span class="accordion-title fs-3">Best Seller</span>
                  </button>
                </div>
                <div id="collapse-three" class="accordion-collapse collapse show" aria-labelledby="heading-three">
                  <div class="accordion-body">
                    <form action="{{ route('user.shop-sidebar') }}" method="GET">
                      <div>
                        <label for="best_seller">
                          <input type="checkbox" name="best_seller" value="1" {{ request('best_seller') ? 'checked' : '' }}>
                          Best Seller
                        </label>
                      </div>
                      <button type="submit" class="btn btn-primary mt-3">Apply</button>
                    </form>
                  </div>
                </div>
              </div>

              <!-- New Arrivals Filter -->
              <div class="accordion-item">
                <div class="accordion-header" id="heading-four">
                  <button class="accordion-button py-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse-four" aria-expanded="true" aria-controls="collapse-four">
                    <span class="accordion-title fs-3">New Arrivals</span>
                  </button>
                </div>
                <div id="collapse-four" class="accordion-collapse collapse show" aria-labelledby="heading-four">
                  <div class="accordion-body">
                    <a href="#">HYDRA BEAUTY MICRO CRÈME YEUX Illuminating <span class="count">(100)</span></a>
                    <a href="#">GET-BACK Targeted Body Acne Spray <span class="count">(80)</span></a>
                    <a href="#">Day & Night Neck Treatment Duo <span class="count">(90)</span></a>
                    <a href="#">B-Goldi Bright Drops <span class="count">(70)</span></a>
                    <a href="#">LE GEL COAT Longwear Top Coat <span class="count">(50)</span></a>
                  </div>
                </div>
              </div>

              <!-- Reset Filters -->
              <a href="{{ route('user.shop-sidebar') }}" class="btn-link text-uppercase item-anchor">Reset All Filters</a>
            </div>
          </div>
        </div>
      </aside>
    </div>
  </div>
</div>

@include('user.footer')
