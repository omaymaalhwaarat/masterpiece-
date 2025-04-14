
@include('user.navbar')

<section class="text-white">
  <div class="slideshow slide-in" style="height: 100vh;">
    <div class="swiper-wrapper">
      <div class="swiper-slide d-flex align-items-center"
        style="background-image:url(images/banner-large-image.png);">
        <div class="banner-content w-100">
          <div class="container ">
            <div class="row ">
              <div class="col-md-8 offset-md-2 text-center">
                <h2 class="section-title text-uppercase display-2 mt-5 ">Summer Glow</h2>
                <p class="caption opacity-75">Sara's natural products are perfect for summer, 
                  keeping your skin hydrated and glowing under the sun. Made with pure ingredients,
                   they nourish and protect against dryness. Enjoy a refreshing, chemical-free skincare routine all season long!</p>
                <div class="btn-left btn-swiper">
                  <a href="{{ route('user.shop-sidebar') }}" class="btn btn-light text-white bg-transparent text-uppercase mt-3">Shop Collection</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide d-flex align-items-center"
        style="background-image:url(images/banner-large-image1.png);">
        <div class="banner-content w-100">
          <div class="container ">
            <div class="row ">
              <div class="col-md-8 offset-md-2 text-center ">
                <h2 class="section-title text-uppercase display-2 mt-5">Summer Glow</h2>
                <p class="caption opacity-75">Stay fresh and radiant this summer with Sara’s natural products! Our chemical-free formulas keep your skin soft,
                   hydrated, and protected from the heat. Embrace the season with pure, nourishing care!</p>
                <div class="btn-left btn-swiper">
                  <a href="{{ route('user.shop-sidebar') }}" class="btn btn-light text-white bg-transparent text-uppercase mt-3">Shop Collection</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide d-flex align-items-center"
        style="background-image:url(images/banner-large-image2.jpg);">
        <div class="banner-content w-100">
          <div class="container ">
            <div class="row ">
              <div class="col-md-8 offset-md-2 text-center ">
                <h2 class="section-title text-uppercase display-2 mt-5">Summer Glow</h2>
                <p class="caption opacity-75">Sara’s natural products provide gentle care for your skin,
                   using pure ingredients to nourish and protect. Free from harsh chemicals, they keep your skin soft,
                   healthy, and radiant. Experience the beauty of nature in every product!</p>
                <div class="btn-left btn-swiper">
                  <a href="{{ route('user.shop-sidebar') }}" class="btn btn-light text-white bg-transparent text-uppercase mt-3">Shop Collection</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper-pagination swiper-pagination-slideshow "></div>

    <!-- <i class="icon-arrow  light-arrow icon-arrow-left"></i>
    <i class="icon-arrow  light-arrow icon-arrow-right"></i> -->
  </div>
</section>

<section class="features py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="0">
        <div class="py-5">
          <svg width="38" height="38" viewBox="0 0 24 24" class="svg-color">
            <use xlink:href="#calendar"></use>
          </svg>
          <h4 class="element-title text-capitalize my-3">Book An Appointment</h4>
          <p>At imperdiet dui accumsan sit amet nulla risus est ultricies quis.</p>
        </div>
      </div>
      <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="300">
        <div class="py-5">
          <svg width="38" height="38" viewBox="0 0 24 24" class="svg-color">
            <use xlink:href="#shopping-bag"></use>
          </svg>
          <h4 class="element-title text-capitalize my-3">Pick up in store</h4>
          <p>At imperdiet dui accumsan sit amet nulla risus est ultricies quis.</p>
        </div>
      </div>
      <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="600">
        <div class="py-5">
          <svg width="38" height="38" viewBox="0 0 24 24" class="svg-color">
            <use xlink:href="#gift"></use>
          </svg>
          <h4 class="element-title text-capitalize my-3">Special packaging</h4>
          <p>At imperdiet dui accumsan sit amet nulla risus est ultricies quis.</p>
        </div>
      </div>
      <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="900">
        <div class="py-5">
          <svg width="38" height="38" viewBox="0 0 24 24" class="svg-color">
            <use xlink:href="#arrow-cycle"></use>
          </svg>
          <h4 class="element-title text-capitalize my-3">free global returns</h4>
          <p>At imperdiet dui accumsan sit amet nulla risus est ultricies quis.</p>
        </div>
      </div>
    </div>
  </div>
</section>

@include('user.new-arrival')

@include('user.best-sellers')

@include('user.homecategories')

