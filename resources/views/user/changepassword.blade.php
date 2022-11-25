@extends('master')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/profile.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>

<div class="container mt-4">
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

    @if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show form-control" role="alert">
        <div class="text-left">
            {{ Session::get('error') }}
            {{ Session::forget('error') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>

<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            @include('user.sidebar')
        </div>

        <div class="col-md-9">
            <div class="profile-content mt-3 px-4">
                <div class="card">

                    <div class="card-body px-4">

                        <!-- CHANGE PASSWORD-->
                        <div class="password">
                            <div class="profileheader">
                                <p class="titlespan1 mt-3 fw-semibold">Change Password</p>
                                <p class="titlespan2">For your account's security, do not share your password with anyone else</p>
                                <hr class="mb-4"/>

                                <form method="post" action="{{ route('password.update') }}" class="row g-3">
                                    @csrf
                                    <!-- Current Password -->
                                    <div class="mb-3 row">
                                        <label for="oldpassword" class="col-sm-2 col-form-label">Current Password</label>
                                        <div class="col-sm-10">
                                            <div class="input-group mb-2">
                                                <input type="password" class="form-control mt-2" style="height: 40px;" id="password" name="password">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text mt-2" style="height: 40px;"><i class="fas fa-eye-slash" id="eye"></i></div>
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
                                        </div>
                                    </div>

                                    <!-- New Password -->
                                    <div class="mb-3 row">
                                        <label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
                                        <div class="col-sm-10">
                                            <div class="input-group mb-2">
                                                <input type="password" class="form-control mt-2" style="height: 40px;" id="new_password" name="new_password">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text mt-2" style="height: 40px;"><i class="fas fa-eye-slash" id="eye1"></i></div>
                                                </div>

                                                <script>
                                                    $(function() {
                                                        $('#eye1').click(function() {
                                                            if ($(this).hasClass('fa-eye-slash')) {

                                                                $(this).removeClass('fa-eye-slash');

                                                                $(this).addClass('fa-eye');

                                                                $('#new_password').attr('type', 'text');
                                                            } else {

                                                                $(this).removeClass('fa-eye');

                                                                $(this).addClass('fa-eye-slash');

                                                                $('#new_password').attr('type', 'password');
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="mb-3 row">
                                        <label for="conpassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                        <div class="col-sm-10">
                                            <div class="input-group mb-2">
                                                <input type="password" class="form-control mt-2" style="height: 40px;" id="password_confirm" name="password_confirm">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text mt-2" style="height: 40px;"><i class="fas fa-eye-slash" id="eye2"></i></div>
                                                </div>
                                            </div>
                                            <script>
                                                $('#new_password, #password_confirm').on('keyup', function() {
                                                    if ($('#new_password').val() == $('#password_confirm').val()) {
                                                        $('#message').html('Password match').css('color', 'green');
                                                    } else
                                                        $('#message').html('Password not  match').css('color', 'red');
                                                });
                                            </script>
                                            <script>
                                                $(function() {
                                                    $('#eye2').click(function() {
                                                        if ($(this).hasClass('fa-eye-slash')) {

                                                            $(this).removeClass('fa-eye-slash');

                                                            $(this).addClass('fa-eye');

                                                            $('#password_confirm').attr('type', 'text');
                                                        } else {

                                                            $(this).removeClass('fa-eye');

                                                            $(this).addClass('fa-eye-slash');

                                                            $('#password_confirm').attr('type', 'password');
                                                        }
                                                    });
                                                });
                                            </script>
                                            <br><span id='message'></span>
                                        </div>
                                    </div>

                                    <hr class="mt-4 mb-4" />

                                    <a href="{{ route('forget.password.get') }}" style="color:#757575">Forgot your password?</a>
                                    <div class="d-grid gap-2 d-md-flex mt-4 justify-content-md-end">
                                        <button class="btn btn-primary text-capitalize" style="width:125px;" type="submit">Confirm</button>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection