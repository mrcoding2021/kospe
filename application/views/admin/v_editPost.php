<div class="container-fluid">

    <div class="row">

        <div class="col-lg">

            <?= $this->session->flashdata('alert');

            ?>

            <div class="card shadow mb-4">

                <div class="card-header py-3">

                    <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>

                </div>

                <div class="card-body">

                    <form action="<?= base_url('post/editPost/') . $key['id_post'] ?>/1" method="post" enctype="multipart/form-data">

                        <div class="form-group row">

                            <label for="1" class="col-sm-1 col-form-label">Judul Post</label>

                            <div class="col-sm-8">



                                <input type="text" class="form-control" id="1" name="nama" value="<?php echo $key['judul'] ?>">

                            </div>

                            <label for="2" class="col-sm-1 col-form-label">Tanggal</label>

                            <div class="col-sm-2">

                                <input type="text" readonly class="form-control" id="2" name="date" value="<?php echo longdate_indo($key['date']) ?>">

                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="1" class="col-sm-1 col-form-label">Kategori</label>

                            <div class="col-sm-5">

                                <select class="form-control" id="2" name="kategori">

                                    <option readonly>Pilih</option>

                                    <?php $kat = $this->db->get('tb_kategori')->result();

                                    foreach ($kat as $data) :

                                        if ($key['kategori'] == $data->id_kategori) : ?>

                                            <option selected value="<?= $data->id_kategori ?>"><?= $data->nama ?></option>

                                        <?php else : ?>

                                            <option value="<?= $data->id_kategori ?>"><?= $data->nama ?></option>

                                        <?php endif ?>

                                    <?php endforeach ?>

                                </select>

                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="ckeditr" class="col-sm-1 col-form-label">Isi</label>

                            <div class="col-sm-11">

                                <textarea type="text" class="form-control" name="isi" rows="15"><?php echo $key['isi'] ?></textarea>

                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="5" class="col-sm-1 col-form-label">Gambar</label>

                            <div class="col-sm-3">

                                <img src="<?= base_url() ?>asset/img/post/<?= $key['img'] ?>" alt="" width="100%">

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
                        <div class="form-group row">

                            <label for="5" class="col-sm-1 col-form-label">Gambar Isi</label>
                            <div class="col-sm-11">
                                <div class="row">
                                    <?php $foto = $this->db->get_where('tb_media', array('id_post' => $key['id_post']))->result();
                                    foreach ($foto as $f) : ?>
                                        <div class="col-md-3">
                                            <a href="#">
                                                <span class="hapus-foto" data-id="<?= $f->id_media ?>" style="position: absolute; right: 0; top:0; background-color: white; color: red; font-size: 20px; padding: 2px 5px 2px 5px; margin-right:5px; margin-top:5px; border-radius: 5px 5px; ">x</span>
                                            </a>
                                            <img src="<?= base_url() ?>asset/img/post/<?= $f->img ?>" alt="" width="100%">
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <label for="5" class="col-sm-1 col-form-label"> -</label>
                            <div class="col-sm-3 pt-1">

                                <div class="input-group mb-0">

                                    <div class="input-group-prepend">

                                        <span class="input-group-text">Upload</span>

                                    </div>

                                    <div class="custom-file">

                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="foto">
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

</div>