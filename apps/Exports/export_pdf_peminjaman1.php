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
$asset = $conn->query("SELECT * FROM data_asset WHERE no_asset='" . $check->no_asset . "'")->fetch_object();
$admin = $conn->query("SELECT * FROM user WHERE nama=nama")->fetch_object();

$data = '';

$mpdf = new \Mpdf\Mpdf();
$html =
    '
    <html><head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="col-sm-4 invoice-col">
            <h3 style="text-align:center;">
                <u>
                    TANDA TERIMA PEMINJAMAN ASSET
                </u>
                <h5>
                No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; /IT/X/2022
                </h5>
            </h3>
        </div>
        <div class="column invoice-info">
            <div class="col-sm-4 invoice-col">
                Pada hari ini, ' . date('l') . ' tanggal ' . date(' d F Y') . ', yang bertanda tangan di bawah ini :
            </div>
            <div class="col-sm-4 invoice-col">
                <table style="width:100%" >
                    <tr>
                        <td style="width:10%;text-align:left;vertical-align: text-top;">Nama</td>
                        <td style="width:2%;text-align:left;">:</td>
                        <td style="width:88%;text-align:justify;">' . $karyawan->Nama_karyawan . '</td>
                    </tr>
                    <tr>
                        <td style="width:10%;text-align:left;vertical-align: text-top;">Jabatan</td>
                        <td style="width:2%;text-align:left;">:</td>
                        <td style="width:88%;text-align:justify;">' . $karyawan->Position . '</td>
                    </tr>
                    <tr>
                        <td style="width:10%;text-align:left;vertical-align: text-top;">Divisi</td>
                        <td style="width:2%;text-align:left;">:</td>
                        <td style="width:88%;text-align:justify;">' . $karyawan->New_Div . '</td>
                    </tr>
                </table>
            </div>
            <br>
            <div class="col-sm-4 invoice-col">
                Telah menerima peminjaman asset IT sebagai alat kerja dengan detail berikut :
            </div>
            <div class="col-sm-4 invoice-col">
                <table style="width:100%" >
                    <tr>
                        <td style="width:18%;text-align:left;vertical-align: text-top;">No Asset</td>
                        <td style="width:2%;text-align:left;">:</td>
                        <td style="width:80%;text-align:justify;">' . $asset->no_asset . '</td>
                    </tr>
                    <tr>
                        <td style="width:18%;text-align:left;vertical-align: text-top;">Deskripsi Asset</td>
                        <td style="width:2%;text-align:left;">:</td>
                        <td style="width:80%;text-align:justify;">' . $asset->asset_description . '</td>
                    </tr>
                    <tr>
                        <td style="width:18%;text-align:left;vertical-align: text-top;">Serial Number</td>
                        <td style="width:2%;text-align:left;">:</td>
                        <td style="width:80%;text-align:justify;">' . $asset->no_serial . '</td>
                    </tr>
                </table>
            </div>
            <br>
            <p style="text-align:justify ;" class="col-sm-4 invoice-col">
                Dengan kententuan sebagai berikut:
            <br>
            <div class="col-sm-4 invoice-col">
                <table style="width:100%">
                    <tr>
                        <td style="width:3%;text-align:center;vertical-align: text-top;">1. </td>
                        <td style="width:97%;text-align:justify;">
                            PC/Notebook milik PT. BINA PERTIWI dan telah diinstall software standart BP ( Windows, Ms.Office, SAP, Antivirus & Utility ). Pemakai/user tidak diperkenankan untuk menginstall software tambahan tanpa sepengetahuan IT, hal ini dimaksudkan untuk memperkecil resiko problem notebook. Jika pemakai/user ingin menginstall software tambahan sesusai dengan kebutuhan perusahaan, maka pemakai/user harus melaporkan kepada atasan ybs terlebih dulu.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%;text-align:center;vertical-align: text-top;">3. </td>
                        <td style="width:97%;text-align:justify;">
                            Apabila terjadi kehilangan PC/notebook yang disebabkan oleh kelalaian pemakai/user tersebut, maka pemakai/user segera membuat laporan tertulis kepada atasan langsung. Pada saat bersamaan, pemakai/user notebook tersebut diwajibkan membuat Berita Acara Kehilangan ditanda-tangani oleh atasan langsung dan diserahkan ke IT untuk diproses lebih lanjut. Atasan pemakai/user wajib memberikan Surat Peringatan kepada pemakai/user tersebut yang disebabkan oleh kelalaian pemakai/user.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%;text-align:center;vertical-align: text-top;">3. </td>
                        <td style="width:97%;text-align:justify;">
                            Pemakai/user wajib untuk merawat dan menjaga PC/notebook dan tidak diperkenankan untuk meminjamkan kepada orang lain. Jika terjadi kerusakan berat pada fisik maupun komponen Notebook karena kelalaian pemakai/user, maka pemakai/user diwajibkan untuk mengganti komponen/notebook tersebut.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%;text-align:center;vertical-align: text-top;">4. </td>
                        <td style="width:97%;text-align:justify;">
                            Jika pemakai/user mendapatkan pengganti PC/notebook yang lebih baru (peremajaan atau disesuaikan dengan kebutuhan user untuk perusahaan), maka PC/notebook yang lama harus dikembalikan ke IT untuk diregistrasi  kelengkapannya, apabila pada saat penyerahan notebook kepada IT dalam kondisi tidak lengkap maka pemakai/user wajib untuk mengganti barang yang tidak ada.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%;text-align:center;vertical-align: text-top;">5. </td>
                        <td style="width:97%;text-align:justify;">
                            Apabila terjadi kehilangan PC/notebook yang disebabkan oleh kelalaian pemakai/user tersebut, maka pemakai/user segera membuat laporan tertulis kepada atasan langsung. Pada saat bersamaan, pemakai/user notebook tersebut diwajibkan membuat Berita Acara Kehilangan ditanda-tangani oleh atasan langsung dan diserahkan ke IT untuk diproses lebih lanjut. Atasan pemakai/user wajib memberikan Surat Peringatan kepada pemakai/user tersebut yang disebabkan oleh kelalaian pemakai/user.
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <div style="text-align:Center ;">
            <table style="width:100%" >
                <tr>
                    <td style="width:50%;text-align:center;">Diterima oleh :</td>
                    <td style="width:50%;text-align:center;">Dikirim oleh :</td>
                </tr>
                <tr>
                    <td style="text-align:center;"><br><br><br><br><br>( ' . $karyawan->Nama_karyawan . ' )</td>
                    <td style="text-align:center;"><br><br><br><br><br>( ' . $admin->nama . ' )</td>
                </tr>
            </table>
        </div>
        <br>
        <div style="text-align:Center ;">
            Mengetahui,
            <br><br><br><br><br>
            <strong>
                ( RIZA ADITHYA )
            </strong>
        </div>

        ';


$html .= '</html></body>';

$mpdf = new \Mpdf\Mpdf(['format' => $size]);
$mpdf->AddPage($orientation);

$mpdf->WriteHTML($html);
$mpdf->Output("Cetak Surat Peminjaman Asset.pdf", 'I');
