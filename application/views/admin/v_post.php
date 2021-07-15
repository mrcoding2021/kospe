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
                    <h6 class="m-0 font-weight-bold text-primary">Post
                        <a href="<?= base_url('post/addPost') ?>" class="btn btn-primary btn-sm text-right">Tambah Post</a>
                        <a href="#addKategori" class="btn btn-sm btn-success text-right" data-toggle="modal">Tambah Kategori</a>
                    </h6>


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Date</th>
                                    <th>Isi</th>
                                    <th>Img</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($post as $key) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>
                                            <?= $key['judul'] ?>
                                            <span class="badge badge-info">
                                                <?php $categ = $this->db->get_where('tb_kategori', array('id_kategori' => $key['kategori']))->row_array();
                                                echo $categ['nama'] ?></span>
                                        </td>
                                        <td>
                                            <?= $key['date'] ?>
                                        </td>

                                        <td>
                                            <?php echo substr(html_entity_decode($key['isi']), 0, 200) ?>
                                        </td>
                                        <td><img src="<?= base_url() ?>asset/img/post/<?= $key['img'] ?>" alt="" width="100px">

                                        </td>
                                        <td>
                                            
                                            <a href="<?= base_url('post/editPost/') . $key['id_post'] ?>/0" class="badge badge-primary">Edit
                                            </a>
                                            <a href="<?= base_url('post/delete/') . $key['id_post'] ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini ?')">Delete
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
<div class="modal fade" id="addKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori Baru</h5>

                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('post/addKategori') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="1" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-6">
                            <?php $categ = $this->db->get('tb_kategori')->result_array(); ?>
                            <input type="text" class="form-control" id="1" name="nama">
                        </div>
                        <div class="col-sm-4">
                            <select name="kateogri" id="2" class="form-control">
                                <option value="1">Internasional</option>
                                <option value="2">Domestik</option>
                            </select>

                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="myTabel" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $no = 1;
                                    foreach ($categ as $key) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>
                                                <?= $key['nama'] ?>
                                            </td>
                                            <td>
                                                <?php if ($key['kategori'] == 1) : ?>
                                                    <span>Internasional</span>
                                                <?php else : ?>
                                                    <span>Domestik</span>
                                                <?php endif ?>
                                            </td>


                                            <td>

                                               
                                                <a href="<?= base_url('post/deleteKategori/') . $key['id_kategori'] ?>" class="badge badge-danger" onclick="return confirm('Yakin ingin menghapus data ini ?')">Delete
                                                </a><br>
                                            </td>

                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
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
<?php foreach ($post as $key) : ?>
    <div class="modal fade" id="editPost<?php echo $key['id_post'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('post/editPost/') . $key['id_post'] ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="1" class="col-sm-2 col-form-label">Judul Post</label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="1" name="id_menu" value="<?php echo $key['id_post'] ?>">
                                <input type="text" class="form-control" id="1" name="nama" value="<?php echo $key['judul'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="2" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="2" name="date" value="<?php echo $key['date'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="1" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="2" name="kategori">
                                    <option readonly>Pilih</option>
                                    <?php $kat = $this->db->get('tb_kategori')->result();
                                    foreach ($kat as $data) : ?>
                                        <option value="<?= $data->id_kategori ?>"><?= $data->nama ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ckeditr" class="col-sm-2 col-form-label">Isi</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="ckeditor" id="ckeditor" name="isi" rows="3"><?php echo $key['isi'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="5" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-3">
                                <img src="<?= base_url() ?>asset/assets/images/blog/<?= $key['img'] ?>" alt="" width="100%">
                            </div>
                            <div class="col-sm-7">
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
<?php endforeach ?>