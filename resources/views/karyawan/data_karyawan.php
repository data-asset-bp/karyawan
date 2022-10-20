<main>
	<div class="container-fluid">
		<h1 class="mt-4">Employee Data</h1>

		<div class="card mb-4">
			<div class="card-header">
				<!-- Button to Open the Modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_asset"><i class="fa fa-plus"></i>
				</button>
			</div>
			<div class="card-body">
				<div class="table table-responsive">
					<table align="center" width="90%" cellspacing="0" class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<td style="text-align:center">NO</td>
								<td>NRP</td>
								<td>NAMA KARYAWAN</td>
								<td>OFFICE</td>
								<td>DIVISI</td>
								<td>BRANCH AREA</td>
								<td>PERSONAL AREA</td>
								<td>POSITION</td>
								<td>ACTION</td>

							</tr>
						</thead>
						<tbody>
							<?php

							$no = 0;

							//mengambil data karyawan
							$sql = "SELECT * FROM data_karyawan";
							$hasil = mysqli_query($con, $sql);
							$jumlah = mysqli_num_rows($hasil);
							while ($data = mysqli_fetch_array($hasil)) {
								$no++;
								$idp = $data['id_karyawan'];

								$nrp = $data['Nrp'];
								$nama = $data['Nama_karyawan'];
								$ho = $data['HO'];
								$div = $data['New_Div'];
								$ba = $data['New_BA'];
								$pa = $data['New_PA'];

								$position = $data['Position'];

							?>
								<tr>
									<td style="text-align:center"><?= $no; ?></td>
									<td><?= $nrp; ?></td>
									<td><?= $nama; ?></td>
									<td><?= $ho; ?></td>
									<td><?= $div; ?></td>
									<td><?= $ba; ?></td>
									<td><?= $pa; ?></td>

									<td><?= $position; ?></td>

									<td>
										<button type="button" class="dcd-badge dcd-badge-warning" data-toggle="modal" data-target="#edit<?= $idp; ?>"><i class="fa fa-edit"></i>
										</button>
										<button type="button" class="dcd-badge dcd-badge-danger" data-toggle="modal" data-target="#delete<?= $idp; ?>"><i class="fa fa-trash"></i>
										</button>

										<!-- edit The Modal -->
										<div class="modal fade" id="edit<?= $idp; ?>">
											<div class="modal-dialog">
												<div class="modal-content">

													<!-- Modal Header -->
													<div class="modal-header">
														<h4 class="modal-title">Edit Employee Data </h4>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>

													<!-- Modal body -->
													<form method="post">
														<div class="modal-body">
															<label>NRP</label>
															<input type="text" name="nrp" value="<?= $nrp; ?>" class="form-control" required>
															<br>
															<label>Employee Name</label>
															<input type="text" name="nama" value="<?= $nama; ?>" class="form-control" required>
															<br>
															<label>BA</label>
															<input type="text" name="ba" value="<?= $ba; ?>" class="form-control" required>
															<br>
															<label>PA</label>
															<input type="text" name="pa" value="<?= $pa; ?>" class="form-control" required>
															<br>
															<label>Division</label>
															<input type="text" name="div" value="<?= $div; ?>" class="form-control" required>
															<br>
															<label>Position</label>
															<input type="text" name="pa" value="<?= $position; ?>" class="form-control" required>
															<br>
															<input type="hidden" name="idp" value="<?= $idp; ?>">
															<button type="submit" class="btn btn-primary" name="edit_karyawan">Submit</button>
														</div>
													</form>

												</div>
											</div>
										</div>

										<!-- delete The Modal -->
										<div class="modal fade" id="delete<?= $idp; ?>">
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
															Are you sure you want to delete? <?= $nama; ?>?
															<input type="hidden" name="idp" value="<?= $idp; ?>">
															<br>
															<br>
															<button type="submit" class="btn btn-danger" name="hapus_karyawan">Submit</button>
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
include "tambah_karyawan.php";
?>