$('#tambah_data').on('click',function(){
  var tambah_nama = $('#tambah_nama').val();
  var tambah_tgl = $('#tambah_tgl').val();
  var tambah_alamat = $('#tambah_alamat').val();
  var tambah_no = $('#tambah_no').val();
  $.ajax({
  method: "POST",
  url: "functions/function.ajax.php",
  data: { nama : tambah_nama, tgl: tambah_tgl, alamat: tambah_alamat,no:tambah_no, aksi: "tambah_data"},
  success: function(data){
    console.log(data);
      if(data != 0){
        console.log("Nilai 1 data masuk");
        $('#table_data').append(data);
        $('#tambah_nama').val("");
        $('#tambah_tgl').val("");
        $('#tambah_alamat').val("");
        $('#tambah_no').val("");
        $('#tambah_data_modal').modal('hide');

      }/*else{
        console.log("Nilai 0 data gagal masuk");
        $('#tag-gagal-ditambahkan').fadeIn("slow");
        $('#tag-gagal-ditambahkan').fadeOut( "slow");
        $('#tambah_nama_tag').val("");
      }*/
    }
  })
});

//Hapus Data
$(document).on('click','.hapus_data',function(){
  var id_hapus = $(this).attr('data-id');
  $.ajax({
  method: "POST",
  url: "functions/function.ajax.php",
  data: { id : id_hapus, aksi: "hapus_data" },
  success: function(data){
    $("#data_"+id_hapus).remove();
    console.log(data);
    }
  })
});

//Show Edit Data
$(document).on('click','.edit_data',function(){
var id_edit = $(this).attr('data-id');
  $.ajax({
    method: "POST",
    url: "functions/function.ajax.php",
    data: { id : id_edit, aksi: "show_edit_data" },
    success: function(data){
      $("#body_modal_edit").append(data);
      //console.log(data);
      }
  });
$('#edit_data_modal').modal('show');
});

//Batal Edit Data
$(document).on('click','#batal_edit_data',function(){
  var update_id_data = $(this).attr('data-id');
      $('#data_modal_'+update_id_data).remove();
      $('#edit_data_modal').modal('hide');
});

//Proses Edit Data
$(document).on('click','#proses_edit_data',function(){
  var update_id_data = $(this).attr('data-id');
  var update_nama = $('#proses_edit_nama').val();
  var update_tgl = $('#proses_edit_tgl').val();
  var update_alamat = $('#proses_edit_alamat').val();
  var update_no = $('#proses_edit_no').val();
  $.ajax({
    method: "POST",
    url: "functions/function.ajax.php",
    data: { id_data : update_id_data, nama : update_nama, tgl : update_tgl, alamat : update_alamat, no : update_no, aksi: "proses_edit_data" },
    success: function(data){
      console.log(data);
      if(data != 0){
      $("#data_"+update_id_data).remove();
      $('#data_modal_'+update_id_data).remove();
      $('#edit_data_modal').modal('hide');
      $('#table_data').append(data);
    }else{
      console.log("Nilai 0 data gagal masuk");
      alert("gagal di edit coy");
    }
      }
  });
});
