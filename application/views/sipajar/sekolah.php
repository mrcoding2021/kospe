                <!-- Begin Page Content -->
                <div class="container-fluid">
                
                  <?= $this->session->flashdata('alert'); ?>
                  <div class="row">
                    <duv class="col-md-12">
                      <div class="card shadow mb-4">
                      
                        <div class="card-body">

                          <form action="<?= base_url('sipajar/addSekolah') ?>" method="post">
                            <div class="row">
                              <div class="col-md-5">
                                <div class="form-group row">
                                  <label for="1" class="col-sm-4 col-form-label">Nama Sekolah</label>
                                  <label for="1" class="col-sm-8 col-form-label namaSekolah border-bottom-dark"></label>
                                </div>
                                <div class="form-group row">
                                  <label for="1" class="col-sm-4 col-form-label">Alamat Sekolah</label>
                                  <label for="1" class="col-sm-8 col-form-label alamatSekolah border-bottom-dark"></label>
                                </div>
                                <div class="form-group row">
                                  <label for="1" class="col-sm-4 col-form-label">No. HP Sekolah</label>
                                  <label for="1" class="col-sm-8 col-form-label hpSekolah border-bottom-dark"></label>
                                </div>

                              </div>
                              <div class="col-md-5">

                                <div class="form-group row">
                                  <label for="1" class="col-sm-4 col-form-label">Email Sekolah</label>
                                  <label for="1" class="col-sm-8 col-form-label emailSekolah border-bottom-dark"></label>
                                </div>
                                <div class="form-group row">
                                  <label for="1" class="col-sm-4 col-form-label">Penanggungjawab</label>
                                  <label for="1" class="col-sm-8 col-form-label pjSekolah border-bottom-dark"></label>
                                </div>
                              </div>
                            </div>

                          </form>
                        </div>
                      </div>
                    </duv>


                    <duv class="col-md-12">
                      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                          <h4>Data Pelajar
                            <a href="#tambahMurid" class="btn btn-primary ml-3" data-toggle="modal">Tambah Pelajar</a> <a href="#tambahPelajar" class="btn btn-success ml-1" data-toggle="modal">Upload Data Pelajar</a> <a href="#input" class="btn btn-warning ml-1" data-toggle="modal">Input Transaksi</a><a href="#payroll" class="btn btn-info ml-1" data-toggle="modal">Upload Payroll</a>
                          </h4>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataSekolah" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Tanggal Daftar</th>
                                  <th>Id User</th>
                                  <th>NIS</th>
                                  <th>Nama Lengkap</th>
                                  <th>PJ</th>
                                  <th>No. HP</th>
                                  <th>Saldo Sipajar</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                            <tbody>

                            </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </duv>
                  </div>


                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
                <div class="modal fade" id="tambahMurid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-white text-center">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Murid Baru</h5>

                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('sipajar/addPelajar') ?>" method="post">
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Nama Pelajar</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="nama">
                              <input type="hidden" class="form-control" value="" name="id_sekolah">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">NIS</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="nis">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Alamat Pelajar</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="alamat">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Tempat, tgl lahir</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="tmpt_lhr" placeholder="BEKASI">
                            </div>
                            <div class="col-sm-6">
                              <input type="text" class="form-control" name="tgl_lhr" placeholder="1990-08-17">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">No. HP Prlajar</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="hp" placeholder="087883245700">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Email Pelajar</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="email">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Orangtua Murid</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="pj">
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

                <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-white text-center">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Murid Baru</h5>

                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('sipajar/addPelajar') ?>" method="post">
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Nama Pelajar</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="nama">
                              <input type="hidden" class="form-control" value="" name="id_sekolah">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">NIS</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="nis">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Alamat Pelajar</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="alamat">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Tempat, tgl lahir</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" name="tmpt_lhr">
                            </div>
                            <div class="col-sm-4">
                              <input type="date" class="form-control" name="tgl_lhr">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">No. HP Prlajar</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="hp">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Email Pelajar</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="email">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Orangtua Murid</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="pj">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                          </div>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="modal fade" id="input" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-warning text-dark text-center">
                        <h5 class="modal-title" id="exampleModalLabel">Input Transaksi Sipajar</h5>

                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('sipajar/transaksi') ?>" method="post" class="inputTransaksi">
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Keterangan</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="ket">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">ID. User</label>
                            <div class="col-sm-2">
                              <input type="text" class="form-control" name="id_user">
                            </div>
                            <div class="col-sm-7">
                              <input type="text" readonly class="form-control" name="nama_user">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Tgl. Buat</label>
                            <div class="col-sm-3">
                              <input type="date" class="form-control" name="tgl_buat">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Tgl. Transaksi</label>
                            <div class="col-sm-3">
                              <input type="date" class="form-control" name="tgl_trx">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Jenis Transaksi</label>
                            <div class="col-sm-3">
                              <select name="jenis_trx" class="form-control">
                                <option value="0">Debit</option>
                                <option value="1">Kredit</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Nilai Transaksi</label>
                            <div class="col-sm-9">
                              <input type="text" placeholder="1000000" class="form-control" name="jumlah">
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

                <div class="modal fade" id="tambahPelajar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Import Data Pelajar</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('import/upload') ?>" method="post" enctype="multipart/form-data">

                          <div class="form-group row">
                            <label for="5" class="col-sm-2 col-form-label">File</label>
                            <div class="col-sm-10">
                              <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="inputGroupFile01" name="file">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                          </div>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="modal fade" id="payroll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Import Payroll</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('import/payroll') ?>" method="post" enctype="multipart/form-data">

                          <div class="form-group row">
                            <label for="5" class="col-sm-2 col-form-label">File</label>
                            <div class="col-sm-10">
                              <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">Upload</span>
                                </div>
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="inputGroupFile01" name="file">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                          </div>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>
                
                <div class="modal fade" id="mutasi" tabindex="-1" role="dialog" ria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header bg-info text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Mutasi Sipajar</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Debit</th>
                                <th>Kredit</th>
                                <th>Saldo</th>
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
             
                <script>
                  $('.detail').click(function(e) {
                    e.preventDefault()
                    console.log('ok')
                  })

                  $('input[name="id_user"]').change(function() {
                    $.ajax({
                      url: '<?= base_url('sipajar/dataUser') ?>',
                      data: {
                        'data': $(this).val()
                      },
                      type: 'post',
                      dataType: 'json',
                      success: function(res) {
                        $('input[name="nama_user"]').val(res.nama)
                      }
                    })
                  })

                  $('.inputTransaksi').submit(function(e) {
                    e.preventDefault()
                    swal({
                        title: "Anda yakin ingin menyimpan transaksi ini?",
                        text: "Pastikan data sudah benar dan lengkap",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                      })
                      .then((willDelete) => {
                        if (willDelete) {
                          $.ajax({
                            url: $(this).attr('action'),
                            data: $(this).serialize(),
                            type: 'post',
                            dataType: 'json',
                            success: function(res) {
                              if (res.sukses) {
                                swal("Selamat! Transaksi berhasil tersimpan", {
                                  icon: "success",
                                });
                                $('.modal').modal('hide')
                              } else {
                                swal("Gagal terinput", {
                                  icon: "error",
                                });
                              }
                            }
                          })
                        }
                      });
                  })
                </script>