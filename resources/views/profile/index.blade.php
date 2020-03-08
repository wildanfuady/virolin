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
                        <?php 
                            $avatar = \App\User::avatar();
                            if($avatar->gender == "pria" && empty($avatar->image)){
                                $gender = $avatar->gender;
                            } else if($avatar->gender == "wanita" && empty($avatar->image)){
                                $gender = $avatar->gender;
                            } else if(empty($avatar->image) && empty($avatar->gender)){
                                $gender = "no-image.png";
                            } else if(!empty($avatar->image) && !empty($avatar->gender)) {
                                $gender = $avatar->image;
                            }
                        ?>		
                            <span class="avatar avatar-lg avatar-online pd-b-20">
                            <img src="{{ asset('storage/'.$gender) }}" class="img-fluid wd-35 ht-35 rounded-circle" alt="">
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
                        <li><i class="ti-target mr-2 font-18x"></i> <b>Gender </b>: {{ ucfirst($account->gender) }}</li>
                        <li class="mt-2"><i class="ti-mobile mr-2 font-18"></i> <b>Telp </b>: {{ $account->phone }}</li>
                        <li class="mt-2"><i class="ti-map mr-2 font-18"></i> <b>Alamat </b>: {{ $account->address }}</li>
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
        <div class="col-md-12 col-lg-12 mg-t-20 mg-b-10" id="order">
            <div class="card mg-b-100">
                <div class="card-header">
                    <h4 class="card-header-title">
                    My Order
                    </h4>
                </div>
                <div class="card-body collapse show">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table_id">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Invoice</th>
                                    <th>Product</th>
                                    <th>Max Database</th>
                                    <th>Now Database</th>
                                    <th>Expired</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>{{ $order->invoice }}</td>
                                    <td>{{ $order->product->product_name }}</td>
                                    <td>{{ $order->product->product_max_db }}</td>
                                    <td>{{ $total_db }}</td>
                                    <td>{{ date('d-m-Y', strtotime($order->order_end)) }}</td>
                                    <td>{{ $order->order_status }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.footer')  