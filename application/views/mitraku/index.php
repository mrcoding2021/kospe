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
                    <h6 class="m-0 font-weight-bold text-primary">Data Agen Mitraku </h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="mitraku" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Tgl. Daftar</th>
                                    <th>Id. Mitraku</th>
                                    <th>Nama</th>
                                    <th>Jml. Mitra</th>
                                    <th>Jml. Simpanan</th>
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

<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">�</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" width="100%" cellspacing="0">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>Tgl. Daftar</th>
                                <th>Id. Mitraku</th>
                                <th>Nama Mitra</th>
                                <th>No. HP</th>
                                <th>Jml. Simpanan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="mitraCabang">

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).on('click', '.detail', function() {
        $.ajax({
            url: '<?= base_url('mitraku/detail') ?>',
            data: {
                'id_user': $(this).data('id')
            },
            dataType: 'json',
            type: 'post',
            success: function(res) {
                var html = ''
                $.each(res, function(i, v) {
                    html += '<tr><td>' + v.date_created + '</td><td>' + v.id_agen + '</td><td>' + v.nama + '</td><td>' + v.hp + '</td><td>' + v.jml_simpanan + '</td><td><a href="#" class="badge badge-primary" data-id="' + v.id_agen + '">Mutasi</a></td></tr>'
                })
                $('#mitraCabang').html(html)
            }
        })
    })

    getAnggota()

    function getAnggota() {
        $('#mitraku').DataTable({
            "ajax": {
                "url": "<?= base_url('mitraku/cabang') ?>",
                "dataSrc": ""
            },
            "destroy": true,
            "columns": [{
                    "data": "date_created"
                },
                {
                    "data": "id_agen"
                },
                {
                    "data": "nama"
                },
                {
                    "data": "jml_agen"
                },
                {
                    "data": "jml_simpanan"
                },
                {
                    "data": "id_user",
                    "mRender": function(data) {
                        return '<a data-toggle="modal" class="detail badge badge-primary mr-1" data-id="' + data + '" href="#detail">Detail</a>';
                    }
                }
            ]
        });

    }
</script>