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
            <h1 class="pd-0 mg-0 tx-20">Detail List Subscriber</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">List Subscriber</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-20">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            List Subscriber
                        </h4>
                        @can('mysubscriber-detail-export')
                        <a class="btn btn-success btn-sm" href="{{ url('mysubscriber/'.$id.'/export') }}"> Export CSV</a>&nbsp;&nbsp;
                        @endcan
                        @can('mysubscriber-detail-create')
                            <a class="btn btn-info btn-sm" href="{{ url('mysubscriber/new/create/'.$id) }}"> Tambah Subscriber</a>
                        @endcan
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
                        <div class="row mt-3 mb-3">
                            <div class="col-md-10">
                                <div class="form-group">
                                    {{ Form::text('search', $keyword, ['class' => 'form-control', 'placeholder' => 'Cari subscriber ...', 'id' => 'search']) }}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button id="btn-search" class="btn btn-primary btn-block">Seacrh</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table_id">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Campaign</th>
                                        <th>Status</th>
                                        <th width="150px" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($detail_list_subscribers as $item)
                                    <tr>
                                        <td class="text-center">{{$no++}}</td>
                                        <td>{{ $item->subscriber_name }}</td>
                                        <td>{{ $item->subscriber_email }}</td>
                                        <td>{{ $item->campaign_name }}</td>
                                        <td>{{ $item->subscriber_status }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                @can('mysubscriber-delete')
                                                <a class="btn btn-light btn-sm" onclick="return swal_delete_alert('{{ url('mysubscriber/destroy-subscriber/'.$item->id) }}', 'Apakah Anda yakin ingin menghapus subscriber \nbernama <?=$item->subscriber_name ?>?');"><i class="fa fa-trash"></i></a>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $detail_list_subscribers->appends($_GET)->links() }}
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

            window.location.replace("{{ route('mysubscribers.show', $id) }}?keyword=" + keyword);
        }
    });

</script>
@endsection
@include('partials.footer')
