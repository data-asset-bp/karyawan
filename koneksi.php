<?php
	$server="localhost";
	$database="stocktaking";
	$user="root";
	$pass="";


	$con=mysqli_connect($server,$user,$pass,$database);
	if(!$con)
	{
		die("koneksi gagal:".mysqli_connect_error());
	}
?>