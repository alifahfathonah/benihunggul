<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Label</title>
</head>

<body>

    <style>
        div .tengah {
            text-align: center;
        }

        .ukuran_font {
            font-size: 10px;
        }
    </style>

    <div class="ukuran_font">
        <table border="1" cellpadding="10" cellspacing="0" align="center" rules="all">

            <tr>
                <td align="center">
                    <b>BENIH BERSERTIFIKAT</b><br>
                    <?= $dataQrcode->nama_perusahaan ?><br>
                    <?= $dataQrcode->alamat_perusahaan ?><br>
                    <hr width="100%"><br>
                    Hsl. Rik. Lap. No. : <?= $dataQrcode->hasil_lapang ?><br>
                    Tanggal : <?= $dataQrcode->tgl ?><br>
                </td>
                <td>
                    Nomor Sertifikat : <?= $dataQrcode->no_sertifikat ?><br>
                    Komoditi : <?= $dataQrcode->komoditi ?><br>
                    Varietas/Klon : <?= $dataQrcode->varietas_klon ?><br>
                    Bulan Tanam : <?= konversiBulan($dataQrcode->bulan_tanam) ?><br>
                    Tinggi : <?= $dataQrcode->tinggi ?>&nbsp;cm<br>
                    Jumlah Daun : <?= $dataQrcode->jumlah_daun ?><br>
                    Akhir Masa Edar : <?= $dataQrcode->akhir_masa_edar ?><br>
                    <!-- <p><img style="width: 200px" src="data:image/png;base64, <?= $image ?>" /></p> -->
                </td>


                <td>
                    <p><img style="width: 100px" src="data:image/png;base64, <?= $image ?>" /></p>
                </td>
            </tr>

        </table>
    </div>
    <!-- <style type="text/css" media="all">
.tg  {border-collapse:collapse;border-spacing:0;width:700px;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 10px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 10px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-73oq{border-color:#000000;text-align:left;vertical-align:top;width:50%;}
</style>
<center>
<table class="tg">
  <tr>
    <th class="tg-73oq" rowspan="2">
      Nomor Sertifikat : <?= $dataQrcode->no_sertifikat ?><br>
      Komoditi : <?= $dataQrcode->komoditi ?><br>
      Varietas/Klon : <?= $dataQrcode->varietas_klon ?><br>
      Bulan Tanam : <?= konversiBulan($dataQrcode->bulan_tanam) ?><br>
      Tinggi : <?= $dataQrcode->tinggi ?><br>
      Jumlah Daun : <?= $dataQrcode->jumlah_daun ?><br>
      Akhir Masa Edar : <?= $dataQrcode->akhir_masa_edar ?><br>
      <p><img style="width: 200px" src="data:image/png;base64, <?= $image ?>" /></p>
    </th>
    <th class="tg-0lax">
      <h2 style="text-align:center">BENIH BERSERTIFIKAT</h2>
      <h3 style="text-align:center;text-transform: uppercase;"><?= $dataQrcode->nama_perusahaan ?></h3>
      <p style="text-align:center"><?= $dataQrcode->alamat_perusahaan ?><br>
    </th>
  </tr>
  <tr>
    <td class="tg-0lax">
    Hsl. Rik. Lap. No. : <?= $dataQrcode->hasil_lapang ?><br>
    Tanggal : <?= $dataQrcode->tgl ?><br>
    </td>
  </tr> -->


    <!-- <tr>
    <td class="tg-0lax">
    <p><img style="width: 200px" src="data:image/png;base64, <?= $image ?>" /></p>
    </td>
  </tr> -->
    <!-- </table> -->

</body>

</html> 