@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit List Subscriber</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit List Subscriber</li>
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
                    {{ Form::open(['url' => 'list-subscriber/update/'.$list->list_sub_id]) }}
                    <div class="card-header">
                        Edit a List Subscriber
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            {{ Form::label('group_name', 'Group Name') }}
                            {{ Form::text('group_name', $list->list_sub_name, ['class' => 'form-control', 'placeholder' => 'Enter Group Name']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('group_status', 'Group Status') }}
                            {{ Form::select('group_status', ['Active' => 'Active', 'Inactive' => 'Inactive'], $list->list_sub_status, ['class' => 'form-control', 'placeholder' => 'Choose One']) }}
                        </div>
                                
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('list-subscriber') }}" class="btn btn-outline-info">Back</a>
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
