@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">List Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Form</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                @can('form-create')
                    <a class="btn btn-info btn-sm float-right" href="{{ route('forms.create') }}"> Create New Form</a>
                @endcan
                List All Form
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
                            {{ Form::text('search', $keyword, ['class' => 'form-control', 'placeholder' => 'Cari judul form ...', 'id' => 'search']) }}
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
                                <th>Title</th>
                                <th>Status</th>
                                <th>Handphone</th>
                                <th>Address</th>
                                <th>Created</th>
                                <th width="150px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($form as $item)
                            <tr>
                                <td class="text-center">{{++$i}}</td>
                                <td>{{ $item->form_title }}</td>
                                <td>{{ $item->form_status }}</td>
                                <td>{{ $item->form_hp }}</td>
                                <td>{{ $item->form_address }}</td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-info btn-sm" href="{{ route('forms.show',$item->form_id) }}"><i class="fa fa-eye"></i></a>
                                        @can('form-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('forms.edit',$item->form_id) }}"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('form-delete')
                                        <a class="btn btn-danger btn-sm" href="{{ url('forms/destroy/'.$item->form_id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa fa-trash-alt"></i></a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $form->appends($_GET)->links() }}
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

            window.location.replace("{{ url('forms') }}?keyword=" + keyword);
        }
    });

</script>

@endsection
