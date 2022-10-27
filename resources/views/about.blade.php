@extends('master')
@section('content')
<!-- ======= About Section ======= -->

<body>
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-5 text-center pt-2">
                    <div class="row about-img">
                        <img src="{{ asset('Img/hyungkooleeart.png') }}" class="center-block img-fluid" alt="image">
                    </div>
                </div>

                <div class="col-lg-7">
                    <h3 class="pt-2" style="font-family: 'Poppins', serif;">About ArtCells</h3>

                    <!-- Tabs -->
                    <ul class="nav nav-pills mb-3">
                        <li><a class="nav-link active" data-bs-toggle="pill" href="#tab1">About</a></li>
                        <li><a class="nav-link" data-bs-toggle="pill" href="#tab2">Contact</a></li>
                    </ul><!-- End Tabs -->

                    <!-- Tab Content -->
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="tab1">

                            <p class="fst-italic">We’ve made it easy for new and experienced collectors to discover, buy, and sell art—and so much more. Everything you’ll ever need to collect art, you’ll find on ArtCells.</p>

                            <div class="d-flex align-items-center mt-4">
                                <i class="bi bi-check2"></i>
                                <h4 style="font-family: 'Poppins', serif; font-size: 18px;"> Primary Resource for Contemporary Art & Design</h4>
                            </div>
                            <p class="lh-lg" style="font-family: 'Poppins', serif; font-size: 16px;">ArtCells is an online gallery focused on highlighting the best of contemporary art and design in Malaysia. Lists thousands of artists from around Malaysia, with new artworks and design items added to the site daily. </p>

                        </div><!-- End Tab 1 Content -->

                        <div class="tab-pane fade show" id="tab2">

                            <div class="d-flex align-items-center mt-4">
                                <p class="lh-lg" style="font-family: 'Poppins', serif; font-size: 17px;">
                                    <i class="fa fa-phone" aria-hidden="true"></i> 03-2553187 <br />
                                    <i class="fa fa-envelope" aria-hidden="true"></i> artcells@gmail.com<br />
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> Level 32 Block B Mercu 3, Jalan Bangsar, KL Eco City,<br> 59200 Kuala Lumpur, Federal Territory of Kuala Lumpur
                                </p>
                            </div>

                            <div class="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6700.1266114413775!2d101.67281660904935!3d3.116098734291364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc49d084587a37%3A0x8203bc7e6e208df2!2sMercu%203%20Corporate%20Tower%2C%20KL%20Eco%20City!5e0!3m2!1sen!2smy!4v1666709766500!5m2!1sen!2smy" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" frameborder="0"></iframe>
                            </div><!-- End Google Maps -->

                        </div><!-- End Tab 2 Content -->

                    </div>

                </div>

            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Logo Section ======= -->
    <section id="clients" class="clients">
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
</body>
@endsection