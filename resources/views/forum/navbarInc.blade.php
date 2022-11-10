<head>
<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('Css/forumhome.css') }}">
</head>

<nav class="navbar navbar-expand-lg mt-3" style="background-color: #910000;">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Forum
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/forum">Home</a></li>
                        @php
                        $category = App\Models\Forumcategories::where(['navstatus'=>'Visible','status'=>'Visible'])->get();
                        @endphp

                        @foreach($category as $catitem)
                        <li>
                            <a class="dropdown-item" href="{{ route('category.post', $catitem->id) }}">{{ $catitem->name}}</a>
                        </li>
                        @endforeach
                    </ul>

                </li>

                <li class="nav-item px-4">
                    <a class="nav-link text-white" href="#">Members</a>
                </li>
                <li class="nav-item px-4">
                    <a class="nav-link text-white">About</a>
                </li>

                <li class="nav-item px-4">
                    <a class="nav-link text-white" href="/manage">Manage</a>
                </li>
            </ul>

            <a class="btn newPostBtn text-capitalize" href="{{ route('post.create') }}" style="text-decoration: none;"><i class="fa fa-plus"></i> New Posts</a>
        </div>
    </div>
</nav>