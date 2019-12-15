@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Autoresponder</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Autoresponder</li>
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
                    {{ Form::model($auto, ['method' => 'PATCH','route' => ['autoresponders.update', $auto->auto_id]]) }}
                    <div class="card-header">
                        Edit Autoresponder
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('auto_title', 'Title') }}
                                    {{ Form::text('auto_title', $auto->auto_title, ['class' => 'form-control', 'placeholder' => 'Enter autoresponder title']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('auto_status', 'Status') }}
                                    {{ Form::select('auto_status', ['Active' => 'Active', 'Inactive' => 'Inactive'], $auto->auto_status, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('auto_content', 'Content') }}
                                    {{ Form::textarea('auto_content', $auto->auto_content, ['class' => 'form-control', 'placeholder' => 'Enter autoresponder content']) }}
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
