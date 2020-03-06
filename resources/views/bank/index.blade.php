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
            <h1 class="pd-0 mg-0 tx-20">Manajemen Bank</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Banks</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
          <div class="col-md-12 col-lg-12">
            <div class="card mg-b-20">
              <div class="card-header">
                <h4 class="card-header-title">
                    List Bank
                    @can('banks-create')
                        <a class="btn btn-info btn-sm float-right" href="{{ route('banks.create') }}">Tambah Bank</a>
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
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th width="10px" style="text-align:center">No</th>
                                <th>Logo Bank</th>
                                <th>Kode Bank</th>
                                <th>Nama Bank</th>
                                <th>No Rekening</th>
                                <th>Atas Nama</th>
                                <th>Status</th>
                                <th width="100px" style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($banks as $key => $bank)
                        <?php
                        // $bank->num_rows();
                        ?>
                        <tr class="text-center">
                            <td width="10px" style="text-align:center">{{ ++$i }}</td>
                            <td><img src="{{ asset('storage/'.$bank->bank_image) }}" width="50"></td>
                            <td>{{ $bank->bank_code }}</td>
                            <td>{{ $bank->bank_name }}</td>
                            <td>{{ $bank->bank_number }}</td>
                            <td>{{ $bank->bank_nasabah }}</td>
                            <td>{{ $bank->bank_status }}</td>
                            <td>
                            <div class="btn-group">
                                @can('banks-edit')
                                <a class="btn btn-light btn-sm" href="{{ route('banks.edit',$bank->id) }}"><i class="fa fa-edit"></i></a>
                                @endcan
                                @can('banks-delete')
                                <a class="btn btn-light btn-sm" href="{{ url('banks/destroy/'.$bank->id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa fa-trash"></i></a>
                                @endcan
                            </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
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
@include('partials.footer')  