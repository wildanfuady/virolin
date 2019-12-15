@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Forms</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Forms</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    {{ Form::model($form, ['method' => 'PATCH','route' => ['forms.update', $form->form_id]]) }}
                    <div class="card-header">
                        Edit a Form
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('form_title', 'Title') }}
                                    {{ Form::text('form_title', $form->form_title, ['class' => 'form-control', 'placeholder' => 'Enter autoresponder title']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('form_status', 'Status') }}
                                    {{ Form::select('form_status', ['Active' => 'Active', 'Inactive' => 'Inactive'], $form->form_status, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}
                                </div>
                            </div>
                            
                            <div class="col-md-6">

                                <div class="form-group">
                                    {{ Form::label('form_hp', 'Add Handphone to Form') }}
                                    {{ Form::select('form_hp', ['Ya' => 'Ya', 'Tidak' => 'Tidak'], $form->form_no_hp, ['class' => 'form-control']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('form_address', 'Add Address to Form') }}
                                    {{ Form::select('form_address', ['Ya' => 'Ya', 'Tidak' => 'Tidak'], $form->form_address, ['class' => 'form-control']) }}
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('autoresponders') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Update</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<script>
  $(function () {
    //Add text editor
    $('#auto_content').summernote({
        height: 300
    })
  })
</script>

@endsection
