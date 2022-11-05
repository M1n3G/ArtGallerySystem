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
                <li class="breadcrumb-item"><a href="/forum" class="text-decoration-none">Home</a></li>
            </ol>
        </nav>
    </div>
</div>

<!-- <div class="col-6 mt-4">
        
    </div> -->

<div class="container px-4 mt-2">

    <div class="card mt-4 mb-4">
        <div class="card-header">
            <h4 class="mt-4">View <a class="btn btn-primary text-capitalize float-end" href="/createCategory">Create category</a></h4>
        </div>

        <div class="card-body">
            @if (session('message'))
            <div class="alert alert-success"> {{ session('message') }}</div>
            @endif

            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Show Post</a>
                        </td>
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