{{-- <section id="related-products" class="related-products product-carousel py-5 position-relative open-up"
  data-aos="zoom-out">
  <div class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-center my-5 py-lg-5">
      <div class="line-img my-2">
        <img src="images/line.png" alt="">
      </div>
      <h4 class="text-uppercase mb-0"> Related Products </h4>
      <div class="line-img my-2">
        <img src="images/line.png" alt="">
      </div>
    </div>
    <div class="swiper product-swiper overflow-hidden">
      <div class="swiper-wrapper d-flex">
        <div class="swiper-slide">
          <div class="product-item ">
            <div class="image-holder position-relative">
              <a href="single-product.html">
                <img src="images/product-item14.jpg" alt="categories" class="product-image img-fluid">
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
                  <a href="single-product.html">Natural Glow</a>
                </h5>
                <a href="#" class="text-decoration-none" data-after="Add to cart"><span>$95.00</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="product-item ">
            <div class="image-holder position-relative">
              <a href="single-product.html">
                <img src="images/product-item2.jpg" alt="categories" class="product-image img-fluid">
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
                  <a href="single-product.html">Natural Glow</a>
                </h5>
                <a href="#" class="text-decoration-none" data-after="Add to cart"><span>$95.00</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="product-item ">
            <div class="image-holder position-relative">
              <a href="single-product.html">
                <img src="images/product-item10.jpg" alt="categories" class="product-image img-fluid">
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
                  <a href="single-product.html">Natural Glow</a>
                </h5>
                <a href="#" class="text-decoration-none" data-after="Add to cart"><span>$95.00</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="product-item ">
            <div class="image-holder position-relative">
              <a href="single-product.html">
                <img src="images/product-item6.jpg" alt="categories" class="product-image img-fluid">
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
                  <a href="single-product.html">Natural Glow</a>
                </h5>
                <a href="#" class="text-decoration-none" data-after="Add to cart"><span>$95.00</span></a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="product-item ">
            <div class="image-holder position-relative">
              <a href="single-product.html">
                <img src="images/product-item4.jpg" alt="categories" class="product-image img-fluid">
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
                  <a href="single-product.html">Natural Glow</a>
                </h5>
                <a href="#" class="text-decoration-none" data-after="Add to cart"><span>$95.00</span></a>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
    <div class="icon-arrow no-outline icon-arrow-left bg-light"></div>
    <div class="icon-arrow no-outline icon-arrow-right bg-light"></div>
    <div class="text-center mt-5">
      <a href="shop-sidebar.html" class="btn-link">View All Products</a>
    </div>

  </div>
</section> --}}

<section class="collection container py-5">
  <div
    class="collection-item  row g-4 d-flex justify-content-between align-items-center flex-direction-row flex-wrap my-5">
    <div class="col-md-5 column-container">
      <div class="cat-item position-relative">
        <div class="image-holder">
          {{-- <a href="{{ route('user.single-product', $highestDiscountProduct->id) }}"> --}}
            <img src="{{ $highestDiscountProduct->images->first()->image_path ?? 'images/default-product.jpg' }}" alt="categories" class="product-image img-fluid">
          </a>
          <div class="collection-content position-absolute p-5 text-uppercase">
            <h2 class="section-title text-white display-3"> 
              <strike>{{ number_format($highestDiscountProduct->price, 2) }} jd</strike> 
              Now {{ number_format($highestDiscountProduct->price - ($highestDiscountProduct->price * ($highestDiscountProduct->discount->percentage / 100)), 2) }} jd  OFF
            </h2>
            
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-7 column-container collection-bg">
      <div class="collection-content mx-md-5 my-5">
        <h2 class="element-title text-uppercase display-4 ">Summer collection</h2>
        <p>"Sara products are made with natural ingredients, ensuring that every item is safe and gentle for your skin. Our formulas are crafted with care to provide effective results without compromising your health. Take advantage of our highest discounts and enjoy premium quality at the best prices!"</p>
        <a href="{{ route('user.shop-sidebar') }}" class="btn btn-light text-white bg-transparent text-uppercase mt-3">Shop Collection</a>
      </div>
    </div>
  </div>
</section>


