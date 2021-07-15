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
                    <h6 class="m-0 font-weight-bold text-primary">Data Transaksi Mitraku </h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="mitraku" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tgl. Transaksi</th>
                                    <th>Id. Mitraku</th>
                                    <th>Nama</th>
                                    <th>Mitraku</th>
                                    <th>Debit</th>
                                    <th>Kredit</th>
                                    <th>Saldo</th>
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
<script>
    $(document).on('click', '.approve', function(e) {
        e.preventDefault()
        var id = $(this).data('id')
        var v = $(this).data('v')
        var str = ''
        var s = ''
        
        if (v == 1) {
            str = "Anda yakin ingin dibatalkan ?"
            s = "Transaksi ini akan dibatalkan"
        } else {
            str = "Anda yakin ingin diapprove ?"
            s = "Transaksi ini akan diapprove"
        }

        Swal.fire({
            title: str,
            text: s,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes !'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('mitraku/approve/') ?>' + id,
                    dataType: 'json',
                    type: 'post',
                    success: function(res) {
                        if (res.sukses) {
                            Swal.fire({
                                    title: "Berhasil!",
                                    text: `${res.sukses}`,
                                    icon: "success",
                                })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        getAnggota()
                                    }
                                });
                        } else {
                            Swal.fire({
                                title: "Errors !",
                                text: `${res.error}`,
                                icon: "error",
                            });
                        }
                    }
                })
            }
        });
    })

    getAnggota()

    function getAnggota() {
        $('#mitraku').DataTable({
            "ajax": {
                "url": "<?= base_url('mitraku/allTransaksi') ?>",
                "dataSrc": ""
            },
            "destroy": true,
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "date_created"
                },
                {
                    "data": "id_agen"
                },
                {
                    "data": "nama"
                },
                {
                    "data": "parent"
                },
                {
                    "data": "debit"
                },
                {
                    "data": "kredit"
                },
                {
                    "data": "debit"
                },
                {
                    "data": "aksi"
                }
            ]
        });

    }
</script>