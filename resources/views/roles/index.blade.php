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
            <h1 class="pd-0 mg-0 tx-20">Manajement Role</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Roles</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-100">
                    <div class="card-header">
                        <h4 class="card-header-title">
                        List Data Role
                            @can('role-create')
                                <a class="btn btn-info btn-sm float-right" href="{{ route('roles.create') }}"> Tambah Role</a>
                            @endcan
                        </h4>
                    </div>
                    <div class="card-body collapse show">
                    
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
                        <table class="table table-bordered table-hover table-responsive-sm">
                            <thead>
                            <tr>
                                <th width="10px">No</th>
                                <th>Role</th>
                                <th width="100px" style="text-align:center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $key => $role)
                            <tr>
                                <td style="text-align:center">{{ ++$i }}</td>
                                <td>{{ $role->name }}</td>
                                <td style="text-align:center">
                                <div class="btn-group">
                                    <a class="btn btn-light btn-sm" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye"></i></a>
                                    @can('role-edit')
                                    <a class="btn btn-light btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('role-delete')
                                    <a class="btn btn-light btn-sm" href="{{ url('roles/destroy/'.$role->id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa fa-trash"></i></a>
                                    @endcan
                                </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row float-right">
                            <div class="col-md-12">
                                {{ $roles->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.footer')  
