<div class="container-fluid">
  <div class="row">
    <div class="col-lg">
      <?= $this->session->flashdata('alert');
      ?>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?= $title ?> Fasilitas Pembiayaan</h6>
        </div>
        <div class="card-body">
          <form method="post" action="<?= base_url('pembiayaan/hitung') ?>">
            <div class="form-group row">
              <label for="1" class="col-sm-2 col-form-label">Nama Anggota</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama">
              </div>
            </div>
            <div class="form-group row">
              <label for="1" class="col-sm-2 col-form-label">Diisi oleh</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="created_by">
              </div>
              <label for="2" class="col-sm-2 col-form-label">No. Pengajuan</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="kode">
              </div>
            </div>
            <div class="form-group row">
              <div class="table-responsive">
                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                  <thead class="bg-dark text-white">
                    <tr>
                      <th class="text-center" colspan="2">Fasiltias yang diusulkan</th>
                      <th class="text-center" colspan="2">BIAYA-BIAYA WAJIB DIBAYAR</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td> Harga Beli</td>
                      <td> <input type="text" class="beli form-control"></td>
                      <td> Administrasi
                      </td>
                      <td> <input type="text" class="nilai form-control"></td>
                    </tr>
                    <tr>
                      <td> Harga Jual
                      </td>
                      <td> <input type="text" class="jual form-control"  readonly></td>
                      <td> Notaris
                      </td>
                      <td> <input type="text" class="nilai form-control"></td>
                    </tr>
                    <tr>
                      <td> Pricing ( p.m flat )
                      </td>
                      <td> <input type="text" class="pricing form-control" value="1" ></td>
                      <td> Asuransi Jiwa 5 bln
                      </td>
                      <td> <input type="text" class="nilai form-control"></td>
                    </tr>
                    <tr>
                      <td> Uang Muka (DP)
                      </td>
                      <td> <input type="text" class="dp form-control" value="0"></td>
                      <td> Asuransi kendaraan 0 bln
                      </td>
                      <td> <input type="text" class="nilai form-control"></td>
                    </tr>
                    <tr>
                      <td> Jangka Waktu
                      </td>
                      <td> <input type="text" class="jangka form-control" value="1"></td>
                      <td> Pengikatan Jaminan
                      </td>
                      <td> <input type="text" class="nilai form-control"></td>
                    </tr>
                    <tr>
                      <td> Harga Jual Setelah Uang Muka
                      </td>
                      <td> <input type="text" class="jualx form-control"  readonly></td>
                      <td> Meterai
                      </td>
                      <td> <input type="text" class="nilai form-control"></td>
                    </tr>
                    <tr class="bg-secondary text-white">
                      <td> Angsuran per bulan
                      </td>
                      <td> <input type="text" class="angsur form-control" readonly></td>
                      <td> Jumlah
                      </td>
                      <td> <input type="text" class="nilai form-control" readonly></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer">
              <button id="hitungs" class="btn btn-primary">Analisa</button>
              <a id="cetakPdf" href="<?= base_url('pdf/persetujuan') ?>" class="btn btn-success">Cetak PDF</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>