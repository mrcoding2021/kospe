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
          <h6 class="m-0 font-weight-bold text-primary">Daftar Pembiayaan</h6>

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
                  <th>Jenis Pembiayaan</th>
                  <th>Jumlah Pengajuan</th>
                  <th>Agunan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($pembiayaan as $key) : ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= longdate_indo($key->created_at) ?></td>
                    <td><?= $key->id_pengajuan . '.' . str_replace('/', '', substr(shortdate_indo($key->created_at), 3)) ?></td>
                    <td><?= $key->nama ?></td>
                    <td><?= $key->tujuan ?></td>
                    <td><?= rupiah($key->jumlah_dimohon) ?></td>
                    <td><?= $key->agunan ?></td>
                    <td>
                      <?php if ($key->status_proses == 0) : ?>
                        <a href="<?= base_url('pembiayaan/status/') . $key->id_pengajuan . '/0' ?>" class="badge badge-danger">Belum Diproses</a>
                      <?php else : ?>
                        <a href="<?= base_url('pembiayaan/status/') . $key->id_pengajuan . '/1' ?>" class="badge badge-success">Sudah Diproses</a>
                      <?php endif ?>
                    </td>
                    <td>
                      <a href="#view<?= $key->id_pengajuan ?>" class="badge badge-success" data-toggle="modal">Lihat</a>
                      <a href="<?= base_url('pembiayaan/berkas/') . $key->hp ?>" class="badge badge-info">Berkas</a>
                      <?php if ($key->kode_sandi == 2) : ?>
                        <a href="<?= base_url('pdf/cetakHNI/') . $key->id_pengajuan ?>" class="badge badge-primary">Cetak PDF</a>
                      <?php else : ?>
                        <a href="<?= base_url('pdf/cetakPDF/') . $key->id_pengajuan ?>" class="badge badge-primary">Cetak PDF</a>
                      <?php endif ?>
                      <a href="<?= base_url('pembiayaan/delete/') . $key->id_pengajuan ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini ?')">Delete
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Post Baru</h5>

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

