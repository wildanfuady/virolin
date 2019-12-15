@extends('template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Banks</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Banks</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Detail a Bank
            </div>
            <div class="card-body">
               
                <div class="row">
                    <div class="col-md-12">
                        <table>
                            <tr>
                                <th style="width:60%">Name</th>
                                <td>: {{ $bank->bank_name }}</td>
                            </tr>
                            <tr>
                                <th style="width:60%">Nasabah</th>
                                <td>: {{ $bank->bank_nasabah }}</td>
                            </tr>
                            <tr>
                                <th style="width:60%">Kode Bank</th>
                                <td>: {{ $bank->bank_code }}</td>
                            </tr>
                            <tr>
                                <th style="width:60%">Nomor Rekening</th>
                                <td>: {{ $bank->bank_number }}</td>
                            </tr>
                            <tr>
                                <th style="width:60%">Status</th>
                                <td>: {{ $bank->bank_status }}</td>
                            </tr>
                            <tr>
                                <th style="width:60%">Logo</th>
                                <td>: <img src="{{ asset('storage/'.$bank->bank_image) }}" width="100px"></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <a href="{{ route('banks.index') }}" class="btn btn-outline-info">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
