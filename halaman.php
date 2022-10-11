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

        // Export
    case "export":
        include 'export.php';
        break;

        // Status
    case "status_archived":
        include 'status_archived.php';
        break;
    case "status_deployable":
        include 'status_deployable.php';
        break;
    case "status_deployed":
        include 'status_deployed.php';
        break;
    case "status_pending":
        include 'status_pending.php';
        break;
    case "status_undeployable":
        include 'status_undeployable.php';
        break;

        // Tambah Kategori
    case "tambah_ba":
        include 'tambah_ba.php';
        break;
    case "tambah_divisi":
        include 'tambah_divisi.php';
        break;
    case "tambah_pa":
        include 'tambah_pa.php';
        break;
}
