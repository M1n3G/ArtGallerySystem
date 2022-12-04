@extends('master')
@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container mt-4 mb-4">
    <div class="row cart-body">

        @php
        $finalPrice=0;
        @endphp

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6 mt-4 mb-4">
            <!--REVIEW ORDER-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    Review Order <div class="pull-right"><small><a class="afix-1" href="{{route('cart.list')}}">Edit Cart</a></small>
                    </div>
                </div>

                <div class="panel-body">
                    @foreach (\Session::get('cartOrder') as $f)
                    @foreach ($cart as $row)
                    @if ($row->itemID == $f)
                    <div class="form-group">
                        <div class="col-sm-3 col-xs-3">
                            <img class="img-responsive" src="{{$row->artImg}}" />
                        </div>
                        <div class="col-sm-6 col-xs-6">
                            <div class="col-xs-12">{{$row->itemName}}</div>
                            <div class="col-xs-12"><small>Quantity:<span>{{$row->quantity}}</span></small></div>
                        </div>
                        <div class="col-sm-3 col-xs-3 text-right">
                            <h6><span>RM</span>{{$row->Price}}</h6>
                            @php

                            $finalPrice += $row->Price;
                            $finalPrice = $finalPrice*0.23838;

                            @endphp
                        </div>
                    </div>
                    <div class="form-group">
                        <hr />
                    </div>
                    @endif
                    @endforeach
                    @endforeach

                    <div class="form-group">
                        <div class="col-xs-12">
                            <hr class="mt-2 mb-2"/>
                            <strong>Order Total</strong>
                            <div class="pull-right"><span>USD</span><span>@php
                                    echo number_format($finalPrice,2);
                                    @endphp
                                </span></div>
                        </div>
                    </div>


                </div>

            </div>


            <!--REVIEW ORDER END-->

        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6 mt-4 mb-4">
            <!--SHIPPING METHOD-->
            @foreach($user as $row)
            <div class="panel panel-info">
                <div class="panel-heading">Address</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <h4>Shipping Address</h4>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Country:</strong></div>
                        <div class="col-md-12 mt-2 mb-4">
                            <input readonly type="text" class="form-control" name="country" value="Malaysia" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <strong>Name:</strong>
                            <input type="text" name="first_name" class="form-control mt-2 mb-4" value="{{$row->name}}" />
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Address:</strong></div>
                        <div class="col-md-12 mt-2 mb-4">
                            <input type="text" name="address" class="form-control" value="{{$row->address}}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>City:</strong></div>
                        <div class="col-md-12 mt-2 mb-4">
                            <input type="text" name="city" class="form-control" value="{{$row->city}}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>State:</strong></div>
                        <div class="col-md-12 mt-2 mb-4">
                            <input type="text" name="state" class="form-control" value="{{$row->state}}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                        <div class="col-md-12 mt-2 mb-4">
                            <input type="text" name="zip_code" class="form-control" value="{{$row->postalcode}}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Phone Number:</strong></div>
                        <div class="col-md-12 mt-2 mb-4"><input type="text" name="phone_number" class="form-control" value="{{$row->contact}}" /></div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12"><strong>Email Address:</strong></div>
                        <div class="col-md-12 mt-2 mb-4"><input type="text" name="email_address" class="form-control" value="{{$row->email}}" /></div>
                    </div>

                    <div class="form-group">
                        <form action="{{route('payment')}}" method="post">
                            @csrf
                            <input type="hidden" name="amount" value="{{number_format($finalPrice,2)}}">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <button type="submit" class="btn btn-primary btn-submit-fix mt-4">Pay With Paypal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        @endforeach
    </div>

</div>
@endsection