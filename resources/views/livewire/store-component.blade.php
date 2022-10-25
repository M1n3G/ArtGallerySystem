<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/variables.css') }}">
</head>

<!--Main area-->
<main id="main" class="main-site" style="margin-top: 25px;">

    <div class="container">

        <!-- TITLE -->
        <h5 class="store-Title" style="font-family: 'Poppins', sans-serif;">Original Contemporary Artworks for Sale</h5>

        <!-- FILTER -->
        <div class="row"  data-aos="fade-left">
            <div class="d-none d-md-block col-md-4 col-lg-3">
                <!-- BREADCUMB -->
                <div class="row mt-4 breadcumb-top">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/home" class="text-decoration-none">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Artwork</li>
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
                                <option value="medium">Test</option>
                                <option value="medium">Test</option>

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
                                <option value="medium">Test</option>
                                <option value="medium">Test</option>

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
                                <option value="medium">Test</option>
                                <option value="medium">Test</option>
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
                    <div class="col-lg-4 cardMb">
                        <div class="card mx-auto h-100" style="width: 18rem; ">
                            <img src="{{ asset('Img/weilinggallery.jpg') }}" class="card-img-top" alt="">

                            <div class="card-body">
                                <h5 class="card-title text-center">Art1</h5>
                                <hr />
                                <div class="card-text">
                                    <div class="text-center">Chong Ming</div>
                                    <div class="text-center">Painting</div>
                                    <div class="text-center">MYR 2,100</div>
                                    <hr />
                                    <div class=" text-center">
                                        <button type="button" class="btn btn-dark">View Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Column for card-->
                    <div class="col-lg-4 cardMb">
                        <div class="card mx-auto h-100" style="width: 18rem; ">
                            <img src="{{ asset('Img/pinkguygallery.jpeg') }}" class="card-img-top" alt="">

                            <div class="card-body">
                                <h5 class="card-title text-center">Art1</h5>
                                <hr />
                                <div class="card-text">
                                    <div class="text-center">Chong Ming</div>
                                    <div class="text-center">Painting</div>
                                    <div class="text-center">MYR 2,100</div>
                                    <hr />
                                    <div class=" text-center">
                                        <button type="button" class="btn btn-dark">View Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Column for card-->
                    <div class="col-lg-4 cardMb">
                        <div class="card mx-auto h-100" style="width: 18rem; ">
                            <img src="{{ asset('Img/ilhamartshow2022.jpg') }}" class="card-img-top" alt="">

                            <div class="card-body">
                                <h5 class="card-title text-center">Art1</h5>
                                <hr />
                                <div class="card-text">
                                    <div class="text-center">Chong Ming</div>
                                    <div class="text-center">Painting</div>
                                    <div class="text-center">MYR 2,100</div>
                                    <hr />
                                    <div class=" text-center">
                                        <button type="button" class="btn btn-dark">View Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Column for card-->
                    <div class="col-lg-4 cardMb">
                        <div class="card mx-auto h-100" style="width: 18rem; ">
                            <img src="{{ asset('Img/ilhamartshow2022.jpg') }}" class="card-img-top" alt="">

                            <div class="card-body">
                                <h5 class="card-title text-center">Art1</h5>
                                <hr />
                                <div class="card-text">
                                    <div class="text-center">Chong Ming</div>
                                    <div class="text-center">Painting</div>
                                    <div class="text-center">MYR 2,100</div>
                                    <hr />
                                    <div class=" text-center">
                                        <button type="button" class="btn btn-dark">View Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Column for card-->
                    <div class="col-lg-4 cardMb">
                        <div class="card mx-auto h-100" style="width: 18rem; ">
                            <img src="{{ asset('Img/ilhamartshow2022.jpg') }}" class="card-img-top" alt="">

                            <div class="card-body">
                                <h5 class="card-title text-center">Art1</h5>
                                <hr />
                                <div class="card-text">
                                    <div class="text-center">Chong Ming</div>
                                    <div class="text-center">Painting</div>
                                    <div class="text-center">MYR 2,100</div>
                                    <hr />
                                    <div class=" text-center">
                                        <button type="button" class="btn btn-dark">View Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Column for card-->
                    <div class="col-lg-4 cardMb">
                        <div class="card mx-auto h-100" style="width: 18rem; ">
                            <img src="{{ asset('Img/ilhamartshow2022.jpg') }}" class="card-img-top" alt="">

                            <div class="card-body">
                                <h5 class="card-title text-center">Art1</h5>
                                <hr />
                                <div class="card-text">
                                    <div class="text-center">Chong Ming</div>
                                    <div class="text-center">Painting</div>
                                    <div class="text-center">MYR 2,100</div>
                                    <hr />
                                    <div class=" text-center">
                                        <button type="button" class="btn btn-dark">View Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr />

                <!-- PAGINATION -->
                <nav aria-label="pageNavigation">
                    <ul class="pagination justify-content-end">
                        <li class="page-item disabled">
                            <a class="page-link">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!--end main artworks area-->


        </div>
        <!--end row-->

    </div>
    <!--end container-->

</main>
<!--main area-->