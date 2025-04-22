<!DOCTYPE html>
<html lang="en">

<head>
  <title>Care - Beauty Store Bootstrap 5 HTML CSS Template</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="TemplatesJungle">
  <meta name="keywords" content="ecommerce,fashion,store">
  <meta name="description" content="Beauty Store Bootstrap 5 HTML CSS Template">

  <!-- Bootstrap CSS from CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <!-- Custom Icomoon CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('icomoon/icomoon.css') }}">

  <!-- Vendor CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/vendor.css') }}">

  <!-- Swiper CSS from CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

  <!-- Custom Style CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500&family=Prata&display=swap" rel="stylesheet">

</head>


<body class="homepage">
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <defs>
      <symbol xmlns="http://www.w3.org/2000/svg" id="instagram" viewBox="0 0 15 15">
        <path fill="none" stroke="currentColor"
          d="M11 3.5h1M4.5.5h6a4 4 0 0 1 4 4v6a4 4 0 0 1-4 4h-6a4 4 0 0 1-4-4v-6a4 4 0 0 1 4-4Zm3 10a3 3 0 1 1 0-6a3 3 0 0 1 0 6Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="facebook" viewBox="0 0 15 15">
        <path fill="none" stroke="currentColor"
          d="M7.5 14.5a7 7 0 1 1 0-14a7 7 0 0 1 0 14Zm0 0v-8a2 2 0 0 1 2-2h.5m-5 4h5" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="twitter" viewBox="0 0 15 15">
        <path fill="currentColor"
          d="m14.478 1.5l.5-.033a.5.5 0 0 0-.871-.301l.371.334Zm-.498 2.959a.5.5 0 1 0-1 0h1Zm-6.49.082h-.5h.5Zm0 .959h.5h-.5Zm-6.99 7V12a.5.5 0 0 0-.278.916L.5 12.5Zm.998-11l.469-.175a.5.5 0 0 0-.916-.048l.447.223Zm3.994 9l.354.353a.5.5 0 0 0-.195-.827l-.159.474Zm7.224-8.027l-.37.336l.18.199l.265-.04l-.075-.495Zm1.264-.94c.051.778.003 1.25-.123 1.606c-.122.345-.336.629-.723 1l.692.722c.438-.42.776-.832.974-1.388c.193-.546.232-1.178.177-2.006l-.998.066Zm0 3.654V4.46h-1v.728h1Zm-6.99-.646V5.5h1v-.959h-1Zm0 .959V6h1v-.5h-1ZM10.525 1a3.539 3.539 0 0 0-3.537 3.541h1A2.539 2.539 0 0 1 10.526 2V1Zm2.454 4.187C12.98 9.503 9.487 13 5.18 13v1c4.86 0 8.8-3.946 8.8-8.813h-1ZM1.03 1.675C1.574 3.127 3.614 6 7.49 6V5C4.174 5 2.421 2.54 1.966 1.325l-.937.35Zm.021-.398C.004 3.373-.157 5.407.604 7.139c.759 1.727 2.392 3.055 4.73 3.835l.317-.948c-2.155-.72-3.518-1.892-4.132-3.29c-.612-1.393-.523-3.11.427-5.013l-.895-.446Zm4.087 8.87C4.536 10.75 2.726 12 .5 12v1c2.566 0 4.617-1.416 5.346-2.147l-.708-.706Zm7.949-8.009A3.445 3.445 0 0 0 10.526 1v1c.721 0 1.37.311 1.82.809l.74-.671Zm-.296.83a3.513 3.513 0 0 0 2.06-1.134l-.744-.668a2.514 2.514 0 0 1-1.466.813l.15.989ZM.222 12.916C1.863 14.01 3.583 14 5.18 14v-1c-1.63 0-3.048-.011-4.402-.916l-.556.832Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="pinterest" viewBox="0 0 15 15">
        <path fill="none" stroke="currentColor"
          d="m4.5 13.5l3-7m-3.236 3a2.989 2.989 0 0 1-.764-2V7A3.5 3.5 0 0 1 7 3.5h1A3.5 3.5 0 0 1 11.5 7v.5a3 3 0 0 1-3 3a2.081 2.081 0 0 1-1.974-1.423L6.5 9m1 5.5a7 7 0 1 1 0-14a7 7 0 0 1 0 14Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="youtube" viewBox="0 0 15 15">
        <path fill="currentColor"
          d="m1.61 12.738l-.104.489l.105-.489Zm11.78 0l.104.489l-.105-.489Zm0-10.476l.104-.489l-.105.489Zm-11.78 0l.106.489l-.105-.489ZM6.5 5.5l.277-.416A.5.5 0 0 0 6 5.5h.5Zm0 4H6a.5.5 0 0 0 .777.416L6.5 9.5Zm3-2l.277.416a.5.5 0 0 0 0-.832L9.5 7.5ZM0 3.636v7.728h1V3.636H0Zm15 7.728V3.636h-1v7.728h1ZM1.506 13.227c3.951.847 8.037.847 11.988 0l-.21-.978a27.605 27.605 0 0 1-11.568 0l-.21.978ZM13.494 1.773a28.606 28.606 0 0 0-11.988 0l.21.978a27.607 27.607 0 0 1 11.568 0l.21-.978ZM15 3.636c0-.898-.628-1.675-1.506-1.863l-.21.978c.418.09.716.458.716.885h1Zm-1 7.728a.905.905 0 0 1-.716.885l.21.978A1.905 1.905 0 0 0 15 11.364h-1Zm-14 0c0 .898.628 1.675 1.506 1.863l.21-.978A.905.905 0 0 1 1 11.364H0Zm1-7.728c0-.427.298-.796.716-.885l-.21-.978A1.905 1.905 0 0 0 0 3.636h1ZM6 5.5v4h1v-4H6Zm.777 4.416l3-2l-.554-.832l-3 2l.554.832Zm3-2.832l-3-2l-.554.832l3 2l.554-.832Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="dribble" viewBox="0 0 15 15">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
          d="M4.839 1.024c3.346 4.041 5.096 7.922 5.704 12.782M.533 6.82c5.985-.138 9.402-1.083 11.97-4.216M2.7 12.594c3.221-4.902 7.171-5.65 11.755-4.293M14.5 7.5a7 7 0 1 0-14 0a7 7 0 0 0 14 0Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="calendar" viewBox="0 0 24 24">
        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <rect width="20" height="18" x="2" y="4" rx="4" />
          <path d="M8 2v4m8-4v4M2 10h20" />
        </g>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="shopping-bag" viewBox="0 0 24 24">
        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <path
            d="M3.977 9.84A2 2 0 0 1 5.971 8h12.058a2 2 0 0 1 1.994 1.84l.803 10A2 2 0 0 1 18.833 22H5.167a2 2 0 0 1-1.993-2.16l.803-10Z" />
          <path d="M16 11V6a4 4 0 0 0-4-4v0a4 4 0 0 0-4 4v5" />
        </g>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="gift" viewBox="0 0 24 24">
        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <rect width="18" height="14" x="3" y="8" rx="2" />
          <path d="M12 5a3 3 0 1 0-3 3m6 0a3 3 0 1 0-3-3m0 0v17m9-7H3" />
        </g>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-cycle" viewBox="0 0 24 24">
        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <path
            d="M22 12c0 6-4.39 10-9.806 10C7.792 22 4.24 19.665 3 16m-1-4C2 6 6.39 2 11.806 2C16.209 2 19.76 4.335 21 8" />
          <path d="m7 17l-4-1l-1 4M17 7l4 1l1-4" />
        </g>
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="link" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M12 19a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0-4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm-5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm7-12h-1V2a1 1 0 0 0-2 0v1H8V2a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3Zm1 17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9h16Zm0-11H4V6a1 1 0 0 1 1-1h1v1a1 1 0 0 0 2 0V5h8v1a1 1 0 0 0 2 0V5h1a1 1 0 0 1 1 1ZM7 15a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0 4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-right" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="category" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M19 5.5h-6.28l-.32-1a3 3 0 0 0-2.84-2H5a3 3 0 0 0-3 3v13a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-10a3 3 0 0 0-3-3Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-13a1 1 0 0 1 1-1h4.56a1 1 0 0 1 .95.68l.54 1.64a1 1 0 0 0 .95.68h7a1 1 0 0 1 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="calendar" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3Zm1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="heart" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="plus" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="minus" viewBox="0 0 24 24">
        <path fill="currentColor" d="M19 11H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="cart" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74a3.007 3.007 0 0 0-2.82-2H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="check" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M18.71 7.21a1 1 0 0 0-1.42 0l-7.45 7.46l-3.13-3.14A1 1 0 1 0 5.29 13l3.84 3.84a1 1 0 0 0 1.42 0l8.16-8.16a1 1 0 0 0 0-1.47Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="trash" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M10 18a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1ZM20 6h-4V5a3 3 0 0 0-3-3h-2a3 3 0 0 0-3 3v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8h1a1 1 0 0 0 0-2ZM10 5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1h-4Zm7 14a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8h10Zm-3-1a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="star-outline" viewBox="0 0 15 15">
        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
          d="M7.5 9.804L5.337 11l.413-2.533L4 6.674l2.418-.37L7.5 4l1.082 2.304l2.418.37l-1.75 1.793L9.663 11L7.5 9.804Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="star-solid" viewBox="0 0 15 15">
        <path fill="currentColor"
          d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="search" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 24 24">
        <path fill="currentColor"
          d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z" />
      </symbol>
      <symbol xmlns="http://www.w3.org/2000/svg" id="close" viewBox="0 0 15 15">
        <path fill="currentColor"
          d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
      </symbol>
    </defs>
  </svg>

  <div class="preloader text-white fs-6 text-uppercase overflow-hidden"></div>

  {{-- <div class="search-popup">
    <div class="search-popup-container">

      <form role="search" method="get" class="form-group" action="">
        <input type="search" id="search-form" class="form-control border-0 border-bottom"
          placeholder="Type and press enter" value="" name="s" />
        <button type="submit" class="search-submit border-0 position-absolute bg-white"
          style="top: 15px;right: 15px;"><svg class="search" width="24" height="24">
            <use xlink:href="#search"></use>
          </svg></button>
      </form>
    </div>
  </div> --}}

  <nav class="navbar navbar-expand-lg text-uppercase fs-6 py-3 px-0 px-md-3 border-bottom align-items-center">
    <div class="container-fluid">
      <div class="row justify-content-between align-items-center w-100 py-2">

        <div class="col-auto">
          <a class="navbar-brand" href="{{ route('user.index') }}">
            Sara Shop
          </a>
        </div>

        <div class="col-auto">
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
            </div>

            {{-- ************************************ --}}
            {{-- href="{{ route('user.index') }}" --}}



            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end  flex-grow-1 gap-5 pe-3">
                <li class="nav-item dropdown">
                  <a href="{{ route('user.index') }}" class="nav-link active" aria-haspopup="true"
                    aria-expanded="false">Home</a>
                </li>

                <li class="nav-item dropdown">
                  <a href="{{ route('user.shop-sidebar') }}" class="nav-link" aria-haspopup="true">Shop</a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdownBlog" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Blog</a>
                  <ul class="dropdown-menu list-unstyled" aria-labelledby="dropdownBlog">
                    <li>
                      <a href="blog-classic.html" class="dropdown-item item-anchor">Blog </a>
                    </li>
                    <li>
                      <a href="blog-grid-with-sidebar.html" class="dropdown-item item-anchor">Blog with Sidebar </a>
                    </li>
                    <li>
                      <a href="single-post-no-sidebar.html" class="dropdown-item item-anchor">Single Post </a>
                    </li>
                    <li>
                      <a href="single-post.html" class="dropdown-item item-anchor">Single post with Sidebar </a>
                    </li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
                </li>

                @guest
          <!-- يظهر فقط إذا كان المستخدم غير مسجل دخول -->
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
        @endguest
                @auth
          <!-- يظهر فقط إذا كان المستخدم مسجل دخول -->
          <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
            </a></li>

          <!-- شكل زر تسجيل الخروج باستخدام نموذج logout -->
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        @endauth

              </ul>
            </div>
          </div>
        </div>

        <div class="col-auto">
          <ul class="list-unstyled d-flex m-0 mt-3 mt-xl-0">
            @auth
        <li>
          <a href="wishlist.html" class="text-uppercase mx-3">
          <svg width="24" height="24" viewBox="0 0 24 24">
            <use xlink:href="#heart"></use>
          </svg>
          <span class="wishlist-count">(0)</span>
          </a>
        </li>
        <li>
          <a href="cart.html" class="text-uppercase mx-3">
          <svg width="24" height="24" viewBox="0 0 24 24">
            <use xlink:href="#cart"></use>
          </svg>
          <span class="cart-count">(0)</span>
          </a>
        </li>
        <li>
          <a href="#like" class="mx-3">
          <svg width="24" height="24" viewBox="0 0 24 24">
            <use xlink:href="#user"></use>
          </svg>
          </a>
        </li>
      @endauth
            <li class="search-box">
              <a href="#" class="search-button mx-3">
                <svg width="24" height="24" viewBox="0 0 24 24" class="search">
                  <use xlink:href="#search"></use>
                </svg>
              </a>
            </li>
          </ul>
        </div>

      </div>

    </div>
  </nav>



  <main class="main-content mt-5">
    <div class="container">
      <nav class="breadcrumb">
        <a class="breadcrumb-item" href="#">Home</a>
        <a class="breadcrumb-item" href="#">Pages</a>
        <span class="breadcrumb-item active" aria-current="page">Shop</span>
      </nav>
    </div>

    <section id="product-detail" class="single-product py-5 no-padding-top">
      <div class="container">
        <div class="row g-5">
          <div class="col-md-7">
            <div class="row flex-column">
              <div class="col-md-12">
                <!-- product-large-slider -->
                <div class="swiper product-large-slider">
                  <div class="swiper-wrapper">
                    @foreach($product->images as $image)
            <div class="swiper-slide">
              <img src="{{ asset($image->image_path) }}" alt="product-large" class="img-fluid">
            </div>
          @endforeach
                  </div>
                </div>
                <!-- / product-large-slider -->
              </div>
              <div class="col-md-12">
                <!-- product-thumbnail-slider -->
                <div class="swiper product-thumbnail-slider">
                  <div class="swiper-wrapper">
                    @foreach($product->images as $image)
                      <div class="swiper-slide">
                        <img src="{{ asset($image->image_path) }}" alt="{{ $product->name }}" class="img-fluid">
                      </div>
                    @endforeach

                  </div>
                </div>
                <!-- / product-thumbnail-slider -->
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="product-info mt-4">
              <div class="element-header">
                <h2 itemprop="name" class="product-title text-uppercase text-black">{{ $product->name }}</h2>
                <div class="rating-container d-flex align-items-center">
                  <div class="rating" data-rating="1" onclick="rate(1)">
                    <svg width="32" height="32">
                      <use xlink:href="#star-solid"></use>
                    </svg>
                  </div>
                  <div class="rating" data-rating="2" onclick="rate(1)">
                    <svg width="32" height="32">
                      <use xlink:href="#star-solid"></use>
                    </svg>
                  </div>
                  <div class="rating" data-rating="3" onclick="rate(1)">
                    <svg width="32" height="32">
                      <use xlink:href="#star-solid"></use>
                    </svg>
                  </div>
                  <div class="rating" data-rating="4" onclick="rate(1)">
                    <svg width="32" height="32">
                      <use xlink:href="#star-outline"></use>
                    </svg>
                  </div>
                  <div class="rating" data-rating="5" onclick="rate(1)">
                    <svg width="32" height="32">
                      <use xlink:href="#star-outline"></use>
                    </svg>
                  </div>
                  <span class="rating-count">(3.5)</span>
                </div>
              </div>
              <div class="product-price my-3">
                <span class="fs-2 text-black">JD {{ number_format($product->price, 2) }}</span>
                @if($product->discount)
          <del>JD
            {{ number_format($product->price + ($product->price * ($product->discount->percentage / 100)), 2) }}</del>
        @endif
              </div>
              <p>{{ $product->description }}</p>
              <div class="product-action mt-4">
                <div class="item-title">{{ $product->stock }} in stock</div>

           
                <form action="{{ route('cart.add') }}" method="POST" class="w-100">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                
                  <div class="product-quantity d-flex flex-wrap">
                    <div class="input-group product-qty me-3" style="max-width: 150px;">
                      <span class="input-group-btn">
                        <button type="button" class="quantity-left-minus btn btn-light btn-number" data-type="minus" data-field="">
                          <svg width="16" height="16">
                            <use xlink:href="#minus"></use>
                          </svg>
                        </button>
                      </span>
                      <input type="text" id="quantity" name="quantity" class="form-control input-number text-center"
                        value="1" min="1" max="{{ $product->stock }}">
                      <span class="input-group-btn">
                        <button type="button" class="quantity-right-plus btn btn-light btn-number" data-type="plus" data-field="">
                          <svg width="16" height="16">
                            <use xlink:href="#plus"></use>
                          </svg>
                        </button>
                      </span>
                    </div>
                
                    <button type="submit" name="add" id="add-to-cart"
                      class="btn btn-dark product-cart-submit btn-lg text-uppercase me-3">
                      <span id="add-to-cart">Add to cart</span>
                    </button>
                
                    <button href="#" class="btn btn-dark wish-list-button">
                      <svg width="24" height="24" viewBox="0 0 24 24" class="svg-color">
                        <use xlink:href="#heart"></use>
                      </svg>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

 
    <section class="product-tabs mt-5">
      <div class="container">
          <div class="row">
              <div class="tabs-listing">
                  <nav>
                      <div class="nav nav-tabs d-flex justify-content-center" id="nav-tab" role="tablist">
                          <button class="nav-link active text-uppercase px-5 py-3" id="nav-home-tab" data-bs-toggle="tab"
                              data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                              aria-selected="true">Details</button>
                          <button class="nav-link text-uppercase px-5 py-3" id="nav-information-tab" data-bs-toggle="tab"
                              data-bs-target="#nav-information" type="button" role="tab" aria-controls="nav-information"
                              aria-selected="false">How To Use</button>
                          <button class="nav-link text-uppercase px-5 py-3" id="nav-review-tab" data-bs-toggle="tab"
                              data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review"
                              aria-selected="false">Reviews</button>
                      </div>
                  </nav>
                  <div class="tab-content py-5" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                          <h5>Product Description</h5>
                          <p>{{ $product->description }}</p>
                      </div>
    
                      <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                        @if(auth()->check())
                            <!-- التحقق إذا كان المستخدم قد اشترى المنتج -->
                            @if(auth()->user()->orders()->whereHas('items', function($query) use ($product) {
                              $query->where('product_id', $product->id);
                          })->exists())
                                <form action="{{ route('review.store', $product->id) }}" method="POST" class="review-form">
                                    @csrf
                                    <h5>Leave a Review</h5>
                                    <div class="form-group">
                                        <label for="rating">Rating</label>
                                        <div class="rating-container d-flex">
                                            @for($i = 1; $i <= 5; $i++)
                                                <div class="rating" data-rating="{{ $i }}">
                                                    <input type="radio" id="rating_{{ $i }}" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }}>
                                                    <svg width="32" height="32">
                                                        <use xlink:href="{{ old('rating') >= $i ? '#star-solid' : '#star-outline' }}"></use>
                                                    </svg>
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Your Comment</label>
                                        <textarea id="comment" name="comment" rows="4" class="form-control" placeholder="Write your review here...">{{ old('comment') }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
                                </form>
                            @else
                                <p>You must have purchased this product to leave a review.</p>
                            @endif
                        @else
                            <p>You must be logged in to leave a review.</p>
                        @endif
                    
                        <!-- عرض التعليقات الموجودة -->
                        @foreach($product->reviews as $review)
                            <div class="review-item d-flex">
                                <div class="row g-4">
                                    <div class="col-md-7">
                                        <div class="review-content">
                                            <div class="rating-container d-flex align-items-center">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <div class="rating" data-rating="{{ $i }}">
                                                        <svg width="32" height="32">
                                                            <use xlink:href="{{ $i <= $review->rating ? '#star-solid' : '#star-outline' }}"></use>
                                                        </svg>
                                                    </div>
                                                @endfor
                                                <span class="rating-count">({{ $review->rating }})</span>
                                            </div>
                                            <div class="review-header">
                                                <span class="author-name">{{ $review->user->name }}</span>
                                                <span class="review-date">– {{ $review->created_at->format('d/m/Y') }}</span>
                                            </div>
                                            <p class="comment-text">{{ $review->comment }}</p>
                                            @auth
                                            @if($review->user_id == auth()->user()->id)
                                                <div class="d-flex gap-3">
                                                    <a href="{{ route('review.delete', $product->id) }}" class="btn btn-danger w-100">Delete Review</a>
                                                    <button class="btn btn-warning w-100 edit-review-btn" data-review-id="{{ $review->id }}">Edit Review</button>
                                                </div>
                                            @endif
                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
    
                      <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                          @if(auth()->check())
                              <form action="{{ route('review.store', $product->id) }}" method="POST" class="review-form">
                                  @csrf
                                  <h5>Leave a Review</h5>
                                  <div class="form-group">
                                      <label for="rating">Rating</label>
                                      <div class="rating-container d-flex">
                                          @for($i = 1; $i <= 5; $i++)
                                              <div class="rating" data-rating="{{ $i }}">
                                                  <input type="radio" id="rating_{{ $i }}" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }}>
                                                  <svg width="32" height="32">
                                                      <use xlink:href="{{ old('rating') >= $i ? '#star-solid' : '#star-outline' }}"></use>
                                                  </svg>
                                              </div>
                                          @endfor
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="comment">Your Comment</label>
                                      <textarea id="comment" name="comment" rows="4" class="form-control" placeholder="Write your review here...">{{ old('comment') }}</textarea>
                                  </div>
                                  <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
                              </form>
                          @else
                              <p>You must be logged in to leave a review.</p>
                          @endif
    
                          @foreach($product->reviews as $review)
                              <div class="review-item d-flex">
                                  <div class="row g-4">
                                      <div class="col-md-7">
                                          <div class="review-content">
                                              <div class="rating-container d-flex align-items-center">
                                                  @for($i = 1; $i <= 5; $i++)
                                                      <div class="rating" data-rating="{{ $i }}">
                                                          <svg width="32" height="32">
                                                              <use xlink:href="{{ $i <= $review->rating ? '#star-solid' : '#star-outline' }}"></use>
                                                          </svg>
                                                      </div>
                                                  @endfor
                                                  <span class="rating-count">({{ $review->rating }})</span>
                                              </div>
                                              <div class="review-header">
                                                  <span class="author-name">{{ $review->user->name }}</span>
                                                  <span class="review-date">– {{ $review->created_at->format('d/m/Y') }}</span>
                                              </div>
                                              <p class="comment-text">{{ $review->comment }}</p>
                                              @auth
                                              @if($review->user_id == auth()->user()->id)
                                                  <div class="d-flex gap-3">
                                                      <a href="{{ route('review.delete', $product->id) }}" class="btn btn-danger w-100">Delete Review</a>
                                                      <button class="btn btn-warning w-100 edit-review-btn" data-review-id="{{ $review->id }}">Edit Review</button>
                                                  </div>
                                              @endif
                                          @endauth
                                          
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          @endforeach
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
    
    <!-- JavaScript للتحكم في زر التعديل -->
    <script>
      document.addEventListener("DOMContentLoaded", function () {
          // جلب جميع أزرار "Edit"
          var editButtons = document.querySelectorAll('.edit-review-btn');
    
          editButtons.forEach(function (button) {
              button.addEventListener('click', function () {
                  // جلب التعليق الذي سيتم تعديله
                  var reviewId = button.getAttribute('data-review-id');
                  var commentText = button.closest('.review-item').querySelector('.comment-text').innerText;
    
                  // تحويل النص إلى مربع نص
                  var textarea = document.getElementById('comment');
                  textarea.value = commentText;
                  textarea.placeholder = "Edit your comment here...";
    
                  // تغيير النموذج ليكون تحديثًا بدلاً من إرسال جديد
                  var form = button.closest('form');
                  form.action = "{{ route('review.update', '') }}/" + reviewId;
                  form.method = "POST";
    
                  // إضافة طريقة التحديث (PUT)
                  var methodInput = document.createElement('input');
                  methodInput.setAttribute('name', '_method');
                  methodInput.setAttribute('value', 'PUT');
                  form.appendChild(methodInput);
    
                  // تغيير النص في زر الإرسال ليصبح "Update Review"
                  form.querySelector('button[type="submit"]').innerText = "Update Review";
              });
          });
      });
    </script>
    




    <section id="related-products" class="related-products product-carousel py-5 position-relative open-up"
      data-aos="zoom-out">
      <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center my-5 py-lg-5">
          <div class="line-img my-2">
            <img src="images/line.png" alt="">
          </div>
          <h4 class="text-uppercase mb-0">Related Products</h4>
          <div class="line-img my-2">
            <img src="images/line.png" alt="">
          </div>
        </div>
        <div class="swiper product-swiper overflow-hidden">
          <div class="swiper-wrapper d-flex">



            @foreach($relatedProducts as $relatedProduct)
        <div class="swiper-slide">
          <div class="product-item">
          <div class="image-holder position-relative">
            <a href="{{ route('user.product.show', $relatedProduct->id) }}">
            {{-- <img
              src="{{ asset('images/products/' . $relatedProduct->images->first()->image_path ?? 'images/default-product.jpg') }}"
              alt="product image" class="product-image img-fluid"> --}}
            <img src="{{ asset($relatedProduct->images->first()->image_path ?? 'images/default-product.jpg') }}"
              alt="categories" class="product-image img-fluid">
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
              <a href="{{ route('user.product.show', $relatedProduct->id) }}">{{ $relatedProduct->name }}</a>
            </h5>
            <a href="#" class="text-decoration-none" data-after="Add to cart">
              <span>JD {{ number_format($relatedProduct->price, 2) }}</span>
            </a>
            </div>
          </div>
          </div>
        </div>
      @endforeach
          </div>
        </div>
      </div>
    </section>
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

{{-- @include('user.footer') --}}