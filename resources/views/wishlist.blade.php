@extends('Layout/layout')
@section('content')

<div class="container">
    <div class="row">
        <!-- Column for card-->
        @foreach($artwork as $art)
        <div class="col-lg-4 cardMb">
            <div class="card mx-auto h-100" style="width: 18rem;">
                <img src="{{$art -> artworkImg}}" class="card-img-top" alt="">

                <div class="card-body">
                    <h5 class="card-title text-center fw-bold">{{$art -> artworkName}}</h5>
                    <hr />
                    <div class="card-text lh-lg">
                        <div class="text-center">{{$art -> artist}}</div>
                        <div class="text-center" style="color:#9d9d9d; font-size:13px;">{{$art -> artworkMedium}}</div>
                        <div class="text-center fw-bolder" style="color:#910000; font-size:18px;">MYR {{$art -> artworkPrice}}</div>
                        <hr />
                        <div class=" text-center">
                            <button type="button" class="btn btn-dark"><a href="{{route('storeDetails.details',$art->artworkID)}}" style="color:white; text-decoration: none">View Details</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection