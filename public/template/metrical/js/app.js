// Template Core Script
$(document).ready(function() {
    
    "use strict";
    
    // Options
    var submenu_animation_speed = 100,
        submenu_opacity_animation = true, // set to "false" to remove opacity animation
        page_boxed = false,
        page_sidebar_fixed = true,
        page_sidebar_collapsed = false,
        page_header_fixed = false;
    
    // Elements
    var body = $('body'),
        page_header = $('.page-header'),
        page_sidebar = $('.page-sidebar'),
        page_content = $('.page-content');
    
    // Boxed Page 
    var boxed_page = function() {
        if(page_boxed === true) {
            $('.page-container').addClass('container');
        };
    };
    
    
    // Fixed Header
    var fixed_header = function() {
        if(page_header_fixed === true) {
            $('body').addClass('page-header-fixed');
        };
    };
    
    // Get Jumlah Konfirmasi Pembayaran
    $.ajax({
        type : "GET",
        url  : '/payment/count_payment',
        dataType : "json",
        success: function (data) {
            $('.count_payment').html(data);
        }
    });

    $.ajax({
        url: '/promo/fetchpromo/',
        type: 'get',
        dataType: 'json',
        success: function(response){

            var len = 0;
            $('#notificationsBox').empty(); // Empty <tbody>
            if(response['data'] != null){
                len = response['data'].length;
            }

            if(len > 0){

                for(var i=0; i<len; i++){
                    var promo_id        = response['data'][i].promo_id;
                    var promo_title     = response['data'][i].promo_title;
                    var promo_slug      = response['data'][i].promo_slug;
                    var promo_start     = response['data'][i].promo_start;
                    var promo_end       = response['data'][i].promo_end;
                    var promo_content   = response['data'][i].promo_content;
                    ;
                    var generate = "<a class='dropdown-item list-group-item' href='{{ url('promo/detail/') }}/"+promo_id+"'>"+
                        "<div class='d-flex justify-content-between'>" +
                            "<div class='wd-45 ht-38 mg-r-15 d-flex align-items-center justify-content-center rounded-circle card-icon-success'>"+
                                "<i class='fa fa-check tx-success tx-16'></i>" +
                            "</div>" +
                            "<div>" +
                                "<span>" + promo_title + "</span>" +
                                "<div class='tx-gray-600 tx-11'>Klik untuk melihat detail promo ...</div>" +
                            "</div>" +
                        "</div>" +
                    "</a>";

                    $("#notificationsBox").append(generate);
                }

            } else {
                var generate = "<div class='text-center pd-l-10 pd-t-10'>Belum ada promo</div>";

                $("#notificationsBox").append(generate);
            }
        }
    });

    // Sidebar
    var page_sidebar_init = function() {
        
        // Slimscroll
        $('.page-sidebar-inner').slimScroll({
            height: '100%'
        }).mouseover();  
        
        // Fixed Sidebar
        var fixed_sidebar = function() {
            if((body.hasClass('page-sidebar-fixed'))&&(page_sidebar_fixed === false)) {
                page_sidebar_fixed = true;
            };
            
            if(page_sidebar_fixed === true) {
                body.addClass('page-sidebar-fixed');
                $('#fixed-sidebar-toggle-button').removeClass('icon-radio_button_unchecked');
                $('#fixed-sidebar-toggle-button').addClass('icon-radio_button_checked');
            };
            
            var fixed_sidebar_toggle = function() {
                body.toggleClass('page-sidebar-fixed');
                if(body.hasClass('page-sidebar-fixed')) {
                    page_sidebar_fixed = true;
                } else {
                    page_sidebar_fixed = false;
                }
            };
    
            $('#fixed-sidebar-toggle-button').on('click', function() {
                fixed_sidebar_toggle();
                $(this).toggleClass('icon-radio_button_unchecked');
                $(this).toggleClass('icon-radio_button_checked');
                return false;
            });
        };
        
        
        // Collapsed Sidebar
        var collapsed_sidebar = function() {
            if(page_sidebar_collapsed === true) {
                body.addClass('page-sidebar-collapsed');
            };
            
            var collapsed_sidebar_toggle = function() {
                body.toggleClass('page-sidebar-collapsed');
                if(body.hasClass('page-sidebar-collapsed')) {
                    page_sidebar_collapsed = true;
                } else {
                    page_sidebar_collapsed = false;
                };
                $('.page-sidebar-collapsed .page-sidebar .accordion-menu').on({
                    mouseenter: function(){
                        $('.page-sidebar').addClass('fixed-sidebar-scroll') 
                    },
                    mouseleave: function(){
                        $('.page-sidebar').removeClass('fixed-sidebar-scroll')
                    }
                }, 'li');
            };
    
                $('.page-sidebar-collapsed .page-sidebar .accordion-menu').on({
                    mouseenter: function(){
                        $('.page-sidebar').addClass('fixed-sidebar-scroll') 
                    },
                    mouseleave: function(){
                        $('.page-sidebar').removeClass('fixed-sidebar-scroll')
                    }
                }, 'li');
            $('#collapsed-sidebar-toggle-button').on('click', function() {
                collapsed_sidebar_toggle();
                return false;
            });
            
        };
		
		    var small_screen_sidebar = function(){
            //if(($(window).width() < 768)&&($('#fixed-sidebar-toggle-button').hasClass('icon-radio_button_unchecked'))){
            //    $('#fixed-sidebar-toggle-button').click();
            //}
            //$(window).on('resize', function() {
            //    if(($(window).width() < 768)&&($('#fixed-sidebar-toggle-button').hasClass('icon-radio_button_unchecked'))){
            //        $('#fixed-sidebar-toggle-button').click();
            //    }
            //});
            $('#sidebar-toggle-button').on('click', function() {
                body.toggleClass('page-sidebar-visible');
                return true;
            });
            $('#sidebar-toggle-button-close').on('click', function() {
                body.toggleClass('page-sidebar-visible');
                return true;
            });
        };
        
        fixed_sidebar();
        collapsed_sidebar();
        small_screen_sidebar();
    };
    
        
    // Accordion menu
    var accordion_menu = function() {
        
        var select_sub_menus = $('.page-sidebar li:not(.open) .sub-menu'),
            active_page_sub_menu_link = $('.page-sidebar li.active-page > a');
        
        // Hide all sub-menus
        select_sub_menus.hide();
        
        
        if(submenu_opacity_animation === false) {
            $('.sub-menu li').each(function(i){
                $(this).addClass('animation');
            });
        };
        
        // Accordion
        $('.accordion-menu').on('click', 'a', function() {
            var sub_menu = $(this).next('.sub-menu'),
                parent_list_el = $(this).parent('li'),
                active_list_element = $('.accordion-menu > li.open'),
                show_sub_menu = function() {
                    sub_menu.slideDown(submenu_animation_speed);
                    parent_list_el.addClass('open');
                    if(submenu_opacity_animation === true) {
                        $('.open .sub-menu li').each(function(i){
                            var t = $(this);
                            setTimeout(function(){ t.addClass('animation'); }, (i+1) * 15);
                        });
                    };
                },
                hide_sub_menu = function() {
                    if(submenu_opacity_animation === true) {
                        $('.open .sub-menu li').each(function(i){
                            var t = $(this);
                            setTimeout(function(){ t.removeClass('animation'); }, (i+1) * 5);
                        });
                    };
                    sub_menu.slideUp(submenu_animation_speed);
                    parent_list_el.removeClass('open');
                },
                hide_active_menu = function() {
                    $('.accordion-menu > li.open > .sub-menu').slideUp(submenu_animation_speed);
                    active_list_element.removeClass('open');
                };
            
            if((sub_menu.length)&&(!body.hasClass('page-sidebar-collapsed'))) {
                
                if(!parent_list_el.hasClass('open')) {
                    if(active_list_element.length) {
                        hide_active_menu();
                    };
                    show_sub_menu();
                } else {
                    hide_sub_menu();
                };
                
                return false;
                
            };
            if((sub_menu.length)&&(body.hasClass('page-sidebar-collapsed'))){
                return false;
            };
        });
        
        if($('.active-page > .sub-menu').length) {
            active_page_sub_menu_link.click();
        };
    };


    
    page_sidebar_init();
    boxed_page();
    accordion_menu();
    // navbar_init();
    // right_sidebar();
    // plugins_init();
    
});


