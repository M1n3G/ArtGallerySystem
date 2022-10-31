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
        <h5 class="store-Title" style="font-family: 'Poppins', sans-serif;">Original Contemporary Artworks for Sale</h5>

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
                        <i class="fa fa-caret-down" aria-hidden="true"></i></button>

                    </div>

                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <select class="form-select" name="cat" id="inputGroupSelect02">
                                <option selected>Any Medium</option>
                                <option value="drawing">Drawing</option>
                                <option value="painting">Painting</option>
                                <option value="threeDimensionalArt">Three-Dimensional Art</option>
                                <option value="mixedMedia">Mixed-media</option>
                                <option value="photography">Photography</option>
                                <option value="graphicArt">Graphic Art</option>
                                <option value="illustration">Illustration</option>

                            </select>
                            <button class="btn btn-outline-secondary searchBtn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>

                <!-- STYLE -->
                <div class="d-none d-md-block mb-5">

                    <div class="d-flex mt-2 mb-2">
                        <p class="widget-title" style="flex: 0 0 90%; margin-bottom: 0px;">Style</p>
                        <i class="fa fa-caret-down" aria-hidden="true"></i></button>

                    </div>

                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <select class="form-select" name="cat" id="inputGroupSelect02">
                                <option selected>Any Style</option>
                                <option value="abstract">Abstract</option>
                                <option value="figurative">Figurative</option>
                                <option value="geometric">Geometric</option>
                                <option value="minimalist">Minimalist</option>
                                <option value="nature">Nature</option>
                                <option value="potrraiture">Potrraiture</option>
                            </select>
                            <button class="btn btn-outline-secondary searchBtn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>

                <!-- PRICE -->
                <div class="d-none d-md-block mb-5">

                    <div class="d-flex mt-2 mb-2">
                        <p class="widget-title" style="flex: 0 0 90%; margin-bottom: 0px;">Price</p>
                        <i class="fa fa-caret-down" aria-hidden="true"></i></button>

                    </div>

                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <select class="form-select" name="cat" id="inputGroupSelect02">
                                <option selected>Any Price</option>
                                <option value="below">RM 5,000 & below</option>
                                <option value="5">RM 5,000 - RM 10,000</option>
                                <option value="10">RM 10,000 - RM 20,000</option>
                                <option value="20">RM 20,000 - RM 30,000</option>
                                <option value="above">RM 30,000 & above</option>
                            </select>

                            <button class="btn btn-outline-secondary searchBtn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>

                <!-- SORT -->
                <div class="d-none d-md-block mb-5">
                    <div class="d-flex mt-2 mb-2">
                        <p class="widget-title" style="flex: 0 0 90%; margin-bottom: 0px;">Sort</p>
                        <i class="fa fa-caret-down" aria-hidden="true"></i></button>
                    </div>

                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <select class="form-select" name="cat" id="inputGroupSelect02">
                                <option selected>Default sorting</option>
                                <option value="popularity">Sort by popularity</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                            </select>

                            <button class="btn btn-outline-secondary searchBtn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </form>
                </div>

                <!-- PAGE DISPLAY -->
                <div class="d-none d-md-block mb-5">
                    <div class="d-flex mt-2 mb-2">
                        <p class="widget-title" style="flex: 0 0 90%; margin-bottom: 0px;">Page</p>
                        <i class="fa fa-caret-down" aria-hidden="true"></i></button>

                    </div>

                    <form action="" method="GET">
                        <div class="input-group mb-3">
                            <select class="form-select" name="cat" id="inputGroupSelect02">
                                <option value="12" selected="selected">12 per page</option>
                                <option value="18">18 per page</option>
                                <option value="24">24 per page</option>
                                <option value="32">32 per page</option>
                                <option value="40">40 per page</option>
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
                    @if (!empty($data) && $data->count())
                    @foreach($data as $key => $value)
                    <div class="col-lg-4 cardMb">
                        <div class="card mx-auto h-100" style="width: 18rem;">
                            <img src="{{$value -> artImg}}" class="card-img-top" alt="">

                            <div class="card-body">
                                <h5 class="card-title text-center text-uppercase fw-bold">{{$value -> artName}}</h5>
                                <hr />
                                <div class="card-text lh-lg">
                                    <div class="text-center text-uppercase">{{$value-> artist}}</div>
                                    <div class="text-center" style="color:#9d9d9d; font-size:13px;">{{$value -> artMedium}}</div>
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
                        <h3 class="text-center">There are no art.</h3>
                    </div>
                    @endif
                   
                </div>
                
                <hr />
     
                <!-- PAGINATION -->
                <nav aria-label="pageNavigation">
                    <ul class="pagination justify-content-end">
                    {!! $data->appends(Request::all())->links() !!}
                    </ul>
                </nav>
             
                <!--end main artworks area-->


            </div>
            <!--end row-->

        </div>
        <!--end container-->

</main>
<!--main area-->
@endsection