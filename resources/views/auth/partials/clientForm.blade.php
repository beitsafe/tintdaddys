<div class="col-md-12">
    <input  id="firstName"
            type="text"
            class="form-control @error('firstName') is-invalid @enderror"
            name="firstName"
            value="{{ old('firstName') }}"
            required
            autocomplete="firstName"
            autofocus
            placeholder="First Name">
</div>

@error('firstName')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

<div class="col-md-12">
    <input  id="lastName"
            type="text"
            class="form-control @error('lastName') is-invalid @enderror"
            name="lastName"
            value="{{ old('lastName') }}"
            required
            autocomplete="lastName"
            autofocus
            placeholder="Last Name">
</div>

@error('lastName')
<span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

<div class="col-md-12">
    <input  id="businessName"
            type="text"
            class="form-control @error('businessName') is-invalid @enderror"
            name="businessName"
            value="{{ old('businessName') }}"
            required
            autocomplete="businessName"
            autofocus
            placeholder="Business Name">
</div>

@error('businessName')
<span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

<div class="col-md-12">
    <input  id="abn"
            type="text"
            class="form-control @error('abn') is-invalid @enderror"
            name="abn"
            value="{{ old('abn') }}"
            required
            autocomplete="abn"
            autofocus
            placeholder="ABN">
</div>

@error('abn')
<span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

<div class="col-md-12">
    <input  id="phone"
            type="text"
            class="form-control @error('phone') is-invalid @enderror"
            name="abn"
            value="{{ old('phone') }}"
            required
            autocomplete="phone"
            autofocus
            placeholder="Phone Number">
</div>

@error('phone')
<span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

<div class="col-md-12">
    <input  id="address"
            type="text"
            class="form-control @error('address') is-invalid @enderror"
            name="address"
            value="{{ old('address') }}"
            required
            autocomplete="address"
            autofocus
            placeholder="Address">
</div>

@error('address')
<span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

<div class="col-md-12">
    <input  id="city"
            type="text"
            class="form-control @error('city') is-invalid @enderror"
            name="city"
            value="{{ old('city') }}"
            required
            autocomplete="city"
            autofocus
            placeholder="City">
</div>

@error('city')
<span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

<div class="col-md-12">
    <input  id="state"
            type="text"
            class="form-control @error('state') is-invalid @enderror"
            name="state"
            value="{{ old('state') }}"
            required
            autocomplete="state"
            autofocus
            placeholder="State">
</div>

@error('state')
<span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

<div class="col-md-12">
    <input  id="postcode"
            type="text"
            class="form-control @error('postcode') is-invalid @enderror"
            name="postcode"
            value="{{ old('postcode') }}"
            required
            autocomplete="postcode"
            autofocus
            placeholder="Postcode">
</div>

@error('postcode')
<span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
