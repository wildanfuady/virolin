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

    // User CRUD =======================================================


    // Create List Grup Subscriber

    $("#btn_submit_create_list_subscribers").click(function(){
      if(cekInput("#group_name") == false){
        swal_error_alert("Nama list grup subscriber wajib diisi");
      } 
      if(cekInput("#group_status") == false){
        swal_error_alert("Status wajib diisi");
      } 
      if(cekInput("#group_name") == false && cekInput("#group_status") == false){
        swal_error_alert("Grup list subscriber dan status wajib diisi");
      } else { $("#create_list_subscribers").submit(); }
    });

    // End Create List Grup Subscriber

    // Create List Grup Subscriber

    $("#btn_update_create_list_subscribers").click(function(){
      if(cekInput("#edit_group_name") == false){
        swal_error_alert("Nama list grup subscriber wajib diisi");
      } 
      if(cekInput("#edit_group_status") == false){
        swal_error_alert("Status wajib diisi");
      } 
      if(cekInput("#edit_group_name") == false && cekInput("#edit_group_status") == false){
        swal_error_alert("Grup list subscriber dan status wajib diisi");
      } else { $("#update_list_subscribers").submit(); }
    });

    // End Create List Grup Subscriber

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
    
});