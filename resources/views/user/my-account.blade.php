@include('user.navbar ')

  <section class="py-5">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mt-5">
        <h1 class="page-title display-4 ">My Account</h1>
        <nav class="breadcrumb fs-6">
          <a class="breadcrumb-item nav-link" href="#">Home</a>
          <a class="breadcrumb-item nav-link" href="#">Pages</a>
          <span class="breadcrumb-item active" aria-current="page">My Account</span>
        </nav>
      </div>
    </div>
  </section>

  <section id="login-form" class="py-5">
    <div class="container-sm">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <h2 class="section-title text-uppercase mb-5">Login</h2>
          <form id="form" class="form-group flex-wrap">
            <div class="col-12 pb-3">
              <label>Username or email address *</label>
              <input type="text" name="name" placeholder="Write your username / email address here"
                class="form-control">
            </div>
            <div class="col-12 pb-3">
              <label>Password *</label>
              <input type="text" name="email" placeholder="Enter your password" class="form-control">
            </div>
            <div class="col-12 pb-3">
              <label>
                <input type="checkbox" required="">
                <span class="label-body">Remember me</span>
              </label>
            </div>
            <div class="col-12 text-center">
              <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary btn-lg text-uppercase btn-rounded-none">Log
                  in</button>
              </div>
              <p class="mt-3"><a href="#">Lost your password?</a></p>
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
 