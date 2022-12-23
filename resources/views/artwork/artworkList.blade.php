@extends('master')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
    integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/profile.css') }}">
</head>



<div class="container ">
    @if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
        <div class="text-center">
            {{ \Session::get('success') }}
            {{ \Session::forget('success') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (\Session::has('msg'))
    <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
        <div class="text-center">
            {{ \Session::get('msg') }}
            {{ \Session::forget('msg') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row profile">
        <div class="col-md-3">
            @include('user.sidebar')
        </div>

        <div class="col-md-9">
            <div class="profile-content mt-3 px-4">
                <div class="card">
                    <div class="card-body px-4">

                        <div class="artwork">
                            <div class="profileheader">
                                <p class="titlespan1 mt-3 fw-semibold">My Artwork
                                    <a id="add" class="btn btn-primary text-capitalize float-end px-3"
                                        data-bs-toggle="modal" data-bs-target="#modal-show" data-bs-whatever="@mdo">Add
                                        Artwork</a>
                                </p>
                                <hr />
                            </div>

                            <table class="table manage-candidates-top mb-0">
                                <thead>
                                    <tr>
                                        <th>Artwork</th>
                                        <th class="text-center">Status</th>
                                        <th class="action text-right" style='text-align:right;'>Action</th>
                                    </tr>
                                </thead>
                                @if (!empty($artwork) && $artwork->count())
                                @foreach($artwork as $row)
                                <tbody>
                                    <tr class="candidates-list">
                                        <td class="title">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <div class="thumb">
                                                        <img class="img-fluid" src="{{ asset($row->artImg)}}" width=150
                                                            height=200 style="max-width: 150px; max-height: 200px;"
                                                            alt="">
                                                    </div>
                                                </div>

                                                <div class="col-md-8 candidate-list-details">
                                                    <div class="candidate-list-info">
                                                        <div class="candidate-list-title">
                                                            <h4 class="mb-0 fw-bold"
                                                                style="font-size:27px; color: #0d6efd">{{$row->artName}}
                                                            </h4>
                                                        </div>
                                                        <div class="details">
                                                            <!-- Category -->
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="fw-semibold"
                                                                        style="color:#9d9d9d; font-size:16px;">
                                                                        {{$row->name}}
                                                                    </div>
                                                                    <div class="fw-semibold"
                                                                        style="color:#9d9d9d; font-size:13px;">
                                                                        {{$row->artYear}}
                                                                    </div>
                                                                </div>


                                                                <div class="mt-2">
                                                                    <i class="fa fa-user" aria-hidden="true"></i>&nbsp
                                                                    Author:
                                                                    <p class="fw-semibold">{{$row->artistName}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                        </div>
                        </td>
                        <td class="candidate-list-favourite-time text-center">
                            @if($row->artStatus == 'AVAILABLE')
                            <span class="badge text-bg-success">{{$row->artStatus}}</span>
                            @else
                            <span class="badge text-bg-danger">{{$row->artStatus}}</span>
                            @endif
                        </td>
                        <td>
                            <ul class="list-unstyled mb-0 d-flex justify-content-end">

                                <li><a href="{{route('artwork.edit',$row->artID) }}" class="btn btn-dark  px-2"
                                        style="padding: 6px 8px; height:35px; max-height:35px;">
                                        <i class="bi bi-pencil-square"></i></a>&nbsp&nbsp&nbsp
                                </li>
                                <form action="{{ route('artwork.delete',$row->artID) }}" method="POST"
                                    onsubmit="return confirm('Delete This Artwork?');">
                                    @csrf
                                    @method('DELETE')
                                    <li><button type="submit" class="btn btn-danger px-2"
                                            style="height:35px; max-height:35px;"><i
                                                class="far fa-trash-alt"></i></button>
                                        </a>
                                    </li>
                                </form>
                            </ul>
                        </td>
                        </tr>
                        </tbody>

                        @endforeach
                        @else
                        <div class="alert alert-primary alert-dismissible fade show form-control" role="alert">
                            <div class="text-left">
                                You did not have any artwork yet
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        </table>
                        <br />

                        <!-- PAGINATION -->
                        <nav aria-label="pageNavigation">
                            <ul class="pagination justify-content-end">
                                {!! $artwork->appends(Request::all())->links() !!}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<script type="text/javascript">
document.getElementById("add").onclick = function() {
    location.href = "{{route('addArtwork')}}";
};
</script>


<style>
body {
    background-color: #f8f9fa !important
}

.p-4 {
    padding: 1.5rem !important;
}

.mb-0,
.my-0 {
    margin-bottom: 0 !important;
}

.shadow-sm {
    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
}


/* user-dashboard-info-box */
.user-dashboard-info-box .candidates-list .thumb {
    margin-right: 20px;
}

.user-dashboard-info-box .candidates-list .thumb img {
    width: 80px;
    height: 80px;
    -o-object-fit: cover;
    object-fit: cover;
    overflow: hidden;
    border-radius: 50%;
}

.user-dashboard-info-box .title {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    padding: 30px 0;
}

.user-dashboard-info-box .candidates-list td {
    vertical-align: middle;
}

.user-dashboard-info-box td li {
    margin: 0 4px;
}

.user-dashboard-info-box .table thead th {
    border-bottom: none;
}

.table.manage-candidates-top th {
    border: 0;
}

.user-dashboard-info-box .candidate-list-favourite-time .candidate-list-favourite {
    margin-bottom: 10px;
}

.table.manage-candidates-top {
    min-width: 650px;
}

.user-dashboard-info-box .candidate-list-details ul {
    color: #969696;
}

/* Candidate List */
.candidate-list {
    background: #ffffff;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    border-bottom: 1px solid #eeeeee;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    padding: 20px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.candidate-list:hover {
    -webkit-box-shadow: 0px 0px 34px 4px rgba(33, 37, 41, 0.06);
    box-shadow: 0px 0px 34px 4px rgba(33, 37, 41, 0.06);
    position: relative;
    z-index: 99;
}

.candidate-list:hover a.candidate-list-favourite {
    color: #e74c3c;
    -webkit-box-shadow: -1px 4px 10px 1px rgba(24, 111, 201, 0.1);
    box-shadow: -1px 4px 10px 1px rgba(24, 111, 201, 0.1);
}

.candidate-list .candidate-list-image {
    margin-right: 25px;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 80px;
    flex: 0 0 80px;
    border: none;
}

.candidate-list .candidate-list-image img {
    width: 80px;
    height: 80px;
    -o-object-fit: cover;
    object-fit: cover;
}

.candidate-list-title {
    margin-bottom: 5px;
}

.candidate-list-details ul {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-bottom: 0px;
}

.candidate-list-details ul li {
    margin: 5px 10px 5px 0px;
    font-size: 13px;
}

.candidate-list .candidate-list-favourite-time {
    margin-left: auto;
    text-align: center;
    font-size: 13px;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 90px;
    flex: 0 0 90px;
}

.candidate-list .candidate-list-favourite-time span {
    display: block;
    margin: 0 auto;
}

.candidate-list .candidate-list-favourite-time .candidate-list-favourite {
    display: inline-block;
    position: relative;
    height: 40px;
    width: 40px;
    line-height: 40px;
    border: 1px solid #eeeeee;
    border-radius: 100%;
    text-align: center;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
    margin-bottom: 20px;
    font-size: 16px;
    color: #646f79;
}

.candidate-list .candidate-list-favourite-time .candidate-list-favourite:hover {
    background: #ffffff;
    color: #e74c3c;
}

.candidate-banner .candidate-list:hover {
    position: inherit;
    -webkit-box-shadow: inherit;
    box-shadow: inherit;
    z-index: inherit;
}

.bg-white {
    background-color: #ffffff !important;
}

.p-4 {
    padding: 1.5rem !important;
}

.mb-0,
.my-0 {
    margin-bottom: 0 !important;
}

.shadow-sm {
    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
}

.user-dashboard-info-box .candidates-list .thumb {
    margin-right: 20px;
}
</style>

@endsection