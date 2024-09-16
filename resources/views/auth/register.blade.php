@extends('layouts.app')
@section('content')


<div class="card mb-3">

    <div class="card-body">

      <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
        <p class="text-center small">Enter your personal details to create account</p>
      </div>

      <form class="row g-3 needs-validation" novalidate method="POST" action="{{ url('register') }}">
        @csrf
        <div class="col-12">
          <label for="name" class="form-label"> Name</label>
          <input value="{{ old('name') }}" type="text" name="name" class="form-control" id="name" required>
          <span style="color:red;">{{ $errors->first('name') }}</span>

          <div class="invalid-feedback">Please, enter your First name!</div>
        </div>
      

        <div class="col-12">
          <label for="yourEmail" class="form-label">Your Email</label>
          <input value="{{ old('email') }}" type="email" name="email" class="form-control" id="yourEmail" required>
          <span style="color:red;">{{ $errors->first('email') }}</span>

          <div class="invalid-feedback">Please enter a valid Email adddress!</div>
        </div>

        <div class="col-12">
            <label for="mobile" class="form-label">Mobile Number</label>
            <input value="{{ old('mobile') }}" type="number" name="mobile" class="form-control" id="mobile"
            oninput="javascript: this.value=this.value.replace(/[^0-9]/g, '');
                if(this.value.length > this.maxlength) this.value=this.value.slice(0,this.maxLength); " maxlength="10">
            <div class="invalid-feedback">Please, enter your Mobile Number!</div>
          </div>
          <div class="col-12">
            <label for="address" class="form-label">Address</label>
            <input value="{{ old('address') }}" type="text" name="address" class="form-control" id="address" >
            <div class="invalid-feedback">Please, enter your Address!</div>
          </div>

        <div class="col-12">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="password" required>
          <span style="color:red;">{{ $errors->first('password') }}</span>

          <div class="invalid-feedback">Please enter your password!</div>
        </div>
        <div class="col-12">
          <label for="confirm_password" class="form-label">Confirm Password</label>
          <input type="password" name="confirm_password" class="form-control" id="confirm_password" required>
          <span style="color:red;">{{ $errors->first('confirm_password') }}</span>

          <div class="invalid-feedback">Please enter your password again to Confirm!</div>
        </div>


        <div class="col-12">
          <button class="btn btn-primary w-100" type="submit">Create Account</button>
        </div>
        <div class="col-12">
          <p class="small mb-0">Already have an account? <a href="{{ url('/login') }}">Log in</a></p>
        </div>
      </form>

    </div>
  </div>


@endsection
