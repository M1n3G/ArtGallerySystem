@extends('master')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/profile.css') }}">
</head>

<div class="container">
    @if (count($errors) > 0)
    <div class="container mt-4">
        <div class="alert alert-danger alert-dismissible fade show form-control" role="alert">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <div class="container mt-4">
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
            <div class="text-left">
                {{ Session::get('success') }}
                {{ Session::forget('success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (\Session::has('fail'))
        <div class="alert alert-danger alert-dismissible fade show form-control" role="alert">
            <div class="text-left">
                {{ Session::get('fail') }}
                {{ Session::forget('fail') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <div class="row profile">
        <div class="col-md-3">
            @include('user.sidebar')
        </div>

        <div class="col-md-9">
            <div class="profile-content mt-3 px-4">
                <div class="card">

                    <div class="card-body px-4">

                        <div class="profile">
                            <div class="profileheader">
                                <div class="row">
                                    <div class="col">
                                        <p class="titlespan1 fw-semibold">Auction</p>
                                    </div>

                                    <div class="col text-end">
                                        @if (Session::get('userRole') == 'Artist' )
                                        <span class="badge text-bg-success" style="width:125px; height:22px;">
                                            <div style="font-size: 12px" class="text-uppercase">
                                                Artist
                                            </div>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <p class="titlespan2">View Your Auction Bidding</p>

                            </div>
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-status-tab" data-bs-toggle="tab" data-bs-target="#nav-status" type="button" role="tab" aria-controls="nav-status" aria-selected="true">Auction Item Status</button>
                                    <button class="nav-link" id="nav-aHistory-tab" data-bs-toggle="tab" data-bs-target="#nav-aHistory" type="button" role="tab" aria-controls="nav-aHistory" aria-selected="false">Auction History</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-status" role="tabpanel" aria-labelledby="nav-status-tab" tabindex="0">

                                    <table class="table manage-candidates-top mb-0">
                                        <thead>
                                            <tr>
                                                <th>Artwork</th>
                                                <th class="text-center">Status</th>
                                                <th class="action text-right" style='text-align:right;'>Action</th>
                                            </tr>
                                        </thead>
                                        @if(!empty($bid))
                                        @foreach($bid as $bids)
                                        @if($bids->auctionStatus == 'Process' || $bids->auctionStatus == 'Bidding')
                                        <tbody>
                                            <tr class="candidates-list">
                                                <td class="title">
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="thumb">
                                                                <img class="img-fluid" src="{{ asset($bids->auctionImg)}}" width=150 height=200 style="max-width: 150px; max-height: 200px;" alt="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-8 candidate-list-details">
                                                            <div class="candidate-list-info">
                                                                <div class="candidate-list-title">
                                                                    <h4 class="mb-0 fw-bold" style="font-size:27px; color: #0d6efd">
                                                                        {{$bids->auctionName}}
                                                                    </h4>
                                                                </div>
                                                                <div class="details">

                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="fw-semibold" style="color:#9d9d9d; font-size:16px;">
                                                                                {!!$bids->auctionDesc!!}
                                                                            </div>
                                                                            <div class="fw-semibold" style="color:blue; font-size:13px;">
                                                                                RM{{$bids->bidPrice}}
                                                                            </div>
                                                                        </div>


                                                                        <div class="mt-2">
                                                                            <i class="fa fa-user" aria-hidden="true"></i>&nbsp
                                                                            Author:
                                                                            <p class="fw-semibold">{{$bids->name}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                </div>
                                </td>
                                <td class="candidate-list-favourite-time text-center">
                                    @if($bids->auctionStatus == 'Bidding')
                                    <span class="badge text-bg-success">{{$bids->auctionStatus}}</span>
                                    @else
                                    <span class="badge text-bg-danger">{{$bids->auctionStatus}}</span>
                                    @endif
                                </td>
                                <td>
                                    <ul class="list-unstyled mb-0 d-flex justify-content-end">
                                        @if($bids->auctionStatus == 'Process')
                                        <form action="{{ action('AuctionController@manual', $bids->auctionID ) }}" onsubmit="return confirm('Proceed to checkout this Artwork?');">
                                            @csrf
                                            <li><button type="submit" class="btn btn-success px-2" style="height:35px; max-height:35px;"><i class="bi bi-credit-card"></i></button>
                                                </a>
                                            </li>
                                        </form>
                                        @endif
                                    </ul>
                                </td>
                                </tr>
                                </tbody>
                                @endif
                                @endforeach
                                @else
                                <div class="alert alert-primary alert-dismissible fade show form-control" role="alert">
                                    <div class="text-left">
                                        You don't have bidding any item.
                                    </div>
                                </div>
                                @endif
                                </table>
                                <br />


                            </div>
                            <div class="tab-pane fade" id="nav-aHistory" role="tabpanel" aria-labelledby="nav-aHistory-tab" tabindex="0">
                                <ol class="list-group list-group-numbered">

                                    <table class="table manage-candidates-top mb-0">
                                        <thead>
                                            <tr>
                                                <th>Artwork</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        @if(!empty($auc))
                                        @foreach($auc as $aucs)
                                        @if($aucs->auctionStatus == 'END' || $aucs->auctionStatus == 'FINISH' ||$aucs->auctionStatus == 'BANNED' )
                                        <tbody>
                                            <tr class="candidates-list">
                                                <td class="title">
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="thumb">
                                                                <img class="img-fluid" src="{{ asset($aucs->auctionImg)}}" width=150 height=200 style="max-width: 150px; max-height: 200px;" alt="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-8 candidate-list-details">
                                                            <div class="candidate-list-info">
                                                                <div class="candidate-list-title">
                                                                    <h4 class="mb-0 fw-bold" style="font-size:27px; color: #0d6efd">
                                                                        {{$aucs->auctionName}}
                                                                    </h4>
                                                                </div>
                                                                <div class="details">

                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="fw-semibold" style="color:#9d9d9d; font-size:16px;">
                                                                                {!!$aucs->auctionDesc!!}
                                                                            </div>
                                                                            <div class="fw-semibold" style="color:blue; font-size:13px;">
                                                                                @if(empty($aucs->bidPrice))
                                                                                @if($aucs->auctionStatus =="FINISH")
                                                                                Buy Now Price: RM{{$aucs->endPrice}}
                                                                                @else
                                                                                Not Sell!
                                                                                @endif
                                                                                @else
                                                                                End Bidding Price: RM{{$aucs->bidPrice}}
                                                                                @endif
                                                                            </div>
                                                                        </div>


                                                                        <div class="mt-2">
                                                                            <i class="fa fa-user" aria-hidden="true"></i>&nbsp
                                                                            Author:
                                                                            <p class="fw-semibold">{{$aucs->username}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                            </div>
                            </td>
                            <td class="candidate-list-favourite-time text-center">
                                @if($aucs->auctionStatus == 'FINISH')
                                <span class="badge text-bg-success">{{$aucs->auctionStatus}}</span>
                                @else
                                <span class="badge text-bg-danger">{{$aucs->auctionStatus}}</span>
                                @endif
                            </td>

                            </tr>
                            </tbody>
                            @endif
                            @endforeach
                            @else
                            <div class="alert alert-primary alert-dismissible fade show form-control" role="alert">
                                <div class="text-left">
                                    You don't have upload any auction Item!
                                </div>
                            </div>
                            @endif
                            </table>
                            <br />

                            </ol>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection