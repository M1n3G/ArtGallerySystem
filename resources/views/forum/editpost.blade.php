@extends('master')
@extends('forum/navbarInc')
@section('title', '| Edit Post')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/postart.css') }}">
    <script language="JavaScript" type="text/javascript" src="{{ asset('Js/fileupload.js') }}"></script>
    <style>
        .ck.ck-editor__main>.ck-editor__editable {
            height: 200px;
            min-height: 200px;
        }
    </style>
</head>

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

<div class="container" style="margin-top:5px; margin-bottom:30px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>
                <div class="card-body">
                    <form method="post" action="{{  route('post.update', $post->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="label fw-semibold fs-6 mb-2">Post Title</label>
                            <input type="text" name="title1" value="{{ $post->title}}" class="form-control mt-2" required />
                        </div>

                        <div class="form-group mt-4">
                            <label class="label fw-semibold fs-6 mb-2">Post Body</label>
                            <textarea name="body" id="task-textarea" rows="10" cols="30" class="form-control mt-2 ck-editoreditable">{{ $post->body }}</textarea>
                        </div>

                        <div class="form-group mt-4">
                            <label class="label fw-semibold fs-6 mb-2">Image (Optional)</label>
                            <!-- <input type="file" class="form-control" name="image" accept="image/*"> -->
                        </div>

                        <div class="form-group file-upload">
                            <!-- ADD IMAGE BUTTON -->
                            <button class="file-upload-btn w-100" type="button" onclick="$('.file-upload-input').trigger( 'click' )">ADD IMAGE</button>

                            <!-- IMAGE UPLOAD AREA -->
                            <div class="image-upload-wrap">
                                <input class="file-upload-input" type="file" name="image" onchange="readURL(this);" accept="image/*" />
                                <div class="drag-text">
                                    <h3>Drag and drop a Image or select add Image</h3>
                                </div>
                            </div>

                            <!-- REMOVE IMAGE -->
                            <div class="file-upload-content">
                                <img class="file-upload-image" src="#" alt="your image" />
                                <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <input type="hidden" value="Visible" class="Visible" />
                        </div>

                        <div class=" d-grid gap-2 d-md-flex mt-4 justify-content-md-end">
                            <a class="btn btn-outline-dark text-capitalize rounded-pill" href="/forum" style="width:125px;">Cancel</a>
                            <button class="btn btn-primary text-capitalize rounded-pill" style="width:125px; background-color:#910000; color:white;" type="submit">Update</button>
                            <input type="hidden" name="postID" value="{{$post->id}}">
                            <input type="hidden" name="category_id" value="{{$post->category_id}}">
                            <input type="hidden" name="title" value="{{$post->title}}">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    ClassicEditor
        .create(document.querySelector('#task-textarea'), {
            removePlugins: ['indent', 'image'],
            toolbar: ['Heading', 'Bold', 'Italic', 'Link', 'bulletedList', 'numberedList', 'blockQuote', 'insertTable', 'Undo', 'Redo']
        })

        .catch(error => {
            console.error(error);
        });
</script>

@endsection