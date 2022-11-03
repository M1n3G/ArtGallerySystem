@extends('master')
@section('content')

<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('Css/login.css') }}">
</head>

<!--Main area-->
<main id="main" class="main-site">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">

      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-white text-white" style="border-radius: 1rem;" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
          <div class="card-body p-5 text-center">

            <!-- Message -->
            @if (\Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
              <div class="text-center">
                {{ \Session::get('success') }}
                {{ \Session::forget('success') }}
              </div>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form action="{{ route('login.login') }}" method="post">
              @csrf
              <div class="md-5 mt-md-4 pb-5">
                @if (\Session::has('fail'))
                <div class="alert alert-success alert-danger fade show form-control" role="alert"> 
                    {{ \Session::get('fail') }}
                    {{ \Session::forget('fail') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <!-- Content -->
                <h2 class="fw-bold mb-2 text-uppercase" style="color:black">Login</h2>
                <p class="text-black-50 mb-5">Welcome Back !</p>

                <div class="mb-4">
                  <label for="username" class="form-label" style="float:left">Username</label>
                  <input type="text" class="form-control" name="username" style="height:45px;" value="{{ old('username') }}">
                </div>

                <div class="mb-4">
                  <label for="password" class="form-label" style="float:left">Password</label>
                  <input type="password" class="form-control" name="password" style="height:45px;" value="{{ old('password') }}">
                </div>

                <p class="small mb-5 pb-lg-2"><a class="text-black-50" href="#">Forgot password?</a></p>

                <button class="btn loginBtn btn-dark btn-lg" type="submit">Login</button>
              </div>

              <div>
                <p class="mb-0 text-black">Don't have an account? <a href="register" class="text-black-50 fw-bold">Sign Up</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>
@endsection