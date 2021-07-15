 <section id="inner-headline">
     <div class="container">
         <div class="row">
             <div class="span8">
                 <div class="inner-heading">
                     <h2><?= $detail['title'] ?></h2>
                 </div>
             </div>
             <div class="span4">
                 <ul class="breadcrumb">
                     <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                     <li><a href="#"><?= $detail['header'] ?></a><i class="icon-angle-right"></i></li>
                     <li class="active"><?= $detail['title'] ?></li>
                 </ul>
             </div>
         </div>
     </div>
 </section>
 <section id="content">
     <div class="container">
         <div class="row">
             <div class="span4">
                 <?php $this->load->view('template/sidebar'); ?>
             </div>
             <div class="span8">
                 <article>
                     <div class="row">
                         <div class="span8">
                             <div class="post-image">
                                 <img src="<?= base_url('asset/img/post/') ?>struktur.jpg" alt="" width="100%" />
                             </div>
                             <h4>DEWAN PENGAWAS SYARIAH</h4>
                             <div class="span3">
                                 <img src="<?= base_url('asset/img/kospe/') ?>buchori.jpg" alt="" width="100%">
                             </div>
                             <div class="span3">
                                 <img src="<?= base_url('asset/img/kospe/') ?>aman-toha.jpg" alt="" width="100%">
                             </div>
                             <br>
                             <hr>
                             <br>
                             <h4>DEWAN PENGAWAS</h4>
                             <div class="span4">
                                 <img src="<?= base_url('asset/img/kospe/') ?>anas.jpg" alt="" width="100%">
                                 <img src="<?= base_url('asset/img/kospe/') ?>ari.jpg" alt="" width="100%">
                                 <img src="<?= base_url('asset/img/kospe/') ?>dewi.jpg" alt="" width="100%">
                             </div>

                             <br>
                             <hr><br>

                             <div class="span4" style="margin-top: 20px ;">
                                 <h4>DEWAN PENGURUS</h4>
                                 <img src="<?= base_url('asset/img/kospe/') ?>bagus.jpg" alt="" width="100%">
                                 <img src="<?= base_url('asset/img/kospe/') ?>awang.png" alt="" width="100%">
                                 <img src="<?= base_url('asset/img/kospe/') ?>herdy.png" alt="" width="100%">
                                 <img src="<?= base_url('asset/img/kospe/') ?>agus.png" alt="" width="100%">
                                 <img src="<?= base_url('asset/img/kospe/') ?>dedy.png" alt="" width="100%">
                             </div>

                             <div class="bottom-article">
                                 <ul class="meta-post">
                                     <li><i class="icon-user"></i><a href="#"> Admin</a></li>
                                 </ul>

                             </div>
                         </div>
                     </div>
                 </article>
             </div>
         </div>
     </div>
     </>