<?php
error_reporting(0);
@session_start();
switch ($_GET['page']) {

        // Home
    case "home":
        include 'home.php';
        break;

        // Menu Asset
    case "data_asset":
        include 'view/asset/data_asset.php';
        break;

        // Menu Karyawan
    case "karyawan":
        include 'view/karyawan/data_karyawan.php';
        break;

        // Menu Search
    case "cari_karyawan":
        include 'cari_data_karyawan.php';
        break;

        // Menu Admin
    case "user":
        include 'view/admin/data_user.php';
        break;

        // Dashboard
    case "dashboard":
        include 'dashboard.php';
        break;

        // Menu Check in & Check Out
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

        // Menu Status
    case "status_archived":
        include 'view/status/status_archived.php';
        break;
    case "status_deployable":
        include 'view/status/status_deployable.php';
        break;
    case "status_deployed":
        include 'view/status/status_deployed.php';
        break;
    case "status_pending":
        include 'view/status/status_pending.php';
        break;
    case "status_undeployable":
        include 'view/status/status_undeployable.php';
        break;

        // Menu Tambah Kategori
    case "tambah_ba":
        include 'view/kategori/tambah_ba.php';
        break;
    case "tambah_divisi":
        include 'view/kategori/tambah_divisi.php';
        break;
    case "tambah_pa":
        include 'view/kategori/tambah_pa.php';
        break;
}
