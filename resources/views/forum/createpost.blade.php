@extends('master')
@section('title', '| Create Post')
@section('content')

<style>
    .ck.ck-editor__main>.ck-editor__editable {
        height: 200px;
        min-height: 200px;
    }
</style>

<body onload="draft1()">
    <!-- Breadcumb link -->
    <div class="container px-4 mt-2">
        <div class="row mt-4">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb" style="font-family: 'Poppins', sans-serif;">
                    <li class="breadcrumb-item"><a href="/forum" class="text-decoration-none">Forum</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create Post</li>
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
                    <div class="card-header">Create Post</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="label fw-semibold fs-6">Post Title</label>
                                <input type="text" id="title" name="title" class="form-control mt-2" onkeyup="draft2()" required />
                            </div>

                            <div class="form-group mt-4">
                                <label class="label fw-semibold fs-6 mb-2">Post Body</label>
                                <textarea name="task-textarea" id="task-textarea" rows="10" cols="30" onkeyup="draft2()" class="form-control mt-2"></textarea>
                            </div>

                            <div class="form-group mt-4">
                                <label class="label fw-semibold fs-6 mb-2">Image (Optional)</label>
                                <input type="file" class="form-control" name="image" accept="image/*" required>
                            </div>

                            <div class="form-group mt-4">
                                <label class="label fw-semibold fs-6">Category</label>
                                <select name="category_id" class="form-control mt-2">
                                    @foreach ($category as $catitem)
                                    <option value="{{ $catitem->id }}">{{ $catitem->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-4">
                                <input type="hidden" value="Visible" name="status" />
                            </div>

                            <div class="d-grid gap-2 d-md-flex mt-4 justify-content-md-end">
                                <a class="btn btn-outline-dark text-capitalize" href="/forum" style="width:125px;">Cancel</a>
                                <a onclick="submit()">
                                    <button class="btn btn-primary text-capitalize" style="width:125px;" type="submit">Create</button>
                                </a>
                            </div>

                            <script>
                                function draft1() {
                                    var x = document.getElementById("title");
                                    var y = document.getElementById("task-textarea");
                                    x.value = sessionStorage.getItem("title");
                                    y.value = sessionStorage.getItem("task-textarea");
                                }

                                function draft2() {
                                    var x = document.getElementById("title");
                                    var y = document.getElementById("task-textarea");
                                    sessionStorage.setItem("title", x.value);
                                    sessionStorage.setItem("task-textarea", y.value);
                                }

                                function submit() {
                                    sessionStorage.removeItem("title");
                                    sessionStorage.removeItem("task-textarea");
                                }
                            </script>
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
</body>