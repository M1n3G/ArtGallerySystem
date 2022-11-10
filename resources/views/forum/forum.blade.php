@extends('master')
@extends('forum/navbarInc')
@section('content')

<!-- Breadcumb link -->
<div class="container px-4 mt-2">
    <div class="row mt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-family: 'Poppins', sans-serif;">
                <li class="breadcrumb-item"><a href="/forum" class="text-decoration-none">Forum</a></li>
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
        <!-- <div class="card-header">
            <h4 class="mt-4">View <a class="btn btn-primary text-capitalize float-end" href="/createCategory">Create category</a></h4>
        </div> -->

        <div class="card-body">
            <table class="table table-striped" style="font-family:'Poppins', sans-serif; font-size: 16px;">
                <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if (!empty($posts) && $posts->count())
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>

                        <td>
                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-xs btn-primary">Show Post</a>
                        </td>
                        <td>
                            <a href="{{ route('post.edit',$post->id) }}" class="btn btn-xs btn-info">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('post.delete',$post->id) }}" method="POST" onsubmit="return confirm('Are you sure you wish to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <div class="row">
                        <h3 class="text-center">There are no post.</h3>
                    </div>
                    @endif
                </tbody>
            </table>

            Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of total {{$posts->total()}} entries

            <!-- PAGINATION -->
            <nav aria-label="pageNavigation">
                <ul class="pagination justify-content-end">
                    {!! $posts->appends(Request::all())->links() !!}
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