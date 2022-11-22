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
    @if (\Session::has('success'))
    <div class="container">
        <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
            <div class="text-left">
                {{ \Session::get('success') }}
                {{ \Session::forget('success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="categoryheading">
                    <p class="fs-3 fw-semibold">{{ $category->name}}</p>
                </div>

                <div class="card card-shadow mt-4 mb-4">
                    <div class="card-header" style="font-family: 'Poppins', sans-serif; font-size:14px;">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3" style="color:#6c757d">
                                    Posted by: {{ $posts->created_by}} <br />
                                </div>
                            </div>

                            <div class="col text-end">
                                <div class="" style="color:#6c757d">
                                    Posted On: {{ $posts->datetime}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="fs-4">
                                    {{ $posts->title}}
                                </div>
                            </div>

                            <div class="col text-end">
                                <div style="color:#6c757d">

                                    @foreach($com as $cc)
                                    @if ($cc->username == Session::get('username'))
                                    <a href="{{ route('post.edit',$posts->id) }}" class="btn btn-success px-2">
                                        <i class="bi bi-pencil-square"></i></a>
                                    @endif
                                    @break
                                    @endforeach


                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <p class="fs-4 fw-semibold postbody" style="color:#910000;">{!! $posts->body !!}</p>
                        @if($posts->image != null)
                        <div style="margin-top:50px;">
                            <!-- <img src="{{ asset('/storage/Img/Post/'.$posts->image)}}" width="300" height="300"> -->
                            <img src="{{ $posts->image }}" width="820" height="450">
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-outline-dark mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width:150px;">
                                View Image
                            </button>
                        </div>
                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-body">
                                    <img src="{{ $posts->image }}" style="max-width:1000px; max-height:750px;" />

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer bg-white text-muted" style="font-family: 'Poppins', sans-serif; font-size:14px; color:#999">
                        <div class="row">
                            <div class="col-md">

                            </div>
                            <div class="col-md fw-semibold text-end">
                                Viewed: {{$postcount}}
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mt-4 mb-4" />

                @if (\Session::has('message'))
                <div class="container">
                    <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
                        <div class="text-left">
                            {{ \Session::get('message') }}
                            {{ \Session::forget('message') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif

                <h5>Comments <span class="badge bg-secondary">
                        <span>
                            {{$commentcount}}
                        </span>
                </h5>

                <div class="card mt-4">
                    <div class="card-body">
                        <h6 class="card-title">Leave a comment</h6>
                        <form method="post" action="{{ route('forumcomment.store') }}">
                            @csrf
                            <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                            <div class="float-end mt-2 pt-1">
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </div>
                            <input type="hidden" value="{{$posts->id}}" name="postID" />
                            <input type="hidden" value="{{$posts->category_id}}" name="category_id" />
                        </form>
                    </div>

                </div>

                @if (!empty($showCom) && $showCom->count())
                @forelse($showCom as $comment)
                <div class="card card-body shadow-sm mt-3 mb-4">
                    <div class="d-flex flex-start align-items-center">

                        <div>
                            <h6 class="fw-bold mb-1" style="color:#910000">
                                {{$comment->username}}
                            </h6>
                            <p class="text-muted small mb-0">
                                Commented on: {{$comment -> datetime}}
                            </p>
                        </div>
                    </div>

                    <p class="mt-3 mb-4 pb-2">
                        {!! $comment -> comment_body !!}
                    </p>

                    <div class="row">
                        <div class="small d-flex justify-content-start">
                            <a href="#" class="d-flex align-items-center me-3 text-decoration-none">
                                <i class="bi bi-hand-thumbs-up" style="color:#910000"></i>&nbsp
                                <p class="mb-0" style="color:#910000">Like</p>
                            </a>
                            <a href="#" class="d-flex align-items-center me-3 text-decoration-none">
                                <i class="fa-regular fa-comment" style="color:#910000"></i>&nbsp
                                <p class="mb-0" style="color:#910000">Comment</p>
                            </a>
                            <a href="#" class="d-flex align-items-center me-3 text-decoration-none">
                                <i class="fa-solid fa-share" style="color:#910000"></i>&nbsp
                                <p class="mb-0" style="color:#910000">Share</p>
                            </a>
                        </div>

                        @foreach($com as $cc)
                        @if ($cc->username == Session::get('username'))
                        <div class="d-flex justify-content-end">
                            <form action="{{ route('forumcomment.remove',$comment->postID) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove your comment?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm me-2">Delete &nbsp<i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                        @endif
                        @break
                        @endforeach

                    </div>
                </div>

                @empty
                <hr class="mt-4">
                <p class="mt-4" style=" font-family: 'Poppins', serif;">No comment Yet.</p>
                @endforelse
                @endif


                <!-- PAGINATION -->
                <nav aria-label="pageNavigation">
                    <ul class="pagination justify-content-end">
                        {!! $showCom->appends(Request::all())->links() !!}
                    </ul>
                </nav>

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
                        <form action="{{ route('post.view') }}" method="POST">
                            @csrf
                            <button type="submit" class="text-decoration-none" style="border: none; background:white;">
                                <p class="fs-6 fw-semibold" style="color:#910000;">{{ $item->title}}</p>
                                <input type="hidden" name="category_id" value="{{$item->category_id}}">
                                <input type="hidden" name="title" value="{{$item->title}}">
                            </button>
                        </form>

                        <a href="{{ route('category.post', ['category_id' => $item->category_id]) }}" class="text-decoration-none">
                            <div class="mb-3" style="color:#9d9d9d; font-size:13px;">
                                &nbsp&nbsp{{ $category->name }}
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