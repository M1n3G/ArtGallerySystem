@extends('master')
@extends('forum/navbarInc')
@section('content')

<head>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/forumhome.css') }}">
    <style>
        th,
        .td,
        .card {
            padding: 20px;
        }
    </style>
</head>

<div class="container px-4 mt-2">
    <div class="row mt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-family: 'Poppins', sans-serif;">
                <li class="breadcrumb-item"><a href="/forum" class="text-decoration-none">Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container px-4 mt-2">
    @if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
        <div class="text-left">
            {{ \Session::get('success') }}
            {{ \Session::forget('success') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card mt-4 mb-4">
        <div class="card-header bg-white">
            <h5 class="mt-2" style="font-family:'Poppins', sans-serif;">View Category
                <a class="btn btn-primary text-capitalize float-end px-3" href="{{ route('category.create') }}">Create category</a>
            </h5>
        </div>

        <div class="card-body px-4">
            <table class="table table-responsive" style="font-family:'Poppins', sans-serif; font-size: 16px;">
                <thead class="table-light">
                    <tr>
                        <td scope="col">ID</td>
                        <td scope="col">Category Name</td>
                        <td scope="col">Description</td>
                        <td colspan="2">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($category) && $category->count())
                    @foreach ($category as $cat)
                    <tr>
                        <th scope="row">{{ $cat->id}}</th>
                        <td>{{ $cat->name}}</td>
                        <td>{{ $cat->description}}</td>
                        <td>
                            <a href="{{ route('category.edit',$cat->id) }}" class="btn btn-xs btn-info">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('category.delete',$cat->id) }}" method="POST" onsubmit="return confirm('Are you sure you wish to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <div class="row">
                        <h3 class="text-center">There are no category.</h3>
                    </div>
                    @endif
                </tbody>

            </table>

            Showing {{ $category->firstItem() }} to {{ $category->lastItem() }} of total {{$category->total()}} entries

            <!-- PAGINATION -->
            <nav aria-label="pageNavigation">
                <ul class="pagination justify-content-end">
                    {!! $category->appends(Request::all())->links() !!}
                </ul>
            </nav>
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