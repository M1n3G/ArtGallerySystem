@extends('master')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/storedetails.css') }}">
</head>

<!--Main area-->
<main id="main" class="main-site" style="margin-bottom: 35px;">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb" style="font-family: 'Poppins', sans-serif;">
                    <li class="breadcrumb-item"><a href="/home" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active"><a href="/store" class="text-decoration-none">Store</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$artwork -> artworkName}}</a></li>
                </ol>
            </nav>
        </div>
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6 border text-center" style="height:700px; max-height:700px;">
                <img class="card-img-top mb-md-0 artImg" src="{{asset($artwork['artworkImg'])}}" alt="{{$artwork -> artworkName}}" style="width:535px; height:525px; max-width:535px; max-height:525px; margin-top:75px;" />
                <button type="button" class="btn btn-outline-dark mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width:150px;">
                    View Image
                </button>
            </div>
            <div class="col-md-6 lh-lg">
                <div class="row">
                    <div class="col-md-10">
                        <h1 class="fw-bolder" style="font-size:45px;">{{$artwork -> artworkName}}</h1>
                    </div>
                    <div class="col-md-2">
                        <button class="rounded-circle btn btn-outline-dark mt-2 wishlistBtn" style="float:right;" type="button">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>

                <p style="color:#9d9d9d; font-size:18px;">BY {{$artwork -> artist}}</p>
                <div class="row">
                    <div class="col-md-6">
                        <p class="fw-bold" style="color:#910000; font-size:28px;">MYR {{$artwork -> artworkPrice}}</p>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-outline-dark mt-2" style="float:right;" type="button">
                            <i class="bi-cart-fill me-1"></i>Add to cart
                        </button>
                    </div>
                </div>

                <div id="accordion" class="lh-base" role="tablist" aria-multiselectable="true">
                    <div class="card mt-4" style="border-radius:5px;">
                        <h5 class="card-header" style="height:40px;" role="tab" id="headingOne">
                            <a data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapseOne" class="d-block" style="font-family: 'Poppins', serif; text-decoration:none; font-size:17px; color:#910000;">
                                <i class="fa fa-chevron-down pull-right"></i> Overview
                            </a>
                        </h5>

                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                            <div class="card-body">
                                <p class="fw-bolder">Year:<br /></p>{{$artwork -> artworkYear}}</p>
                                <p class="fw-bolder">Description:<br /></p>{{$artwork -> artworkDesc}}</p>
                                <p class="fw-bolder">Dimension:<br /></p>
                                {{$artwork -> artworkWidth}} cm (Width) x {{$artwork -> artworkHeight}} cm (Height)</p>
                                <p class="fw-bolder">Medium:<br /></p>{{$artwork -> artworkMedium}}</p>
                                <p class="fw-bolder">Style:<br /></p>{{$artwork -> artworkStyle}}</p>
                                <span style="color:#9d9d9d; font-size:12px;">Note: Actual colours may vary due to photography & computer settings.</span>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>

    <!-- MODAL -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:600px; height:700px; margin-top:85px; margin-left:565px;">
            <div style="margin-left: 700px;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <div class="modal-body ">
                <img src="{{asset($artwork['artworkImg'])}}" alt="{{$artwork -> artworkName}}" style="width:750px; height:750px; max-width:750px; max-height:750px;" />
            </div>

        </div>
    </div>

    <!-- DESCRIPTIONS -->
    <div class="container">
        <hr />
        <div class="row lh-base">
            <div class="col-lg-4">
                <p class="mt-2 mb-0 text-center">
                    <i class="fa fa-picture-o" style="font-size: 30px; color: #910000;" aria-hidden="true"></i>
                    <br>
                    Curated<br>
                    Art & Design
                </p>
                <p class="mt-3 text-center" style="font-family: EB Garamond,serif; font-size: 15px;">We feature a curated selection of the best pieces from both emerging and established artists and designers in Malaysia.</p>
            </div>

            <div class="col-lg-4">
                <p class="mt-2 mb-0 text-center">
                    <i class="fa fa-certificate" style="font-size: 30px; color: #910000;" aria-hidden="true"></i>
                    <br>
                    Authenticity<br>
                    Guaranteed
                </p>
                <p class="mt-3 text-center" style="font-family: EB Garamond,serif; font-size: 15px;">Artworks come with Certificates of Authenticity from the Artist or Gallery.</p>
            </div>

            <div class="col-lg-4">
                <p class="mt-2 mb-0 text-center">
                    <i class="fa fa-truck" style="font-size: 30px; color: #910000;" aria-hidden="true"></i>
                    <br>
                    Concierge<br>
                    Service<br>
                </p>
                <p class="mt-3 text-center" style="font-family: EB Garamond,serif; font-size: 15px;">Ships securely to your door</p>
            </div>
            <hr />
        </div>

        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">Product</h5>
                                    <!-- Product price-->
                                    $40.00 - $80.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


</main>

@endsection