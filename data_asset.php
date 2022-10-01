<main>
  <div class="container-fluid">
    <h1 class="mt-4">Data Asset</h1>

    <div class="card mb-4">
      <div class="card-header">
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#myModal">
          ADD
        </button>
        <a href="export.php"><button type="button" class="btn btn-success btn-sm ml-2">Export</button></a>

        <br><br>
        <div class="card mb-4">
          <div class="card-header">
            <form method="post">
              <label>Select Search Type</label>
              <select class="form-control" name="pil">
                <option selected disabled>--Select Search Type--</option>
                <option value='1'>Asset Number</option>
                <option value='2'>Type Asset</option>
                <option value='3'>Serial Number</option>
                <option value='4'>ASSET DESCRIPTION</option>
              </select>
              <br>
              <label>Select Search Type</label>
              <input type="text" name="carinama" placeholder="Input Search Type" class="form-control"><br>
              <input type="submit" class="btn btn-warning btn-sm ml-2" value="Search" name="cari">
            </form>

          </div>
          <div class="card-body">
            <div class="table table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <td>No</td>
                    <td>Asset Number</td>
                    <td>Type Asset</td>
                    <td>Serial Number</td>
                    <td>Date</td>
                    <td>Description</td>
                    <td>Status</td>
                    <td>Checkin/Checkout</td>
                    <td>More</td>

                  </tr>
                </thead>
                <tbody>
                  <?php

                  $namacari = $_POST['carinama'];
                  $pil = $_POST['pil'];
                  $no = 0;

                  //mengambil data pegawai
                  if ($pil == 1) {
                    $sql = mysqli_query($con, "SELECT * FROM data_asset where no_asset like '%$namacari%' ");
                  } elseif ($pil == 2) {
                    $sql = mysqli_query($con, "SELECT * FROM data_asset where asset_type like '%$namacari%' ");
                  } elseif ($pil == 3) {
                    $sql = mysqli_query($con, "SELECT * FROM data_asset where no_serial like '%$namacari%' ");
                  } elseif ($pil == 4) {
                    $sql = mysqli_query($con, "SELECT * FROM data_asset where asset_description like '%$namacari%' ");
                  } else {
                    $sql = mysqli_query($con, "SELECT * FROM data_asset");
                  }

                  while ($data = mysqli_fetch_array($sql)) {
                    $no++;
                    $id = $data['id_asset'];
                    $no_asset = $data['no_asset'];
                    $type = $data['asset_type'];
                    $no_serial = $data['no_serial'];
                    $date = $data['cap_date'];
                    $description = $data['asset_description'];
                    $sts = $data['sts_asset'];

                  ?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $no_asset; ?></td>
                      <td><?= $type; ?></td>
                      <td><?= $no_serial; ?></td>
                      <td><?= $date; ?></td>
                      <td><?= $description; ?></td>
                      <td><?= sts_check($sts); ?></td>
                      <td>
                        <button type="button" class="btn btn-danger btn-sm ml-2" data-toggle="modal" data-target="#checkout<?= $id; ?>">
                          CHECKOUT
                        </button>

                        <!-- Checkout The Modal -->
                        <div class="modal fade" id="checkout<?= $id; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Asset Checkout Process</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <form method="post">
                                <div class="modal-body">
                                  <label>No. Asset</label>
                                  <input type="text" name="no_asset" value="<?= $no_asset; ?>" class="form-control" required readonly>
                                  <br>
                                  <label>Type Asset</label>
                                  <input type="text" name="type" value="<?= $type; ?>" class="form-control" required readonly>
                                  <br>
                                  <label>No. Serial</label>
                                  <input type="text" name="no_serial" value="<?= $no_serial; ?>" class="form-control" required readonly>
                                  <br>
                                  <label>Asset Description</label>
                                  <input type="text" name="description" value="<?= $description; ?>" class="form-control" required readonly>
                                  <br>
                                  <label>STATUS</label>
                                  <select class="form-control" name="sts">
                                    <option value='1'>Pending</option>
                                    <option value='2'>UnDiployable</option>
                                    <option value='3'>Deployed</option>
                                    <option value='4'>Archived</option>
                                    <option value='5'>Deployable</option>
                                  </select>
                                  <br>
                                  <label>Checkout to</label>
                                  <!-- ./row -->
                                  <div class="row">
                                    <div class="card-body">
                                      <div class="card card-primary card-tabs">
                                        <div class="card-header p-0 pt-1">
                                          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                            <li class="nav-item">
                                              <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">User</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Asset</a>
                                            </li>

                                          </ul>
                                        </div>
                                        <div class="card-body">
                                          <div class="tab-content" id="custom-tabs-one-tabContent">
                                            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                              <select class="form-control" style="width: 100%;" name="Nrp">
                                                <option value="">Pilih nama</option>
                                                <?PHP
                                                //mengambil data karyawan
                                                $sql_kary = mysqli_query($con, "SELECT * FROM data_karyawan order by Nama_karyawan ASC");
                                                while ($data_kary = mysqli_fetch_array($sql_kary)) {
                                                ?>
                                                  <option value="<?= $data_kary['Nrp']; ?>"><?= $data_kary['Nama_karyawan']; ?></option>
                                                <?php
                                                }
                                                ?>
                                              </select>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                              <input type="text" value="<?= $description; ?>" class="form-control" required readonly>
                                            </div>

                                          </div>
                                        </div>
                                        <!-- /.card -->
                                      </div>
                                      <br>

                                      <br>

                                      <label>CHECKOUT DATE</label>
                                      <input type="date" name="tgl" class="form-control" required>
                                      <br>
                                      <label>NOTE</label>
                                      <input type="text" name="note" class="form-control" required>
                                      <br>
                                      <input type="hidden" name="idp" value="<?= $id; ?>">
                                      <button type="submit" class="btn btn-primary" name="checkout">Checkout</button>
                                    </div>
                              </form>

                            </div>
                          </div>
                        </div>
                      </td>

                      <td>
                        <button type="button" class="btn btn-info btn-sm ml-2" data-toggle="modal" data-target="#details<?= $id; ?>">
                          Details
                        </button>
                        <button type="button" class="btn btn-warning btn-sm ml-2" data-toggle="modal" data-target="#edit<?= $id; ?>">
                          Edit
                        </button>
                        <button type="button" class="btn btn-danger btn-sm ml-2" data-toggle="modal" data-target="#delete<?= $id; ?>">
                          Delete
                        </button>

                        <!-- edit The Modal -->
                        <div class="modal fade" id="edit<?= $id; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Edit Data Asset</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <form method="post">
                                <div class="modal-body">
                                  <label>No Asset</label>
                                  <input type="text" name="no_asset" placeholder="Input No Asset" value="<?= $no_asset; ?>" class="form-control" required>
                                  <br>
                                  <label>Type Asset</label>
                                  <input type="text" name="type" placeholder="Input Type Asset" value="<?= $type; ?>" class="form-control" required>
                                  <br>
                                  <label>No Serial</label>
                                  <input type="text" name="no_serial" placeholder="Input No Serial" value="<?= $no_serial; ?>" class="form-control" required>
                                  <br>
                                  <label>Date</label>
                                  <input type="text" name="date" value="<?= $date; ?>" class="form-control" required>
                                  <br>
                                  <label>Description</label>
                                  <input type="text" name="description" placeholder="Input Description" value="<?= $description; ?>" class="form-control" required>
                                  <br>

                                  <input type="hidden" name="idp" value="<?= $id; ?>">
                                  <button type="submit" class="btn btn-primary" name="editasset">Simpan</button>
                                </div>
                              </form>

                            </div>
                          </div>
                        </div>

                        <!-- delete The Modal -->
                        <div class="modal fade" id="delete<?= $id; ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">

                              <!-- Modal Header -->
                              <div class="modal-header">
                                <h4 class="modal-title">Delete Asset</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>

                              <!-- Modal body -->
                              <form method="post">
                                <div class="modal-body">
                                  Are you sure you want to delete? <?= $no_asset; ?>?
                                  <input type="hidden" name="idp" value="<?= $id; ?>">
                                  <br>
                                  <br>
                                  <button type="submit" class="btn btn-danger" name="hapusasset">yes, delete</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
</main>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Asset</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form method="post">
        <div class="modal-body">
          <label>Asset Number</label>
          <input type="text" name="no_asset" placeholder="No Asset" class="form-control" required>
          <br>
          <label>Type Asset</label>
          <input type="text" name="type" placeholder="Aset Type" class="form-control" required>
          <br>
          <label>Serial Number</label>
          <input type="text" name="no_serial" placeholder="No Serial" class="form-control" required>
          <br>
          <label>Date</label>
          <input type="date" name="cap_date" placeholder="Cap Date" class="form-control" required>
          <br>
          <label>Asset Description</label>
          <input type="text" name="description" placeholder="Description" class="form-control" required>
          <br>


          <button type="submit" class="btn btn-primary" name="tambahasset">Save</button>
        </div>
      </form>



    </div>
  </div>
</div>