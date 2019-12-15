@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Landing Page</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create Landing Page</li>
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
                <h3 class="card-title p-3">Step #2 - Headline</h3>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item"><a class="nav-link" href="{{ url('landingpage/create-step-1') }}">General</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ url('landingpage/create-step-2') }}">Headline</a></li>
                  <li class="nav-item"><a class="nav-link active" href="{{ url('landingpage/create-step-3') }}" data-toggle="tab">Gambar / Video</a></li>
                  <li class="nav-item"><a class="nav-link disabled" href="#tab_4" data-toggle="tab">CTA</a></li>
                  <li class="nav-item"><a class="nav-link disabled" href="#tab_5" data-toggle="tab">Page Fold</a></li>
                  <li class="nav-item"><a class="nav-link disabled" href="#tab_6" data-toggle="tab">Link</a></li>
                  <li class="nav-item"><a class="nav-link disabled" href="#tab_7" data-toggle="tab">Deskripsi</a></li>
                  <li class="nav-item"><a class="nav-link disabled" href="#tab_8" data-toggle="tab">Testimoni</a></li>
                  <li class="nav-item"><a class="nav-link disabled" href="#tab_9" data-toggle="tab">Trust Elemen</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <?php
                    if($msg_success = Session::get('success')){
                        $class = "alert alert-success alert-dismissable";
                        $msg = $msg_success;
                    } else if($msg_info = Session::get('warning')){
                        $class = "alert alert-info alert-dismissable";
                        $msg = $msg_info;
                    } else {
                        $class = "d-none";
                        $msg = "";
                    }
                ?>
                <div class="{{ $class }}" id="alert-msg">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ $msg }}
                </div>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    {{ Form::open(['url' => 'landingpage/act-create-step-3']) }}
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
                                {{ Form::radio('layout', 1, false, ['id' => 'radioSuccess2']) }}
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
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <button type="submit" class="btn btn-success">Simpan dan Lanjutkan</button>
                        </div>
                      </div>
                    </div>
                    {{ Form::close() }}
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
    </div>
</div>

@endsection
