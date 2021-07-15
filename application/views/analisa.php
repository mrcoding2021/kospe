<html>

<head>
  <title>Cetak PDF</title>
</head>

<body>
  <div style="text-align: center;">
    <h3>HASIL ANALISA PEMBIAYAAN</h3>
    <H5 style="margin-top: -10px;">USPPS KOPERASI SYARIAH PESANTREN ENTREPRENEUR</H5>
  </div>

  <div style="font-size:12px; ">
    <div style="width: 100%; padding:12px">
      <div class="form-group row">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" width="100%" cellspacing="0">
            <thead class="bg-dark text-white">
              <tr>
                <th>No</th>
                <th>Kriteria Analisa</th>
                <th width="30%">Pilihan</th>
                <th>Nilai</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($analisa as $a) : ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $a->nama ?></td>
                  <td>
                    <select name="<?= $a->nama ?>" style="width: 300px;">
                      <option>Pilihan</option>
                      <?php $this->db->where('parent', $a->id_analisa);
                      $dt = $this->db->get('tb_analisa')->result();
                      foreach ($dt as $d) : ?>
                        <option value="<?= $d->id_analisa ?>"><?= $d->nama ?></option>
                      <?php endforeach ?>
                    </select>
                  </td>
                  <td>0</td>
                </tr>
              <?php endforeach ?>
            </tbody>
            <thead class="bg-dark text-white">
              <tr>
                <th colspan="2"></th>
                <th>Total Skor</th>
                <th id="result">450</th>
              </tr>
            </thead>
            <tr class="bg-primary text-white">
              <th colspan="2">Hasil Analisa</th>
              <th colspan="2">DIPERTIMBANGKAN</th>
            </tr>
          </table>
        </div>
      </div>
    </div>

  </div>


</body>

</html>