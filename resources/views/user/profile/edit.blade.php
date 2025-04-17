@include('user.navbar')

<section class="py-5">
  <div class="container">
    <div class="row my-5">
      <div class="col-md-8">
        <h4 class="text-dark pb-4">Update Your Profile</h4>

        <form method="POST" action="{{ route('user.profile.update') }}" class="form-group">
          @csrf
          @method('PUT')

          <!-- First Name -->
          <div class="mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" name="firstname" class="form-control" id="firstname" value="{{ old('firstname', $profile->firstname) }}" required>
          </div>

          <!-- Last Name -->
          <div class="mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" name="lastname" class="form-control" id="lastname" value="{{ old('lastname', $profile->lastname) }}" required>
          </div>

          <!-- Country -->
          <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" name="country" class="form-control" id="country" value="{{ old('country', $profile->country) }}" required>
          </div>

          <!-- Address -->
          <div class="mb-3">
            <label for="address" class="form-label">Street Address</label>
            <input type="text" name="address" class="form-control" id="address" value="{{ old('address', $profile->address) }}" required>
          </div>

          <!-- City -->
          <div class="mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" class="form-control" id="city" value="{{ old('city', $profile->city) }}" required>
          </div>

          <!-- State -->
          <label for="state">State*</label>
<select class="form-select form-control mt-2 mb-4" name="state">
    <option value="Amman" {{ old('state', $profile->state) == 'Amman' ? 'selected' : '' }}>Amman</option>
    <option value="Zarqa" {{ old('state', $profile->state) == 'Zarqa' ? 'selected' : '' }}>Zarqa</option>
    <option value="Irbid" {{ old('state', $profile->state) == 'Irbid' ? 'selected' : '' }}>Irbid</option>
    <option value="Aqaba" {{ old('state', $profile->state) == 'Aqaba' ? 'selected' : '' }}>Aqaba</option>
    <option value="Mafraq" {{ old('state', $profile->state) == 'Mafraq' ? 'selected' : '' }}>Mafraq</option>
    <option value="Karak" {{ old('state', $profile->state) == 'Karak' ? 'selected' : '' }}>Karak</option>
    <option value="Madaba" {{ old('state', $profile->state) == 'Madaba' ? 'selected' : '' }}>Madaba</option>
    <option value="Balqa" {{ old('state', $profile->state) == 'Balqa' ? 'selected' : '' }}>Balqa</option>
    <option value="Jarash" {{ old('state', $profile->state) == 'Jarash' ? 'selected' : '' }}>Jarash</option>
    <option value="Ajloun" {{ old('state', $profile->state) == 'Ajloun' ? 'selected' : '' }}>Ajloun</option>
    <option value="Ma'an" {{ old('state', $profile->state) == 'Ma\'an' ? 'selected' : '' }}>Ma'an</option>
    <option value="Tafilah" {{ old('state', $profile->state) == 'Tafilah' ? 'selected' : '' }}>Tafilah</option>
</select>
          <!-- Zip Code -->
          <div class="mb-3">
            <label for="zip" class="form-label">Zip Code</label>
            <input type="text" name="zip" class="form-control" id="zip" value="{{ old('zip', $profile->zip) }}" required>
          </div>

          <!-- Phone -->
          <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone', $profile->phone) }}" required>
          </div>
          
          {{-- <!-- Email -->
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $profile->email) }}" required>
          </div> --}}

          <!-- Submit Button -->
          <button type="submit" class="btn btn-primary text-uppercase btn-rounded-none w-100">Update Profile</button>
        </form>
        <!-- Email - معروض فقط للقراءة -->
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" value="{{ auth()->user()->email }}" readonly disabled>
        </div>

      </div>
    </div>
  </div>
</section>

@include('user.footer')
