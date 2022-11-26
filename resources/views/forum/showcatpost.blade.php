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
            <div class="col-md-8">
                <div class="categoryheading">
                    <p class="fs-3 fw-semibold">{{ $category->name}}</p>
                    <span class="fw-normal" style="color:#8c8c8c; font-size:13px;">{!! $category->description !!}</span>
                </div>

                @if (!empty($post) && $post->count())
                @forelse ($post as $posts)
                <div class="card card-shadow mt-4 mb-4">
                    <div class="card-header" style="font-family: 'Poppins', sans-serif; font-size:14px;">
                        Posted By: {{ Session::get('username') }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('post.view') }}" method="POST">
                            @csrf
                            <a href="">
                                <button type="submit" class="text-decoration-none" style="border: none; background:white;">
                                    <p class="fs-4 fw-semibold" style="float:left; color:#910000;">{{ $posts->title}}</p>
                                    <input type="hidden" name="postID" value="{{$posts->id}}">
                                    <input type="hidden" name="category_id" value="{{$posts->category_id}}">
                                    <input type="hidden" name="title" value="{{$posts->title}}">
                                </button>
                            </a>


                    </div>
                    <div class="card-footer bg-white text-muted" style="font-family: 'Poppins', sans-serif; font-size:14px; color:#999">
                        <div class="row">
                            <div class="col">
                                Posted On: {{ date('l, d-m-Y',strtotime($posts['datetime'])) }}
                            </div>
                            <div class="col text-end">
                                <a href="">
                                    <button type="submit" class="btn text-decoration-none" style="color:white; background-color: #910000;">View
                                        <input type="hidden" name="postID" value="{{$posts->id}}">
                                        <input type="hidden" name="category_id" value="{{$posts->category_id}}">
                                        <input type="hidden" name="title" value="{{$posts->title}}">
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    </form>
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

            <div class="col-md-4">
                <!-- <div class="card mb-4">
                    <div class="input-group">
                        <input type="search" id="search" name="search" class="form-control" placeholder="Search ...">
                        <span class="input-group-text">
                            <i class="fas fa-search text-grey" aria-hidden="true"></i>
                        </span>
                    </div>
                </div> -->
                <div class="card">
                    <div class="card-header">
                        <h5 style="font-family: 'Poppins', sans-serif;">Topic</h5>
                    </div>
                    <div class="card-body">
                        @php
                        $cate = App\Models\Forumcategories::where(['status'=>'Visible'])->get();
                        @endphp

                        @forelse($cate as $catitem)
                        <a class="dropdown-item text-decoration-underline mb-2 fw-semibold" style="color:#909090;" href="{{ route('category.post', $catitem->id) }}">{{ $catitem->name}}</a>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection