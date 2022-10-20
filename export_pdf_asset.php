<?php

require_once __DIR__ . '/vendor/autoload.php';

include 'koneksi.php';
$data = mysqli_query($con, "SELECT * FROM data_asset ORDER BY cap_date DESC");

$mpdf = new \Mpdf\Mpdf();
$html = '<html><head>
<meta charset="UTF-8">
<link rel="stylesheet" href="">
</head>
<body>
    <div>
        <h3 style="text-align:center">Data Asset</h3>
    </div>
    <table align="center" width="100%" cellspacing="0" class="table table-bordered" border="1">
        <tr>
            <th>No</th> 
            <th>Asset Number</th>
            <th>Asset Type</th>
            <th>Serial Number</th>
            <th>Asset Description</th>
            <th>Date</th>
        </tr>';
$no = 1;
foreach ($data as $d) {
    $html .=
        '<tr>
        <td style="text-align:center">' . $no++ . '</td>
        <td>' . $d['no_asset'] . '</td>
        <td>' . $d['asset_type'] . '</td>
        <td>' . $d['no_serial'] . '</td>
        <td>' . $d['asset_description'] . '</td>
        <td style="text-align:center">' . date('d M Y', strtotime($d['cap_date'])) . '</td>
        </tr>';
}

$html .= '</table></html></body>';

$mpdf = new \Mpdf\Mpdf(['format' => $size]);
$mpdf->AddPage($orientation);

$mpdf->WriteHTML($html);
$mpdf->Output("Cetak Data Asset.pdf", 'I');
