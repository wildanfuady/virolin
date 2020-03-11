@extends('layouts.app')
@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/sweet_alert/sweetalert.css">
<style>
@media(max-width: 500px){
    .navbar-brand img{
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        width: 40%;
    }
}
@media(min-width: 501px){
    .navbar-brand img{
        width: 40%;
    }
}
</style>
@endsection
@section('content')

<h3 class="judul">Register di Virolin.com</h3>
<!-- <div class="row"> -->
<div class="container">
    <div class="card" style="border-radius:10px 10px 0px 0px; margin-bottom: 10%">

        <div class="row form-group" style="width:75%;margin:auto;padding-top:10px">
            <div class="col-xs-12">
                <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                    <li class="active"><a href="#step-1">
                            <p class="list-group-item-text"><b>(1)</b> Choose Product</p>
                        </a></li>
                    <li class="disabled"><a href="#step-2">
                            <p class="list-group-item-text"><b>(2)</b> Account & Payments</p>
                        </a></li>
                    <li class="disabled"><a href="#step-3">
                            <p class="list-group-item-text"><b>(3)</b> Confirmation</p>
                        </a></li>
                </ul>
            </div>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="setup-content card no-border mt-5" id="step-1">
                <div class="card-body">
                    <div class="col-xs-12">
                        <div class="col-md-12 text-center">
                            {{-- <div class="row"> --}}
                            <div class="col-md-3 radio-order">
                                <div class="content-title" style="margin-bottom:15%;">PILIH PRODUK</div>
                                <ul>
                                    @foreach($products as $item)
                                    <li class="order-check radio-border">
                                        <input type="radio" class="order order-list" id="{{$item->product_id}}-option" value="{{$item->product_id}}" name="product_id">
                                        <label for="{{$item->product_id}}-option">{{$item->product_name}}</label>

                                    <div class="check">
                                        <div class="inside"></div>
                                    </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-4 border-a1">
                                <div class="content-title">Jumlah Database </div>
                                <div class="card text-white bg-primary">
                                    <div class="card-body">
                                        <p class="harga db">Jumlah Database</p>
                                    </div>
                                </div>
                                <hr>
                                <p>Mencari dan mendapatkan data calon pelanggan Anda sebanyak <b><span class="jumlah_db"></span> database</b> hanya dengan <b><span class="harga_db"></span></b>.</p>
                            </div>
                            <div class="col-md-5">
                                <div class="content-title">Harga </div>
                                <div class="card text-white bg-primary">
                                    <div class="card-body">
                                        <p class="harga harga-text">Harga</p>
                                    </div>
                                </div>
                                <hr>
                                <p>Harga yang kami tawarkan adalah harga terbaik saat ini dibandingkan yang lainnya. Produk yang Anda pilih akan mempengaruhi harga yang tertera. <a href="#">Pelajari Dulu</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a id="activate-step-1" style="float:right" class="btn btn-primary btn-lg" href="#">Next</a>
                </div>
            </div>
            <div class="setup-content card no-border mt-5" id="step-2" style="display:none">
                <div class="card-body">
                    <div class="col-xs-12">
                        <div class="col-md-7">
                            <div class="content-title" style="margin-bottom:15px;">Your Information </div>


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label">{{ __('Fullname') }}</label>

                                <div class="col-md-7">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus placeholder="Enter your full name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label">{{ __('Email') }}</label>

                                <div class="col-md-7">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" placeholder="Enter your valid email address">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label">{{ __('Password') }}</label>

                                <div class="col-md-7">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off" placeholder="Enter your secret password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label">{{ __('Konfirmasi Password') }}</label>

                                <div class="col-md-7">
                                    <input id="password-confirm" type="password" class="form-control"  name="password_confirmation" required autocomplete="off" placeholder="Enter your confirmation password">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="content-title" style="margin-bottom:15px;">Select Payment </div>
                            <ul style="padding:0">
                                @foreach ($banks as $itemBank)
                                <li class="order-check radio-border">
                                    <input type="radio" class="bank" id="{{$itemBank->id}}-bank"
                                        value="{{$itemBank->id}}" name="bank_id">
                                    <label for="{{$itemBank->id}}-bank">{{ $itemBank->bank_name}}</label>
                                    <img src="{{ asset('storage/'.$itemBank->bank_image) }}" class="img float-right img-bank-{{Str::lower($itemBank->bank_name)}}" alt="">

                                    <div class="check">
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a id="activate-step-2" style="float:right" class="btn btn-primary btn-lg" href="#">Next</a>
                    <a id="activate-step-3"
                        style="float:right; margin: 1px 1% 0% 0%; border:1px solid #dedede; background: rgb(246, 246, 246);"
                        class="btn btn-default btn-lg" href="#">Back</a>
                </div>
            </div>
            <div class="setup-content card no-border mt-5" id="step-3" style="display:none">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-md-5 border-a3">
                                <div class="content-title" style="margin-bottom:15px;">Pilihan Anda</div>
                                <h2 class="product-plan">
                                    <i class="fa fa-check-circle icon-fa" aria-hidden="true"></i>
                                    Jumlah Database: <span class="db"></span>
                                </h2>
                                <div class="card text-white bg-primary">
                                    <div class="card-body">
                                        <p class="harga harga-text">Harga</p>
                                    </div>
                                </div>
                                <br/>
                                <h2 class="product-plan">
                                    <i class="fa fa-check-circle icon-fa" aria-hidden="true"></i>
                                    Invoice: #<span class="invoice">Invoice</span>
                                    <input type="hidden" name="invoice" id="invoice">
                                </h2>
                                <hr>
                                <!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio itaque recusandae
                                    inventore quos quasi consectetur eum ex cupiditate doloribus id.</p> -->
                            </div>
                            <div class="col-md-7">
                                <div class="warning-box">
                                    <h4><b>Harap Periksa kembali!</b></h4>
                                    <p>Pastikan pilihan sesuai apa yang ada inginkan.</p>
                                </div>
                                <div class="agreement-box">
                                    <i class="fa fa-exclamation-circle icon"></i>
                                    <p>
                                        Dengan mendaftar, Anda setuju dengan
                                        <a href="#">Syarat, Ketentuan, Kebijakan dari Virolin & Kebijakan Privasi</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-lg" style="float:right">
                        {{ __('Register') }}
                    </button>
                    <a id="activate-step-5"
                        style="float:right; margin: 1px 1% 0% 0%; border:1px solid #dedede; background: rgb(246, 246, 246);"
                        class="btn btn-default btn-lg" href="#">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>  
