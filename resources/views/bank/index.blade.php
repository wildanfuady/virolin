@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Banks</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Banks</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                @can('banks-create')
                    <a class="btn btn-info btn-sm float-right" href="{{ route('banks.create') }}"> Create New Bank</a>
                @endcan
                List Bank
            </div>
            <div class="card-body">
                <?php
                    if($msg_success = Session::get('success')){
                        $class = "alert alert-success alert-dismissable";
                        $msg = $msg_success;
                    } else if($msg_info = Session::get('info')){
                        $class = "alert alert-info alert-dismissable";
                        $msg = $msg_info;
                    } else if($msg_warning = Session::get('warning')){
                        $class = "alert alert-warning alert-dismissable";
                        $msg = $msg_warning;
                    } else {
                        $class = "d-none";
                        $msg = "";
                    }
                ?>
                <div class="{{ $class }}" id="alert-msg">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ $msg }}
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr class="bg-info">
                            <th width="10px" style="text-align:center">No</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th width="100px" style="text-align:center">Action</th>
                        </tr>
                        @foreach ($banks as $key => $bank)
                        <tr>
                            <td width="10px" style="text-align:center">{{ ++$i }}</td>
                            <td>{{ $bank->bank_name }}</td>
                            <td>{{ $bank->bank_status }}</td>
                            <td>
                            <div class="btn-group">
                                <a class="btn btn-info btn-sm" href="{{ route('banks.show',$bank->id) }}"><i class="fa fa-eye"></i></a>
                                @can('banks-edit')
                                <a class="btn btn-primary btn-sm" href="{{ route('banks.edit',$bank->id) }}"><i class="fa fa-edit"></i></a>
                                @endcan
                                @can('banks-delete')
                                <a class="btn btn-danger btn-sm" href="{{ url('banks/destroy/'.$bank->id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa fa-trash-alt"></i></a>
                                @endcan
                            </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="row float-right">
                    <div class="col-md-12">
                        {{ $banks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
