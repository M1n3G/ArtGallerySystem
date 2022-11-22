@extends('master')
@section('content')
<style>
    /* Carousel styling */
    #introCarousel,
    .carousel-inner,
    .carousel-item,
    .carousel-item.active {
        height: 500px;
    }

    .carousel-item:nth-child(1) {
        background-image: url("../Img/Exhibitions/weilinggallery.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
    }

    .carousel-item:nth-child(2) {
        background-image: url("../Img/Exhibitions/pinkguygallery.jpeg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
    }

    .carousel-item:nth-child(3) {
        background-image: url("../Img/Exhibitions/ilhamartshow2022.jpg");
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
<!--Main area-->
<main id="main" class="main-site" style="margin-top: 25px;">
    <div class="container-fluid px-4 px-lg-5 my-5" data-aos="zoom-in">

        <div class="row">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb" style="font-family: 'Poppins', sans-serif;">
                    <li class="breadcrumb-item"><a href="/home" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Exhibitions</a></li>
                </ol>
            </nav>
        </div>

        <hr />
        <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel" style="margin-top: 20px; margin-bottom: 20px;">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-mdb-target="#introCarousel" data-mdb-slide-to="0" class="active"></li>
                <li data-mdb-target="#introCarousel" data-mdb-slide-to="1"></li>
                <li data-mdb-target="#introCarousel" data-mdb-slide-to="2"></li>
            </ol>

            <!-- Inner -->
            <div class="carousel-inner">
                <!-- Single item -->
                <div class="carousel-item active" data-interval="1500">
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <div class="text-white text-center">
                                <h5 class="mb-4" style="font-family: 'Expressway Rg', serif;  font-size: 17px;">January 2022 - December 2022</h5>
                                <hr />
                                <h1 class="mb-4 mt-4" style="font-family: 'Expressway Rg', serif;  font-size: 35px;">Wei-Ling Contemporary</h1>
                                <h4 class="mb-4 mt-4" style="font-family: 'Expressway Rg', serif;  font-size: 17px;">KUALA LUMPUR | MALAYSIA</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single item -->
                <div class="carousel-item" data-interval="1500">
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <div class="text-white text-center">
                                <h5 class="mb-4" style="font-family: 'Expressway Rg', serif;  font-size: 17px;">10 - 29 October 2022</h5>
                                <hr />
                                <h1 class="mb-4 mt-4" style="font-family: 'Expressway Rg', serif;  font-size: 35px;">Twinkle Twinkle Little Star: Celebrating a journey of 39 years in Framing</h1>
                                <h4 class="mb-4 mt-4" style="font-family: 'Expressway Rg', serif;  font-size: 17px;">KUALA LUMPUR | MALAYSIA</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single item -->
                <div class="carousel-item" data-interval="1500">
                    <div class="mask">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <div class="text-white text-center">
                                <h5 class="mb-4" style="font-family: 'Expressway Rg', serif;  font-size: 17px;">17 May - 23 October 2022</h5>
                                <hr />
                                <h1 class="mb-4 mt-4" style="font-family: 'Expressway Rg', serif;  font-size: 35px;">The ILHAM Art Show 2022</h1>
                                <h4 class="mb-4 mt-4" style="font-family: 'Expressway Rg', serif;  font-size: 17px;">KUALA LUMPUR | MALAYSIA</h4>
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

        <hr class="mt-4" />

        <!-- Exhibitions -->
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6 text-center">
                <img class="card-img-top mb-md-0 artImg" src="{{asset('Img/Exhibitions/ilhamartshow2022.jpg')}}" alt="" style="width:800px; height:500px; max-width:800px; max-height:500Px; margin-top:75px;" />
            </div>
            <div class="col-md-6 lh-lg">
                <h3 class="text-uppercase fw-light" style="color:#9d9d9d; font-family: 'Poppins'; font-size:17px;">28 - 29 January 2022</h3>
                <hr class="mt-4 mb-4" />
                <h2 style="font-family: 'Poppins'; margin-bottom:30px;">Marnie Weber Jim Shaw </h2>
                <p>Simon Lee Gallery and Zuecca Projects are pleased to present a joint exhibition of works by Jim Shaw and Marnie Weber at Squero Castello in Venice, Italy. The works of Shaw and Weber span a wide range of artistic media and visual imagery, from the detritus of American culture to the surreal worlds of fantasy and folklore, both drawing from the subconscious as their source of artistic creativity. In parallel with the theme of The Milk of Dreams, the 59th International Art Exhibition of La Biennale di Venezia, both Shaw and Weber transform the personal, the commonplac</p>
                <div class="text-center">
                    <a href="{{ route('exhibitions.show') }}" class="btn btn-outline-dark" style=" width:300px; height:50px; margin-top: 60px;" type="button">View Details<a>
                </div>
            </div>
        </div>

        <hr class="mt-4" />

    </div>
</main>
@endsection

@section('scripts')
<!-- Carousel Autoplay -->
<script>
    $('#carouselExampleIndicators').carousel({
        interval: 5500,
        cycle: true
    });
</script>
@endsection