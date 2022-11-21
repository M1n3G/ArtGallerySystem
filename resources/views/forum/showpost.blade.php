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
                <li class="breadcrumb-item"><a href="{{ route('category.post', ['category_id' => $posts->category_id]) }}" class="text-decoration-none">{{ $category->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $posts->title }}</li>
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
                </div>

                <div class="card card-shadow mt-4 mb-4">
                    <div class="card-header" style="font-family: 'Poppins', sans-serif; font-size:14px;">
                        {{ $posts->title}}
                    </div>
                    <div class="card-body">
                        <p class="fs-4 fw-semibold postbody" style="color:#910000;">{!! $posts->body !!}</p>
                        @if($posts->image != null)
                        <div style="margin-top:50px;">
                            <!-- <img src="{{ asset('/storage/Img/Post/'.$posts->image)}}" width="300" height="300"> -->
                            <img src="{{ $posts->image }}" width="300" height="300">
                        </div>
                        @endif
                    </div>
                    <div class="card-footer bg-white text-muted" style="font-family: 'Poppins', sans-serif; font-size:14px; color:#999">
                        Posted On: {{ $posts->datetime}}
                    </div>
                </div>

                <hr class="mt-4 mb-4" />


                <h5>Comments <span class="badge bg-secondary">
                        <span>

                        </span>
                </h5>

                <div class="card mt-4">
                    <div class="card-body">
                        <h6 class="card-title">Leave a comment</h6>
                        <form method="post" action="{{ route('comment.add', $posts->id) }}">
                            @csrf
                            <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                            <div class="float-end mt-2 pt-1">
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </div>
                            <input type="hidden" value="{{$posts->id}}" name="postID" />
                        </form>
                    </div>

                </div>




            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 style="font-family: 'Poppins', sans-serif;">Topic</h5>
                    </div>
                    <div class="card-body">
                        @php
                        $cate = App\Models\Forumcategories::where(['status'=>'Visible'])->get();
                        @endphp

                        @foreach($cate as $catitem)
                        <a class="dropdown-item text-decoration-underline mb-2 fw-semibold" style="color:#909090;" href="{{ route('category.post', $catitem->id) }}">{{ $catitem->name}}</a>
                        @endforeach
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">
                        <h5 style="font-family: 'Poppins', sans-serif;">Latest Posts</h5>
                    </div>
                    <div class="card-body">
                        @foreach($latest_posts as $item)
                        <a href="{{ route('post.view', ['category_id' => $item->category_id, 'title' => $item->title]) }}" class="text-decoration-underline">
                            <h6>{{ $item->title }}</h6>
                        </a>
                        <a href="{{ route('category.post', ['category_id' => $item->category_id]) }}" class="text-decoration-none">
                            <div class="mb-4" style="color:#9d9d9d; font-size:13px;">
                                {{ $category->name }}
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection