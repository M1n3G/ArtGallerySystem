@extends('master')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/card.css') }}">
</head>

<!--Main area-->
<main id="main" class="main-site" style="margin-top: 25px;">

    <div class="container">

        <!-- TITLE -->
        <h5 class="store-Title" style="font-family: 'Poppins', sans-serif;">Original Contemporary Art in Malaysia</h5>

        @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
            <div class="text-left">
                {{ Session::get('message') }}
                {{ Session::forget('message') }}
             
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- FILTER -->
        <div class="row" data-aos="fade-left">
            <div class="d-none d-md-block col-md-4 col-lg-3 sticky-top">
                <!-- BREADCUMB -->
                <div class="row mt-4 breadcumb-top">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home" class="text-decoration-none">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Store</li>
                        </ol>
                    </nav>
                </div>

                <hr class="mt-2 mb-4" />

                <!-- MEDIUM -->
                <div class="d-none d-md-block mb-5">

                    <div class="d-flex mt-2 mb-2">
                        <p class="widget-title" style="flex: 0 0 90%; margin-bottom: 0px;">Medium</p>
                    </div>

                    <form action="{{ route('store.index') }}" method="GET">
                        <div class="input-group mb-3">
                            <select class="form-select" name="category" id="category">
                                <option value="">Any Medium</option>
                                @foreach($cat as $category)
                                <option class="option" value="{{$category->category_id}}">{{$category->name}}</option>
                                @endforeach

                            </select>
                            <button class="btn btn-outline-secondary searchBtn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>

                </div>

                <!-- STYLE -->
                <div class="d-none d-md-block mb-5">

                    <div class="d-flex mt-2 mb-2">
                        <p class="widget-title" style="flex: 0 0 90%; margin-bottom: 0px;">Style</p>
                    </div>

                    <div class="input-group mb-3">
                        <select class="form-select" name="style" id="inputGroupSelect02">
                            <option value="" selected>Any Style</option>
                            <option value="Abstract">Abstract</option>
                            <option value="Cosmic Art">Cosmic Art</option>
                            <option value="Geometric">Geometric</option>
                            <option value="Modern Art">Modern Art</option>
                            <option value="Media Art">Media Art</option>
                            <option value="Nature">Nature</option>
                            <option value="Sculpture">Sculpture</option>
                            <option value="Woodcut Printed">Woodcut Printed</option>
                            <option value="Urban">Urban</option>
                            '
                        </select>
                        <button class="btn btn-outline-secondary searchBtn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>

                </div>

                <!-- PRICE -->
                <div class="d-none d-md-block mb-5">

                    <div class="d-flex mt-2 mb-2">
                        <p class="widget-title" style="flex: 0 0 90%; margin-bottom: 0px;">Price</p>
                    </div>


                    <div class="input-group mb-3">
                        <select class="form-select" name="price" id="inputGroupSelect02">
                            <option value="" selected>Any Price</option>
                            <option value="1">RM 5,000 & below</option>
                            <option value="2">RM 5,000 - RM 10,000</option>
                            <option value="3">RM 10,000 - RM 20,000</option>
                            <option value="4">RM 20,000 - RM 30,000</option>
                            <option value="5">RM 30,000 & above</option>
                        </select>

                        <button class="btn btn-outline-secondary searchBtn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>

                </div>

                <!-- SORT -->
                <div class="d-none d-md-block mb-5">
                    <div class="d-flex mt-2 mb-2">
                        <p class="widget-title" style="flex: 0 0 90%; margin-bottom: 0px;">Sort</p>
                    </div>


                    <div class="input-group mb-3">
                        <select class="form-select" name="sort" id="sort-by">
                            <option selected="" value="">Sort</option>
                            <option value="1">Sort By: Latest</option>
                            <option value="2">Sort By: Lowest Price</option>
                            <option value="3">Sort By: Highest Price</option>
                            <option value="4">Sort By: A - Z</option>
                            <option value="5">Sort By: Z - A</option>
                        </select>
                        <button class="btn btn-outline-secondary searchBtn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                    </form>
                </div>

            </div>

            <!-- ARTWORKS -->

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 ml-4 main-content-area">

                <!-- ROW FOR CARD -->

                <div class="row w-100 p-0 w-0">

                    <!-- Column for card-->

                    @if (!empty($data) && count($data))
                    @foreach($data as $key => $value)
                    <div class="col-lg-4 cardMb">
                        <div class="card mx-auto h-100" style="width: 18rem;">
                            <img src="{{$value -> artImg}}" class="card-img-top" alt="" style="height:300px; max-height:300px">

                            <div class="card-body">
                                <h5 class="card-title text-center text-uppercase fw-bold">{{$value -> artName}}</h5>
                                <hr />
                                <div class="card-text lh-lg">
                                    <div class="text-center text-uppercase">{{$value-> artistName}}</div>
                                    <!-- <div class="text-center" style="color:#9d9d9d; font-size:13px;"></div> -->
                                    <div class="text-center fw-bolder" style="color:#910000; font-size:18px;">MYR {{$value -> artPrice}}</div>
                                    <hr />
                                    <div class=" text-center">
                                        <button type="button" class="btn btn-dark"><a href="{{route('storeDetails.details',$value->artID)}}" style="color:white; text-decoration: none">View Details</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="row">
                        <div class="alert alert-primary alert-dismissible fade show form-control" role="alert">
                            <div class="text-left">
                                No art found.
                                <a href="/store">&nbsp Store</a>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
         
                    @endif

                </div>

                <hr />

                <!--end main artworks area-->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

</main>
<!--main area-->
@endsection