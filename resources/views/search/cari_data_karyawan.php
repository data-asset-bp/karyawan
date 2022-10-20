<main>
	<div class="container-fluid">
		<h1 class="mt-4">Employee Data Search</h1>

		<div class="card mb-4">
			<div class="card-header">
				<!-- Button to Open the Modal -->
				<form method="post">
					<label>Select Type Search</label>
					<select class="form-control" name="pil">
						<option selected disabled>--Select Type Search--</option>
						<option value='1'>NRP</option>
						<option value='2'>Employee Name</option>
						<option value='3'>Division</option>
						<option value='4'>BA</option>
						<option value='5'>Personal Area</option>
						<option value='6'>HO/CAB</option>
						<option value='7'>Position</option>
						<option value='8'>Asset Number</option>
						<option value='9'>Asset Type</option>
						<option value='10'>Serial Number</option>
						<option value='11'>Date</option>
						<option value='12'>Asset Description</option>
					</select>
					<br>
					<label>Select Type Search</label>
					<input type="text" placeholder="Search" name="carinama" class="form-control"><br>
					<input type="submit" class="btn btn-warning btn-sm ml-2" value="Cari" name="cari">
				</form>

			</div>
			<div class="card-body">
				<div class="table table-responsive">
					<table align="center" width="100%" cellspacing="0" class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<td style="text-align:center">NO</td>
								<td>NRP</td>
								<td>Employee Name</td>
								<td>Divison</td>
								<td>BA</td>
								<td>Personal Area</td>
								<td>HO/CAB</td>
								<td>Position</td>
								<td>Asset Number</td>
								<td>Type Asset</td>
								<td>Serial Number</td>
								<td>Date</td>
								<td>Asset Description</td>
								<td>Status</td>

							</tr>
						</thead>
						<tbody>
							<?php

							$namacari = $_POST['carinama'];
							$pil = $_POST['pil'];

							$no = 0;

							//mengambil data karyawan
							if ($pil == 1) {
								$sql = mysqli_query($con, "SELECT * FROM data_karyawan where Nrp like '%$namacari%' ");
							} elseif ($pil == 2) {
								$sql = mysqli_query($con, "SELECT * FROM data_karyawan where Nama_karyawan like '%$namacari%' ");
							} elseif ($pil == 3) {
								$sql = mysqli_query($con, "SELECT * FROM data_karyawan where New_Div like '%$namacari%' ");
							} elseif ($pil == 4) {
								$sql = mysqli_query($con, "SELECT * FROM data_karyawan where New_BA like '%$namacari%' ");
							} elseif ($pil == 5) {
								$sql = mysqli_query($con, "SELECT * FROM data_karyawan where New_PA like '%$namacari%' ");
							} elseif ($pil == 6) {
								$sql = mysqli_query($con, "SELECT * FROM data_karyawan where HO like '%$namacari%' ");
							} elseif ($pil == 7) {
								$sql = mysqli_query($con, "SELECT * FROM data_karyawan where Position like '%$namacari%' ");
							} elseif ($pil == 8) {

								$sql1 = mysqli_query($con, "SELECT Nrp FROM data_chek_asset where no_asset='$namacari'");
								$data1 = mysqli_fetch_array($sql1);
								$id1 = $data1['Nrp'];
								$sql = mysqli_query($con, "SELECT * FROM data_karyawan where Nrp='$id1' ");
							} elseif ($pil == 9) {
								//carai no asset
								$sqlasset = mysqli_query($con, "SELECT no_asset FROM data_asset where asset_type='$namacari'");
								$data1 = mysqli_fetch_array($sqlasset);
								$id1 = noassettonrp($data1['no_asset']);

								$sql = mysqli_query($con, "SELECT * FROM data_karyawan where Nrp='$id1' ");
							} elseif ($pil == 10) {
								//carai no asset
								$sqlasset = mysqli_query($con, "SELECT no_asset FROM data_asset where no_serial='$namacari' ");
								$data1 = mysqli_fetch_array($sqlasset);
								$id1 = noassettonrp($data1['no_asset']);
								echo "Serial $id1";

								$sql = mysqli_query($con, "SELECT * FROM data_karyawan where Nrp='$id1' ");
							} elseif ($pil == 11) {
								//carai no asset
								$sqlasset = mysqli_query($con, "SELECT no_asset FROM data_asset where cap_date='$namacari' ");
								$data1 = mysqli_fetch_array($sqlasset);
								$id1 = noassettonrp($data1['no_asset']);

								$sql = mysqli_query($con, "SELECT * FROM data_karyawan where Nrp='$id1' ");
							} elseif ($pil == 12) {
								//carai no asset
								$sqlasset = mysqli_query($con, "SELECT no_asset FROM data_asset where asset_description='$namacari' ");
								$data1 = mysqli_fetch_array($sqlasset);
								$id1 = noassettonrp($data1['no_asset']);

								$sql = mysqli_query($con, "SELECT * FROM data_karyawan where Nrp='$id1' ");
							} else {
								$sql = "SELECT * FROM data_karyawan";
							}

							while ($data = mysqli_fetch_array($sql)) {
								$no++;
								$idp = $data['id_karyawan'];

								$nrp = $data['Nrp'];
								$nama = $data['Nama_karyawan'];
								$div = $data['New_Div'];
								$ba = $data['New_BA'];
								$pa = $data['New_PA'];
								$ho = $data['HO'];
								$pos = $data['Position'];


								//cari no asset dari chekout
								$sql_co = mysqli_query($con, "SELECT no_asset,sts_chek FROM data_chek_asset where Nrp='$nrp'");

								$data_co = mysqli_fetch_array($sql_co);
								$no_aset_co = $data_co['no_asset'];
								$sts_co = $data_co['sts_chek'];

								$sql_as = mysqli_query($con, "SELECT * FROM data_asset where no_asset='$no_aset_co'");
								$data_as = mysqli_fetch_array($sql_as);
								$asset_type = $data_as['asset_type'];
								$no_serial = $data_as['no_serial'];
								$cap_date = $data_as['cap_date'];
								$asset_description = $data_as['asset_description'];
							?>
								<tr>
									<td style="text-align:center"><?= $no; ?></td>
									<td><?= $nrp; ?></td>
									<td><?= $nama; ?></td>
									<td><?= $div; ?></td>
									<td><?= $ba; ?></td>
									<td><?= $pa; ?></td>
									<td><?= $ho; ?></td>
									<td><?= $pos; ?></td>
									<td><?= $no_aset_co; ?></td>
									<td><?= $asset_type; ?></td>
									<td><?= $no_serial; ?></td>
									<td><?= $cap_date; ?></td>
									<!-- <td><?= date('d M Y', strtotime($data_as['cap_date'])) ?></td> -->
									<td><?= $asset_description; ?></td>
									<td><?= sts_check($sts_co); ?></td>

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