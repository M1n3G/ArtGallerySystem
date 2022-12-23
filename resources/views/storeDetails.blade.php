@extends('master')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/storedetails.css') }}">
    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            left: -9999px;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }
    </style>
</head>

<!--Main area-->
<main id="main" class="main-site" style="margin-bottom: 35px;">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb" style="font-family: 'Poppins', sans-serif;">
                    <li class="breadcrumb-item"><a href="/home" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active"><a href="/store" class="text-decoration-none">Store</a></li>
                    <li class="text-uppercase breadcrumb-item active" aria-current="page">{{$data -> artName}}</a></li>
                </ol>
            </nav>

            @if (Session::has('warning'))
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show form-control" role="alert">
                    <div class="text-left">
                        {{ Session::get('warning') }}
                        {{ Session::forget('warning') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            @if (Session::has('warning2'))
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show form-control" role="alert">
                    <div class="text-left">
                        {{ Session::get('warning2') }}
                        {{ Session::forget('warning2') }}
                        <a href="{{route('wishlist.show')}}">&nbsp Wishlist</a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

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

            @if (Session::has('message1'))
            <div class="container">
                <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
                    <div class="text-left">
                        {{ Session::get('message1') }}
                        {{ Session::forget('message1') }}
                        <a href="{{route('cart.list')}}">&nbspCart</a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            @if (Session::has('message2'))
            <div class="container">
                <div class="alert alert-danger alert-dismissible fade show form-control" role="alert">
                    <div class="text-left">
                        {{ Session::get('message2') }}
                        {{ Session::forget('message2') }}
                        <a href="{{route('cart.list')}}">&nbspCart</a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            @if (Session::has('message3'))
            <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
                <div class="text-left">
                    {{ Session::get('message3') }}
                    {{ Session::forget('message3') }}
                    <a href="{{route('wishlist.show')}}">&nbsp Wishlist</a>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

        </div>

        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6 border text-center" style="height:700px; max-height:700px;">
                <img class="card-img-top mb-md-0 artImg" src="{{asset($data['artImg'])}}" alt="{{$data -> artName}}" style="width:535px; height:525px; max-width:535px; max-height:525px; margin-top:75px;" />
                <button type="button" class="btn btn-outline-dark mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width:150px;">
                    View Image
                </button>
            </div>
            <div class="col-md-6 lh-lg">
                <div class="row">
                    <div class="col-md-10">
                        <h1 class="text-uppercase fw-bold" style="font-size:45px;">{{$data -> artName}}</h1>
                    </div>
                    <div class="col-md-2">
                        <!-- Wishlist -->
                        <form action="{{ route('wishlist.add', $data->artID) }}" method="POST">
                            @csrf
                            <button class="rounded-circle btn btn-dark mt-2" style="background-color:white; float:right;" type="submit">
                                <i class="fa fa-heart" style="color:#910000" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="text-uppercase" style="color:#9d9d9d; font-size:18px;">BY {{$data -> artistName}}</p>
                    </div>

                    <div class="col text-end">
                        <div class="fw-semibold" style="color:#910000">Viewed: {{$artcount}}</div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p class="fw-bold" style="color:#910000; font-size:28px;">MYR {{$data -> artPrice}}</p>
                    </div>
                    @if ($data -> artStatus == 'SOLD')
                    <div class="col-md-6">
                        <button class="btn btn-dark mt-2" style="width:150px; float:right;" disabled="disabled" type="button">
                            SOLD
                        </button>
                    </div>
                    @else
                    <div class="col-md-6">
                        <form action="{{ route('cart.add') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $data->artID }}" name="id">
                            <input type="hidden" value="{{ $data->artName }}" name="name">
                            <input type="hidden" value="{{ $data->artPrice }}" name="price">
                            <input type="hidden" value="{{ $data->artImg }}" name="image">
                            <input type="hidden" value="1" name="quantity">
                            <button class="btn btn-outline-dark mt-2" style="width:150px; float:right;" type="submit">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart
                            </button>
                        </form>
                    </div>
                    @endif
                </div>

                <div id="accordion" class="lh-base" role="tablist" aria-multiselectable="true">
                    <div class="card mt-4" style="border-radius:5px;">
                        <h5 class="card-header" style="height:40px;" role="tab" id="headingOne">
                            <a data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapseOne" class="d-block" style="font-family: 'Poppins', serif; text-decoration:none; font-size:17px; color:#910000;">
                                <i class="fa fa-chevron-down pull-right"></i> Overview
                            </a>
                        </h5>
                        <!-- CATEGORY NAME PURPOSE -->
                        @foreach($cat as $category)
                        @endforeach
                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                            <div class="card-body">
                                <p class="fw-bolder">Year:<br /></p>{{$data -> artYear}}</p>
                                <p class="fw-bolder">Description:<br /></p>{{$data -> artDesc}}</p>
                                <p class="fw-bolder">Dimension:<br /></p>
                                {{$data -> artWidth}} cm (Width) x {{$data -> artHeight}} cm (Height)</p>
                                <p class="fw-bolder">Medium:<br /></p>{{$category -> name}}</p>
                                <p class="fw-bolder">Style:<br /></p>{{$data -> artStyle}}</p>
                                <span style="color:#9d9d9d; font-size:12px;">Note: Actual colours may vary due to photography & computer settings.</span>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div style="margin-left: 700px;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            <div class="modal-body ">
                <img src="{{asset($data['artImg'])}}" alt="{{$data -> artName}}" style="width:750px; height:750px; max-width:750px; max-height:750px;" />
            </div>

        </div>
    </div>

    <!-- DESCRIPTIONS -->
    <div class="container">
        <hr />
        <div class="row lh-base">
            <div class="col-lg-4">
                <p class="mt-2 mb-0 text-center">
                    <i class="fa fa-picture-o" style="font-size: 30px; color: #910000;" aria-hidden="true"></i>
                    <br>
                    Curated<br>
                    Art & Design
                </p>
                <p class="mt-3 text-center" style="font-family: EB Garamond,serif; font-size: 15px;">We feature a curated selection of the best pieces from both emerging and established artists and designers in Malaysia.</p>
            </div>

            <div class="col-lg-4">
                <p class="mt-2 mb-0 text-center">
                    <i class="fa fa-certificate" style="font-size: 30px; color: #910000;" aria-hidden="true"></i>
                    <br>
                    Authenticity<br>
                    Guaranteed
                </p>
                <p class="mt-3 text-center" style="font-family: EB Garamond,serif; font-size: 15px;">Artworks come with Certificates of Authenticity from the Artist or Gallery.</p>
            </div>

            <div class="col-lg-4">
                <p class="mt-2 mb-0 text-center">
                    <i class="fa fa-truck" style="font-size: 30px; color: #910000;" aria-hidden="true"></i>
                    <br>
                    Concierge<br>
                    Service<br>
                </p>
                <p class="mt-3 text-center" style="font-family: EB Garamond,serif; font-size: 15px;">Ships securely to your door</p>
            </div>
            <hr />
        </div>
    </div>

    <!-- Related items section-->
    <div class="container px-4 px-lg-5 mt-4">
        <h3 class="text-uppercase text-center fw-bolder mt-4 mb-4">More works by {{$data -> artistName}}</h3>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach($artistWork as $art)
            <div class="col mb-5">
                <div class="card mx-auto" style="width:280px; max-width:280px;">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{asset($art['artImg'])}}" style="width:280px; max-width:280px; height:300px; max-height:300px;" alt="{{$art -> artName}}" />
                    <!-- Product details-->
                    <div class="card-body p-4" style="height:150px; max-height:150px;">
                        <div class="text-center">
                            <h5 class="fw-bolder">{{$art -> artName}}</h5>
                            <div class="text-center mt-4 fw-bolder" style="color:#910000; font-size:18px;">MYR {{$art -> artPrice}}</div>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('storeDetails.details',$art->artID)}}" style="width:150px;">View Details</a></div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>


    </div>

    <div class="container px-4">
        <hr />
        @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
            <div class="text-left">
                {{ Session::get('message') }}
                {{ Session::forget('message') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <h5>Comments <span class="badge bg-secondary">
                <span>
                    {{ $counts}}
                </span>
        </h5>

        <div class="comment-area mt-4">
            <div class="card card-body">
                <h6 class="card-title">&nbsp Leave a comment:</h6>
                <form method="post" action="{{ route('comment.store', $data->artID) }}">
                    @csrf
                    <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" required />
                        <label for="star5" title="text">5 stars</label>

                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>

                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>

                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>

                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>

                    </div>

                    <textarea name="comment_body" class="form-control" rows="3" placeholder="Comment Section" required></textarea>
                    <div class="float-end mt-2 pt-1">
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </div>
                    <input type="hidden" value="{{$data->artID}}" name="artID" />
                </form>
            </div>

            </form>
        </div>

        @if (!empty($comments) && $comments->count())
        @forelse($comments as $comment)
        <div class="card card-body shadow-sm mt-3 mb-4">
            <div class="d-flex flex-start align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="fw-bold mb-1" style="color:#910000;">
                                {{$comment->username}}
                            </h6>
                        </div>

                        <div class="col-md-4 text-end">
                            <p class="text-muted small mb-0">
                                Commented on: {{ date('Y-m-d, h:i:s a',strtotime($comment['datetime'])) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <span class="mt-1">
                @if ($comment->rate == '0')
                <div style="color:#ffbf00;">
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                @elseif ($comment->rate == '1')
                <div style="color:#ffbf00;">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                @elseif ($comment->rate == '2')
                <div style="color:#ffbf00;">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                @elseif ($comment->rate == '3')
                <div style="color:#ffbf00;">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                @elseif ($comment->rate == '4')
                <div style="color:#ffbf00;">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                @else
                <div style="color:#ffbf00;">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                @endif
            </span>

            <p class="mt-3 mb-4 pb-2" >
                {!! $comment -> comment_body !!}
            </p>

            <div class="row">
                @if ( Session::get('username') == $comment->username)
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success btn-sm me-2" data-bs-toggle="modal" data-bs-target="#commentModal">Edit &nbsp<i class="bi bi-pencil-square"></i></button>
                    <!-- Comment Modal -->
                    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editcomment">Edit Comment</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="post" action="{{ route('comment.update', $comment->id) }}" class="row g-3">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="col-md-12">
                                            <label for="name" class="form-label">Comment Body</label>
                                            <textarea name="comment_body" class="form-control" rows="3" required> {!! $comment->comment_body !!}</textarea>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" style="width: 125px" class="btn btn-outline-dark rounded-pill" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" style="width: 125px" class="btn btn-primary rounded-pill">Update</button>
                                        <input type="hidden" value="{{$comment->id}}" name="id" />
                                        <input type="hidden" value="{{$data->artID}}" name="artID" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('comment.remove',$comment->artID) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove your comment?');">
                        @csrf
                        @method('DELETE')
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
                {!! $comments->appends(Request::all())->links() !!}
            </ul>
        </nav>
    </div>


    </div>
</main>

@endsection