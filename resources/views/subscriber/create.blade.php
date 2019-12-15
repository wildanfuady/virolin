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
        <div class="card">
            <div class="card-header">
                <i class="fa fa-users"></i> Create a new Subscriber </strong>
            </div>
            <div class="card-body">
                
            </div>
            <div class="card-footer">
                <a href="{{ url('subscribers') }}" class="btn btn-outline-info">Back</a>
            </div>
        </div>
    </div>
</div>

@endsection
