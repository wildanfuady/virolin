@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<div class="page-inner">
    <div id="main-wrapper">
        <div class="pageheader pd-t-25 pd-b-35">
            <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">Edit Data Subscriber</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Edit Data Subscriber</a>
            </div>
        </div>
        <div class="row row-xs clearfix">
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-20">
                    {{ Form::open(['url' => 'mysubscriber/new/store/'.$id]) }}
                    <div class="card-header">
                        Edit Subscriber
                    </div>
                    <div class="card-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Terjadi kesalahan saat menginput data.<br><br>
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                        @endif

                        {{ Form::hidden('id', $id, ['class'=>'form-control']) }}
                        
                        <div class="form-group">
                        
                            {{ Form::label('sub_name', 'Name') }}
                            {{ Form::text('sub_name', '', ['class' => 'form-control', 'placeholder' => 'Enter Subscriber Name']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('sub_email', 'Email') }}
                            {{ Form::text('sub_email', '', ['class' => 'form-control', 'placeholder' => 'Enter Subscriber Email', 'type' => 'email']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('sub_hp', 'No Hp') }}
                            {{ Form::number('sub_hp', '', ['class' => 'form-control', 'placeholder' => '---- ---- ----']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('sub_alamat', 'Alamat') }}
                            {{ Form::textarea('sub_alamat', '', ['class' => 'form-control', 'placeholder' => 'Enter Subscriber Address']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('sub_lp', 'Landing Page') }}
                            {{ Form::select('sub_lp', $lp, null, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}
                        </div>
                        
                        <div class="form-group">

                            {{ Form::label('sub_status', 'Status') }}
                            {{ Form::select('sub_status', ['Valid' => 'Valid', 'Invalid' => 'Invalid'], null, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}
                        </div>
                                
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('mysubscribers.index') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Update</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.footer')