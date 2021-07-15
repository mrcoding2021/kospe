<!-- Footer -->

<footer class="sticky-footer bg-white">

    <div class="container my-auto">

        <div class="copyright text-center my-auto">

            <span>KoPE &copy; KoSPE 2019</span>

        </div>

    </div>

</footer>

<!-- End of Footer -->



</div>

<!-- End of Content Wrapper -->



</div>

<!-- End of Page Wrapper -->



<!-- Scroll to Top Button-->

<a class="scroll-to-top rounded" href="#page-top">

    <i class="fas fa-angle-up"></i>

</a>



<!-- Logout Modal-->

<div class="modal fade" id="addSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Tambah Slider Baru</h5>

                <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">×</span>

                </button>

            </div>



            <div class="modal-body">

                <form action="<?= base_url('sider/addSlider') ?>" method="post">

                    <div class="form-group row">

                        <label for="1" class="col-sm-2 col-form-label">Nama Slider</label>

                        <div class="col-sm-10">

                            <input type="text" class="form-control" id="1" name="nama">

                        </div>

                    </div>

                    <div class="form-group row">

                        <label for="2" class="col-sm-2 col-form-label">Image</label>

                        <div class="col-sm-10">

                            <div class="input-group mb-0">

                                <div class="input-group-prepend">

                                    <span class="input-group-text">Upload</span>

                                </div>

                                <div class="custom-file">

                                    <input type="file" class="custom-file-input" id="upload">

                                    <label class="custom-file-label" for="upload" name="gambar">Choose file</label>

                                </div>

                            </div>>

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
<script src="<?= base_url() ?>asset/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>asset/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url() ?>asset/admin/js/sb-admin-2.min.js"></script>
<script src="<?= base_url() ?>asset/admin/js/demo/datatables-demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


