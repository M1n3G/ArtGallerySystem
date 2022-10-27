@extends('master')
@section('content')

<style>
    /* Carousel styling */
    #introCarousel,
    .carousel-inner,
    .carousel-item,
    .carousel-item.active {
        height: 100vh;
    }

    .carousel-item:nth-child(1) {
        background-image: url("../Img/weilinggallery.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
    }

    .carousel-item:nth-child(2) {
        background-image: url("../Img/pinkguygallery.jpeg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
    }

    .carousel-item:nth-child(3) {
        background-image: url("../Img/ilhamartshow2022.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
    }

    /* Height for devices larger than 576px */
    @media (min-width: 992px) {
        #introCarousel {
            margin-top: -58.59px;
        }
    }

    .navbar .nav-link {
        color: #fff !important;
    }
</style>

<!--- HOME CONTENT --->
<main id="main" class="main-site" data-aos="zoom-in">
    <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-mdb-target="#introCarousel" data-mdb-slide-to="0" class="active"></li>
            <li data-mdb-target="#introCarousel" data-mdb-slide-to="1"></li>
            <li data-mdb-target="#introCarousel" data-mdb-slide-to="2"></li>
        </ol>

        <!-- Inner -->
        <div class="carousel-inner">
            <!-- Single item -->
            <div class="carousel-item active" data-interval="3500">
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-white text-center">
                            <h5 class="mb-4" style="font-family: 'Expressway Rg', serif;  font-size: 17px;">January 2022 - December 2022</h5>
                            <hr />
                            <h1 class="mb-4 mt-4" style="font-family: 'Expressway Rg', serif;  font-size: 60px;">Wei-Ling Contemporary</h1>
                            <h4 class="mb-4 mt-4" style="font-family: 'Expressway Rg', serif;  font-size: 20px;">KUALA LUMPUR | MALAYSIA</h4>
                            <a class="btn btn-outline-light btn-lg m-2 mt-4" style="font-family: 'Roboto', sans-serif;  font-size: 17px;" href="/" role="button" rel="nofollow" target="_blank">Explore Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item" data-interval="3500">
                <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-white text-center">
                            <h5 class="mb-4" style="font-family: 'Expressway Rg', serif;  font-size: 17px;">10 - 29 October 2022</h5>
                            <hr />
                            <h1 class="mb-4 mt-4" style="font-family: 'Expressway Rg', serif;  font-size: 60px;">Twinkle Twinkle Little Star: Celebrating a journey of 39 years in Framing</h1>
                            <h4 class="mb-4 mt-4" style="font-family: 'Expressway Rg', serif;  font-size: 20px;">KUALA LUMPUR | MALAYSIA</h4>
                            <a class="btn btn-outline-light btn-lg m-2 mt-4" style="font-family: 'Roboto', sans-serif;  font-size: 17px;" href="/" role="button" rel="nofollow" target="_blank">Explore Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item" data-interval="3500">
                <div class="mask">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <div class="text-white text-center">
                            <h5 class="mb-4" style="font-family: 'Expressway Rg', serif;  font-size: 17px;">17 May - 23 October 2022</h5>
                            <hr />
                            <h1 class="mb-4 mt-4" style="font-family: 'Expressway Rg', serif;  font-size: 60px;">The ILHAM Art Show 2022</h1>
                            <h4 class="mb-4 mt-4" style="font-family: 'Expressway Rg', serif;  font-size: 20px;">KUALA LUMPUR | MALAYSIA</h4>
                            <a class="btn btn-outline-light btn-lg m-2 mt-4" style="font-family: 'Roboto', sans-serif;  font-size: 17px;" href="/" role="button" rel="nofollow" target="_blank">Explore Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inner -->

        <!-- Controls -->
        <a class="carousel-control-prev" href="#introCarousel" role="button" data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#introCarousel" role="button" data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Carousel wrapper -->
</main>
@endsection