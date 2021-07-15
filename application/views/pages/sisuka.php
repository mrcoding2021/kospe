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
                                 <img src="<?= base_url('asset/img/post/')  ?>sisukafoto.jpg" alt="" width="100%" />
                             </div>
                             <div class="span3">
                                 <img src="<?= base_url('asset/img/post/')  ?>sisuka.jpg" alt="" width="100%" />
                             </div>
                             <div class="span4">

                                 <h4><?= $detail['title'] ?></h4>
                                 <p>
                                     Simpanan Sukarela (SISUKA) Adalah simpanan dengan akad wadiah ya dhomanah yang di setor setiap saat dengan jumlah tidak ditentukan dan boleh di tarik kapan saja oleh anggota

                                 </p>
                             </div>
                             <hr>
                             <div class="span4">

                                 <h4>Akad Syariah</h4>
                                 <p><strong> Wadiah yad adh-dhamanah</strong> adalah akad penitipan uang, dimana pihak koperasi (pihak yang dititipi) boleh memanfaatkan uang milik nasabah (pihak penitip).
                                     Pihak yang dititipi boleh secara bebas mengelola uang titipan anggota tersebut.
                                     Anggota (pihak penitip) boleh mengambil uang sewaktu-waktu atau kapanpun kehendaki, dan pihak yang dititipi harus siap memberikannya secara utuh.

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
                             <p>Tidak Ada Bagi Hasil</p>

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