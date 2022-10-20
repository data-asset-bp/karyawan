<main>
  <div class="container-fluid">
    <h1 class="mt-4">Proses Checkin</h1>

  </div>
  <!-- <div class="card-header">
    <a href="export_pdf_peminjaman.php">
      <button type="button" class="btn btn-success btn-sm ml-2">Export</button>
    </a>
  </div> -->
  <div class="card-body">
    <div class="table table-responsive">
      <table align="center" width="100%" cellspacing="0" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <td>NO</td>
            <td>NAMA PEMINJAM</td>
            <td>NO ASSET</td>
            <td>DESCRIPTION ASSET</td>
            <td>TGL CHECKOUT</td>
            <td>TGL CHECKIN</td>
            <td>NOTE CHECKOUT</td>
            <td>NOTE CHECKIN</td>
            <td>STATUS</td>
            <td>Action</td>

          </tr>
        </thead>
        <tbody>
          <?php

          $no = 0;
          $sql = mysqli_query($con, "SELECT * FROM data_chek_asset order by tgl_chekout ASC");

          while ($data = mysqli_fetch_array($sql)) {
            $no++;
            $id = $data['id_chek'];
            $nrp = $data['Nrp'];
            $no_asset = $data['no_asset'];
            $tgl_checkout = $data['tgl_chekout'];
            $tgl_checkin = $data['tgl_chekin'];
            $note_checkout = $data['note_checkout'];
            $note_checkin = $data['note_checkin'];
            $sts_chek = $data['sts_chek'];

          ?>
            <tr>
              <td style="text-align:center"><?= $no; ?></td>
              <td><?= nrptonama($nrp); ?></td>
              <td><?= $no_asset; ?></td>
              <td><?= noassettodesc($no_asset); ?></td>
              <td><?= date('d M Y', strtotime($data['tgl_chekout'])) ?></td>
              <td><?= date('d M Y', strtotime($data['tgl_chekin'])) ?></td>
              <td><?= $note_checkout; ?></td>
              <td><?= $note_checkin; ?></td>
              <td><?= sts_check($sts_chek); ?></td>
              <td>
                <a>
                  <button type="button" class="dcd-badge dcd-badge-primary" style="color:grey" data-toggle="modal" data-target="#checkin<?= $id; ?>"><i class="fa fa-shopping-cart"></i>
                    Chek In
                  </button>
                </a>
                <a href="./resources/views/export/export_pdf_peminjaman.php?id=<?= $id ?>">
                  <button type="button" class="dcd-badge btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                      <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                    </svg>
                  </button>
                </a>

                <!-- The Modal -->
                <div class="modal fade" id="checkin<?= $id; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Proses Checkin</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <form method="post">
                        <div class="modal-body">
                          <label>No. Asset</label>
                          <input type="text" name="no_asset" value="<?= $no_asset; ?>" class="form-control" disabled>
                          <br>
                          <label>Description</label>
                          <input type="text" name="description" value="<?= noassettodesc($no_asset); ?>" class="form-control" disabled>
                          <br>
                          <label>Status</label>
                          <select class="form-control" name="sts" required>
                            <option value='1'>Pending</option>
                            <option value='2'>Un-Deployed</option>
                            <option value='3'>Deployed</option>
                            <option value='4'>Archived</option>
                            <option value='5'>Deployable</option>
                          </select>
                          <br>
                          <label>Checkin Date</label>
                          <input type="date" name="tgl" class="form-control" required>
                          <br>
                          <label>Note</label>
                          <input type="text" name="note" placeholder="Note" class="form-control" required>
                          <br>
                          <input type="hidden" name="id" value="<?= $id; ?>">
                          <button type="submit" class="btn btn-primary btn-sm ml-2" name="checkin">Checkin</button>
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