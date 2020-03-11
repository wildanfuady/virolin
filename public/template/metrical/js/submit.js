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

    // $('.dropify').dropify({
    //   messages: {
    //     'default': 'Drag and drop a file here or click',
    //     'replace': 'Drag and drop or click to replace',
    //     'remove':  'Remove',
    //     'error':   'Ooops, something wrong happended.'
    //   }
    // });

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

    // CREATE PAYMENT CONFIRMATION

    $("#btn_payment_confirmation").click(function(){
      
      if(cekInput("#invoice") == false){
        swal_error_alert("Invoice wajib diisi");
      } else if(cekInput("#pengirim") == false){
        swal_error_alert("Nama Pengirim wajib diisi");
      } else if(cekInput("#jumlah_transfer") == false){
        swal_error_alert("Jumlah Transfer wajib diisi");
      } else if(cekInput("#bank") == false){
        swal_error_alert("Bank Tujuan wajib diisi");
      } else if(cekInput("#tanggal_transfer") == false){
        swal_error_alert("Tanggal Transfer wajib diisi");
      } else { $("#form_payment_confirmation").submit(); }

    });

    // ======================== MODUL ADMIN =================================

    // CREATE PERMISSION

    $("#btn_create_permission").click(function(){
      
      if(cekInput("#permission_name") == false){
        swal_error_alert("Permission wajib diisi");
      } else { $("#form_create_permission").submit(); }

    });

    // EDIT PERMISSION

    $("#btn_edit_permission").click(function(){
      
      if(cekInput("#edit_permission_name") == false){
        swal_error_alert("Permission wajib diisi");
      } else { $("#form_edit_permission").submit(); }

    });
    
    // CREATE BANK

    $("#btn_create_bank").click(function(){
      
      if(cekInput("#bank_name") == false){
        swal_error_alert("Nama Bank wajib diisi");
      } else if(cekInput("#bank_code") == false){
        swal_error_alert("Kode Bank wajib diisi");
      } else if(cekInput("#bank_number") == false){
        swal_error_alert("Nomor Rekening Bank wajib diisi");
      } else if(cekInput("#bank_nasabah") == false){
        swal_error_alert("Nama Nasabah Bank wajib diisi");
      } else if(cekInput("#bank_status") == false){
        swal_error_alert("Status Bank wajib diisi");
      } else if(cekInput("#bank_image") == false){
        swal_error_alert("Logo Bank wajib diisi");
      } else { $("#form_create_bank").submit(); }

    });

    // EDIT BANK

    $("#btn_edit_bank").click(function(){
      
      if(cekInput("#bank_name") == false){
        swal_error_alert("Nama Bank wajib diisi");
      } else if(cekInput("#bank_code") == false){
        swal_error_alert("Kode Bank wajib diisi");
      } else if(cekInput("#bank_number") == false){
        swal_error_alert("Nomor Rekening Bank wajib diisi");
      } else if(cekInput("#bank_nasabah") == false){
        swal_error_alert("Nama Nasabah Bank wajib diisi");
      } else if(cekInput("#bank_status") == false){
        swal_error_alert("Status Bank wajib diisi");
      } else { $("#form_edit_bank").submit(); }
    });

    // CREATE PRODUCT

    $("#btn_create_product").click(function(){
      
      if(cekInput("#product_name") == false){
        swal_error_alert("Nama Produk wajib diisi");
      } else if(cekInput("#product_max_db") == false){
        swal_error_alert("Maksimal Database Produk wajib diisi");
      } else if(cekInput("#product_price") == false){
        swal_error_alert("Harga Produk wajib diisi");
      } else if(cekInput("#product_type") == false){
        swal_error_alert("Tipe Produk wajib diisi");
      } else if(cekInput("#product_status") == false){
        swal_error_alert("Status wajib diisi");
      } else if(cekInput("#product_desc") == false){
        swal_error_alert("Deskripsi produk wajib diisi");
      } else { $("#form_create_product").submit(); }

    });

    // EDIT PRODUCT

    $("#btn_edit_product").click(function(){
      
      if(cekInput("#product_name") == false){
        swal_error_alert("Nama Produk wajib diisi");
      } else if(cekInput("#product_max_db") == false){
        swal_error_alert("Maksimal Database Produk wajib diisi");
      } else if(cekInput("#product_price") == false){
        swal_error_alert("Harga Produk wajib diisi");
      } else if(cekInput("#product_type") == false){
        swal_error_alert("Tipe Produk wajib diisi");
      } else if(cekInput("#product_status") == false){
        swal_error_alert("Status wajib diisi");
      } else if(cekInput("#product_desc") == false){
        swal_error_alert("Deskripsi produk wajib diisi");
      } else { $("#form_edit_product").submit(); }

    });

    // CREATE PROMO

    $("#btn_create_promo").click(function(){
      
      if(cekInput("#promo_title") == false){
        swal_error_alert("Judul Promo wajib diisi");
      } else if(cekInput("#promo_status") == false){
        swal_error_alert("Status Promo wajib diisi");
      } else if(cekInput("#promo_start") == false){
        swal_error_alert("Tanggal Mulai Promo wajib diisi");
      } else if(cekInput("#promo_end") == false){
        swal_error_alert("Tanggal Berakhir Promo wajib diisi");
      } else if(cekInput("#promo_code") == false){
        swal_error_alert("Kode Promo wajib diisi");
      } else if(cekInput("#promo_percent") == false){
        swal_error_alert("Potongan Promo wajib diisi");
      } else if(cekInput("#promo_image") == false){
        swal_error_alert("Thumbnail Promo produk wajib diisi");
      } else if(cekInput("#promo_content") == false){
        swal_error_alert("Konten Promo wajib diisi");
      } else { $("#form_create_promo").submit(); }

    });

    // EDIT PROMO

    $("#btn_edit_promo").click(function(){
      
      if(cekInput("#promo_title") == false){
        swal_error_alert("Judul Promo wajib diisi");
      } else if(cekInput("#promo_status") == false){
        swal_error_alert("Status Promo wajib diisi");
      } else if(cekInput("#promo_start") == false){
        swal_error_alert("Tanggal Mulai Promo wajib diisi");
      } else if(cekInput("#promo_end") == false){
        swal_error_alert("Tanggal Berakhir Promo wajib diisi");
      } else if(cekInput("#promo_code") == false){
        swal_error_alert("Kode Promo wajib diisi");
      } else if(cekInput("#promo_percent") == false){
        swal_error_alert("Potongan Promo wajib diisi");
      } else if(cekInput("#promo_content") == false){
        swal_error_alert("Konten Promo wajib diisi");
        
      } else { $("#form_edit_promo").submit(); }

    });

});