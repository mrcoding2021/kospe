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
                    <form class="form-horizontal pr-2" method="post" action="<?= base_url('program/jadi_donatur') ?>">
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="inputEmail3" placeholder="Nama Lengkap" name="nama">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Tempat, tanggal lahir</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="inputEmail3" placeholder="Tempat" name="tmpt">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="datepicker form-control" id="inputEmail3" placeholder="Tanggal" name="tgl">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Alamat Lengkap</label>
                            <div class="col-sm-9">
                                <textarea type="text" required class="form-control" id="inputEmail3" placeholder="Alamat Lengkap" name="alamat"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">No. Tlp / HP</label>
                            <div class="col-sm-9">
                                <input type="text" required name="tlp" class="form-control" id="inputEmail3" placeholder="No. Tlp / Hp">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" name="email" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">Program</label>
                            <div class="col-sm-9">
                                <select type="text" name="program" class="form-control" id="inputPassword3" placeholder="Password">
                                    <option value="Pilih Program">Pilih Program</option>
                                    <option value="Bakti Pendidikan">Bakti Pendidikan</option>
                                    <option value="Bakti Kesehatan">Bakti Kesehatan</option>
                                    <option value="Bakti Eonomi">Bakti Ekonomi</option>
                                    <option value="Bakti Peduli">Bakti Peduli</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Donasi per-bulan</label>
                            <div class="col-sm-6">
                                <input type="text" name="donasi" required class="form-control" id="inputEmail3" placeholder="Rp. 1.000.000,-">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" name="tgl_donasi" class="form-control" id="inputEmail3" placeholder="Setiap Tanggal">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Metode Donasi</label>
                            <div class="col-sm-9">
                                <select type="text" name="metode" class="form-control" id="inputPassword3" placeholder="Password">
                                    <option value="Pilih Program">Pilih Metode Donasi</option>
                                    <option value="1">Transfer</option>
                                    <option value="2">Datang ke kantor</option>
                                    <option value="3">Jemput Donasi</option>
                                </select>
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