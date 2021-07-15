<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kartu Angsuran Pembiayaan</title>
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
</style>

<body style="margin: 20px 10px 20px 10px; width:1000px">
  <div class="header" style="width: 100%; text-align:center; border: 1px solid black;">
    <h1 class="text-center">Kartu Angsuran Anggota Pembiayaan</h1>
    <p class="text-center">Koperasi Syariah Pesantren Entreprenuer</p>
  </div>
  <div class="user">
    <table style="width: 100%; border: 1px solid black; padding: 15px 25px 15px 25px">
      <tr>
        <strong>
        <td>
          <table style="width: 100%; font-style: bold;">
            <tr>
              <td>No. Rekening</td>
              <td>: <?= $user->no_rek ?></td>
            </tr>
            <tr>
              <td>Nama Anggota</td>
              <td>: <?= $user->nama ?></td>
            </tr>
            <tr>
              <td>Total Pembiayaan</td>
              <td>: <?= rupiah($detail->hrg_beli) ?></td>
            </tr>
            <tr>
              <td>Harga Jual ke Anggota</td>
              <td>: <?= rupiah($detail->hrg_jual) ?></td>
            </tr>
            <tr>
              <td>Margin Pembiayaan</td>
              <td>: <?= rupiah($detail->hrg_jual - $detail->hrg_beli) ?></td>
            </tr>
            <tr>
              <td>Tenor (bulan)</td>
              <td>: <?= $detail->jangka ?> bulan</td>
            </tr>
          </table>
        </td>
        <td>
          <table style="width: 100%;">
            <tr>
              <td>Akad</td>
              <td>: <?= $akad->nama ?></td>
            </tr>
            <tr>
              <td>Angsuran Perbulan</td>
              <td>: <?= rupiah($detail->angsur) ?></td>
            </tr>
            <tr>
              <td>Tanggal Jatuh Tempo</td>
              <td>: <?= substr($user->tgl_dropping, 5, 2) ?></td>
            </tr>
            <tr>
              <td>Tanggal Realisasi</td>
              <td>: <?= $user->tgl_dropping ?></td>
            </tr>
            <tr>
              <td>Tanggal Akhir Pembiayaan</td>
              <td>: <?= date("Y-m-d", strtotime($user->tgl_dropping . ' + ' . $detail->jangka . ' Months')) ?></td>
            </tr>
            <tr>
              <td>...</td>
              <td>...</td>
            </tr>
          </table>
        </td>
        </strong>
      </tr>

    </table>
  </div>

  <div class="content">
    <table class="table m-2 garis" style="width: 100%;">
      <thead>
        <tr class="garis">
          <th class="garis" rowspan="2">No</th>
          <th class="garis" rowspan="2">Jadwal Pembayaran <br> Angsuran</th>
          <th class="garis" colspan="4">Perhitungan Angsuran</th>
          <th class="garis" rowspan="2">Realisasi <br> Pembayaran</th>
          <th class="garis" colspan="2">Sisa</th>
        </tr>
        <tr>
          <td class="garis">Sisa Pokok</td>
          <td class="garis">Sisa <?= $akad->istilah?></td>
          <td class="garis">Pokok</td>
          <td class="garis"><?= $akad->istilah?></td>
          
          <td class="garis">Tititpan</td>
          <td class="garis">Kekurangan</td>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1;
        $n = 1;
        foreach ($angsuran as $key) { 
          if ($key->angsuran_ke != 0) {?>
          <tr>
            <td class="garis"><?= $no++ ?></td>
            <td class="garis"><?php echo date("Y-m-d", strtotime($user->tgl_dropping . ' + ' . $n++ . ' Months')) ?></td>
            <td class="garis"><?= rupiah($key->sisa_pokok) ?></td>
            <td class="garis"><?= rupiah($key->sisa_margin) ?></td>
            <td class="garis"><?= rupiah($key->pokok) ?></td>
            <td class="garis"><?= rupiah($key->margin) ?></td>
            <td class="garis"><?= rupiah($key->jumlah) ?></td>
            <td class="garis"><?= rupiah($key->titipan) ?></td>
            <td class="garis"><?= rupiah($key->kekurangan) ?></td>
          </tr>
        <?php }} ?>
      </tbody>

    </table>
  </div>
</body>

</html>