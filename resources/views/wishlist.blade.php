@extends('master')
@section('content')

<div class="container my-5">
    <div class="row">
        <!-- Column for card-->
        @if($wishlist->count() > 0)
        
        @else
        <div class="alert alert-primary alert-dismissible fade show form-control" role="alert">
            <div class="text-left">
                There are no art in your wishlist.
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
</div>
@endsection