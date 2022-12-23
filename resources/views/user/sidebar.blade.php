<div class="profile-sidebar mt-3">

    <!-- Profile Image -->
    <div class="profile-userpic text-center">
        @if(empty($users->userImg))
        <img src="{{ asset('/storage/Img/user-default.png')}}" width="300" height="300" class="img-responsive" alt="">
        @else
        <img src="{{ $users->userImg }}" width="300" height="300" class="img-responsive" alt="">
        @endif
    </div>

    <!-- Name -->
    <div class="profile-usertitle">
        <div class="profile-usertitle-name">
            {{ Session::get('username') }}
        </div>
        <div class="profile-usertitle-job">

            @if (Session::get('userRole') == 'User')
            <span class="badge text-bg-primary mt-1" style="width:75px; height:20px;">
                <div style="font-size: 12px">
                    {{ Session::get('userRole') }}
                </div>
            </span>
            @endif

            @if (Session::get('userRole') == 'Artist')
            <span class="badge text-bg-success mt-1" style="width:75px; height:20px;">
                <div style="font-size: 12px">
                    {{ Session::get('userRole') }}
                </div>
            </span>
            @endif

            @if (Session::get('userRole') == 'Moderator')
            <span class="badge text-bg-dark mt-1" style="width:100px; height:20px;">
                <div style="font-size: 12px">
                    {{ Session::get('userRole') }}
                </div>
            </span>
            @endif

        </div>
    </div>

    <!-- Buttons -->
    <!-- <div class="profile-userbuttons text-center">
                    <button type="button" class="btn btn-success btn-sm">Follow</button>
                </div> -->

    <hr class="mt-4" style="width:90%; margin-left:5% !important; margin-right:5% !important;" />

    <!-- SIDEBAR MENU -->
    <div class="profile-usermenu">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class="nav-link" id="v-pills-purchase-tab">
                <a class="text-decoration-none" href="{{ route('profile.show') }}">Profile</a>
            </button>
            <button class="nav-link" id="v-pills-purchase-tab">
                <a class="text-decoration-none" href="{{ route('password.show') }}">Change Password</a>
            </button>
            <button class="nav-link" id="v-pills-purchase-tab">
                <a class="text-decoration-none" href="{{ route('address.show') }}">Address</a>
            </button>
            <button class="nav-link" id="v-pills-purchase-tab">
                <a class="text-decoration-none" href="{{ route('payment.index') }}">My Purchase</a>
            </button>
            <button class="nav-link" id="v-pills-purchase-tab">
                <a class="text-decoration-none" href="{{ route('auctionView') }}">Auction</a>
            </button>
            <button class="nav-link" id="v-pills-purchase-tab">
                <a class="text-decoration-none" href="{{ route('forumprofile.show') }}">Forum Profile</a>
            </button>

            @if (Session::get('userRole') == 'Artist')
            <button class="nav-link" id="v-pills-purchase-tab">
                <a class="text-decoration-none" href="{{ route('artworklist') }}">Artwork Management</a>
            </button>
            @endif

            @if (Session::get('userRole') != 'Artist')
            <button class="nav-link" id="v-pills-purchase-tab">
                <a class="text-decoration-none" href="{{ route('account.upgrade') }}">Upgrade as Artist</a>
            </button>
            @endif
            <button class="nav-link" id="v-pills-settings-tab">
                <a class="text-decoration-none" href="{{ route('logout.logout') }}">Logout</a>
            </button>
        </div>
    </div>

    <!-- Stat -->
    <div class="portlet light bordered">
        @if (Session::get('userRole') == 'Artist')
        <div class="row list-separated profile-stat">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="uppercase profile-stat-title"> 37 </div>
                <div class="uppercase profile-stat-text text-center fw-bold"> Artwork </div>

            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="uppercase profile-stat-title"> 51 </div>
                <div class="uppercase profile-stat-text text-center fw-bold"> Orders </div>
            </div>
        </div>
        @endif

        <div>
            <h4 class="profile-desc-title">About {{ $users->name }} </h4>
            <span class="profile-desc-text">
                @if(empty($users->about))
                <span>Not specified</span>
                @else
                {{ $users->about }}
                @endif

            </span>
        </div>
    </div>
</div>