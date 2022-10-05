<?php

require_once __DIR__ . '/vendor/autoload.php'; //memanggil library mpdf

include 'koneksi.php';
$data = mysqli_query($con, "SELECT * FROM data_asset");

$mpdf = new \Mpdf\Mpdf();
$html = '<html>
        <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/print.css">
        </head>
        <body>
            <h1>Daftar Menu</h1>
            <table border="1">
                <tr>
                    <th>NO</th>
                    <th>Tittle</th>
                    <th>URL</th>
                    <th>Icon</th>   
                </tr>';
$no = 1;
foreach ($data as $d) {
    $html .= '<tr>
    <td>' . $no++ . '</td>
    <td>' . $Nrp['Nrp'] . '</td>
    <td>' . $no_asset['no_asset'] . '</td>
    <td>' . $sts_chek . ['sts_chek'] . '</td>
    </tr>';
}

$html .= '</table></body>
            </html>';

//$html yaitu script tampilan yang akan dicetak

$size = $_POST['ukuran'];
$orientation = $_POST['rotasi'];

$mpdf = new \Mpdf\mpdf(['format' => $size]);
$mpdf->AddPage($orientation);

$mpdf->WriteHTML($html);
$mpdf->Output('Cetak.pdf', 1); //mengatur nama file yang akan didownload
