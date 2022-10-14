<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<body style="padding: 0 20; width:100%">
    <div>
        <?php
        include "/koneksi.php";
        $select = mysqli_query($con, 'SELECT * FROM data_chek_asset, data_asset, data_karyawan, user');
        $data = mysqli_fetch_array($select);
        $no = 1;
        // data_asset
        $no_asset = $data['no_asset'];
        $asset_type = $data['asset_type'];
        $no_serial = $data['no_serial'];
        $cap_date = $data['cap_date'];
        $description = $data['asset_description'];

        // data_karyawan
        $nrp = $data['Nrp'];
        $nama_karyawan = $data['Nama_karyawan'];

        // data_chek_asset
        $id = $data['id_chek'];
        $tgl_checkout = $data['tgl_chekout'];
        $tgl_checkin = $data['tgl_chekin'];
        $note_checkout = $data['note_checkout'];
        $note_checkin = $data['note_checkin'];
        $sts_chek = $data['sts_chek'];

        // user
        $nama_admin = $data['nama'];

        ?>
        <div>
            <h3 style="text-align:center">Peminjaman Asset</h3>
        </div>
        <div class="row invoice-info" id="print<?= $id; ?>">
            <div class="col-sm-4 invoice-col">
                From:
                <address>
                    <strong><?= $nama_admin ?></strong>
                </address>
            </div>
            <div class="col-sm-4 invoice-col">
                To:
                <address>
                    <label><?= $nama_karyawan; ?></label>
                </address>
            </div>
            <div class="col-sm-4 invoice-col">
                <p style="text-align:justify ;">
                    Decision Tree Classifier merupakan metode pembelajaran yang digunakan untuk klasifikasi, metode ini bertujuan untuk membuat model yang memprediksi nilai variabel target dengan mempelajari aturan keputusan sederhana yang disimpulkan dari data. <br>
                    Metode decision tree mengubah fakta yang sangat besar menjadi pohon keputusan yang mempresentasikan aturan. Aturan dapat dengan mudah dipahami dengan bahasa alami. Dan mereka juga dapat diekspresikan dalam bentuk basis data seperti Structure Query Language (SQL) untuk mencari record pada data tertentu. <br>
                    Sebuah decision tree adalah sebuah struktur yang dapat digunakan untuk membagi kumpulan data yang besar menjadi himpunan-himpunan record yang lebih kecil dengan menerapkan serangkaian aturan keputusan. <br>
                    Pada decision tree setiap simpul daun menandai label kelas. Simpul yang bukan simpul akhir terdiri dari akar dan simpul internal yang terdiri dari kondisi tes atribut pada sebagian record yang mempunyai karakteristik yang berbeda. Simpul akar dan simpul internal ditandai dengan bentuk oval dan simpul daun ditandai dengan bentuk segi empat (Muzakir & Wulandari, 2016).
                </p>
            </div>
            <br>
            <table align="center" width="100%" cellspacing="0" class="table table-bordered table-striped table-hover" border="1">
                <tr>
                    <th style="text-align:center;">No</th>
                    <th>Asset Number</th>
                    <th>Asset Type</th>
                    <th>Serial Number</th>
                    <th>Asset Description</th>
                    <th style="text-align:center;">Date</th>
                </tr>
                <tr>
                    <td style="text-align:center;"><?= $no++ ?></td>
                    <td><?= $no_asset; ?></td>
                    <td><?= $asset_type; ?></td>
                    <td><?= $no_serial; ?></td>
                    <td><?= $description; ?></td>
                    <td style="text-align:center;"><?= date('d M Y', strtotime($cap_date)) ?></td>
                </tr>
            </table>
            <br>
            <div class="col-sm-4 invoice-col" style="text-align:right">
                Jakarta, <?= date('d M Y') ?>
                <br><br><br>
                <address>
                    <br><br><br>
                    <strong><?= $nama_karyawan ?></strong>
                </address>
            </div>
        </div>
</body>
<script>
    window.print()
</script>