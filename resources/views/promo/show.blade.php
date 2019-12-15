@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Promo</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Detail Promo</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">

                        <div class="form-group">
                            {{ Form::label('promo_title', 'Title') }}
                            {{ Form::text('promo_title', $promo->promo_title, ['class'=> 'form-control', 'placeholder'=> 'Enter Promo Title', 'readonly']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('promo_status', 'Status') }}
                            {{ Form::text('promo_status', $promo->promo_status, ['class'=> 'form-control', 'placeholder'=> 'Enter Promo Title', 'readonly']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('promo_start', 'Start') }}
                            {{ Form::text('promo_start', $promo->promo_start, ['class'=> 'form-control', 'placeholder'=> 'Enter Promo Start', 'readonly']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('promo_end', 'End') }}
                            {{ Form::text('promo_end', $promo->promo_end, ['class'=> 'form-control', 'placeholder'=> 'Enter Promo End', 'readonly']) }}
                        </div>

                    </div>
                    <div class="col-lg-6">

                        <div class="form-group">
                            {{ Form::label('promo_content', 'Content') }}
                            <?php echo "$promo->promo_content"; ?>
                        </div>

                    </div>
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ url('promos') }}" class="btn btn-outline-info">Back</a>
            </div>
        </div>
    </div>
</div>

@endsection
