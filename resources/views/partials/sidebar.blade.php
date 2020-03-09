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
            @can('payment-list')
            <li>
            <a href="{{ route('payment.index') }}"><i data-feather="send"></i>
            <span>Konfirmasi Pembayaran</span><span class="badge badge-success ft-right count_payment">10+</span></a>
            </li>
            @endcan
            @can('bank-list')
            <li>
            <a href="{{ route('banks.index') }}"><i data-feather="dollar-sign"></i>
            <span>Manajemen Bank</span></a>
            </li>
            @endcan
            @can('order-list')
            <li>
            <a href="{{ route('orders.index') }}"><i data-feather="shopping-cart"></i>
            <span>Manajemen Order</span></a>
            </li>
            @endcan
            @can('product-list')
            <li>
            <a href="{{ route('products.index') }}"><i data-feather="folder"></i>
            <span>Manajemen Produk</span></a>
            </li>
            @endcan
            @can('promo-list')
            <li>
            <a href="{{ route('promos.index') }}"><i data-feather="percent"></i>
            <span>Manajemen Promo</span></a>
            </li>
            @endcan
            @can('user-list')
            <li>
            <a href="{{ route('users.index') }}"><i data-feather="users"></i>
            <span>Manajemen User</span></a>
            </li>
            @endcan
            @can('role-list')
            <li>
            <a href="{{ route('roles.index') }}"><i data-feather="key"></i>
            <span>Role Permission</span></a>
            </li>
            @endcan
            @can('report-list')
            <li>
            <a href="{{ url('report/admin') }}"><i data-feather="bar-chart"></i>
            <span>Manajemen Laporan</span></a>
            </li>
            @endcan
            @can('campaign-list')
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
            <span>Report</span>
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
    <a class="pull-left " href="{{ url('profile#order') }}" data-toggle="tooltip" data-placement="top" data-original-title="Order">
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