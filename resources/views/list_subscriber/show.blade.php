@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail List Subscriber</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Detail List Subscriber</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Detail List Subscriber
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 20%">Group Name</th>
                                <td style="width: 1%">:</td>
                                <td>{{ $list->list_sub_name }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:</td>
                                <td>{{ $list->list_sub_status }}</td>
                            </tr>
                            <tr>
                                <th>Created</th>
                                <td>:</td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($list->created_at)) }}</td>
                            </tr>
                            <tr>
                                <th>Total Subscriber</th>
                                <td>:</td>
                                <td>0</td>
                            </tr>
                        </table>
                                
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('list-subscriber') }}" class="btn btn-outline-info">Back</a>
                    </div>
                </div>
            </div>
        </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

@endsection
