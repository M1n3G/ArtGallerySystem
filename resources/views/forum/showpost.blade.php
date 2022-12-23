@extends('master')
@extends('forum/navbarInc')
@section('content')
<!-- Custom CSS -->

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/forumhome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/radio.css') }}">
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

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show form-control" role="alert">
    <div class="text-left">
        {{ Session::get('success') }}
        {{ Session::forget('success') }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif



@if ($message != null)
<div class="container">
    <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
        <div class="text-left">
            {{ $message }}
            <a href="{{route('forumprofile.show')}}">&nbspView</a>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@if ($messagelike != null)
<div class="container">
    <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
        <div class="text-left">
            {{ $messagelike }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@if ($messagedislike != null)
<div class="container">
    <div class="alert alert-danger alert-dismissible fade show form-control" role="alert">
        <div class="text-left">
            {{ $messagedislike }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@if ($messagecomment != null)
<div class="container">
    <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
        <div class="text-left">
            {{ $messagecomment }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

@if ($messagedanger != null)
<div class="container">
    <div class="alert alert-danger alert-dismissible fade show form-control" role="alert">
        <div class="text-left">
            {{ $messagedanger }}
            <a href="{{route('forumprofile.show')}}">&nbspView</a>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<div class="container py-4">
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
                            <div style="color:#6c757d">
                                Posted On: {{ date('l, d-m-Y h:i:s a',strtotime($posts['datetime'])) }}
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

                                @if ($posts->created_by == Session::get('username'))
                                <a href="{{ route('post.edit',$posts->id) }}" class="btn btn-success px-2">
                                    <i class="bi bi-pencil-square"></i></a>

                                <form action="{{ route('post.delete',$posts->id) }}" method="POST" onsubmit="return confirm('Are you sure you wish to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mt-2 px-2" style="height:35px; max-height:35px;"><i class="bi bi-trash"></i></button>
                                </form>
                                @endif

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
                            <div class="small d-flex justify-content-start">

                                <form id="myform1" action="{{ route('like.post') }}" method="post">
                                    @csrf
                                    <a class="d-flex align-items-center me-3 text-decoration-none" onclick="document.getElementById('myform1').submit()">
                                        <i class="bi bi-hand-thumbs-up" style="color:#910000"></i>&nbsp
                                        <p class="mb-0" style="color:#910000">Like({{$likecount}})
                                            <input type="hidden" value="{{$posts->id}}" name="postID" />
                                            <input type="hidden" value="{{$posts->category_id}}" name="category_id" />
                                            <input type="hidden" value="{{$posts->title}}" name="title" />
                                        </p>
                                    </a>
                                </form>

                                <form id="myform2" action="{{ route('dislike.post') }}" method="post">
                                    @csrf
                                    <a class="d-flex align-items-center me-3 text-decoration-none" onclick="document.getElementById('myform2').submit()">
                                        <i class="bi bi-hand-thumbs-down" style="color:#910000"></i>&nbsp
                                        <p class="mb-0" style="color:#910000">Dislike({{$dislikecount}})
                                            <input type="hidden" value="{{$posts->id}}" name="postID" />
                                            <input type="hidden" value="{{$posts->category_id}}" name="category_id" />
                                            <input type="hidden" value="{{$posts->title}}" name="title" />
                                        </p>
                                    </a>
                                </form>

                                <a class="d-flex align-items-center me-3 text-decoration-none">
                                    <i class="fa-regular fa-comment" style="color:#910000"></i>&nbsp
                                    <p class="mb-0" style="color:#910000">{{$commentcount}} Comments</p>
                                </a>

                                <form id="myform" action="{{ route('bookmarks.store') }}" method="post">
                                    <a class="d-flex align-items-center me-3 text-decoration-none" onclick="document.getElementById('myform').submit()">
                                        @csrf
                                        <i class="bi bi-bookmarks" style="color:#910000"></i>&nbsp
                                        <p class="mb-0" style="color:#910000"> Save
                                            <input type="hidden" value="{{$posts->id}}" name="postID" />
                                            <input type="hidden" value="{{$posts->category_id}}" name="category_id" />
                                            <input type="hidden" value="{{$posts->title}}" name="title" />
                                        </p>
                                    </a>
                                </form>



                                <a class="d-flex align-items-center me-3 text-decoration-none" data-bs-toggle="modal" data-bs-target="#reportModal">
                                    <i class="bi bi-flag" style="color:#910000"></i>&nbsp
                                    <p class="mb-0" style="color:#910000">Report</p>
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="reportModalLabel">Submit a Report</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="container" id="myGroup">
                                                <nav>
                                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                        <button class="nav-link active" id="nav-report-tab" data-bs-toggle="tab" data-bs-target="#nav-report" type="button" role="tab" aria-controls="nav-report" aria-selected="true">Report</button>
                                                        <button class="nav-link" id="nav-reportdetails-tab" data-bs-toggle="tab" data-bs-target="#nav-reportdetails" type="button" role="tab" aria-controls="nav-reportdetails" aria-selected="false">Report Details</button>
                                                    </div>
                                                </nav>
                                            </div>

                                            <form action="{{ route('report.store') }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <!-- Report -->
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-report" role="tabpanel" aria-labelledby="nav-report-tab" tabindex="0">
                                                            <p class="fs-6 ">Thanks for looking out for yourself by reporting posts that break the rules. Let us know what's happening, and we'll look into it.</p>
                                                            <div class="row mt-2 text-center">
                                                                <div class="col mb-4">
                                                                    <input class="checkbox-report" type="radio" name="report" id="Break_Rules" value="Break_Rules" required>
                                                                    <label class="for-checkbox-report" for="Break_Rules">
                                                                        <span>Rules Violation</span>
                                                                    </label>
                                                                </div>
                                                                <div class="col mb-4">
                                                                    <input class="checkbox-report" type="radio" name="report" id="Spam" value="Spam">
                                                                    <label class="for-checkbox-report" for="Spam">
                                                                        <span>Spam</span>
                                                                    </label>
                                                                </div>
                                                                <div class="col mb-4">
                                                                    <input class="checkbox-report" type="radio" name="report" id="Harassment" value="Harassment">
                                                                    <label class="for-checkbox-report" for="Harassment">
                                                                        <span>Harassment</span>
                                                                    </label>
                                                                </div>

                                                                <div class="col mb-4">
                                                                    <input class="checkbox-report" type="radio" name="report" id="Impersonation" value="Impersonation">
                                                                    <label class="for-checkbox-report" for="Impersonation">
                                                                        <span>Impersonation</span>
                                                                    </label>
                                                                </div>
                                                                <div class="col mb-4">
                                                                    <input class="checkbox-report" type="radio" name="report" id="Sharing_Personal_Information" value="Sharing_Personal_Information">
                                                                    <label class="for-checkbox-report" for="Sharing_Personal_Information">
                                                                        <span>Sharing Personal Information</span>
                                                                    </label>
                                                                </div>
                                                                <div class="col mb-4">
                                                                    <input class="checkbox-report" type="radio" name="report" id="Misinformation" value="Misinformation">
                                                                    <label class="for-checkbox-report" for="Misinformation">
                                                                        <span>Misinformation</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <p class="fs-6 mt-2">Provide more report info (Optional)</p>
                                                            <textarea name="reportBody" rows="2" cols="30" class="form-control mt-2" placeholder="Info section (Optional)" maxlength="200"></textarea>
                                                        </div>


                                                        <!-- Report Details-->
                                                        <div class="tab-pane fade" id="nav-reportdetails" role="tabpanel" aria-labelledby="nav-reportdetails-tab" tabindex="0">
                                                            <ul class="list-group text-left">
                                                                <li class="list-group-item">
                                                                    <div class="fs-6 mb-2">Break Rules</div>
                                                                    Posts, comments, or behavior that breaks the community rules.
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="fs-6 mb-2">Spam</div>
                                                                    Repeated, unwanted, or unsolicited manual or automated actions that negatively affect users, communities, and the ArtCells platform.
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="fs-6 mb-2">Harassment</div>
                                                                    Harassing, bullying, intimidating, or abusing an individual or group of people with the result of discouraging them from participating.
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="fs-6 mb-2">Impersonation</div>
                                                                    Impersonating an individual or entity in a misleading or deceptive way. This includes deepfakes, manipulated content, or false attributions.
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="fs-6 mb-2">Sharing Personal Information</div>
                                                                    Sharing or threatening to share private, personal, or confidential information about someone.
                                                                </li>
                                                                <li class="list-group-item">
                                                                    <div class="fs-6 mb-2">Misinformation</div>
                                                                    Spreading false information such as content that undermines civic processes or provides dangerous health misinformation.
                                                                </li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="modal-footer">
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                        <button type="button" style="width: 125px" class="btn btn-outline-dark rounded-pill" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" style="width: 125px" class="btn btn-primary rounded-pill">Submit</button>
                                                        <input type="hidden" name="postID" value="{{$posts->id}}">
                                                        <input type="hidden" name="category_id" value="{{$posts->category_id}}">
                                                        <input type="hidden" name="title" value="{{$posts->title}}">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md fw-semibold text-end">
                        Viewed: {{$postcount}}
                    </div>
                </div>
            </div>

            <hr class="mt-4 mb-4" />

            <!-- Comments -->
            @if (Session::has('message'))
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
                    <div class="text-left">
                        {{ Session::get('message') }}
                        {{ Session::forget('message') }}
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
                        <textarea name="comment_body" class="form-control" rows="3" placeholder="Comment Section" required></textarea>
                        <div class="float-end mt-2 pt-1">
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
                        <input type="hidden" value="{{$posts->id}}" name="postID" />
                        <input type="hidden" value="{{$posts->category_id}}" name="category_id" />
                        <input type="hidden" value="{{$posts->title}}" name="title" />
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
                            Commented on: {{ date('l, d-m-Y h:i:s a',strtotime($comment['datetime'])) }}
                        </p>
                    </div>
                </div>

                <p class="mt-3 mb-4 pb-2">
                    {!! $comment -> comment_body !!}
                </p>

                <div class="row">
                    <div class="small d-flex justify-content-start">
                        <form id="myform3" action="{{ route('forumlike.post') }}" method="post">
                            @csrf
                            <a class="d-flex align-items-center me-3 text-decoration-none" onclick="document.getElementById('myform3').submit()">
                                <i class="bi bi-hand-thumbs-up" style="color:#910000"></i>&nbsp
                                <p class="mb-0" style="color:#910000">Like
                                    <input type="hidden" value="{{$comment->id}}" name="id" />
                                    <input type="hidden" value="{{$posts->id}}" name="postID" />
                                    <input type="hidden" value="{{$posts->category_id}}" name="category_id" />
                                    <input type="hidden" value="{{$posts->title}}" name="title" />
                                </p>
                            </a>
                        </form>

                        <form id="myform4" action="{{ route('forumdislike.post') }}" method="post">
                            @csrf
                            <a class="d-flex align-items-center me-3 text-decoration-none" onclick="document.getElementById('myform4').submit()">
                                <i class="bi bi-hand-thumbs-down" style="color:#910000"></i>&nbsp
                                <p class="mb-0" style="color:#910000">Dislike
                                    <input type="hidden" value="{{$comment->id}}" name="id" />
                                    <input type="hidden" value="{{$posts->id}}" name="postID" />
                                    <input type="hidden" value="{{$posts->category_id}}" name="category_id" />
                                    <input type="hidden" value="{{$posts->title}}" name="title" />
                                </p>
                            </a>
                        </form>

                        <!-- <a href="#" class="d-flex align-items-center me-3 text-decoration-none">
                            <i class="fa-regular fa-comment" style="color:#910000"></i>&nbsp
                            <p class="mb-0" style="color:#910000">Comment</p>
                        </a> -->

                    </div>


                    @if ( Session::get('username') == $comment->username)
                    <div class="d-flex justify-content-end">

                        <form action="{{ route('forumcomment.remove',$comment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove your comment?');">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" value="{{$posts->id}}" name="postID" />
                            <input type="hidden" value="{{$posts->category_id}}" name="category_id" />
                            <input type="hidden" value="{{$posts->title}}" name="title" />
                            <button class="btn btn-danger btn-sm me-2">Delete &nbsp<i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                    @endif

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
                            <p class="fw-semibold" style="font-size: 19px; float:left; color:#910000;">{{ $item->title}}</p><br />
                            <p style="font-size: 14px; float:left; color:#6c757d">{{ date('l, d-m-Y',strtotime($item['datetime'])) }}</p>
                            <input type="hidden" name="category_id" value="{{$item->category_id}}">
                            <input type="hidden" name="title" value="{{$item->title}}">
                        </button>
                    </form>

                    @endforeach
                </div>
            </div>
        </div>


    </div>
</div>



<!-- Breadcumb link -->
<div class="container px-4 mb-2">
    <div class="row">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-family: 'Poppins', sans-serif;">
                <li class="breadcrumb-item"><a href="/forum" class="text-decoration-none">Forum</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category.post', ['category_id' => $posts->category_id]) }}" class="text-decoration-none">{{ $category->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $posts->title }}</li>
            </ol>
        </nav>
    </div>
</div>

@endsection