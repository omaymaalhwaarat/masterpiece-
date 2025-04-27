<footer id="footer" class="mt-5">
  <div class="container">
    <div class="row d-flex flex-wrap justify-content-between py-5">
      <div class="col-md-4 col-sm-6">
        <div class="footer-menu footer-menu-001">
          <div class="footer-intro mb-4">
            <a href="{{ route('user.index') }}">
              <img src="{{ asset('images/main-logo.png') }}" alt="logo">
            </a>
          </div>
          <p>Sara's natural products are perfect for summer,
            keeping your skin hydrated and glowing under the sun. Made with pure ingredients,
            they nourish and protect against dryness. Enjoy a refreshing, chemical-free skincare routine all season
            long!</p>
          <div class="social-links">
            <ul class="list-unstyled d-flex flex-wrap gap-4">
              <li>
                <a href="#" class="">
                  <svg width="24" height="24" viewBox="0 0 24 24" class="svg-color">
                    <use xlink:href="#facebook"></use>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#" class="">
                  <svg width="24" height="24" viewBox="0 0 24 24" class="svg-color">
                    <use xlink:href="#twitter"></use>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#" class="">
                  <svg width="24" height="24" viewBox="0 0 24 24" class="svg-color">
                    <use xlink:href="#youtube"></use>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#" class="">
                  <svg width="24" height="24" viewBox="0 0 24 24" class="svg-color">
                    <use xlink:href="#pinterest"></use>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#" class="">
                  <svg width="24" height="24" viewBox="0 0 24 24" class="svg-color">
                    <use xlink:href="#instagram"></use>
                  </svg>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-6">
        <div class="footer-menu footer-menu-002">
          <h5 class="widget-title text-uppercase mb-4">Quick Links</h5>
          <ul class="menu-list list-unstyled text-uppercase border-animation-left fs-6">
            <li class="menu-item mb-2">
              <a href="index.html" class="item-anchor">Home</a>
            </li>
            <li class="menu-item mb-2">
              <a href="shop.html" class="item-anchor">About</a>
            </li>
            <li class="menu-item mb-2">
              <a href="blog.html" class="item-anchor">Services</a>
            </li>
            <li class="menu-item mb-2">
              <a href="styles.html" class="item-anchor">Single item</a>
            </li>
            <li class="menu-item mb-2">
              <a href="#" class="item-anchor">Contact</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-2 col-sm-6">
        <div class="footer-menu footer-menu-003">
          <h5 class="widget-title text-uppercase mb-4">Help & Info</h5>
          <ul class="menu-list list-unstyled text-uppercase border-animation-left fs-6">
            <li class="menu-item mb-2">
              <a href="#" class="item-anchor">Track Your Order</a>
            </li>
            <li class="menu-item mb-2">
              <a href="#" class="item-anchor">Return + Exchange</a>
            </li>
            <li class="menu-item mb-2">
              <a href="#" class="item-anchor">Shipping + Delivery</a>
            </li>
            <li class="menu-item mb-2">
              <a href="#" class="item-anchor">Contact Us</a>
            </li>
            <li class="menu-item mb-2">
              <a href="#" class="item-anchor">Find us easy</a>
            </li>
            <li class="menu-item mb-2">
              <a href="faqs.html" class="item-anchor">Faqs</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="footer-menu footer-menu-004 border-animation-left">
          <h5 class="widget-title text-uppercase mb-4">Contact Us</h5>
          <p>Do you have any questions or suggestions? <a href="sarashops993@gmail.com"
              class="item-anchor">sarashops993@gmail.com</a></p>
          <p>Do you need support? Give us a call. <a href="tel:+962798091469" class="item-anchor">+962798091469
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="border-top py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-6 d-flex flex-wrap">
          <div class="shipping">
            <span>We ship with:</span>

            <img src="{{ asset('images/arct-icon.png') }}" alt="icon">
            <img src="{{ asset('images/dhl-logo.png') }}" alt="icon">
          </div>
          <div class="payment-option">
            <span>Payment Option:</span>
            <img src="{{ asset('images/visa-card.png') }}" alt="card">
            <img src="{{ asset('images/paypal-card.png') }}" alt="card">
            <img src="{{ asset('images/master-card.png') }}" alt="card">
          </div>
        </div>
        <div class="col-md-6 text-md-end mt-3 mt-md-0">
          <p>© Copyright 2025</p>
        </div>
      </div>
    </div>
  </div>
</footer>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/SmoothScroll.js') }}"></script>

<!-- Bootstrap JS from CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
  crossorigin="anonymous"></script>

<!-- Swiper JS from CDN -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
