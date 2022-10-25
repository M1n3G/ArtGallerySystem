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
            <div class="alert alert-info alert-dismissible fade show" id="alert" role="alert">
                <p>There are nothing in the Cart now. <a href="/store" class="link-primary">STORE</a></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

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
                    <tbody>
                        <tr class="text-center">
                            <td><input type="checkbox" name="" value="AT0001" class="form-check-input" style="width: 20px; height: 20px;"></td>
                            <td><img src="{{ asset('Img/weilinggallery.jpg') }}" alt="img" style="width: 175px; height: 135px"></td>
                            <td class="fw-bold fs-6">Art1</td>
                            <td class="fw-bold fs-6">MYR 2,100</td>
                            <td>
                                <button type="submit" formaction="" formmethod="GET" class="btn btn-danger btn-sm ms-1"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                <input type="text" value="1" style="width: 28px" disabled>
                                <button type="submit" formaction="" formmethod="GET" class="btn btn-success btn-sm ms-1"><i class="fa fa-plus" aria-hidden="true"></i></button>
                            </td>
                            <td class="fw-bold fs-6">MYR 2,100</td>
                            <td>
                                <span class="badge bg-success px-3" style="height: 23px">AVAILABLE</span>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger" formaction="" formmethod="GET" onclick="return confirm('Delete Confirmation')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </td>
                        </tr>

                    </tbody>
                </table>

                <div class="row mb-4">
                    <div class="col">
                        <div class="text-end">
                            <button class="btn btn-dark proceedBtn" type="submit"><span>Proceed to Checkout</span></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </main>
</body>