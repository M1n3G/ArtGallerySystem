@extends('master')
@extends('forum/navbarInc')
@section('title', '| Create Category')
@section('content')

<!-- Breadcumb link -->
<div class="container px-4 mt-2">
    <div class="row mt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-family: 'Poppins', sans-serif;">
                <li class="breadcrumb-item"><a href="/forum" class="text-decoration-none">Forum</a></li>
                <li class="breadcrumb-item"><a href="/manage" class="text-decoration-none">Manage</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create Category</li>
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
                <div class="card-header">Create Category</div>
                <div class="card-body">
                    <form method="post" action="{{ route('category.store') }}">
                        <div class="form-group">
                            @csrf
                            <label class="label">Name </label>
                            <input type="text" name="name" class="form-control" required />
                        </div>
                        <div class="form-group mt-4">
                            <label class="label">Description </label>
                            <textarea name="description" rows="10" cols="30" id="mySummernote" class="form-control" required></textarea>
                        </div>

                        <div class="d-grid gap-2 d-md-flex mt-4 justify-content-md-end">
                            <a class="btn btn-outline-dark text-capitalize" href="/manage" style="width:125px;">Cancel</a>
                            <button class="btn btn-primary text-capitalize" style="width:125px;" type="submit">Create</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
