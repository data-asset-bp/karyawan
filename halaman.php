<?php
error_reporting(0);
@session_start();
switch ($_GET['page']) {

        //asset
    case "home":
        include 'home.php';
        break;
    case "karyawan":
        include 'data_karyawan.php';
        break;
    case "cari_karyawan":
        include 'cari_data_karyawan.php';
        break;
    case "asset":
        include 'data_asset.php';
        break;
    case "user":
        include 'data_user.php';
        break;
    case "dashboard":
        include 'dashboard.php';
        break;
    case "chekin":
        include 'data_chekin.php';
        break;
    case "chekout":
        include 'data_chekout.php';
        break;
    case "export":
        include 'export.php';
        break;
    case "archived":
        include 'view/status/archived.php';
        break;
    case "deployable":
        include 'view/status/deployable.php';
        break;
    case "deployed":
        include 'view/status/deployed.php';
        break;
    case "pending":
        include 'view/status/pending.php';
        break;
    case "undeployable":
        include 'view/status/undeployable.php';
        break;
}
