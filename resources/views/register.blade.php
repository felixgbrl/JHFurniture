@extends('layouts.guest')
@section('container')



<div class="row justify-content-center">
  <div class="col-md-4 mt-2">
    <main class="form-registration">
      <form method="POST" action="/register">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">Register</h1>

        <div class="form-floating">
          <input type="text" class="form-control mb-5 @error('name') is-invalid @enderror" id="name" name="name" placeholder="Full Name">
          <label for="name">Enter your full name</label>
          @error('name')
              <div class="text-danger">{{ $message }} </div>  
          @enderror
        </div>

        <div class="form-floating">
          <input type="email" class="form-control mb-5  @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email">
          <label for="email">Enter your email</label>
          @error('email')
              <div class="text-danger">{{ $message }} </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="password" class="form-control mb-5  @error('password') is-invalid @enderror" id="password" placeholder="password" name="password">
          <label for="password">Enter your password</label>
          @error('password')
              <div class="text-danger">{{ $message }} </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="text" class="form-control mb-5 @error('address') is-invalid @enderror" id="address" placeholder="address" name="address">
          <label for="address">Enter your address</label>
          @error('address')
              <div class="text-danger">{{ $message }} </div>
          @enderror
        </div>

        <div class="form-check mt-3">
          <div class="row">
            <div class="col-6">
              <div class="Gender fw-bold">
                  Gender
              </div> 
            </div>
            <div class="col-3">
              <div class="form-group  @error('gender') is-invalid @enderror">
                <label><input name="gender" type="radio" value="M">M</label>
              </div>
            </div>
            <div class="col-3">
              <div class="radio">
                <label><input name="gender" type="radio" value="F">F</label>
              </div>
            </div>        
          </div>
          @error('gender')
            <div class="text-danger">{{ $message }} </div>
          @enderror
        </div>
        
        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
      
      </form>
    </main>
  </div>
</div>
@endsection

