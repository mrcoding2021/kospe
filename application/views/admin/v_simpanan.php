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
          <h6 class="m-0 font-weight-bold text-primary">Daftar Pembiayaan
            <a href="<?= base_url('post/addPost') ?>" class="btn btn-primary btn-sm text-right ml-3">Tambah Data</a>
          </h6>


        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tgl Pengajuan</th>
                  <th>Id. Pengajuan</th>
                  <th>Nama Pemohon</th>
                  <th>Program</th>
                  <th>Telp</th>
                  <th>Email</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($simpanan as $key) : ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= longdate_indo($key->created_at) ?></td>
                    <td><?= $key->id_simpanan . '.' . str_replace('/', '', substr(shortdate_indo($key->created_at), 3)) ?></td>
                    <td><?= $key->nama ?></td>
                    <td><?= $key->program ?></td>
                    <td><?= $key->hp ?></td>
                    <td><?= $key->email ?></td>

                    <td>
                      <a href="#view<?= $key->id_simpanan ?>" class="badge badge-success" data-toggle="modal">Lihat</a>
                      <a href="<?= base_url('pdf/cetakSimpanan/') . $key->id_simpanan ?>" class="badge badge-primary">Cetak PDF</a>
                      <a href="<?= base_url('pembiayaan/del/') . $key->id_simpanan ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini ?')">Delete
                      </a><br>
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
<style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td,
  th {
    text-align: left;
    padding: 8px;
  }

  .q {
    width: 30%;
    border-bottom: .5px black solid;
    border-top: .5px black solid;
    border-color: #cccccc;
  }

  .n {
    width: 3%;
    border-bottom: .5px black solid;
    border-top: .5px black solid;
    border-color: #cccccc;
  }

  .a {
    border-bottom: .5px black solid;
    border-top: .5px black solid;
    border-color: #cccccc;
  }
</style>
<!-- End of Main Content -->
<div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Simpanan</h5>

        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('post/addPost') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">Judul Post</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="1" name="nama">
            </div>
          </div>
          <div class="form-group row">
            <label for="1" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
              <select class="form-control" id="2" name="kategori">
                <option readonly>Pilih</option>
                <?php $kat = $this->db->get('tb_kategori')->result();
                foreach ($kat as $key) : ?>
                  <option value="<?= $key->id_kategori ?>"><?= $key->nama ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>


          <div class="form-group row">
            <label for="4" class="col-sm-2 col-form-label">Isi</label>
            <div class="col-sm-10">
              <textarea type="text" class="form-control ckeditor" id="ckeditor" name="isi" rows="10"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="5" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-10">
              <div class="input-group mb-0">
                <div class="input-group-prepend">
                  <span class="input-group-text">Upload</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="inputGroupFile01" name="img">
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<?php foreach ($simpanan as $key) : ?>
  <div class="modal fade" id="view<?php echo $key->id_simpanan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success text-light">
          <h5 class="modal-title" id="exampleModalLabel">Lihat Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">

            <div class="col-lg-6">
              <table>
                <tr>
                  <td class="q">Program</td>
                  <td class="n">:</td>
                  <td class="a"><?= strtoupper($key->program) ?></td>
                </tr>
                <tr>
                  <td class="q">Nama Lengkap</td>
                  <td class="n">:</td>
                  <td class="a"><?= strtoupper($key->nama) ?></td>
                </tr>
                <tr>
                  <td class="q">Tempat, tgl lahir</td>
                  <td class="n">:</td>
                  <td class="a"><?= strtoupper($key->ttl) ?></td>
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
                  <td class="a"><?= strtoupper($key->alamat_ktp) ?></td>
                </tr>
              </table>
            </div>
            <div class="col-lg-6">
              <table>
                <tr>
                  <td class="q">Alamat Domisili</td>
                  <td class="n">:</td>
                  <td class="a"><?= strtoupper($key->domisili) ?></td>
                </tr>
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
                  <td class="a"><?= strtoupper($key->email) ?></td>
                </tr>
                <tr>
                  <td class="q">Agama</td>
                  <td class="n">:</td>
                  <td class="a"><?= strtoupper($key->agama) ?></td>
                </tr>
                <tr>
                  <td class="q">Nama Ibu Kandung</td>
                  <td class="n">:</td>
                  <td class="a"><?= strtoupper($key->ibu) ?></td>
                </tr>
                <tr>
                  <td class="q">Nama Ahli Waris 1</td>
                  <td class="n">:</td>
                  <td class="a"><?= strtoupper($key->waris) ?></td>
                </tr>
                <tr>
                  <td class="q">Nama Ahli Waris 2</td>
                  <td class="n">:</td>
                  <td class="a"><?= strtoupper($key->waris2) ?></td>
                </tr>
              </table>
            </div>
          </div>


        </div>

      </div>
    </div>
  </div>
<?php endforeach ?>