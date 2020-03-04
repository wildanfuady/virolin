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
            <h1 class="pd-0 mg-0 tx-20">Create Campaign</h1>
            </div>
            <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="{{ url('/home') }}"><i class="icon ion-ios-home-outline"></i> Home</a>
            <a class="breadcrumb-item" href="">Campaign</a>
            </div>
        </div>

        <div class="row row-xs clearfix">
            <div class="col-md-12 col-lg-12 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            List Campaign
                        </h4>
                        @can('landingpage-create')
                            <a class="btn btn-info btn-sm float-right" href="{{ route('campaign.create') }}"> Create New Campaign</a>
                        @endcan
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
                            <div class="col-md-10">
                                <div class="form-group">
                                    {{ Form::text('search', $keyword, ['class' => 'form-control', 'placeholder' => 'Cari judul campaign ...', 'id' => 'search']) }}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button id="btn-search" class="btn btn-primary btn-block">Seacrh</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table_id">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th>Name</th>
                                        <th>View</th>
                                        <th>Created Date</th>
                                        <th width="150px" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($campaign as $item)
                                    <tr>
                                        <td class="text-center">{{++$i}}</td>
                                        <td>{{ $item->campaign_name }}</td>
                                        <td>{{ $item->campaign_form_view }}</td>
                                        <td>{{ date('d-m-Y H:i', strtotime($item->created_at)) }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-light btn-sm" href="{{ url($item->campaign_slug) }}" target="_blank"><i class="fa fa-eye"></i></a>
                                                @can('landingpage-edit')
                                                <a class="btn btn-light btn-sm" href="{{ route('campaign.edit', $item->campaign_id) }}"><i class="fa fa-edit"></i></a>
                                                @endcan
                                                @can('landingpage-delete')
                                                <a class="btn btn-light btn-sm" href="{{ url('campaign/destroy/'.$item->campaign_id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus campaign <?= $item->campaign_name ?>? Jika ya, maka data akan dihapus secara permanen.');"><i class="fa fa-trash"></i></a>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $campaign->appends($_GET)->links() }}
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

            window.location.replace("{{ url('campaign') }}?keyword=" + keyword);
        }
    });

</script>

@include('partials.footer')  