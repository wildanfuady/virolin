@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">List Subscribers</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Subscribers</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                @can('mysubscriber-create')
                    <a class="btn btn-info btn-sm float-right" href="{{ route('mysubscribers.create') }}"> Create New Subscriber Group</a>
                @endcan
                List All Subscriber
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
                    <div class="col-md-11">
                        <div class="form-group">
                            {{ Form::text('search', $keyword, ['class' => 'form-control', 'placeholder' => 'Cari judul group ...', 'id' => 'search']) }}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button id="btn-search" class="btn btn-primary btn-block">Seacrh</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table_id">
                        <thead>
                            <tr class="bg-info">
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

                                $jumlah_sub = DB::table('subscribers')->where('user_id', $item->user_id)->where('list_sub_id', $item->list_sub_id)->count();
                                echo $jumlah_sub;

                                ?>
                                </td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}</td>
                                <td>{{ $item->list_sub_status }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-info btn-sm" href="{{ route('mysubscribers.show',$item->list_sub_id) }}"><i class="fa fa-eye"></i></a>
                                        @can('mysubscriber-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('mysubscribers.edit',$item->list_sub_id) }}"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('mysubscriber-delete')
                                        <a class="btn btn-danger btn-sm" href="{{ url('mysubscriber/destroy/'.$item->list_sub_id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa fa-trash-alt"></i></a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $mysubscribers->appends($_GET)->links() }}
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

            window.location.replace("{{ url('mysubscribers') }}?keyword=" + keyword);
        }
    });

</script>

@endsection
