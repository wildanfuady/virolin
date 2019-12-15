@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create List Subscriber</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create List Subscriber</li>
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
                    {{ Form::open(['url' => 'list-subscriber/store']) }}
                    <div class="card-header">
                        Create a New List Subscriber
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            {{ Form::label('group_name', 'Group Name') }}
                            {{ Form::text('group_name', '', ['class' => 'form-control', 'placeholder' => 'Enter Group Name']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('group_status', 'Group Status') }}
                            {{ Form::select('group_status', ['Active' => 'Active', 'Inactive' => 'Inactive'], null, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}
                        </div>
                                
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('list-subscriber') }}" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

@endsection
