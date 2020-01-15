@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<!--================================-->
<!-- Page Inner Start -->
<!--================================-->
<div class="page-inner">
    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <div class="pageheader pd-t-25 pd-b-35">
            <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">Create Campaign</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Create Campaign</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
          <div class="col-md-12 col-lg-12">
            <div class="card mg-b-20">
              <div class="card-header">
                <h4 class="card-header-title">
                  Create Campaign
                </h4>
                <div class="card-header-btn">
                    <a  href="" data-toggle="collapse" class="btn card-collapse" data-target="#collapse2" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                    <a href="" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                    <a href="" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                    <a href="" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
                </div>
              </div>
              <div class="card-body collapse show" id="pra_campaign">

                <div class="form-group">
                  {{ Form::label('Nama Campaign *') }}
                  {{ Form::text('campaign_name', '', ['class' => 'form-control', 'placeholder' => 'Nama Campaign', 'required', 'id' => 'campaign_name']) }}
                  <small style="color:red" id="msg_campaign_error_name">Nama Campaign wajib diisi!</small>
                </div>
                <div class="form-group">
                  <button id="campaign_next" class="btn btn-primary">Next</button>
                </div>

              </div>
              <div class="card-body collapse show" id="start_campaign">
                <div id="wizard2">
                    <h3>Custom Form</h3>
                    <section>
                      <h6>Nama dan Email sudah otomatis muncul</h6>
                      <div class="form-group">
                          <label class="form-control-label">Gunakan No Telp.:</label>
                          {{ Form::select('campaign_form_telp', ['Tidak', 'Ya'], null, ['class'=> 'form-control', 'id' => 'campaign_form_telp']) }}
                          <label class="form-control-label">Gunakan Alamat:</label>
                          {{ Form::select('campaign_form_address', ['Tidak', 'Ya'], null, ['class'=> 'form-control', 'id' => 'campaign_form_address']) }}
                      </div>
                      <!-- form-group -->
                    </section>
                    <h3>Create Landing Page</h3>
                    <section>
                      <div class="form-group">
                        <label class="form-control-label">Nama Landing Page:</label>
                        {{ Form::text('campaign_lp_name', '', ['class'=> 'form-control', 'id' => 'campaign_lp_name', 'placeholder' => 'Masukan Nama / Judul Landing Page', 'required']) }}
                        <label class="form-control-label">Pilih Template:</label>
                      </div>
                    </section>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
    <!--/ Main Wrapper End -->
</div>
<!--/ Page Inner End -->
<!--================================-->

<script>
$(document).ready(function() {
  $("#start_campaign").hide();
  $("#msg_campaign_error_name").hide();

  $("#campaign_next").on('click', function() {
    var campaign_name = $('#campaign_name').val();
    if(campaign_name == ""){
      $("#msg_campaign_error_name").show();
      return false;
    }
    $("#start_campaign").show();
    $("#pra_campaign").hide();
  });
})
</script>
@include('partials.footer')  