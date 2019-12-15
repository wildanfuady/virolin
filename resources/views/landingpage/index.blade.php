@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Landing Pages</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Landing Pages</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                @can('landingpage-create')
                    <a class="btn btn-info btn-sm float-right" href="{{ route('landingpages.create') }}"> Create New Landing Page</a>
                @endcan
                List Landing Page
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
                                <th>Landing Page</th>
                                <th>Created Date</th>
                                <th>Status</th>
                                <th width="150px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($lp as $item)
                            <tr>
                                <td class="text-center">{{$no++}}</td>
                                <td>{{ $item->lp_name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->lp_status }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-info btn-sm" href="{{ route('landingpages.show',$item->lp_id) }}"><i class="fa fa-eye"></i></a>
                                        @can('landingpage-edit')
                                        <a class="btn btn-success btn-sm" href="{{ route('landingpages.edit', $item->lp_id) }}"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('landingpage-delete')
                                        <a class="btn btn-danger btn-sm" href="{{ url('landingpages/destroy/'.$item->lp_id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa fa-trash-alt"></i></a>
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

@foreach($lp as $data)
<!-- Modal Delete -->
<div class="modal" id="modalDelete{{ $data->lp_id}}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><i class="far fa-trash-alt"></i> Delete Subscriber</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus landing page <b>{{ $data->lp_name }}?</b>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <a href="{{ url('c/landingpage/delete/'.$data->lp_id) }}" class="btn btn-default">Delete</a>
      </div>

    </div>
  </div>
</div>
@endforeach

@endsection
