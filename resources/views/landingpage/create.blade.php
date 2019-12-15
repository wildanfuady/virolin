@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Landing Pages</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Landing Pages</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
    <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h3 class="card-title p-3">Create Landing Page</h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">General</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Headline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Gambar / Video</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">CTA</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Page Fold</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_6" data-toggle="tab">Link</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_7" data-toggle="tab">Deskripsi</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_8" data-toggle="tab">Testimoni</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab_9" data-toggle="tab">Trust Elemen</a></li>
                </ul>
              </div><!-- /.card-header -->
              {{ Form::open(['route' => 'landingpages.store', 'files' => true]) }}
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">

                          {{ Form::label('lp_title', 'Title') }}
                          {{ Form::text('lp_title', '', ['class' => 'form-control', 'placeholder' => 'Enter title landing page']) }}

                        </div>

                        <div class="form-group">

                          {{ Form::label('lp_slug', 'Slug') }}
                          {{ Form::text('lp_slug', '', ['class' => 'form-control', 'placeholder' => 'Example: bonus-voucher-bulan-november']) }}

                        </div>

                        <div class="form-group">

                          {{ Form::label('lp_status', 'Status') }}
                          {{ Form::select('lp_status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}

                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">

                          {{ Form::label('list_sub_id', 'Choose List Subscriber') }}
                          {{ Form::select('list_sub_id', $list_sub, null, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}

                        </div>
                        <div class="form-group">

                          {{ Form::label('form_id', 'Choose List Form') }}
                          {{ Form::select('form_id', $form, null, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}

                        </div>
                        <div class="form-group">

                          {{ Form::label('auto_id', 'Choose List Autoresponder') }}
                          {{ Form::select('auto_id', $auto, null, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}

                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab_2">
                    <div class="row">
                      <div class="col-md-12">
                      {{ Form::label('lp_header_title', 'Layout') }}
                          <br>
                        <div class="row">
                          <div class="col-md-2 mb-3">
                              <div class="icheck-success d-inline">
                                  {{ Form::radio('lp_header_layout', 1, false, ['id' => 'radioSuccess1']) }}
                                  <label for="radioSuccess1">
                                    Layout 1
                                  </label>
                              </div>
                          </div>
                          <div class="col-md-2 mb-3">
                              <div class="icheck-success d-inline">
                                {{ Form::radio('lp_header_layout', 2, false, ['id' => 'radioSuccess2']) }}
                                  <label for="radioSuccess2">
                                    Layout 2
                                  </label>
                              </div>
                          </div>
                        </div>

                        <div class="form-group">

                          {{ Form::label('lp_header_title', 'Title') }}
                          {{ Form::text('lp_header_title', '', ['class' => 'form-control', 'placeholder' => 'Enter title headline']) }}

                        </div>

                        <div class="form-group">

                          {{ Form::label('lp_header_content', 'Content') }}
                          {{ Form::textarea('lp_header_content', '', ['class' => 'form-control textarea', 'placeholder' => '', 'rows' => 3]) }}

                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab_3">
                    Halaman Gambar / Video
                  </div>
                  <div class="tab-pane" id="tab_4">
                    Halaman CTA
                  </div>
                  <div class="tab-pane" id="tab_5">
                    Halaman Page Fold
                  </div>
                  <div class="tab-pane" id="tab_6">
                    Halaman Link
                  </div>
                  <div class="tab-pane" id="tab_7">
                    Halaman Deskripsi
                  </div>
                  <div class="tab-pane" id="tab_8">
                    Halaman Testimoni
                  </div>
                  <div class="tab-pane" id="tab_9">
                    Halaman Trust Element
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
              <div class="card-footer">
                <a href="{{ route('landingpages.index') }}" class="btn btn-outline-info">Back</a>
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
              </div>
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
    </div>
</div>

@endsection
