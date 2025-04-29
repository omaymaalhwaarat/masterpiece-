@include('user.navbar')

@if (session('success'))
    <div class="position-fixed top-50 start-50 translate-middle" style="z-index: 1055;">
        <div id="profileToast" class="toast show text-center border-0" role="alert"
             style="background-color: rgba(255, 255, 255, 0.85); color: #c85c8e; font-family: 'Poppins', sans-serif; font-size: 1.1rem; padding: 1rem 2rem; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1);">
            {{ session('success') }}
        </div>
    </div>
@endif

<section class="hero-section jarallax">
    <img src="images/banner-large-7.jpg" class="jarallax-img">
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card p-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" name="email" required autofocus value="{{ old('email') }}">
                                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
    
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password" required>
                                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
    
                            <div class="mb-3 form-check">
                                <input type="checkbox" id="remember_me" name="remember" class="form-check-input">
                                <label for="remember_me" class="form-check-label">Remember me</label>
                            </div>
    
                            <button type="submit" class="btn btn-primary w-100">Login</button>
    
                            @if (Route::has('password.request'))
                                <div class="mt-3 text-center">
                                    <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot your password?</a>
                                </div>
                            @endif
    
                        </form>
    
                        <div class="mt-4 text-center">
                            <p class="text-sm text-gray-600">
                                Don't have an account? <a href="{{ route('register') }}" class="text-indigo-600">Register now</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="py-5">
        <div class="container">
            <section class="newsletter my-5" style="background: url(images/newsletter-image.jpg) no-repeat;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 text-center text-white">
                            <h2 class="display-4">Subscribe to our Newsletter</h2>
                            <p class="lead">Get the latest updates and offers directly to your inbox.</p>
                            <form action="#" method="POST">
                                <input type="email" class="form-control mb-3" placeholder="Enter your email" required>
                                <button type="submit" class="btn btn-primary">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div> --}}
</section>







{{-- 
<section class="newsletter my-5" style="background: url(images/newsletter-image.jpg) no-repeat;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center text-white">
                <h2 class="display-4">Subscribe to our Newsletter</h2>
                <p class="lead">Get the latest updates and offers directly to your inbox.</p>
                <form action="#" method="POST">
                    <input type="email" class="form-control mb-3" placeholder="Enter your email" required>
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section> --}}

<!-- Additional CSS -->
<style>
    .hero-section {
        position: relative;
        width: 100%;
        height: 50vh;
        background-size: cover;
        background-position: center;
    }

    .page-title {
        font-family: 'Poppins', sans-serif;
        font-weight: bold;
        color: #fff;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card .form-label {
        font-family: 'Poppins', sans-serif;
        color: #333;
    }

    .btn-primary {
        background-color: #c85c8e;
        border-color: #c85c8e;
    }

    .btn-primary:hover {
        background-color: #9b4d68;
        border-color: #9b4d68;
    }

    .newsletter {
        background-size: cover;
        background-position: center;
        padding: 60px 0;
    }

    .newsletter .display-4 {
        font-family: 'Poppins', sans-serif;
        font-weight: bold;
        color: #fff;
    }

    .newsletter .lead {
        color: rgba(255, 255, 255, 0.7);
        font-size: 1.25rem;
    }

    .newsletter input[type="email"] {
        width: 100%;
        padding: 15px;
        font-size: 1rem;
        border-radius: 10px;
        border: 1px solid #ccc;
        margin-bottom: 15px;
    }

    .newsletter button {
        padding: 15px 30px;
        font-size: 1rem;
        border-radius: 10px;
    }
</style>

<!-- Additional JS -->
<script>
    // Show toast notification when the session has success message
    if (document.querySelector('#profileToast')) {
        setTimeout(function() {
            let toast = document.querySelector('#profileToast');
            toast.classList.remove('show');
        }, 5000); // Dismiss toast after 5 seconds
    }
</script>
