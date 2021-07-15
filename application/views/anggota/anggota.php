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
                    <h6 class="m-0 font-weight-bold text-primary">User Management <a href="#ba" class="btn btn-primary text-right" data-toggle="modal">Tambah </a><a href="#upload" class="btn btn-success text-right ml-1" data-toggle="modal">Upload </a></h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="anggota" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tgl Daftar</th>
                                    <th>ID. KoSPE</th>
                                    <th>Nama Lengkap</th>
                                    <th>No. HP</th>
                                    <th>Email</th>
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

<div class="modal fade" id="ba" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="diri-tab" data-toggle="tab" href="#diri" role="tab" aria-controls="diri" aria-selected="true">Data Diri</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link " id="alamat-tab" data-toggle="tab" href="#alamat" role="tab" aria-controls="alamat" aria-selected="false">Data Alamat</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link " id="keluarga-tab" data-toggle="tab" href="#keluarga" role="tab" aria-controls="keluarga" aria-selected="false">Data Keluarga</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pekerjaan-tab" data-toggle="tab" href="#pekerjaan" role="tab" aria-controls="pekerjaan" aria-selected="true">Data Pekerjaan</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pajak-tab" data-toggle="tab" href="#pajak" role="tab" aria-controls="pajak" aria-selected="false">Data Pajak</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="rekening-tab" data-toggle="tab" href="#rekening" role="tab" aria-controls="rekening" aria-selected="false">Data Rekening</a>
                    </li>
                </ul>
                <div class="tab-content pt-3 text-right" id="myTabContent">
                    <div class="tab-pane fade show active" id="diri" role="tabpanel" aria-labelledby="home-tab">
                        <form action="<?= base_url('anggota/add') ?>" method="post" class="dataDiri">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="3" class="col-sm-3 col-form-label">Id. Mitra</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="" readonly name="id_agen">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="1" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="" name="nama">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="3" class="col-sm-3 col-form-label">Tempat, tgl lahir</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" value="" name="tempat_lahir">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" value="" name="tgl_lahir">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="4" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-9">
                                            <select name="sex" class="form-control">
                                                <option value="L" selected>Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="4" class="col-sm-3 col-form-label">No. Idenitas</label>
                                        <div class="col-sm-3">
                                            <select name="jns_id" class="form-control">
                                                <option value="KTP">KTP</option>
                                                <option value="NPWP">NPWP</option>
                                                <option value="PASSPORT">PASSPORT</option>
                                                <option value="LAINNYA">LAINNYA</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" value="" name="no_id">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="5" class="col-sm-3 col-form-label">Foto Identitas</label>
                                        <div class="col-sm-9">
                                            <div class="input-group mb-0">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="foto_id">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="4" class="col-sm-3 col-form-label">Kewarganegaraan</label>
                                        <div class="col-sm-9">
                                            <select name="wni" class="form-control">
                                                <option value="WNI" selected>WNI</option>
                                                <option value="WNA">WNA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="4" class="col-sm-3 col-form-label">No. HP</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="" name="hp">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="4" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="4" class="col-sm-3 col-form-label">Pendidikan</label>
                                        <div class="col-sm-9">
                                            <select name="pendidikan" class="form-control">
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP</option>
                                                <option value="SMA">SMA</option>
                                                <option value="AKADEMIK">AKADEMIK</option>
                                                <option value="UNIVERSITAS">UNIVERSITAS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="4" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select name="status" class="form-control">
                                                <option value="BELUM MENIKAH">BELUM MENIKAH</option>
                                                <option value="MENIKAH">MENIKAH</option>
                                                <option value="DUDA">DUDA</option>
                                                <option value="JANDA">JANDA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="4" class="col-sm-3 col-form-label">Penghasilan</label>
                                        <div class="col-sm-9">
                                            <select name="penghasilan" class="form-control">
                                                <option value="A">
                                                    < Rp3.000.000,-</option>
                                                <option value="B">Rp3.000.000,- s/d Rp5.000.000,-</option>
                                                <option value="C">Rp5.000.000,- s/d Rp10.000.000,-</option>
                                                <option value="D">> Rp10.000.000,-</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Input</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="alamat" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="<?= base_url('mitraku/addAlamat') ?>" method="post" class="dataAlamat">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="3" class="col-sm-3 col-form-label">Alamat KTP</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" class="form-control" value="" readonly name="id_agen">
                                            <textarea type="text" class="form-control" name="alamat_ktp"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="3" class="col-sm-3 col-form-label">Provinsi</label>
                                        <div class="col-sm-9">
                                            <select name="provinsi_ktp" class="form-control provinsi">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="3" class="col-sm-3 col-form-label">Kab/Kota</label>
                                        <div class="col-sm-9">
                                            <select name="kota_kab_ktp" class="form-control kota_kabupaten">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="3" class="col-sm-3 col-form-label">Kecamatan</label>
                                        <div class="col-sm-9">
                                            <select name="kec_ktp" class="form-control kecamatan">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="3" class="col-sm-3 col-form-label">Kelurahan</label>
                                        <div class="col-sm-9">
                                            <select name="kel_ktp" class="form-control kelurahan">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="3" class="col-sm-3 col-form-label">Alamat Domisili</label>
                                        <div class="col-sm-9">
                                            <textarea type="text" class="form-control" name="alamat_domisili"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="3" class="col-sm-3 col-form-label">Provinsi</label>
                                        <div class="col-sm-9">
                                            <select name="provinsi_domisili" class="form-control provinsi2">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="3" class="col-sm-3 col-form-label">Kab/Kota</label>
                                        <div class="col-sm-9">
                                            <select name="kota_kab_domisili" class="form-control kota_kabupaten2">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="3" class="col-sm-3 col-form-label">Kecamatan</label>
                                        <div class="col-sm-9">
                                            <select name="kec_domisili" class="form-control kecamatan2">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="3" class="col-sm-3 col-form-label">Kelurahan</label>
                                        <div class="col-sm-9">
                                            <select name="kel_domisili" class="form-control kelurahan2">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Input</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="keluarga" role="tabpanel" aria-labelledby="contact-tab">
                        <form action="<?= base_url('mitraku/addKeluarga') ?>" method="post" class="dataKeluarga">
                            <div class="form-group row">
                                <label for="3" class="col-sm-2 col-form-label">Nama Ibu Kandung</label>
                                <div class="col-sm-5">
                                    <input type="hidden" class="form-control" value="" readonly name="id_agen">
                                    <input type="text" class="form-control" value="" name="ibu">
                                </div>

                            </div>

                            <div class="form-group row">

                                <!-- <a href="#" class="btn btn-sm btn-primary pull-right">Tambah</a> -->
                                <div class="col-sm-12">
                                    <table class="table table-hover table-sm pt-3 table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <td colspan="2">Data Ahli Waris</td>
                                                <td colspan="4"><a href="#addAnak" data-toggle="modal" class="btn btn-primary btn-sm float-right">Tambah Ahli Waris</a></td>
                                            </tr>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th width="30%">Nama Lengkap</th>
                                                <th width="30%">Tempat, tgl lahir</th>
                                                <th>Status</th>
                                                <th>No. HP</th>
                                                <th width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="ahliWaris">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Input</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="pekerjaan" role="tabpanel" aria-labelledby="home-tab">
                        <form action="<?= base_url('mitraku/addPekerjaan') ?>" method="post" class="dataPekerjaan">
                            <div class="form-group row">
                                <label for="3" class="col-sm-2 col-form-label">Profesi</label>
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" value="" readonly name="id_agen">
                                    <select name="profesi" class="form-control">
                                        <option value="PNS">PNS</option>
                                        <option value="KARYAWAN SWASTA">KARYAWAN SWASTA</option>
                                        <option value="GURU">GURU</option>
                                        <option value="WIRASWASTA">WIRASWASTA</option>
                                        <option value="ARSITEK">ARSITEK</option>
                                        <option value="LAINNYA">LAINNYA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="1" class="col-sm-2 col-form-label">Nama Instansi </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="" name="instansi">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="4" class="col-sm-2 col-form-label">Telp/HP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="" name="hp_instansi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="4" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="" name="email_instansi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="4" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" value="" name="alamat_instansi"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Input</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade " id="pajak" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- <form action="<?= base_url('mitraku/addNpwp') ?>" method="post" class="dataPajak"> -->
                        <div class="form-group row">
                            <label for="3" class="col-sm-2 col-form-label">No. NPWP</label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="id_agen" value="" readonly name="id_agen">
                                <input type="text" class="form-control" id="no_npwp" value="" name="no_npwp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="5" class="col-sm-2 col-form-label">Foto NPWP</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-0">
                                    <div class="custom-file">
                                        <input type="file" id="npwp" name="npwp">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="button" class="uploadNpwp btn btn-primary">Input</button>
                        </div>
                        </form>
                    </div>
                    <div class="tab-pane fade " id="rekening" role="tabpanel" aria-labelledby="contact-tab">
                        <form action="<?= base_url('mitraku/addBank') ?>" method="post" class="dataRekening">
                            <div class="form-group row">
                                <label for="3" class="col-sm-2 col-form-label">No. Rekening</label>
                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" value="" readonly name="id_agen">
                                    <input type="text" class="form-control" value="" name="rek_bank">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="1" class="col-sm-2 col-form-label">Atas Nama </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="" name="an_bank">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="4" class="col-sm-2 col-form-label">Bank</label>
                                <div class="col-sm-10">
                                    <select name="bank" class="form-control">
                                        <option value="MANDIRI">BANK MANDIRI</option>
                                        <option value="BSM">BANK SYARIAH MANDIRI</option>
                                        <option value="BNI">BANK NASIONAL INDONESIA (BNI)</option>
                                        <option value="BNIS">BANK BNI SYARIAH</option>
                                        <option value="BCA">BANK CENTRAL ASIA (BCA)</option>
                                        <option value="BCAS">BANK CENTRAL ASIA SYARIAH (BCAS)</option>
                                        <option value="BRI">BANK RAKYAT INDONESIA (BRI)</option>
                                        <option value="BRIS">BANK RAKYAT INDONESIA SYARIAH (BRIS)</option>
                                        <option value="BMI">BANK MUAMALAT INDONESIA (BMI)</option>
                                        <option value="PERTAMA">BANK PERTMATA</option>
                                        <option value="PERMATAS">BANK PERMATA SYARIAH</option>
                                    </select>
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
    </div>
</div>

<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title" id="exampleModalLabel">Upload Anggota Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="tab-content pt-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="diri" role="tabpanel" aria-labelledby="home-tab">
                        <form action="<?= base_url('anggota/upload') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
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
    </div>
</div>

<script>
    getAnggota()

    function getAnggota() {
        $('#anggota').DataTable({
            "ajax": {
                "url": "<?= base_url('anggota/getData') ?>",
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
                    "data": "id_kospe"
                },
                {
                    "data": "nama"
                },
                {
                    "data": "hp"
                },
                {
                    "data": "email"
                },
                {
                    "data": "id",
                    "mRender": function(data) {
                        return '<a data-toggle="modal" class="badge badge-primary mr-1" data-id="' + data + '" href="#ba">Edit</a><a class="badge badge-danger" href="#" onclick="javascript:return confirm(\'Anda yakin?\');">Delete</a>';
                    }
                }
            ]
        });

    }
</script>