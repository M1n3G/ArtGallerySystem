@extends('master')
@extends('forum/navbarInc')
@section('content')

<!-- Breadcumb link -->
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
    <div class="row">
        <div class="col-md-8">
            <div class="card mt-4 mb-4">
                <div class="card-body">
                    <table class="table table-striped" style="font-family:'Poppins', sans-serif; font-size: 16px;">
                        <thead>
                            <th>Name</th>
                        </thead>
                        <tbody>
                            @if (!empty($category) && $category->count())
                            @foreach($category as $c)
                            <tr>
                                <td>
                                    <div class="p-1">
                                        <span class="d-block fw-bold">{{ $c->name }}</span>
                                        </br>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <p class="fw-normal mt-1">&nbsp Posts:
                                                {{ $c->posts->count() }}
                                            </p>
                                        </div>
                                        <div class="col-9">
                                            <div class="p-1 icons d-flex justify-content-end">
                                                <a href="{{ route('category.post',$c->id) }}" class="btn btn-primary px-2" style="height: 35px; width: 100px;">View</a>
                                            </div>
                                        </div>
                                    </div>
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


                    <!-- PAGINATION -->
                    <nav aria-label="pageNavigation">
                        <ul class="pagination justify-content-end">
                            {!! $category->appends(Request::all())->links() !!}
                        </ul>
                    </nav>
                </div>


            </div>
        </div>

        <div class="col-md-4">
            <div class="card mt-4">
                <div class="card-header">
                    <h5 style="font-family: 'Poppins', sans-serif;">Topic</h5>
                </div>
                <div class="card-body">
                    @php
                    $cate = App\Models\Forumcategories::where(['status'=>'Visible'])->get();
                    @endphp

                    @foreach($cate as $catitem)
                    <a class="dropdown-item text-decoration-underline mb-2 fw-semibold" style="color:#909090;" href="{{ route('category.post', $catitem->id) }}">{{ $catitem->name}}</a>
                    @endforeach
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">
                    <h6 style="font-family: 'Poppins', sans-serif;">Forum statistics</h6>
                </div>
                <div class="card-body">
                    <div class="row row-cols-2">
                        <div class="col">Topics:</div>
                        <div class="col mb-2">
                            <div class="fw-semibold">
                                {{ $category->count() }}
                            </div>
                        </div>
                        <div class="col">Post:</div>
                        <div class="col">
                            <div class="fw-semibold">
                                {{ $post->count() }}
                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div>
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