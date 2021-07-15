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

             <div class="span8">
                 <?php foreach ($post as $key) : ?>
                     <?php $slug = strtolower(str_replace(' ', '-', $key->judul));
                        ?>
                     <article>
                         <div class="row">
                             <div class="span8">
                                 <div class="post-image">
                                     <div class="post-heading">
                                         <h3><a href="<?= base_url('home/detail/' . $slug) ?>"><?= $key->judul ?></a></h3>
                                     </div>
                                     <img src="<?= base_url('asset/img/post/') . $key->img ?>" alt="" />
                                 </div>
                                 <p>
                                     <?= substr($key->isi, 0, 300) ?>
                                 </p>
                                 <div class="bottom-article">
                                     <ul class="meta-post">
                                         <li><i class="icon-calendar"></i><a href="#"> <?= shortdate_indo($key->date) ?></a></li>
                                         <li><i class="icon-user"></i><a href="#"> Admin</a></li>
                                         <li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
                                         <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                                     </ul>
                                     <a href="<?= base_url('post/' . str_replace('/', '', shortdate_indo($key->date))) . '/' . str_replace(' ', '-', $key->judul) ?>" class="pull-right btn btn-danger">Continue reading <i class="icon-angle-right"></i></a>
                                 </div>
                             </div>
                         </div>
                     </article>
                 <?php endforeach ?>


                 <div id="pagination">
                     <span class="all">Page 1 of 3</span>
                     <span class="current">1</span>
                     <a href="#" class="inactive">2</a>
                     <a href="#" class="inactive">3</a>
                 </div>
             </div>
             <div class="span4">
                 <?php $this->load->view('template/sidebar'); ?>
             </div>
         </div>
     </div>
 </section>

 </div>
 <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>