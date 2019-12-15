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
                <i class="fa fa-users"></i> List All Subscriber From Landingpage <strong>{{ $lp->lp_name }}</strong>
                <div class="float-right">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAdd">Add Subcriber</button>
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalImport">Import Subcriber</button>
                </div>
            </div>
            <div class="card-body">
                @if($message = Session::get('success'))
                <div class="alert alert-success alert-dismissable" id="alert-msg">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ $message }}
                </div>
                @elseif($message = Session::get('info'))
                <div class="alert alert-info alert-dismissable" id="alert-msg">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ $message }}
                </div>
                @elseif($message = Session::get('warning'))
                <div class="alert alert-warning alert-dismissable" id="alert-msg">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ $message }}
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="table_id">
                        <thead>
                            <tr class="bg-info">
                                <th width="1%">No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($subscribers as $item)
                            <tr>
                                <td class="text-center">{{$no++}}</td>
                                <td>{{ $item->subscriber_name }}</td>
                                <td>{{ $item->subscriber_email }}</td>
                                <td>{{ $item->subscriber_nohp }}</td>
                                <td>{{ $item->subscriber_alamat }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelete-{{ $item->id }}"><i class="far fa-trash-alt"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ url('c/subscribers') }}" class="btn btn-outline-info">Back</a>
            </div>
        </div>
    </div>
</div>


<!-- Modal Add -->
<div class="modal" id="modalAdd">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create Subscriber</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      {{ Form::open(['url' => 'c/subscriber/add/'.$lp_id]) }}
      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
            {{ Form::label('subscriber_name', 'Full Name *') }}
            {{ Form::text('subscriber_name', '', ['class' => 'form-control', 'placeholder' => 'Enter Full Name', 'required']) }}
        </div>

        <div class="form-group">
            {{ Form::label('subscriber_email', 'Email *') }}
            {{ Form::email('subscriber_email', '', ['class' => 'form-control', 'placeholder' => 'Enter Email Address', 'required']) }}
        </div>

        <div class="form-group">
            <button class="btn btn-default" type="button" id="create-phone"><i class="fa fa-plus"></i> Add Phone</button>
        </div>

        <div class="form-group" id="form-phone">
            {{ Form::label('subscriber_phone', 'Phone') }}
            {{ Form::number('subscriber_phone', '', ['class' => 'form-control', 'placeholder' => 'Enter Phone Number']) }}
        </div>

        <div class="form-group">
            <button class="btn btn-default" type="button" id="create-address"><i class="fa fa-plus"></i> Add Address</button>
        </div>

        <div class="form-group" id="form-address">
            {{ Form::label('subscriber_address', 'Address') }}
            {{ Form::textarea('subscriber_address', '', ['class' => 'form-control', 'placeholder' => 'Enter Address', 'rows' => 2]) }}
        </div>

        <div class="form-group">
            <span class="text-danger" style="font-style: italic;">* form wajib diisi</span>
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</a>
      </div>

      {{ Form::close() }}

    </div>
  </div>
</div>

<!-- Modal Import -->
<div class="modal" id="modalImport">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Import Subscriber</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      {{ Form::open(['url' => 'c/subscriber/import/'.$lp_id, 'files' => true]) }}
      <!-- Modal body -->
      <div class="modal-body">

        <div class="alert alert-info">
            <h4><strong>Info:</strong></h4>
            <p>File yang diupload harus bertipe .xls atau .xlsx</p>
            <p>Download contoh format <a href="{{ asset('storage/file/SubscriberImportFormat.xlsx') }}">di sini</a></p>
        </div>
        
        <div class="form-group">
            {{ Form::label('file', 'File') }}
            <br/>
            {{ Form::file('import_file', ['required']) }}
        </div>


      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Import</a>
      </div>

      {{ Form::close() }}

    </div>
  </div>
</div>

@foreach($subscribers as $data)
<!-- Modal Delete -->
<div class="modal" id="modalDelete-{{ $data->id}}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><i class="far fa-trash-alt"></i> Delete Subscriber</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Apakah Anda yakin ingin menghapus subscriber <b>{{ $data->subscriber_name }}?</b>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <a href="{{ url('c/subscriber/delete/'.$lp_id.'/'.$data->id) }}" class="btn btn-default">Delete</a>
      </div>

    </div>
  </div>
</div>
@endforeach

<script>
    $(function() {
        $("#form-phone").css('display', 'none');
        $("#form-address").css('display', 'none');
        $("#create-phone").click(function() {
            $("#form-phone").fadeIn(1000);
            $("#create-phone").css('display', 'none');
        })
        $("#create-address").click(function() {
            $("#form-address").fadeIn(1000);
            $("#create-address").css('display', 'none');
        })
    // body...
    })
</script>

@endsection
