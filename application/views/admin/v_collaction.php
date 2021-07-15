<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->

  <div class="row">
    <div class="col-lg">
      <!-- DataTales Example -->
      <?= $this->session->flashdata('alert');
      ?>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Daftar <?= $title ?>
            <a href="#add" class="add btn btn-primary btn-sm text-right ml-3" data-toggle="modal">Tambah Data</a>

          </h6>


        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th width="22%">No. Akad</th>
                  <th>Tgl. Berakhir</th>
                  <th>Nama</th>

                  <th width="15%">Progress </th>
                  <th width="11%">Terbayar</th>
                  <th width="10%">Sisa</th>
                  <th width="10%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($collaction as $key) : ?>
                  <?php
                  $this->db->select_sum('bayar', 'total');
                  $this->db->where('no_akad', $key->no_akad);
                  $transaksi = $this->db->get('tb_bayar')->row();

                  if ($transaksi->total != null) {
                    if ($transaksi->total != 0 && $key->jual != 0) {
                      $total = $transaksi->total / $key->jual;
                      $persen = $total * 100;
                    }
                  } else {
                    $persen = 1;
                  }
                  ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $key->no_akad ?></td>
                    <td><?= shortdate_indo($key->tgl_end) ?></td>
                    <td><?= $key->nama ?></td>

                    <td>
                      <div class="progress mt-1">
                        <?php if ($persen > 0 && $persen <= 25) : ?>
                          <div class="progress-bar bg-danger " role="progressbar" style="width: <?= round($persen) ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        <?php elseif ($persen > 25 && $persen <= 50) : ?>
                          <div class="progress-bar bg-warning " role="progressbar" style="width: <?= round($persen) ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        <?php elseif ($persen > 50 && $persen <= 75) : ?>
                          <div class="progress-bar bg-success " role="progressbar" style="width: <?= round($persen) ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        <?php elseif ($persen > 75) : ?>
                          <div class="progress-bar bg-primary " role="progressbar" style="width: <?= round($persen) ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        <?php elseif ($persen == 1) : ?>
                          <div class="progress-bar bg-danger " role="progressbar" style="width: 1%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        <?php endif ?>
                      </div>
                    </td>

                    <td>

                      <?php echo rupiah($transaksi->total) ?></td>
                    <td><?= rupiah($key->jual - $transaksi->total) ?></td>
                    <td width="12%">
                      <a href="#view" data-id="<?= $key->no_akad ?>" data-toggle="modal" class="badge badge-primary badge-sm detail"><i class="fa fa-pencil-alt"></i></a>
                      <a href="#bayar" data-id="<?= $key->no_akad ?>" data-toggle="modal" class="badge badge-success badge-sm bayar"><i class="fas fa-hand-holding-usd"></i> Bayar</a>
                      <a href="<?= base_url('pdf/cetakAkad' . $key->id_collaction) ?>" class="badge badge-warning badge-sm"><i class="far fa-file-pdf"></i> </a>
                      <a href="<?= base_url('collaction/delete/') . $key->id_collaction ?>" class="badge badge-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini ?')"><i class="fas fa-trash-alt"></i>
                      </a>

                    </td>

                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>

