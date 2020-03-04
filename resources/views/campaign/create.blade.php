@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/summernote/summernote-bs4.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/dropify/css/dropify.min.css">
<style>
  .nav-tabs > .nav-item > a{
    background-color: #5d78ff;
    border: 1px solid white;
    color: white;
    padding: 20px 25px;
  }
</style>
@endsection
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
        @if($errors->any())
        <div class="mt-2">
          <div class="alert alert-danger text-left">
            Oops, telah terjadi beberapa kesalahan:
              <ul>
                  @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        </div>
        @endif
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
              {{ Form::open(['route' => 'campaign.store', 'id' => 'create_campaign', 'files' => true]) }}
              <div class="nav-tabs-top pd-10">
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#general"><i class="fa fa-arrow-circle-right"></i>&nbsp;&nbsp;General</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#form"><i class="fa fa-arrow-circle-right"></i>&nbsp;&nbsp;Form</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#template"><i class="fa fa-arrow-circle-right"></i>&nbsp;&nbsp;Template</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#share_wa"><i class="fa fa-arrow-circle-right"></i>&nbsp;&nbsp;Share</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#email"><i class="fa fa-arrow-circle-right"></i>&nbsp;&nbsp;Thank Email</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane fade active show" id="general">
                    <div class="card-body collapse show">
                      
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="form-control-label">Nama Landing Page:</label>
                            {{ Form::text('campaign_name', '', ['class'=> 'form-control', 'id' => 'campaign_lp_name', 'placeholder' => 'Masukan Nama / Judul Landing Page', 'autocomplete' => 'off', 'autocomplete' => 'off']) }}
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="form-control-label">Pilih List Subscriber:</label>
                            {{ Form::select('campaign_group', $list_sub, null, ['class'=> 'form-control', 'id' => 'campaign_form_telp', 'autocomplete' => 'off']) }}
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <button id="next2" class="btn btn-primary btn-lg float-right">Next</button>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <div class="tab-pane fade" id="form">
                    <div class="card-body collapse show">
                      
                      <div class="alert alert-info">
                        * Nama Lengkap dan Email sudah otomatis terinclude.
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Gunakan No Telp.:</label>
                        {{ Form::select('campaign_form_telp', ['Tidak', 'Ya', 'autocomplete' => 'off'], null, ['class'=> 'form-control', 'id' => 'campaign_form_telp', 'autocomplete' => 'off']) }}
                      </div>

                      <div class="form-group">
                        <label class="form-control-label">Gunakan Alamat:</label>
                        {{ Form::select('campaign_form_address', ['Tidak', 'Ya', 'autocomplete' => 'off'], null, ['class'=> 'form-control', 'id' => 'campaign_form_address', 'autocomplete' => 'off']) }}
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="btn-group float-right">
                            <button id="prev1" class="btn btn-secondary btn-lg float-right">Prev</button>
                            <button id="next3" class="btn btn-primary btn-lg float-right">Next</button>
                          </div>
                        </div>
                      </div>
                    
                    </div>
                  </div>
                  <div class="tab-pane fade" id="template">
                    <div class="card-body collapse show">
                      <input type="hidden" name="template_id" value="{{ $template_id }}">
                      <!-- Block 1 -->
                      <div class="block" style="background: #dedede; padding: 10px">
                        <h4>Block 1 - Header / Headline</h4>
                        <div class="clearfix"></div>
                        <div class="row">
                          <div class="col-md-7 col-sm-7 col-xs-7">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Background:</label></div>
                                <div class="col-md-8">
                                  {{ Form::text('block1_bg', '', ['class'=> 'form-control cp2', 'placeholder' => '#000000', 'autocomplete' => 'off']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Headline 1:</label></div>
                                <div class="col-md-8">
                                  {{ Form::text('block1_headline1', '', ['class'=> 'form-control', 'placeholder' => 'Headline 1', 'autocomplete' => 'off']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Headline 2:</label></div>
                                <div class="col-md-8">
                                  {{ Form::textarea('block1_headline2', '', ['class' => 'form-control textarea', 'placeholder' => 'Headline 2', 'autocomplete' => 'off']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Button:</label></div>
                                <div class="col-md-8">
                                  {{ Form::text('block1_btn_text', '', ['class'=> 'form-control', 'placeholder' => 'Button Text', 'autocomplete' => 'off']) }}
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                  {{ Form::text('block1_btn_text_color', '', ['class'=> 'form-control cp2', 'placeholder' => 'Color Text', 'autocomplete' => 'off']) }}
                                </div>
                                <div class="col-md-4">
                                  {{ Form::text('block1_btn_text_bg', '', ['class'=> 'form-control cp2', 'placeholder' => 'Background Text', 'autocomplete' => 'off']) }}
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-5 col-sm-5 col-xs-5">
                            <img src="{{ asset('landingpage/content/block/block1.png') }}" alt="Block 1" class="img-fluid">
                          </div>
                        </div>
                      </div>
                      <!-- Block 2 -->
                      <div class="block" style="background: #dedede; padding: 10px">
                        <h4>Block 2 - Edukasi</h4>
                        <div class="clearfix"></div>
                        <div class="row">
                          <div class="col-md-7 col-sm-7 col-xs-7">
                            <div class="form-group">
                              <label class="form-control-label">Text Edukasi:</label>
                              {{ Form::textarea('block2_text_edukasi', '', ['class' => 'form-control textarea', 'placeholder' => 'Text Edukasi', 'autocomplete' => 'off']) }}
                            </div>
                          </div>
                          <div class="col-md-5 col-sm-5 col-xs-5">
                            <img src="{{ asset('landingpage/content/block/block2.png') }}" alt="Block 1" class="img-fluid">
                          </div>
                        </div>
                      </div>
                      <!-- Block 3 -->
                      <div class="block" style="background: #dedede; padding: 10px">
                        <h4>Block 3 - Alasan Penguat</h4>
                        <div class="clearfix"></div>
                        <div class="row">
                          <div class="col-md-7 col-sm-7 col-xs-7">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Background:</label></div>
                                <div class="col-md-8">
                                  {{ Form::text('block3_bg', '', ['class'=> 'form-control cp2', 'placeholder' => 'Background', 'autocomplete' => 'off']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Headline:</label></div>
                                <div class="col-md-8">
                                  {{ Form::text('block3_headline', '', ['class'=> 'form-control', 'placeholder' => 'Headline', 'autocomplete' => 'off']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Image:</label></div>
                                <div class="col-md-8">
                                  {{ Form::file('block3_image', ['class'=> 'dropify', 'data-show-loader' => 'false', 'autocomplete' => 'off']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Alasan 1:</label></div>
                                <div class="col-md-3">
                                  {{ Form::select('block3_alasan1_icon', ['' => 'Pilih Icon', 'search' => 'Search', 'search_data' => 'Search Data', 'safety' => 'Safety', 'broadcast' => 'Broadcasts', 'gear' => 'Gear', 'download' => 'Download', 'autocomplete' => 'off'], null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                                </div>
                                <div class="col-md-5">
                                  {{ Form::textarea('block3_alasan1_text', '', ['class' => 'form-control', 'placeholder' => 'Alasan 1', 'cols' => 10]) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Alasan 2:</label></div>
                                <div class="col-md-3">
                                  {{ Form::select('block3_alasan2_icon', ['' => 'Pilih Icon', 'search' => 'Search', 'search_data' => 'Search Data', 'safety' => 'Safety', 'broadcast' => 'Broadcasts', 'gear' => 'Gear', 'download' => 'Download', 'autocomplete' => 'off'], null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                                </div>
                                <div class="col-md-5">
                                  {{ Form::textarea('block3_alasan2_text', '', ['class' => 'form-control', 'placeholder' => 'Alasan 2', 'cols' => 10]) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Alasan 3:</label></div>
                                <div class="col-md-3">
                                  {{ Form::select('block3_alasan3_icon', ['' => 'Pilih Icon', 'search' => 'Search', 'search_data' => 'Search Data', 'safety' => 'Safety', 'broadcast' => 'Broadcasts', 'gear' => 'Gear', 'download' => 'Download', 'autocomplete' => 'off'], null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                                </div>
                                <div class="col-md-5">
                                  {{ Form::textarea('block3_alasan3_text', '', ['class' => 'form-control', 'placeholder' => 'Alasan 3', 'cols' => 10]) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Alasan 4:</label></div>
                                <div class="col-md-3">
                                  {{ Form::select('block3_alasan4_icon', ['' => 'Pilih Icon', 'search' => 'Search', 'search_data' => 'Search Data', 'safety' => 'Safety', 'broadcast' => 'Broadcasts', 'gear' => 'Gear', 'download' => 'Download', 'autocomplete' => 'off'], null, ['class' => 'form-control', 'autocomplete' => 'off']) }}
                                </div>
                                <div class="col-md-5">
                                  {{ Form::textarea('block3_alasan4_text', '', ['class' => 'form-control', 'placeholder' => 'Alasan 4', 'cols' => 10]) }}
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-5 col-sm-5 col-xs-5">
                            <img src="{{ asset('landingpage/content/block/block3.png') }}" alt="Block 1" class="img-fluid">
                          </div>
                        </div>
                      </div>
                      <!-- Block 4 -->
                      <div class="block" style="background: #dedede; padding: 10px">
                        <h4>Block 4 - Memperkenalkan Versi 1</h4>
                        <div class="clearfix"></div>
                        <div class="row">
                          <div class="col-md-7 col-sm-7 col-xs-7">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Background:</label></div>
                                <div class="col-md-8">
                                  {{ Form::text('block4_bg', '', ['class'=> 'form-control cp2', 'placeholder' => 'Background', 'autocomplete' => 'off']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Headline Utama:</label></div>
                                <div class="col-md-8">
                                  {{ Form::text('block4_bg_headline', '', ['class'=> 'form-control cp2', 'placeholder' => 'Headline', 'autocomplete' => 'off']) }}
                                  <br>
                                  {{ Form::textarea('block4_text_headline', '', ['class' => 'form-control textarea', 'placeholder' => 'Headline Utama', 'autocomplete' => 'off']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Headline Desc:</label></div>
                                <div class="col-md-8">
                                  {{ Form::textarea('block4_text_headline_desc', '', ['class' => 'form-control', 'placeholder' => 'Headline Deskripsi', 'autocomplete' => 'off']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Image:</label></div>
                                <div class="col-md-8">
                                  {{ Form::file('block4_image', ['class'=> 'dropify', 'data-show-loader' => 'false', 'autocomplete' => 'off']) }}
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-5 col-sm-5 col-xs-5">
                            <img src="{{ asset('landingpage/content/block/block4.png') }}" alt="Block 1" class="img-fluid">
                          </div>
                        </div>
                      </div>
                      <!-- Block 5 -->
                      <div class="block" style="background: #dedede; padding: 10px">
                        <h4>Block 5 - Bikin Ngiler</h4>
                        <div class="clearfix"></div>
                        <div class="row">
                          <div class="col-md-7 col-sm-7 col-xs-7">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4">
                                  <label class="form-control-label">Background:</label>
                                </div>
                                <div class="col-md-8">
                                  {{ Form::text('block5_bg', '', ['class'=> 'form-control cp2', 'placeholder' => 'Background', 'autocomplete' => 'off']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-control-label">Text Bikin Ngiler:</label>
                              {{ Form::textarea('block5_text', '', ['class' => 'form-control textarea', 'placeholder' => 'Text Bikin Ngiler', 'autocomplete' => 'off']) }}
                            </div>
                          </div>
                          <div class="col-md-5 col-sm-5 col-xs-5">
                            <img src="{{ asset('landingpage/content/block/block5.png') }}" alt="Block 1" class="img-fluid">
                          </div>
                        </div>
                      </div>
                      <!-- Block 6 -->
                      <div class="block" style="background: #dedede; padding: 10px">
                        <h4>Block 6 - Produk</h4>
                        <div class="clearfix"></div>
                        <div class="row">
                          <div class="col-md-7 col-sm-7 col-xs-7">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4">
                                  <label class="form-control-label">Background:</label>
                                </div>
                                <div class="col-md-8">
                                  {{ Form::text('block6_bg', '', ['class'=> 'form-control cp2', 'placeholder' => 'Background', 'autocomplete' => 'off']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-control-label">Text Headline:</label>
                              {{ Form::textarea('block6_text_headline', '', ['class' => 'form-control textarea', 'placeholder' => 'Text Headline', 'autocomplete' => 'off']) }}
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Image:</label></div>
                                <div class="col-md-8">
                                  {{ Form::file('block6_image', ['class'=> 'dropify', 'data-show-loader' => 'false', 'autocomplete' => 'off']) }}
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-5 col-sm-5 col-xs-5">
                            <img src="{{ asset('landingpage/content/block/block6.png') }}" alt="Block 1" class="img-fluid">
                          </div>
                        </div>
                      </div>
                      <!-- Block 7 -->
                      <div class="block" style="background: #dedede; padding: 10px">
                        <h4>Block 7 - FAQ</h4>
                        <div class="clearfix"></div>
                        <div class="row">
                          <div class="col-md-7 col-sm-7 col-xs-7">
                            <div class="form-group">
                              <label class="form-control-label">FAQ:</label>
                              {{ Form::textarea('block7_faq', '', ['class' => 'form-control textarea', 'placeholder' => 'FAQ', 'autocomplete' => 'off']) }}
                            </div>
                          </div>
                          <div class="col-md-5 col-sm-5 col-xs-5">
                            <img src="{{ asset('landingpage/content/block/block7.png') }}" alt="Block 1" class="img-fluid">
                          </div>
                        </div>
                      </div>
                      <!-- Block 8 -->
                      <div class="block" style="background: #dedede; padding: 10px">
                        <h4>Block 8 - Call To Action</h4>
                        <div class="clearfix"></div>
                        <div class="row">
                          <div class="col-md-7 col-sm-7 col-xs-7">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4">
                                  <label class="form-control-label">Background:</label>
                                </div>
                                <div class="col-md-8">
                                  {{ Form::text('block8_bg', '', ['class'=> 'form-control cp2', 'placeholder' => 'Background', 'autocomplete' => 'off']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-control-label">Text Headline:</label>
                              {{ Form::textarea('block8_headline', '', ['class' => 'form-control textarea', 'placeholder' => 'Headline Deskripsi', 'autocomplete' => 'off']) }}
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Button:</label></div>
                                <div class="col-md-8">
                                  {{ Form::text('block8_text_button', '', ['class'=> 'form-control', 'placeholder' => 'Button Text', 'autocomplete' => 'off']) }}
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                  {{ Form::text('block8_text_color_button', '', ['class'=> 'form-control cp2', 'placeholder' => 'Color Text', 'autocomplete' => 'off']) }}
                                </div>
                                <div class="col-md-4">
                                  {{ Form::text('block8_button_bg_color', '', ['class'=> 'form-control cp2', 'placeholder' => 'Background Button', 'autocomplete' => 'off']) }}
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-5 col-sm-5 col-xs-5">
                            <img src="{{ asset('landingpage/content/block/block8.png') }}" alt="Block 1" class="img-fluid">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="btn-group float-right">
                            <button id="prev2" class="btn btn-secondary btn-lg float-right">Prev</button>
                            <button id="next4" class="btn btn-primary btn-lg float-right">Next</button>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="tab-pane fade" id="share_wa">
                    <div class="card-body collapse show">

                      <div class="alert alert-info">
                        Teks yang Anda inputkan di form ini berfungsi akan otomatis terkirim saat calon leads Anda klik "Bagikan". <br><br>
                        Gunakan beberapa keyword di bawah ini: <br>
                        <ul>
                          <li>* = (bold)</li>
                          <li>~ = (teks coret)</li>
                          <li>_ = (teks miring)</li>
                        </ul>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="form-control-label">Teks Share Whatsapp:</label>
                            {{ Form::textarea('campaign_text_share', '', ['class'=> 'form-control', 'id' => 'campaign_text_share', 'placeholder' => 'Tulis teks share whatsapp', 'autocomplete' => 'off']) }}
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="btn-group float-right">
                            <button id="prev3" class="btn btn-secondary btn-lg float-right">Prev</button>
                            <button id="next5" class="btn btn-primary btn-lg float-right">Next</button>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="tab-pane fade" id="email">
                    <div class="card-body collapse show">

                      <div class="row">
                        <div class="col-md-12">
                          <div class="alert alert-info">
                            Teks yang Anda masukan di bawah ini akan digunakan untuk judul saat calon leads Anda harus melakukan konfirmasi email.
                            <br>
                            <br>
                            Contoh:
                            <br>
                            <br>
                            Selangkah lagi! Silahkan lakukan konfirmasi email untuk dapat bonusnya ...
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="form-control-label">Subjek Konfirmasi Email:</label>
                            {{ Form::text('campaign_subject_confirm_email', '', ['class'=> 'form-control', 'placeholder' => 'Tulis subjek konfirmasi email', 'autocomplete' => 'off']) }}
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="alert alert-info">
                            Teks yang Anda masukan di bawah ini akan menjadi badan email atau yang Akan dibaca oleh calon leads Anda. <br><br>Contoh: <br><br>Selangkah lagi untuk mendapatkan hadiah spesial dari saya. Klik tombol di bawah ini untuk konfirmasi email.
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="form-control-label">Teks Konfirmasi Email:</label>
                            {{ Form::textarea('campaign_confirm', '', ['class'=> 'form-control textarea', 'id' => 'campaign_form_thank', 'placeholder' => 'Tulis teks konfirmasi di email sebelum user subscribe', 'autocomplete' => 'off']) }}
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="alert alert-info">
                            Teks yang Anda masukan di bawah ini akan digunakan untuk judul saat calon leads Anda telah melakukan konfirmasi email.
                            <br>
                            <br>
                            Contoh:
                            <br>
                            <br>
                            Terima kasih telah subscribe! Silahkan ambil bonusnya...
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="form-control-label">Subjek Thank Email:</label>
                            {{ Form::text('campaign_subject_thank_email', '', ['class'=> 'form-control', 'placeholder' => 'Tulis subjek thank email', 'autocomplete' => 'off']) }}
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="alert alert-info">
                            Teks yang Anda masukan di bawah ini akan digunakan untuk isi badan email saat calon leads Anda berhasil konfirmasi email. Di bagian ini Anda bisa menyisipkan link tertentu sebagai bonus, hadiah, link download atau semacamnya.
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="form-control-label">Teks Thank Email:</label>
                            {{ Form::textarea('campaign_form_thank', '', ['class'=> 'form-control textarea', 'id' => 'campaign_form_thank', 'placeholder' => 'Tulis ucapan terima kasih di email', 'autocomplete' => 'off']) }}
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="btn-group float-right">
                            <button id="prev4" class="btn btn-secondary btn-lg float-right">Prev</button>
                            <button type="submit" id="submit" class="btn btn-success btn-lg float-right">Submit</button>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
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
@section('js')
<script src="{{ asset('template/metrical') }}/plugins/summernote/summernote-bs4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/js/bootstrap-colorpicker.min.js"></script> 
<script src="{{ asset('template/metrical') }}/plugins/dropify/js/dropify.min.js"></script>
<script>

$(document).ready(function(){
  $('.cp2').colorpicker({});
  $('.dropify').dropify({
    messages: {
      'default': 'Drag and drop a file here or click',
      'replace': 'Drag and drop or click to replace',
      'remove':  'Remove',
      'error':   'Ooops, something wrong happended.'
    }
  });
  $('#cp2').colorpicker();

  var status = true;
  $("#next2").click(function(){
    $('.nav-tabs a[href="#form"]').tab('show');
    return false;
  });
  $("#prev1").click(function(){
    $('.nav-tabs a[href="#general"]').tab('show');
    return false;
  });
  $("#next3").click(function(){
    $('.nav-tabs a[href="#template"]').tab('show');
    return false;
  });
  $("#prev2").click(function(){
    $('.nav-tabs a[href="#form"]').tab('show');
    return false;
  });
  $("#next4").click(function(){
    $('.nav-tabs a[href="#share_wa"]').tab('show');
    return false;
  });
  $("#prev3").click(function(){
    $('.nav-tabs a[href="#template"]').tab('show');
    return false;
  });
  $("#next5").click(function(){
    $('.nav-tabs a[href="#email"]').tab('show');
    return false;
  });
  $("#prev4").click(function(){
    $('.nav-tabs a[href="#share_wa"]').tab('show');
    return false;
  });
  $('.textarea').summernote({
    height: 350,
  });
})
</script>
@endsection
@include('partials.footer')  