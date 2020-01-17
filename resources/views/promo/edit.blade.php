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
            <h1 class="pd-0 mg-0 tx-20">Detail Promo</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Detail Promo</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-20">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Detail Promo
                        </h4>
                    </div>
                    {{ Form::model($promo, ['method' => 'PATCH','route' => ['promos.update', $promo->promo_id], 'files' => 'TRUE']) }}
                    <div class="card-body collapse show">
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
                            <div class="col-lg-6">

                                <div class="form-group">
                                    {{ Form::label('promo_title', 'Title') }}
                                    {{ Form::text('promo_title', $promo->promo_title, ['class'=> 'form-control', 'placeholder'=> 'Enter Promo Title']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_status', 'Status') }}
                                    {{ Form::select('promo_status', ['Active' => 'Active', 'Inactive' => 'Inactive'], $promo->promo_status, ['class'=> 'form-control', 'placeholder'=> 'Choose One']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_start', 'Start') }}
                                    {{ Form::text('promo_start', $promo->promo_start, ['class'=> 'form-control', 'placeholder'=> 'Enter Promo Start']) }}
                                </div>

                                <div class="form-group">
                                    {{ Form::label('promo_end', 'End') }}
                                    {{ Form::text('promo_end', $promo->promo_end, ['class'=> 'form-control', 'placeholder'=> 'Enter Promo End']) }}
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <div class="form-group">
                                    {{ Form::label('promo_content', 'Content') }}
                                    {{ Form::textarea('promo_content', $promo->promo_content, ['class'=> 'form-control textarea', 'placeholder'=> 'Enter Promo Content']) }}
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <a href="{{ url('promos') }}" class="btn btn-outline-info">Back</a>
                        &nbsp;
                        &nbsp;
                        <button type="submit" class="btn btn-primary float-right">Update</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.footer')