<!-- End of Main Content -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title ?>
          <span class="badge badge-success">
            <?php $this->db->order_by('id_collaction', 'desc');
            $id_akad = $this->db->get('tb_collaction', 1)->row();
            ?>
          </span>
        </h5>

        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('collaction/add') ?>" method="post">
          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">No. Akad</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="1" name="no_akad">
            </div>
          </div>
          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">Id. KoSPE</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="1" name="id_kospe">
              <!-- <input type="hidden" class="form-control" id="1" name="no_akad" value="<?= $id_akad->id_collaction + 1 ?>"> -->
            </div>
            <label for="1" class="col-sm-1 col-form-label">Nama</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="1" name="nama">
            </div>
          </div>
          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">Telp/HP</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="1" name="tlp">
            </div>
            <label for="1" class="col-sm-1 col-form-label">Email</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="1" name="email">
            </div>
          </div>
          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">Tgl. Mulai</label>
            <div class="col-sm-4">
              <div class="input-group date">
                <input type="text" class="form-control" name="tgl_start" value="">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>
            <label for="1" class="col-sm-2 col-form-label">Tgl. Berakhir</label>
            <div class="col-sm-4">
              <div class="input-group date">
                <input type="text" name="tgl_end" class="form-control" value="">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">Akad</label>
            <div class="col-sm-4">
              <select class="form-control" id="2" name="akad">
                <?php $akd = $this->db->get('tb_akad')->result();
                foreach ($akd as $a) : ?>
                  <option value="<?= $a->id_akad ?>"><?= $a->nama ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <label for="1" class="col-sm-1 col-form-label">Tujuan</label>
            <div class="col-sm-5">
              <select name="tujuan" id="" class="form-control">
                <?php $tjn = $this->db->get('tb_tujuan')->result();
                foreach ($tjn as $a) : ?>
                  <option value="<?= $a->id_tujuan ?>"><?= $a->nama ?></option>
                <?php endforeach ?>
              </select>
            </div>

          </div>
          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">Dropping</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="1" name="dropping">
            </div>
            <label for="1" class="col-sm-2 col-form-label">Angsuran</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="1" name="angsuran">
            </div>
          </div>
          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">Tenor</label>
            <div class="col-sm-4">
              <select class="form-control" id="2" name="tenor">
                <option value="3">3 bulan</option>
                <option value="6">6 bulan</option>
                <option value="12">12 bulan</option>
                <option value="18">18 bulan</option>
                <option value="24">24 bulan</option>
                <option value="36">36 bulan</option>
              </select>
            </div>
            <label for="1" class="col-sm-2 col-form-label">Harga Jual</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="1" name="jual">
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Pembayaran <span class="badge badge-success"></h5>

        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" name="bayar">
          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">No. Akad</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control" name="no_akad">
            </div>
          </div>
          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">Id. KoSPE</label>
            <div class="col-sm-3">
              <input type="text" readonly class="form-control" name="id_kospe">

            </div>
            <label for="1" class="col-sm-1 col-form-label">Nama</label>
            <div class="col-sm-6">
              <input type="text" readonly class="form-control" name="nama">
            </div>
          </div>

          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">Tgl. Mulai</label>
            <div class="col-sm-4">
              <div class="input-group ">
                <input type="text" readonly class="form-control" name="tgl_start" value="">
              </div>
            </div>
            <label for="1" class="col-sm-2 col-form-label">Tgl. Berakhir</label>
            <div class="col-sm-4">
              <div class="input-group ">
                <input type="text" readonly name="tgl_end" class="form-control" value="">
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">Dropping</label>
            <div class="col-sm-4">
              <input readonly type="text" class="form-control" name="dropping">
            </div>
            <label for="1" class="col-sm-2 col-form-label">Angsuran</label>
            <div class="col-sm-4">
              <input readonly type="text" class="form-control" name="angsuran">
            </div>
          </div>
          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">Tenor</label>
            <div class="col-sm-4">
              <input type="text" readonly value="" class="form-control" name="tenor">
            </div>
            <label for="1" class="col-sm-2 col-form-label">Harga Jual</label>
            <div class="col-sm-4">
              <input readonly type="text" readonly class="form-control" name="jual">
            </div>
          </div>
          <div class="form-group row bg-secondary text-white py-2">
            <label for="1" class="col-sm-1 col-form-label">Bayar</label>
            <div class="col-sm-3">
              <input type="text" required class="form-control" name="angsuran">
            </div>
            <label for="1" class="col-sm-2 col-form-label">Angsuran Ke</label>
            <div class="col-sm-1">
              <input type="text" required class="form-control" name="angsuran_ke">
            </div>
            <label for="1" class="col-sm-2 col-form-label">No. Referensi</label>
            <div class="col-sm-3">
              <input type="text" required autofocus class="form-control" name="reff">
            </div>
            <label for="1" class="col-sm-2 col-form-label pt-3">Keterangan</label>
            <div class="col-sm-10 pt-2">
              <input type="text" required class="form-control" name="ket">
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary bayar-angsuran">Bayar</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail <?= $title ?></h5>

        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('collaction/edit/') ?>" method="post">
          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">No. Akad</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="no_akad" value="">
            </div>

          </div>
          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">Id. KoSPE</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="id_kospe" value="">
            </div>
            <label for="1" class="col-sm-1 col-form-label">Nama</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="nama" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">Telp/HP</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="tlp" value="">
            </div>
            <label for="1" class="col-sm-1 col-form-label">Email</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="email" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">Tgl. Mulai</label>
            <div class="col-sm-4">
              <div class="input-group ">
                <input type="text" class="form-control" readonly name="tgl_start" value="">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>
            <label for="1" class="col-sm-2 col-form-label">Tgl. Berakhir</label>
            <div class="col-sm-4">
              <div class="input-group ">
                <input type="text" name="tgl_end" readonly class="form-control" value="">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">Akad</label>
            <div class="col-sm-4">
              <input class="form-control" name="akad">
            </div>
            <label for="1" class="col-sm-1 col-form-label">Tujuan</label>
            <div class="col-sm-5">
              <input name="tujuan" class="form-control">
            </div>

          </div>
          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">Dropping</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="dropping">
            </div>
            <label for="1" class="col-sm-2 col-form-label">Angsuran</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="angsuran"">
            </div>
          </div>
          <div class=" form-group row">
              <label for="1" class="col-sm-2 col-form-label">Tenor</label>
              <div class="col-sm-4">
                <input class="form-control" id="2" name="tenor">
              </div>
              <label for="1" class="col-sm-2 col-form-label">Harga Jual</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="jual" value="">
              </div>
            </div>
            <div class="form-group row">
              <label for="1" class="col-sm-2 col-form-label">DP</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="dp" value="">
              </div>

            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>