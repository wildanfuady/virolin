<!--================================-->
<!-- Page Content Start -->
<!--================================-->
<div class="page-content" style="background:#f7f7fe">
<!--================================-->
<!-- Page Header Start -->
<!--================================-->
<div class="page-header" style="background: orange; color: white">
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
            <li class="list-inline-item align-text-top"><a class="hidden-md hidden-lg" href="#" id="sidebar-toggle-button"><i class="ion-navicon tx-20"style="color: white;"></i></a> </li>
            <!-- PC Toggle and Logo -->
            <li class="list-inline-item align-text-top"><a class="hidden-xs hidden-sm" href="#" id="collapsed-sidebar-toggle-button"><i class="ion-navicon tx-20" style="color: white;"></i></a><span class="text_mobile" style="font-size: 15pt; font-weight: bold">Virolin</span></li>
        </ul>
        <!--================================-->
        <!-- Mega Menu Start -->
        <!--================================-->
        <div class="collapse navbar-collapse">
        @if(Auth::user()->level == "user" && Auth::user()->status == "valid" || Auth::user()->status == "Valid")
            <ul class="navbar-nav mr-auto">
                <li class="mg-t-5">
                    <a class="btn btn-primary mg-r-10" href="{{ route('campaign.index') }}"><i data-feather="layers"></i> Campaign</a>
                </li>
                <li class="mg-t-5">
                    <a class="btn btn-success mg-r-10" href="{{ route('campaign.create') }}"><i data-feather="plus-circle"></i> Create Campaign</a>
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
            @if(Auth::user()->level == "user" && Auth::user()->status == "valid" || Auth::user()->status == "Valid")
            <!-- <li class="list-inline-item align-middle"><a  href="#" id="search-button"><i class="ion-ios-search-strong tx-20"></i></a></li> -->
            <!-- Notifications Dropdown Start -->
            <!--================================-->
            <li class="list-inline-item dropdown hidden-xs">
                <a class="notification-icon" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-bell tx-16" style="color: white;"></i>
                <span class="notification-count wave in"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow-2">
                    <!-- Top Notifications Area -->
                    <div class="top-notifications-area">
                        <!-- Heading -->
                        <div class="notifications-heading">
                        <div class="heading-title">
                            <h6>Notifications</h6>
                        </div>
                        <span>{{ \App\Promo::totalPromo() }} promo</span>
                        </div>
                        <div class="notifications-box" id="notificationsBox">

                        <!-- Ajax Generate  -->

                        </div>
                        <div class="notifications-footer">
                        <a href="{{ url('promo') }}">View all Notifications</a>
                        </div>
                    </div>
                </div>
            </li>
            <!--/ Notifications Dropdown End -->
            <!--================================-->
            @endif
            <!-- Profile Dropdown Start -->
            <!--================================-->
            <li class="list-inline-item dropdown">
                <a  href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="select-profile" style="color: white;">Hi, @if(!empty(Auth::user()->name)) {{ Auth::user()->name }} @else {{ "Not Found" }} @endif</span><img src="{{ asset('template/metrical') }}/images/avatar-placeholder.png" class="img-fluid wd-35 ht-35 rounded-circle" alt=""></a>
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
<script type='text/javascript'>
    $(document).ready(function(){
        $.ajax({
            url: '{{ url('promo/fetchpromo') }}',
            type: 'get',
            dataType: 'json',
            success: function(response){

                var len = 0;
                $('#notificationsBox').empty(); // Empty <tbody>
                if(response['data'] != null){
                    len = response['data'].length;
                }

                if(len > 0){

                    for(var i=0; i<len; i++){
                        var promo_id        = response['data'][i].promo_id;
                        var promo_title     = response['data'][i].promo_title;
                        var promo_slug      = response['data'][i].promo_slug;
                        var promo_start     = response['data'][i].promo_start;
                        var promo_end       = response['data'][i].promo_end;
                        var promo_content   = response['data'][i].promo_content;
                        ;
                        var generate = "<a class='dropdown-item list-group-item' href='{{ url('promo/detail/') }}/"+promo_id+"'>"+
                            "<div class='d-flex justify-content-between'>" +
                                "<div class='wd-45 ht-38 mg-r-15 d-flex align-items-center justify-content-center rounded-circle card-icon-success'>"+
                                    "<i class='fa fa-check tx-success tx-16'></i>" +
                                "</div>" +
                                "<div>" +
                                    "<span>" + promo_title + "</span>" +
                                    "<div class='tx-gray-600 tx-11'>Klik untuk melihat detail promo ...</div>" +
                                "</div>" +
                            "</div>" +
                        "</a>";

                        $("#notificationsBox").append(generate);
                    }

                } else {
                    var generate = "<div class='text-center pd-l-10 pd-t-10'>Belum ada promo</div>";

                    $("#notificationsBox").append(generate);
                }
            }
       });
    });
</script>