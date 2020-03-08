function swal_delete_alert(url, string){
  swal({
    title: "Warning!",
    text: string,
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#5d78ff",
    confirmButtonText: "Ya",
    cancelButtonText: "Tidak"
  }, function() {
    window.location.href = url;
  });
}

$(document).ready(function(){

  var url = "http://127.0.0.1:8000/";

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

    function swal_error_alert(string){
      swal({
        title: "Oops!",
        text: string,
        type: "error"
      });
    }

    $('.dropify').dropify({
      messages: {
        'default': 'Drag and drop a file here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
      }
    });

    // User CRUD =======================================================


    // Create List Grup Subscriber

    $("#btn_submit_create_list_subscribers").click(function(){
      if(cekInput("#group_name") == false){
        swal_error_alert("Nama list grup subscriber wajib diisi");
      } 
      else if(cekInput("#group_status") == false){
        swal_error_alert("Status wajib diisi");
      } else { $("#create_list_subscribers").submit(); }
    });

    // End Create List Grup Subscriber

    // Edit List Grup Subscriber

    $("#btn_update_list_subscribers").click(function(){
      if(cekInput("#edit_group_name") == false){
        swal_error_alert("Nama list grup subscriber wajib diisi");
      } 
      else if(cekInput("#edit_group_status") == false){
        swal_error_alert("Status wajib diisi");
      } else { $("#update_list_subscribers").submit(); }
    });

    // End Edit List Grup Subscriber

    // Create Subscriber

    $("#btn_submit_create_subscriber").click(function(){
      if(cekInput("#sub_name") == false){
        swal_error_alert("Nama subscriber wajib diisi");
      } 
      else if(cekInput("#sub_email") == false){
        swal_error_alert("Email subscriber wajib diisi");
      } 
      else if(cekInput("#sub_lp") == false){
        swal_error_alert("Campaign wajib diisi");
      } 
      else if(cekInput("#sub_status") == false){
        swal_error_alert("Status wajib diisi");
      } else { $("#create_subscribers").submit(); }
    });

    // End Create Subscriber

    // Edit Profile

    $("#btn_update_profile").click(function(){
      
      if(cekInput("#edit_profile_name") == false){
        swal_error_alert("Nama user wajib diisi");
      } else if(cekInput("#edit_profile_gender") == false){
        swal_error_alert("Gender wajib diisi");
      } else if(cekInput("#edit_profile_phone") == false){
        swal_error_alert("Telp wajib diisi");
      } else if(cekInput("#edit_profile_address") == false){
        swal_error_alert("Alamat wajib diisi");
      } else { 
          swal({
            title: "Mantap!",
            text: "Berhasil mengubah data profile",
            type: "success"
          }, function() {
            $("#form_edit_profile").submit();
          });
      }
    });

    // End Edit Profile

    // Edit Password

    $("#btn_update_password").click(function(){
      
      if(cekInput("#edit_password_new") == false){
        swal_error_alert("Password baru wajib diisi");
      } else if(cekInput("#edit_password_re") == false){
        swal_error_alert("Konfirmasi password wajib diisi");
      } else { $("#form_update_password").submit(); }
    });

    // End Edit Password

    
});