<?php
include "db.php";

function tampilkan_isi_laki(){
	global $koneksi;
	$query = "SELECT id,nama,tgl_lahir,alamat,no_telp FROM `laki`";
	return	hasil($query);
}

function tampilkan_isi_laki_per_id($id){
	$query = "SELECT id,nama,tgl_lahir,alamat,no_telp FROM `laki` WHERE id=$id";
	return hasil($query);
}

function masuk_data($nama,$tgl_lahir,$alamat,$no_telp){
	$query = "INSERT INTO `laki`(`nama`,`tgl_lahir`,`alamat`,`no_telp`) values ('$nama','$tgl_lahir','$alamat','$no_telp')";
	return run($query);
}

function edit($id,$nama,$tgl_lahir,$alamat,$no_telp){
	$query = "UPDATE `laki` SET `nama` = '$nama', `tgl_lahir` = '$tgl_lahir' ,`alamat` = '$alamat',`no_telp` = '$no_telp' WHERE `laki`.`id` = $id;";
	return run($query);
}

function hapus($id){
	$query = "DELETE FROM `laki` WHERE `laki`.`id` = $id;";
	return run($query);
}

function hasil($query){
	global $koneksi;
	$hasil = mysqli_query($koneksi,$query);
	return $hasil;
}

function run($query){
	global $koneksi;
	$hasil = mysqli_query($koneksi,$query);
	
	if($hasil){
		return true;
	}else{
		return false;
	}
}

?>
