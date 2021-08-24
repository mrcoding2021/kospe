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
                    <h6 class="m-0 font-weight-bold text-primary">Menus <a href="#addMenu" class="btn btn-primary text-right" data-toggle="modal">Tambah Menu</a></h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User Role</th>
                                    <th width="70%">Hak Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $user_menu =  $this->db->get('tb_user_menu')->result();

                                foreach ($user_menu as $key) { ?>
                                    <tr>
                                        <td><?= $key->id_user ?></td>
                                        <td><?= $key->menu ?></td>
                                        <td>
                                            <?php
                                            $this->db->where('role_id', $key->id_user);
                                            $menu_akses = $this->db->get('tb_menu_acces')->result();
                                            foreach ($menu_akses as $ma) {?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" checked type="checkbox" id="<?= $ma->menu_id . $key->menu ?>" value="1">
                                                    <label class="form-check-label" for="<?= $ma->menu_id . $key->menu ?>"><?= $key->menu ?></label>
                                                </div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
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
<div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Menu Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('menu/addMenu') ?>" method="post">
                    <div class="form-group row">
                        <label for="1" class="col-sm-2 col-form-label">Nama Menu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="1" name="nama">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="2" class="col-sm-2 col-form-label">Hak Akses</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="2" name="akses">
                                <option readonly>Pilih</option>
                                <?php
                                $user_level = $this->db->get('tb_user_menu')->result();
                                foreach ($user_level as $ul) { ?>
                                    <option value="<?= $ul->id ?>"><?= $ul->nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <?php
                    $menus = $this->db->get_where('tb_menu', array('dropdown' => 1, 'parent' => 0))->result_array();
                    ?>
                    <div class="form-group row">
                        <label for="5" class="col-sm-2 col-form-label">Parent Menu</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="2" name="parent">
                                <option readonly>Pilih</option>
                                <?php foreach ($menus as $key) : ?>
                                    <option value="<?= $key['id_menu'] ?>"><?= $key['nama'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="2" class="col-sm-2 col-form-label">Dropdown</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="2" name="dropdown">
                                <option readonly>Pilih</option>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="3" class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="3" name="icon">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="4" class="col-sm-2 col-form-label">Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="4" name="link">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Input</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>