<?php foreach ($pembiayaan as $key) : ?>
  <div class="modal fade" id="view<?php echo $key->id_pengajuan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success text-light">
          <h5 class="modal-title" id="exampleModalLabel">Lihat Data</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home<?php echo $key->id_pengajuan ?>" role="tab" aria-controls="home" aria-selected="true">Data Pribadi</a>
            </li>
            <?php if ($key->kode_sandi == 2) : ?>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile<?php echo $key->id_pengajuan ?>" role="tab" aria-controls="profile" aria-selected="false">Keagenan HNI</a>
              </li>
            <?php else : ?>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile<?php echo $key->id_pengajuan ?>" role="tab" aria-controls="profile" aria-selected="false">Data Pekerjaan</a>
              </li>
            <?php endif ?>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact<?php echo $key->id_pengajuan ?>" role="tab" aria-controls="contact" aria-selected="false">Data Suami/Istri</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="home-tab1" data-toggle="tab" href="#home1<?php echo $key->id_pengajuan ?>" role="tab" aria-controls="home" aria-selected="true">Data Penghasilan (Perbulan)</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab1" data-toggle="tab" href="#profile1<?php echo $key->id_pengajuan ?>" role="tab" aria-controls="profile" aria-selected="false">Detail Pembiayaan</a>
            </li>

          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home<?php echo $key->id_pengajuan ?>" role="tabpanel" aria-labelledby="home-tab">
              <div class="row">
                <div class="col-lg-6">
                  <table>
                    <tr>
                      <td class="q">Id. KoSPE</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->id_kospe ?></td>
                    </tr>
                    <tr>
                      <td class="q">Jenis Pembiayaan</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->jns_biaya ?></td>
                    </tr>
                    <tr>
                      <td class="q">Pengajuan</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->pengajuan ?></td>
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
                      <td class="a"><?= $key->alamat_ktp ?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-lg-6">
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
                      <td class="q">Alamat Domisili</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->domisili ?></td>
                    </tr>
                    <tr>
                      <td class="q">Lama Tinggal</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->lama_tinggal ?> tahun</td>
                    </tr>
                    <tr>
                      <td class="q">Status Rumah</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->status_rmh ?></td>
                    </tr>
                    <tr>
                      <td class="q">Status Perkawinan</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->status_kawin ?></td>
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

                  </table>
                </div>
              </div>
            </div>
            <?php if ($key->kode_sandi == 2) : ?>
              <div class="tab-pane fade" id="profile<?php echo $key->id_pengajuan ?>" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                  <div class="col-lg-6">
                    <table>
                      <tr>
                        <td class="q">ID. HNI</td>
                        <td class="n">:</td>
                        <td class="a"><?= $key->id_hni ?></td>
                      </tr>
                      <tr>
                        <td class="q">Pangkat HNI</td>
                        <td class="n">:</td>
                        <td class="a"><?= $key->pangkat_agen ?> </td>
                      </tr>
                      <tr>
                        <td class="q">Status Agen Stok</td>
                        <td class="n">:</td>
                        <td class="a"><?= $key->status_agen ?></td>
                      </tr>

                    </table>
                  </div>
                  <div class="col-lg-6">
                    <table>
                      <tr>
                        <td class="q">ID LED Upline</td>
                        <td class="n">:</td>
                        <td class="a"><?= $key->id_led ?></td>
                      </tr>
                      <tr>
                        <td class="q">Nama LED Upline</td>
                        <td class="n">:</td>
                        <td class="a"><?= $key->nama_led ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            <?php else : ?>
              <div class="tab-pane fade" id="profile<?php echo $key->id_pengajuan ?>" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                  <div class="col-lg-6">
                    <table>
                      <tr>
                        <td class="q">Nama Perusahaan</td>
                        <td class="n">:</td>
                        <td class="a"><?= $key->pt ?></td>
                      </tr>
                      <tr>
                        <td class="q">Lama Bekerja</td>
                        <td class="n">:</td>
                        <td class="a"><?= $key->lama_bekerja ?> tahun</td>
                      </tr>
                      <tr>
                        <td class="q">Bagian / divisi</td>
                        <td class="n">:</td>
                        <td class="a"><?= $key->divisi ?></td>
                      </tr>
                      <tr>
                        <td class="q">Nama Atasan Langsung</td>
                        <td class="n">:</td>
                        <td class="a"><?= $key->atasan ?></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-6">
                    <table>
                      <tr>
                        <td class="q">Alamat Perusahaan</td>
                        <td class="n">:</td>
                        <td class="a"><?= $key->alaamat_pt ?></td>
                      </tr>
                      <tr>
                        <td class="q">Tlp. Perusahaan</td>
                        <td class="n">:</td>
                        <td class="a"><?= $key->tlp_pt ?></td>
                      </tr>
                      <tr>
                        <td class="q">Ext.</td>
                        <td class="n">:</td>
                        <td class="a"><?= $key->ext_pt ?></td>
                      </tr>
                      <tr>
                        <td class="q">Pangkat HNI</td>
                        <td class="n">:</td>
                        <td class="a"><?= $key->hni ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            <?php endif ?>
            <div class="tab-pane fade" id="contact<?php echo $key->id_pengajuan ?>" role="tabpanel" aria-labelledby="contact-tab">
              <div class="row">
                <div class="col-lg-6">
                  <table>
                    <tr>
                      <td class="q">Nama Istri / Suami</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->nama_istri ?></td>
                    </tr>
                    <tr>
                      <td class="q">Pekerjaan</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->pekerjaan ?></td>
                    </tr>
                    <tr>
                      <td class="q">Nama Perusahaan</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->pt_istri ?></td>
                    </tr>
                    <tr>
                      <td class="q">Divisi</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->divisi_istri ?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-lg-6">
                  <table>
                    <tr>
                      <td class="q">Lama Bekerja</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->lama_bekerja_istri ?> tahun</td>
                    </tr>
                    <tr>
                      <td class="q">Tlp. Istri</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->tlp_istri ?></td>
                    </tr>
                    <tr>
                      <td class="q">Ext</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->ext_istri ?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="home1<?php echo $key->id_pengajuan ?>" role="tabpanel" aria-labelledby="home-tab1">
              <div class="row">
                <div class="col-lg-6">
                  <table>
                    <tr>
                      <td class="q">Penghasilan</td>
                      <td class="n">:</td>
                      <td class="a"><?= rupiah($key->penghasilan) ?></td>
                    </tr>
                    <tr>
                      <td class="q">Penghasilan Tambahan</td>
                      <td class="n">:</td>
                      <td class="a"><?= rupiah($key->pengahasilan_add) ?></td>
                    </tr>
                    <tr>
                      <td class="q">Keteerangna Usaha</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->ket_usaha ?></td>
                    </tr>
                    <tr>
                      <td class="q">Penghasilan Istri</td>
                      <td class="n">:</td>
                      <td class="a"><?= rupiah($key->penghasilan_istri) ?></td>
                    </tr>
                    <tr>
                      <td class="q">Total Penghasilan</td>
                      <td class="n">:</td>
                      <td class="a"><?= rupiah($key->total_penghasilan) ?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-lg-6">
                  <table>
                    <tr>
                      <td class="q">Jumlah Tanggungan</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->family ?> orang</td>
                    </tr>
                    <tr>
                      <td class="q">Pengeluaran Rutin /bulan</td>
                      <td class="n">:</td>
                      <td class="a"><?= rupiah($key->out_rutin) ?></td>
                    </tr>
                    <tr>
                      <td class="q">Kewajiban Tempat Lain</td>
                      <td class="n">:</td>
                      <td class="a"><?= rupiah($key->hutang) ?></td>
                    </tr>
                    <tr>
                      <td class="q">Sisa Pendapatan</td>
                      <td class="n">:</td>
                      <td class="a"><?= rupiah($key->sisa) ?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="profile1<?php echo $key->id_pengajuan ?>" role="tabpanel" aria-labelledby="profile-tab1">
              <div class="row">
                <div class="col-lg-6">
                  <table>
                    <tr>
                      <td class="q">Jumlah Dimohon</td>
                      <td class="n">:</td>
                      <td class="a"><?= rupiah($key->jumlah_dimohon) ?></td>
                    </tr>
                    <tr>
                      <td class="q">Lama Pembiayaan</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->tenor ?> bulan</td>
                    </tr>
                    <tr>
                      <td class="q">Kesanggupan membayar</td>
                      <td class="n">:</td>
                      <td class="a"><?= rupiah($key->bayar_perbulan) ?></td>
                    </tr>
                  </table>
                </div>
                <div class="col-lg-6">
                  <table>
                    <tr>
                      <td class="q">Tujuan pembiayaan</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->tujuan ?></td>
                    </tr>
                    <tr>
                      <td class="q">DP</td>
                      <td class="n">:</td>
                      <td class="a"><?= rupiah($key->dp) ?></td>
                    </tr>
                    <tr>
                      <td class="q">Jaminan</td>
                      <td class="n">:</td>
                      <td class="a"><?= $key->agunan ?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
<?php endforeach ?>