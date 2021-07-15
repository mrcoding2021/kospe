<aside class="left-sidebar">
    <div class="widget">
        <iframe src="https://timesprayer.com/widgets.php?frame=1&amp;lang=en&amp;name=jakarta&amp;avachang=true&amp;time=0" style="border: none; overflow: hidden; width: 100%; height: 200px;"></iframe>
    </div>
    <div class="widget">
        <h5 class="widgetheading">Menu Lain</h5>
        <ul class="cat">
            <?php $this->load->view('template/menu'); ?>
        </ul>
    </div>
    <div class="widget">
        <h5 class="widgetheading">Post Terbaru</h5>
        <ul class="recent">
            <?php
            $this->load->view('template/blog');
            ?>
        </ul>
    </div>
    <div class="widget">
        <a href="<?= base_url('home/ajukan') ?>"><img src="<?= base_url('asset/img/klik1.png') ?>" alt=""></a>
    </div>
</aside>