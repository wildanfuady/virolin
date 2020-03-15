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
            <h1 class="pd-0 mg-0 tx-20">Detail User</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Detail User</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
          <div class="col-md-12 col-lg-12">
            <div class="card mg-b-50" style="margin-bottom:20%">
                <div class="card-header">
                    <h4 class="card-header-title">
                        Detail User
                    </h4>
                </div>
                <div class="card-body collapse show">
            
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nama User', 'disabled']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        {{ Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email', 'disabled']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Produk</label>
                        <div class="col-sm-10">
                            {{ Form::select('product_id', $products, $user->product_id, ['class' => 'form-control', 'placeholder' => 'Choose One', 'disabled']) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            {{ Form::select('status', ['valid' => 'Valid', 'invalid' => 'Invalid'], $user->status, ['class' => 'form-control', 'placeholder' => 'Choose One', 'disabled']) }}  
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <a href="{{ route('user.index') }}" class="btn btn-outline-info">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.footer')