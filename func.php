<?php

function jk($kode){
    if($kode==1){
        echo "Laki-laki";
    }else{
        echo "Perempuan";
    }
}

function sts_check($kode){
    if($kode==1){
        echo "Pending";
    }elseif($kode==2){
        echo "UnDiployable";
    }
	elseif($kode==3){
        echo "Deployed";
    }
	elseif($kode==4){
        echo "Archived";
    }
	elseif($kode==5){
        echo "Deployable";
    }
}

//ubah nama bulan menjadi bahasa indonesia
function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
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
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}

//FUNGSI MERUBAH ID JABATAN KE NAMA JABATAN
function jabatan($id)
{
	include("koneksi.php");
	$sql="SELECT nm_jabatan FROM r_jabatan WHERE id_jabatan='$id'";
	$hasil=mysqli_query($con,$sql);							
	$data=mysqli_fetch_array($hasil);
	return $data['nm_jabatan'];
}

//Merubah NRp ke nama karyawan
function nrptonama($id)
{
	include("koneksi.php");
	$sql="SELECT Nama_karyawan FROM data_karyawan WHERE Nrp='$id'";
	$hasil=mysqli_query($con,$sql);							
	$data=mysqli_fetch_array($hasil);
	return $data['Nama_karyawan'];
}

//Merubah no_asset to description
function noassettodesc($id)
{
	include("koneksi.php");
	$sql="SELECT asset_description FROM data_asset WHERE no_asset='$id'";
	$hasil=mysqli_query($con,$sql);							
	$data=mysqli_fetch_array($hasil);
	return $data['asset_description'];
}

//Merubah no_asset to Nrp
function noassettonrp($id)
{
	include("koneksi.php");
	$sql="SELECT Nrp FROM data_chek_asset WHERE no_asset='$id'";
	$hasil=mysqli_query($con,$sql);							
	$data=mysqli_fetch_array($hasil);
	return $data['Nrp'];
}

?>