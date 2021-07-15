<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Rekap Pembiayaan</title>
</head>
<style>
  html {
    font-family: sans-serif;
    line-height: 1.15;
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    color: solid black;
  }

  article,
  aside,
  figcaption,
  figure,
  footer,
  header,
  hgroup,
  main,
  nav,
  section {
    display: block;
  }

  body {
    margin: 0;
    font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #858796;
    text-align: left;
    background-color: #fff;
  }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    margin-top: 0;
    margin-bottom: 0.5rem;
  }

  p {
    margin-top: 0;
    margin-bottom: 1rem;
  }

  .content {
    align-items: center;
  }

  .garis {
    border: 1px solid black;
    text-align: center;
  }

  #ttd {
    margin-left: 1000px;
    margin-top: 20px;
  }

  .ttd {
    border: 1px solid black;
    text-align: center;
    padding: 5px 20px 5px 20px;
  }
</style>

<body style="margin: 20px 10px 20px 10px; width:1500px">
  <div class="header" style="width: 100%; text-align:center; border: 1px solid black;">
    <h1 class="text-center">Laporan Rekap Pembiayaan</h1>
    <p class="text-center">Koperasi Syariah Pesantren Entreprenuer</p>
  </div>


  <div class="table-responsive text-center">
    <table style="width: 100%;" width="100%" cellspacing="0">
      <thead class="">
        <tr>
          <th class="garis" rowspan="2">No</th>
          <th class="garis" colspan="2">Periode Pembiayaan</th>
          <th class="garis" colspan="2">Anggota </th>
          <th class="garis" rowspan="2">No. Rekening</th>
          <th class="garis" rowspan="2">No. Akad</th>
          <th class="garis" rowspan="2">P.Garansi</th>
          <th class="garis" rowspan="2">Jml. Pembiayaan</th>
          <th class="garis" rowspan="2">Harga Jual</th>
          <th class="garis" rowspan="2">Margin</th>
          <th class="garis" rowspan="2">Angsuran</th>
          <th class="garis" colspan="2">Rincian Angsuran</th>
          <th class="garis" rowspan="2">Tenor</th>
          <th class="garis" colspan="2">Margin %</th>
        </tr>
        <tr>
          <th class="garis">Tgl. Mulai</th>
          <th class="garis">Tgl. Berakhir</th>
          <th class="garis">ID. KoSPE</th>
          <th class="garis">Nama</th>
          <th class="garis">Pokok</th>
          <th class="garis">Margin</th>
          <th class="garis">Pricing bln</th>
          <th class="garis">Pricing thn</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $key) { ?>
          <tr class="garis">
            <td class="garis"><?= $key['no'] ?></td>
            <td class="garis"><?= $key['tgl_dropping'] ?></td>
            <td class="garis"><?= $key['tgl_jatuh_tempo'] ?></td>
            <td class="garis"><?= $key['id_kospe'] ?></td>
            <td class="garis"><?= $key['nama'] ?></td>
            <td class="garis"><?= $key['no_rek'] ?></td>
            <td class="garis"><?= $key['no_akad'] ?></td>
            <td class="garis"><?= $key['garansi'] ?></td>
            <td class="garis"><?= rupiah($key['jml_pembiayaan']) ?></td>
            <td class="garis"><?= rupiah($key['hrg_jual']) ?></td>
            <td class="garis"><?= rupiah($key['margin']) ?></td>
            <td class="garis"><?= rupiah($key['angsuran']) ?></td>
            <td class="garis"><?= rupiah($key['pokok']) ?></td>
            <td class="garis"><?= rupiah($key['basil']) ?></td>
            <td class="garis"><?= $key['tenor'] ?></td>
            <td class="garis"><?= $key['bln'] ?></td>
            <td class="garis"><?= $key['thn'] ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <div id="ttd">
    <table>
      <thead>
        <tr>
          <th class="ttd">Menyetujui</th>
          <th class="ttd">Pemeriksa</th>
          <th class="ttd">Pembuat</th>
        </tr>
        <tr>
          <th class="ttd"><br><br><br><br></th>
          <th class="ttd"></th>
          <th class="ttd"></th>
        </tr>
        <tr>
          <th class="ttd">Agus Supriyanto</th>
          <th class="ttd">Dedy Hidayat</th>
          <th class="ttd">Andri F.S</th>
        </tr>
        <tr>
          <th class="ttd">Direktur Umum</th>
          <th class="ttd">Mandger</th>
          <th class="ttd">Admin</th>
        </tr>
      </thead>
    </table>
  </div>
</body>

</html>