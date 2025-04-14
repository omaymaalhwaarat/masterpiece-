@include('user.navbar')

  <section class="hero-section jarallax">
    <img src="images/banner-large-7.jpg" class="jarallax-img">
    <div class="py-5">
      <div class="container">
        <div class="row">
          <div class="d-flex flex-wrap flex-column justify-content-center align-items-center my-5 py-5 text-white">
            <h1 class="page-title text-uppercase display-3">Track your Order</h1>
            <nav class="breadcrumb text-white">
              <a class="breadcrumb-item" href="#">Home</a>
              <a class="breadcrumb-item" href="#">Pages</a>
              <span class="breadcrumb-item active" aria-current="page">Track your Order</span>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="order-tracking" class="py-5 my-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
          <h2 class="section-title text-uppercase mb-4">Order Tracking</h2>
          <p>Please enter your Order ID and press the “Track” button. This was given to you on your receipt and in the
            confirmation email you should have received.</p>
          <form id="form" class="form-group">
            <div class="col-12 pb-3">
              <label>Order ID</label>
              <input type="text" name="name" placeholder="Found in your order confirmation email" class="form-control">
            </div>
            <div class="col-12 pb-3">
              <label>Billing Email </label>
              <input type="text" name="email" placeholder="Email you used during checkout." class="form-control">
            </div>
            <div class="col-12">
              <button type="submit" name="submit" class="btn btn-dark btn-lg w-100 text-uppercase">Track</button>
            </div>
          </form>
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
  </section>

@include('user.footer')