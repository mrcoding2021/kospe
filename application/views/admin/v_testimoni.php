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
                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Hak Akses</th>
                                    <th>Link</th>
                                    <th>Icon</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($menu as $key) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><a href="#editMenu<?= $key['id_menu'] ?>" class="badge badge-primary tombolEdit" data-toggle="modal">Edit

                                            </a> <?= $key['nama'] ?>

                                        </td>

                                        <td>
                                            <?php if ($key['acces'] == 1) : ?>
                                                Admin
                                            <?php else : ?>
                                                Editor
                                            <?php endif ?>

                                        </td>
                                        <td><?= $key['attr_href'] ?></td>
                                        <td><i class="fas <?= $key['icon'] ?> "></i> <?= $key['icon'] ?></td>
                                        <td>
                                            <?php if ($key['is_active'] == 1) : ?>
                                                <a href="<?= base_url('menu/akses/') . $key['id_menu'] ?>" class="badge badge-success">Aktif</a> ;
                                            <?php else : ?>
                                                <a href="<?= base_url('menu/akses/') . $key['id_menu'] ?>" class="badge badge-danger">Tidak Aktif</a>;
                                            <?php endif ?>
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
