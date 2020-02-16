<!--================================-->
<!-- Page Sidebar Start -->
<!--================================-->
<div class="page-sidebar">
<div class="logo">
    <a class="logo-img" href="index.html">		
    <img class="desktop-logo" src="{{ asset('template/metrical') }}/images/logo-virolin-sidebar.png" alt="">
    <img class="small-logo" src="{{ asset('image/sidebar-virolin.jpg') }}" alt="">
    </a>			
    <i class="ion-ios-close-empty" id="sidebar-toggle-button-close"></i>
</div>
<!--================================-->
<!-- Sidebar Menu Start -->
<!--================================-->
<div class="page-sidebar-inner">
    <div class="page-sidebar-menu">
        <ul class="accordion-menu">
            @can('dashboard-admin')
            <li>
            <a href="{{ url('dashboard') }}"><i data-feather="home"></i>
                <span>Dashboard</span>
            </a>
            </li>
            @endcan
            @can('dashboard-user')
            <li>
            <a href="{{ url('home') }}"><i data-feather="home"></i>
                <span>Dashboard</span>
            </a>
            </li>
            @endcan
            @if(Auth::user()->status == "valid" || Auth::user()->status = "Valid")
            @else
            <li class="open">
            <a href="{{ url('home') }}"><i data-feather="home"></i>
                <span>Dashboard</span>
            </a>
            </li>
            @endif
            @if(empty(Auth::user()->id))
              <!-- Null -->
            @else
                <?php 
                $data = DB::table('users')->where('id', Auth::user()->id)->first();
                ?>
                @if($data->status != "valid")
                <li class="open">
                    <a href="{{ url('home') }}"><i data-feather="home"></i>
                        <span>Dashboard {{ $data->status }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('konfirmasi-pembayaran') }}"><i data-feather="dollar-sign"></i>
                    <span>Konfirmasi Pembayaran</span></a>
                </li>
                @endif
            @endif
            @can('role-list')
            <li>
            <a href="{{ route('roles.index') }}"><i data-feather="key"></i>
            <span>Role Permission</span></a>
            </li>
            @endcan
            @can('users-list')
            <li>
            <a href="{{ route('users.index') }}"><i data-feather="users"></i>
            <span>Manage Customer</span></a>
            </li>
            @endcan
            @can('banks-list')
            <li>
            <a href="{{ route('banks.index') }}"><i data-feather="dollar-sign"></i>
            <span>Manage Bank</span></a>
            </li>
            @endcan
            @can('promos-list')
            <li>
            <a href="{{ route('promos.index') }}"><i data-feather="percent"></i>
            <span>Manage Promo</span></a>
            </li>
            @endcan
            @can('orders-list')
            <li>
            <a href="{{ route('orders.index') }}"><i data-feather="shopping-cart"></i>
            <span>Manage Order</span></a>
            </li>
            @endcan
            @can('payments-list')
            <li>
            <a href="{{ route('payment.index') }}"><i data-feather="send"></i>
            <span>Manage Payment</span><span class="badge badge-success ft-right count_payment">10+</span></a>
            </li>
            @endcan
            @can('products-list')
            <li>
            <a href="{{ route('products.index') }}"><i data-feather="folder"></i>
            <span>Manage Product</span></a>
            </li>
            @endcan
            @can('reports-list')
            <li>
            <a href="{{ route('reports.index') }}"><i data-feather="bar-chart"></i>
            <span>Manage Reports</span></a>
            </li>
            @endcan
            @can('landingpage-list')
            <li>
            <a href="{{ route('campaign.index') }}"><i data-feather="layers"></i>
            <span>Campaign</span></a>
            </li>
            @endcan
            @can('mysubscriber-list')
            <li>
            <a href="{{ route('mysubscribers.index') }}"><i data-feather="users"></i>
            <span>Subscribers</span></a>
            </li>
            @endcan
            @can('report-user')
            <li>
            <a href="{{ url('report') }}"><i data-feather="file"></i>
            <span>Report</span><i class="accordion-icon fa fa-angle-left"></i></a>
            <ul class="sub-menu">
                <li><a href="{{ url('report/shares') }}">Shares</a></li>
                <li><a href="{{ url('report/payment') }}">Payment</a></li>
                <li><a href="{{ url('report/trafik') }}">Trafik</a></li>
            </ul>
            </li>
            @endcan
            
        </ul>
    </div>
</div>
<!--/ Sidebar Menu End -->
<!--================================-->
<!-- Sidebar Footer Start -->
<!--================================-->
<div class="sidebar-footer">									
    <a class="pull-left" href="{{ url('profile') }}" data-toggle="tooltip" data-placement="top" data-original-title="Profile">
    <i data-feather="user" class="ht-15"></i></a>									
    <a class="pull-left " href="{{ url('report/payment') }}" data-toggle="tooltip" data-placement="top" data-original-title="Payment">
    <i data-feather="dollar-sign" class="ht-15"></i></a>
    <a class="pull-left" href="{{ url('promo') }}" data-toggle="tooltip" data-placement="top" data-original-title="Promo">
    <i data-feather="bell" class="ht-15"></i></a>
    <a class="pull-left" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="top" data-original-title="Sign Out">
    <i data-feather="log-out" class="ht-15"></i></a>
</div>
<!--/ Sidebar Footer End -->
</div>
<!--/ Page Sidebar End -->
<script>
$(document).ready(function() {
  
  // Get Jumlah Konfirmasi Pembayaran
  $.ajax({
    type : "GET",
    url  : '/payment/count_payment',
    dataType : "JSON",
    success: function (data) {
      $('.count_payment').html(data);
    }
  });
});
</script>