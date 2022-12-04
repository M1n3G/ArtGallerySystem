@extends('master')
@extends('forum/navbarInc')

<!-- Custom CSS -->

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/forumhome.css') }}">
    <title>ArtCells | Manage Forum</title>
    <style>
        th,
        .td,
        .card {
            padding: 20px;
        }
    </style>
</head>

@section('content')
<div class="container px-4 mt-2">
    <div class="row mt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb" style="font-family: 'Poppins', sans-serif;">
                <li class="breadcrumb-item"><a href="/forum" class="text-decoration-none">Forum</a></li>
                <li class="breadcrumb-item"><a href="/forum/manage" class="text-decoration-none">Manage</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Report Violations</li>
            </ol>
        </nav>
        <div class="col-sm-6">
            <a href="/forum/manage/report" class="btn btn-outline-secondary mb-2">Back</a>
        </div>
        <div class="col-sm-6">
            <a href="/forum/manage" class="btn btn-secondary float-end mb-2">Manage Topic</a>
        </div>
    </div>

</div>
</div>

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

    <div class="row justify-content-center mb-4">
        <div class="col-xl-12">
            <div class="card shadow-0 border rounded-3">
                <div class="card-header bg-white">
                    <h5 class="mt-2" style="font-family:'Poppins', sans-serif;">Report Violations Section [SOLVED]</h5>
                </div>

                <div class="card-body">
                    @if (!empty($report) && $report->count())
                    @foreach ($report as $r)
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div class="row">
                                <div class="col-md-9">
                                    <h4 style="font-family:'Poppins', sans-serif;" class="mt-2 fs-semibold">{{ $r->reportType }}</h4>
                                </div>
                                <div class="col-md-3 mt-2 text-end" style="margin-top:50px;">
                                    <span class="fw-bold" style="color:#9d9d9d; font-size:15px;">{{ $r->reportID }}</span>
                                    <br />
                                    @if($r->status == 'SOLVED')
                                    <span class="fw-bold" style="color:#910000; font-size:15px;">{{ $r->status }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="d-flex flex-row ">
                                <div class="text-danger" style="font-family:'Poppins', sans-serif;">
                                    <p style="font-size: 15px">Reported By: {{ $r->username }}</p>
                                </div>
                            </div>
                            <div class="mt-1 mb-0 text-muted" style="font-size:15px">
                                <span>Post ID Reported: {{ $r->postID }}</span><br />
                                <span class="mt-4">Date Reported: {{ date('l, d-m-Y h:i:s a',strtotime($r['datetime'])) }}</span>
                            </div>

                            <h6 class="fw-semibold mt-4" style="font-size: 17px">Report Description:</h6>
                            <p class="mb-4 mb-md-0" style="margin-bottom: 100px;">
                                @if($r->reportBody != null)
                                {{ $r->reportBody }}
                                @else
                                - None -
                                @endif
                            </p>
                        </div>

                        <hr class="mt-4 mb-4" />
                    </div>
                    @endforeach
                    @else
                    <div class="alert alert-primary alert-dismissible fade show form-control" role="alert">
                        <div class="text-left">
                            We have no receive any report violations.
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </div>


                Showing {{ $report->firstItem() }} to {{ $report->lastItem() }} of total {{$report->total()}} entries

                <!-- PAGINATION -->
                <nav aria-label="pageNavigation">
                    <ul class="pagination justify-content-end">
                        {!! $report->appends(Request::all())->links() !!}
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</div>

@endsection