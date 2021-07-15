  <!-- Content Wrapper. Contains page content -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-12">
        <!-- small box -->
        <div class="small-box bg-white shadow p-3">
          <div class="text-center">
            <img src="https://pluspng.com/img-png/png-user-icon-circled-user-icon-2240.png" alt="" width="100" class="pb-2">
            <h4><?= strtoupper($this->session->userdata('user')); ?></h4>
            <h6>ID. KoSPE <?= $this->session->userdata('id') ?> </h6>
            <a href="#editPassword" data-toggle="modal" class="btn btn-sm btn-info">Edit Password</a>
          </div>
        </div>

      </div>
      <!-- ./col -->
      <div class="col-lg-9 col-12 ">
        <!-- small box -->
        <div class="small-box bg-white shadow p-3">
          <form action="<?= base_url('mitraku/add') ?>" method="post" class="tambahMitra">
            <div class="form-group row">
              <label for="1" class="col-sm-2 col-form-label">Nama Akun</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control" name="nama" value="<?= $user['nama'] ?>">
              </div>
            </div>

            <div class=" form-group row">
              <label for="1" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control" name="parent" value="<?= $user['email'] ?>">
              </div>

            </div>
            <div class="form-group row">
              <label for="3" class="col-sm-2 col-form-label">No. HP</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control" name="hp" value="<?= $user['hp'] ?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="4" class="col-sm-2 col-form-label">Alamat</label>
              <div class="col-sm-10">
                <textarea type="text" readonly class="form-control" name="alamat"><?= $user['alamat'] ?></textarea>
              </div>
            </div>

          </form>
        </div>
      </div>

    </div>


  </div>
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="editPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title" id="exampleModalLabel">Rubah Password</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('user/editPassword') ?>" method="post" id="editPwd">
            <div class="form-group row">
              <label for="1" class="col-sm-4 col-form-label">Password Lama </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="pwd">
              </div>
            </div>
            <div class="form-group row">
              <label for="1" class="col-sm-4 col-form-label">Password Baru </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="pwd1">
              </div>
            </div>
            <div class="form-group row">
              <label for="1" class="col-sm-4 col-form-label">Konfirmasi </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="pwd2">
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

