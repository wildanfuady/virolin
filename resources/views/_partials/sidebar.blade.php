
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    @can('dashboard-admin')
    <a href="{{ url('dashboard') }}" class="brand-link">
        <img src="{{ url('template/dist/img/noimage.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8" width="100px" height="100px">
        <span class="brand-text font-weight-light">Virol<b>in</b></span>
    </a>
    @endcan
    <a href="{{ url('home') }}" class="brand-link">
        <img src="{{ url('template/dist/img/noimage.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8" width="100px" height="100px">
        <span class="brand-text font-weight-light">Virol<b>in</b></span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ url('template/dist/img/noimage.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">@if(!empty(Auth::user()->name)) {{ Auth::user()->name }} @else {{ "Not Found" }} @endif</a>
        </div>
        </div>

        <nav class="mt-2">
        
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Kosong -->
            @can('dashboard-admin')
            <li class="nav-item has-treeview">
              <a href="{{ url('dashboard') }}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
              </a>
            </li>
            @endcan
            <li class="nav-item has-treeview">
              <a href="{{ url('home') }}" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
              </a>
            </li>
            @if(Auth::user()->status == "Valid" || Auth::user()->status == "valid")
              <!-- Null -->
            @else
            <li class="nav-item has-treeview">
              <a href="{{ url('konfirmasi-pembayaran') }}" class="nav-link">
                  <i class="nav-icon fas fa-money-bill-alt"></i>
                  <p>Konfirmasi Pembayaran</p>
              </a>
            </li>
            @endif
            @can('role-list')
            <li class="nav-item">
              <a href="{{ route('roles.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-key"></i>
                  <p>Roles Permission</p>
              </a>
            </li>
            @endcan
            @can('users-list')
            <li class="nav-item">
              <a href="{{ route('users.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Manage User</p>
              </a>
            </li>
            @endcan
            @can('banks-list')
            <li class="nav-item">
              <a href="{{ route('banks.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-money-check-alt"></i>
                  <p>Manage Bank</p>
              </a>
            </li>
            @endcan
            @can('promos-list')
            <li class="nav-item">
              <a href="{{ route('promos.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-percent"></i>
                  <p>Manage Promo</p>
              </a>
            </li>
            @endcan
            @can('orders-list')
            <li class="nav-item">
              <a href="{{ route('orders.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-cart-plus"></i>
                  <p>Manage Order</p>
              </a>
            </li>
            @endcan
            @can('products-list')
            <li class="nav-item">
              <a href="{{ route('products.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-chart-bar"></i>
                  <p>Manage Product</p>
              </a>
            </li>
            @endcan
            @can('reports-list')
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-folder-open"></i>
                <p>
                  Manage Report
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('reports/pengunjung') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pengunjung</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('reports/penjualan') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Penjualan</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('reports/promo') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Promo</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('reports/user') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>User</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan
            @can('landingpage-list')
            <li class="nav-item">
              <a href="{{ route('landingpages.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-bars"></i>
                  <p>Manage Landing Page</p>
              </a>
            </li>
            @endcan
            @can('mysubscriber-list')
            <li class="nav-item">
              <a href="{{ route('mysubscribers.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Manage Subscriber</p>
              </a>
            </li>
            @endcan
            @can('autoresponder-list')
            <li class="nav-item">
              <a href="{{ route('autoresponders.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-broadcast-tower"></i>
                  <p>Manage Autoresponder</p>
              </a>
            </li>
            @endcan
            @can('form-list')
            <li class="nav-item">
              <a href="{{ route('forms.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Manage Form</p>
              </a>
            </li>
            @endcan
            @can('testimonial-list')
            <li class="nav-item">
              <a href="{{ route('testimonials.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-bullhorn"></i>
                  <p>Manage Testimonial</p>
              </a>
            </li>
            @endcan
            @can('report-user')
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-folder-open"></i>
                <p>
                  Manage Report
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('report/trafik') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Trafik</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('report/share') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Share</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('report/order') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Order</p>
                  </a>
                </li>
              </ul>
            </li>
            @endcan
            @can('transaction-list')
            <li class="nav-item has-treeview">
              <a href="{{ url('transaction') }}" class="nav-link">
                <i class="nav-icon fa fa-money-bill-alt"></i>
                <p>
                  Transaksi Saya
                </p>
              </a>
            </li>
            @endcan
            <li class="nav-header">ACCOUNT</li>
            <li class="nav-item">
                <a href="{{ route('settings.index') }}" class="nav-link">
                  <i class="nav-icon far fa-circle text-secondary"></i>
                  <p class="text">Setting</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <i class="nav-icon far fa-circle text-danger"></i>
                  <p class="text">Logout</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
        </nav>
    </div>
</aside>