@extends('master')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/profile.css') }}">

    <script>
        $("input[name='contactNum']").keyup(function() {
            $(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d+)$/, "$1-$2$3"));
        });
    </script>
</head>

<!-- Profile -->
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

<div class="container ">
    <div class="row profile">
        <div class="col-md-3">
            @include('user.sidebar')
        </div>

        <div class="col-md-9">
            <div class="profile-content mt-3 px-4">
                <div class="card">

                    <div class="card-body px-4">
                        <form method="post" action="{{ route('profile.update', $users->userID) }}" enctype="multipart/form-data">
                            @csrf
                            <!-- PROFILE -->
                            <div class="profile">
                                <div class="profileheader">
                                    <p class="titlespan1 mt-3 fw-semibold">Edit Profile</p>
                                    <p class="titlespan2">Manage and protect your account</p>
                                    <hr />
                                </div>

                                <!-- Username -->
                                <div class="mb-3 row">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="username" class="form-control-plaintext" value="{{ Session::get('username') }}" readonly />
                                    </div>
                                </div>


                                <!-- Name -->
                                <div class="mb-3 row">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="name" class="form-control" id="name" name="name" value="{{ $users->name }}">
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" id="email" value="{{ $users->email }}" readonly>
                                    </div>
                                </div>

                                <!-- Phone Number -->
                                <div class="mb-3 row">
                                    <label for="contactNum" class="col-sm-2 col-form-label">Phone Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="contactNum" value="{{ $users->contactNum }}">
                                    </div>
                                </div>

                                <!-- Gender -->
                                <div class="mb-3 row">
                                    <label for="Gender" class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-sm-10">
                                        <select class="form-select form-control" name="gender" aria-label="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- About -->
                                <div class="mb-3 row">
                                    <label for="about" class="col-sm-2 col-form-label">About</label>
                                    <div class="col-sm-10 text-left">
                                        <textarea name="about" rows="5" cols="30" class="form-control mt-2"> {{$users->about}}</textarea>
                                    </div>
                                </div>

                                <!-- Image -->
                                <div class="mb-3 row">
                                    <label for="userImg" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <div class="col-sm-10">
                                            @if(empty($users->userImg))
                                            <img src="{{ asset('/storage/Img/user-default.png')}}" width="150" height="150" class="img-responsive" alt="">
                                            @else
                                            <img src="{{ $users->userImg }}" width="150" height="150" class="img-responsive" alt="">
                                            @endif
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex mt-4">
                                            <input type="file" class="form-control" name="image" accept="image/*">
                                        </div>

                                    </div>
                                </div>

                                <hr class="mt-4 mb-4" />

                                <div class="d-grid gap-2 d-md-flex mt-4 justify-content-md-end">
                                    <a class="btn btn-outline-dark text-capitalize" href="{{route ('profile.show') }}" style="width:125px;">Back</a>
                                    <button class="btn btn-primary text-capitalize" style="width:125px;" type="submit">Update</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection