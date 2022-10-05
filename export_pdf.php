<?php

require_once __DIR__ . '/vendor/autoload.php';

include 'koneksi.php';
$data = mysqli_query($con, "SELECT * FROM data_asset");

$mpdf = new \Mpdf\Mpdf();
$html = '<html><head>
<meta charset="UTF-8">
<link rel="stylesheet" href="">
</head>
<body>
    <div>
    <h3 style="text-align:center">Surat Peminjaman Asset</h3>
    </div>
    <table align="center" width="100%" cellspacing="0" class="table table-bordered table-striped table-hover">
    <tr>
        <th>test1</th>
        <th>test2</th>
        <th>test3</th>
    </tr>
    </table>
</body>';

$html .= '</table></html>';

$mpdf = new \Mpdf\Mpdf(['format' => $size]);
$mpdf->AddPage($orientation);

$mpdf->WriteHTML($html);
$mpdf->Output();
