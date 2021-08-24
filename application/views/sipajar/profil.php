                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Ubah Password</h1>
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-md-12">
                        <?= $this->session->flashdata('alert');
                        ?>
                        </div>
                        <div class="col-xl-6">
                            <div class="card shadow mb-4">

                                <div class="card-body">

                                    <form action="<?= base_url('auth/ubah') ?>" method="post">
                                        <div class="form-group row">
                                            <label for="1" class="col-sm-4 col-form-label">Password Saat ini</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control ckeditor" id="ckeditor" name="pwd" rows="10">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="4" class="col-sm-4 col-form-label">Password Baru</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control ckeditor" id="ckeditor" name="pwd1" rows="10">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="4" class="col-sm-4 col-form-label">Konfirmasi Password Baru</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control ckeditor" id="ckeditor" name="pwd2" rows="10">
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

                </div>
                </div>