@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/sweet_alert/sweetalert.css">
@endsection
@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<div class="page-inner">
    <div id="main-wrapper">
        <div class="pageheader pd-t-25 pd-b-35">
            <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">Create List Subscriber</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Create List Subscriber</a>
            </div>
        </div>
        <div class="row row-xs clearfix">
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-100">
                {{ Form::open(['route' => 'mysubscribers.store', 'id' => 'create_list_subscribers']) }}
                    <div class="card-header">
                        <h4 class="card-header-title">
                            Create List Subscriber
                        </h4>
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

                        <div class="form-group">
                            {{ Form::label('group_name', 'Group Name') }}
                            {{ Form::text('group_name', '', ['class' => 'form-control', 'placeholder' => 'Enter Group Name', 'autocomplete' => 'off', 'id' => 'group_name']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('group_status', 'Group Status') }}
                            {{ Form::select('group_status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control', 'placeholder' => 'Choose One', 'id' => 'group_status']) }}
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <a href="{{ route('mysubscribers.index') }}" class="btn btn-outline-info">Back</a>
                                <button type="button" id="btn_submit_create_list_subscribers" class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </div>
                        &nbsp;
                                
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script src="{{ asset('template/metrical') }}/plugins/sweet_alert/sweetalert.min.js"></script>
<script src="{{ asset('template/metrical') }}/js/submit.js"></script>	
@endsection
@include('partials.footer')