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
            <h1 class="pd-0 mg-0 tx-20">Edit Campaign</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Edit Campaign</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
          <div class="col-md-12 col-lg-12">
            <div class="card mg-b-20">
              <div class="card-header">
                <h4 class="card-header-title">
                    Edit Campaign
                </h4>
                <div class="card-header-btn">
                    <a  href="" data-toggle="collapse" class="btn card-collapse" data-target="#collapse2" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                    <a href="" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                    <a href="" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                    <a href="" data-toggle="remove" class="btn card-remove"><i class="ion-android-close"></i></a>
                </div>
              </div>
              {{ Form::model($campaign, ['method' => 'PATCH','route' => ['campaign.update', $campaign->campaign_id]]) }}

              <div class="card-body collapse show" id="start_campaign">
                
                <div class="row">
                  <div class="col-md-6">
                    <label class="form-control-label">Gunakan No Telp.:</label>
                    {{ Form::select('campaign_form_telp', ['Tidak', 'Ya'], $campaign->campaign_form_hp, ['class'=> 'form-control', 'id' => 'campaign_form_telp']) }}
                  </div>
                  <div class="col-md-6">
                    <label class="form-control-label">Gunakan Alamat:</label>
                    {{ Form::select('campaign_form_address', ['Tidak', 'Ya'], $campaign->campaign_form_address, ['class'=> 'form-control', 'id' => 'campaign_form_address']) }}
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label">Nama Landing Page:</label>
                      {{ Form::text('campaign_lp_name', $campaign->campaign_name, ['class'=> 'form-control', 'id' => 'campaign_lp_name', 'placeholder' => 'Masukan Nama / Judul Landing Page', 'required']) }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      
                      <label class="form-control-label">Buat Landing Page <small>( *klik gambar )</small></label>
                      <br>
                      <br>
                      <a href="http://localhost/fibre/builder" target="_blank" rel="noopener noreferrer">
                      <img src="{{ asset('image/custom_campaign.png') }}" alt="Klik gambar untuk membuat custom landingpage" title="Klik gambar untuk membuat custom landingpage" width="150">
                      </a>
                      <br>
                      <br>
                      <label class="form-control-label">Paste Kode Template:</label>
                      {{ Form::textarea('campaign_lp_template', $campaign->campaign_template, ['class'=> 'form-control', 'id' => 'campaign_lp_template', 'placeholder' => 'Paste Code Here', 'required']) }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label">Teks Konfirmasi Email:</label>
                      {{ Form::textarea('campaign_confirm', $campaign->campaign_confirm, ['class'=> 'form-control textarea', 'id' => 'campaign_form_thank', 'placeholder' => 'Tulis teks konfirmasi di email sebelum user subscribe', 'required']) }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label">Thank Email:</label>
                      {{ Form::textarea('campaign_form_thank', $campaign->campaign_thank_email, ['class'=> 'form-control textarea', 'id' => 'campaign_form_thank', 'placeholder' => 'Tulis ucapan terima kasih di email', 'required']) }}
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label">Teks Share Whatsapp:</label>
                      {{ Form::textarea('campaign_text_share', $campaign->campaign_teks_share, ['class'=> 'form-control', 'id' => 'campaign_text_share', 'placeholder' => 'Tulis teks share whatsapp', 'required']) }}
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-success">Selesai dan Simpan</button>
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

@include('partials.footer')  