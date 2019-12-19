@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Testimonials</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Testimonials</li>
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
                    {{ Form::open(['route' => 'testimonials.store', 'files' => true]) }}
                    <div class="card-header">
                        Create a New Testimonial 
                    </div>
                    <div class="card-body">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('testimonial_who', 'Name') }}
                                    {{ Form::text('testimonial_who', '', ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('testimonial_as', 'As') }}
                                    {{ Form::text('testimonial_as', '', ['class' => 'form-control', 'placeholder' => 'Enter as, example: Manager at PT. ***']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('testimonial_status', 'Status') }}
                                    {{ Form::select('testimonial_status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('testimonial_image', 'Image') }}
                                    {{ Form::file('testimonial_image', ['class' => 'form-control']) }}
                                </div>
                            </div>
                            
                            <div class="col-md-6">

                                <div class="form-group">
                                    {{ Form::label('testimonial_content', 'Content') }}
                                    {{ Form::textarea('testimonial_content', '', ['class' => 'form-control', 'id' => 'testimonial']) }}
                                </div>

                            </div>
                        </div>
                            
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('testimonials.index') }}" class="btn btn-outline-info">Back</a>
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
    $('#testimonial').summernote({
        height: 200
    })
  });
</script>

@endsection
