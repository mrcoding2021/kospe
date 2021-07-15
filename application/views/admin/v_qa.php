<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <form action="">
        <div class="form-group row">
            <label for="" class="form-control-label col-sm-2">Cari Data</label>
            <input type="text" name="keyword" class="form-control col-sm-10">
        </div>
    </form>
    <div class="row mt-5">
        <!-- Sidebar -->
        <div class="col-md-3">
            <ul class="navbar-nav sidebar accordion w-100" id="accordionSidebar">
                <?php foreach ($qna as $key) : ?>
                    <li class="nav-item w-100">
                        <a class="nav-link collapsed text-dark" href="#" data-toggle="collapse" data-target="#accordion<?= $key->id ?>" aria-expanded="true" aria-controls="<?= $key->id ?>">
                            <span><?= $key->judul ?></span>
                        </a>
                        <div id="accordion<?= $key->id ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="collapse-inner nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <?php $this->db->where('parent', $key->id);
                                $subqna  = $this->db->get('tb_qa')->result();
                                foreach ($subqna as $k) : ?>
                                    <a class="qna collapse-item <?= ($k->id == 6) ? 'active' : '' ?>" href="#pil<?= $k->id ?>" data-toggle="pill"><?= ucwords(substr($k->judul, 0, 22)) ?></a>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </li>
                <?php endforeach ?>

            </ul>
        </div>
        <div class="col-md-9 tab-content">
            <?php $this->db->where_not_in('parent', 0);
            $subqa  = $this->db->get('tb_qa')->result();
            foreach ($subqa as $ke) : ?>
                <div class="tab-pane isi fade <?= ($ke->id == 6) ? 'show active' : '' ?>" id="pil<?= $ke->id ?>" role="tabpanel">
                    <h3 class="text-primary">
                        <strong><?= ucwords($ke->judul) ?></strong>
                        <a href="#editQNA" data-toggle="modal" data-id="<?= $ke->id ?>" class="btn btn-info float-right editQna">Edit</a>
                        <a href="#tambahQNA" data-toggle="modal" data-id="<?= $ke->id ?>" class="btn btn-success mr-2 float-right editQna">Tambah Baru</a>
                    </h3>
                    <hr>
                    <p class="isiQnA">
                        <?= $ke->isi ?>
                    </p>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


</div>
<div class="modal fade" id="editQNA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit QnA</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('qna/edit') ?>" id="editQnA" method="post" enctype="multipart/form-data">

                    <div class="form-group row">

                        <label for="1" class="col-sm-2 col-form-label">Judul</label>

                        <div class="col-sm-10">

                            <input type="text" value="" class="form-control" name="judul">
                            <input type="hidden" value="" class="form-control" name="id">
                            <input type="hidden" value="" class="form-control" name="parent">

                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="1" class="col-sm-2 col-form-label">Kategori</label>
                        <label for="1" class="col-sm-10 col-form-label parent"></label>
                    </div>
                    <div class="form-group row">
                        <label for="ckeditr" class="col-sm-2 col-form-label">Isi</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" name="isi" rows="7"></textarea>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Edit</button>

                    </div>

                </form>


            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="tambahQNA" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit QnA</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('qna/add') ?>" id="addQnA" method="post">

                    <div class="form-group row">

                        <label for="1" class="col-sm-2 col-form-label">Judul</label>

                        <div class="col-sm-10">
                            <input type="text" value="" class="form-control" name="title">
                        </div>

                    </div>

                    <div class="form-group row">
                        <label for="1" class="col-sm-2 col-form-label">Kategori</label>
                        <div class="col-sm-10">
                            <select name="parent" class="form-control">
                                <?php
                                $this->db->where('parent', 0);
                                $kategori = $this->db->get('tb_qa')->result();
                                foreach ($kategori as $key) : ?>
                                    <option value="<?= $key->id ?>"><?= $key->judul ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ckeditr" class="col-sm-2 col-form-label">Isi</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" name="content" rows="7"></textarea>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>

                </form>


            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.editQna').click(function(e) {
            var id = $(this).data('id')
            editQNA(id)
        })

        function editQNA(id) {
            $.ajax({
                url: '<?= base_url('qna/detil') ?>',
                data: {
                    'id': id
                },
                dataType: 'json',
                type: 'post',
                success: function(res) {
                    $('input[name="judul"]').val(res.judul)
                    $('input[name="id"]').val(res.id)
                    $('input[name="parent"]').val(res.par)
                    $('textarea[name="isi"]').val(res.isi)
                    $('.parent').html(res.parent)
                    $('.isi.show.active p').text(res.isi)
                }
            })
        }

        $('.qna.collapse-item').on('click', function(event) {
            event.preventDefault()
            $(this).siblings().attr('class', 'collapse-item')
        })

        $('#addQnA').submit(function(e) {
            e.preventDefault()
            var data = $(this).serialize()
            Swal.fire({
                title: 'Yakin ingin disimpan ?',
                html: `Pastikan data yang Anda masukkan telah benar`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok, simpan'
            }).then((result) => {
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'post',
                    dataType: 'json',
                    data: data,
                    success: function(res) {
                        window.location.href = '<?= base_url('qna') ?>';
                    }
                })
            })
        })
        $('#editQnA').submit(function(e) {
            e.preventDefault()
            var data = $(this).serialize()
            var id = $(this).data('id')
            Swal.fire({
                title: 'Yakin ingin disimpan ?',
                html: `Pastikan data yang Anda masukkan telah benar`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok, simpan'
            }).then((result) => {
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'post',
                    dataType: 'json',
                    data: data,
                    success: function(res) {
                        window.location.href = '<?= base_url('qna') ?>';
                    }
                })
            })
        })
    })
</script>