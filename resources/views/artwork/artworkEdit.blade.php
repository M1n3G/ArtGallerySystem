@extends('master')
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
                    <li class="breadcrumb-item"><a href="{{ route('artworklist') }}" class="text-decoration-none">Artwork List</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Artwork</li>
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
    @if (\Session::has('fail'))
    <div class="alert alert-danger alert-dismissible fade show form-control" role="alert">
        <div class="text-center">
            {{ \Session::get('fail') }}
            {{ \Session::forget('fail') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container" style="margin-top:5px; margin-bottom:50px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Artwork Details</div>
                    <div class="card-body">
                        @foreach($artwork as $rows)
                        <form method="post" action="{{  route('artwork.save', $rows->artID) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="label fw-semibold fs-6">Artwork Name</label>
                                <input type="text" id="artName" name="artName" class="form-control mt-2" value="{{$rows->artName}}" required />
                            </div>

                            <div class="form-group">
                                <label class="label fw-semibold fs-6">Artist Name</label>
                                <input type="text" id="artistName" name="artistName" class="form-control mt-2" value="{{$rows->artistName}}" required />
                            </div>



                            <div class="form-group mt-4">
                                <label class="label fw-semibold fs-6 mb-2">Artwork Description</label>
                                <textarea name="artDesc" id="artDesc" rows="10" cols="30" class="form-control mt-2">{!!$rows->artDesc!!}</textarea>

                            </div>

                            <div class="form-group mt-4">
                                <label class="label fw-semibold fs-6 mb-2">Artwork Image</label>
                                <input type="file" class="form-control" name="artImg" src="{{$rows->artImg}}">
                            </div>


                            <div class="form-group mt-4">
                                <label class="label fw-semibold fs-6">Artwork Category</label>
                                <select name="category_id" class="form-control mt-2">
                                    <option value="{{$rows->category_id}}">--Select Artwork Category--</option>
                                    @foreach ($category as $catitem)
                                    <option value="{{ $catitem->id }}">{{ $catitem->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-4">
                                <label class="label fw-semibold fs-6">Artwork Style</label>
                                <select name="style" class="form-control mt-2">
                                    <option value="{{$rows->artStyle}}">{{$rows->artStyle}}--Default</option>
                                    <option value="">--Select Artwork Style--</option>
                                    <option value="Abstract">Abstract</option>
                                    <option value="Figurative">Figurative</option>
                                    <option value="Geometric">Geometric</option>
                                    <option value="Minimalist">Minimalist</option>
                                    <option value="Nature">Nature</option>
                                    <option value="Potrraiture">Potrraiture</option>
                                    <option value="Sculpture">Sculpture</option>
                                    <option value="Still Life">Still Life</option>
                                    <option value="Surrealist">Surrealist</option>
                                    <option value="Typography">Typography</option>
                                    <option value="Urban">Urban</option>
                                </select>
                            </div>

                            <div class="form-group mt-4">
                                <label class="label fw-semibold fs-6 mb-2">Artwork Year</label>
                                <input type="text" class="form-control" name="artYear" value="{{$rows->artYear}}">
                            </div>


                            <div class="form-group">
                                <label class="label fw-semibold fs-6">Artwork Price</label>
                                <input type="text" id="artPrice" name="artPrice" class="form-control mt-2" value="{{$rows->artPrice}}" min='0' max='10000000' required />
                            </div>




                            <div class="d-grid gap-2 d-md-flex mt-4 justify-content-md-end">
                                <a class="btn btn-outline-dark text-capitalize" href="{{ route('artworklist') }}" style="width:125px;">Cancel</a>
                                <a onclick="submit()">
                                    <button class="btn btn-primary text-capitalize" style="width:125px;" type="submit">Create</button>
                                </a>
                            </div>

                            <script>
                                function draft1() {
                                    var x = document.getElementById("title");
                                    var y = document.getElementById("artDesc");
                                    x.value = sessionStorage.getItem("title");
                                    y.value = sessionStorage.getItem("artDesc");
                                }

                                function draft2() {
                                    var x = document.getElementById("title");
                                    var y = document.getElementById("artDesc");
                                    sessionStorage.setItem("title", x.value);
                                    sessionStorage.setItem("artDesc", y.value);
                                }

                                function submit() {
                                    sessionStorage.removeItem("title");
                                    sessionStorage.removeItem("artDesc");
                                }
                            </script>
                            @endforeach
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
            .create(document.querySelector('#artDesc'), {
                removePlugins: ['indent', 'image'],
                toolbar: ['Heading', 'Bold', 'Italic', 'Link', 'bulletedList', 'numberedList', 'blockQuote',
                    'insertTable', 'Undo', 'Redo'
                ]
            })

            .catch(error => {
                console.error(error);
            });
    </script>

    @endsection
</body>