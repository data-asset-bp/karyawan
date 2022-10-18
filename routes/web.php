<?php
error_reporting(0);
@session_start();
switch ($_GET['page']) {

        // Home
    case "home":
        include 'indexx.php';
        break;

        // Menu Asset
    case "data_asset":
        include 'resources/views/asset/data_asset.php';
        break;

        // Menu Karyawan
    case "karyawan":
        include 'resources/views/karyawan/data_karyawan.php';
        break;

        // Menu Search
    case "cari_karyawan":
        include 'resources/views/search/cari_data_karyawan.php';
        break;

        // Menu Admin
    case "user":
        include 'resources/views/admin/data_user.php';
        break;

        // Dashboard
    case "dashboard":
        include 'resources/views/dashboard.php';
        break;

        // Menu Check in & Check Out
    case "chekin":
        include 'resources/views/checkin/data_chekin.php';
        break;
    case "chekout":
        include 'data_chekout.php';
        break;

        // Menu Status
    case "status_archived":
        include 'resources/views/status/status_archived.php';
        break;
    case "status_deployable":
        include 'resources/views/status/status_deployable.php';
        break;
    case "status_deployed":
        include 'resources/views/status/status_deployed.php';
        break;
    case "status_pending":
        include 'resources/views/status/status_pending.php';
        break;
    case "status_undeployable":
        include 'resources/views/status/status_undeployed.php';
        break;

        // Menu Tambah Kategori
    case "tambah_ba":
        include 'resources/views/kategori/tambah_ba.php';
        break;
    case "tambah_divisi":
        include 'resources/views/kategori/tambah_divisi.php';
        break;
    case "tambah_pa":
        include 'resources/views/kategori/tambah_pa.php';
        break;

        // Halaman Verify
    case "verify":
        include 'resources/views/auth/verify.php';
        break;
}
