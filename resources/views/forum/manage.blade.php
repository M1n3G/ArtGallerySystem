@extends('master')
@extends('forum/navbarInc')

<!-- Custom CSS -->

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/forumhome.css') }}">
    <title>ArtCells | Manage Forum</title>
    <style>
        th,
        .td,
        .card {
            padding: 20px;
        }
    </style>
</head>

@section('content')
<div class="container px-4 mt-2">
    <div class="row mt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-family: 'Poppins', sans-serif;">
                <li class="breadcrumb-item"><a href="/forum" class="text-decoration-none">Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage</li>
            </ol>
        </nav>
        <div class="col-sm-6"></div>
        <div class="col-sm-6">
            <a href="{{route('report.list')}}" class="btn btn-secondary float-end mb-2">Manage Report Violations</a>
        </div>
    </div>

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

    <div class="card mb-4">
        <div class="card-header bg-white">
            <h5 class="mt-2" style="font-family:'Poppins', sans-serif;">Topic Section
                <a class="btn btn-primary text-capitalize float-end px-3" href="{{ route('category.create') }}">Create Topic</a>
            </h5>
        </div>

        <div class="card-body px-4">
            <table id="myTable" class="table table-responsive" style="font-family:'Poppins', sans-serif; font-size: 16px;">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Topic Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($category) && $category->count())
                    @foreach ($category as $cat)
                    <tr>
                        <td>
                            <div class="p-2">
                                <span class="d-block fw-bold">{{ $cat->id}}</span>
                            </div>
                        </td>
                        <td>
                            <div class="p-2">
                                <span class="fw-normal">{{ $cat->name}}</span>
                            </div>

                        </td>
                        <td>
                            <div class="p-2 d-flex flex-column">
                                <span class="fw-light">{!! $cat->description !!}</span>
                            </div>

                        </td>

                        <td>
                            <div class="p-2">
                                @if ($cat->status == 'Visible')
                                <span class="badge text-bg-success">{{ $cat->status }}</span>
                                @else
                                <span class="badge text-bg-warning">{{ $cat->status }}</span>
                                @endif
                            </div>
                        </td>


                        <td>
                            <div class="p-2 icons d-flex" style="width: 100px;">
                                <a href="{{ route('category.edit',$cat->id) }}" class="btn btn-dark  px-2" style="padding: 6px 8px; height:35px; max-height:35px;">
                                    <i class="bi bi-pencil-square"></i></a>&nbsp&nbsp&nbsp
                                <form action="{{ route('category.delete',$cat->id) }}" method="POST" onsubmit="return confirm('Are you sure you wish to delete this category with its post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger px-2" style="height:35px; max-height:35px;"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>

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

@endsection