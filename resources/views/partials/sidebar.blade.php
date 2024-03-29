<div class="page-sidebar">
    <div class="logo">
        <a class="logo-img" href="{{ url('/') }}">		
        <img class="desktop-logo" src="{{ asset('template/metrical') }}/images/logo-virolin-sidebar.png" alt="">
        <img class="small-logo" src="{{ asset('image/sidebar-virolin.jpg') }}" alt="">
        </a>			
        <i class="ion-ios-close-empty" id="sidebar-toggle-button-close"></i>
    </div>
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
                @can('dashboard-user-aktif')
                <li>
                <a href="{{ url('homepage') }}"><i data-feather="home"></i>
                    <span>Dashboard</span>
                </a>
                </li>
                @endcan
                @can('dashboard-user-baru')
                <li>
                <a href="{{ url('beranda') }}"><i data-feather="home"></i>
                    <span>Dashboard</span>
                </a>
                </li>
                @endcan
                @can('dashboard-user-expired')
                <li>
                <a href="{{ url('homestay') }}"><i data-feather="home"></i>
                    <span>Dashboard</span>
                </a>
                </li>
                @endcan
                @can('renewal-user')
                <li>
                <a href="{{ url('renewal') }}"><i data-feather="dollar-sign"></i>
                    <span>Renewal</span>
                </a>
                </li>
                @endcan
                @can('new_user-payment-detail')
                <li>
                    <a href="{{ url('payment/detail/'.Auth::user()->id) }}"><i data-feather="shopping-cart"></i>
                    <span>Invoice</span></a>
                </li>
                @endcan
                @can('new_user-payment-confirmation')
                <li>
                    <a href="{{ url('konfirmasi-pembayaran') }}"><i data-feather="dollar-sign"></i>
                    <span>Konfirmasi Pembayaran</span></a>
                </li>
                @endcan
                @can('payment-list')
                <li>
                <a href="{{ route('payment.index') }}"><i data-feather="send"></i>
                <span>Konfirmasi Pembayaran</span><span class="badge badge-success ft-right count_payment">10+</span></a>
                </li>
                @endcan
                @can('bank-list')
                <li>
                <a href="{{ route('bank.index') }}"><i data-feather="dollar-sign"></i>
                <span>Manajemen Bank</span></a>
                </li>
                @endcan
                @can('order-list')
                <li>
                <a href="{{ route('order.index') }}"><i data-feather="shopping-cart"></i>
                <span>Manajemen Order</span></a>
                </li>
                @endcan
                @can('product-list')
                <li>
                <a href="{{ route('product.index') }}"><i data-feather="folder"></i>
                <span>Manajemen Produk</span></a>
                </li>
                @endcan
                @can('promo-list')
                <li>
                <a href="{{ route('promo.index') }}"><i data-feather="percent"></i>
                <span>Manajemen Promo</span></a>
                </li>
                @endcan
                @can('user-list')
                <li>
                <a href="{{ route('user.index') }}"><i data-feather="users"></i>
                <span>Manajemen User</span></a>
                </li>
                @endcan
                @can('role-list')
                <li>
                <a href="{{ route('role.index') }}"><i data-feather="key"></i>
                <span>Manajemen Role</span></a>
                </li>
                @endcan
                @can('permission-list')
                <li>
                <a href="{{ route('permission.index') }}"><i data-feather="key"></i>
                <span>Manajemen Permission</span></a>
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
</div>