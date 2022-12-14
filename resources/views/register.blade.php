@extends('master')
@section('content')

<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('Css/register.css') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<main id="main" class="main-site">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">

      @if (count($errors) > 0)
      <div class="container">
        <div class="alert alert-danger alert-dismissible fade show form-control" role="alert">
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
      @endif

      <div class="col-12 col-md-8 col-lg-6 col-xl-5">

        <div class="card bg-white text-white" style="border-radius: 1rem;" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
          <div class="card-body p-5 text-center">

            <div class="md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase" style="color:black">Sign Up</h2>
              <p class="text-black-50 mb-5">Sign up to collect art by the world’s leading artists</p>

              <form method="post" action="{{ route('register.register') }}" class="bg-white">
                @csrf
                <div class="mb-4">
                  <label for="username" class="form-label" style="float:left">Username</label>
                  <input type="text" class="form-control" name="username" data-mdb-showcounter="true" maxlength="30" style="height:45px;" value="{{ old('username') }}" required>
                </div>

                <div class="mb-4">
                  <label for="name" class="form-label" style="float:left">Name</label>
                  <input type="text" class="form-control" name="name" style="height:45px;" value="{{ old('name') }}" required>
                </div>

                <div class="mb-4">
                  <label for="email" class="form-label" style="float:left">Email address</label>
                  <input type="email" class="form-control" name="email" style="height:45px;" value="{{ old('email') }}" required>
                </div>

                <div class="mb-4">
                  <label for="contactNum" class="form-label" style="float:left">Contact Number</label>
                  <input type="text" class="form-control" name="contactNum" style="height:45px;" value="{{ old('contactNum') }}" required>

                  <script>
                    $("input[name='contactNum']").keyup(function() {
                      $(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d+)$/, "$1-$2$3"));
                    });
                  </script>
                </div>

                <div class="mb-4">
                  <label for="password" class="form-label" style="float:left">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control mt-2" style="height: 40px;" id="password" name="password" style="height:45px;" value="{{ old('password') }}" required>>
                    <div class="input-group-prepend">

                      <div class="input-group-text mt-2" style="height: 40px;"><i class="fas fa-eye-slash" id="eye"></i></div>
                    </div>
                  </div>

                  <script>
                    $(function() {
                      $('#eye').click(function() {
                        if ($(this).hasClass('fa-eye-slash')) {

                          $(this).removeClass('fa-eye-slash');

                          $(this).addClass('fa-eye');

                          $('#password').attr('type', 'text');
                        } else {

                          $(this).removeClass('fa-eye');

                          $(this).addClass('fa-eye-slash');

                          $('#password').attr('type', 'password');
                        }
                      });
                    });
                  </script>
                </div>

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