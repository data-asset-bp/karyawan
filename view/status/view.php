<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>154</h3>

                                <p>Total Asset</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-laptop"></i>
                            </div>
                            <a href="index.php?page=asset" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>99</h3>

                                <p>Total Karyawan</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-circle"></i>
                            </div>
                            <a href="index.php?page=pegawai" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>42</h3>

                                <p>Total Asset Yang Digunakan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>30</h3>

                                <p>Total Asset Rusak</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                </aside>
                <!-- /.control-sidebar -->
            </div>
            <!-- ./wrapper -->

            <!-- jQuery -->
            <script src="/plugins/jquery/jquery.min.js"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
                $.widget.bridge('uibutton', $.ui.button)
            </script>
            <!-- Bootstrap 4 -->
            <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- ChartJS -->
            <script src="/plugins/chart.js/Chart.min.js"></script>
            <!-- Sparkline -->
            <script src="/plugins/sparklines/sparkline.js"></script>
            <!-- JQVMap -->
            <script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
            <script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
            <!-- jQuery Knob Chart -->
            <script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
            <!-- daterangepicker -->
            <script src="/plugins/moment/moment.min.js"></script>
            <script src="/plugins/daterangepicker/daterangepicker.js"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
            <!-- Summernote -->
            <script src="/plugins/summernote/summernote-bs4.min.js"></script>
            <!-- overlayScrollbars -->
            <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
            <!-- AdminLTE App -->
            <script src="/dist/js/adminlte.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="/dist/js/demo.js"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="/dist/js/pages/dashboard.js"></script>
</body>

</html>
<?php
//koneksi ke database
// $host = "localhost";
// $user = "root";
// $pass = "";
// $dbnm = "stocktaking";

// $con = mysqli_connect($server, $user, $pass, $database);
// if ($con) {
//     $open = mysqli_select_db($dbnm);
//     if (!$open) {
//         die("Database tidak dapat dibuka karena " . mysqli_error());
//     }
// } else {
//     die("Server MySQL tidak terhubung karena " . mysqli_error());
// }

// #ambil data di tabel dan masukkan ke array
// $query = "SELECT * FROM data_asset ORDER BY no_asset";
// $sql = mysqli_query($query);
// $data = array();
// while ($row = mysqli_fetch_assoc($sql)) {
//     array_push($data, $row);
// }

// #setting judul laporan dan header tabel
// $judul = "LAPORAN DATA MAHASISWA";
// $header = array(
//     array("label" => "NIM", "length" => 30, "align" => "L"),
//     array("label" => "NAMA", "length" => 50, "align" => "L"),
//     array("label" => "ALAMAT", "length" => 80, "align" => "L"),
//     array("label" => "TGL LAHIR", "length" => 30, "align" => "L")
// );

// #sertakan library FPDF dan bentuk objek
// require_once("fpdf16/fpdf.php");
// $pdf = new FPDF();
// $pdf->AddPage();

// #tampilkan judul laporan
// $pdf->SetFont('Arial', 'B', '16');
// $pdf->Cell(0, 20, $judul, '0', 1, 'C');

// #buat header tabel
// $pdf->SetFont('Arial', '', '10');
// $pdf->SetFillColor(255, 0, 0);
// $pdf->SetTextColor(255);
// $pdf->SetDrawColor(128, 0, 0);
// foreach ($header as $kolom) {
//     $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
// }
// $pdf->Ln();

// #tampilkan data tabelnya
// $pdf->SetFillColor(224, 235, 255);
// $pdf->SetTextColor(0);
// $pdf->SetFont('');
// $fill = false;
// foreach ($data as $baris) {
//     $i = 0;
//     foreach ($baris as $cell) {
//         $pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
//         $i++;
//     }
//     $fill = !$fill;
//     $pdf->Ln();
// }

// #output file PDF
// $pdf->Output();
