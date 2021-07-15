<?php foreach ($post as $key) :
    $judul = str_replace(' ', '-', strtolower($key->judul));
?>
    <a href="<?= base_url('berita/detail/') . $judul ?>">

        <li>

            <img src="<?= base_url('asset/img/post/') . $key->img ?>" class="pull-left" alt="" width="100px" />

            <h6><a href="<?= base_url('post/' . str_replace('/', '', shortdate_indo($key->date))) . '/' . str_replace(' ', '-', $key->judul) ?>"><?= $key->judul ?></a></h6>
            <p>
                <?= substr($key->isi, 0, 100) ?> ....
            </p>

        </li>
    </a>
    <hr>
<?php endforeach ?>