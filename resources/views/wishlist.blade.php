@extends('master')
@section('content')

<div class="container my-5">

    <div class="row align-items-start">
        <!-- Column for card-->

        <!-- CATEGORY NAME PURPOSE -->
        @foreach($cat as $category)
        @endforeach

        @if (!empty($art) && count($art))
        @foreach($art as $row)
        <div class="col-6 col-sm-4 mt-4">
            <div class="card mx-auto" style="width:280px; max-width:280px;">
                <!-- Product image-->
                <img class="card-img-top" src="{{$row->artImg}}" style="width:280px; max-width:280px; height:300px; max-height:300px;" alt="{{$row -> artName}}" />

                <!-- Product details-->
                <div class="card-body p-4" style="height:150px; max-height:150px;">
                    <div class="text-center">
                        <h5 class="fw-bolder">{{$row -> artName}}</h5>
                        <div style="color:#9d9d9d; font-size:15px;">{{$category->name}}</div>
                        <div class="mt-3 fw-bolder" style="color:#910000; font-size:18px;">MYR {{$row -> artPrice}}</div>
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('storeDetails.details',$row->artID)}}" style="width:150px;">View Details</a></div>
                        </div>
                        <div class="col-md-6 justify-content-end">
                            <div class="text-center" style="margin-left:47px;">
                                <form action="{{ route('wishlist.remove',$row->artID) }}" method="POST" onsubmit="return confirm('Are you sure you wish to remove this art from wishlist?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="alert alert-primary alert-dismissible fade show form-control" role="alert">
            <div class="text-left">
                There are no art in your wishlist.
                <a href="/store">&nbsp Store</a>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

    </div>
</div>
@endsection