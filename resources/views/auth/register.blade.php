@extends('layouts.app')

@section('content')

<h2 class="judul">Register</h2>
<div class="container">
    <div class="card" style="width:80%;margin:auto;padding-top: 2%">

        <div class="row form-group" style="width:75%;margin:auto;">
            <div class="col-xs-12">
                <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                    <li class="active"><a href="#step-1">
                            <p class="list-group-item-text"><b>(1)</b> Frist step description</p>
                        </a></li>
                    <li class="disabled"><a href="#step-2">
                            <p class="list-group-item-text"><b>(2)</b> Second step description</p>
                        </a></li>
                    <li class="disabled"><a href="#step-3">
                            <p class="list-group-item-text"><b>(3)</b> Third step description</p>
                        </a></li>
                </ul>
            </div>
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="setup-content card no-border" id="step-1">
                <div class="card-body">
                    <div class="col-xs-12">
                        <div class="col-md-12 text-center">
                            {{-- <div class="row"> --}}
                            <div class="col-md-3 radio-order">
                                <div class="content-title" style="margin-bottom:33px;">Order </div>
                                <ul>
                                    @foreach($products as $item)
                                        <li class="order-check radio-border">
                                        <input type="radio" class="order" id="{{$item->id}}-option"
                                    value="{{$item->id}}" name="product_id">
                                    <label for="{{$item->id}}-option">{{$item->product_name}}</label>

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
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos deleniti sint molestiae
                                    exercitationem porro eum dolore, quidem tempore natus repudiandae maxime eius
                                    dolorem adipisci quos, et aperiam, ratione laudantium aut!</p>
                            </div>
                            <div class="col-md-5">
                                <div class="content-title">Harga </div>
                                <div class="card text-white bg-primary">
                                    <div class="card-body">
                                        <p class="harga harga-text">Harga</p>
                                    </div>
                                </div>
                                <hr>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum ratione nostrum totam
                                    ipsa odit tempora repellendus, mollitia quod nam veritatis consequuntur, accusamus
                                    qui dolorem ipsum excepturi voluptas. Quaerat, obcaecati id?</p>
                            </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a id="activate-step-1" style="float:right" class="btn btn-primary btn-lg" href="#">Next</a>
                </div>
            </div>
            <div class="setup-content card no-border" id="step-2" style="display:none">
                <div class="card-body">
                    <div class="col-xs-12">
                        <div class="col-md-7">
                            <div class="content-title" style="margin-bottom:15px;">Your Information </div>


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-7">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-7">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-7">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-7">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="content-title" style="margin-bottom:15px;">Select Payment </div>
                            <ul>
                                @foreach ($banks as $itemBank)
                                <li class="order-check radio-border">
                                    <input type="radio" class="bank" id="{{$itemBank->id}}-bank"
                                        value="{{$itemBank->id}}" name="bank_id">
                                    <label for="{{$itemBank->id}}-bank">{{$itemBank->bank_name}}</label>
                                    <img src="{{ asset('image/'.$itemBank->bank_image) }}" class="img img-bank-{{Str::lower($itemBank->bank_name)}}" alt="">

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
                        style="float:right; margin: 1px 1% 0% 0%; border:0px; background: rgb(246, 246, 246);"
                        class="btn btn-default btn-lg" href="#">Back</a>
                </div>
            </div>
            <div class="setup-content card no-border" id="step-3" style="display:none">
                <div class="card-body">
                    <div class="col-xs-12">
                        <div class="col-md-5 border-a3">
                            <div class="content-title" style="margin-bottom:15px;">Pilihan Anda</div>
                            <h2 class="product-plan">
                                <i class="fa fa-check-circle icon-fa" aria-hidden="true"></i>
                                <span class="db">Jumlah DB</span>
                            </h2>
                            <div class="card text-white bg-primary">
                                <div class="card-body">
                                    <p class="harga harga-text">Harga</p>
                                </div>
                            </div>
                            <hr>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio itaque recusandae
                                inventore quos quasi consectetur eum ex cupiditate doloribus id.</p>
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
                                    <a href="#">Syarat, Ketentuan, Kebijakan dari ShareWA & Kebijakan Privasi</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {{-- <button id="activate-step-4" style="float:right" class="btn btn-primary btn-lg">Regis</button> --}}
                    <button type="submit" class="btn btn-primary btn-lg" style="float:right">
                        {{ __('Register') }}
                    </button>
                    <a id="activate-step-5"
                        style="float:right; margin: 1px 1% 0% 0%; border:0px; background: rgb(246, 246, 246);"
                        class="btn btn-default btn-lg" href="#">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).keypress(
            function (event) {
                if (event.which == '13') {
                    event.preventDefault();
                }
            }
        );

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
            $('ul.setup-panel li:eq(1)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-2"]').trigger('click');
            // $(this).remove();
        });

        $('#activate-step-2').on('click', function (e) {
            $('ul.setup-panel li:eq(2)').removeClass('disabled');
            $('ul.setup-panel li a[href="#step-3"]').trigger('click');
            // $(this).remove();
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
                [ "{{ $item->id }}", "{{ $item->product_name }}", "{{ $item->product_max_db }}", "{{ $item->product_price }}" ], 
            @endforeach
        ];

        $(".order").click(function () {
            for (i = 0; i < products.length; i++) {
                if($(this).val() === products[i][0]){
                    $('.db').text(products[i][2]);
                    $('.harga-text').text(products[i][3]);
                }
            }
        });
    });

</script>
@endsection
