@extends('master')
@extends('forum/navbarInc')
@section('title', '| Create Category')
@section('content')


<body onload="draft1()">
    <!-- Breadcumb link -->
    <div class="container px-4 mt-2">
        <div class="row mt-4">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb" style="font-family: 'Poppins', sans-serif;">
                    <li class="breadcrumb-item"><a href="/forum" class="text-decoration-none">Forum</a></li>
                    <li class="breadcrumb-item"><a href="/forum/manage" class="text-decoration-none">Manage</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Topic</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Category -->
    @if (count($errors) > 0)
    <div class="container">
        <div class="alert alert-danger alert-dismissible fade show form-control" role="alert">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <div class="container" style="margin-top:50px; margin-bottom:50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Topic</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                            <div class="form-group">
                                @csrf
                                <label class="label fw-semibold fs-6 mb-2">Name </label>
                                <input type="text" id="name" name="name" class="form-control" onkeyup="draft2()" required />
                            </div>

                            <div class="form-group mt-4">
                                <label class="label fw-semibold fs-6 mb-2">Description </label>
                                <textarea name="description" id="description" rows="10" cols="30" onkeyup="draft2()" class="form-control"></textarea>
                            </div>

                            <!-- Checked checkbox -->
                            <div class="form-group mt-4">
                                <label class="label mb-2 fw-semibold fs-6">Visibility</label>
                                <br />
                                <label class="label mb-2 fw-normal fs-6">Status:</label>
                                <select class="form-select" name="status" aria-label="Default select example">
                                    <option value="Visible">Visible</option>
                                    <option value="Hidden">Hidden</option>
                                </select>
                            </div>

                            <div class="d-grid gap-2 d-md-flex mt-4 justify-content-md-end">
                                <a class="btn btn-outline-dark text-capitalize" href="/forum/manage" style="width:125px;">Cancel</a>
                                <a onclick="submit()">
                                <button class="btn btn-primary text-capitalize" style="width:125px;" type="submit">Create</button>
                                </a>
                            </div>

                            <script>
                                function draft1() {
                                    var x = document.getElementById("name");
                                    var y = document.getElementById("description");
                                    x.value = sessionStorage.getItem("name");
                                    y.value = sessionStorage.getItem("description");
                                }

                                function draft2() {
                                    var x = document.getElementById("name");
                                    var y = document.getElementById("description");
                                    sessionStorage.setItem("name", x.value);
                                    sessionStorage.setItem("description", y.value);
                                }

                                function submit() {
                                    sessionStorage.removeItem("name");
                                    sessionStorage.removeItem("description");
                                }
                            </script>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection