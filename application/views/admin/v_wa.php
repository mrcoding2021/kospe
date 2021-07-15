<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="row">
        <div class="col-lg">
            <!-- DataTales Example -->
            <?= $this->session->flashdata('alert');
            ?>
            <H3 class="text-center">WA Blast System</H3>
            <hr>
            <div class="row">
                <div class="col-lg">
                    <iframe src="https://whatsapp.com/123" scrolling="auto" width="100%" height="600px" frameborder="0"></iframe>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 shadow">
                    <div class="nav flex-column nav-pills pt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">WA SEND</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">UPLOAD</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">ANTRIAN</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">SETTING</a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="card shadow mb-4">
                                <div class="card-header bg-primary text-white py-3">
                                    <h6 class="m-0 font-weight-bold ">WA Blast Terkirim </h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Telp/HP</th>
                                                    <th>Msg</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($wa as $key) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?php echo $key->nama ?></td>
                                                        <td>
                                                            <?php echo $key->tlp ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $key->msg ?>
                                                        </td>
                                                        <td>
                                                            terkirim
                                                        </td>

                                                    </tr>

                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">WA Blast Terkirim </h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Telp/HP</th>
                                                    <th>Msg</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($wa as $key) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?php echo $key->nama ?></td>
                                                        <td>
                                                            <?php echo $key->tlp ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $key->msg ?>
                                                        </td>
                                                        <td>
                                                            terkirim
                                                        </td>

                                                    </tr>

                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">WA Blast Terkirim </h6>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Telp/HP</th>
                                                    <th>Msg</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($wa as $key) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?php echo $key->nama ?></td>
                                                        <td>
                                                            <?php echo $key->tlp ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $key->msg ?>
                                                        </td>
                                                        <td>
                                                            terkirim
                                                        </td>

                                                    </tr>

                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">WA Blast Terkirim </h6>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Telp/HP</th>
                                                    <th>Msg</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($wa as $key) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?php echo $key->nama ?></td>
                                                        <td>
                                                            <?php echo $key->tlp ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $key->msg ?>
                                                        </td>
                                                        <td>
                                                            terkirim
                                                        </td>

                                                    </tr>

                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>