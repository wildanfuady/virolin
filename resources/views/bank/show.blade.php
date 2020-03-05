@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<!--================================-->
<!-- Page Inner Start -->
<!--================================-->
<div class="page-inner">
    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <div class="pageheader pd-t-25 pd-b-35">
            <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">Detail Bank</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Detail Bank</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
          <div class="col-md-12 col-lg-12">
            <div class="card mg-b-100">
              <div class="card-header">
                <h4 class="card-header-title">
                    Detail Bank
                </h4>
              </div>
              <div class="card-body collapse show">
               
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
@include('partials.footer')