@include('user.navbar')

<section class="hero-section jarallax">
    <img src="images/banner-large-7.jpg" class="jarallax-img">
    <div class="py-5">
        <div class="container">
            <div class="row mt-5">
                <div class="d-flex flex-wrap flex-column justify-content-center align-items-center my-5 py-5 text-white">
                    <h1 class="page-title text-uppercase mt-5 display-4">Register Now</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <main class="col-md-6">
                <div class="row py-2">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('register') }}" class="bg-white shadow-md p-4 rounded-lg">
                            @csrf

                            <!-- Name -->
                            <div class="mb-4">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus autocomplete="name">
                                @error('name') 
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Email Address -->
                            <div class="mb-4">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autocomplete="email">
                                @error('email') 
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password">
                                @error('password') 
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password">
                                @error('password_confirmation') 
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('login') }}" class="text-muted">{{ __('Already have an account?') }}</a>
                                <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
