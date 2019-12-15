@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Autoresponders</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Autoresponders</li>
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
                    {{ Form::open(['route' => 'autoresponders.store']) }}
                    <div class="card-header">
                        Create Autoresponder
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('auto_title', 'Title') }}
                                    {{ Form::text('auto_title', '', ['class' => 'form-control', 'placeholder' => 'Enter autoresponder title']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('auto_status', 'Status') }}
                                    {{ Form::select('auto_status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}
                                </div>
                            </div>
                            <?php
                            $content = '
                                <h5>Hello,</h5>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro nostrum atque ex fugit a saepe laudantium cum qui dolor laboriosam. Optio a id possimus. Voluptatibus vitae commodi neque temporibus hic?</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro nostrum atque ex fugit a saepe laudantium cum qui dolor laboriosam. Optio a id possimus. Voluptatibus vitae commodi neque temporibus hic?</p>
                            ';
                            ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('auto_content', 'Content') }}
                                    {{ Form::textarea('auto_content', $content, ['class' => 'form-control', 'placeholder' => 'Enter autoresponder content']) }}
                                </div>
                            </div>
                        </div>
                            
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('autoresponders.index') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
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
