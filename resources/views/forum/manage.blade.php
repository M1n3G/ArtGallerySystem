@extends('master')
@extends('forum/navbarInc')
@section('content')

<head>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/forumhome.css') }}">
</head>

<div class="container px-4 mt-2">

    <div class="row mt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-family: 'Poppins', sans-serif;">
                <li class="breadcrumb-item"><a href="/forumhome" class="text-decoration-none">Home</a></li>
            </ol>
        </nav>
    </div>
</div>

<!-- <div class="col-6 mt-4">
        
    </div> -->

<div class="container px-4 mt-2">
 
    <div class="card mt-2">
        <div class="card-header">
            <h4 class="mt-4">View <a class="btn btn-primary text-capitalize float-end" href="/createCategory">Create category</a></h4>
        </div>

        <div class="card-body">
            @if (session('message'))
            <div class="alert alert-success"> {{ session('message') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Keyword</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($category as $item)
                    <tr>
                        <th scope="row">{{ $item->id}}</th>
                        <td>{{ $item->name}}</td>
                        <td>{{ $item->description}}</td>
                        <td>{{ $item->image}}</td>
                        <td>{{ $item->keyword}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>


<!-- <div class="row d-flex mb-2"> -->
<!-- @if (session('message'))
            <div class="alert alert-success"> {{ session('message') }}</div>
            @endif

            <div class="col-6">
                <h2 class="mt-4">Home</h2>
            </div>
            <div class="col-6 mt-4">
                <a class="btn btn-primary text-capitalize" href="/createCategory" style="float: right;">Create category</a>
            </div>
        </div> -->

@endsection