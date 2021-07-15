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
                    <form method="post" action="<?= base_url('pembiayaan/hitung') ?>">
                        <div class="form-group row">
                            <label for="1" class="col-sm-2 col-form-label">Nama Anggota</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="1" class="col-sm-2 col-form-label">Diisi oleh</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="created_by">
                            </div>
                            <label for="2" class="col-sm-2 col-form-label">No. Pengajuan</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="kode">
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
                                                    <select class="form-control" name="analisa<?= $a->id_analisa ?>" style="width: 300px;">
                                                        <option value="0">Pilihan</option>
                                                        <?php $this->db->where('parent', $a->id_analisa);
                                                        $dt = $this->db->get('tb_analisa')->result();
                                                        foreach ($dt as $d) : ?>
                                                            <option onclick="klik()" value="<?= $d->skor ?>"><?= $d->nama ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </td>
                                                <td class="hide" id="skor<?= $a->id_analisa ?>">0</td>
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
                            <button id="hitung" class="btn btn-primary">Analisa</button>
                            <a id="analisa" href="<?= base_url('pdf/analisa') ?>" class="btn btn-success">Cetak PDF</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>