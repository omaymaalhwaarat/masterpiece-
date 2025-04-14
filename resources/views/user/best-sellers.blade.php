<section id="best-sellers" class="best-sellers product-carousel position-relative py-5 my-5 open-up"
  data-aos="zoom-out">
  <div class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-center my-5 py-lg-5">
      <div class="line-img my-2">
        <img src="images/line.png" alt="">
      </div>
      <h4 class="text-uppercase mb-0">Best Selling Items</h4>
      <div class="line-img my-2">
        <img src="images/line.png" alt="">
      </div>
    </div>
    <div class="swiper product-swiper overflow-hidden">
      <div class="swiper-wrapper d-flex">
        @foreach ($bestSellers as $product )
        
        <div class="swiper-slide">
          <div class="product-item ">
            <div class="image-holder position-relative">
              <a href="{{ route('user.shop-sidebar', $product->id) }}">
                <img src="{{ $product->images->first()->image_path ?? 'images/default-product.jpg' }}" alt="categories" class="product-image img-fluid">
              </a>
              <a href="wishlist.html" class="btn-icon btn-wishlist ">
                <svg width="24" height="24" viewBox="0 0 24 24" class="svg-color">
                  <use xlink:href="#heart"></use>
                </svg>
              </a>
              <a href="wishlist.html" class="btn-icon btn-cart ">
                <svg width="24" height="24" viewBox="0 0 24 24" class="svg-color">
                  <use xlink:href="#cart"></use>
                </svg>
              </a>
              <div class="product-content">
                <h5 class="element-title text-uppercase fs-6 mt-3">
                  <a href="{{ route('user.shop-sidebar', $product->id) }}">{{ $product->name }}</a>
                </h5>
                <a href="#" class="text-decoration-none" data-after="Add to cart">
                  <span>${{ number_format($product->price, 2) }}</span>
              </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    
    </div>
    </div>
    <div class="icon-arrow no-outline icon-arrow-left bg-light"></div>
    <div class="icon-arrow no-outline icon-arrow-right bg-light"></div>
    <div class="text-center mt-5">
      <a href="{{ route('user.shop-sidebar') }}" class="btn-link">View All Products</a>
    </div>

  </div>
</section>