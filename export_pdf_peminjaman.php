<?php

require_once __DIR__ . '/vendor/autoload.php';

include 'koneksi.php';
$data = mysqli_query($con, "SELECT * FROM data_asset, cata_chek_asset ORDER BY cap_date DESC");
$no = 1;
$mpdf = new \Mpdf\Mpdf();
$html = '<html><head>
<meta charset="UTF-8">
<link rel="stylesheet" href="">
</head>
<body>
    <div>
        <h3 style="text-align:center">Peminjaman Asset</h3>
    </div>
    <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            From:
            <address>
                <strong>' . $data['no_asset'] . '</strong>
            </address>
            <br>
        </div>
        <div class="col-sm-4 invoice-col">
            To:
            <address>
                <strong>Randi Julian Saputra</strong>
            </address>
        </div>
        <p style="text-align:justify ;">Decision Tree Classifier merupakan metode pembelajaran yang digunakan untuk klasifikasi, metode ini bertujuan untuk membuat model yang memprediksi nilai variabel target dengan mempelajari aturan keputusan sederhana yang disimpulkan dari data. <br>
        Metode decision tree mengubah fakta yang sangat besar menjadi pohon keputusan yang mempresentasikan aturan. Aturan dapat dengan mudah dipahami dengan bahasa alami. Dan mereka juga dapat diekspresikan dalam bentuk basis data seperti Structure Query Language (SQL) untuk mencari record pada data tertentu. <br><br>

        NRP:' . $data['no_asset'] . ' <br>
        Nama: <br><br>
        

        Sebuah decision tree adalah sebuah struktur yang dapat digunakan untuk membagi kumpulan data yang besar menjadi himpunan-himpunan record yang lebih kecil dengan menerapkan serangkaian aturan keputusan. <br>
        Pada decision tree setiap simpul daun menandai label kelas. Simpul yang bukan simpul akhir terdiri dari akar dan simpul internal yang terdiri dari kondisi tes atribut pada sebagian record yang mempunyai karakteristik yang berbeda. Simpul akar dan simpul internal ditandai dengan bentuk oval dan simpul daun ditandai dengan bentuk segi empat (Muzakir & Wulandari, 2016).
        </p>
        <br>
        <table align="center" width="100%" cellspacing="0" class="table table-bordered table-striped table-hover" border="1" >
                <tr>
                    <th>No</th>
                    <th>Asset Number</th>
                    <th>Asset Type</th>
                    <th>Serial Number</th>
                    <th>Asset Description</th>
                    <th>Date</th>
                </tr>
                <tr>
                    <td style="text-align:center;">' . $no++ . '</td>
                    <td>' . $data['no_asset'] . '</td>
                </tr>
        </table>
        <br>
    </div>
    <div class="col-sm-4 invoice-col" style="text-align:right">
        Jakarta, ' . $data['cap_date'] . '
        <br><br><br><br><br><br>
        <address>
            <strong>Randi Julian Saputra</strong>
        </address>
    </div>';
// $no = 1;
// foreach ($data as $d) {
//     $html .=
//         '<tr>
//             <td>' . $no++ . '</td>
//             <td>' . $d['no_asset'] . '</td>
//             <td>' . $d['asset_type'] . '</td>
//             <td>' . $d['no_serial'] . '</td>
//             <td>' . $d['asset_description'] . '</td>
//             <td>' . date('d M Y', strtotime($d['cap_date'])) . '</td>
//         </tr>';
// }

$html .= '</html></body>';

$mpdf = new \Mpdf\Mpdf(['format' => $size]);
$mpdf->AddPage($orientation);

$mpdf->WriteHTML($html);
$mpdf->Output("Cetak Data Asset.pdf", 'I');
