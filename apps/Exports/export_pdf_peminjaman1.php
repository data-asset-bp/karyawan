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
        
        <!--  Format Logo Heading  -->
        <div class="col-sm-4 invoice-col">
            <table style="width:100%;text-align:center;">
                <tr>
                    <td style="width:88%;line-height:0.9"><h4></td>
                    <td style="width:12%;line-height:1;border:1px solid;padding:5px;" class="table table-bordered"><h4> NB / PC </h4></td>
                </tr>
            </table>
        </div>
        <br><br>

        <!--  Header dan Nomor Surat  -->
        <div class="col-sm-4 invoice-col">
            <h4 style="text-align:center;line-height: 0.1">
                <u>
                    TANDA TERIMA PEMINJAMAN ASSET
                </u>
                <h5 style="line-height: 0.1">
                    No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; /IT/X/2022
                </h5>
            </h4>
        </div>
        
        <!--  Format Peminjam  -->
        <div class="column invoice-info">
            <div class="col-sm-4 invoice-col">
                Pada hari ini, ' . date('l') . ' tanggal ' . date(' d F Y') . ', yang bertanda tangan di bawah ini :
            </div>
            <div class="col-sm-4 invoice-col">
                <table style="width:100%;font-size: 13px;" >
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
        </div>
        <br>

        <!--  Format Detail Asset  -->
        <div class="column invoice-info">  
            <div class="col-sm-4 invoice-col">
                Telah menerima peminjaman asset IT sebagai alat kerja dengan detail berikut :
            </div>
            <div class="col-sm-4 invoice-col">
                <table style="width:100%;font-size: 13px;" >
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
        </div>
        <br>

        <!--  Format Ketentuan Peminjaman  -->
        <div class="column invoice-info">  
            <p class="col-sm-4 invoice-col" style="text-align:justify;" >
                Dengan kententuan sebagai berikut:
            <br>
            <div class="col-sm-4 invoice-col">
                <table style="width:100%;font-size: 13px;">
                    <tr>
                        <td style="width:3%;text-align:center;vertical-align: text-top;">1. </td>
                        <td style="width:97%;text-align:justify;">
                            PC/NOTEBOOK milik PT. BINA PERTIWI dan telah diinstall software standard BP (Windows, Ms.Office, SAP, Antivirus & Utility). Pemakai/user tidak diperkenankan untuk menginstall software tambahan tanpa sepengetahuan IT, hal ini dimaksudkan untuk memperkecil resiko problem NOTEBOOK. Jika pemakai/user ingin menginstall software tambahan sesusai dengan kebutuhan perusahaan, maka pemakai/user harus melaporkan kepada atasan ybs terlebih dulu.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%;text-align:center;vertical-align: text-top;">2. </td>
                        <td style="width:97%;text-align:justify;">
                            Apabila terjadi masalah pada software yang disebabkan oleh kelalaian pemakai/user sehingga PC/notebook tidak bisa dioperasikan, maka pemakai/user segera menginformasikan kepada IT di ketahui atasan langsung.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%;text-align:center;vertical-align: text-top;">3. </td>
                        <td style="width:97%;text-align:justify;">
                            Pemakai/user wajib untuk merawat dan menjaga PC/NOTEBOOK dan tidak diperkenankan untuk meminjamkan kepada orang lain. Jika terjadi kerusakan berat pada fisik maupun komponen NOTEBOOK karena kelalaian pemakai/user, maka pemakai/user diwajibkan untuk mengganti komponen/NOTEBOOK tersebut.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%;text-align:center;vertical-align: text-top;">4. </td>
                        <td style="width:97%;text-align:justify;">
                            Jika pemakai/user mendapatkan pengganti PC/NOTEBOOK yang lebih baru (peremajaan atau disesuaikan dengan kebutuhan user untuk perusahaan), maka PC/NOTEBOOK yang lama harus dikembalikan ke IT untuk diregistrasi  kelengkapannya, apabila pada saat penyerahan NOTEBOOK kepada IT dalam kondisi tidak lengkap maka pemakai/user wajib untuk mengganti barang yang tidak ada.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:3%;text-align:center;vertical-align: text-top;">5. </td>
                        <td style="width:97%;text-align:justify;">
                            Apabila terjadi kehilangan PC/NOTEBOOK yang disebabkan oleh kelalaian pemakai/user tersebut, maka pemakai/user segera membuat laporan tertulis kepada atasan langsung. Pada saat bersamaan, pemakai/user NOTEBOOK tersebut <strong style="font-weight: bold;">diwajibkan</strong> membuat <strong style="font-weight: bold;">Berita Acara Kehilangan</strong> ditanda-tangani oleh atasan langsung dan diserahkan ke IT untuk diproses lebih lanjut. Atasan pemakai/user wajib memberikan <strong style="font-weight: bold;">Surat Peringatan</strong> kepada pemakai/user tersebut yang disebabkan oleh kelalaian pemakai/user.
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <br><br>

        <!--  Format TTD  -->
        <div class="col-sm-4 invoice-col">
            <table style="width:100%;font-size: 13px;">
                <tr>
                    <td style="width:50%;text-align:center;">Diterima oleh :</td>
                    <td style="width:50%;text-align:center;">Dikirim oleh :</td>
                </tr>
                <tr>
                    <td style="text-align:center;text-transform:uppercase;font-weight: bold;"><br><br><br><br>( ' . $karyawan->Nama_karyawan . ' )</td>
                    <td style="text-align:center;text-transform:uppercase;font-weight: bold;"><br><br><br><br>( ' . $admin->nama . ' )</td>
                </tr>
            </table>
        </div>
        <br>
        <div class="col-sm-4 invoice-col" style="text-align:Center;font-size:13px;">
            <table style="width:100%;font-size: 13px;">
                <tr>
                    <td style="width:100%;text-align:center;">Mengetahui,</td>
                </tr>
                <tr>
                    <td style="text-align:center;text-transform:uppercase;font-weight: bold;"><br><br><br><br>( RIZA ADITHYA )</td>
                </tr>
            </table>
        </div>
        ';


$html .= '</html></body>';

$mpdf = new \Mpdf\Mpdf(['format' => $size]);
$mpdf->AddPage($orientation);

$mpdf->WriteHTML($html);
$mpdf->Output("Cetak Surat Peminjaman Asset PC or NB [$asset->no_asset].pdf", 'I');
