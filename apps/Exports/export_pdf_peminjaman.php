<?php

require_once __DIR__ . '/vendor/autoload.php';

// TODO: Koneksi

$no = 1;
$conn = new mysqli('localhost', 'root', '', 'stocktaking');

if ($conn->connect_errno) die('Koneksi Gagal ' . $conn->connect_error);

// TODO: Koneksi

include 'func.php';

$check = $conn->query("SELECT * FROM data_chek_asset WHERE id_chek='" . $_GET['id'] . "'")->fetch_object();
$karyawan = $conn->query("SELECT * FROM data_karyawan WHERE Nrp='" . $check->Nrp . "'")->fetch_object();
$asset = $conn->query("SELECT * FROM data_asset WHERE no_asset='" . $check->no_asset . "'");
$admin = $conn->query("SELECT * FROM user WHERE nama=nama")->fetch_object();

$data = '';

if ($asset) {
    while ($obj = $asset->fetch_object()) {
        $data .= '
        
        <tr>
            <td style="text-align:center;padding-top:5px;padding-bottom:5px">' . $no++ . '</td>
            <td style="text-align:center;">' . $obj->no_asset . '</td>
            <td style="text-align:center;">' . $obj->asset_type . '</td>
            <td style="text-align:center;">' . $obj->no_serial . '</td>
            <td style="text-align:center;">' . $obj->asset_description . '</td>
        </tr>
        
        ';
    }
}

$mpdf = new \Mpdf\Mpdf();
$html =
    '
    <html><head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <br><br><br>
        <div class="col-sm-4 invoice-col">
            <h3 style="text-align:center;">Invoice Peminjaman Asset</h3>
        </div>
        <br>
        <div class="column invoice-info">
            <div class="col-sm-4 invoice-col">
                From:
                <address>
                    <strong>' . $admin->nama . '</strong>
                </address>
            </div>
            <div class="col-sm-4 invoice-col">
                To:
                <address>
                    <strong>' . $karyawan->Nama_karyawan . '</strong>
                </address>
            </div>
            <p style="text-align:justify ;" class="col-sm-4 invoice-col">
            Decision Tree Classifier merupakan metode pembelajaran yang digunakan untuk klasifikasi, metode ini bertujuan untuk membuat model yang memprediksi nilai variabel target dengan mempelajari aturan keputusan sederhana yang disimpulkan dari data.
            <br><br>
            Metode decision tree mengubah fakta yang sangat besar menjadi pohon keputusan yang mempresentasikan aturan. Aturan dapat dengan mudah dipahami dengan bahasa alami. Dan mereka juga dapat diekspresikan dalam bentuk basis data seperti Structure Query Language (SQL) untuk mencari record pada data tertentu. 
            <br><br>
            Sebuah decision tree adalah sebuah struktur yang dapat digunakan untuk membagi kumpulan data yang besar menjadi himpunan-himpunan record yang lebih kecil dengan menerapkan serangkaian aturan keputusan. 
            <br><br>
            Pada decision tree setiap simpul daun menandai label kelas. Simpul yang bukan simpul akhir terdiri dari akar dan simpul internal yang terdiri dari kondisi tes atribut pada sebagian record yang mempunyai karakteristik yang berbeda. Simpul akar dan simpul internal ditandai dengan bentuk oval dan simpul daun ditandai dengan bentuk segi empat (Muzakir & Wulandari, 2016).
            </p>
            <br>
            <table style="width:95%" align=center class="border table-bordered table-striped table-hover">
                <tr>
                    <th style="width:5%;text-align:center;padding-bottom:5px;padding-top:5px">No</th>
                    <th style="width:20%;text-align:center;">Asset Number</th>
                    <th style="width:15%;text-align:center;">Asset Type</th>
                    <th style="width:20%;text-align:center;">Serial Number</th>
                    <th style="width:35%;text-align:center;">Asset Description</th>
                </tr>        
        '

    . $data .

    '
            </table>
        <br>
        </div>

        <br>
        <div class="col-sm-4 invoice-col" style="">
            Jakarta, ' . date('d F Y') . '
            <br><br><br><br><br><br>
            <address>
                <strong>
                ' . $karyawan->Nama_karyawan . '
                </strong>
            </address>
        </div>
        ';


$html .= '</html></body>';

$mpdf = new \Mpdf\Mpdf(['format' => $size]);
$mpdf->AddPage($orientation);

$mpdf->WriteHTML($html);
$mpdf->Output("Cetak Surat Peminjaman Asset.pdf", 'I');