<script>
    $(document).ready(function() {
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        // Grab data dari no_akad
        $('.btn-cari').click(function() {
            var no_akad = $('input[name=no_akad]').val()

            var dt = no_akad.replace(/\//g, '_')
            console.log(dt)
            $.ajax({
                url: '<?= base_url('collaction/orang') ?> ',
                type: 'post',
                dataType: 'json',
                data: {
                    'id_akad': no_akad
                },
                success: function(d) {
                    console.log(d)
                    $('.identitas').html(
                        '<label for="1" class="col-sm-1 col-form-label">Nama</label><div class = "col-sm-2"><input type = "text" class = "form-control" readonly name="nama" value="' + d.nama + '"></div><label for="1" class="col-sm-1 col-form-label">Pembiayaan</label><div class = "col-sm-2" ><input type = "text" readonly class = "form-control"  name = "date" value = "' + d.dropping + '"></div><label for="1" class="col-sm-1 col-form-label">Harga Jual</label><div class = "col-sm-2" ><input type = "text" readonly class = "form-control" name = "date" value = "' + d.jual + '"></div><label for="1" class="col-sm-1 col-form-label">Total Margin</label><div class = "col-sm-2" ><input type = "text" readonly class = "form-control" name = "date" value = "' + d.margin + '"></div><label for="1" class="col-sm-1 col-form-label">Tenor</label><div class = "col-sm-2"><input type = "text" class = "form-control" readonly name="nama" value="' + d.tenor + '"></div><label for="1" class="col-sm-1 col-form-label">Margin (%)</label><div class = "col-sm-2" ><input type = "text" readonly class = "form-control"  name = "date" value = "' + d.angsuran + '"></div><label for="1" class="col-sm-1 col-form-label">Agnsuran</label><div class = "col-sm-2" ><input type = "text" readonly class = "form-control" name = "date" value = "' + d.angsuran + '"></div><label for="1" class="col-sm-1 col-form-label">Jatuh Tempo</label><div class = "col-sm-2" ><input type = "text" readonly class = "form-control" name = "date" value = "' + d.tgl_angsur + '"></div>'
                    )
                }
            })

            if ($.fn.dataTable.isDataTable('#myTabel')) {
                $('#myTabel').DataTable().clear().destroy();
            }
            var mutasi = $('#myTabel').DataTable({
                'ajax': {
                    "type": "GET",
                    "url": '<?= base_url('collaction/view_mutasi/') ?>' + dt,
                    "dataSrc": ""
                },
                'columns': [{
                        "data": "no"
                    },
                    {
                        "data": "created_at"
                    },
                    {
                        "data": "reff"
                    },
                    {
                        "data": "ket"
                    },
                    {
                        "data": "pokok"
                    },
                    {
                        "data": "margin"
                    },
                    {
                        "data": "jumlah",
                    }

                ]
            });


        })

        $(document).on('click', '.detail', function() {
            var id = $(this).data('id')

            $.ajax({
                url: '<?= base_url('collaction/no_akad') ?>',
                type: 'POST',
                data: {
                    'no_akad': id
                },
                dataType: 'json',
                success: function(hasil) {
                    console.log(hasil.nama)
                    $('input[name=no_akad]').val(hasil.no_akad)
                    $('input[name=id_kospe]').val(hasil.id_kospe)
                    $('input[name=nama]').val(hasil.nama)
                    $('input[name=tlp]').val(hasil.tlp)
                    $('input[name=email]').val(hasil.email)
                    $('input[name=tgl_start]').val(hasil.tgl_start)
                    $('input[name=tgl_end]').val(hasil.tgl_end)
                    $('input[name=dropping]').val(hasil.dropping)
                    $('input[name=angsuran]').val(hasil.angsuran)
                    $('input[name=akad]').val(hasil.akad)
                    $('input[name=tujuan]').val(hasil.tujuan)
                    $('input[name=tenor]').val(hasil.tenor)
                    $('input[name=jual]').val(hasil.jual)
                    $('input[name=dp]').val(hasil.dp)
                }
            })
        })

        function ajak(noakad) {
            $.ajax({
                url: '<?php echo base_url() ?>collaction/getData',
                type: 'post',
                data: {
                    'no_akad': noakad
                },
                dataType: 'json',
                async: true,
                success: function(data) {
                    console.log(data)
                    var html = '';
                    var no = 1
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + no++ + '</td>' +
                            '<td>' + data[i].reff + '</td>' +
                            '<td>' + data[i].created_at + '</td>' +
                            '<td>' + data[i].bayar + '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
        }

        $(document).on('click', '.bayar', function(e) {
            var id = $(this).data('id')
            $.ajax({
                url: '<?= base_url('collaction/no_akad') ?>',
                type: 'POST',
                data: {
                    'no_akad': id
                },
                dataType: 'json',
                success: function(hasil) {
                    $('input[name=no_akad]').val(hasil.no_akad)
                    $('input[name=id_kospe]').val(hasil.id_kospe)
                    $('input[name=nama]').val(hasil.nama)
                    $('input[name=tlp]').val(hasil.tlp)
                    $('input[name=email]').val(hasil.email)
                    $('input[name=tgl_start]').val(hasil.tgl_start)
                    $('input[name=tgl_end]').val(hasil.tgl_end)
                    $('input[name=dropping]').val(hasil.dropping)
                    $('input[name=angsuran]').val(hasil.angsuran)
                    $('input[name=angsuran_ke]').val(Number(hasil.angsur) + 1)
                    $('input[name=akad]').val(hasil.akad)
                    $('input[name=tujuan]').val(hasil.tujuan)
                    $('input[name=tenor]').val(hasil.tenor)
                    $('input[name=jual]').val(hasil.jual)
                    $('input[name=dp]').val(hasil.dp)
                }
            })
        })

        $('.add').click(function(e) {
            $('input[name=no_akad]').val('')
            $('input[name=id_kospe]').val('')
            $('input[name=nama]').val('')
            $('input[name=tlp]').val('')
            $('input[name=email]').val('')
            $('input[name=tgl_start]').val('')
            $('input[name=tgl_end]').val('')
            $('input[name=dropping]').val('')
            $('input[name=angsuran]').val('')
            $('input[name=akad]').val('')
            $('input[name=tujuan]').val('')
            $('input[name=tenor]').val('')
            $('input[name=jual]').val('')
            $('input[name=dp]').val('')
        })

        $('.bayar-angsuran').on('click', function(e) {
            e.preventDefault()
            var no_akad = $('input[name=no_akad]').val()
            var id_kospe = $('input[name=id_kospe]').val()
            var bayar = $('input[name=bayar]').val()
            var angsuran_ke = $('input[name=angsuran_ke]').val()
            var angsuran = $('input[name=angsuran]').val()
            var reff = $('input[name=reff]').val()
            var ket = $('input[name=ket]').val()

            $.ajax({
                type: 'POST',
                url: "<?php echo base_url() ?>collaction/bayar",
                data: {
                    'no_akad': no_akad,
                    'id_kospe': id_kospe,
                    'bayar': bayar,
                    'angsuran_ke': angsuran_ke,
                    'angsuran': angsuran,
                    'reff': reff,
                    'ket': ket,
                },
                success: function(data) {
                    console.log(data)
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Data pembayaran Berhasil diinput',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })
                    $('#bayar').modal('hide')
                }
            });
        })

        $('.hapus-foto').on('click', function(e) {
            e.preventDefault()
            var id = $(this).data('id')
            $.ajax({
                url: '<?= base_url('post/del') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    'id': id
                },
                success: function(data) {

                }
            })

        })
        $('#editPwd').submit(function(e) {
            e.preventDefault()

            Swal.fire({
                    title: "Anda yakin ingin disimpan ?",
                    text: "Pastikan data Anda telah benar dan sesuai",
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: `Simpan`,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: $(this).attr('action'),
                            data: $(this).serialize(),
                            dataType: 'json',
                            type: 'post',
                            success: function(res) {
                                if (res.sukses) {
                                    Swal.fire({
                                        title: "Berhasil!",
                                        text: `${res.sukses}`,
                                        icon: "success",
                                    })
                                    $('.modal').modal('hide')
                                    $('.form-control').val('')
                                } else {
                                    Swal.fire({
                                        title: "Error !",
                                        text: `${res.error}`,
                                        icon: "error",
                                    });
                                }
                            }
                        })
                    }
                });
        })
    });
</script>
</body>



</html>