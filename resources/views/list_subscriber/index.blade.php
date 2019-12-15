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
                <i class="fa fa-users"></i> List All Subscriber
            </div>
            <div class="card-body">
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
                            @php $no = 1; @endphp
                            @foreach ($list as $item)
                            <tr>
                                <td class="text-center">{{$no++}}</td>
                                <td>{{ $item->list_sub_name }}</td>
                                <td>0 Manual</td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}</td>
                                <td>{{ $item->list_sub_status }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                    <a href="{{ url('list-subscriber/show/'.$item->list_sub_id) }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="{{ url('list-subscriber/edit/'.$item->list_sub_id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete-{{ $item->list_sub_id }}"><i class="far fa-trash-alt"></i></button>
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

@foreach($list as $item)
<!-- Modal Delete -->
<div class="modal" id="modalDelete-{{ $item->list_sub_id }}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><i class="far fa-trash-alt"></i> Delete List Subscriber</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus list subscriber <b>{{ $item->list_sub_name }}</b> ini?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <a href="{{ url('list-subscriber/delete/'.$item->list_sub_id) }}" class="btn btn-default">Delete</a>
      </div>

    </div>
  </div>
</div>
@endforeach

@endsection
