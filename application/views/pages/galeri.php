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
                 <article>
                     <div class="row">
                         <div class="span3">
                             <img src="<?= base_url('asset/img/dokumentasi/bukber pe ramadhan 1442 h/IMG-20210419-WA0071.jpg') ?>" alt="">

                         </div>
                         <div class="span5">
                             <h4>Bukber PE Ramadhan 1442 H</h4>
                             <ul class="meta-post">
                                 <li><i class="icon-user"></i><a href="#"> Bekasi, 17 Agustus 2021</a></li>
                             </ul>
                             <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id commodi labore nulla </p>
                             <a href="#" class=" btn btn-warning">Detail <i class="icon-angle-right"></i></a>
                         </div>
                         <hr>

                     </div>

                 </article>



             </div>
             <div class="span4">
                 <aside class="left-sidebar">

                     <div class="widget">
                         <h5 class="widgetheading">Menu Lain</h5>
                         <ul class="cat">
                             <?php $this->load->view('template/menu'); ?>
                         </ul>
                     </div>
                     <div class="widget">
                         <h5 class="widgetheading">Post Teerbaru</h5>
                         <ul class="recent">
                             <?php
                                $this->load->view('template/blog');
                                ?>
                         </ul>
                     </div>

                 </aside>
             </div>
         </div>
     </div>
 </section>