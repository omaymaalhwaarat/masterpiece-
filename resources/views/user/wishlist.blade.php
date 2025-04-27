@include('user.navbar')


  {{-- <section class="py-5">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mt-5">
        <h1 class="page-title display-4">Wishlist</h1>
        <nav class="breadcrumb fs-6">
          <a class="breadcrumb-item nav-link" href="#">Home</a>
          <a class="breadcrumb-item nav-link" href="#">Pages</a>
          <span class="breadcrumb-item active" aria-current="page">Wishlist</span>
        </nav>
      </div>
    </div>
  </section>

  <section id="Wishlist" class="py-5 mb-5">
    <div class="container">
      <div class="row text-dark my-3">
        <div class="col-5 text-uppercase">Product</div>
        <div class="col-2 text-uppercase">Unit Price</div>
        <div class="col-2 text-uppercase">Stock Status</div>
      </div>
      <div class="product-wrapper">
        <div class="product-item row align-items-center mb-4">
          <div class="col-4 col-md-1 d-flex align-items-center text-left">
            <a href="#">
              <img srcset="images/wishlist-item1.jpg" alt="wishlist" class="img-fluid">
            </a>
          </div>
          <div class="col-8 col-md-4">
            <h3 class="item-title text-uppercase fs-5">
              <a href="#">high coverage conceler</a>
            </h3>
          </div>
          <div class="col-3 col-md-2 product-price text-left">
            <span class="item-price">$54.99</span>
          </div>
          <div class="col-3 col-md-2 wishlist-stock text-left">
            <span class="item-stock">In Stock</span>
          </div>
          <div class="col-3 col-md-2 wishlist-add text-left">
            <form action="" method="post" class="variants">
              <a class="btn btn-outline-dark text-uppercase" title="Add to Cart" href="#">Add To Cart</a>
            </form>
          </div>
          <div class="col-3 col-md-1 text-left">
            <div class="cart-remove">
              <a href="#">
                <svg width="32px">
                  <use xlink:href="#trash"></use>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="product-item row align-items-center mb-4">
          <div class="col-4 col-md-1 d-flex align-items-center text-left">
            <a href="#">
              <img srcset="images/wishlist-item2.jpg" alt="wishlist" class="img-fluid">
            </a>
          </div>
          <div class="col-8 col-md-4">
            <h3 class="item-title text-uppercase fs-5">
              <a href="#">lip scrub</a>
            </h3>
          </div>
          <div class="col-3 col-md-2 product-price text-left">
            <span class="item-price">$94.99</span>
          </div>
          <div class="col-3 col-md-2 wishlist-stock text-left">
            <span class="item-stock">In Stock</span>
          </div>
          <div class="col-3 col-md-2 wishlist-add text-left">
            <form action="" method="post" class="variants">
              <a class="btn btn-outline-dark text-uppercase" title="Add to Cart" href="#">Add To Cart</a>
            </form>
          </div>
          <div class="col-3 col-md-1 text-left">
            <div class="cart-remove">
              <a href="#">
                <svg width="32px">
                  <use xlink:href="#trash"></use>
                </svg>
              </a>
            </div>
          </div>
        </div>
        <div class="product-item row align-items-center mb-4">
          <div class="col-4 col-md-1 d-flex align-items-center text-left">
            <a href="#">
              <img srcset="images/wishlist-item3.jpg" alt="wishlist" class="img-fluid">
            </a>
          </div>
          <div class="col-8 col-md-4">
            <h3 class="item-title text-uppercase fs-5">
              <a href="#">coffee soap</a>
            </h3>
          </div>
          <div class="col-3 col-md-2 product-price text-left">
            <span class="item-price">$54.99</span>
          </div>
          <div class="col-3 col-md-2 wishlist-stock text-left">
            <span class="item-stock">In Stock</span>
          </div>
          <div class="col-3 col-md-2 wishlist-add text-left">
            <form action="" method="post" class="variants">
              <a class="btn btn-outline-dark text-uppercase" title="Add to Cart" href="#">Add To Cart</a>
            </form>
          </div>
          <div class="col-3 col-md-1 text-left">
            <div class="cart-remove">
              <a href="#">
                <svg width="32px">
                  <use xlink:href="#trash"></use>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

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
          <a href="#" class="">
            <img src="images/insta-item1.jpg" alt="instagram" class="insta-image">
            <div class="icon-overlay d-flex justify-content-center">
              <svg width="30" height="30" viewBox="0 0 30 30" style="color: #fff4f4;">
                <use xlink:href="#instagram"></use>
              </svg>
            </div>
          </a>
        </figure>
        <figure class=" col instagram-item magnific position-relative">
          <a href="#" class="">
            <img src="images/insta-item3.jpg" alt="instagram" class="insta-image">
            <div class="icon-overlay d-flex justify-content-center">
              <svg width="30" height="30" viewBox="0 0 30 30" style="color: #fff4f4;">
                <use xlink:href="#instagram"></use>
              </svg>
            </div>
          </a>
        </figure>
        <figure class=" col instagram-item magnific position-relative">
          <a href="#" class="">
            <img src="images/insta-item4.jpg" alt="instagram" class="insta-image">
            <div class="icon-overlay d-flex justify-content-center">
              <svg width="30" height="30" viewBox="0 0 30 30" style="color: #fff4f4;">
                <use xlink:href="#instagram"></use>
              </svg>
            </div>
          </a>
        </figure>
        <figure class=" col instagram-item magnific position-relative">
          <a href="#" class="">
            <img src="images/insta-item5.jpg" alt="instagram" class="insta-image">
            <div class="icon-overlay d-flex justify-content-center">
              <svg width="30" height="30" viewBox="0 0 30 30" style="color: #fff4f4;">
                <use xlink:href="#instagram"></use>
              </svg>
            </div>
          </a>
        </figure>
        <figure class=" col instagram-item magnific position-relative">
          <a href="#" class="">
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
  </section> --}}





      <section id="Wishlist" class="py-5 mb-5">
          <div class="container">
              <div class="row text-dark my-3">
                  <div class="col-5 text-uppercase">Product</div>
                  <div class="col-2 text-uppercase">Unit Price</div>
                  <div class="col-2 text-uppercase">Stock Status</div>
              </div>
              <div id="wishlist-items" class="product-wrapper">
                  <!-- سيتم إضافة العناصر هنا عبر JavaScript -->
                  @foreach ($wishlist as $item)
                      <div class="product-item row align-items-center mb-4">
                          <div class="col-4 col-md-1 d-flex align-items-center text-left">
                              <a href="#">
                                  <img src="{{ $item['productImage'] }}" alt="wishlist" class="img-fluid">
                              </a>
                          </div>
                          <div class="col-8 col-md-4">
                              <h3 class="item-title text-uppercase fs-5">
                                  <a href="#">{{ $item['productName'] }}</a>
                              </h3>
                          </div>
                          <div class="col-3 col-md-2 product-price text-left">
                              <span class="item-price">${{ $item['productPrice'] }}</span>
                          </div>
                          <div class="col-3 col-md-2 wishlist-stock text-left">
                              <span class="item-stock">In Stock</span>
                          </div>
                          <div class="col-3 col-md-2 wishlist-add text-left">
                              <form action="" method="post" class="variants">
                                  <a class="btn btn-outline-dark text-uppercase" title="Add to Cart" href="#">Add To Cart</a>
                              </form>
                          </div>
                          <div class="col-3 col-md-1 text-left">
                              <div class="cart-remove">
                                  <a href="#" onclick="removeFromWishlist({{ $item['productId'] }})">
                                      <svg width="32px">
                                          <use xlink:href="#trash"></use>
                                      </svg>
                                  </a>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
          </div>
      </section>

  

