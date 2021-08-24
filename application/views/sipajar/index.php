                <!-- Begin Page Content -->
                <div class="container-fluid">
                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800"><?= $nama ?></h1>
                  <!-- Content Row -->
                  <?= $this->session->flashdata('alert');
                  ?>

                  <div class="row">
                    <duv class="col-md-12">
                      <div class="card shadow mb-4">
                        
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="dataSekolah" width="100%" cellspacing="0">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Tanggal Daftar</th>
                                  <th>Nama Sekolah</th>
                                  <th>PJ</th>
                                  <th>No. HP</th>
                                  <th>Jml. Pelajar</th>
                                  <th>Saldo Sipajar</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>

                                </tr>

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
                <div class="modal fade" id="tambahSekolah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Sekolah Baru</h5>

                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('sipajar/addSekolah') ?>" method="post">
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Nama Sekolah</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="nama">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Alamat Sekolah</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="alamat">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">No. HP Sekolah</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="hp">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Email Sekolah</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="email">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="1" class="col-sm-3 col-form-label text-right">Penanggungjawab</label>
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
                <div class="modal fade" id="tambahPelajar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
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

                  getSekolah()

                  function getSekolah() {
                    $('#dataSekolah').DataTable({
                      "ajax": {
                        "url": "<?= base_url('sipajar/dataSekolah') ?>",
                        "dataSrc": ""
                      },
                      "destroy": true,
                      "columns": [{
                          "data": "no"
                        },
                        {
                          "data": "tgl"
                        },
                        {
                          "data": "nama"
                        },
                        {
                          "data": "pj"
                        },
                        {
                          "data": "hp"
                        },
                        {
                          "data": "jml_murid"
                        },
                        {
                          "data": "saldo"
                        },
                        {
                          "data": "id",
                          "mRender": function(data) {
                            return '<a class="detail btn-sm btn btn-success mr-1" href="<?= base_url('sipajar/sekolah/') ?>' + data + '">Detail</a><a class="mutasi btn btn-sm btn-primary mr-1" href="<?= base_url('sipajar/mutasi/') ?>' + data + '"">Mutasi</a><a class="blokir btn-sm btn btn-danger mr-1"  href="#">Aktif</a>';
                          }
                        }
                      ]
                    });

                  }
                </script>