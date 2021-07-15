<div class="container-fluid">
    <div class="row">
        <div class="col-lg">
            <?= $this->session->flashdata('alert'); ?>
            <table class="table table-hover">
                <thead class="bg-danger text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th>Data Berkas</th>
                        <td scope="col">Nama</td>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($galeri == null) {
                        echo '<tr><td colspan="4" class="text-center">Tidak ada berkas yang diupload</td></tr>';
                    }
                    $no = 1;
                    foreach ($galeri as $key) { ?>
                        <tr>
                            <th scope="row"><?= $no++ ?></th>
                            <td>
                                <?php if (preg_match('/.pdf/i', $key->img)) { ?>
                                    <img width="50" src="https://e7.pngegg.com/pngimages/571/47/png-clipart-adobe-acrobat-pdf-computer-icons-adobe-reader-edu-invest-adobe-pdf-text-logo-thumbnail.png" alt="">

                                <?php } else { ?>
                                    <img width="50" src="<?= base_url('asset/berkas/' . $key->img) ?>" alt="">
                                <?php } ?>
                            </td>
                            <td>
                                <span><?= $key->judul ?></span>
                            </td>
                            <td><a href="<?= base_url('pembiayaan/download/' . $key->id_pembiayaan . '/' . $key->kategori) ?>" class="btn btn-success">Download</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>