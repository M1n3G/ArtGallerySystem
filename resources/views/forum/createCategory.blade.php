@extends('master')
@extends('forum/navbarInc')
@section('content')

<!-- Category -->
<div class="container px-4" style="margin-top:50px; margin-bottom:50px;">

    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mt-2">Add Category</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('forum.storecategory') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="col-form-label">Title:</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="mb-3">
                    <label for="description" class="col-form-label">Description:</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="col-form-label">Image (Optional):</label>
                    <input type="file" name="image" class="form-control" />
                </div>

                <div class="mb-3">
                    <label for="keyword" class="col-form-label">Keyword:</label>
                    <textarea class="form-control" name="keyword"></textarea>
                </div>

                <div class="d-grid gap-2 d-md-flex mt-4 justify-content-md-end">
                    <a class="btn btn-outline-dark text-capitalize" href="/forumhome" style="width:125px;">Cancel</a>
                    <button class="btn btn-primary text-capitalize" style="width:125px;" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection