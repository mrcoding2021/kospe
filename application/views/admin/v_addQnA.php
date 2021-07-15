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

                    <form action="<?= base_url($linkForm) ?>" method="post" enctype="multipart/form-data">

                        <div class="form-group row">

                            <label for="1" class="col-sm-1 col-form-label">Judul</label>

                            <div class="col-sm-11">

                                <input type="text" value="<?= $detail['judul'] ?>" class="form-control" id="1" name="nama">

                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="1" class="col-sm-1 col-form-label">Kategori</label>

                            <div class="col-sm-5">

                                <select class="form-control" id="2" name="kategori">

                                    <option readonly>Pilih</option>

                                    <?php
                                    $this->db->where('parent', 0);
                                    $kat = $this->db->get('tb_qa')->result();

                                    foreach ($kat as $data) : ?>
                                        <?php if ($data->id == $detail['parent']) { ?>
                                            <option selected value="<?= $data->id ?>"><?= $data->judul ?></option>
                                        <?php } else {  ?>
                                            <option value="<?= $data->id ?>"><?= $data->judul ?></option>
                                        <?php } ?>
                                    <?php endforeach ?>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="ckeditr" class="col-sm-1 col-form-label">Isi</label>

                            <div class="col-sm-11">

                                <textarea type="text" class="form-control" name="isi" rows="7"><?= $detail['isi'] ?></textarea>

                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="5" class="col-sm-2 col-form-label">Gambar Depan</label>

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
                            <button type="submit" class="btn btn-primary">Tambah</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

</script>