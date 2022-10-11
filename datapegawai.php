<main>
	<div class="container-fluid">
		<h1 class="mt-4">Employee Data</h1>

		<div class="card mb-4">
			<div class="card-header">
				<!-- Button to Open the Modal -->
				<button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#myModal">
					ADD
				</button>

				<br><br>

			</div>
			<div class="card-body">
				<div class="table table-responsive">
					<table align="center" width="90%" cellspacing="0" class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<td>NO</td>
								<td>NRP</td>
								<td>NAMA KARYAWAN</td>
								<td>OFFICE</td>
								<td>DIVISI</td>
								<td>BRANCH AREA</td>
								<td>PERSONAL AREA</td>

								<td>POSITION</td>
								<td>AKSI</td>

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
								$ho = $data['HO'];
								$div = $data['New_Div'];
								$ba = $data['New_BA'];
								$pa = $data['New_PA'];

								$position = $data['Position'];

							?>
								<tr>
									<td><?= $no; ?></td>
									<td><?= $nrp; ?></td>
									<td><?= $nama; ?></td>
									<td><?= $ho; ?></td>
									<td><?= $div; ?></td>
									<td><?= $ba; ?></td>
									<td><?= $pa; ?></td>

									<td><?= $position; ?></td>

									<td>
										<button type="button" class="btn btn-warning btn-sm ml-2" data-toggle="modal" data-target="#edit<?= $idp; ?>">
											Edit
										</button>
										<button type="button" class="btn btn-danger btn-sm ml-2" data-toggle="modal" data-target="#delete<?= $idp; ?>">
											Delete
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
				<h4 class="modal-title">Add Employee Data</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<script src="jquery-1-10-1.min.js"></script>
			<form method="post">
				<div class="modal-body">
					<label>NRP</label>
					<input type="text" name="nrp" placeholder="NRP" class="form-control" required>
					<br>
					<label>Nama Karyawan</label>
					<input type="text" name="nama" placeholder="Nama Karyawan" class="form-control" required>
					<br>
					<label>Office</label>
					<select id="office" name="ho" class="form-control" required>
						<option value="" selected disabled>Pilih Office</option>
						<option value="ho">HO</option>
						<option value="cabang">Cabang</option>
					</select>
					<br>
					<label>Divisi</label>
					<select id="divisi" name="div" class="form-control" required>
						<option value="">Pilih Divisi</option>
					</select>
					<br>
					<label>Branch Area</label>
					<select id="branch" name="ba" class="form-control" required>
						<option value="">Pilih Branch Area</option>
					</select>
					<br>
					<label>Personal Area</label>
					<select id="personal" name="pa" class="form-control" required>
						<option value="">Pilih Personal Area</option>
					</select>
					<br>
					<label>Position</label>
					<input type="text" name="position" placeholder="Position" class="form-control" required>
					<br>
					<button type="submit" class="btn btn-primary" name="tambahpegawai">Submit</button>
				</div>
			</form>
			<script>
				$(function() { // sama dengan $(document).ready(function(){
					const divisiHo = [
						"BOD",
						"CORPORATE FUNCTION",
						"MARKETING & MATERIAL MANAGEMENT",
						"PEOPLE & INFRASTRUCTURE",
						"PRODUCT SUPPORT & ENGINEERING",
						"SALES & BRANCH OPERATION",
						"FINANCE, ACCOUNTING & PROCUREMENT"

					]

					const divisiCabang = ["BRANCH OPERATIONS"]

					const baHo = ["HO"]
					const baCabang = [
						"BJM",
						"BLP",
						"FRP",
						"JKT",
						"PKB",
						"SBY",
						"SDP",
						"SMD",
						"TBT",
					]

					$('#office').change(function(e) {
						const office = e.target.value

						const divisi = $('#divisi')
						const branchArea = $('#branch')
						const personalArea = $('#personal')

						divisi.empty()
						divisi.append('<option value="" selected disabled>Pilih Divisi</option>')

						branchArea.empty()
						branchArea.append('<option value="" selected disabled>Pilih Branch Area</option>')

						personalArea.empty()
						personalArea.append('<option value="" selected disabled>Pilih Personal Area</option>')

						if (office === 'ho') {
							divisiHo.forEach(divisiOption => {
								divisi.append(`<option value="${divisiOption}">${divisiOption}</option>`)
							})
						} else if (office === 'cabang') {
							divisiCabang.forEach(divisiOption => {
								divisi.append(`<option value="${divisiOption}">${divisiOption}</option>`)
							})
						}

						if (office === 'ho') {
							baHo.forEach(area => {
								branchArea.append(`<option value="${area}">${area}</option>`)
							})
						} else if (office === 'cabang') {
							baCabang.forEach(area => {
								branchArea.append(`<option value="${area}">${area}</option>`)
							})
						}
					});

					const paHo = ["HEAD OFFICE"]
					const paBjm = [
						"ADARO",
						"BANJARMASIN",
						"MUARA TEWEH",
						"PANGKALAN BUN",
						"PONTIANAK",
						"SAMPIT",
					]
					const paBlp = [
						"BALIKPAPAN",
						"BATUKAJANG",
						"TANJUNG REDEP",
						"TARAKAN",
					]
					const paFrp = [
						"FREEPORT",
						"JAYAPURA",
						"MERAUKE",
						"TIMIKA",
					]
					const paJkt = [
						"BANDUNG",
						"JAKARTA",
						"SEMARANG",
					]
					const paPkb = [
						"BANDAR LAMPUNG",
						"JAMBI",
						"PALEMBANG",
						"PEKANBARU",
						"TANJUNG ENIM",
					]
					const paSby = [
						"NTB",
						"SORONG",
						"SURABAYA",

					]
					const paSdp = [
						"GORONTALO",
						"MAKASSAR",
						"PALU",
						"SIDRAP",
						"TAHUNA",
					]
					const paSmd = [
						"BONTANG",
						"MUARA LAWA",
						"SAMARINDA",
						"SANGATTA",
					]
					const paTbt = [
						"MEDAN",
						"TEBING TINGGI",
					]
					$('#branch').change(function(e) {
						const branch = e.target.value

						const personalArea = $('#personal')

						personalArea.empty()
						personalArea.append('<option value="">Pilih Personal Area</option>')

						if (branch === 'HO') {
							paHo.forEach(personal => {
								personalArea.append(`<option value="${personal}">${personal}</option>`)
							})
						} else if (branch === 'BJM') {
							paBjm.forEach(personal => {
								personalArea.append(`<option value="${personal}">${personal}</option>`)
							})
						} else if (branch === 'BLP') {
							paBlp.forEach(personal => {
								personalArea.append(`<option value="${personal}">${personal}</option>`)
							})
						} else if (branch === 'FRP') {
							paFrp.forEach(personal => {
								personalArea.append(`<option value="${personal}">${personal}</option>`)
							})
						} else if (branch === 'JKT') {
							paJkt.forEach(personal => {
								personalArea.append(`<option value="${personal}">${personal}</option>`)
							})
						} else if (branch === 'PKB') {
							paPkb.forEach(personal => {
								personalArea.append(`<option value="${personal}">${personal}</option>`)
							})
						} else if (branch === 'SBY') {
							paSby.forEach(personal => {
								personalArea.append(`<option value="${personal}">${personal}</option>`)
							})
						} else if (branch === 'SDP') {
							paSdp.forEach(personal => {
								personalArea.append(`<option value="${personal}">${personal}</option>`)
							})
						} else if (branch === 'SMD') {
							paSmd.forEach(personal => {
								personalArea.append(`<option value="${personal}">${personal}</option>`)
							})
						} else if (branch === 'TBT') {
							paTbt.forEach(personal => {
								personalArea.append(`<option value="${personal}">${personal}</option>`)
							})
						}
					})
				});
			</script>
		</div>
	</div>
</div>