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
                    <h6 class="m-0 font-weight-bold text-primary">Menus </h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myMenu" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama Menu</th>
                                    <th>Gambar</th>
                                    <th>Background</th>
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
<!-- End of Main Content -->
<div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Menu Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('setting/add') ?>" method="post" id="add">
                    <div class="form-group row">
                        <label for="1" class="col-sm-2 col-form-label">Nama Menu</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control nama" name="nama">
                            <input type="hidden" class="form-control id_paket" name="id_paket">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="2" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea name="isi" class="form-control ket" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="5" class="col-sm-2 col-form-label">Akad</label>
                        <div class="col-sm-10">
                            <textarea name="akad" class="form-control akad" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="2" class="col-sm-2 col-form-label">Ketentuan</label>
                        <div class="col-sm-10">
                            <textarea name="ketentuan" class="form-control ketentuan" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function(e) {
        myMenu()

        function myMenu() {
            var myMenu = $('#myMenu').DataTable({
                'ajax': {
                    "type": "GET",
                    "url": '<?= base_url('setting/getAllMenu/') ?>',
                    "dataSrc": ""
                },
                "destroy": true,
                "pageLength": 20,
                'columns': [{
                        "data": "nama"
                    },
                    {
                        "data": "img",
                        "mRender": function(data) {
                            return '<img width="100" src="<?= base_url('asset/img/produk/') ?>' + data + '">'
                        }
                    },
                    {
                        "data": "img_big",
                        "mRender": function(data) {
                            return '<img height="100" src="<?= base_url('asset/img/post/') ?>' + data + '">'
                        }
                    },
                    {
                        "data": "id_paket",
                        "mRender": function(data) {
                            return '<a class="detailMenu btn-sm btn btn-success mr-1" href="#addMenu" data-id="' + data + '">Detail</a><a class="delete btn-sm btn btn-danger mr-1"  href="#">Delete</a>';
                        }
                    }

                ]
            });
        }

        $(document).on('click', '.detailMenu', function(e) {
            var id = $(this).data('id')
            e.preventDefault()
            $('.modal-title').html('Ubah Detail Menu')
            $('#addMenu').modal('show')
            $.ajax({
                url: '<?= base_url('setting/getAllMenu/') ?>',
                data: {
                    'id': id
                },
                dataType: 'json',
                type: 'post',
                success: function(res) {
                    $('.id_paket').val(res.id_paket)
                    $('.nama').val(res.nama)
                    $('.ket').val(res.isi)
                    $('.akad').val(res.akad)
                    $('.ketentuan').val(res.ketentuan)
                }
            })
        })

        $('#add').submit(function(e) {
            e.preventDefault()
            Swal.fire({
                title: 'Yakin?',
                text: "Pastikan data sudah benar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: $(this).attr('action'),
                        data: $(this).serialize(),
                        type: 'post',
                        dataType: 'json',
                        success: function(res) {
                            if (res.sukses) {
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: `${res.sukses}`,
                                    icon: 'success',
                                    confirmButtonText: 'Yes!'
                                })
                                $('.modal').modal('hide')
                                myMenu()
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: `${res.errror}`,
                                    icon: 'error',
                                    confirmButtonText: 'Yes!'
                                })
                            }
                        }
                    })
                }
            })
        })

    })
</script>