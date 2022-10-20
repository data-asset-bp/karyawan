<main>
  <div class="container-fluid">
    <h1 class="mt-4">Admin User</h1>

    <div class="card mb-4">
      <div class="card-header">
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_asset"><i class="fa fa-plus"></i>
        </button>
      </div>
      <div class="card-body">
        <div class="table table-responsive">
          <table align="center" width="100%" cellspacing="0" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <td style="text-align:center">No</td>
                <td>Name</td>
                <td>Username</td>
                <td>Password</td>
                <td>Action</td>
              </tr>
            </thead>
            <tbody>
              <?php

              $no = 0;

              //mengambil data user
              $sql = "SELECT * FROM user";
              $hasil = mysqli_query($con, $sql);
              $jumlah = mysqli_num_rows($hasil);
              while ($data = mysqli_fetch_array($hasil)) {
                $no++;
                $id = $data['id_user'];
                $username = $data['username'];
                $password = $data['password'];
                $nama = $data['nama'];


              ?>
                <tr>
                  <td style="text-align:center"><?= $no; ?></td>
                  <td><?= $nama; ?></td>
                  <td><?= $username; ?></td>
                  <td><?= $password; ?></td>


                  <td>
                    <button type="button" class="dcd-badge dcd-badge-warning" data-toggle="modal" data-target="#edit<?= $id; ?>"><i class="fa fa-edit"></i>
                    </button>
                    <button type="button" class="dcd-badge dcd-badge-danger" data-toggle="modal" data-target="#delete<?= $id; ?>"><i class="fa fa-trash"></i>
                    </button>

                    <!-- edit The Modal -->
                    <div class="modal fade" id="edit<?= $id; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Edit Data User</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <form method="post">
                            <div class="modal-body">
                              <label>Name</label>
                              <input type="text" name="nama" readonly value="<?= $nama; ?>" class="form-control" required>
                              <br>
                              <label>Username</label>
                              <input type="text" name="username" value="<?= $username; ?>" class="form-control" required>
                              <br>
                              <label>Password</label>
                              <input type="text" name="password" value="<?= $password; ?>" class="form-control" required>
                              <br>
                              <input type="hidden" name="idp" value="<?= $id; ?>">
                              <button type="submit" class="btn btn-primary btn-sm ml-2" name="edituser">Save</button>
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
                            <h4 class="modal-title">Delete User</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <form method="post">
                            <div class="modal-body">
                              Are you sure you want to delete? <?= $username; ?>?
                              <input type="hidden" name="idp" value="<?= $id; ?>">
                              <br>
                              <br>
                              <button type="submit" class="btn btn-danger btn-sm ml-2" name="hapususer">Yes, Delete</button>
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
<?php
include "tambah_user.php";
?>