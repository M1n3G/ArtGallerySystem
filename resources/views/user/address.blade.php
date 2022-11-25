@extends('master')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/profile.css') }}">
</head>

<div class="container">
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
                                <p class="titlespan1 mt-3 fw-semibold">My Address
                                    @if(empty($address->username))
                                    <a class="btn btn-primary text-capitalize float-end px-3" data-bs-toggle="modal" data-bs-target="#modal-show" data-bs-whatever="@mdo">Add New Address</a>
                                    @endif

                                <div class="modal fade" id="modal-show" tabindex="-1" aria-labelledby="modalshow" aria-hidden="true">
                                    <div class="modal-dialog modal-xl h-100">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="addaddress">Add new address</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('address.add') }}" class="row g-3">
                                                    @csrf
                                                    <div class="col-md-6">
                                                        <label for="name" class="form-label">Full Name</label>
                                                        <input type="text" class="form-control" id="name" name="name" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="contact" class="form-label">Phone Number</label>
                                                        <input type="text" class="form-control" id="contact" name="contact" placeholder="XXX-XXXXXXX" required>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="address" class="form-label">Address</label>
                                                        <input type="text" class="form-control" id="address" name="address" placeholder="House Number, Building, Street Name" required>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="city" class="form-label">City</label>
                                                        <input type="text" class="form-control" id="city" name="city" placeholder="Area" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="state" class="form-label">State</label>
                                                        <input type="text" class="form-control" id="state" name="state" placeholder="State" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="postalcode" class="form-label">Postal Code</label>
                                                        <input type="number" class="form-control" id="postalcode" name="postalcode" placeholder="XXXXX" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label for="houseno" class="form-label">House No</label>
                                                        <input type="text" class="form-control" id="houseno" name="houseno" required>
                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Add</button>
                                                </form>

                                                <script>
                                                    $("input[name='contact']").keyup(function() {
                                                        $(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d+)$/, "$1-$2$3"));
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </p>

                                <hr />
                            </div>

                            <form class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Full Name</label>
                                    <div readonly class="form-control-plaintext">
                                        @if(empty($address->name))
                                        <span>-</span>
                                        @else
                                        {{ $address->name }}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="contact" class="form-label">Phone Number</label>
                                    <div readonly class="form-control-plaintext">
                                        @if(empty($address->contact))
                                        <span>-</span>
                                        @else
                                        {{ $address->contact }}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label">Address</label>
                                    <div readonly class="form-control-plaintext">
                                        @if(empty($address->address))
                                        <span>-</span>
                                        @else
                                        {{ $address->contact }}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="city" class="form-label">City</label>
                                    <div readonly class="form-control-plaintext">
                                        @if(empty($address->city))
                                        <span>-</span>
                                        @else
                                        {{ $address->city }}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="state" class="form-label">State</label>
                                    <div readonly class="form-control-plaintext">
                                        @if(empty($address->state))
                                        <span>-</span>
                                        @else
                                        {{ $address->state }}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="postalcode" class="form-label">Postal Code</label>
                                    <div readonly class="form-control-plaintext">
                                        @if(empty($address->postalcode))
                                        <span>-</span>
                                        @else
                                        {{ $address->postalcode }}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label for="houseno" class="form-label">House No</label>
                                    <div readonly class="form-control-plaintext">
                                        @if(empty($address->houseno))
                                        <span>-</span>
                                        @else
                                        {{ $address->houseno }}
                                        @endif
                                    </div>
                                </div>
                            </form>

                            <hr class="mt-4 mb-4" />

                            <div class="d-grid gap-2 d-md-flex mt-4 justify-content-md-end">
                                @if(!empty($address->username))
                                <a class="btn btn-dark text-capitalize" href="{{route('address.edit',$users->userID) }}" style="width:125px;">Edit</a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection