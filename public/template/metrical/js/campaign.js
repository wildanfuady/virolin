$(document).ready(function(){

    String.prototype.replaceArray = function(find, replace) {
      var replaceString = this;
      var regex; 
      for (var i = 0; i < find.length; i++) {
        regex = new RegExp(find[i], "g");
        replaceString = replaceString.replace(regex, replace[i]);
      }
      return replaceString;
    };
  
    $("#campaign").keyup(function(){
      var text = $("#campaign").val();
      $("#campaign").removeClass('is-invalid');
      $("#campaign_group").removeClass('is-invalid');
      var find = [" ", '"', "'"];
      var replace = ["-", "", ""];
      text = text.replaceArray(find, replace);
      var url = "https://virolin.ilmucoding.com/"+ text.toLowerCase();
      $("#campaign_slug_text").html(url);
    });
  
    $('.cp2').colorpicker({});
    $('.dropify').dropify({
      messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
      }
    });
    $('#cp2').colorpicker();

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
  
    $("#next2").click(function(){
      var input_name = $("#campaign_lp_name");
      var input_camp = $("#campaign");
      var input_list = $("#campaign_group");
      var name = $("#campaign_lp_name").val();
      var list = $("#campaign_group").val();
      var camp = $("#campaign_group").val();

      if(name == ""){
        $(input_name).addClass('is-invalid');
        swal({
            title: "Oops!",
            text: "Nama campaign wajib diisi",
            type: "error"
        });

      } else if(camp == ""){
        $(input_camp).addClass('is-invalid');
        swal({
            title: "Oops!",
            text: "Campaign wajib diisi",
            type: "error"
        });
      } else if(list == ""){
        $(input_list).addClass('is-invalid');
        swal({
            title: "Oops!",
            text: "List subscriber wajib diisi",
            type: "error"
        });
      } else if(name == "" && list == ""){
        $(input_name).addClass('is-invalid');
        $(input_list).addClass('is-invalid');
        swal({
          title: "Oops!",
          text: "Nama campaign dan list subscriber wajib diisi",
          type: "error"
        });
      } else {
        $('.nav-tabs a[href="#form"]').tab('show');
      }
      // event.preventDefault();
      return false;
    });
    $("#prev1").click(function(){
      $('.nav-tabs a[href="#general"]').tab('show');
      return false;
    });
    $("#next3").click(function(){
      $('.nav-tabs a[href="#template"]').tab('show');
      return false;
    });
    $("#prev2").click(function(){
      $('.nav-tabs a[href="#form"]').tab('show');
      return false;
    });
    $("#next4").click(function(){
      
      if(cekInput("#block1_bg") == 0 || 
          cekInput("#block1_headline1") == 0 ||
          cekInput("#block1_headline2") == 0 ||
          cekInput("#block1_headline2_color") == 0 ||
          cekInput("#block1_btn_text_bg") == 0 ||
          cekInput("#block1_btn_text") == 0 ||
          cekInput("#block1_btn_text_color") == 0 ||
          cekInput("#block2_text_edukasi") == 0 ||
          cekInput("#block3_bg") == 0 ||
          cekInput("#block3_headline") == 0 ||
          cekInput("#block3_headline_color") == 0 ||
          cekInput("#block3_image") == 0 ||
          cekInput("#block3_text_alasan_color") == 0 ||
          cekInput("#block3_alasan1_icon") == 0 ||
          cekInput("#block3_alasan1_text") == 0 ||
          cekInput("#block3_alasan2_icon") == 0 ||
          cekInput("#block3_alasan2_text") == 0 ||
          cekInput("#block3_alasan3_icon") == 0 ||
          cekInput("#block3_alasan3_text") == 0 ||
          cekInput("#block3_alasan4_icon") == 0 ||
          cekInput("#block3_alasan4_text") == 0 ||
          cekInput("#block4_bg") == 0 ||
          cekInput("#block4_bg_headline") == 0 ||
          cekInput("#block4_text_headline") == 0 ||
          cekInput("#block4_text_headline_color") == 0 ||
          cekInput("#block4_text_headline_desc") == 0 ||
          cekInput("#block4_text_headline_desc_color") == 0 ||
          cekInput("#block4_image") == 0 ||
          cekInput("#block5_bg") == 0 ||
          cekInput("#block5_text") == 0 ||
          cekInput("#block6_bg") == 0 ||
          cekInput("#block6_text_headline_color") == 0 ||
          cekInput("#block6_text_headline") == 0 ||
          cekInput("#block6_image") == 0 ||
          cekInput("#block7_faq") == 0 ||
          cekInput("#block8_bg") == 0 ||
          cekInput("#block8_headline") == 0 ||
          cekInput("#block8_text_button") == 0 ||
          cekInput("#block8_text_color_button") == 0 ||
          cekInput("#block8_button_bg_color") == false){
        swal({
          title: "Oops!",
          text: "Terdapat beberapa data yang belum diisi",
          type: "error"
        });
      } else {
        $('.nav-tabs a[href="#share_wa"]').tab('show');
        return false;
      }
    });

    $("#next4_edit").click(function(){
      
      if(cekInput("#block1_bg") == 0 || 
          cekInput("#block1_headline1") == 0 ||
          cekInput("#block1_headline2") == 0 ||
          cekInput("#block1_headline2_color") == 0 ||
          cekInput("#block1_btn_text_bg") == 0 ||
          cekInput("#block1_btn_text") == 0 ||
          cekInput("#block1_btn_text_color") == 0 ||
          cekInput("#block2_text_edukasi") == 0 ||
          cekInput("#block3_bg") == 0 ||
          cekInput("#block3_headline") == 0 ||
          cekInput("#block3_headline_color") == 0 ||
          cekInput("#block3_text_alasan_color") == 0 ||
          cekInput("#block3_alasan1_icon") == 0 ||
          cekInput("#block3_alasan1_text") == 0 ||
          cekInput("#block3_alasan2_icon") == 0 ||
          cekInput("#block3_alasan2_text") == 0 ||
          cekInput("#block3_alasan3_icon") == 0 ||
          cekInput("#block3_alasan3_text") == 0 ||
          cekInput("#block3_alasan4_icon") == 0 ||
          cekInput("#block3_alasan4_text") == 0 ||
          cekInput("#block4_bg") == 0 ||
          cekInput("#block4_bg_headline") == 0 ||
          cekInput("#block4_text_headline") == 0 ||
          cekInput("#block4_text_headline_color") == 0 ||
          cekInput("#block4_text_headline_desc") == 0 ||
          cekInput("#block5_bg") == 0 ||
          cekInput("#block5_text") == 0 ||
          cekInput("#block6_bg") == 0 ||
          cekInput("#block6_text_headline_color") == 0 ||
          cekInput("#block6_text_headline") == 0 ||
          cekInput("#block7_faq") == 0 ||
          cekInput("#block8_bg") == 0 ||
          cekInput("#block8_headline") == 0 ||
          cekInput("#block8_text_button") == 0 ||
          cekInput("#block8_text_color_button") == 0 ||
          cekInput("#block8_button_bg_color") == 0){
        swal({
          title: "Oops!",
          text: "Terdapat beberapa data yang belum diisi",
          type: "error"
        });
      } else {
        $('.nav-tabs a[href="#share_wa"]').tab('show');
        return false;
      }
    });

    $("#prev3").click(function(){
      $('.nav-tabs a[href="#template"]').tab('show');
      return false;
    });
    $("#next5").click(function(){
      if(cekInput("#campaign_text_share") == 0){
        swal({
          title: "Oops!",
          text: "Teks share whatsapp wajib diisi",
          type: "error"
        });
      } else {
        $('.nav-tabs a[href="#email"]').tab('show');
        return false;
      }
    });
    $("#prev4").click(function(){
      $('.nav-tabs a[href="#share_wa"]').tab('show');
      return false;
    });

    $("#submit_create_campaign").click(function(){

      if(cekInput("#campaign_subject_confirm_email") == 0 ||
      cekInput("#editor1") == 0 ||
      cekInput("#campaign_subject_thank_email") == 0 ||
      cekInput("#editor2") == 0){
        swal({
          title: "Oops!",
          text: "Terdapat beberapa data yang belum diisi",
          type: "error"
        });
        return false;
      } else {
        $("#create_campaign").submit();
        return true;
      }
    });

    $("#submit_edit_campaign").click(function(){

      if(cekInput("#campaign_subject_confirm_email") == 0 ||
      cekInput("#editor1") == false ||
      cekInput("#campaign_subject_thank_email") == 0 ||
      cekInput("#editor2") == false){
        swal({
          title: "Oops!",
          text: "Terdapat beberapa data yang belum diisi",
          type: "error"
        });
      } else {
        $("#edit_campaign").submit();
        return false;
      }
    });
  
    $("#preview_teks_share").click(function(){
      
      var dataTeksShare = $("#campaign_text_share").val();
      var dataCampaignSlug = $("#campaign_slug_text").html();
      var potongSlug = dataCampaignSlug.replace("https://virolin.ilmucoding.com/", "");
      var dataCampaignName = $("#campaign_lp_name").val();
      if(dataTeksShare == ""){
        // alert("Anda harus mengisi teks share whatsapp terlebih dahulu");
        swal({
          title: "Oops!",
          text: "Anda harus mengisi teks share whatsapp terlebih dahulu",
          type: "error"
        });
      } else if(dataCampaignName == ""){
        // alert("Anda harus mengisi nama campaign terlebih dahulu");
        swal({
          title: "Oops!",
          text: "Anda harus mengisi nama campaign terlebih dahulu",
          type: "error"
        });
      } else {
        var close = $("#preview_teks_share").html("<i class='fa fa-eye-slash'></i> Close Preview");
        var add = "<br/><br/>Klik di sini untuk informasi lebih lengkap: <br/><br/> >> " +dataCampaignSlug;
        $("#row_preview_teks_share").html(dataTeksShare + add);
  
        $(close).click(function(evt){
          
          $("#row_preview_teks_share").hide();
          $("#preview_teks_share").html("<i class='fa fa-eye'></i> Preview Teks Share");
          evt.preventDefault();
          return false;
        
        });
  
      }
      return false;
  
    });
    
    $('.textarea').summernote({
      height: 350,
      followingToolbar: false
    });


});