<script>
    // تحميل المنتجات من localStorage عند تحميل الصفحة
    document.addEventListener('DOMContentLoaded', function() {
        let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
        const wishlistContainer = document.getElementById('wishlist-items');

        // التحقق إذا كانت القائمة فارغة
        if (wishlist.length === 0) {
            wishlistContainer.innerHTML = '<p>Your wishlist is empty.</p>';
            return;
        }

        // إضافة العناصر المخزنة في الـ wishlist
        wishlist.forEach(item => {
            const productHTML = `
                <div class="product-item row align-items-center mb-4">
                    <div class="col-4 col-md-1 d-flex align-items-center text-left">
                        <a href="#">
                            <img src="${item.productImage}" alt="wishlist" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-8 col-md-4">
                        <h3 class="item-title text-uppercase fs-5">
                            <a href="#">${item.productName}</a>
                        </h3>
                    </div>
                    <div class="col-3 col-md-2 product-price text-left">
                        <span class="item-price">${item.productPrice}</span>
                    </div>
                    <div class="col-3 col-md-2 wishlist-stock text-left">
                        <span class="item-stock">In Stock</span>
                    </div>
                    <div class="col-3 col-md-2 wishlist-add text-left">
                        <form action="" method="post" class="variants">
                            <a class="btn btn-outline-dark text-uppercase" title="Add to Cart" href="#">Add To Cart</a>
                        </form>
                    </div>
                    <div class="col-3 col-md-1 text-left">
                        <div class="cart-remove">
                            <a href="#" onclick="removeFromWishlist(${item.productId})">
                                <svg width="32px">
                                    <use xlink:href="#trash"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            `;
            wishlistContainer.innerHTML += productHTML;
        });
    });

    // حذف منتج من الـ wishlist
    function removeFromWishlist(productId) {
        let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

        // إزالة المنتج
        wishlist = wishlist.filter(item => item.productId !== productId);

        // تحديث الـ localStorage
        localStorage.setItem('wishlist', JSON.stringify(wishlist));

        // إعادة تحميل الصفحة لتحديث المحتوى
        location.reload();
    }
</script>


 @include('user.footer')