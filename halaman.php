<?php 
error_reporting(0);
@session_start();
switch ($_GET['page']) {
    
//asset
case "home":
include 'home.php';
break;
case "pegawai":
include 'datapegawai.php';
break;
case "caripegawai":
include 'caridatapegawai.php';
break;
case "asset":
include 'data_asset.php';
break;
case "user":
include 'data_user.php';
break;
case "home":
include 'home.php';
break;
case "chekin":
include 'data_chekin.php';
break;
case "chekout":
include 'data_chekout.php';
break;

	
}
?>