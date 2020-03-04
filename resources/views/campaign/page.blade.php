<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Campaign: {{ $campaign->campaign_name }} - Virolin.com</title>

    <!-- CSS From App -->
    <link href="{{ asset('landingpage/content') }}/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('landingpage/content') }}/css/style.css" rel="stylesheet" />
    <link href="{{ asset('landingpage/content') }}/css/timer.css" type="text/css" />
    <!-- CSS From Internet -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <!-- JS From App -->
    <script src="{{ asset('landingpage/content') }}/js/custom.js"></script>
    <script src="{{ asset('landingpage/content') }}/js/jquery.min.js"></script>
</head>
<body>
    <!-- Start Block 1 -->
    <div class="banner" style="background: {{ $campaign->block1_bg }} !important">

        <div class="container">

            <div class="col-md-6 col-md-push-3 text-center">
                <div class="">
                    <h1 class="md22 sm30 xs25 w600 white top1 text-center">
                        {{ $campaign->block1_headline1 }}
                    </h1>
                </div>
            </div>

            <div class="clearfix"></div>
          
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1 class="md45 sm30 xs25 lh120 yellow w600">
                    <?= $campaign->block1_headline2 ?>
                </h1>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="container">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 bonusbutton mt1">
                    <a href="{{ url($campaign->campaign_slug.'/share') }}" class="md29 sm41 xs15 montserrat w700" style="color: {{ $campaign->block1_btn_text_color }} !important; background: {{ $campaign->block1_btn_text_bg }} !important; box-shadow: 0 7px {{ $campaign->block1_btn_text_bg }} !important">{{ $campaign->block1_btn_text }}</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- End Block 1 -->

    <!-- Block 2 -->
    <div class="container mt2 block2"style="background: {{ $campaign->block2_bg }} !important">
        <div class="col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text">

                {{ $campaign->block2_headline }}
                <?= $campaign->block2_text_edukasi ?>

        </div>
    </div>
    <!-- End Block 2 -->

    <!-- Start Block 3 -->
	<div class="banner11" style="background: {{ $campaign->block3_bg }} !important;">
        <div class="container mycontainer">
            <div class="row white">
                <div class="col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 mt2">                 
                    <h2 class="text-center md47 sm41 xs35 w600 lh120 yellow">{{ $campaign->block3_headline }}</h2>
                    
                </div>

                <div class="col-md-5 col-sm-5 col-xs-12 padding0">
                    <img src="{{ asset('storage/'.$campaign->block3_image) }}" class="center-block img-responsive introimg">
                </div>

                <div class="col-md-7 col-sm-7 col-xs-12 llmt6 padding0 lmt6">

                    <div class="col-md-6 col-sm-6 col-xs-12 padding0">
                        <div class="col-md-3 col-sm-3 col-xs-3 clear"><img src="{{ asset('landingpage/content') }}/sales-img/{{ $campaign->block3_alasan1_icon }}.png" class="center-block img-responsive"></div>
                        <div class="col-md-9 col-sm-9 col-xs-9 padding0">
                            <p class="md20 sm19 xs18 white lh130 lmt2 xsmt2">{{ $campaign->block3_alasan1_text }}</p>
                            <div class="hidden-xs">&nbsp;</div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 lmt8 xsmt2 clear"><img src="{{ asset('landingpage/content') }}/sales-img/{{ $campaign->block3_alasan2_icon }}.png" class="center-block img-responsive"></div>
                        <div class="col-md-9 col-sm-9 col-xs-9 lmt8 xsmt2 padding0"><p class="md20 sm19 xs18 white lh130 lmt0 xsmt2">{{ $campaign->block3_alasan2_text }}</p></div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 padding0 lmt0 xsmt2">
                        <div class="col-md-3 col-sm-3 col-xs-3 clear"><img src="{{ asset('landingpage/content') }}/sales-img/{{ $campaign->block3_alasan3_icon }}.png" class="center-block img-responsive"></div>
                        <div class="col-md-9 col-sm-9 col-xs-9 padding0"><p class="md20 sm19 xs18 white lh130 lmt0 xsmt2">{{ $campaign->block3_alasan3_text }}</p></div>

                        <div class="col-md-3 col-sm-3 col-xs-3 lmt8 xsmt2 clear"><img src="{{ asset('landingpage/content') }}/sales-img/{{ $campaign->block3_alasan4_icon }}.png" class="center-block img-responsive"></div>
                        <div class="col-md-9 col-sm-9 col-xs-9 lmt8 xsmt2 padding0"><p class="md20 sm19 xs18 white lh130 lmt0 xsmt2">{{ $campaign->block3_alasan4_text }}</p></div>
                    </div>

                </div> 
            </div>	
        </div>
    </div>
    <!-- End Block 3 -->

    <!-- Start Block 4 -->
	<div class="container-fluid" style="background: {{ $campaign->block4_bg }} !important">
        <div class="container">
            <div class="pb3 container-fluid orangebg" style="background: {{ $campaign->block4_bg_headline }} !important;margin-top:5%;">
                <div class="container">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h1 class="text-center md41 sm37 xs31 white mt1 ls-1 lh130 w700" style="color: {{ $campaign->block4_text_headline_color }} !important">
                        <?= $campaign->block4_text_headline ?>
                        </h1>
                    </div>

                </div>
            </div>
            <div class="col-md-10 col-md-push-1 col-xs-12">
                <h1 class="text-center md43 sm37 xs31  mt1 ls-1 lh130 w700">
                
				<p class="md25 sm20 xs20 lh120  mt2 w600 mb-1">
                 <?= $campaign->block4_text_headline_desc ?>
                </p>

                </h1>
               
            </div>
            <img src="{{ asset('storage/'.$campaign->block4_image) }}" class="img-responsive center-block mc" alt="arrred" />
        </div>
        <div class="clearfix"></div>
    </div>
    
    <!-- Start Block 5 -->
    <div class="pb3 container-fluid orangebg" style="background: {{ $campaign->block5_bg }}">
        <div class="container">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1 class="text-center md41 sm37 xs31 white mt1 ls-1 lh130 w700" style="color: {{ $campaign->block5_text_color }} !important">
                   <?= $campaign->block5_text ?>
                </h1>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- End Block 5 -->
    
    <!-- Start Block 6 -->
    <div class="banner11" style="background: {{ $campaign->block6_bg }} !important">
        <div class="container">
           
            <div class="col-md-8 col-md-offset-2 text-center white">
                <h1 class="md40 sm38 xs26 lh120 w600">
                    <?= $campaign->block6_text_headline ?>
                </h1>
            </div>
            <div class="clearfix"></div>

	        <div class="row">
	            <div class="col-md-12 col-xs-12 col-sm-7 mt2">
                   <img src="{{ asset('storage/'.$campaign->block6_image) }}" class="img-responsive center-block" alt="fun6" />
                </div>

            </div>
		</div>
	</div>
	<!-- End Block 6 -->
    
	<div class="section29">

        <!-- Start Block 7 -->
        <div class="container pb3 pt3 block7">
            <?= $campaign->block7_faq ?>
        </div>	

        <!-- Start Block 8 -->
        <div class="strip_footer" style="background: {{ $campaign->block8_bg }} !important;">
            <div class="container">
                <div class="text-center">
                    <div class="row">
                        
                        <div class="col-md-8 col-md-offset-2 text-center white">
                            <div class="md40 sm38 xs26 lh120 w600">
                                <?= $campaign->block8_headline ?>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 bonusbutton mt1" style="">
                            <a href="{{ url($campaign->campaign_slug.'/share') }}" class="md29 sm41 xs15 montserrat w700" style="background: {{ $campaign->block8_button_bg_color }} !important;; color: {{ $campaign->block8_text_color_button }} !important;box-shadow:  0 7px {{ $campaign->block8_button_bg_color }} !important;"><?= $campaign->block8_text_button ?> </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Block 8 -->

        <!-- Footer -->
        <div class="strip_footer clear">
            <div class="container">
                <div class=" white">
                    <div class="col-md-12 col-sm-12 col-xs-12 md15 sm14 xs11 text-center">
                        Copyright &copy; 2020 | All Right Reserved | Created with <i class="fa fa-heart" style="color:red"></i> by <a href="https://virolin.com" target="_blank"> Virolin</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer -->

    </div>
 
</body>
</html>