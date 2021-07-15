<div class="container-fluid">
  <div class="row">
    <div class="col-lg">
      <!-- DataTales Example -->
      <?= $this->session->flashdata('alert');
      ?>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Daftar <?= $title ?>

          </h6>


        </div>
        <div class="card-body">
          <div class="row">
            <form action="" class="pb-3 d-flex col-md-6 col-sm-12">
              <label for="1" class="col-sm-2 col-form-label">No. Akad</label>
              <input type="text" class="form-control noakad" name="no_akad">
              <a href="#" class="btn btn-info btn-cari">Cari</a>
            </form>
          </div>
          <div class="identitas row mb-4">

          </div>
          <div class="table-responsive">
            <table class="table table-bordered" id="myTabel" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tgl. Transaksi</th>
                  <th width="22%">No. Referensi</th>
                  <th>Keterangan</th>
                  <th>Pokok</th>
                  <th>Margin</th>
                  <th>Total Pembayaran</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


</div>