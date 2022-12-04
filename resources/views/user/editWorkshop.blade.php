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
                                <p class="titlespan1 mt-3 fw-semibold">WorkShop Details</p>
                                <hr />
                            </div>
                            @foreach($workshop as $rows)
                            <form method="post" class="row g-3" action="{{  route('workshop.store') }}">
                                @csrf
                                <div class="col-md-6">
                                    <label for="shopName" class="form-label">workshop Name</label>
                                    <input type="text" class="form-control" name="shopName" value="{{$rows->name}}"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="shopEstablisher" class="form-label">workshop Establisher</label>
                                    <input type="text" class="form-control" name="shopEstablisher"
                                        value="{{$rows->establisher}}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="shopEmail" class="form-label">workshop Email</label>
                                    <input type="email" class="form-control" name="shopEmail" value="{{$rows->email}}"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="shopContact" class="form-label">workshop Contact Number</label>
                                    <input type="text" class="form-control" name="shopContact" value="{{$rows->phone}}"
                                        required>
                                </div>
                                <div class="col-12">
                                    <label for="shopDesc" class="form-label">Description</label>
                                    <textarea type="text" class="form-control" id="shopDesc" name="shopDesc" value="#"
                                        onkeyup="draft2()" required>{!!$rows->description!!}</textarea>
                                </div>
                                <div class="col-12">
                                    <label for="shopAddress" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="shopAddress"
                                        value="{{$rows->address}}" required>
                                </div>
                                <div class="col-12">
                                    <label for="shopCity" class="form-label">City</label>
                                    <input type="text" class="form-control" name="shopCity" value="{{$rows->city}}"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="shopState" class="form-label">State</label>
                                    <input type="text" class="form-control" name="shopState" value="{{$rows->state}}"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="shopPostcode" class="form-label">Postal Code</label>
                                    <input type="text" class="form-control" name="shopPostcode"
                                        value="{{$rows->postcode}}" required>
                                </div>



                                <hr class="mt-4 mb-4" />

                                <div class="d-grid gap-2 d-md-flex mt-4 justify-content-md-end">
                                    <a class="btn btn-outline-dark text-capitalize" href=""
                                        style="width:125px;">Back</a>
                                    <button class="btn btn-primary text-capitalize"
                                        onsubmit="return confirm('Are you sure you wish to update workshop Details?');"
                                        style="width:125px;" type="submit">Update</button>
                                </div>



                            </form>
                            @endforeach
                        </div>
                        <script>
                        function draft2() {
                            var y = document.getElementById("shopDesc");
                            sessionStorage.setItem("shopDesc", y.value);
                        }

                        function submit() {
                            sessionStorage.removeItem("shopDesc");
                        }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
ClassicEditor
    .create(document.querySelector('#shopDesc'), {
        removePlugins: ['indent', 'image'],
        toolbar: ['Heading', 'Bold', 'Italic', 'Link', 'bulletedList', 'numberedList', 'blockQuote',
            'insertTable', 'Undo', 'Redo'
        ]
    })

    .catch(error => {
        console.error(error);
    });
</script>

@endsection