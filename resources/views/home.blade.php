@extends('master')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/home.css') }}">
</head>

<!--- HOME CONTENT --->
<main id="main" class="main-site" data-aos="zoom-in">


    <!-- Message -->
    @if (\Session::has('success2'))
    <div class="container alert alert-success alert-dismissible fade show mt-4" role="alert">
        <div class="text-center">
            {{ \Session::get('success2') }}
            {{ \Session::forget('success2') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <section id="hero-animated" class="hero-animated d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
            <img src="{{ asset('Img/artillustration.svg') }}" class="img-fluid animated">
            <h2 class="mt-4">Welcome to <span>ArtCells</span></h2>
            <p class="mt-2">Everything you’ll ever need to collect art, you’ll find on ArtCells.</p>
            <div class="d-flex">
                <a href="/register" class="btn-get-started scrollto">Sign up an account</a>
                <a href="/store" class="btn-watch-video d-flex align-items-center"><i class="bi bi-search"></i><span>Discover Art</span></a>
            </div>
        </div>
    </section>

    <!-- ======= Logo Section ======= -->
    <section id="clients" class="clients bg-light">
        <div class="container" data-aos="zoom-out">
            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="{{ asset('Img/Logo/thestarlogo.png') }}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('Img/Logo/forbeslogo.png') }}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('Img/Logo/newstraitstimeslogo.png') }}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('Img/Logo/malaysiakinilogo.png') }}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('Img/Logo/kakisenilogo.png') }}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('Img/Logo/artexpomalaysialogo.png') }}" class="img-fluid" alt=""></div>
                </div>
            </div>
        </div>
    </section><!-- End Logo Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Our Artworks</h2>   
            </div>

            <div class="row gy-5">
                <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-item">
                        <div class="img">
                            <img src="{{ asset('Img/abstract.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-image"></i>
                            </div>
                            <a href="/store" class="stretched-link">
                                <h3>Abstract</h3>
                            </a>
                            <p class="mt-4 fs-6">Discover about Abstract art</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="service-item">
                        <div class="img">
                            <img src="{{ asset('Img/drawing.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-image"></i>
                            </div>
                            <a href="/store" class="stretched-link">
                                <h3>Drawing</h3>
                            </a>       
                            <p class="mt-4 fs-6">Discover about Drawing art</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="service-item">
                        <div class="img">
                            <img src="{{ asset('Img/illustration.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-image"></i>
                            </div>
                            <a href="/store" class="stretched-link">
                                <h3>Illustration</h3>
                            </a>
                            <p class="mt-4 fs-6">Discover about Illustration art</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="500">
                    <div class="service-item">
                        <div class="img">
                            <img src="{{ asset('Img/mixedmedia.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-image"></i>
                            </div>
                            <a href="/store" class="stretched-link">
                                <h3>Mixed Media</h3>
                            </a>
                            <p class="mt-4 fs-6">Discover about Mixed Media art</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="600">
                    <div class="service-item">
                        <div class="img">
                            <img src="{{ asset('Img/nature.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-image"></i>
                            </div>
                            <a href="/store" class="stretched-link">
                                <h3>Nature</h3>
                            </a>
                            <p class="mt-4 fs-6">Discover about Nature art</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="700">
                    <div class="service-item">
                        <div class="img">
                            <img src="{{ asset('Img/painting.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-image"></i>
                            </div>
                            <a href="/store" class="stretched-link">
                                <h3>Painting</h3>
                            </a>
                            <p class="mt-4 fs-6">Discover about Painting art</p>
                        </div>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>
    </section><!-- End Services Section -->

</main>
@endsection