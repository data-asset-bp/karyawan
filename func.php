<?php

function jk($kode)
{
	if ($kode == 1) {
		echo "Laki-laki";
	} else {
		echo "Perempuan";
	}
}

function sts_check($kode)
{
	if ($kode == 1) {
		echo "Pending";
	} elseif ($kode == 2) {
		echo "Un-Deployed";
	} elseif ($kode == 3) {
		echo "Deployed";
	} elseif ($kode == 4) {
		echo "Archived";
	} elseif ($kode == 5) {
		echo "Deployable";
	}
}

//ubah nama bulan menjadi bahasa indonesia
function tanggal_indo($tanggal)
{
	$bulan = array(
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];
}

//Merubah NRp ke nama karyawan
function nrptonama($id)
{
	include("koneksi.php");
	$sql = "SELECT Nama_karyawan FROM data_karyawan WHERE Nrp='$id'";
	$hasil = mysqli_query($con, $sql);
	$data = mysqli_fetch_array($hasil);
	return $data['Nama_karyawan'];
}

//Merubah no_asset to description
function noassettodesc($id)
{
	include("koneksi.php");
	$sql = "SELECT asset_description FROM data_asset WHERE no_asset='$id'";
	$hasil = mysqli_query($con, $sql);
	$data = mysqli_fetch_array($hasil);
	return $data['asset_description'];
}

//Merubah no_asset to Nrp
function noassettonrp($id)
{
	include("koneksi.php");
	$sql = "SELECT Nrp FROM data_chek_asset WHERE no_asset='$id'";
	$hasil = mysqli_query($con, $sql);
	$data = mysqli_fetch_array($hasil);
	return $data['Nrp'];
}

//Merubah no_asset to serial number
function no_asset_to_no_serial($id)
{
	include("koneksi.php");
	$sql = "SELECT no_serial FROM data_asset WHERE no_asset='$id'";
	$hasil = mysqli_query($con, $sql);
	$data = mysqli_fetch_array($hasil);
	return $data['no_serial'];
}

//Merubah no_asset to serial number
function no_asset_to_asset_type($id)
{
	include("koneksi.php");
	$sql = "SELECT asset_type FROM data_asset WHERE no_asset='$id'";
	$hasil = mysqli_query($con, $sql);
	$data = mysqli_fetch_array($hasil);
	return $data['asset_type'];
}

//Merubah no_asset to nama admin
function no_asset_to_nama_admin($id)
{
	include("koneksi.php");
	$sql = "SELECT nama FROM user WHERE id_user='$id'";
	$hasil = mysqli_query($con, $sql);
	$data = mysqli_fetch_array($hasil);
	return $data['nama'];
}

function no_asset_to_status_chek($id)
{
	include("koneksi.php");
	$sql = "SELECT sts_chek FROM data_chek_asset WHERE no_asset='$id'";
	$hasil = mysqli_query($con, $sql);
	$data = mysqli_fetch_array($hasil);
	return $data['sts_chek'];
}

function status_chek_to_status_asset($id)
{
	include("koneksi.php");
	$sql = "SELECT sts_chek FROM data_chek_asset WHERE no_asset='$id'";
	$hasil = mysqli_query($con, $sql);
	$data = mysqli_fetch_array($hasil);
	return $data['sts_chek'];
}
