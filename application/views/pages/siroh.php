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
                                 <img src="<?= base_url('asset/img/post/')  ?>sirohfoto.jpg" alt="" width="100%" />
                             </div>
                             <div class="span3">
                                 <img src="<?= base_url('asset/img/post/')  ?>siroh.jpg" alt="" width="100%" />
                             </div>
                             <div class="span4">

                                 <h4><?= $detail['title'] ?></h4>
                                 <p>
                                     Simpanan Haji (SIJI) adalah simpanan anggota yang disimpan untuk perencanaan perjalanan Umroh untuk anggota sendiri maupun bersama keluarga. Dengan jangka waktu menyimpan disesuaikan sampai dengan jumlah saldo mencukupi untuk biaya Umroh. Simpanan ini mendapatkan Nisbah Bagi Hasil 30% setiap bulan untuk anggota penyimpan.

                                 </p>
                             </div>
                             <hr>
                             <div class="span4">

                                 <h4>Akad Syariah</h4>
                                 <p><strong>Mudharobah</strong> adalah pemilik modal menyerahkan modalnya kepada pekerja/pedagang/ pebisnis untuk diputar sebagai usaha, sedangkan keuntungan usaha dibagi menurut kesepakatan bersama. Atau, definisi lain menurut terminologi koperasi syariah, Mudharobah adalah bentuk kerja sama antara koperasi selaku pemilik dana (shahibul maal) dengan anggotanya atau pihak lain yang bertindak selaku pengelola dana (mudharib) produktif dan halal.
                                 </p>
                             </div>
                             <hr>
                             <h4>Persyaratan</h4>
                             <p>
                             <ul>
                                 <li>Menjadi anggota KOSPE</li>
                                 <li>Membayar biaya administrasi Rp 10.000,-</li>
                                 <li>Melakukan penyetoran awal sebesar Rp. 100.000,-</li>
                                 <li>Simpanan selanjutnya minimal Rp 100.000,-</li>
                                 <li>Simpanan hanya bisa diambil sesuai tujuan simpanan</li>
                             </ul>
                             </p>
                             <hr>
                             <h4>Bagi Hasil</h4>
                             <p>Ada Bagi Hasil</p>

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
 </section>