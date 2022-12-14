<head>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('Css/forumhome.css') }}">
    <title>ArtCells | Forum</title>
    <link rel="icon" href="{{ asset('Img/artcellslogo.png') }}" type="image/png">
</head>

<nav class="navbar navbar-expand-lg mt-3" style="background-color: #910000;">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item px-4">
                    <a class="nav-link text-white" href="/forum">Forum</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="{{route ('category.view')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Topic
                    </a>
                    <ul class="dropdown-menu">           
                        @php
                        $category = App\Models\Forumcategories::where(['status'=>'Visible'])->get();
                        @endphp

                        @foreach($category as $catitem)
                        <li>
                            <a class="dropdown-item" href="{{ route('category.post', $catitem->id) }}">{{ $catitem->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>

                @if (Session::get('userRole') == 'Moderator')
                <li class="nav-item px-4">
                    <a class="nav-link text-white" href="/forum/manage">Manage</a>
                </li>
                @endif
            </ul>

            <a class="btn newPostBtn text-capitalize" href="{{ route('post.create') }}" style="text-decoration: none;"><i class="fa fa-plus"></i> New Posts</a>
        </div>
    </div>
</nav>