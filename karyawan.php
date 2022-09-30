<main>
	<div class="container-fluid">
		<h1 class="mt-4" style="text-align: center;">Data Karyawan</h1>

		<div class="card mb-4">
			<div class="card-header">
				<!-- Button to Open the Modal -->
				<button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#myModal">
					Tambah Data Karyawan
				</button>

				<br><br>

			</div>
			<div class="card-body">
				<div class="table table-responsive">
					<table align="center" width="100%" cellspacing="0" class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<td>NO</td>
								<td>NRP</td>
								<td>NAMA KARYAWAN</td>
								<td>DIV</td>
								<td>BA</td>
								<td>PA</td>
								<td>HO/CAB</td>
								<td>POSITION</td>
								<td>LAINNYA</td>

							</tr>
						</thead>
						<tbody>
							<?php

							$no = 0;

							//mengambil data pegawai
							$sql = "SELECT * FROM data_karyawan";
							$hasil = mysqli_query($con, $sql);
							$jumlah = mysqli_num_rows($hasil);
							while ($data = mysqli_fetch_array($hasil)) {
								$no++;
								$idp = $data['id_karyawan'];

								$nrp = $data['Nrp'];
								$nama = $data['Nama_karyawan'];
								$div = $data['New_Div'];
								$ba = $data['New_BA'];
								$pa = $data['New_PA'];
								$ho = $data['HO'];
								$position = $data['Position'];

							?>
								<tr>
									<td><?= $no; ?></td>
									<td><?= $nrp; ?></td>
									<td><?= $nama; ?></td>
									<td><?= $div; ?></td>
									<td><?= $ba; ?></td>
									<td><?= $pa; ?></td>
									<td><?= $ho; ?></td>
									<td><?= $position; ?></td>

									<td>
										<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $idp; ?>">
											Edit
										</button>
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $idp; ?>">
											Delete
										</button>

										<!-- edit The Modal -->
										<div class="modal fade" id="edit<?= $idp; ?>">
											<div class="modal-dialog">
												<div class="modal-content">

													<!-- Modal Header -->
													<div class="modal-header">
														<h4 class="modal-title">Edit Data Karyawan</h4>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>

													<!-- Modal body -->
													<form method="post">
														<div class="modal-body">
															<input type="text" name="nrp" value="<?= $nrp; ?>" class="form-control" required>
															<br>
															<input type="text" name="nama" value="<?= $nama; ?>" class="form-control" required>
															<br>
															<input type="text" name="div" value="<?= $div; ?>" class="form-control" required>
															<br>
															<input type="text" name="ba" value="<?= $ba; ?>" class="form-control" required>
															<br>

															<input type="text" name="pa" value="<?= $pa; ?>" class="form-control" required>
															<br>

															<input type="hidden" name="idp" value="<?= $idp; ?>">
															<button type="submit" class="btn btn-primary" name="editpegawai">Submit</button>
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
														<h4 class="modal-title">Hapus User</h4>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>

													<!-- Modal body -->
													<form method="post">
														<div class="modal-body">
															Apakah anda yakin ingin menghapus <?= $nama; ?>?
															<input type="hidden" name="idp" value="<?= $idp; ?>">
															<br>
															<br>
															<button type="submit" class="btn btn-danger" name="hapuspegawai">Submit</button>
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
				<h4 class="modal-title">Tambah Karyawan</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<form method="post">
				<div class="modal-body">
					<input type="text" name="nrp" placeholder="Nrp" class="form-control" required>
					<br>
					<input type="text" name="nama" placeholder="Nama Pegawai" class="form-control" required>
					<br>
					<label>Divisi</label>
					<select name="div" class="form-control" required>
						<option value="">--Pilihan--</option>
						<option value="BOD">BOD</option>
						<option value="Corporate Function">Corporate Function</option>
						<option value="Finance, Accounting & Procurement">Finance, Accounting & Procurement</option>
						<option value="Marketing & Material Management">Marketing & Material Management</option>
						<option value="People & Infrastructure">People & Infrastructure</option>
						<option value="Product Support & Engineering">Product Support & Engineering</option>
						<option value="Sales & Branch Operation">Sales & Branch Operation</option>
						<option value="Branch Operations">Branch Operations</option>
					</select>
					<label>BA</label>

					<select name="ba" class="form-control" required>
						<option value="">--Pilihan--</option>
						<option value=" BJM">1. BJM</option>
						<option value="BLP">2. BLP</option>
						<option value=" FRP">3. FRP</option>
						<option value=" HO">4. HO</option>
						<option value=" JKT">5. JKT</option>
						<option value=" PKB">6. PKB</option>
						<option value=" PLB">7. PLB</option>
						<option value=" SBY">8. SBY</option>
						<option value=" SDP">9. SDP</option>
						<option value=" SMD">10. SMD</option>
						<option value=" TBT">11. TBT</option>
					</select>
					<br>

					<label>PA</label>
					<select name="pa" class="form-control" required>
						<option value="">--Pilihan--</option>
						<option value="Bekasi">1. Bekasi</option>
						<option value="BJM">2. BJM</option>
						<option value="Adaro">a. Adaro</option>
						<option value="Banjarmasin">b. Banjarmasin</option>
						<option value="Batukajang">c. Batukajang</option>
						<option value="Kuala Kurun">d. Kuala Kurun</option>
						<option value="Muara Teweh">e. Muara Teweh</option>
						<option value="Pangkalan Bun">f. Pangkalan Bun</option>
						<option value="Pontianak">g. Pontianak</option>
						<option value="Sampit">h. Sampit</option>
						<option value="BLP">3. BLP</option>
						<option value="Balikpapan">a. Balikpapan</option>
						<option value="Tanjung Redep">b. Tanjung Redep</option>
						<option value="Tarakan">c. Tarakan</option>
						<option value="BPE">4. BPE</option>
						<option value="Cabang SBY">5. Cabang SBY</option>
						<option value="FRP">6. FRP</option>
						<option value="Freeport">a. Freeport</option>
						<option value="Jayapura">b. Jayapura</option>
						<option value="Merauke">c. Merauke</option>
						<option value="Timika">d. Timika</option>
						<option value="Head Office">7. Head Office</option>
						<option value="JKT">8. JKT</option>
						<option value="Bandung">a. Bandung</option>
						<option value="Cirebon">b. Cirebon</option>
						<option value="Jakarta">c. Jakarta</option>
						<option value="Semarang">d. Semarang</option>
						<option value="PKB">9. PKB</option>
						<option value="Bandar Lampung">a. Bandar Lampung</option>
						<option value="Jambi">b. Jambi</option>
						<option value="Palembang">c. Palembang</option>
						<option value="Pekanbaru">d. Pekanbaru</option>
						<option value="Tanjung Enim">e. Tanjung Enim</option>
						<option value="SBY">10. SBY</option>
						<option value="NTB">a. NTB</option>
						<option value="Sanggeng">b. Sanggeng</option>
						<option value="Sorong">c. Sorong</option>
						<option value="Surabaya">d. Surabaya</option>
						<option value="SDP">11. SDP</option>
						<option value="Makasar">a. Makasar</option>
						<option value="Palu">b. Palu</option>
						<option value="Sidrap">c. Sidrap</option>
						<option value="SMD">12. SMD</option>
						<option value="Bontang">a. Bontang</option>
						<option value="Muara Lawa">b. Muara Lawa</option>
						<option value="Samarinda">c. Samarinda</option>
						<option value="Sangatta">d. Sangatta</option>
						<option value="TBT">13. TBT</option>
						<option value="Medan">a. Medan</option>
						<option value="Tebing Tinggi">b. Tebing Tinggi</option>
					</select>
					<br>

					<label>HO/CABANG</label>
					<select name="ho" class="form-control" required>
						<option value="">--Pilihan--</option>
						<option value="HO">1. HO</option>
						<option value="Cabang">2. Cabang</option>
					</select>

					<br>
					<input type="text" name="position" placeholder="Position" class="form-control" required>
					<br>
					<button type="submit" class="btn btn-primary" name="tambahpegawai">Submit</button>
				</div>
			</form>



		</div>
	</div>
</div>