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
            <h1 class="pd-0 mg-0 tx-20">Manajemen User</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Users</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-100">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            List Data User
                            @can('users-create')
                                <a href="{{ route('users.create') }}" class="btn btn-info btn-sm float-right">Tambah User</a>
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
                        <div class="row mt-3 mb-3">
                            <div class="col-md-10">
                                <div class="form-group">
                                    {{ Form::text('search', $keyword, ['class' => 'form-control', 'placeholder' => 'Cari user ...', 'id' => 'search']) }}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button id="btn-search" class="btn btn-primary btn-block">Seacrh</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="10px" style="text-align:center">No</th>
                                        <th>Name</th>
                                        <th>Total DB</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Renewal</th>
                                        <th width="100px" style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td> {{$item->name}} </td>
                                        <td>
                                            @php
                                                $subscibe = \App\Subscribers::where('user_id', $item->id)->get();
                                                $subscibe_total = count($subscibe);
                                            @endphp
                                            {{ $subscibe_total }} of {{ $item->product->product_max_db }}
                                        </td>
                                        <td> {{$item->email}} </td>
                                        <td> {{$item->status}} </td>
                                        <td> {{ date('d-m-Y', strtotime($item->masa_aktif)) }} </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('users.show', $item->id) }}" class="btn btn-light btn-sm"><i class="fa fa-eye"></i></a>
                                                @can('users-edit')
                                                <a href="{{ route('users.edit', $item->id) }}" class="btn btn-light btn-sm"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('users-delete')
                                                <a href="{{ url('users/destroy/'.$item->id) }}" class="btn btn-sm btn-light" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
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
                                {{ $users->appends($_GET)->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function() {

        $("#search").keypress(function(event){
            if(event.keyCode == 13) { // kode enter
                filter();
            }
        });

        $("#btn-search").click(function(event){
            filter();
        });

        var filter = function(){
            var keyword = $("#search").val();
            console.log(keyword);

            window.location.replace("{{ route('users.index') }}?keyword=" + keyword);
        }
    });

</script>

@include('partials.footer')