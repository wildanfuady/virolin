@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<!--================================-->
<!-- Page Inner Start -->
<!--================================-->
<div class="page-inner">
    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <!--================================-->
        <!-- Breadcrumb Start -->
        <!--================================-->
        <div class="pageheader pd-t-25 pd-b-35">
            <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">Konfirmasi Pembayaran</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Konfirmasi Pembayaran</a>
            </div>
        </div>
        <!--/ Breadcrumb End -->
        <!--================================-->

        <div class="row row-xs clearfix">
            <!--================================-->
            <!--  Annual Report Start-->
            <!--================================-->
            <div class="col-lg-12">
            <div class="card mg-b-20">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Konfirmasi Pembayaran
                    </h4>
                    <div class="card-header-btn">
                        <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#annualReports" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                        <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                        <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                        <a href="#" data-toggle="remove" class="btn card-remove"><i class="ion-ios-trash-outline"></i></a>
                    </div>
                </div>
                {{ Form::open(['url' => 'konfirmasi-pembayaran/store', 'files' => true]) }}
                <div class="collapse show" id="annualReports">
                    <div class="card-body pd-t-0 pd-b-20 collapse show">
                        <?php
                            if($msg_success = Session::get('success')){
                                $class = "alert alert-success alert-dismissable";
                                $msg = $msg_success;
                            } else if($msg_success = Session::get('error')){
                                $class = "alert alert-danger alert-dismissable";
                                $msg = $msg_success;
                            } else {
                                $class = "d-none";
                                $msg = "";
                            }
                        ?>
                        <div class="{{ $class }}">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ $msg }}
                        </div>
                        <div class="alert alert-info alert-dismissible mt-3">
                            <h5><i class="fa fa-info"></i> Detail Pembayaran</h5>
                            Anda dapat melihat detail pembayaran <a href="{{ url('payment/detail/'.Auth::user()->id) }}">di sini</a> atau gunakan <a href="#" id="payment-gateway" class="alert-link">payment gateway</a> untuk aktivasi otomatis. 
                        </div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif
                            
                        <div class="row">
                            <div class="col-lg-6">
                                {{ Form::hidden('id', Auth::user()->id, ['id' => 'user_id']) }}
                                <div class="form-group">
                                    {{ Form::label('invoice', 'Invoice') }}
                                    {{ Form::number('invoice', '', ['class'=> 'form-control border-none', 'placeholder'=> 'Enter Invoice']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('pengirim', 'Pengirim') }}
                                    {{ Form::text('pengirim', '', ['class'=> 'form-control border-none', 'placeholder'=> 'Enter Name']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('bank', 'Transfer ke Bank') }}
                                    {{ Form::select('bank', $banks, null, ['class'=> 'form-control border-none', 'placeholder'=> 'Choose One']) }}
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    {{ Form::label('jumlah_transfer', 'Jumlah Transfer') }}
                                    {{ Form::number('jumlah_transfer', '', ['class'=> 'form-control border-none', 'placeholder'=> 'Rp. ']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('tanggal_transfer', 'Tanggal Transfer') }}
                                    {{ Form::date('tanggal_transfer', '', ['class'=> 'form-control border-none', 'placeholder'=> 'Rp. ']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('bukti_transfer', 'Bukti Transfer') }}
                                    {{ Form::file('bukti_transfer', ['class'=> 'form-control border-none', 'style' => 'border-bottom:0']) }}
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <a href="{{ url('home') }}" class="btn btn-outline-info">Back</a>
                        &nbsp;
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
            </div>
        </div>
    </div>
    <!--/ Main Wrapper End -->
</div>
<!--/ Page Inner End -->
<!--================================-->
<script>
    $('#payment-gateway').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");
      var user_id = 
    $.ajax({
      
      url: './snaptoken',
      cache: false,
      success: function(data) {
        //location = data;
        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');
        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }
        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
            location.reload();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
            location.reload();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
            location.reload();
          }
        });
      }
    });
  });
  </script>
@include('partials.footer')