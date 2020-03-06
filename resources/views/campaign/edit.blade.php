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
            <h1 class="pd-0 mg-0 tx-20">Edit Campaign</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Edit Campaign</a>
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
                            {{ Form::text('campaign_name', $campaign->campaign_name, ['class'=> 'form-control', 'id' => 'campaign_lp_name', 'placeholder' => 'Masukan Nama / Judul Landing Page', 'required']) }}
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="form-control-label">Pilih List Subscriber:</label>
                            {{ Form::select('campaign_group', $list_sub, $campaign->campaign_group, ['class'=> 'form-control', 'id' => 'campaign_form_telp']) }}
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
                  <div class="tab-pane fade" id="template">
                    <div class="card-body collapse show">
                      Test Template
                      <input type="hidden" name="template_id" value="{{ $campaign->template_id }}">
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
                                  {{ Form::text('block1_bg', $campaign->block1_bg, ['class'=> 'form-control cp2', 'placeholder' => '#000000']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Headline 1:</label></div>
                                <div class="col-md-8">
                                  {{ Form::text('block1_headline1', $campaign->block1_headline1, ['class'=> 'form-control', 'placeholder' => 'Headline 1']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Headline 2:</label></div>
                                <div class="col-md-8">
                                  {{ Form::textarea('block1_headline2', $campaign->block1_headline2, ['class' => 'form-control textarea', 'placeholder' => 'Headline 2']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Button:</label></div>
                                <div class="col-md-8">
                                  {{ Form::text('block1_btn_text', $campaign->block1_btn_text, ['class'=> 'form-control', 'placeholder' => 'Button Text']) }}
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                  {{ Form::text('block1_btn_text_color', $campaign->block1_btn_text_color, ['class'=> 'form-control cp2', 'placeholder' => 'Color Text']) }}
                                </div>
                                <div class="col-md-4">
                                  {{ Form::text('block1_btn_text_bg', $campaign->block1_btn_text_bg, ['class'=> 'form-control cp2', 'placeholder' => 'Background Text']) }}
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
                              {{ Form::textarea('block2_text_edukasi', $campaign->block2_text_edukasi, ['class' => 'form-control textarea', 'placeholder' => 'Text Edukasi']) }}
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
                                  {{ Form::text('block3_bg', $campaign->block3_bg, ['class'=> 'form-control cp2', 'placeholder' => 'Background']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Headline:</label></div>
                                <div class="col-md-8">
                                  {{ Form::text('block3_headline', $campaign->block3_headline, ['class'=> 'form-control', 'placeholder' => 'Headline']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Image:</label></div>
                                <div class="col-md-8">
                                  {{ Form::file('block3_image', ['class'=> 'dropify', 'data-show-loader' => 'false']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Alasan 1:</label></div>
                                <div class="col-md-3">
                                  {{ Form::select('block3_alasan1_icon', ['' => 'Pilih Icon', 'search' => 'Search', 'search_data' => 'Search Data', 'safety' => 'Safety', 'broadcast' => 'Broadcasts', 'gear' => 'Gear', 'download' => 'Download'], $campaign->block3_alasan1_icon, ['class' => 'form-control']) }}
                                </div>
                                <div class="col-md-5">
                                  {{ Form::textarea('block3_alasan1_text', $campaign->block3_alasan1_text, ['class' => 'form-control', 'placeholder' => 'Alasan 1', 'cols' => 10]) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Alasan 2:</label></div>
                                <div class="col-md-3">
                                  {{ Form::select('block3_alasan2_icon', ['' => 'Pilih Icon', 'search' => 'Search', 'search_data' => 'Search Data', 'safety' => 'Safety', 'broadcast' => 'Broadcasts', 'gear' => 'Gear', 'download' => 'Download'], $campaign->block3_alasan2_icon, ['class' => 'form-control']) }}
                                </div>
                                <div class="col-md-5">
                                  {{ Form::textarea('block3_alasan2_text', $campaign->block3_alasan2_text, ['class' => 'form-control', 'placeholder' => 'Alasan 2', 'cols' => 10]) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Alasan 3:</label></div>
                                <div class="col-md-3">
                                  {{ Form::select('block3_alasan3_icon', ['' => 'Pilih Icon', 'search' => 'Search', 'search_data' => 'Search Data', 'safety' => 'Safety', 'broadcast' => 'Broadcasts', 'gear' => 'Gear', 'download' => 'Download'], $campaign->block3_alasan3_icon, ['class' => 'form-control']) }}
                                </div>
                                <div class="col-md-5">
                                  {{ Form::textarea('block3_alasan3_text', $campaign->block3_alasan3_text, ['class' => 'form-control', 'placeholder' => 'Alasan 3', 'cols' => 10]) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Alasan 4:</label></div>
                                <div class="col-md-3">
                                  {{ Form::select('block3_alasan4_icon', ['' => 'Pilih Icon', 'search' => 'Search', 'search_data' => 'Search Data', 'safety' => 'Safety', 'broadcast' => 'Broadcasts', 'gear' => 'Gear', 'download' => 'Download'], $campaign->block3_alasan4_icon, ['class' => 'form-control']) }}
                                </div>
                                <div class="col-md-5">
                                  {{ Form::textarea('block3_alasan4_text', $campaign->block3_alasan4_text, ['class' => 'form-control', 'placeholder' => 'Alasan 4', 'cols' => 10]) }}
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
                                <div class="col-md-4"><label class="form-control-label">Background Headline:</label></div>
                                <div class="col-md-8">
                                  {{ Form::text('block4_bg', $campaign->block4_bg, ['class'=> 'form-control cp2', 'placeholder' => 'Color Text']) }}
                                  <br>
                                  {{ Form::text('block4_bg_headline', $campaign->block4_bg_headline, ['class'=> 'form-control cp2', 'placeholder' => 'Background Headline']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Headline Utama:</label></div>
<<<<<<< HEAD
                                <div class="col-md-8">
=======
                                <div class="col-md-8">\
>>>>>>> c85c3d92f53d27847a1e21d41daad7a86e0ac97f
                                  {{ Form::textarea('block4_text_headline', $campaign->block4_text_headline_desc, ['class' => 'form-control textarea', 'placeholder' => 'Headline Utama']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Headline Desc:</label></div>
                                <div class="col-md-8">
                                  {{ Form::textarea('block4_text_headline_desc', $campaign->block4_text_headline, ['class' => 'form-control', 'placeholder' => 'Headline Deskripsi']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Image:</label></div>
                                <div class="col-md-8">
                                  {{ Form::file('block4_image', ['class'=> 'dropify', 'data-show-loader' => 'false']) }}
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
                                  {{ Form::text('block5_bg', $campaign->block5_bg, ['class'=> 'form-control cp2', 'placeholder' => 'Background']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-control-label">Text Bikin Ngiler:</label>
                              {{ Form::textarea('block5_text', $campaign->block5_text, ['class' => 'form-control textarea', 'placeholder' => 'Text Bikin Ngiler']) }}
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
                                  {{ Form::text('block6_bg', $campaign->block6_bg, ['class'=> 'form-control cp2', 'placeholder' => 'Background']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-control-label">Text Headline:</label>
                              {{ Form::textarea('block6_text_headline', $campaign->block6_text_headline, ['class' => 'form-control textarea', 'placeholder' => 'Text Headline']) }}
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Image:</label></div>
                                <div class="col-md-8">
                                  {{ Form::file('block6_image', ['class'=> 'dropify', 'data-show-loader' => 'false']) }}
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
                              {{ Form::textarea('block7_faq', $campaign->block7_faq, ['class' => 'form-control textarea', 'placeholder' => 'FAQ']) }}
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
                                  {{ Form::text('block8_bg', $campaign->block8_bg, ['class'=> 'form-control cp2', 'placeholder' => 'Background']) }}
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="form-control-label">Text Headline:</label>
                              {{ Form::textarea('block8_headline', $campaign->block8_headline, ['class' => 'form-control textarea', 'placeholder' => 'Headline Deskripsi']) }}
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"><label class="form-control-label">Button:</label></div>
                                <div class="col-md-8">
                                  {{ Form::text('block8_text_button', $campaign->block8_text_button, ['class'=> 'form-control', 'placeholder' => 'Button Text']) }}
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                  {{ Form::text('block8_text_color_button', $campaign->block8_text_color_button, ['class'=> 'form-control', 'placeholder' => 'Color Text']) }}
                                </div>
                                <div class="col-md-4">
                                  {{ Form::text('block8_button_bg_color', $campaign->block8_button_bg_color, ['class'=> 'form-control cp2', 'placeholder' => 'Background Button']) }}
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
                      <?php 
                      // $text = $campaign->campaign_teks_share;
                      // $char1 = str_replace("%20", " ", $text);
                      // $char2 = str_replace("<br%20/>", "<br />", $char1);
                      ?>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="form-control-label">Teks Share Whatsapp:</label>
                            {{ Form::textarea('campaign_text_share', $campaign->campaign_teks_share, ['class'=> 'form-control', 'id' => 'campaign_text_share', 'placeholder' => 'Tulis teks share whatsapp', 'required']) }}
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
                          <div class="form-group">
                            <label class="form-control-label">Subjek Konfirmasi Email:</label>
                            {{ Form::text('campaign_subject_confirm_email', $campaign->campaign_subject_confirm_email, ['class'=> 'form-control', 'placeholder' => 'Tulis subjek konfirmasi email']) }}
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
                            <label class="form-control-label">Subjek Thank Email:</label>
                            {{ Form::text('campaign_subject_thank_email', $campaign->campaign_subject_thank_email, ['class'=> 'form-control', 'placeholder' => 'Tulis subjek thank email']) }}
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