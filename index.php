<?php

include "functions/functions.php";

$tampil = tampilkan_isi_laki();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CRUD-AJAX-Bootstrap</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<link href="./bootstrap/css/bootstrap.css" rel="stylesheet">
	</head>
<body>
	<div class="container">
		<div class="row" style="margin-top:30px;">

			<div class="col-md-12">

				<h2> CRUD-AJAX-Bootstrap </h2>

				<div style="margin-top:5px;margin-bottom:5px;">

				<button class="btn btn-default" data-toggle="modal" data-target="#tambah_data_modal">Tambah data</button>

				</div>

				<table class="table">
				<tbody id="table_data">
					<tr>
						<td> ID </td>
						<td> Nama </td>
						<td> Alamat </td>
						<td> Tanggal Lahir </td>
						<td> No Telp </td>
						<td> Aksi </td>
					</tr>
				<?php
				foreach( $tampil as $muncul ){
				?>
					<tr id="data_<?php echo $muncul['id'];?>">
						<td><?php echo $muncul['id'];?></td>
						<td><?php echo $muncul['nama'];?></td>
						<td><?php echo $muncul['alamat'];?></td>
						<td><?php echo $muncul['tgl_lahir'];?></td>
						<td><?php echo $muncul['no_telp'];?></td>
						<td>
						<button class="edit_data" data-id="<?php echo $muncul['id'];?>"> Edit </button>
						<button class="hapus_data" data-id="<?php echo $muncul['id'];?>"> Hapus </button>
						</td>
					</tr>
				<?php
				}
				?>
				</tbody>
				</table>

		</div>

		</div>
	</div>
<!-- Modal Tambah Data-->
<div class="modal fade" id="tambah_data_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
		  <label > Nama : </label>
		  <input type="text" class="form-control" id="tambah_nama" placeholder="Nama Lengkap Anda">
		</div>
        <div class="form-group">
		  <label > Tanggal Lahir: </label>
		  <input type="date" class="form-control" id="tambah_tgl" placeholder="1999-12-30">
		</div>
		<div class="form-group">
		  <label > Alamat : </label>
		  <textarea class="form-control" rows="3" id="tambah_alamat"></textarea>
		</div>
		<div class="form-group">
		  <label > No.Telp : </label>
		  <input type="number" class="form-control" id="tambah_no">
		</div>
        
        <button type="button" class="btn btn-primary" id="tambah_data">Tambah</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Edit Data-->
<div class="modal fade" id="edit_data_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
      </div>
      <div class="modal-body" id="body_modal_edit">
        

      </div>
    </div>
  </div>
</div>
<script src="./jquery/jquery.min.js"></script>
<script src="./jquery/my.js"></script>
<script src="./bootstrap/js/bootstrap.js"></script>
</body>
</html>
