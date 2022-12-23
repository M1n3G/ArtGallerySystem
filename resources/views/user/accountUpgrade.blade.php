@extends('master')
@section('content')
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
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-xl-12 mt-4 mb-4">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                    <form style="display: inline;" method="post" action="{{ route('artist.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <input type="text" name="workshopName" class="form-control form-control-lg" />
                                    <label class="form-label" for="workshopName">Workshop Name</label>
                                </div>

                            </div>
                            <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <input type="text" name="shopEstablisher" class="form-control form-control-lg" />
                                    <label class="form-label" for="shopEstablisher">Workshop Establisher</label>
                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-4">

                                <div class="form-outline datepicker w-100">
                                    <textarea type="text" class="form-control form-control-lg" rows="5" cols="20" name="workshopAddress"></textarea>
                                    <label for="shopCreateDate" class="form-label">Workshop Address</label>
                                </div>


                            </div>
                            <div class="col-md-6 mb-4 align-items-center">

                                <div class="form-outline">
                                    <input type="text" name="city" class="form-control form-control-lg" />
                                    <label class="form-label" for="city">City</label>
                                </div>
                                <br>
                                <div class="form-outline">
                                    <input type="text" name="state" class="form-control form-control-lg" />
                                    <label class="form-label" for="state">State</label>
                                </div>
                                <br>
                                <div class="form-outline">
                                    <input type="text" name="postcode" class="form-control form-control-lg" />
                                    <label class="form-label" for="postcode">PostCode</label>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4 align-items-center">

                                <div class="form-outline datepicker w-100">
                                    <label for="shopCreateDate" class="form-label">&nbsp&nbspWorkshop Create Date</label>
                                    <input type="date" class="form-control form-control-lg" name="shopCreateDate" />

                                </div>

                            </div>
                            <div class="col-md-6 mb-4">

                                <div class="form-outline datepicker w-100">
                                    <textarea type="text" class="form-control form-control-lg" rows="5" cols="20" name="shopDesc"></textarea>
                                    <label for="shopDesc" class="form-label">Workshop description</label>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">

                                <div class="form-outline">
                                    <input type="email" name="emailAddress" class="form-control form-control-lg" />
                                    <label class="form-label" for="emailAddress">Email</label>
                                </div>

                            </div>
                            <div class="col-md-6 mb-4 pb-2">

                                <div class="form-outline">
                                    <input type="tel" name="phoneNumber" class="form-control form-control-lg" />
                                    <label class="form-label" for="phoneNumber">Phone Number</label>
                                </div>

                            </div>
                        </div>

                        <hr />


                        <div class="card">
                            <div class="card-header">Add New Artwork</div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label class="label fw-semibold fs-6">Artwork Name</label>
                                    <input type="text" id="title" name="title" class="form-control mt-2" onkeyup="draft2()" required />
                                </div>

                                <div class="form-group">
                                    <label class="label fw-semibold fs-6">Artist Name</label>
                                    <input type="text" id="artistName" name="artistName" class="form-control mt-2" required />
                                </div>

                                <div class="form-group mt-4">
                                    <label class="label fw-semibold fs-6 mb-2">Artwork Description</label>
                                    <textarea name="artDesc" id="artDesc" rows="10" cols="30" onkeyup="draft2()" class="form-control mt-2"></textarea>

                                </div>

                                <div class="form-group mt-4">
                                    <label class="label fw-semibold fs-6 mb-2">Artwork Image</label>
                                    <input type="file" class="form-control" name="artImg">
                                </div>


                                <div class="form-group mt-4">
                                    <label class="label fw-semibold fs-6">Category</label>
                                    <select name="category_id" class="form-control mt-2">
                                        @foreach ($category as $catitem)
                                        <option value="{{ $catitem->id }}">{{ $catitem->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mt-4">
                                    <label class="label fw-semibold fs-6">Artwork Style</label>
                                    <select name="style" class="form-control mt-2">
                                        <option value="">--Select Artwork Style--</option>
                                        <option value="Abstract">Abstract</option>
                                        <option value="Figurative">Figurative</option>
                                        <option value="Geometric">Geometric</option>
                                        <option value="Minimalist">Minimalist</option>
                                        <option value="Nature">Nature</option>
                                        <option value="Potrraiture">Potrraiture</option>
                                        <option value="Sculpture">Sculpture</option>
                                        <option value="Still Life">Still Life</option>
                                        <option value="Surrealist">Surrealist</option>
                                        <option value="Typography">Typography</option>
                                        <option value="Urban">Urban</option>
                                    </select>
                                </div>

                                <div class="form-group mt-4">
                                    <label class="label fw-semibold fs-6 mb-2">Artwork Year</label>
                                    <input type="text" class="form-control" name="artYear">
                                </div>


                                <div class="form-group">
                                    <label class="label fw-semibold fs-6">Artwork Price</label>
                                    <input type="text" id="artPrice" name="artPrice" class="form-control mt-2" min='0' max='10000000' required />
                                </div>

                            </div>
                        </div>

                        <hr />
                        <div class="d-grid gap-2 d-md-flex mt-4 justify-content-md-end">
                            <a class="btn btn-outline-dark text-capitalize" href="{{route('profile.show')}}" style="width:125px;">Cancel</a>
                            <button class="btn btn-primary text-capitalize" style="width:125px;" type="submit">Submit</button>
                          
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
    }

    .card-registration .select-arrow {
        top: 13px;
    }
</style>
@endsection