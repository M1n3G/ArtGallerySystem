@extends('master')
@section('content')

<head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abhaya+Libre:400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css'>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/exhibitions.css') }}">

    <style>
        .navbar .nav-link {
            color: #fff !important;
        }

        .navbar {
            padding: 0;
            position: absolute;
            background-color: white;
        }

        .navbar ul {
            display: flex;
            position: absolute;
            margin-left: 590px;
        }

        ul .navli {
            position: relative;
            justify-content: center;
            height: 10%;
            margin: 0px;
            padding: 0px;
            white-space: nowrap;
        }

        ul .menuli {
            position: relative;
            justify-content: center;
            height: 10%;
            margin: 0px;
            padding: 0px;
            white-space: nowrap;
        }
    </style>

</head>
<main class="main-site" data-aos="zoom-in">

    <div class="showartcontainer" id="up">
        <div class="title">
            <h2>Presented by ArtCells</h2>
            <h5 class="mt-2" style="font-family: Abhaya Libre; color:grey">View Exhibitions below</h5>
        </div>
        <div class="gallerycontainer">
            <ul id="gallery">

                @foreach($art as $arts)
                <li id="galleryli">
                    <div class="item">
                        <div class="img">
                            <img src="{{ $arts->artImg }}" />
                            <h2>{{ $arts->artName }}</h2>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="showcontainer bg-light" style="width: 100%; padding: 3rem;" id="down">
        <div class="extitle text-center">
            <h2>Exhibitions</h2>
        </div>
        <div class="row mx-auto my-5">
            <div class="col-lg-6">
                <div class="card">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="{{asset('Img/Exhibitions/gallery1.jpg') }}" class="img-fluid" style="width:900px; max-width:900px; height:500px; max-height:500px" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body" style="height:250px; max-height:250px">
                        <span class="exhibitiondate mt-2 mb-4">MALAYSIA 12 OCTOBER - 31 DECEMEBER 2022</span>
                        <h3 class="mt-3 card-title fw-semibold">Ming Lee: 3D Gallery</h3>
                        <p class="card-text mt-4" style="color:#444">
                            Ming Lee Gallery is delighted to announce a solo exhibition of new paintings by Lee Lik Ming (2022, Malaysia). On view from 12 October - 31 November 2022, It will be held online using virtual tour method.
                        </p>
                    </div>
                    <div class="card-footer bg-white" style="height:60px">
                        <div class="text-center">
                            <a href="http://192.168.0.43:9966/" target="_blank" class="btn btn btn-outline-dark rounded-pill" style="width:200px; font-size: 17px">View 3D Tour</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="{{asset('Img/Exhibitions/gallery2.jpg') }}" class="img-fluid" style="height:300px; max-height:300px" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body" style="height:450px; max-height:450px">
                        <span class="exhibitiondate mt-2 mb-4">MALAYSIA 03 DECEMBER - 17 DECEMEBER 2022</span>
                        <h3 class="mt-3 card-title fw-semibold">Eric Quah: Love: 2020 – 2022</h3>
                        <p class="card-text mt-4" style="color:#444">
                            G13 Gallery is delighted to present the solo exhibition LOVE: 2020 – 2022 by our local artist, Eric Quah. Eric’s oil paintings artworks impress and invoke joy in viewers with his free and expressive brushstrokes along with the vivid bright hue colour. His artwork also touches the viewer with the selection of his subject matter that conjured up his life journey of sojourning over three decades between Melbourne and his hometown Malaysia.
                        </p>
                    </div>
                    <div class="card-footer bg-white" style="height:60px">
                        <div class="text-center">
                            <a class="btn btn btn-outline-dark rounded-pill" style="width:200px; font-size: 17px; background-color:#910000; color:white;">COMING SOON</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="{{asset('Img/Exhibitions/gallery3.jpg') }}" class="img-fluid" style="height:300px; max-height:300px" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body" style="height:450px; max-height:450px">
                        <span class="exhibitiondate mt-2 mb-4">MALAYSIA 29 NOVEMBER 2022 - 14 MAY 2023</span>
                        <h3 class="mt-3 card-title fw-semibold">Dream Of The Day</h3>
                        <p class="card-text mt-4" style="color:#444">
                            The exhibition title, Dream of the Day, draws from the 1965 manifesto of the Philippine-born artist David Medalla, well regarded for his long-lasting influence in the British and global contemporary art scene since the sixties. His work, as well as those of 38 other artists from the Philippines, Indonesia, Thailand, Sri Lanka, Singapore, Vietnam, Myanmar, Egypt, and Malaysia are included in this exhibition which explores a range of media, genres, and sensibilities— from surrealism, slow cinema and trans-performance, to queer photography and feminist painting.
                        </p>
                    </div>

                    <div class="card-footer bg-white" style="height:60px">
                        <div class="text-center">
                            <a class="btn btn btn-outline-dark rounded-pill" style="width:200px; font-size: 17px; background-color:#910000; color:white;">COMING SOON</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- JQuery -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js'></script>
    <script src="{{asset('Js/exhibition.js')}}"></script>

</main>

@endsection