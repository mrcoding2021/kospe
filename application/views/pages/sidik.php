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
             <div class="span8">
                 <article>
                     <div class="row">
                         <div class="span8">
                             <div class="post-image">
                                 <img src="<?= base_url('asset/img/post/')  ?>sidikfoto.jpg" alt="" width="100%" />
                             </div>
                             <div class="span3">
                                 <img src="<?= base_url('asset/img/post/')  ?>sidik.jpg" alt="" width="100%" />
                             </div>
                             <div class="span4">

                                 <h4><?= $detail['title'] ?></h4>
                                 <p>
                                     Adalah simpanan Anggota untuk perencanaan biaya Pendidikan, baik biaya pendaftaran masuk sekolah atau kuliah atau pesantren atau daftar ulang. Disetor setiap bulan sesuai jangka waktu sesuai kesepakatan . Dengan nisbah bagi hasil setiap bulan untuk anggota penyimpan.
                                 </p>
                             </div>
                             <hr>
                             <div class="span4">

                                 <h4>Akad Syariah</h4>
                                 <p><strong>Mudharobah</strong> adalah pemilik modal menyerahkan modalnya kepada pekerja/pedagang/ pebisnis untuk diputar sebagai usaha, sedangkan keuntungan usaha dibagi menurut kesepakatan bersama. Atau, definisi lain menurut terminologi koperasi syariah, Mudharobah adalah bentuk kerja sama antara koperasi selaku pemilik dana (shahibul maal) dengan anggotanya atau pihak lain yang bertindak selaku pengelola dana (mudharib) produktif dan halal.
                                 </p>
                             </div>
                             <hr>
                             <h4>Mekanisme :</h4>
                             <p>
                             <ul>
                                 <li>Menjadi anggota KOSPE</li>
                                 <li>Bebas biaya administrasi bulanan</li>
                                 <li>Pembukaan Rekening Simpanan Rp.10.000,-</li>
                                 <li>Penyetoran Awal Sebesar Rp.100.000</li>
                                 <li>Setoran minimal Rp. 100.000,- / bulan</li>
                                 <li>Bagi hasil masuk ke rek.Simpanan Pendidikan</li>
                             </ul>
                             </p>
                             <hr>
                             <h4>Bagi Hasil</h4>
                             <p>Ada Bagi Hasil</p>

                             <h4>Cara Buka Produk Simpanan</h4>
                             <iframe width="100%" height="450" src="https://www.youtube.com/embed/gPkT7XZgtfY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                             <a href="https://www.youtube.com/channel/UCj7new7-5zDU0eR19fc_zeg" class="btn btn-sm btn-primary">Subscribe Youtube Channel KoSPE</a>
                             <a href="https://wa.me/628118807177" class="btn btn-sm btn-danger">Tanya CRM KoSPE</a>
                         </div>
                     </div>
                 </article>



             </div>
         </div>
     </div>
 </section>