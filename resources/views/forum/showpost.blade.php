@extends('master')
@extends('forum/navbarInc')
@section('content')
<!-- Custom CSS -->

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/forumhome.css') }}">
    <style>
        .card {
            border-radius: 4px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
            transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
            cursor: pointer;
        }

       
    </style>
</head>

<!-- Breadcumb link -->
<div class="container px-4 mt-2">
    <div class="row mt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-family: 'Poppins', sans-serif;">
                <li class="breadcrumb-item"><a href="/forum" class="text-decoration-none">Forum</a></li>
                <li class="breadcrumb-item"><a href="/category/{id}" class="text-decoration-none">{{ $category->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->title }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="py-4">
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="categoryheading">
                    <p class="fs-3 fw-semibold">{{ $category->name}}</p>
                </div>


                <div class="card card-shadow mt-4 mb-4">
                    <div class="card-header" style="font-family: 'Poppins', sans-serif; font-size:14px;">
                        {{ $posts->title}}
                    </div>
                    <div class="card-body">
                        <p class="fs-4 fw-semibold" style="color:#910000;">{{ $posts->body}}</p>
                    </div>
                    <div class="card-footer bg-white text-muted" style="font-family: 'Poppins', sans-serif; font-size:14px; color:#999">
                        Posted On: {{ $posts->datetime}}
                    </div>
                </div>

                <hr class="mt-4 mb-4" />

            </div>
        </div>
    </div>
</div>
</div>

@endsection