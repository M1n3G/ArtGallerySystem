@extends('master')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/profile.css') }}">
</head>


<div class="container">
    <div class="container mt-4">
    </div>

    <div class="row profile">
        <div class="col-md-3">
            @include('user.sidebar')
        </div>

        <div class="col-md-9">
            <div class="profile-content mt-3 px-4">
                <div class="card">

                    <div class="card-body px-4">

                        <!-- PROFILE -->
                        <div class="profile">
                            <div class="profileheader">
                                <p class="titlespan1 mt-3 fw-semibold">My Purchase</p>
                                <p class="titlespan2">Manage and protect your account</p>

                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                                        <table class="table manage-candidates-top mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Payment ID</th>

                                                    <th class="text-center">Total</th>
                                                    <th class="action text-right" style='text-align:right;'>Status</th>
                                                </tr>
                                            </thead>

                                            @foreach($payment as $row)
                                            <tbody>
                                                <tr class="candidates-list">
                                                    <td class="title">
                                                        <div class="row">


                                                            <div class="col-md-8 candidate-list-details">
                                                                <div class="candidate-list-info">
                                                                    <div class="candidate-list-title">
                                                                        <h4 class="mb-0 fw-bold" style="font-size:27px; color: #0d6efd">
                                                                            {{$row->paymentID}}
                                                                        </h4>
                                                                    </div>
                                                                    <div class="details">
                                                                        <!-- Category -->
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="fw-semibold" style="color:#9d9d9d; font-size:16px;">
                                                                                    <div class="fw-semibold" style="color:black; font-size:23px;">
                                                                                        Artwork Name:<br> </div>
                                                                                    @if($row->type =='c')

                                                                                    @php
                                                                                    $item=json_decode($row->itemID);
                                                                                    @endphp
                                                                                    @foreach($art as $arts)
                                                                                    @foreach($item as $items)

                                                                                    @if($items==$arts->artID)
                                                                                    {{$arts->artName}} <br>
                                                                                    @endif
                                                                                    @endforeach
                                                                                    @endforeach
                                                                                    @else
                                                                                    @foreach($auction as $row)

                                                                                    @endforeach
                                                                                    Auction:{{$row->auctionName}}

                                                                                    @endif
                                                                                </div>

                                                                            </div>


                                                                            <div class="mt-2">
                                                                                <i class="fa fa-user" aria-hidden="true"></i>&nbsp
                                                                                Buyer:
                                                                                <p class="fw-semibold">{{$users->name}}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="candidate-list-favourite-time text-center">
                                                        <span class="fw-semibold" style="color:black; font-size:13px;">RM@php $price=$row->amount/0.24;
                                                            echo number_format($price,2); @endphp</span>

                                                    </td>
                                                    <td>
                                                        <ul class="list-unstyled mb-0 d-flex justify-content-end">

                                                            <span class="badge text-bg-success">{{$row->paymentStatus}}</span>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        </table>
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