@extends('master')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/storedetails.css') }}">
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
                        <a href="{{ route('wishlist.add', $data->artID) }}">           
                            <button class="rounded-circle btn btn-outline-dark mt-2 addToWishlist" style="float:right;" type="button">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                            </button>
                        </a>
                    </div>
                </div>

                <p class="text-uppercase" style="color:#9d9d9d; font-size:18px;">BY {{$data -> artistName}}</p>
                <div class="row">
                    <div class="col-md-6">
                        <p class="fw-bold" style="color:#910000; font-size:28px;">MYR {{$data -> artPrice}}</p>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-outline-dark mt-2" style="width:150px; float:right;" type="button">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Add to cart
                        </button>
                    </div>
                </div>

                <div id="accordion" class="lh-base" role="tablist" aria-multiselectable="true">
                    <div class="card mt-4" style="border-radius:5px;">
                        <h5 class="card-header" style="height:40px;" role="tab" id="headingOne">
                            <a data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapseOne" class="d-block" style="font-family: 'Poppins', serif; text-decoration:none; font-size:17px; color:#910000;">
                                <i class="fa fa-chevron-down pull-right"></i> Overview
                            </a>
                        </h5>

                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                            <div class="card-body">
                                <p class="fw-bolder">Year:<br /></p>{{$data -> artYear}}</p>
                                <p class="fw-bolder">Description:<br /></p>{{$data -> artDesc}}</p>
                                <p class="fw-bolder">Dimension:<br /></p>
                                {{$data -> artWidth}} cm (Width) x {{$data -> artHeight}} cm (Height)</p>
                                <p class="fw-bolder">Medium:<br /></p>{{$data -> artMedium}}</p>
                                <p class="fw-bolder">Style:<br /></p>{{$data -> artStyle}}</p>
                                <span style="color:#9d9d9d; font-size:12px;">Note: Actual colours may vary due to photography & computer settings.</span>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>

    <!-- MODAL -->
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
    <!-- <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="card">
                    <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                        <div class="d-flex flex-start w-100">
                            <img class="rounded-circle shadow-1-strong me-3" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40" height="40" />
                            <div class="form-outline w-100">
                                <textarea class="form-control" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                                <label class="form-label" for="textAreaExample">Message</label>
                            </div>
                        </div>
                        <div class="float-end mt-2 pt-1">
                            <button type="button" class="btn btn-primary btn-sm">Post comment</button>
                            <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    <div class="container px-4">
        <hr />
        @if (\Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
            <div class="text-left">
                {{ \Session::get('message') }}
                {{ \Session::forget('message') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <h5>Comments <span class="badge bg-secondary">
                <span>
                    @foreach($comments as $c)
                    {{ $c->count() }}
                    @endforeach
                </span>

        </h5>


        <div class="comment-area mt-4">
            <div class="card card-body">
                <h6 class="card-title">Leave a comment</h6>
                <form method="post" action="{{ route('comment.store') }}">
                    @csrf
                    <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                    <div class="float-end mt-2 pt-1">
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </div>
                    <input type="hidden" value="{{$data->artID}}" name="artID" />
                </form>
            </div>

            </form>
        </div>


        @forelse($comments as $comment)
        <div class="card card-body shadow-sm mt-3">
            <div class="d-flex flex-start align-items-center">
                <img class="rounded-circle shadow-1-strong me-3" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60" height="60" />
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

                @if(Auth::check())
                <div class="d-flex justify-content-end">
                    <a href="#" class="btn btn-primary btn-sm me-2">Edit</a>
                    <a href="#" class="btn btn-danger btn-sm me-2">Delete</a>
                </div>
                @endif
            </div>
        </div>

        @empty
        <hr class="mt-4">
        <p class="mt-4" style=" font-family: 'Poppins', serif;">No comment Yet.</p>
        @endforelse

    </div>
    </div>
</main>

@endsection