@extends('master')
@section('content')

<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('Css/register.css') }}">
</head>

<main id="main" class="main-site">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-white text-white" style="border-radius: 1rem;" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
          <div class="card-body p-5 text-center">

            <div class="md-5 mt-md-4 pb-5">
              <!-- @if (\Session::has('fail'))
              <div class="container">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ \Session::get('fail') }}
                  {{ \Session::forget('fail') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
              @endif -->

              <h2 class="fw-bold mb-2 text-uppercase" style="color:black">Sign Up</h2>
              <p class="text-black-50 mb-5">Sign up to collect art by the world’s leading artists</p>

              <form method="post" action="{{ route('register.register') }}" class="bg-white">
              @csrf
                <div class="mb-4">
                  <label for="username" class="form-label" style="float:left">Username</label>
                  <input type="text" class="form-control" name="username" style="height:45px;" value="{{ old('username') }}">
                </div>

                <div class="mb-4">
                  <label for="name" class="form-label" style="float:left">Name</label>
                  <input type="text" class="form-control" name="name" style="height:45px;" value="{{ old('name') }}">
                </div>

                <div class="mb-4">
                  <label for="email" class="form-label" style="float:left">Email address</label>
                  <input type="email" class="form-control" name="email" style="height:45px;" value="{{ old('email') }}">
                </div>

                <div class="mb-4">
                  <label for="contactNum" class="form-label" style="float:left">Contact Number</label>
                  <input type="text" class="form-control" name="contactNum" style="height:45px;" value="{{ old('contactNum') }}">
                </div>

                <div class="mb-4">
                  <label for="password" class="form-label" style="float:left">Password</label>
                  <input type="password" class="form-control" name="password" style="height:45px;" value="{{ old('password') }}">
                </div>
   


                <!-- <div class="form-outline" style="margin-bottom: 45px;">
                  <input type="password" name="password_confirmation" class="form-control form-control-lg" value="{{ old('conPass') }}" style="height:50px;" required="required" />
                  <label class="form-label">Confirm Password</label>
                </div> -->


                <button class="btn registerBtn btn-dark btn-lg" style="margin-top: 30px;" type="submit">Sign Up</button>
              </form>
            </div>

            <div>
              <p class="mb-0 text-black">Already have an account? <a href="/login" class="text-black-50 fw-bold">Sign In</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection