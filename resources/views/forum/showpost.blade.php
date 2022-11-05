@extends('master')
@extends('forum/navbarInc')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4 mb-4">
                <div class="card-body">
                    <p>{{ $post->title }}</p>
                    <p>
                        {{ $post->body }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection