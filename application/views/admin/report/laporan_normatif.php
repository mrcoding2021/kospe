<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Normatif Pembiayaan</title>
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
    <h1 class="text-center">Laporan Normatif Pembiayaan</h1>
    <p class="text-center">Koperasi Syariah Pesantren Entreprenuer</p>
  </div>


  <div class="table-responsive text-center">
    <table style="width: 100%;" width="100%" cellspacing="0">
      <thead class="">
        <tr>
          <th class="garis" rowspan="2">No</th>
          <th class="garis" rowspan="2">Nama</th>
          <th class="garis" rowspan="2">No. Rekening</th>
          <th class="garis" colspan="3">Tanggal</th>
          <th class="garis" rowspan="2">Jml. Pembiayaan</th>
          <th class="garis" colspan="2">Saldo</th>
          <th class="garis" colspan="2">Tunggakan</th>
          <th class="garis" rowspan="2">DPD</th>
          <th class="garis" rowspan="2">COL</th>
        </tr>
        <tr>
          <th class="garis">Pencairan</th>
          <th class="garis">JKW</th>
          <th class="garis">Jatuh Tempo</th>
          <th class="garis">Pokok</th>
          <th class="garis">Margin/Basil</th>
          <th class="garis">Pokok</th>
          <th class="garis">Margin</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $key) { ?>
          <tr class="garis">
            <td class="garis"><?= $key['no'] ?></td>
            <td class="garis"><?= $key['nama'] ?></td>
            <td class="garis"><?= $key['no_rek'] ?></td>
            <td class="garis"><?= $key['pencairan'] ?></td>
            <td class="garis"><?= $key['jkw'] ?></td>
            <td class="garis"><?= $key['jatuh_tempo'] ?></td>
            <td class="garis"><?= $key['pembiayaan'] ?></td>
            <td class="garis"><?= $key['saldo_pokok'] ?></td>
            <td class="garis"><?= $key['saldo_margin'] ?></td>
            <td class="garis"><?= $key['tunggakan_pokok'] ?></td>
            <td class="garis"><?= $key['tunggakan_margin'] ?></td>
            <td class="garis"><?= $key['dpd'] ?></td>
            <td class="garis"><?= $key['col'] ?></td>
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