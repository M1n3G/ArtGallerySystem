@extends('master')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/profile.css') }}">
</head>

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

                        <!-- ADDRESS -->
                        <div class="address">
                            <div class="profileheader">
                                <p class="titlespan1 mt-3 fw-semibold">My Address</p>
                                <hr />
                            </div>

                            <form method="post" class="row g-3" action="{{ route('address.update', $users->userID) }}">
                                @csrf
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $address->name }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="contact" class="form-label">Phone Number</label>
                                    <input type="text" class="form-control" name="contact" value="{{ $address->contact }}">
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{ $address->address }}">
                                </div>
                                <div class="col-12">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" name="city" value="{{ $address->city }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" class="form-control" name="state" value="{{ $address->state }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="postalcode" class="form-label">Postal Code</label>
                                    <input type="number" class="form-control" name="postalcode" value="{{ $address->postalcode }}">
                                </div>
                                <div class="col-md-2">
                                    <label for="houseno" class="form-label">House No</label>
                                    <input type="text" class="form-control" name="houseno" value="{{ $address->houseno }}">
                                </div>


                            <hr class="mt-4 mb-4" />

                            <div class="d-grid gap-2 d-md-flex mt-4 justify-content-md-end">
                                <a class="btn btn-outline-dark text-capitalize" href="{{route ('address.show') }}" style="width:125px;">Back</a>
                                <button class="btn btn-primary text-capitalize" onsubmit="return confirm('Are you sure you wish to update this address?');" style="width:125px;" type="submit">Update</button>
                            </div>

                            <script>
                                $("input[name='contact']").keyup(function() {
                                    $(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d+)$/, "$1-$2$3"));
                                });
                            </script>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection