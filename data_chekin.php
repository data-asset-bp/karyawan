<main>
  <div class="container-fluid">
    <h1 class="mt-4">Check In Data</h1>
  </div>
  <div class="card-body">
    <div class="table table-responsive">
      <table align="center" width="100%" cellspacing="0" class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <td>NO</td>
            <td>Employee Name</td>
            <td>Asset Number</td>
            <td>Asset Description</td>
            <td>Check Out Date</td>
            <td>Check In Date</td>
            <td>Check Out Notes</td>
            <td>Check In Notes</td>
            <td>Status</td>
            <td style="text-align:center">Action</td>

          </tr>
        </thead>
        <tbody>
          <?php

          $no = 0;
          $sql = mysqli_query($con, "SELECT * FROM data_chek_asset order by tgl_chekout ASC");
          while ($data = mysqli_fetch_array($sql)) {
            $no++;
            $id = $data['id_chek'];
            $Nrp = $data['Nrp'];
            $no_asset = $data['no_asset'];
            $tgl_checkout = $data['tgl_chekout'];
            $tgl_checkin = $data['tgl_chekin'];
            $note_checkout = $data['note_checkout'];
            $note_checkin = $data['note_checkin'];
            $sts_chek = $data['sts_chek'];
            sts_check($sts_chek);

          ?>
            <tr>
              <td><?= $no; ?></td>
              <td><?= nrptonama($Nrp); ?></td>
              <td><?= $no_asset; ?></td>
              <td><?= noassettodesc($no_asset); ?></td>
              <td><?= date('d M Y', strtotime($data['tgl_chekout'])) ?></td>
              <td><?= date('d M Y', strtotime($data['tgl_chekin'])) ?></td>
              <td><?= $note_checkout; ?></td>
              <td><?= $note_checkin; ?></td>
              <td><?= sts_check($sts_chek); ?></td>
              <td>
                <button type="button" class="btn btn-info btn-sm ml-2" data-toggle="modal" data-target="#details<?= $no_asset; ?>">
                  Details
                </button>
                <a>
                  <button type="button" class="btn btn-danger btn-sm ml-2" data-toggle="modal" data-target="#checkin<?= $id; ?>">
                    Chek In
                  </button>
                </a>
                <a href="export_pdf.php">
                  <button type="button" class="btn btn-success btn-sm ml-2" name="print">
                    Print
                  </button>
                </a>

                <!-- The Modal -->
                <div class="modal fade" id="checkin<?= $id; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Check In Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <form method="post">
                        <div class="modal-body">
                          <label>Asset Number</label>
                          <input type="text" name="no_asset" value="<?= $no_asset; ?>" class="form-control" disabled>
                          <br>
                          <label>Description</label>
                          <input type="text" name="description" value="<?= noassettodesc($no_asset); ?>" class="form-control" disabled>
                          <br>
                          <label>Status</label>
                          <select class="form-control" name="sts">
                            <option value='1'>Pending</option>
                            <option value='2'>UnDiployable</option>
                            <option value='3'>Deployed</option>
                            <option value='4'>Archived</option>
                            <option value='5'>Deployable</option>
                          </select>
                          <br>
                          <label>Check In Date</label>
                          <input type="date" name="tgl" class="form-control" required>
                          <br>
                          <label>Note</label>
                          <input type="text" name="note" class="form-control" required>
                          <br>
                          <input type="hidden" name="id" value="<?= $id; ?>">
                          <button type="submit" class="btn btn-primary btn-sm ml-2" name="checkin">Check In</button>
                        </div>
                      </form>



                    </div>
                  </div>
                </div>

                <!-- details -->
                <div class="modal fade" id="details<?= $no_asset; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <form method="post">
                        <div class="modal-body">
                          <label>Employee Name</label>
                          <input type="" name="nama" value="<?= nrptonama($Nrp); ?>" class="form-control" disabled>
                          <br>
                          <label>Asset Number</label>
                          <input type="" name="type" value="<?= $no_asset; ?>" class="form-control" disabled>
                          <br>
                          <label>Asset Description</label>
                          <input type="" name="no_asset" value="<?= noassettodesc($no_asset); ?>" class="form-control" disabled>
                          <br>
                          <label>Check Out Date</label>
                          <input type="" name="date_checkout" value="<?= date('d M Y', strtotime($data['tgl_chekout'])) ?>" class="form-control" disabled>
                          <br>
                          <label>Check In Date</label>
                          <input type="" name="date_checkin" value="<?= date('d M Y', strtotime($data['tgl_chekin'])) ?>" class="form-control" disabled>
                          <br>
                          <label>Check Out Notes</label>
                          <input type="" name="note_checkout" value="<?= $note_checkout; ?>" class="form-control" disabled>
                          <br>
                          <label>Check In Notes</label>
                          <input type="" name="note_checkin" value="<?= $note_checkin; ?>" class="form-control" disabled>
                          <br>
                          <label>Status</label>
                          <input type="" name="sts" value="<?= sts_check($sts_chek); ?>" class="form-control" disabled>
                          <br>
                          <input type="hidden" name="idp" value="<?= $no_asset; ?>">
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