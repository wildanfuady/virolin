@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Payments</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Payments</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Edit Konfirmasi Pembayaran
            </div>
            {{ Form::model($payment, ['method' => 'PATCH','route' => ['payment.update', $payment->payment_id], 'id' => 'form-horizontal']) }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group row">
                                <label class="col-md-3 control-label">Invoice</label>
                                <div class="col-md-9">
                                    {{ Form::text('invoice', $payment->payment_invoice, ['class' => 'form-control border-none', 'readonly']) }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 control-label">Pengirim</label>
                                <div class="col-md-9">
                                    {{ Form::text('pengirim', $payment->payment_pengirim, ['class' => 'form-control border-none', 'readonly']) }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 control-label">Bank Tujuan</label>
                                <div class="col-md-9">
                                    {{ Form::text('bank', $payment->bank->bank_name." an. ".$payment->bank->bank_nasabah, ['class' => 'form-control border-none', 'readonly']) }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 control-label">Jumlah Transfer</label>
                                <div class="col-md-9">
                                    {{ Form::text('jumlah_transfer', "Rp. ".number_format($payment->payment_total_transfer), ['class' => 'form-control border-none', 'readonly']) }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 control-label">Tanggal Transfer</label>
                                <div class="col-md-9">
                                    {{ Form::text('tanggal_transfer', date('d-m-Y - H:i', strtotime($payment->payment_tanggal_transfer)), ['class' => 'form-control border-none', 'readonly']) }}
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="form-group row">
                                <label class="col-md-3 control-label">Status</label>
                                <div class="col-md-9">
                                    {{ Form::select('status', ['Pending' => 'Pending', 'Success' => 'Success'], $payment->payment_status, ['class' => 'form-control border-none']) }}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 control-label">Bukti Transfer</label>
                                <div class="col-md-9">
                                    <img src="{{ asset('storage/'.$payment->payment_bukti_transfer) }}" alt="" class="img-fluid">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('payment.index') }}" class="btn btn-outline-info">Back</a>
                            <button type="submit" id="btn_payment_confirmation" class="btn btn-primary float-right">Konfirmasi</button>
                        </div>
                    </div>

                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@include('partials.footer')