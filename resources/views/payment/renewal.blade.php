@section('css')
<script src="{{ !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">
<link rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/select2/css/select2-bootstrap.css">
<link rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/dropify/css/dropify.min.css">
<link rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/sweet_alert/sweetalert.css">
<link rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/datepicker/css/bootstrap-datepicker3.min.css">
@endsection
@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<div class="page-inner">
    <div id="main-wrapper">
        <div class="pageheader pd-t-25 pd-b-35">
            <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">Renewal</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Renewal</a>
            </div>
        </div>
        <div class="row row-xs">
            <div class="col-lg-12">
                <div class="alert alert-info alert-dismissible mt-3">
                    <h5><strong>Informasi:</strong></h5>
                    <p>Anda dapat membayar via midtrans untuk pilihan aktivasi secara otomatis dan tidak perlu melakukan konfirmasi pembayaran. <br><br><a class="btn btn-info btn-sm" href="#" id="payment-gateway"> Bayar via Midtrans</a></p>
                </div>
            </div>
        </div>
        <div class="row row-xs clearfix">
            <div class="col-lg-12">
            <div class="card mg-b-100">
                {{ Form::open(['url' => 'konfirmasi-pembayaran/store', 'files' => true, 'id' => 'form_payment_renewal']) }}
                <div class="collapse show" id="annualReports">
                    <div class="card-body pd-t-10 pd-b-20 collapse show">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Terjadi kesalahan saat menginput data.<br><br>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                            
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Rincian Order Anda</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Produk</td>
                                            <td>{{ $order->product->product_name }}</td>
                                            <td>Sub Total</td>
                                            <td><?php $total = $order->product->product_price + $order->kode_unik; echo "<span id='total-pembayaran'>Rp. ".number_format($total,0,',','.')."</span>"; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tipe Produk</td>
                                            <td>{{ ucfirst($order->product->product_type) }}</td>
                                            <td rowspan="2">Punya Kupon?</td>
                                            <td rowspan="2">
                                                {{ Form::hidden('kode_produk', $order->product->product_id, ['id' => 'input-kode-produk']) }}
                                                {{ Form::text('kupon', '', ['class' => 'form-control', 'style' => 'text-transform:uppercase', 'id' => 'input-kupon'])}}
                                                <button type="button" id="apply-kupon" class="btn btn-success float-right mg-t-10">Gunakan Kupon</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Harga Produk</td>
                                            <td>Rp. {{ number_format($order->product->product_price,0,',','.') }}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Kode Unik</td>
                                            <td>Rp. {{ number_format($order->kode_unik,0,',','.') }}</td>
                                            <td>Total Pembayaran</td>
                                            <td id="total_pembayaran"><?php $total = $order->product->product_price + $order->kode_unik; echo "<span id='total-pembayaran'>Rp. ".number_format($total,0,',','.')."</span>"; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <h4>Renewal / Perpanjangan Akun</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                {{ Form::hidden('id', Auth::user()->id, ['id' => 'user_id']) }}
                                <div class="form-group">
                                    {{ Form::hidden('invoice', $order->invoice) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('pengirim', 'Pengirim') }}
                                    <span class="sidetitle">Pastikan sesuai dengan nama yang tertera di kartu ATM Anda</span>
                                    {{ Form::text('pengirim', '', ['class'=> 'form-control border-none', 'placeholder'=> 'Enter Name', 'autocomplete' => 'off', 'id' => 'pengirim']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('jumlah_transfer', 'Jumlah Transfer') }}
                                    {{ Form::number('jumlah_transfer', '', ['class'=> 'form-control border-none', 'placeholder'=> 'Rp. ', 'autocomplete' => 'off', 'id' => 'jumlah_transfer']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('bank', 'Transfer ke Bank') }}
                                    {{ Form::select('bank', $banks, null, ['class' => 'form-control select2', 'placeholder' => 'Pilih Bank']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('tanggal_transfer', 'Tanggal Transfer') }}
                                    {{ Form::text('tanggal_transfer', '', ['class'=> 'form-control datepicker', 'placeholder'=> 'dd-mm-yyyy ', 'autocomplete' => 'off', 'id' => 'tanggal_transfer', 'readonly']) }}
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    {{ Form::label('bukti_transfer', 'Bukti Transfer') }}
                                    <span class="sidetitle">Gambar hanya boleh bertipe jpg, jpeg atau png dan maksimal 1 mb</span>
                                    {{ Form::file('bukti_transfer', ['class'=> 'dropify', 'data-show-loader' => 'false', 'id' => 'bukti_transfer', 'autocomplete' => 'off']) }}
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ url('home') }}" class="btn btn-outline-info">Back</a>
                                <button type="button" id="btn_payment_renewal" class="btn btn-primary float-right">Proses</button>
                            </div>
                        </div>

                    </div>
                </div>
                {{ Form::close() }}
            </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script src="{{ asset('template/metrical') }}/plugins/dropify/js/dropify.min.js"></script>
<script src="{{ asset('template/metrical') }}/plugins/sweet_alert/sweetalert.min.js"></script>
<script src="{{ asset('template/metrical') }}/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
<script src="{{ asset('template/metrical') }}/js/submit.js"></script>
@endsection
@include('partials.footer')