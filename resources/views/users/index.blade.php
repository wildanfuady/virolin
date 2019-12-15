@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                @can('users-create')
                <a href="{{ route('users.create') }}" class="btn btn-info btn-sm float-right">Create a New User</a>
                @endcan
                List Users
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
                            {{ Form::text('search', $keyword, ['class' => 'form-control', 'placeholder' => 'Cari user ...', 'id' => 'search']) }}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button id="btn-search" class="btn btn-primary btn-block">Seacrh</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-info">
                                <th width="10px" style="text-align:center">No</th>
                                <th>Name</th>
                                <th>Total DB</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Masa Aktif</th>
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
                                <td> {{$item->masa_aktif}} </td>
                                <td>
                                    @php
                                        $expired = strtotime($date_expired);
                                    @endphp
                                    @if (strtotime($item->masa_aktif) <= $expired)
                                        <form action="user/ingatkan" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $item->id}}">
                                            <button type="submit" class="btn btn-sm btn-warning">Ingatkan</button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('users.show', $item->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                        @can('users-edit')
                                        <a href="{{ route('users.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('users-delete')
                                        <a href="{{ url('users/destroy/'.$item->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash-alt"></i></a>
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
                        {{ $users->links() }}
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

@endsection
