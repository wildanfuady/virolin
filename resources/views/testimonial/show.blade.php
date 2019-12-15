@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Detail Form</li>
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
                        Detail Form
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 20%">Title</th>
                                <td style="width: 1%">:</td>
                                <td>{{ $form->form_title }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:</td>
                                <td>{{ $form->form_status }}</td>
                            </tr>
                            <tr>
                                <th>Activated Hp</th>
                                <td>:</td>
                                <td>{{ $form->form_hp }}</td>
                            </tr>
                            <tr>
                                <th>Activated Address</th>
                                <td>:</td>
                                <td>{{ $form->form_address }}</td>
                            </tr>
                            <tr>
                                <th>Created</th>
                                <td>:</td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($form->created_at)) }}</td>
                            </tr>
                        </table>
                                
                    </div>
                    <div class="card-footer">
                        <a href="{{ url('forms') }}" class="btn btn-outline-info">Back</a>
                    </div>
                </div>
            </div>
        </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

@endsection
