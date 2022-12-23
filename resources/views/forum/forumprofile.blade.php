@extends('master')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/profile.css') }}">
</head>

<div class="container">
    @if (count($errors) > 0)
    <div class="container mt-4">
        <div class="alert alert-danger alert-dismissible fade show form-control" role="alert">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <div class="container mt-4">
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
            <div class="text-left">
                {{ Session::get('success') }}
                {{ Session::forget('success') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (\Session::has('fail'))
        <div class="alert alert-danger alert-dismissible fade show form-control" role="alert">
            <div class="text-left">
                {{ Session::get('fail') }}
                {{ Session::forget('fail') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        
        @if (\Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show form-control" role="alert">
            <div class="text-left">
                {{ Session::get('message') }}
                {{ Session::forget('message') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        
    </div>

    <div class="row profile">
        <div class="col-md-3">
            @include('user.sidebar')
        </div>

        <div class="col-md-9">
            <div class="profile-content mt-3 px-4">
                <div class="card">

                    <div class="card-body px-4">

                        <!-- PROFILE -->
                        <div class="profile">
                            <div class="profileheader">
                                <div class="row">
                                    <div class="col">
                                        <p class="titlespan1 fw-semibold">Forum Profile</p>
                                    </div>

                                    <div class="col text-end">
                                        @if (Session::get('userRole') == 'User' || 'Artist' || 'Moderator' )
                                        <span class="badge text-bg-success" style="width:125px; height:22px;">
                                            <div style="font-size: 12px" class="text-uppercase">
                                                FORUM MEMBER
                                            </div>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <p class="titlespan2">Manage your forum profile</p>

                            </div>
                            <nav>
                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">Profile</button>
                                    <button class="nav-link" id="nav-subscriptions-tab" data-bs-toggle="tab" data-bs-target="#nav-subscriptions" type="button" role="tab" aria-controls="nav-subscriptions" aria-selected="false">Subscriptions</button>
                                    <button class="nav-link" id="nav-bookmarks-tab" data-bs-toggle="tab" data-bs-target="#nav-bookmarks" type="button" role="tab" aria-controls="nav-bookmarks" aria-selected="false">Bookmarks</button>
                                    <button class="nav-link" id="nav-post-tab" data-bs-toggle="tab" data-bs-target="#nav-post" type="button" role="tab" aria-controls="nav-post" aria-selected="false">Posts</button>
                                    <button class="nav-link" id="nav-report-tab" data-bs-toggle="tab" data-bs-target="#nav-report" type="button" role="tab" aria-controls="nav-report" aria-selected="false">My Report</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                                    <!-- Username -->
                                    <div class="mb-3 row">
                                        <label for="username" class="col-sm-2 col-form-label mt-3">Username</label>
                                        <div class="col-sm-10">
                                            <div readonly class="form-control-plaintext mt-3"> {{ Session::get('username') }}</div>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3 row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <div readonly class="form-control-plaintext">{{ $users->email }}</div>
                                        </div>
                                    </div>

                                    <!-- Posts-->
                                    <div class="mb-3 row">
                                        <label for="contact" class="col-sm-2 col-form-label">Posts</label>
                                        <div class="col-sm-10">
                                            <div readonly class="form-control-plaintext"></div>
                                        </div>
                                    </div>

                                    <!-- Gender -->
                                    <div class="mb-3 row">
                                        <label for="Gender" class="col-sm-2 col-form-label">Gender</label>
                                        <div class="col-sm-10">
                                            <div readonly class="form-control-plaintext">
                                                @if(empty($users->gender))
                                                <span>Not specified</span>
                                                @else
                                                {{ $users->gender }}
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Joined -->
                                    <div class="mb-3 row">
                                        <label for="contact" class="col-sm-2 col-form-label"> Joined</label>
                                        <div class="col-sm-10">
                                            <div readonly class="form-control-plaintext">{{ date('l, d-m-Y h:i:s a',strtotime($users['datetime'])) }}</div>
                                        </div>
                                    </div>

                                    <!-- About -->
                                    <div class="mb-3 row">
                                        <label for="about" class="col-sm-2 col-form-label">About you</label>
                                        <div class="col-sm-10 text-left">
                                            <textarea name="about" rows="5" cols="30" class="form-control mt-2" readonly> {{$users->about}}</textarea>
                                        </div>
                                    </div>

                                    <hr class="mt-4 mb-4" />

                                    <div class="col d-grid gap-2 d-md-flex justify-content-md-end">
                                        <a class="btn btn-dark text-capitalize" href="{{route('profile.edit',$users->userID) }}" style="width:125px;">Edit</a>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="nav-subscriptions" role="tabpanel" aria-labelledby="nav-subscriptions-tab" tabindex="0">
                                    <ol class="list-group list-group-numbered">
                                        @if (!empty($subscribecat) && count($subscribecat))
                                        @foreach($subscribecat as $s)
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold">{{ $s->name }}</div>
                                                {!! $s->description !!}
                                            </div>

                                            <a href="{{ route('category.post',$s->id) }}" class="btn btn-primary px-2">View</a>
                                        </li>
                                        @endforeach
                                        @else
                                        <div class="alert alert-primary alert-dismissible fade show form-control" role="alert">
                                            <div class="text-left">
                                                You does not subscribe any topic.
                                                <a href="{{route('category.view')}}">&nbsp Forum</a>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
                                        <!-- PAGINATION -->
                                        <nav aria-label="pageNavigation">
                                            <ul class="pagination justify-content-end mt-4">
                                                {!! $subscribecat->appends(Request::all())->links() !!}
                                            </ul>
                                        </nav>
                                    </ol>
                                </div>
                                <div class="tab-pane fade" id="nav-bookmarks" role="tabpanel" aria-labelledby="nav-bookmarks-tab" tabindex="0">
                                    <ol class="list-group list-group-numbered">
                                        @if (!empty($bookpost) && count($bookpost))
                                        @foreach($bookpost as $b)
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold">{{ $b->title }}</div>
                                                {!! $b->body !!}
                                            </div>
                                            <div class="text-end">
                                            <form action="{{ route('post.view') }}" method="POST">
                                                @csrf
                                                <a href="">
                                                    <button type="submit" class="btn btn-primary text-decoration-none">
                                                        View
                                                        <input type="hidden" name="postID" value="{{$b->id}}">
                                                        <input type="hidden" name="category_id" value="{{$b->category_id}}">
                                                        <input type="hidden" name="title" value="{{$b->title}}">
                                                    </button>
                                                </a>
                                            </form>

                                            @foreach($bookmarks as $bo) @endforeach
                                            
                                                <form action="{{ route('bookmark.delete',$bo->bookmarkID) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this bookmarks?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger mt-2 px-2" style="height:35px; max-height:35px;"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </div>
                                        </li>

                                        @endforeach
                                        @else
                                        <div class="alert alert-primary alert-dismissible fade show form-control" role="alert">
                                            <div class="text-left">
                                                You does not have any post in your bookmark.
                                                <a href="{{route('category.view')}}">&nbsp Forum</a>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
                                        <!-- PAGINATION -->
                                        <nav aria-label="pageNavigation">
                                            <ul class="pagination justify-content-end mt-4">
                                                {!! $bookpost->appends(Request::all())->links() !!}
                                            </ul>
                                        </nav>
                                    </ol>

                                </div>
                                <div class="tab-pane fade" id="nav-post" role="tabpanel" aria-labelledby="nav-post-tab" tabindex="0">
                                    <ol class="list-group list-group-numbered">
                                        @if (!empty($posts) && count($posts))
                                        @foreach($posts as $p)
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold">{{ $p->title }}</div>
                                                {!! $p->body !!}
                                            </div>
                                            <form action="{{ route('post.view') }}" method="POST">
                                                @csrf
                                                <a href="">
                                                    <button type="submit" class="btn btn-primary text-decoration-none">
                                                        View
                                                        <input type="hidden" name="postID" value="{{$p->id}}">
                                                        <input type="hidden" name="category_id" value="{{$p->category_id}}">
                                                        <input type="hidden" name="title" value="{{$p->title}}">
                                                    </button>
                                                </a>
                                            </form>
                                        </li>
                                        @endforeach
                                        @else
                                        <div class="alert alert-primary alert-dismissible fade show form-control" role="alert">
                                            <div class="text-left">
                                                You does not have post.
                                                <a href="{{route('category.view')}}">&nbsp Forum</a>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
                                        <!-- PAGINATION -->
                                        <nav aria-label="pageNavigation">
                                            <ul class="pagination justify-content-end mt-4">
                                                {!! $posts->appends(Request::all())->links() !!}
                                            </ul>
                                        </nav>
                                    </ol>
                                </div>

                                <!-- My Report -->
                                <div class="tab-pane fade" id="nav-report" role="tabpanel" aria-labelledby="nav-report-tab" tabindex="0">
                                    <ol class="list-group list-group-numbered">
                                        @if (!empty($report) && count($report))
                                        @foreach($report as $r)
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <div class="fw-bold">{{ $r->reportType }}
                                                    <div class="col-md-12 fw-bold mt-2"> @if($r->status == 'SOLVED')
                                                        <span class="fw-bold" style="color:#910000; font-size:15px;">{{ $r->status }}</span>
                                                        @else
                                                        <span class="fw-bold" style="color:#910000; font-size:15px;">NOT SOLVE</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="mt-2 fw-normal"> @if($r->reportBody != null)
                                                    {{ $r->reportBody }}
                                                    @else
                                                    - No description -
                                                    @endif
                                                </div>
                                                <div class="mt-4 fw-normal">{{ date('l, d-m-Y h:i:s a',strtotime($r['datetime'])) }}</div>

                                            </div>
                                        </li>
                                        @endforeach
                                        @else
                                        <div class="alert alert-primary alert-dismissible fade show form-control" role="alert">
                                            <div class="text-left">
                                                You does not report any post in forum.
                                                <a href="{{route('category.view')}}">&nbsp Forum</a>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif

                                    </ol>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection