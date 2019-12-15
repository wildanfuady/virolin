@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Autoresponder</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Detail Autoresponder</li>
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
                        Detail Autoresponder
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 20%">Title</th>
                                <td style="width: 1%">:</td>
                                <td>{{ $auto->auto_title }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:</td>
                                <td>{{ $auto->auto_status }}</td>
                            </tr>
                            <tr>
                                <th>Created</th>
                                <td>:</td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($auto->created_at)) }}</td>
                            </tr>
                            <tr>
                                <th>Content</th>
                                <td>:</td>
                                <td><?= $auto->auto_content ?></td>
                            </tr>
                        </table>
                                
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('autoresponders') }}" class="btn btn-outline-info">Back</a>
                    </div>
                </div>
            </div>
        </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

@endsection