// Collapsed Sidebar (min-width:992px) and (max-width: 1199px)
 $(function(){
 
   'use strict'
 
   var mql = window.matchMedia('(min-width:992px) and (max-width: 1199px)');
 
   function doMinimize(e) {
     if (e.matches) {
       $('body').addClass('page-sidebar-collapsed');
     } 
	 else {
       $('body').removeClass('page-sidebar-collapsed');
     }
   }
 
   mql.addListener(doMinimize);
  doMinimize(mql);

});

// URL
$(document).ready(function(){
    'use strict';

    var url = window.location;
    
    var a = $('ul.accordion-menu li a').filter(function() {
        return this.href == url;
    }).parent('ul.accordion-menu li').addClass('open active');
    
    $('ul.nav-treeview a').filter(function() {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open') .prev('a').addClass('active');
   
});

$(document).ready(function(){
    
    $('.datepicker').datepicker({
        format: "dd-mm-yyyy",
        todayBtn: "linked",
        calendarWeeks: true,
        autoclose: true,
        todayHighlight: true
    });

    

    function cekInput(id) {
      var status;
      var input_value = $(id).val();
      var input = $(id);
      if(input_value == ""){
        $(input).addClass('is-invalid');
        status = 0;
      } else {
        $(input).removeClass('is-invalid');
        status = 1;
      }
      return status;
    }

    $('.dropify').dropify({
        messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
        }
    });

    var hitung_diskon = function(){

        var kode_kupon = $("#input-kupon").val();
        var kode_produk = $("#input-kode-produk").val();

        const formatter = new Intl.NumberFormat(['ban', 'id']);

        if(cekInput("#input-kupon") == 0){
            swal({
                title: "Oops!",
                text: "Kode kupon wajib diisi",
                type: "error"
            });
        } else {
            
            $.ajax({
                url: '/promo/cekpromo/'+ kode_kupon,
                type: 'get',
                data: {kode_kupon:kode_kupon, kode_produk:kode_produk},
                dataType: 'json',
                success: function(response){

                    var status = response.success;
                    var msg = response.message;
                    var total = response.nilai_kupon;
                    var diskon = response.diskon;
                    var status = response.success;

                    if(status == true){
                        var title = "Success";
                        var tipe = "success";
                    } else {
                        var title = "Maaf";
                        var tipe = "warning";
                    }

                    setTimeout(function() {
                        swal({
                            title: title,
                            text: msg,
                            type: tipe
                        }, function() {
                           
                           if(total != 0){
                                $("#total_pembayaran").text("Rp. " + formatter.format(total));
                           }
                        });
                    }, 500);
                },
                error:function(error){
                    setTimeout(function() {
                        swal({
                            title: "Gagal...",
                            text: 'Kode promo tidak terdaftar atau sudah expired',
                            type: "error"
                        });
                    }, 500);
                }

            }); // ajax
        
        } // else
    }
    $("#apply-kupon").click(function(){
        
        hitung_diskon()
    
    });
    
    $("#input-kupon").keypress(function(event){
        if(event.keyCode == 13) { // kode enter
            hitung_diskon();
        }
    }); // btn kupon

    $('#payment-gateway').click(function (event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");

        $.ajax({
            url: './snaptoken',
            cache: false,
            success: function(data) {
        
                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');
                function changeResult(type,data){
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                }
                snap.pay(data, {
                    onSuccess: function(result){
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                        location.reload();
                    },
                    onPending: function(result){
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                        location.reload();
                    },
                    onError: function(result){
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                        location.reload();
                    }
                });
            }
        });
    });
});