@extends('master')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/profile.css') }}">
</head>

<div class="container">
    @if (count($errors) > 0)
    <div class="container mt-4">
        <div class="alert alert-danger alert-dismissible fade show form-control" role="alert">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <div class="container mt-4">
        @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
            <div class="text-left">
                {{ \Session::get('success') }}
                {{ \Session::forget('success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (\Session::has('fail'))
        <div class="alert alert-danger alert-dismissible fade show form-control" role="alert">
            <div class="text-left">
                {{ \Session::get('fail') }}
                {{ \Session::forget('fail') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <div class="row profile">
        <div class="col-md-3">
            @include('user.sidebar')
        </div>

        <div class="col-md-9">
            <div class="profile-content mt-3 px-4">
                <div class="card">

                    <div class="card-body px-4">

                        <!-- PROFILE -->
                        <div class="profile">
                            <div class="profileheader">
                                <p class="titlespan1 mt-3 fw-semibold">My Profile</p>
                                <p class="titlespan2">Manage and protect your account</p>
                                <hr />
                            </div>

                            <!-- Username -->
                            <div class="mb-3 row">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <div readonly class="form-control-plaintext"> {{ Session::get('username') }}</div>
                                </div>
                            </div>


                            <!-- Name -->
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <div readonly class="form-control-plaintext">{{ $users->name }}</div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <div readonly class="form-control-plaintext">{{ $users->email }}</div>
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div class="mb-3 row">
                                <label for="contact" class="col-sm-2 col-form-label">Phone Number</label>
                                <div class="col-sm-10">
                                    <div readonly class="form-control-plaintext">{{ $users->contactNum }}</div>
                                </div>
                            </div>

                            <!-- Gender -->
                            <div class="mb-3 row">
                                <label for="Gender" class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <div readonly class="form-control-plaintext">
                                        @if(empty($users->gender))
                                        <span>Not specified</span>
                                        @else
                                        {{ $users->gender }}
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- About -->
                            <div class="mb-3 row">
                                <label for="about" class="col-sm-2 col-form-label">About</label>
                                <div class="col-sm-10 text-left">
                                    <textarea name="about" rows="5" cols="30" class="form-control mt-2" readonly> {{$users->about}}</textarea>
                                </div>
                            </div>

                            <!-- Image -->
                            <!-- <div class="mb-3 row">
                                <label for="userImg" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    @if(empty($users->userImg))
                                    <img src="{{ asset('/storage/Img/user-default.png')}}" width="150" height="150" class="img-responsive" alt="">
                                    @else   
                                    <img src="{{ $users->userImg }}" width="150" height="150" class="img-responsive" alt="">
                                    @endif
                                </div>
                            </div> -->

                            <hr class="mt-4 mb-4" />

                            <div class="d-grid gap-2 d-md-flex mt-4 justify-content-md-end">
                                <a class="btn btn-dark text-capitalize" href="{{route('profile.edit',$users->userID) }}" style="width:125px;">Edit</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection