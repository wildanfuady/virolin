<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
        </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
            </button>
        </div>
        </div>
    </form>

    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="show_promo">
                <!-- Ajax Request -->
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>

        <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
        </li>
        <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fas fa-th-large"></i></a>
        </li>
    </ul>
</nav>

<script type='text/javascript'>
    $(document).ready(function(){
        $.ajax({
            url: 'promo/fetchpromo',
            type: 'get',
            dataType: 'json',
            success: function(response){

                var len = 0;
                $('#show_promo').empty(); // Empty <tbody>
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

                        var generate = "<a href='{{ url('promo/detail/') }}/"+promo_slug+"' class='dropdown-item'>" +
                            "<div class='media'>" +
                                "<img src='../../dist/img/user1-128x128.jpg' alt='User Avatar' class='img-size-50 mr-3 img-circle'>" +
                                "<div class='media-body'>" +
                                    "<h3 class='dropdown-item-title'>" +
                                        promo_title +
                                        "<span class='float-right text-sm text-danger'><i class='fas fa-star'></i></span>" +
                                    "</h3>" +
                                    "<p class='text-sm text-muted'><i class='far fa-clock mr-1'></i> 4 Hours Ago</p>" +
                                "</div>" +
                            "</div>" +
                        "</a>";

                        $("#show_promo").append(generate);
                    }

                } else {
                    var generate = "Belum ada data";

                    $("#show_promo").append(generate);
                }
            }
       });
    });
</script>