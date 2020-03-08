@section('css')
<link type="text/css" rel="stylesheet" href="{{ asset('template/metrical') }}/plugins/sweet_alert/sweetalert.css">
@endsection
@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<div class="page-inner">
    <div id="main-wrapper">
        <div class="pageheader pd-t-25 pd-b-35">
            <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">My Subscribers</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">My Subscribers</a>
            </div>
        </div>
        <div class="row row-xs clearfix">
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-20">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            List Data My Subscriber
                        </h4>
                        @can('mysubscriber-create')
                            <a class="btn btn-info btn-sm" href="{{ route('mysubscribers.create') }}"> Tambah List Subscriber</a>
                        @endcan
                    </div>
                    <div class="card-body pd-t-0 pd-b-20 collapse show" id="collapse3">
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
                        <div class="{{ $class }} mt-3" id="alert-msg">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ $msg }}
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col-md-10">
                                <div class="form-group">
                                    {{ Form::text('search', $keyword, ['class' => 'form-control', 'placeholder' => 'Cari judul group ...', 'id' => 'search']) }}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button id="btn-search" class="btn btn-primary btn-block">Seacrh</button>
                            </div>
                        </div>
                        <table class="table table-hover table-responsive-sm table-bordered">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Group</th>
                                    <th>Total Subscriber</th>
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th width="150px" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mysubscribers as $item)
                                <tr>
                                    <td class="text-center">{{++$i}}</td>
                                    <td>{{ $item->list_sub_name }}</td>
                                    <td>
                                    <?php

                                    $jumlah_sub = DB::table('subscribers')->where('user_id', $item->user_id)->where('list_sub_id', $item->list_sub_id)->where('subscriber_status', 'valid')->count();
                                    echo $jumlah_sub;

                                    ?>
                                    </td>
                                    <td>{{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->list_sub_status }}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a class="btn btn-light btn-sm" href="{{ route('mysubscribers.show',$item->list_sub_id) }}"><i class="fa fa-eye"></i></a>
                                            @can('mysubscriber-edit')
                                            <a class="btn btn-light btn-sm" href="{{ route('mysubscribers.edit',$item->list_sub_id) }}"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @can('mysubscriber-delete')
                                            <a class="btn btn-light btn-sm" onclick="return swal_delete_alert('{{ url('mysubscriber/destroy/'.$item->list_sub_id) }}', 'Apakah Anda yakin ingin menghapus list subscriber <?= $item->list_sub_name ?> ini? \nJika ya, maka semua subscriber di list ini akan ikut terhapus.');"><i class="fa fa-trash"></i></a>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $mysubscribers->appends($_GET)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script src="{{ asset('template/metrical') }}/plugins/sweet_alert/sweetalert.min.js"></script>
<script>

    function swal_delete_alert(url, string){
        swal({
            title: "Warning!",
            text: string,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#5d78ff",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak"
        }, function() {
            window.location.href = url;
        });
    }

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

            window.location.replace("{{ url('mysubscribers') }}?keyword=" + keyword);
        }
    });

</script>
@endsection
@include('partials.footer')