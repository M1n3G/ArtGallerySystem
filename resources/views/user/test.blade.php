@extends('master')
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12 col-lg-4 mb-4" style="margin-bottom:45px;">
            <div class="card">
                <img src="{{ asset('Img/Artwork/art1.jpg') }}" class="card-img-top" width=250 height=400 />
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p class="medium"><a href="#" class="text-muted">Category</a></p>
                        <p class="small text-danger"><s></s></p>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <h5 class="mb-0 fs-3">Art name</h5>
                        <h5 class="text-dark mb-0">
                            <div class="col">
                                <span class="text-uppercase fs-6" style="color:#6c757d">
                                    Start from</span>
                            </div>
                            <div class="col mt-2">MYR 300</div>
                        </h5>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <p class="text-muted mb-0">Available<span class="fw-bold"></span></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection