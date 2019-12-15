@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Autoresponders</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Autoresponders</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                @can('autoresponder-create')
                    <a class="btn btn-info btn-sm float-right" href="{{ route('autoresponders.create') }}"> Create New Autoresponder</a>
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
                <div class="table-responsive">
                    <table class="table table-bordered" id="table_id">
                        <thead>
                            <tr class="bg-info">
                                <th width="1%">No</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th width="150px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($auto as $item)
                            <tr>
                                <td class="text-center">{{$no++}}</td>
                                <td>{{ $item->auto_title }}</td>
                                <td>{{ $item->auto_status }}</td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-primary btn-sm" href="{{ route('autoresponders.show',$item->auto_id) }}"><i class="fa fa-eye"></i></a>
                                        @can('autoresponder-edit')
                                        <a class="btn btn-success btn-sm" href="{{ route('autoresponders.edit',$item->auto_id) }}"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('autoresponder-delete')
                                        <a class="btn btn-danger btn-sm" href="{{ url('autoresponders/destroy/'.$item->auto_id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa fa-trash-alt"></i></a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($auto as $item)
<!-- Modal Delete -->
<div class="modal" id="modalDelete-{{ $item->auto_id }}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><i class="far fa-trash-alt"></i> Delete Autoresponder</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus autoresponder <b>{{ $item->auto_title }}</b> ini?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <a href="{{ url('autoresponder/delete/'.$item->auto_id) }}" class="btn btn-default">Delete</a>
      </div>

    </div>
  </div>
</div>
@endforeach

@endsection
