<head>
<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('Css/forumhome.css') }}">
</head>

<nav class="navbar navbar-expand-lg mt-3" style="background-color: #910000;">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item px-4">
                    <a class="nav-link active text-white" aria-current="page" href="/forumhome">Forum Home</a>
                </li>

                <li class="nav-item px-4">
                    <a class="nav-link text-white" href="#">Members</a>
                </li>
                <li class="nav-item px-4">
                    <a class="nav-link text-white">About</a>
                </li>
            </ul>
            <a class="btn newPostBtn" href="{{ route('post.create') }}" style="text-decoration: none;"><i class="fa fa-plus" ></i> New Posts</a>
        </div>
    </div>
</nav>