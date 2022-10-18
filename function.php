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

		header('location:index.php?page=karyawan');
	} else {
		echo 'Gagal';
		header('location:index.php');
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
		header('location:index.php?page=karyawan');
	} else {
		echo 'Gagal';
		header('location:index.php');
	}
}

//menghapus data karyawan
if (isset($_POST['hapus_karyawan'])) {
	$idp = $_POST['idp'];

	$hapus = mysqli_query($con, "delete from  data_karyawan where id_karyawan='$idp'");
	if ($hapus) {
		header('location:index.php?page=karyawan');
	} else {
		echo 'Gagal';
		header('location:index.php');
	}
}


//menambah user
if (isset($_POST['tambahuser'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];


	$addtotable = mysqli_query($con, "insert into user (nama, username, password) values('$nama', '$username','$password')");

	if ($addtotable) {

		header('location:index.php?page=user');
	} else {
		echo 'Gagal';
		header('location:index.php');
	}
}


//update data user
if (isset($_POST['edituser'])) {
	$idp = $_POST['idp'];
	$username = $_POST['username'];
	$password = $_POST['password'];


	$query = mysqli_query($con, "update user set  username='$username', password='$password' where id_user='$idp'");
	if ($query) {
		header('location:index.php?page=user');
	} else {
		echo 'Gagal';
		header('location:index.php');
	}
}

//menghapus data user
if (isset($_POST['hapususer'])) {
	$idp = $_POST['idp'];

	$hapus = mysqli_query($con, "delete from  user where id_user='$idp'");
	if ($hapus) {
		header('location:index.php?page=user');
	} else {
		echo 'Gagal';
		header('location:index.php');
	}
}

//menambah Asset
if (isset($_POST['tambah_asset'])) {
	$no_asset = $_POST['no_asset'];
	$type = $_POST['type'];
	$no_serial = $_POST['no_serial'];
	$date = $_POST['cap_date'];
	$description = $_POST['description'];


	$addtotable = mysqli_query($con, "insert into data_asset (no_asset, asset_type, no_serial, cap_date, asset_description,sts_asset) values('$no_asset', '$type','$no_serial','$date','$description','1')");

	if ($addtotable) {

		header('location:index.php?page=data_asset');
	} else {
		echo 'Gagal';
		header('location:index.php');
	}
}


//update data asset
if (isset($_POST['edit_asset'])) {
	$idp = $_POST['idp'];
	$no_asset = $_POST['no_asset'];
	$type = $_POST['type'];
	$no_serial = $_POST['no_serial'];
	$date = $_POST['date'];
	$description = $_POST['description'];


	$query = mysqli_query($con, "update data_asset set no_asset='$no_asset', asset_type='$type', no_serial='$no_serial', cap_date='$date', asset_description='$description' where no_asset='$no_asset'");
	if ($query) {
		header('location:index.php?page=data_asset');
	} else {
		echo 'Gagal';
		header('location:index.php');
	}
}

//menghapus data Asset
if (isset($_POST['hapus_asset'])) {
	$idp = $_POST['idp'];

	$hapus = mysqli_query($con, "delete from  data_asset where no_asset='$no_asset'");
	if ($hapus) {
		header('location:index.php?page=data_asset');
	} else {
		echo 'Gagal';
		header('location:index.php');
	}
}

//menambah proses Checkout
if (isset($_POST['checkout'])) {
	$no_asset = $_POST['no_asset'];
	$nrp = $_POST['Nrp'];
	$tgl = $_POST['tgl'];
	$sts = $_POST['sts'];
	$note = $_POST['note'];

	if ($nrp == "") {
		$query = mysqli_query($con, "update data_asset set  sts_asset='$sts' where no_asset='$no_asset'");
	} else {
		$addtotable = mysqli_query($con, "insert into data_chek_asset (Nrp, no_asset, tgl_chekout, sts_chek, note_checkout) values('$nrp', '$no_asset','$tgl','$sts','$note')");
		$query = mysqli_query($con, "update data_asset set  sts_asset='$sts' where no_asset='$no_asset'");
	}
	if ($addtotable) {

		header('location:index.php?page=data_asset');
	} else {
		echo 'Gagal';
		header('location:index.php?page=data_asset');
	}
}

//menambah proses Checkin
if (isset($_POST['checkin'])) {
	$id = $_POST['id'];
	$tgl = $_POST['tgl'];
	$sts = $_POST['sts'];
	$note = $_POST['note'];
	$no_asset = $_POST['no_asset'];


	$query = mysqli_query($con, "update data_asset set sts_asset='$sts' where no_asset='$no_asset'");
	$query1 = mysqli_query($con, "update data_chek_asset set  sts_chek='$sts', tgl_chekin='$tgl', note_checkin='$note' where id_chek='$id'");

	if ($addtotable) {

		header('location:index.php?page=chekin');
	} else {
		echo 'Gagal';
		header('location:index.php?page=chekin	');
	}
}

//form peminjaman data asset
if (isset($_POST['print'])) {
	$idp = $_POST['idp'];
	$nrp = $_POST['nrp'];
	$nama_karyawan = $_POST['nama_karyawan'];
	$no_asset = $_POST['no_asset'];
	$asset_type = $_POST['asset_type'];
	$no_serial = $_POST['no_serial'];
	$asset_description = $_POST['asset_description'];

	$addtotable = mysqli_query($con, "insert into data_peminjaman (nrp, nama_karyawan, no_asset, asset_type, no_serial, asset_description) values('$nrp', '$nama_karyawan','$no_asset','$asset_type','$no_serial','$asset_description')");
}
