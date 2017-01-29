<?php
include "db.php";
include "functions.php";

$aksi = $_POST['aksi'];

if($aksi == 'tambah_data'){
	$nama = $_POST['nama'];
	$tgl = $_POST['tgl'];
	$alamat = $_POST['alamat'];
	$no = $_POST['no'];
	$hasil = masuk_data($nama,$tgl,$alamat,$no);
	$last_id = mysqli_insert_id($koneksi);
	if($hasil){
		echo "
					<tr id='data_$last_id'>
						<td>$last_id</td>
						<td>$nama</td>
						<td>$alamat</td>
						<td>$tgl</td>
						<td>$no</td>
						<td>
						<button class='edit_data' data-id='$last_id'> Edit </button>
						<button class='hapus_data' data-id='$last_id'> Hapus </button>
						</td>
					</tr>
				";
	}else{
		echo "0";
	}

}else if($aksi == 'hapus_data'){
	$id = $_POST['id'];
	$hasil = hapus($id);
	if($hasil){
		echo "0";
	}else{
		echo "1";
	}
}else if($aksi == 'show_edit_data'){
	$id = $_POST['id'];
	$data = tampilkan_isi_laki_per_id($id);
	while($hasil = mysqli_fetch_assoc($data)){
		$nama = $hasil['nama'];
		$alamat = $hasil['alamat'];
		$no_telp = $hasil['no_telp'];
		$tgl = $hasil['tgl_lahir'];
	}
	echo "
		<div id='data_modal_".$id."' >
		<div class='form-group'>
		<label > Nama : </label>
		  <input type='text' class='form-control' id='proses_edit_nama' value='".$nama."'>
		</div>
        <div class='form-group'>
		  <label > Tanggal Lahir: </label>
		  <input type='date' class='form-control' id='proses_edit_tgl' value='".$tgl."'>
		</div>
		<div class='form-group'>
		  <label > Alamat : </label>
		  <textarea class='form-control' rows='3' id='proses_edit_alamat'>".$alamat."</textarea>
		</div>
		<div class='form-group'>
		  <label > No.Telp : </label>
		  <input type='number' class='form-control' id='proses_edit_no' value='".$no_telp."'>
		</div>
        
        <button type='button' class='btn btn-primary' id='proses_edit_data' data-id='".$id."'>Edit</button>
        <button type='button' class='btn btn-default' id='batal_edit_data'  data-id='".$id."' data-dismiss='modal'>Batal</button>
        </div>
	";

}else if($aksi == 'proses_edit_data'){
	$id = $_POST['id_data'];
	$nama = $_POST['nama'];
	$tgl = $_POST['tgl'];
	$alamat = $_POST['alamat'];
	$no = $_POST['no'];
	$hasil = edit($id,$nama,$tgl,$alamat,$no);
	if($hasil == true){
		echo "
					<tr id='data_$id'>
						<td>$id</td>
						<td>$nama</td>
						<td>$alamat</td>
						<td>$tgl</td>
						<td>$no</td>
						<td>
						<button class='edit_data' data-id='$id'> Edit </button>
						<button class='hapus_data' data-id='$id'> Hapus </button>
						</td>
					</tr>
				";
	}else{
		echo '0';
	}

}else{
	echo "0";
}


?>