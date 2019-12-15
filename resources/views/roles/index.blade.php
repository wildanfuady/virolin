@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Roles</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Roles</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                @can('role-create')
                    <a class="btn btn-info btn-sm float-right" href="{{ route('roles.create') }}"> Create New Role</a>
                @endcan
                List Roles
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
                            <th width="10px">No</th>
                            <th>Name</th>
                            <th width="100px" style="text-align:center">Action</th>
                        </tr>
                        @foreach ($roles as $key => $role)
                        <tr>
                            <td style="text-align:center">{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td style="text-align:center">
                            <div class="btn-group">
                                <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye"></i></a>
                                @can('role-edit')
                                <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-edit"></i></a>
                                @endcan
                                @can('role-delete')
                                <a class="btn btn-danger btn-sm" href="{{ url('roles/destroy/'.$role->id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa fa-trash-alt"></i></a>
                                @endcan
                            </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="row float-right">
                    <div class="col-md-12">
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
