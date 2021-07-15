 <section id="inner-headline">
     <div class="container">
         <div class="row">
             <div class="span8">
                 <div class="inner-heading">
                     <h2>Blog & Artikel</h2>
                 </div>
             </div>
             <div class="span4">
                 <ul class="breadcrumb">
                     <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                     <li><a href="#"><?= $detail['header'] ?></a><i class="icon-angle-right"></i></li>
                 </ul>
             </div>
         </div>
     </div>
 </section>
 <section id="content">
     <div class="container">
         <div class="row">
             <div class="span8">
                 <article>
                     <div class="row">
                         <div class="span8">
                             <div class="post-image">
                                 <h3><?= html_entity_decode($detail['title']) ?></h3>
                                 <img src="<?= base_url('asset/img/post/') . $detail['img'] ?>" alt="" width="100%" />
                             </div>
                             <p>
                                 <?= html_entity_decode($detail['isi']) ?>
                             </p>
                             <div class="post-image">
                                 <?php $foto = $this->db->get_where('tb_media', array('id_post' => $detail['id_post']))->result();
                                    foreach ($foto as $f) : ?>
                                     <img src="<?= base_url('asset/img/post/') . $f->img ?>" alt="" width="100%" class="pb-2" />
                                 <?php endforeach ?>
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
             <div class="span4">
                 <?php $this->load->view('template/sidebar'); ?>
             </div>
         </div>
     </div>
 </section>

 </div>
 <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>