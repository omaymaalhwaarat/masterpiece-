<!-- resources/views/user/create-profile.blade.php -->
@include('user.navbar')

<section class="py-5">
  <div class="container">
    <div class="row my-5">
      <div class="col-md-8">
        <h4 class="text-dark pb-4">Create Your Profile</h4>

        <form method="POST" action="{{ route('user.profile.store') }}" class="form-group">
          @csrf

          <!-- First Name -->
          <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" name="firstname" class="form-control" id="firstname" value="{{ old('firstname') }}" required>
          </div>

          <!-- Last Name -->
          <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" name="lastname" class="form-control" id="lastname" value="{{ old('lastname') }}" required>
          </div>

          <!-- Country -->
          <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" name="country" class="form-control" id="country" value="{{ old('country') }}" required>
          </div>

          <!-- Address -->
          <div class="mb-3">
            <label for="address" class="form-label">Street Address</label>
            <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}" required>
          </div>

          <!-- City -->
          <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" class="form-control" id="city" value="{{ old('city') }}" required>
          </div>

          <!-- State -->
          <label for="state">State*</label>
          <select class="form-select form-control mt-2 mb-4" name="state">
            <option value="Amman" {{ old('state') == 'Amman' ? 'selected' : '' }}>Amman</option>
            <option value="Zarqa" {{ old('state') == 'Zarqa' ? 'selected' : '' }}>Zarqa</option>
            <option value="Irbid" {{ old('state') == 'Irbid' ? 'selected' : '' }}>Irbid</option>
            <option value="Aqaba" {{ old('state') == 'Aqaba' ? 'selected' : '' }}>Aqaba</option>
            <option value="Mafraq" {{ old('state') == 'Mafraq' ? 'selected' : '' }}>Mafraq</option>
            <option value="Karak" {{ old('state') == 'Karak' ? 'selected' : '' }}>Karak</option>
            <option value="Madaba" {{ old('state') == 'Madaba' ? 'selected' : '' }}>Madaba</option>
            <option value="Balqa" {{ old('state') == 'Balqa' ? 'selected' : '' }}>Balqa</option>
            <option value="Jarash" {{ old('state') == 'Jarash' ? 'selected' : '' }}>Jarash</option>
            <option value="Ajloun" {{ old('state') == 'Ajloun' ? 'selected' : '' }}>Ajloun</option>
            <option value="Ma'an" {{ old('state') == 'Ma\'an' ? 'selected' : '' }}>Ma'an</option>
            <option value="Tafilah" {{ old('state') == 'Tafilah' ? 'selected' : '' }}>Tafilah</option>
          </select>

          <!-- Zip Code -->
          <div class="mb-3">
            <label for="zip" class="form-label">Zip Code</label>
            <input type="text" name="zip" class="form-control" id="zip" value="{{ old('zip') }}" required>
          </div>

          <!-- Phone -->
          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}" required>
          </div>

          {{-- <!-- Email -->
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
          </div> --}}

          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary text-uppercase btn-rounded-none w-100">Create Profile</button>
        </form>
      </div>
    </div>
  </div>
</section>

@include('user.footer')
