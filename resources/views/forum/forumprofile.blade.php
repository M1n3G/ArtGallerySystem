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
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
            <div class="text-left">
                {{ Session::get('success') }}
                {{ Session::forget('success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (\Session::has('fail'))
        <div class="alert alert-danger alert-dismissible fade show form-control" role="alert">
            <div class="text-left">
                {{ Session::get('fail') }}
                {{ Session::forget('fail') }}
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
                                <div class="row">
                                    <div class="col">
                                        <p class="titlespan1 fw-semibold">Forum Profile</p>
                                    </div>

                                    <div class="col text-end">
                                        @if (Session::get('userRole') == 'User' || 'Artist' || 'Moderator' )
                                        <span class="badge text-bg-success" style="width:125px; height:22px;">
                                            <div style="font-size: 12px" class="text-uppercase">
                                                FORUM MEMBER
                                            </div>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <p class="titlespan2">Manage your forum profile</p>

                            </div>
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">Profile</button>
                                    <button class="nav-link" id="nav-subscriptions-tab" data-bs-toggle="tab" data-bs-target="#nav-subscriptions" type="button" role="tab" aria-controls="nav-subscriptions" aria-selected="false">Subscriptions</button>
                                    <button class="nav-link" id="nav-bookmarks-tab" data-bs-toggle="tab" data-bs-target="#nav-bookmarks" type="button" role="tab" aria-controls="nav-bookmarks" aria-selected="false">Bookmarks</button>
                                    <button class="nav-link" id="nav-post-tab" data-bs-toggle="tab" data-bs-target="#nav-post" type="button" role="tab" aria-controls="nav-post" aria-selected="false">Manage Your Post</button>
                                    <button class="nav-link" id="nav-privacy-tab" data-bs-toggle="tab" data-bs-target="#nav-privacy" type="button" role="tab" aria-controls="nav-privacy" aria-selected="false">Privacy</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                                    <!-- Username -->
                                    <div class="mb-3 row">
                                        <label for="username" class="col-sm-2 col-form-label mt-3">Username</label>
                                        <div class="col-sm-10">
                                            <div readonly class="form-control-plaintext mt-3"> {{ Session::get('username') }}</div>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3 row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <div readonly class="form-control-plaintext">{{ $users->email }}</div>
                                        </div>
                                    </div>

                                    <!-- Posts-->
                                    <div class="mb-3 row">
                                        <label for="contact" class="col-sm-2 col-form-label">Posts</label>
                                        <div class="col-sm-10">
                                            <div readonly class="form-control-plaintext"></div>
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

                                    <!-- Joined -->
                                    <div class="mb-3 row">
                                        <label for="contact" class="col-sm-2 col-form-label"> Joined</label>
                                        <div class="col-sm-10">
                                            <div readonly class="form-control-plaintext">{{ date('l, d-m-Y h:i:s a',strtotime($users['datetime'])) }}</div>
                                        </div>
                                    </div>

                                    <!-- About -->
                                    <div class="mb-3 row">
                                        <label for="about" class="col-sm-2 col-form-label">About you</label>
                                        <div class="col-sm-10 text-left">
                                            <textarea name="about" rows="5" cols="30" class="form-control mt-2" readonly> {{$users->about}}</textarea>
                                        </div>
                                    </div>

                                    <hr class="mt-4 mb-4" />

                                    <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a class="btn btn-dark text-capitalize" href="{{route('profile.edit',$users->userID) }}" style="width:125px;">Edit</a>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="nav-subscriptions" role="tabpanel" aria-labelledby="nav-subscriptions-tab" tabindex="0">.0.</div>
                                <div class="tab-pane fade" id="nav-bookmarks" role="tabpanel" aria-labelledby="nav-bookmarks-tab" tabindex="0">.1..</div>
                                <div class="tab-pane fade" id="nav-post" role="tabpanel" aria-labelledby="nav-post-tab" tabindex="0">..2.</div>
                                <div class="tab-pane fade" id="nav-privacy" role="tabpanel" aria-labelledby="nav-privacy-tab" tabindex="0">..3.</div>
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


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection