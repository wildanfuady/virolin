@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Testimonials</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Testimonials</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                @can('testimonial-create')
                    <a class="btn btn-info btn-sm float-right" href="{{ route('testimonials.create') }}"> Create New Testimonial</a>
                @endcan
                List Testimonials
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
                            {{ Form::text('search', $keyword, ['class' => 'form-control', 'placeholder' => 'Cari berdasarkan nama atau content ...', 'id' => 'search']) }}
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
                                <th>Image</th>
                                <th>Who</th>
                                <th>As</th>
                                <th>Status</th>
                                <th width="150px" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonials as $item)
                            <tr>
                                <td class="text-center">{{++$i}}</td>
                                <td><img src="{{ asset('storage/'. $item->testimoni_image) }}" class="img-fluid rounded-circle" width="50px" height="50px"></td>
                                <td>{{ $item->testimoni_who }}</td>
                                <td>{{ $item->testimoni_as }}</td>
                                <td>{{ $item->testimoni_status }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-info btn-sm" href="{{ route('testimonials.show',$item->testimoni_id) }}"><i class="fa fa-eye"></i></a>
                                        @can('testimonial-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('testimonials.edit',$item->testimoni_id) }}"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('testimonial-delete')
                                        <a class="btn btn-danger btn-sm" href="{{ url('testimonial/destroy/'.$item->testimoni_id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="fa fa-trash-alt"></i></a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $testimonials->appends($_GET)->links() }}
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

            window.location.replace("{{ url('testimonials') }}?keyword=" + keyword);
        }
    });

</script>

@endsection
