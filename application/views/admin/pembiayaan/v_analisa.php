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
                    <form method="post" class="formAnalisa">
                        <div class="form-group row">
                            <label for="1" class="col-sm-2 col-form-label">Nama Anggota</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <label for="1" class="col-sm-1 col-form-label">No. Akad</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="no_akad">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" width="100%" cellspacing="0">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Kriteria Analisa</th>
                                            <th width="30%">Pilihan</th>
                                            <th class="hide">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($analisa as $a) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $a->nama ?></td>
                                                <td>
                                                    <select class="form-control " name="skor[]" id="analisa<?= $a->id_analisa ?>" style="width: 300px;">
                                                        <option value="0">Pilihan</option>
                                                        <?php $this->db->where('parent', $a->id_analisa);
                                                        $dt = $this->db->get('tb_analisa')->result();
                                                        foreach ($dt as $d) : ?>
                                                            <option data-skor="<?= $d->id_analisa ?>" value="<?= $d->skor ?>"><?= $d->nama ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </td>
                                                <td class="hide" id="skor<?= $a->id_analisa ?>">0</td>
                                                <td><input type="hidden" class="skor" name="kategori[]" value="<?= $a->id_analisa ?>"></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th colspan="2"></th>
                                            <th>Total Skor</th>
                                            <th class="hide" id="grand_total">0</th>
                                        </tr>
                                    </thead>
                                    <tr class="hide" id="bg-result" class="bg-primary text-white">
                                        <th colspan="2">Hasil Analisa</th>
                                        <th id="result" colspan="2">DIPERTIMBANGKAN</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="hitung" type="submit" class="btn btn-primary">Analisa</button>
                            <a id="analisa" href="<?= base_url('pdf/analisa/') ?>" class="btn btn-success">Cetak PDF</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#cetakPdf').hide()
    $('#analisa').hide()
    $('.hide').hide()

    $('.formAnalisa').on('submit', function(e) {
        e.preventDefault()
        $('#analisa').show()

        // data yang di kirim 
        var nama = $('input[name=nama]').val()
        var created_by = $('input[name=created_by]').val()
        var kode = $('input[name=kode]').val()

        var analisa1 = Number($('#analisa1').val())
        var analisa2 = Number($('#analisa2').val())
        var analisa3 = Number($('#analisa3').val())
        var analisa4 = Number($('#analisa4').val())
        var analisa5 = Number($('#analisa5').val())
        var analisa6 = Number($('#analisa6').val())
        var analisa7 = Number($('#analisa7').val())
        var analisa8 = Number($('#analisa8').val())
        var analisa9 = Number($('#analisa11').val())
        var analisa10 = Number($('#analisa12').val())
        var analisa11 = Number($('#analisa13').val())
        var analisa12 = Number($('#analisa14').val())
        var analisa13 = Number($('#analisa15').val())
        var analisa14 = Number($('#analisa16').val())
        var analisa15 = Number($('#analisa17').val())
        var analisa16 = Number($('#analisa18').val())
        var analisa17 = Number($('#analisa19').val())
        var analisa18 = Number($('#analisa20').val())
        var analisa19 = Number($('#analisa21').val())
        var analisa20 = Number($('#analisa22').val())
        var analisa21 = Number($('#analisa23').val())
        var analisa22 = Number($('#analisa24').val())

        var total = analisa1 +
            analisa2 +
            analisa3 +
            analisa4 +
            analisa5 +
            analisa6 +
            analisa7 +
            analisa8 +
            analisa9 +
            analisa10 +
            analisa11 +
            analisa12 +
            analisa13 +
            analisa14 +
            analisa15 +
            analisa16 +
            analisa17 +
            analisa18 +
            analisa19 +
            analisa20 +
            analisa21 +
            analisa22
        // jalankan ajax 
        $('#skor1').html(analisa1)

        $('#skor2').html(analisa2)

        $('#skor3').html(analisa3)

        $('#skor4').html(analisa4)

        $('#skor5').html(analisa5)

        $('#skor6').html(analisa6)

        $('#skor7').html(analisa7)

        $('#skor8').html(analisa8)

        $('#skor11').html(analisa9)

        $('#skor12').html(analisa10)

        $('#skor13').html(analisa11)

        $('#skor14').html(analisa12)

        $('#skor15').html(analisa13)

        $('#skor16').html(analisa14)

        $('#skor17').html(analisa15)

        $('#skor18').html(analisa16)

        $('#skor19').html(analisa17)

        $('#skor20').html(analisa18)

        $('#skor21').html(analisa19)

        $('#skor22').html(analisa20)

        $('#skor23').html(analisa21)

        $('#skor24').html(analisa22)

        $('.hide').show()
        $('#grand_total').html(total)

        if ($('#grand_total').html() <= 400) {
            $('#result').html('DITOLAK')
            $('#bg-result').attr('class', 'bg-danger text-white')
        } else if ($('#grand_total').html() > 400 && $('#grand_total').html() < 500) {
            $('#result').html('DIPERTIMBANGKAN')
            $('#bg-result').attr('class', 'bg-warning')
        } else if ($('#grand_total').html() > 500) {
            $('#result').html('DITERIMA')
            $('#bg-result').attr('class', 'bg-success text-white')
        }

        var hp = $('input[name="no_akad"]').val()
        $.ajax({
            url: '<?= base_url('pembiayaan/inputAnalisa') ?>',
            dataType: 'json',
            type: 'post',
            data: $(this).serialize(),
            success: function(res) {
                $('#analisa').attr('href', '<?= base_url('pdf/analisa/') ?>' + hp)
            }
        })
    })
</script>