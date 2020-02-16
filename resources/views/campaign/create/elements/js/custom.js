$(document).ready(function () {

    "use strict";


    /* _____________________________________

     Preloader
     _____________________________________ */

    if ($(".loader").length && $(".skeleton").length) {
      // show Preloader until the website ist loaded
      $(window).on("load", function () {
        $(".loader").fadeOut("slow");
      });

    }


    /* _____________________________________

     Smooth Scroll
     _____________________________________ */


    var topHeight = 0;

    if ($(".navbar-fixed-top").length) {
      topHeight = 80;
    }
    $("a.smooth-scroll").on("click", function (event) {
      var $anchor = $(this);
      $("html, body").stop().animate({
        scrollTop: $($anchor.attr("href")).offset().top - topHeight
      }, {
        duration: 1000,
        specialEasing: {
          width: "linear",
          height: "easeInOutCubic"
        }
      });
      event.preventDefault();
    });


    /* _____________________________________

     Scroll Top
     _____________________________________ */

    $(window).scroll(function () {
      if ($(this).scrollTop() > 200) {
        $(".btn-top").fadeIn();
      } else {
        $(".btn-top").fadeOut();
      }
    });


    /* _____________________________________

     Background Video
     _____________________________________ */

    // shows Video only for Desktop
    if ($("#video-background").length && $(".skeleton").length) {
      var videobackground = new $.backgroundVideo($("body"), {
        "align": "centerXY",
        "width": 720,
        "height": 432,
        "path": $("#video-background").data("path"),
        "filename": $("#video-background").data("file"),
        "types": ["mp4", "ogg", "webm"]
      });
    }


    /* _____________________________________

     Background Youtube
     _____________________________________ */

    // shows Video only for Desktop
    if ($("#youtube-background").length && $(".skeleton").length) {
      $("#youtube-background").YTPlayer({
        fitToBackground: true,
        videoId: $("#youtube-background").data("video-id"),
        playerVars: {
          modestbranding: 1,
          autoplay: 1,
          controls: 0,
          showinfo: 0,
          branding: 0,
          rel: 0,
          autohide: 0,
          start: 0
        }
      });
    }


    /* _____________________________________

     Scroll Animations
     _____________________________________ */

    if ($(".reveal").length && $(".skeleton").length) {
      window.sr = ScrollReveal();
      sr.reveal(".rb-20-0", {
        origin: "bottom",
        distance: "20px",
        duration: 800,
        delay: 0,
        opacity: 0,
        scale: 0,
        easing: "linear",
        mobile: false
      });
      sr.reveal(".rb-20", {
        origin: "bottom",
        distance: "20px",
        duration: 800,
        delay: 0,
        opacity: 1,
        scale: 0,
        easing: "linear",
        mobile: false,
        reset: true
      });
      sr.reveal(".rt-20", {
        origin: "top",
        distance: "20px",
        duration: 800,
        delay: 400,
        opacity: 1,
        scale: 0,
        easing: "linear",
        reset: true
      });
      sr.reveal(".rl-10", {
        origin: "left",
        distance: "10px",
        duration: 800,
        delay: 400,
        opacity: 1,
        scale: 0,
        easing: "linear",
        reset: true
      });
      sr.reveal(".rl-20", {
        origin: "left",
        distance: "20px",
        duration: 800,
        delay: 400,
        opacity: 1,
        scale: 0,
        easing: "linear",
        reset: true
      });
      sr.reveal(".rr-10", {
        origin: "right",
        distance: "10px",
        duration: 800,
        delay: 400,
        opacity: 1,
        scale: 0,
        easing: "linear",
        reset: true
      });
      sr.reveal(".rr-20", {
        origin: "right",
        distance: "20px",
        duration: 800,
        delay: 400,
        opacity: 1,
        scale: 0,
        easing: "linear",
        reset: true
      });
    }

    /* _____________________________________

     Navigation Transparent / White
     _____________________________________ */


    function changeColorLight() {

      if ($(window).scrollTop() > 60 || $(window).width() < 992) {
        navbar.addClass("navbar-light");
      } else {
        navbar.removeClass("navbar-light");
      }
    }

    function changeColorDark() {
      if ($(window).scrollTop() > 60 || $(window).width() < 992) {
        navbar.addClass("navbar-dark");
      } else {
        navbar.removeClass("navbar-dark");
      }
    }


    function changeColorDarkColor() {
      var scrollHeight = $(window).scrollTop();
      if ((scrollHeight > 60 || $(window).width() < 992)) {
        navbar.addClass("navbar-dark")
          .find(".btn-circle").removeClass("btn-grey")
          .addClass("btn-color");
      } else {
        navbar.removeClass("navbar-dark")
          .find(".btn-circle").removeClass("btn-color")
          .addClass("btn-grey");
      }
    }

    // only change Color for fixed Navbar
    if ($(".navbar-fixed-top").length) {


      var navbar = $(".navbar");

      // change Colors for light Navbar Version
      if ($(".light-nav").length) {
        // Navigation color change
        $(window).on("scroll resize load", function () {
          changeColorLight();
        });
      }

      // change Colors for dark Navbar Version
      if ($(".dark-nav").length) {
        $(window).on("scroll resize load", function () {
          changeColorDark();
        });
      }

      // change Colors for dark Navbar Version
      if ($(".dark-nav-colored-hero").length) {
        $(window).on("scroll resize load", function () {
          changeColorDarkColor();
        });
      }
    }


    /* _____________________________________

     Navbar Icon
     _____________________________________ */

    $(".collapse").on("show.bs.collapse", function () {
      $(".navbar-icon").addClass("open");
    });
    $(".collapse").on("hide.bs.collapse", function () {
      $(".navbar-icon").removeClass("open");
    });


    /* _____________________________________

     Accordion
     _____________________________________ */

    var containerActive = ".panel .panel-collapse.in";
    $(containerActive).parent().addClass("active");
    $(containerActive).parent().find("i").addClass("icon-arrows-minus");
    $(containerActive).parent().find("i").removeClass("icon-arrows-plus");
    $(".panel").on("shown.bs.collapse", function () {
      $(this).addClass("active");
      $(this).find("i").addClass("icon-arrows-minus");
      $(this).find("i").removeClass("icon-arrows-plus");
    })
      .on("hidden.bs.collapse", function () {
        $(this).removeClass("active");
        $(this).find("i").addClass("icon-arrows-plus");
        $(this).find("i").removeClass("icon-arrows-minus");
      });

    /* _____________________________________

     Revolution Slider
     _____________________________________ */

    if ($("#rev-slider").length) {
      jQuery("#rev-slider").show().revolution({
        sliderType: "standard",
        sliderLayout: "auto",
        delay: 6000,
        autoHeight: "on",
        minHeight: 900,
        responsiveLevels: [2400, 1200, 992, 768],
        gridwidth: [1170, 970, 750, 552],
        spinner: "off",
        navigation: {
          onHoverStop: "off",
          bullets: {
            enable: true,
            hide_onmobile: true,
            hide_under: 768,
            style: "rs-dot",
            tmp: '<span class="rs-dot"></span>',
            hide_onleave: false,
            direction: "horizontal",
            h_align: "center",
            v_align: "bottom",
            v_offset: 80,
            h_offset: 0,
            space: 4
          }
        }
      });
    }

    /* _____________________________________

     Tooltip
     _____________________________________ */

    $('[data-toggle="tooltip"]').tooltip();


    /* _____________________________________

     Mail Chimp
     _____________________________________ */

    if ($("#mc-form").length) {
      $("#mc-form").ajaxChimp({
        callback: mailchimpCallback,
        // Replace the URL above with your mailchimp URL (put your URL inside "").
        url: ""
      });
    }

    // callback function when the form submitted, show the notification box
    function mailchimpCallback(resp) {
      var form = $("#mc-form"),
        messageContainer = $("#message-newsletter");

      form.find(".form-group").removeClass("error");
      if (resp.result === "error") {
        form.find(".form-group").addClass("error");
      } else {
        form.find(".form-control").fadeIn().val("");
      }

      messageContainer.slideDown("slow", "swing");

      setTimeout(function () {
        messageContainer.slideUp("slow", "swing");
      }, 10000);
    }


    /* _____________________________________

     Charts / Circle Animation
     _____________________________________ */

    if ($('#charts').length && $('.skeleton').length) {
      var elements = $('#charts .circle');
      var o = $('#charts'),
        cc = 1;

      $(window).on('scroll', function () {
        var elemPos = o.offset().top,
          elemPosBottom = o.offset().top + o.height(),
          winHeight = $(window).height(),
          scrollToElem = elemPos - winHeight,
          winScrollTop = $(this).scrollTop();

        if (winScrollTop > scrollToElem) {
          if (elemPosBottom > winScrollTop) {
            if (cc < 2) {
              cc = cc + 2;
              var circles = [];

              for (var i = 0; i < elements.length; i++) {
                var child = elements[i].id,
                  percentage = $(elements[i]).data('percentage'),
                  unit = $(elements[i]).data('unit'),
                  value = $(elements[i]).data('value');

                circles.push(Circles.create({
                  id: child,
                  value: percentage,
                  radius: 64,
                  width: 4,
                  duration: 1200,
                  text: '<p class="chart-value">' + value + '<span class="chart-unit">' + unit + '</span></p>'
                }));
              }
            }
          }
        }
      });
    }


    /* _____________________________________

     Bootstrap Fix: IE10 in Win 8 & Win Phone 8
     _____________________________________ */


    if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
      var msViewportStyle = document.createElement("style")
      msViewportStyle.appendChild(
        document.createTextNode(
          "@-ms-viewport{width:auto!important}"
        )
      )
      document.querySelector("head").appendChild(msViewportStyle)
    }

  }
)
;
