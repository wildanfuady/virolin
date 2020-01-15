<!--================================-->
<!-- Page Content Start -->
<!--================================-->
<div class="page-content">
<!--================================-->
<!-- Page Header Start -->
<!--================================-->
<div class="page-header">
    <div class="search-form">
        <form action="#" method="GET">
            <div class="input-group">
            <input class="form-control search-input" name="search" placeholder="Type something..." type="text"/>
            <span class="input-group-btn">
            <span id="close-search"><i class="ion-ios-close-empty"></i></span>
            </span>
            </div>
        </form>
    </div>
    <!--================================-->
    <!-- Page Header  Start -->
    <!--================================-->
    <nav class="navbar navbar-expand-lg">
        <ul class="list-inline list-unstyled mg-r-20">
            <!-- Mobile Toggle and Logo -->
            <li class="list-inline-item align-text-top"><a class="hidden-md hidden-lg" href="#" id="sidebar-toggle-button"><i class="ion-navicon tx-20"></i></a></li>
            <!-- PC Toggle and Logo -->
            <li class="list-inline-item align-text-top"><a class="hidden-xs hidden-sm" href="#" id="collapsed-sidebar-toggle-button"><i class="ion-navicon tx-20"></i></a></li>
        </ul>
        <!--================================-->
        <!-- Mega Menu Start -->
        <!--================================-->
        <div class="collapse navbar-collapse">
        @if(Auth::user()->level == "user" && Auth::user()->status == "valid" || Auth::user()->status == "Valid")
            <ul class="navbar-nav mr-auto">
                <li class="mg-t-5">
                    <a class="btn btn-primary mg-r-10" href="{{ route('landingpages.index') }}"><i data-feather="layers"></i> Campaign</a>
                </li>
                <li class="mg-t-5">
                    <a class="btn btn-success mg-r-10" href="{{ route('landingpages.create') }}"><i data-feather="plus-circle"></i> Create Campaign</a>
                </li>
                <li class="mg-t-5">
                    <a class="btn btn-warning mg-r-10" href="{{ url('tutorial') }}"><i data-feather="book-open"></i> Tutorial</a>
                </li>
            </ul>
            @else 
            @endif
        </div>
        <!--/ Mega Menu End-->
        
        <!--/ Brand and Logo End -->
        <!--================================-->
        <!-- Header Right Start -->
        <!--================================-->
        <div class="header-right pull-right">
            <ul class="list-inline justify-content-end">
            <!-- <li class="list-inline-item align-middle"><a  href="#" id="search-button"><i class="ion-ios-search-strong tx-20"></i></a></li> -->
            <!-- Profile Dropdown Start -->
            <!--================================-->
            <li class="list-inline-item dropdown">
                <a  href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="select-profile">Hi, @if(!empty(Auth::user()->name)) {{ Auth::user()->name }} @else {{ "Not Found" }} @endif!</span><img src="{{ asset('template/metrical') }}/images/avatar-placeholder.png"" class="img-fluid wd-35 ht-35 rounded-circle" alt=""></a>
                <div class="dropdown-menu dropdown-menu-right dropdown-profile shadow-2">
                    <div class="user-profile-area">
                        <div class="user-profile-heading">
                        <div class="profile-thumbnail">
                            <img src="https://via.placeholder.com/100x100" class="img-fluid wd-35 ht-35 rounded-circle" alt="">
                        </div>
                        <div class="profile-text">
                            <h6>@if(!empty(Auth::user()->name)) {{ Auth::user()->name }} @else {{ "Not Found" }} @endif</h6>
                            <span>{{ Auth::user()->email }}</span>
                        </div>
                        </div>
                        <a href="{{ url('profile') }}" class="dropdown-item"><i class="icon-user" aria-hidden="true"></i> My Profile</a>

                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-power" aria-hidden="true"></i> Sign-out</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
            <!-- Profile Dropdown End -->
            <!--================================-->
            </ul>
        </div>
        <!--/ Header Right End -->
    </nav>
</div>
<!--/ Page Header End -->