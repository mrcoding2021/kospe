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
                    <h6 class="m-0 font-weight-bold text-primary">Menus <a href="#addAgen" class="add btn btn-primary text-right" data-toggle="modal">Tambah <?= $title ?></a></h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Agen</th>
                                    <th>No. HP</th>
                                    <th>Jumlah Agen</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($agen as $key) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $key->nama ?></td>
                                        <td><?= $key->no_hp ?></td>
                                        <td>100</td>
                                        <?php if ($key->status == 0) { ?>
                                            <td><span class="badge badge-info">Tidak Aktif</span></td>
                                        <?php } else { ?>
                                            <td><span class="badge badge-success">Aktif</span></td>
                                        <?php } ?>
                                        <td><a href="#addAgen" data-id="<?= $key->id ?>" class="detailAgen btn btn-primary btn-sm" data-toggle="modal">Edit</a></td>
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
<div class="modal fade" id="addAgen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title ?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('agen/add') ?>" method="post" class="tambahAgen">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ID. KoSPE</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="id_kospe">
                        </div>
                        <label class="col-sm-2 col-form-label">Nama Agen</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="nama">
                            <input type="hidden" class="form-control" name="id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" name="alamat"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No. HP</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="no_hp">
                        </div>
                        <label class="col-sm-2 col-form-label">ID. HNI</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="id_hni">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No. KTP</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="no_ktp">
                        </div>
                        <label for="4" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Sponsor</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="parent">
                        </div>
                        <div class="col-sm-5">
                            <input type="text" readonly class="form-control" name="parent_name">
                        </div>
                        <label class="col-sm-1 col-form-label">Target</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="target">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" name="ket"></textarea>
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

<script>
    $('.tambahAgen').submit(function(e) {
        e.preventDefault()
        Swal.fire({
            title: 'Yakin ingin disimpan?',
            text: "Pastikan data Anda telah benar dan lengkap!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, simpan sekarang!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: 'json',
                    type: 'post',
                    success: function(res) {
                        if (res.response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Selamat Datang!',
                                showConfirmButton: false,
                                timer: 1500
                            }).then((result) => {
                                $('.modal').modal('hide')
                                window.location.href = res.url
                            })
                        } else {
                            $('.modal').modal('hide')
                            Swal.fire(
                                'Error', 'Data gagal disimpan', 'error'
                            )
                        }
                    }
                })
            }
        })
    })

    $('.detailAgen').click(function(e) {
        var id = $(this).data('id')
        $.ajax({
            url: '<?= base_url('agen/detail/') ?>' + id,
            data: $(this).serialize(),
            dataType: 'json',
            type: 'post',
            success: function(res) {
                $('.modal-title').text('Edit Data Agen')
                $('input[name="id_kospe"]').val(res.id_kospe)
                $('input[name="nama"]').val(res.nama)
                $('input[name="id"]').val(res.id)
                $('textarea[name="alamat"]').val(res.alamat)
                $('input[name="no_hp"]').val(res.no_hp)
                $('input[name="no_ktp"]').val(res.no_ktp)
                $('input[name="id_hni"]').val(res.id_hni)
                $('input[name="email"]').val(res.email)
                $('input[name="parent"]').val(res.parent)
                $('input[name="parent_name"]').val(res.parent_name)
                $('input[name="target"]').val(res.target)
                $('textarea[name="ket"]').val(res.ket)
            }
        })
    })

    $('.add').click(function(e) {
        $('.form-control').val('')
        $('.modal-title').text('Tambah Agen Baru')
    })
</script>