@include('partials.header')
@include('partials.sidebar')
@include('partials.mainmenu')
<!--================================-->
<!-- Page Inner Start -->
<!--================================-->
<div class="row no-gutters">
    <div class="col-12">
        <div class="card bd-l-0-force bd-t-0-force bd-r-0-force">
            <div class="card-body bg-primary pd-y-50">
                <div class="row no-gutters">
                    <div class="col-md-6 mg-t-20">
                        <div class="d-flex align-items-center">
                        <div class="mr-3">										
                            <span class="avatar avatar-lg avatar-online pd-b-20">
                            <img src="{{ asset('storage/user/'.$account->gender.'.png') }}" class="img-fluid wd-100" alt="">
                            </span>
                        </div>
                        <div class="mg-b-0">
                            <h5 class="tx-gray-100 tx-15 mg-b-0">{{ Auth::user()->name }}</h5>
                            <p class="mg-b-10 tx-gray-300">{{ Auth::user()->email }}</p>
                            <!-- <a href="" class="btn btn-sm btn-success flex-fill mg-r-10">Edit</a> -->
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4 mg-t-10 mg-l-auto">
                        <ul class="list-unstyled tx-gray-100 mb-0">
                        <li><i class="ti-target mr-2 font-18"></i> <b>Gender </b>: {{ $account->gender }}</li>
                        <li class="mt-2"><i class="ti-mobile mr-2 font-18"></i> <b>Nomor Telpon </b>: {{ $account->phone }}</li>
                        {{-- <li class="mt-2"><i class="ti-headphone-alt mr-2 font-18"></i> <b>phone </b>: null</li> --}}
                        <li class="mt-2"><i class="ti-email mr-2 font-18"></i> <b>Email </b>: {{ Auth::user()->email }}</li>
                        <li class="mt-2"><i class="ti-map mr-2 font-18"></i> <b>Location </b>: {{ $account->address }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bd-l-0-force bd-t-0-force bd-r-0-force bd-b-0-force">
            <div class="card-body bg-light">
                <div class="row no-gutters">
                    <div class="col-12">
                        <ul class="nav ft-sm-none ft-right" id="pills-tab" role="tablist">
                        <li class="nav-item mg-r-10">
                            <a class="btn btn-sm btn-label-primary active show"  href="{{route('profile.edit')}}" aria-selected="false">Edit Profile</a>
                            <a class="btn btn-sm btn-label-primary active show"  href="{{route('profile.password')}}" aria-selected="false">Edit Password</a>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row no-gutters mg-b-20">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 hidden-sm">
        <div class="card bd-l-0-force bd-t-0-force bd-r-0-force">
            <div class="card-body pd-b-0">
                <p>Data Akun</p>
                <ul>
                    <li>Bisa Ubah Password</li>
                    <li>Tambahkan no hp, alamat dan bio</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@include('partials.footer')  