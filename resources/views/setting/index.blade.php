@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Setting</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Setting</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset('template/dist/img/noimage.png') }}"
                            alt="{{ $account->name }}">
                    </div>

                    <h3 class="profile-username text-center">{{ $account->name }}</h3>

                    <p class="text-muted text-center">Customer Virolin</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                        <b>Subscriber</b> <a class="float-right">{{ $total_subscribers }}</a>
                        </li>
                        <li class="list-group-item">
                        <b>Landingpage</b> <a class="float-right">{{ $total_landingpage }}</a>
                        </li>
                    </ul>

                    <a href="{{ route('setting.edit', $account->id) }}" class="btn btn-primary btn-block"><b>Ubah Profil</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        Detail Akun
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th width="23%">Produk</th>
                                    <td width="10px" class="text-center">:</td>
                                    <td>{{ $account->product->product_name }}</td>
                                </tr>
                                <tr>
                                    <th width="23%">Maksimal Database</th>
                                    <td width="10px" class="text-center">:</td>
                                    <td>{{ number_format($account->product->product_max_db) }}</td>
                                </tr>
                                <tr>
                                    <th width="23%">Harga Produk</th>
                                    <td width="10px" class="text-center">:</td>
                                    <td>{{ "Rp. ".number_format($account->product->product_price) }}</td>
                                </tr>
                                <tr>
                                    <th width="23%">Status User</th>
                                    <td width="10px" class="text-center">:</td>
                                    <td>{{ $account->status }}</td>
                                </tr>
                                <tr>
                                  <th></th>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
