<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Share: {{ $campaign->campaign_name }} - Virolin.com</title>
    <!-- Favicon -->	
    <link rel="icon" href="{{ asset('template/metrical') }}/images/favicon.ico" type="image/x-icon">
    <!-- CSS From App -->
    <link href="{{ asset('landingpage/content') }}/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('landingpage/content') }}/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css" />

    <!-- JS From App -->
    <script src="{{ asset('landingpage/content') }}/js/jquery-2.1.1.min.js" type="text/javascript"></script> 
</head>
<body>
    <div class="banner">
        <div class="container">
            <div class="col-md-6 col-md-push-3 text-center">
                <div class="">
                    <h1 class="md22 sm30 xs25 w600 white top1 text-center">
                     Selangkah lagi untuk dapatkan aksesnya
                    </h1>
                </div>
            </div>
            <div class="clearfix"></div>
          
            <div class="col-md-10 col-md-offset-1 text-center">
                <h1 class="md45 sm30 xs25 lh120 yellow w600">
                    Ajak teman anda untuk mendapatkan <br>{{ $campaign->campaign_name }}<br>
                </h1>
            </div>

        </div>
        <div class="container">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 bonusbutton mt1">
                    <a href="#share" class="md29 sm41 xs15 montserrat w700">Oke Siap</a>
                </div>
            </div>
        </div>
    </div>

	<br><br>
	
	<div class="banner8">
        <div class="container">
            <div class="text-center">
				 <p class="md25 sm20 xs20 lh120  mt2 w600 mb-1">
                    Untuk mendapatkan {{ $campaign->campaign_name }} secara khusus, ikuti 3 langkah berikut:
                </p>
            </div>

            <div class="clearfix"></div>
            <div class="text-center mt2">
                <img src="{{ asset('landingpage/content') }}/img/arrowred.png" class="img-responsive center-block" alt="wrrred" />
            </div>
            <div class="row mt3">
                <div class="col-md-4 col-md-offset-1">
                    <img src="{{ asset('landingpage/content') }}/img/sharewa2.png" class="img-responsive center-block" alt="icon77" />
                </div>
                <div class="col-md-5 mt5 line">
                    <img src="{{ asset('landingpage/content') }}/img/line1.png" class="img-responsive center-block" alt="line1" />
                </div>

            </div>
            <div class="row mt3">

                <div class="col-md-5 col-md-push-2 mt6 line">
                    <img src="{{ asset('landingpage/content') }}/img/line2.png" class="img-responsive center-block" alt="line2" />
                </div>
                <div class="col-md-4 col-md-push-2">
                    <img src="{{ asset('landingpage/content') }}/img/sharewa3.png" class="img-responsive center-block" alt="icon60" />
                </div>
            </div>
            <div class="row mt3">
                <div class="col-md-4 col-md-offset-1">
                    <img src="{{ asset('landingpage/content') }}/img/sharewa4.png" class="img-responsive center-block" alt="icon90" />
                </div>
                

            </div>
          
         
        </div>
        <div class="container pt4">
            <div class="col-md-10 col-md-offset-1">
                 <p class="md25 sm20 xs20 lh120  mt2 w600 mb-1 text-center">
                    Setelah itu... Selamat, Anda langsung bisa mendapatkan {{ $campaign->campaign_name }}
                </p>
            </div>
        </div>
    </div>
    
   <div class="banner11" id="share">

        <div class="container">
       
            <div class="row" id="prefer">
            
                <div class="col-md-8 col-md-offset-2 text-center white">
                    <h1 class="md40 sm38 xs26 lh120 w600">
                        Jadi, Tunggu Apalagi....
                    </h1>
                    <h3 class="md35 sm38 xs33 lh120 w500 mt-1">
                        Klik tombol SHARE di bawah ini sekarang juga
                    </h3>

                </div>

            </div>

            <div class="row" id="postfer">
            
                <div class="col-md-8 col-md-offset-2 text-center white">
                    <h1 class="md40 sm38 xs26 lh120 w600">
                        Selesai ...
                    </h1>
                    <h3 class="md35 sm38 xs33 lh120 w500 mt-1">
                        Setelah ini apa yang Anda perlu lakukan?
                    </h3>

                </div>

            </div>
            
            <div class="row">
            
                <div class="col-md-8 col-md-offset-2 text-center white">
                    <?php
                    $slug = $campaign->campaign_slug;
                    $teks_whatsapp = $campaign->campaign_text_share;
                    // ubah spasi ke %20
                    $char = str_replace(" ", "%20", $teks_whatsapp);
                    // ubah <br /> jadi %0A
                    $char = str_replace("<br />", "<br%20/>", $char);
                    $char = str_replace("<br%20/>", "%0A", $char);
                    // tambahkan tanda tangan
                    $ttd = "%0A%0AKlik%20di%20sini%20untuk%20info lengkapnya:%0A%0A>>%20https://virolin.ilmucoding.com/".$slug;
                    $gabung = $char.$ttd;
                    ?>
                    <h4 class="text-lead" id="text-lead" style="color:#ffffff">Cukup Share ke WA sebanyak <span class="pmwu-counter">3</span> kali sampai progress penuh</h4>
                    <div class="pmwu-button" id="pmwu-button" style="margin-top: 5%; margin-bottom: 5%">
                        <a href="https://api.whatsapp.com/send?text={{ $gabung }}" target="_blank" class="button-pmwu-default btn btn-success ml-2 btn-lg" style="color:#fff;">
                        <i class="fa fa-whatsapp"></i> Bagikan Sekarang
                        </a> 
                    </div>
                    <h4 id="text-expired">EXPIRED</h4>
                    <div id="pmwu" class="pmwu-container" data-target="3" style="margin-top: 20px">
                        <div class="pmwu-progress-wrap">
                            <div class="pmwu-progress">
                                <div class="pmwu-bar"></div>
                            </div>
                        <div class="pmwu-status pmwu-blink" style="visibility:hidden">Sedang memeriksa...</div>
                    </div>
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center mb-5 pmwu-rewards" style="background: white;border-radius: 10px; display:none">
                    <div class="card">
                    {{ Form::open(['url' => $campaign->campaign_slug.'/send']) }}
                        <div class="card-body">
                            <br>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger text-left">
                                    <strong>Whoops!</strong> Terjadi kesalahan dalam input data.<br><br>
                                    <ul style="padding-left:15px">
                                    @foreach ($errors->all() as $error)
                                        <li style="padding-left:15px">{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                            <br>
                            <p>Masukan email dan nama Anda untuk mendapatkan link free ecouse melalui email yang kami kirimkan: </p>
                            <br>
                            <br>
                            <div class="form-group">
                                {{ Form::text('fullname', '', ['class' => 'form-control', 'placeholder' => 'Nama Lengkap Anda']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email Aktif Anda']) }}
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group bonusbutton">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">
                                    Ya, Saya Mau
                                </button>
                            </div>
                            <div class="form-group">
                                <small><i class="fa fa-lock"></i> Form ini aman. Anda dapat unsubscribe kapan saja.</small>
                            </div>
                        </div>
                    {{ Form::close() }}
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-12 col-sm-12 col-xs-12 bonusbutton mt1">
                <a href="#" class="md29 sm41 xs15 montserrat w700">Daftar Free E-Course </a>
            </div> -->
            <div class="clearfix"></div>
            <br>
        </div>
    </div>
    </div>
        
    <!--<div class="col-md-8 col-md-offset-2 text-center">-->

    <!--    <h1 class="md40 sm38 xs26 lh120 w600">-->
    <!--        Sebelum ...-->
    <!--    </h1>-->

    <!--</div>-->
    
    <!--<div class="container">-->
    <!--  <div class="row" id="started">-->
    <!--      <table class="table" style="border-top:none; outline:none; background: transparent !important">-->
    <!--          <tr class="text-center">-->
    <!--              <td class="text-center">-->
    <!--                  <h1 id="myDay">00</h1>-->
    <!--                  <br>-->
    <!--                  <p class="lead">HARI</p>-->
    <!--              </td>-->
    <!--              <td class="text-center">-->
    <!--                  <h1 id="myHours">00</h1>-->
    <!--                  <br>-->
    <!--                  <p class="lead">JAM</p>-->
    <!--              </td>-->
    <!--              <td class="text-center">-->
    <!--                  <h1 id="myMinute">00</h1>-->
    <!--                  <br>-->
    <!--                  <p class="lead">MENIT</p>-->
    <!--              </td>-->
    <!--              <td class="text-center">-->
    <!--                  <h1 id="mySecond">00</h1>-->
    <!--                  <br>-->
    <!--                  <p class="lead">DETIK</p>-->
    <!--              </td>-->
    <!--          </tr>-->
    <!--      </table>-->
    <!--  </div>-->
    <!--</div>	 -->
		
	
    <div class="strip_footer clear">
        <div class="container">
            <div class=" white">
                <div class="col-md-12 col-sm-12 col-xs-12 md15 sm14 xs11 text-center">
                    Copyright &copy; 2020 | All Right Reserved | Created with <i class="fa fa-heart" style="color:red"></i> by <a href="https://virolin.com" target="_blank"> Virolin</a>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Set the date we're counting down to
    var countDownDate = new Date("Mar 15, 2020 09:01:00").getTime();
    
    // Update the count down every 1 second
    var x = setInterval(function() {
    
    // Get today's date and time
    var now = new Date().getTime();
  
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
  
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  
    // Display the result in the element with id="demo"
    document.getElementById("myDay").innerHTML = days;
    document.getElementById("myHours").innerHTML = hours;
    document.getElementById("myMinute").innerHTML = minutes;
    document.getElementById("mySecond").innerHTML = seconds;
  
    // If the count down is finished, write some text
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("title-reward").style.display = "none";
      document.getElementById("text-lead").style.display = "none";
      document.getElementById("pmwu").style.display = "none";
      document.getElementById("text-expired").style.display = "block";
      document.getElementById("pmwu-button").style.display = "none";
      document.getElementById("started").style.display = "none";
      document.getElementById("postfer").style.display = "none";
      document.getElementById("prefer").style.display = "none";
      document.getElementById("expired").innerHTML = "EXPIRED";
    }
  }, 1000);
</script>
<script>
    "use strict";
        $(window).on('load', function() {
          let index=0,
          target = document.getElementById('pmwu').dataset.target,
          btn = document.getElementsByClassName('button-pmwu-default')[0],
          counter = document.getElementsByClassName('pmwu-counter')[0],
          bar = document.getElementsByClassName('pmwu-bar')[0],
          progressBar = document.getElementsByClassName('pmwu-progress-wrap')[0],
          status = document.getElementsByClassName('pmwu-status')[0],
          reward = document.getElementsByClassName('pmwu-rewards')[0];
          reward.style.display="none";
          document.getElementById('text-expired').style.display = "none";
          document.getElementById('postfer').style.display = "none";
          
          $('#myModal').modal('hide');
          $('.text-lead-finish').css('display', 'none');
          $('.flexslider').flexslider({
            animation: "slide",
            animationLoop: true,
            itemWidth: 450,
            controlNav: false,
            itemMargin: 20,
            minItems: 2,
            maxItems:  3
          });
          btn.addEventListener('click',function(){
          index++;
          status.style.visibility='visible';
          $(btn).addClass('disabledButton');
          // .style.pointerEvents = "none";
          setTimeout(function(){
              counter.innerHTML=target-index;
              bar.style.width=((index/target)*100)+'%';
              status.style.visibility='hidden';
              $(btn).removeClass('disabledButton');
              if(target-index<0){
                  counter.innerHTML=0;
              }
              if(index>=target){
                  btn.style.display='none';
                  progressBar.style.display='none';
                  status.style.display='none';
                  reward.style.display='block';
                  document.getElementById("prefer").style.display = "none";
                  document.getElementById("postfer").style.display = "block";
                  $('#myModal').modal('show');
                  $('.text-lead').css('display', 'none');
                  $('.text-lead-finish').css('display', 'block');
              }
          },100);})
          
        });  
        $(window).on('scroll', function() {
            if ($(this).scrollTop() >= 300) {
                $(".navbar").addClass("active");
            }else{
                $(".navbar").removeClass("active");
            } 
        });
       
    </script>
    <script>
    var submit = $('#form-submit');
    
    function submitForm() {
        $('#myModal').modal('hide');
        $('#modalFinish').modal('show');
        
    }
   
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="{{ asset('landingpage/content') }}/flexslider/jquery.flexslider-min.js" type="text/javascript"></script>
</body>
</html>