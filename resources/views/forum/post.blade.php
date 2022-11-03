@extends('master')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top:50px; margin-bottom:50px;">
            <div class="card">
                <div class="card-header">Create Post</div>
                <div class="card-body">
                    <form method="post" action="{{ route('post.store') }}">
                        <div class="form-group">
                            @csrf
                            <label class="label">Post Title: </label>
                            <input type="text" name="title" class="form-control" required/>
                        </div>
                        <div class="form-group mt-4">
                            <label class="label">Post Body: </label>
                            <textarea name="body" rows="10" cols="30" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mt-4" style="float:right;">
                            <input type="submit" class="btn btn-success" style="width:150px;"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
