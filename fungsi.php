<?php

session_start();

include("koneksi.php");


//menambah karyawan
if (isset($_POST['tambah_karyawan'])) {
	$nrp = $_POST['nrp'];
	$nama = $_POST['nama'];
	$div = $_POST['div'];
	$ba = $_POST['ba'];
	$pa = $_POST['pa'];
	$ho = $_POST['ho'];
	$position = $_POST['position'];


	$addtotable = mysqli_query($con, "insert into data_karyawan (Nrp,Nama_karyawan,New_Div,New_BA,New_PA,HO,Position) values('$nrp','$nama','$div','$ba','$pa','$ho','$position')");

	if ($addtotable) {

		header('location:indexx.php?page=karyawan');
	} else {
		echo 'Gagal';
		header('location:indexx.php');
	}
}


//update data karyawan
if (isset($_POST['edit_karyawan'])) {
	$idp = $_POST['idp'];
	$nrp = $_POST['nrp'];
	$nama = $_POST['nama'];
	$div = $_POST['div'];
	$pa = $_POST['pa'];
	$ba = $_POST['ba'];


	$query = mysqli_query($con, "update data_karyawan set Nrp='$nrp', Nama_karyawan='$nama', New_Div='$div', New_BA='$ba', New_PA='$pa' where id_karyawan='$idp'");
	if ($query) {
		header('location:indexx.php?page=karyawan');
	} else {
		echo 'Gagal';
		header('location:indexx.php');
	}
}

//menghapus data karyawan
if (isset($_POST['hapus_karyawan'])) {
	$idp = $_POST['idp'];

	$hapus = mysqli_query($con, "delete from  data_karyawan where id_karyawan='$idp'");
	if ($hapus) {
		header('location:indexx.php?page=karyawan');
	} else {
		echo 'Gagal';
		header('location:indexx.php');
	}
}


//menambah user
if (isset($_POST['tambahadmin'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];


	$addtotable = mysqli_query($con, "insert into user (nama, username, password) values('$nama', '$username','$password')");

	if ($addtotable) {

		header('location:indexx.php?page=admin');
	} else {
		echo 'Gagal';
		header('location:indexx.php');
	}
}


//update data user
if (isset($_POST['editadmin'])) {
	$idp = $_POST['idp'];
	$username = $_POST['username'];
	$password = $_POST['password'];


	$query = mysqli_query($con, "update user set  username='$username', password='$password' where id_user='$idp'");
	if ($query) {
		header('location:indexx.php?page=admin');
	} else {
		echo 'Gagal';
		header('location:indexx.php');
	}
}

//menghapus data user
if (isset($_POST['hapusadmin'])) {
	$idp = $_POST['idp'];

	$hapus = mysqli_query($con, "delete from  user where id_user='$idp'");
	if ($hapus) {
		header('location:indexx.php?page=admin');
	} else {
		echo 'Gagal';
		header('location:indexx.php');
	}
}

//menambah Asset
if (isset($_POST['tambahaset'])) {
	$no_asset = $_POST['no_asset'];
	$type = $_POST['type'];
	$no_serial = $_POST['no_serial'];
	$date = $_POST['cap_date'];
	$description = $_POST['description'];


	$addtotable = mysqli_query($con, "insert into data_asset (no_asset, asset_type, no_serial, cap_date, asset_description) values('$no_asset', '$type','$no_serial','$date','$description')");

	if ($addtotable) {

		header('location:indexx.php?page=aset');
	} else {
		echo 'Gagal';
		header('location:indexx.php');
	}
}


//update data asset
if (isset($_POST['editaset'])) {
	$idp = $_POST['idp'];
	$no_asset = $_POST['no_asset'];
	$type = $_POST['type'];
	$no_serial = $_POST['no_serial'];
	$date = $_POST['date'];
	$description = $_POST['description'];


	$query = mysqli_query($con, "update data_asset set  no_asset='$no_asset', asset_type='$type', no_serial='$no_serial', cap_date='$date', asset_description='$description' where no_asset='$idp'");
	if ($query) {
		header('location:indexx.php?page=aset');
	} else {
		echo 'Gagal';
		header('location:indexx.php');
	}
}

//menghapus data Asset
if (isset($_POST['hapusaset'])) {
	$idp = $_POST['idp'];

	$hapus = mysqli_query($con, "delete from  data_asset where no_asset='$idp'");
	if ($hapus) {
		header('location:indexx.php?page=aset');
	} else {
		echo 'Gagal';
		header('location:indexx.php');
	}
}
