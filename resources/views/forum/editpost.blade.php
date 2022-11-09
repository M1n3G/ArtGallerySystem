@extends('master')
@section('title', '| Create Post')
@section('content')

<!-- Breadcumb link -->
<div class="container px-4 mt-2">
    <div class="row mt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-family: 'Poppins', sans-serif;">
                <li class="breadcrumb-item"><a href="/forum" class="text-decoration-none">Forum</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
            </ol>
        </nav>
    </div>
</div>

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

<div class="container" style="margin-top:5px; margin-bottom:50px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>
                <div class="card-body">
                    <form method="post" action="{{  route('post.update', $post->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="label">Post Title</label>
                            <input type="text" name="title" value="{{ $post->title}}" class="form-control mt-2" required />
                        </div>

                        <div class="form-group mt-4">
                            <label class="label">Post Body</label>
                            <textarea name="body" rows="10" cols="30" id="mySummernote" class="form-control mt-2" required>{{ $post->body }}</textarea>
                        </div>

                        <div class="form-group mt-4">
                            <label class="label">Category</label>
                            <select name="category_id" class="form-control mt-2">
                                <option value="">-- Select Category --</option>
                                @foreach ($category as $catitem)
                                <option value="{{ $catitem->id }}" {{ $post->category_id == $catitem->id ? 'selected':'' }}>
                                    {{ $catitem->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" d-grid gap-2 d-md-flex mt-4 justify-content-md-end">
                                    <a class="btn btn-outline-dark text-capitalize" href="/forum" style="width:125px;">Cancel</a>
                                    <button class="btn btn-primary text-capitalize" style="width:125px;" type="submit">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection