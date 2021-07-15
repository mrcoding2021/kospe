<form method="post" class="jumlah-pembiayaan" data-table="tb_jumlahpembiayaan">
  <div class="form-group row">
    <div class="col-md-12 py-1">
      <div class="row py-1">
        <label class="col-sm-1 col-form-label">No. Akad</label>
        <div class="col-sm-5">
          <input type="text" name="no_akad" class="form-control">
        </div>
      </div>
    </div>
    <div class="col-md-6 p-1">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" width="100%" cellspacing="0">
          <thead class="bg-success text-white">
            <tr>
              <th class="text-center" colspan="2">FASILITAS PEMBIAYAAN</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> Harga Jual
              </td>
              <td> <input type="text" name="hrg_jual" readonly class="jual form-control">
              </td>
            </tr>
            <tr>
              <td> Pricing ( p.m flat )
              </td>
              <td> <input type="text" name="pricing" class="pricing form-control" value="1"></td>

            </tr>
            <tr>
              <td> Uang Muka (DP)
              </td>
              <td> <input type="text" name="dp" class="dp form-control" value="0"></td>

            </tr>
            <tr>
              <td> Jangka Waktu
              </td>
              <td> <input type="text" name="jangka" class="jangka form-control" value="1"></td>

            </tr>
            <tr>
              <td> Harga Beli</td>
              <td> <input type="text" name="hrg_beli" class="beli form-control"></td>

            </tr>
            <tr>
              <td> Harga Jual Setelah Uang Muka
              </td>
              <td> <input type="text" name="hrg_akhir" class="jualx form-control" readonly></td>

            </tr>
            <tr class="bg-success text-white">
              <td> Angsuran per bulan
              </td>
              <td> <input type="text" name="angsur" class="angsur form-control" readonly></td>

            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-6 p-1">
      <div class="table-responsive">
        <table class="table table-bordered table-striped" width="100%" cellspacing="0">
          <thead class="bg-primary text-white">
            <tr>

              <th class="text-center" colspan="2">BIAYA WAJIB DIBAYAR</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td> Administrasi</td>
              <td> <input type="text" value="0" name="admin" class="form-control"></td>
            </tr>
            <tr>
              <td> Notaris</td>
              <td> <input type="text" value="0" name="notaris" class="form-control"></td>
            </tr>
            <tr>
              <td> Asuransi Jiwa</td>
              <td> <input type="text" value="0" name="asuransi_jiwa" class="form-control"></td>
            </tr>
            <tr>
              <td> Asuransi kendaraan</td>
              <td> <input type="text" value="0" name="asuransi_kendaraan" class="form-control"></td>
            </tr>
            <tr>
              <td> Pengikatan Jaminan</td>
              <td> <input type="text" value="0" name="jaminan" class="form-control"></td>
            </tr>
            <tr>
              <td> Materai</td>
              <td> <input type="text" value="0" name="materai" class="form-control"></td>
            </tr>
            <tr class="bg-primary text-white">
              <td> Jumlah</td>
              <td> <input type="text" name="total" id="total" class="form-control" readonly></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Simpan</button>

</form>