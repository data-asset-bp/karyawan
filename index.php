<?php
session_start();
include("koneksi.php");
include("func.php");
include("function.php");
include("cek.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Asset BP</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>

  <!-- warna button -->
  <link rel="stylesheet" href="https://d17ivq9b7rppb3.cloudfront.net/build/semicolon_style-a0b4c1fa3d.css" as="style" onload="this.rel='stylesheet'">

  <!-- Style tabel & warna button -->
  <!-- <link rel="stylesheet" href="https://d17ivq9b7rppb3.cloudfront.net/build/newdashboards_style-66a72c1e6d.css"> -->
  <!-- <link rel="stylesheet" href="https://d17ivq9b7rppb3.cloudfront.net/build/dashboard-addons_style-a1674c7903.css" as="style" onload="this.rel='stylesheet'"> -->

</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="indexx.php">Asset PT. Bina Pertiwi</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

    <!-- Navbar-->

  </nav>
  <?php
  include("menu.php");
  ?>
  <div id="layoutSidenav_content">
    <?php
    include("routes/web.php");
    ?>
    <?php
    include("footer.php");
    ?>
  </div>
  </div>

</body>

</html>