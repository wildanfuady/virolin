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
                {!! Form::model($testimonial, ['method' => 'PATCH', 'files' => true, 'route' => ['testimonials.update', $testimonial->testimoni_id]]) !!}
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
                                <div class="row">
                                    <div class="col-md-3 col-3">
                                        <img src="{{ asset('storage/'. $testimonial->testimoni_image) }}" class="img-fluid">    
                                    </div>
                                    <div class="col-md-9 col-9">
                                        <div class="form-group">
                                            {{ Form::label('testimonial_who', 'Name') }}
                                            {{ Form::text('testimonial_who', $testimonial->testimoni_who, ['class' => 'form-control', 'placeholder' => 'Enter Name']) }}
                                        </div>

                                        <div class="form-group">
                                            {{ Form::label('testimonial_as', 'As') }}
                                            {{ Form::text('testimonial_as', $testimonial->testimoni_as, ['class' => 'form-control', 'placeholder' => 'Enter as, example: Manager at PT. ***']) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('testimonial_status', 'Status') }}
                                    {{ Form::select('testimonial_status', ['Active' => 'Active', 'Inactive' => 'Inactive'], $testimonial->testimoni_status, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('testimonial_image', 'Image') }}
                                    {{ Form::file('testimonial_image', ['class' => 'form-control']) }}
                                </div>
                            </div>
                            
                            <div class="col-md-6">

                                <div class="form-group">
                                    {{ Form::label('testimonial_content', 'Content') }}
                                    {{ Form::textarea('testimonial_content', $testimonial->testimoni_content, ['class' => 'form-control', 'id' => 'testimonial']) }}
                                </div>

                            </div>
                        </div>
                            
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('testimonials.index') }}" class="btn btn-outline-info">Back</a>
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
    $('#testimonial').summernote({
        height: 200
    })
  })
</script>

@endsection
