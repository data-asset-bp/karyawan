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
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin=anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>

</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.php?page=dashboard">Asset PT. Bina Pertiwi</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

    <!-- Navbar-->

  </nav>
  <?php
  include('menu.php');
  ?>
  <div id="layoutSidenav_content">
    <?php
    include('halaman.php');
    ?>
    <?php
    include "footer.php";
    ?>
  </div>
  </div>

</body>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Pegawai</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form method="post">
        <div class="modal-body">
          <input type="text" name="nama" placeholder="Nama Pegawai" class="form-control" required>
          <br>
          <input type="text" name="alamat" placeholder="Alamat" class="form-control" required>
          <br>
          <input type="text" name="hp" placeholder="HP" class="form-control" required>
          <br>
          <select name="jk" class="form-control">
            <option value="1">Laki-laki</option>
            <option value="2">Perempuan</option>
          </select>
          <br>
          <input type="text" name="gaji" placeholder="Gaji" class="form-control" required>
          <br>
          <input type="date" name="tgl" placeholder="Tanggal Lahir" class="form-control" required>
          <br>

          <button type="submit" class="btn btn-primary" name="tambahpegawai">Submit</button>
        </div>
      </form>



    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="mytgl">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Filter Tanggal</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form method="post" action="index.php?page=datapegawai">
        <div class="modal-body">
          <input type="date" name="tgl1" class="form-control">
          <br>
          <input type="date" name="tgl2" class="form-control">
          <br>

          <button type="submit" class="btn btn-primary" name="filtertgl">Submit</button>
        </div>
      </form>



    </div>
  </div>
</div>

</body>

</html>