@section('js')
<script src="{{ asset('template/metrical') }}/plugins/sweet_alert/sweetalert.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $(".order-list:last").prop("checked", true);

        $(document).keypress(
            function (event) {
                if (event.which == '13') {
                    event.preventDefault();
                }
            }
        );

        function cekInput(id) {
            var status;
            var input_value = $(id).val();
            var input = $(id);
            if(input_value == ""){
                $(input).addClass('is-invalid');
                status = 0;
            } else {
                $(input).removeClass('is-invalid');
                status = 1;
            }
            return status;
        }

        var navListItems = $('ul.setup-panel li a'),
            allWells = $('.setup-content');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this).closest('li');

            if (!$item.hasClass('disabled')) {
                navListItems.closest('li').removeClass('active');
                $item.addClass('active');
                allWells.hide();
                $target.show();
            }
        });

        $('ul.setup-panel li.active a').trigger('click');

        // DEMO ONLY //
        $('#activate-step-1').on('click', function (e) {

            var pilih_produk = $().val();
            
            if(! $("input[name='product_id']").is(':checked')){
                swal({
                    title: 'Oops!',
                    text: 'Pilih produk terlebih dahulu',
                    type: "error"
                });
            } else {
                $('ul.setup-panel li:eq(1)').removeClass('disabled');
                $('ul.setup-panel li a[href="#step-2"]').trigger('click');
            }
            // $(this).remove();
        });

        $('#activate-step-2').on('click', function (e) {

            if(cekInput("#name") == false){
                swal({
                    title: 'Oops!',
                    text: 'Nama Lengkap wajib diisi',
                    type: "error"
                });
            } else if(cekInput("#email") == false){
                swal({
                    title: 'Oops!',
                    text: 'Email wajib diisi',
                    type: "error"
                });
            } else if(cekInput("#password") == false){
                swal({
                    title: 'Oops!',
                    text: 'Password wajib diisi',
                    type: "error"
                });
            } else if(cekInput("#confirm-password") == false){
                swal({
                    title: 'Oops!',
                    text: 'Konfirmasi Password wajib diisi',
                    type: "error"
                });
            } else {
                $('ul.setup-panel li:eq(2)').removeClass('disabled');
                $('ul.setup-panel li a[href="#step-3"]').trigger('click');
            }
        });

        $('#activate-step-3').on('click', function (e) {
            $('ul.setup-panel li:eq(1)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-1"]').trigger('click');
            // $(this).remove();
        });

        $('#activate-step-5').on('click', function (e) {
            $('ul.setup-panel li:eq(1)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-2"]').trigger('click');
            // $(this).remove();
        });

        var products = [
            @foreach ($products as $item)
                [ "{{ $item->product_id }}", "{{ $item->product_name }}", "{{ $item->product_max_db }}", "{{ $item->product_price }}", "{{ $item->product_desc }}" ],
            @endforeach
        ];

        const formatter = new Intl.NumberFormat(['ban', 'id']);

        $(".order").click(function () {
            for (i = 0; i < products.length; i++) {
                if($(this).val() === products[i][0]){
                    dbFormat = (Math.round(products[i][2] * 100) / 100000).toFixed(3);
                    console.log(dbFormat);
                    $('.db').text(dbFormat);
                    $('.harga-text').text("Rp. " + formatter.format(products[i][3]));
                    randomA = Math.floor(Math.random() * (99999 - 10000));
                    randomB = Math.floor(Math.random() * (999 - 101));
                    randomC = Math.floor(Math.random() * (999 - 101));
                    invoice = randomA + randomB + randomC;
                    $('.invoice').text(invoice);
                    $('#invoice').val(invoice);
                    $('.jumlah_db').text(dbFormat);
                    $('.harga_db').text("Rp. " + formatter.format(products[i][3]));
                }
            }
        });

        $(".order").prop("checked", function(){
            for (i = 0; i < products.length; i++) {
                if($(this).val() === products[i][0]){
                    dbFormat = (Math.round(products[i][2] * 100) / 100000).toFixed(3);
                    console.log(dbFormat);
                    $('.db').text(dbFormat);
                    $('.harga-text').text("Rp. " + formatter.format(products[i][3]));
                    randomA = Math.floor(Math.random() * (99999 - 10000));
                    randomB = Math.floor(Math.random() * (999 - 101));
                    randomC = Math.floor(Math.random() * (999 - 101));
                    invoice = randomA + randomB + randomC;
                    $('.invoice').text(invoice);
                    $('#invoice').val(invoice);
                    $('.jumlah_db').text(dbFormat);
                    $('.harga_db').text("Rp. " + formatter.format(products[i][3]));
                }
            }
        });
    });

</script>
@endsection
@endsection
