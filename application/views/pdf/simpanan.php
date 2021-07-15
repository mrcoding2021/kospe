<html>

<head>
  <title>Cetak PDF</title>
</head>

<body>
  <div style="text-align: center;">
    <h3>FORM PENGAJUAN PRODUK SIMPANAN</h3>
    <H5 style="margin-top: -10px;">USPPS KOPERASI SYARIAH PESANTREN ENTREPRENEUR</H5>
  </div>

  <div style="font-size:12px; ">
    <div style="background-color: #616161;">
      <h5 style="text-align: center;color: white; line-height: 10px">Data Pribadi Pemohon</h5>
    </div>
    <div style="width: 100%; padding:12px">
      <table>
        <tr>
          <td>
            <div style="width: 350px; max-width: 350px">
              <table>
                <tr>
                  <td class="q">Produk Pilihan</td>
                  <td class="n">:</td>
                  <td class="a"><?= $key->program ?></td>
                </tr>

                <tr>
                  <td class="q">Nama Pemohon</td>
                  <td class="n">:</td>
                  <td class="a"><?= $key->nama ?></td>
                </tr>
                <tr>
                  <td class="q">Tempat, tgl lahir</td>
                  <td class="n">:</td>
                  <td class="a"><?= $key->ttl ?></td>
                </tr>
                <tr>
                  <td class="q">Pendidikan Terakhir</td>
                  <td class="n">:</td>
                  <td class="a"><?= $key->pendidikan ?></td>
                </tr>
                <tr>
                  <td class="q">No. KTP</td>
                  <td class="n">:</td>
                  <td class="a"><?= $key->ktp ?></td>
                </tr>
                <tr>
                  <td class="q">No. NPWP</td>
                  <td class="n">:</td>
                  <td class="a"><?= $key->npwp ?></td>
                </tr>
                <tr>
                  <td class="q">Jenis Kelamin</td>
                  <td class="n">:</td>
                  <td class="a"><?= $key->sex ?></td>
                </tr>
                <tr>
                  <td class="q">Alamat KTP</td>
                  <td class="n">:</td>
                  <td style="max-width: 100px;">
                    <p>
                      <?= substr($key->alamat_ktp, 0, 30) ?>- <br>
                      <?= substr($key->alamat_ktp, 40, 30) ?>- <br>
                      <?= substr($key->alamat_ktp, 80, 30) ?>- <br>
                      <?= substr($key->alamat_ktp, 120, 30) ?>
                    </p>
                  </td>
                </tr>
              </table>
            </div>
          </td>
          <td>
            <div style="width: 350px ">
              <table>
                <tr>
                  <td class="q">No. Tlp Rumah</td>
                  <td class="n">:</td>
                  <td class="a"><?= $key->tlp_rumah ?></td>
                </tr>
                <tr>
                  <td class="q">No. HP</td>
                  <td class="n">:</td>
                  <td class="a"><?= $key->hp ?></td>
                </tr>
                <tr>
                  <td class="q">Email</td>
                  <td class="n">:</td>
                  <td class="a"><?= $key->email ?></td>
                </tr>
                <tr>
                  <td class="q">Alamat Domisili</td>
                  <td class="n">:</td>
                  <td class="a">
                    <p>
                      <?= substr($key->domisili, 0, 30) ?>- <br>
                      <?= substr($key->domisili, 40, 30) ?>- <br>
                      <?= substr($key->domisili, 80, 30) ?>- <br>
                      <?= substr($key->domisili, 120, 30) ?>
                    </p>
                  </td>
                </tr>

                <tr>
                  <td class="q">Agama</td>
                  <td class="n">:</td>
                  <td class="a"><?= $key->agama ?></td>
                </tr>
                <tr>
                  <td class="q">Nama Ibu Kandung</td>
                  <td class="n">:</td>
                  <td class="a"><?= $key->ibu ?></td>
                </tr>
                <tr>
                  <td class="q">Ahli Waris 1</td>
                  <td class="n">:</td>
                  <td class="a"><?= $key->waris ?></td>
                </tr>
                <tr>
                  <td class="q">Ahli Waris 2</td>
                  <td class="n">:</td>
                  <td class="a"><?= $key->waris2 ?></td>
                </tr>
              </table>
            </div>
          </td>
        </tr>
      </table>
    </div>

  </div>



</body>

</html>