{{-- <section class="blog my-5 py-5">
  <div class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
      <h4 class="text-uppercase">Read Blog Posts</h4>
    </div>
    <div class="row">
      <div class="col-md-4">
        <article class="post-item">
          <div class="post-image">
            <a href="single-post.html">
              <img src="images/post-image1.jpg" alt="image" class="post-grid-image img-fluid">
            </a>
          </div>
          <div class="post-content d-flex flex-wrap gap-2 my-3">
            <div class="post-meta text-uppercase  text-secondary">
              <span class="post-category">Fashion /</span>
              <span class="meta-day"> jul 11, 2022</span>
            </div>
            <h5 class="post-title text-uppercase">
              <a href="single-post.html">How to look outstanding in pastel</a>
            </h5>
            <p>Dignissim lacus,turpis ut suspendisse vel tellus.Turpis purus,gravida orci,fringilla...</p>
          </div>
        </article>
      </div>
      <div class="col-md-4">
        <article class="post-item">
          <div class="post-image">
            <a href="single-post.html">
              <img src="images/post-image2.jpg" alt="image" class="post-grid-image img-fluid">
            </a>
          </div>
          <div class="post-content d-flex flex-wrap gap-2 my-3">
            <div class="post-meta text-uppercase  text-secondary">
              <span class="post-category">Fashion /</span>
              <span class="meta-day"> jul 11, 2022</span>
            </div>
            <h5 class="post-title text-uppercase">
              <a href="single-post.html">Top 10 make-up trend for summer</a>
            </h5>
            <p>Turpis purus, gravida orci, fringilla dignissim lacus, turpis ut suspendisse vel tellus...</p>
          </div>
        </article>
      </div>
      <div class="col-md-4">
        <article class="post-item">
          <div class="post-image">
            <a href="single-post.html">
              <img src="images/post-image3.jpg" alt="image" class="post-grid-image img-fluid">
            </a>
          </div>
          <div class="post-content d-flex flex-wrap gap-2 my-3">
            <div class="post-meta text-uppercase  text-secondary">
              <span class="post-category">Fashion /</span>
              <span class="meta-day"> jul 11, 2022</span>
            </div>
            <h5 class="post-title text-uppercase">
              <a href="single-post.html">daily skin care routine for teens</a>
            </h5>
            <p>Turpis purus, gravida orci, fringilla dignissim lacus, turpis ut suspendisse vel tellus...</p>
          </div>
        </article>
      </div>
    </div>
    <div class=" text-center py-3">
      <a href="blog-Summer.html" class="btn-link">View All</a>
    </div>
  </div>
</section> --}}

<section class="newsletter my-5" style="background: url(images/newsletter-image.jpg) no-repeat; ">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 py-5 my-5">
        <div class="subscribe-header text-center pb-3">
          <h3 class="section-title text-uppercase ">Sign Up for our newsletter</h3>
        </div>
        <form id="form" class="d-flex flex-wrap gap-2">
          <input type="text" name="email" placeholder="Your Email Addresss"
            class="form-control form-control-lg rounded-pill fs-6 py-3 px-4 ">
          <button class="btn btn-dark btn-lg bg-dark text-white text-uppercase rounded-pill py-3 w-100">Sign
            Up</button>
        </form>
      </div>
    </div>
  </div>
</section>

<section class="instagram my-5 py-5">
  <div class="container">
    <h4 class="text-center py-3 ">Follow us on Instagram</h4>

    <div class="row d-flex flex-wrap my-3 g-0">
      <figure class=" col instagram-item magnific position-relative">
        <a href="https://www.instagram.com/sarashops93?igsh=MWVqam55em03M3hvaA==" class="">
          <img src="images/insta-item1.jpg" alt="instagram" class="insta-image">
          <div class="icon-overlay d-flex justify-content-center">
            <svg width="30" height="30" viewBox="0 0 30 30" style="color: #fff4f4;">
              <use xlink:href="#instagram"></use>
            </svg>
          </div>
        </a>
      </figure>
      <figure class=" col instagram-item magnific position-relative">
        <a href="https://www.instagram.com/sarashops93?igsh=MWVqam55em03M3hvaA==" class="">
          <img src="images/insta-item3.jpg" alt="instagram" class="insta-image">
          <div class="icon-overlay d-flex justify-content-center">
            <svg width="30" height="30" viewBox="0 0 30 30" style="color: #fff4f4;">
              <use xlink:href="#instagram"></use>
            </svg>
          </div>
        </a>
      </figure>
      <figure class=" col instagram-item magnific position-relative">
        <a href="https://www.instagram.com/sarashops93?igsh=MWVqam55em03M3hvaA==" class="">
          <img src="images/insta-item4.jpg" alt="instagram" class="insta-image">
          <div class="icon-overlay d-flex justify-content-center">
            <svg width="30" height="30" viewBox="0 0 30 30" style="color: #fff4f4;">
              <use xlink:href="#instagram"></use>
            </svg>
          </div>
        </a>
      </figure>
      <figure class=" col instagram-item magnific position-relative">
        <a href="https://www.instagram.com/sarashops93?igsh=MWVqam55em03M3hvaA==" class="">
          <img src="images/insta-item5.jpg" alt="instagram" class="insta-image">
          <div class="icon-overlay d-flex justify-content-center">
            <svg width="30" height="30" viewBox="0 0 30 30" style="color: #fff4f4;">
              <use xlink:href="#instagram"></use>
            </svg>
          </div>
        </a>
      </figure>
      <figure class=" col instagram-item magnific position-relative">
        <a href="https://www.instagram.com/sarashops93?igsh=MWVqam55em03M3hvaA==" class="">
          <img src="images/insta-item6.jpg" alt="instagram" class="insta-image">
          <div class="icon-overlay d-flex justify-content-center">
            <svg width="30" height="30" viewBox="0 0 30 30" style="color: #fff4f4;">
              <use xlink:href="#instagram"></use>
            </svg>
          </div>
        </a>
      </figure>
    </div>
  </div>
</section>

@include('user.footer')
