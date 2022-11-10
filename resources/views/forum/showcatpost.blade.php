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

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
        }
    </style>
</head>

<!-- Breadcumb link -->
<div class="container px-4 mt-2">
    <div class="row mt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-family: 'Poppins', sans-serif;">
                <li class="breadcrumb-item"><a href="/forum" class="text-decoration-none">Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->name}}</li>
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
                    <span class="fw-normal" style="color:#8c8c8c; font-size:13px;">{{ $category->description}}</span>
                </div>

                @if (!empty($post) && $post->count())
                @forelse ($post as $posts)
                <div class="card card-shadow mt-4 mb-4">
                    <div class="card-header" style="font-family: 'Poppins', sans-serif; font-size:14px;">
                        Posted By: {{ Session::get('username') }}
                    </div>
                    <div class="card-body">
                        <a href="{{ route('category.post', $posts->id) }}" class="text-decoration-none">
                            <p class="fs-4 fw-semibold" style="color:#910000;">{{ $posts->title}}</p>
                        </a>

                    </div>
                    <div class="card-footer bg-white text-muted" style="font-family: 'Poppins', sans-serif; font-size:14px; color:#999">
                        Posted On: {{ $posts->datetime}}
                    </div>
                </div>

                @empty
                <div class="card card-shadow mt-4">
                    <div class="card-body">
                        <h4 style="font-family: 'Poppins', sans-serif; font-size:17px;">No Post Available</h4>
                    </div>
                </div>
                @endforelse
                @endif
                <hr class="mt-4 mb-4" />
                <!-- PAGINATION -->
                <nav aria-label="pageNavigation">
                    <div class="row">
                        <ul class="justify-content-left">Showing {{ $post->firstItem() }} to {{ $post->lastItem() }} of total {{$post->total()}} posts</ul>
                        <ul class="pagination justify-content-end">
                            {!! $post->appends(Request::all())->links() !!}
                        </ul>
                    </div>
                </nav>
            </div>

            <!-- <div class="col-md-3">
                <div class="border p-2">
                    <h4>More Posts</h4>
                </div>
            </div> -->


        </div>
    </div>
</div>
</div>

@endsection