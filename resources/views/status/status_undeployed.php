<main>
    <div class="container-fluid">
        <h1 class="mt-4">Un-Deployed Assets</h1>

        <div class="card mb-4">
            <div class="card-header">
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_asset"><i class="fa fa-plus"></i>
                </button>
                <!-- <a href="export_pdf_asset.php">
                    <button type="button" class="btn btn-success btn-sm ml-2">Export</button>
                </a> -->

                <br><br>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table id="example1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>No Asset</td>
                                        <td>Asset Type</td>
                                        <td>No Serial</td>
                                        <td>Cap Date</td>
                                        <td>Description</td>
                                        <td>Status</td>
                                        <td>Checkin/Checkout</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;

                                    //mengambil data data asset
                                    $sql = mysqli_query($con, "SELECT * FROM data_asset where no_asset and EXISTS (SELECT * FROM data_chek_asset where sts_chek=2 and data_chek_asset.no_asset=data_asset.no_asset)ORDER BY cap_date DESC");
                                    // $sql = mysqli_query($con, "SELECT * FROM data_asset where sts_asset=2 ORDER BY cap_date DESC");

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
                                            <td style="text-align:center"><?= $no; ?></td>
                                            <td><?= $no_asset; ?></td>
                                            <td><?= $type; ?></td>
                                            <td><?= $no_serial; ?></td>
                                            <td><?= date('d M Y', strtotime($data['cap_date'])) ?></td>
                                            <td><?= $description; ?></td>
                                            <td><?= sts_check($sts); ?></td>
                                            <!-- <td><?= sts_check(no_asset_to_status_chek($no_asset)) ?></td> -->
                                            <td>
                                                <button type="button" class="dcd-badge dcd-badge-primary" style="color:grey" data-toggle="modal" data-target="#checkout<?= $no_asset; ?>"><i class="fa fa-shopping-cart"></i>
                                                    Check Out
                                                </button>

                                                <!-- Checkout The Modal -->
                                                <div class="modal fade" id="checkout<?= $no_asset; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Proses Checkout Asset</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <form method="post">
                                                                <div class="modal-body">
                                                                    <label>No. Asset</label>
                                                                    <input type="text" name="no_asset" value="<?= $no_asset; ?>" class="form-control" disabled>
                                                                    <br>
                                                                    <label>Type Asset</label>
                                                                    <input type="text" name="type" value="<?= $type; ?>" class="form-control" disabled>
                                                                    <br>
                                                                    <label>No. Serial</label>
                                                                    <input type="text" name="no_serial" value="<?= $no_serial; ?>" class="form-control" disabled>
                                                                    <br>
                                                                    <label>Asset Description</label>
                                                                    <input type="text" name="description" value="<?= $description; ?>" class="form-control" disabled>
                                                                    <br>
                                                                    <label>STATUS</label>
                                                                    <select class="form-control" name="sts">
                                                                        <option value='1'>Pending</option>
                                                                        <option value='2'>Un-Deployed</option>
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
                                                                                            <input type="text" value="<?= $description; ?>" class="form-control" disabled>
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
                                                                            <input type="hidden" name="idp" value="<?= $no_asset; ?>">
                                                                            <button type="submit" class="btn btn-primary" name="checkout">Checkout</button>
                                                                        </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <button type="button" class="dcd-badge dcd-badge-warning" data-toggle="modal" data-target="#edit<?= $no_asset; ?>"><i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" class="dcd-badge dcd-badge-danger" data-toggle="modal" data-target="#delete<?= $no_asset; ?>"><i class="fa fa-trash"></i>
                                                </button>

                                                <!-- edit The Modal -->
                                                <div class="modal fade" id="edit<?= $no_asset; ?>">
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
                                                                    <label>No. Asset</label>
                                                                    <input type="text" name="no_asset" placeholder="No Asset" value="<?= $no_asset; ?>" class="form-control" required>
                                                                    <br>
                                                                    <label>Type Asset</label>
                                                                    <input type="text" name="type" placeholder="Type Asset" value="<?= $type; ?>" class="form-control" required>
                                                                    <br>
                                                                    <label>No. Serial</label>
                                                                    <input type="text" name="no_serial" placeholder="No Serial" value="<?= $no_serial; ?>" class="form-control" required>
                                                                    <br>
                                                                    <label>Cap Date</label>
                                                                    <input type="date" name="date" value="<?= $date; ?>" class="form-control" required>
                                                                    <br>
                                                                    <label>Description</label>
                                                                    <input type="text" name="description" placeholder="Description" value="<?= $description; ?>" class="form-control" required>
                                                                    <br>

                                                                    <input type="hidden" name="idp" value="<?= $no_asset; ?>">
                                                                    <button type="submit" class="btn btn-primary" name="editasset">Simpan</button>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- delete The Modal -->
                                                <div class="modal fade" id="delete<?= $no_asset; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Hapus Asset</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <form method="post">
                                                                <div class="modal-body">
                                                                    Apakah anda yakin ingin menghapus nomor asset <?= $no_asset; ?>?
                                                                    <input type="hidden" name="idp" value="<?= $no_asset; ?>">
                                                                    <br>
                                                                    <br>
                                                                    <button type="submit" class="btn btn-danger" name="hapusasset">Hapus</button>
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
include "resources/views/asset/tambah_asset.php";
?>