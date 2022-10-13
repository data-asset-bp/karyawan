<main>
  <div class="container-fluid">
    <h1 class="mt-4" style="text-align: center; font-family: 'Josefin Sans', sans-serif;">Admin User</h1>

    <div class="card mb-4">
      <div class="card-header">
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
          Tambah Akun
        </button>

        <br><br>

      </div>
      <div class="card-body">
        <div class="table table-responsive">
          <table align="center" width="100%" cellspacing="0" class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <td>NO</td>
                <td>NAMA LENGKAP</td>
                <td>USERNAME</td>
                <td>PASSWORD</td>
                <td>LAINNYA</td>

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
                  <td><?= $no; ?></td>
                  <td><?= $nama; ?></td>
                  <td><?= $username; ?></td>
                  <td><?= $password; ?></td>


                  <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $id; ?>">
                      Edit
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $id; ?>">
                      Delete
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
                              <input type="text" name="nama" readonly value="<?= $nama; ?>" class="form-control" required>
                              <br>
                              <input type="text" name="username" value="<?= $username; ?>" class="form-control" required>
                              <br>
                              <input type="text" name="password" value="<?= $password; ?>" class="form-control" required>
                              <br>


                              <input type="hidden" name="idp" value="<?= $id; ?>">
                              <button type="submit" class="btn btn-primary" name="edituser">Simpan</button>
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
                            <h4 class="modal-title">Hapus User</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <form method="post">
                            <div class="modal-body">
                              Apakah anda yakin ingin menghapus <?= $username; ?>?
                              <input type="hidden" name="idp" value="<?= $id; ?>">
                              <br>
                              <br>
                              <button type="submit" class="btn btn-danger" name="hapususer">Hapus</button>
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
        <h4 class="modal-title">Tambah Data User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form method="post">
        <div class="modal-body">
          <input type="text" name="nama" placeholder="Nama" class="form-control" required>
          <br>
          <input type="text" name="username" placeholder="Username" class="form-control" required>
          <br>
          <input type="password" name="password" placeholder="Password" class="form-control" required>

          <button type="submit" class="btn btn-primary" name="tambahuser">Simpan Data</button>
        </div>
      </form>



    </div>
  </div>
</div>