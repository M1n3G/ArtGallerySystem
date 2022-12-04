@extends('master')
@section('content')

<head>
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            font-size: 18px;
            color: black;
        }

        .cartTitle {
            margin-top: 30px;
            margin-bottom: 30px;
        }
    </style>
</head>

<!--Main area-->

<body>
    <main id="main" class="main-site" style="margin-top: 30px;">
        <div class="container">
            <h2 class="text-center cartTitle">Your Cart</h2>
        </div>

        <div class="container">

            <!-- MESSAGE -->
            @if($count == 0)
            <div class="alert alert-info alert-dismissible fade show" id="alert" role="alert">
                <p>There are nothing in the Cart now. <a href="/store" class="link-primary">STORE</a></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <!-- CART -->
            <form action="" method="POST">
                <input type="hidden" name="_method" value="POST">

                <table class="table shadow p-3 mb-5 bg-body rounded">
                    <thead class="table-dark text-center">
                        <th></th>
                        <th>Item Img</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Remove</th>
                    </thead>
                    @foreach($cart as $row)
                    <tbody>
                        <tr class="text-center">
                            <td><input type="checkbox" name="cart[]" value="{{$row->itemID}}" class="form-check-input" style="width: 20px; height: 20px;"></td>
                            <td><img src="{{$row ->artImg}}" alt="img" style="width: 175px; height: 135px"></td>
                            <td class="fw-bold fs-6">{{$row ->itemName}}</td>
                            <td class="fw-bold fs-6">MYR {{$row ->Price}}</td>
                            <td class="fw-bold fs-6">
                                {{$row ->quantity}}
                            </td>
                            <td class="fw-bold fs-6">MYR {{$row ->Price}}</td>
                            <td>
                                <span class="badge bg-success px-3" style="height: 23px">{{$row->artStatus}}</span>
                            </td>


                            <td>

                                <button type="submit" class="btn btn-danger" formaction="{{ action('CartController@destroy', $row->cartID) }}" formmethod="GET" onclick="return confirm('Delete Confirmation')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>

                        </tr>

                    </tbody>
                    @endforeach
                </table>

                <div class="row mb-4">
                    <div class="col">
                        <div class="text-end">
                            <button class="btn btn-dark proceedBtn" type="submit"><span>Proceed to
                                    Checkout</span></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </main>
</body>
@endsection