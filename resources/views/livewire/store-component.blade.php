<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/sidebar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/variables.css') }}">
</head>

<!--Main area-->
<main id="main" class="main-site left-sidebar" style="margin-top: 25px;">

    <div class="container">

        <!-- TITLE -->
        <h5 class="store-Title mt-4 mb-4" style="font-family: 'Poppins', sans-serif;">Original Contemporary Artworks for Sale</h5>

        <!-- FILTER -->
        <div class="row">
            <div class="d-none d-md-block col-md-4 col-lg-3">
                <!-- BREADCUMB -->
                <div class="row mt-4 breadcumb-top">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
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
                        <p class="widget-title" style="flex: 0 0 90%; margin-bottom: 0px;">PRICE</p>
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


            </div>

            <!-- ARTWORKS -->
            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">


                <div class="sort-control">

                    <div class="row" style="height: 50px;">
                        <div class="col-xl-4">
                            <select name="orderby" class="use-chosen">
                                <option value="menu_order" selected="selected">Default sorting</option>
                                <option value="popularity">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </div>

                        <div class="col-xl-4">
                            <select name="post-per-page" class="use-chosen">
                                <option value="12" selected="selected">12 per page</option>
                                <option value="16">16 per page</option>
                                <option value="18">18 per page</option>
                                <option value="21">21 per page</option>
                                <option value="24">24 per page</option>
                                <option value="30">30 per page</option>
                                <option value="32">32 per page</option>
                            </select>
                        </div>

                        <div class="col-xl-4">
                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                            <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                        </div>

                    </div>

                </div>
                <!--end wrap shop control-->


                <div class="row">
                    <ul class="product-list grid-products equal-container">

                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_20.jpg" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                    <a href="#" class="btn add-to-cart">Add To Cart</a>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_22.jpg" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                    <a href="#" class="btn add-to-cart">Add To Cart</a>
                                </div>
                            </div>
                        </li>
                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                        <figure><img src="assets/images/products/digital_10.jpg" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                    <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                    <a href="#" class="btn add-to-cart">Add To Cart</a>
                                </div>
                            </div>
                        </li>


                    </ul>

                </div>

                <div class="wrap-pagination-info">
                    <ul class="page-numbers">
                        <li><span class="page-number-item current">1</span></li>
                        <li><a class="page-number-item" href="#">2</a></li>
                        <li><a class="page-number-item" href="#">3</a></li>
                        <li><a class="page-number-item next-link" href="#">Next</a></li>
                    </ul>
                    <p class="result-count">Showing 1-8 of 12 result</p>
                </div>
            </div>
            <!--end main artworks area-->


        </div>
        <!--end row-->

    </div>
    <!--end container-->

</main>
<!--main area-->