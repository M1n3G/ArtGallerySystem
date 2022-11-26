@extends('master')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/error.css') }}">

    <script>

    </script>

    <!--- HOME CONTENT --->
    <main id="main" class="main-site" data-aos="zoom-in">

        <section class="page_404">
            <div class="container">
                <div class="row text-center">
                    <div class="col-sm-12 text-center">
                        <div class="col-sm-10 col-sm-offset-1  text-center">
                            <div class="four_zero_four_bg text-center">
                                <h1 class="text-center ">404</h1>

                            </div>

                            <div class="contant_box_404">
                                <h3 class="h2 mt-2">
                                    Look like you're lost
                                </h3>

                                <p>The page you are looking for not available !</p>

                                <a href="{{ url('/') }}" class="btn link_404"
                                style="background-color: #910000;">Go to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    @endsection