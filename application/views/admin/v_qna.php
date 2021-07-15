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
                    <h6 class="m-0 font-weight-bold text-primary">
                        <a href="<?= base_url('qna/add') ?>" class="btn btn-primary btn-sm text-right">Tambah Data</a>
                        <a href="#addKategori" class="btn btn-sm btn-success text-right" data-toggle="modal">Tambah Kategori</a>
                    </h6>


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tableQnA" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tema</th>
                                    <th>Judul</th>
                                    <th>Isi</th>
                                    <th>Img</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

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
<script>
    $(document).ready(function() {
        var mutasi = $('#tableQnA').DataTable({
            'ajax': {
                "type": "GET",
                "url": '<?= base_url('qna/getData/1') ?>',
                "dataSrc": ""
            },
            'columns': [{
                    "data": "no"
                },
                {
                    "data": "tema"
                },
                {
                    "data": "judul"
                },
                {
                    "data": "isi"
                },
                {
                    "data": "img"
                },
                {
                    "data": "img",
                    "fnCreatedCell": function(nTd, sData, oData, iRow, iCol) {
                        $(nTd).html("<a class='mr-1 detail btn btn-info btn-border-circle btn-sm' href='" + oData.base_url + "' data-id=" + oData.id + " >Edit</a>");
                    }
                }


            ]
        });
    })
</script>