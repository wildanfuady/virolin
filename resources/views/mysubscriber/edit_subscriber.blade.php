@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Subscribers</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Subscribers</li>
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
                    {{ Form::open(['url' => 'mysubscriber/new/store/'.$id]) }}
                    <div class="card-header">
                        Edit Subscriber
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
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

@endsection
