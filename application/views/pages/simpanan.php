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

                 <?php $this->load->view('pages/sidebar'); ?>

             </div>

             <div class="span8">

                 <article>

                     <div class="row">

                         <div class="span8">

                             <div class="post-image">

                                 <img src="<?= base_url('asset/img/post/')  ?>simprofoto.jpg" alt="" width="100%" />

                             </div>







                             <h4><?= $detail['title'] ?></h4>

                             <p>

                                 Produk Simpannan adalah Fasilitas keuangan untuk anggota KoSPE untuk meningkatkan nilai keuangan tersebut sesuai akad-akad syariah yang berlaku. Jenis dan jumlah simpanan bisa disesuikan dengan akad kerjasama yang telah dibuat KoSPE. Bagi hasil yang diberikan pun bervariasi tergantung jumlah setoran dan jangka waktu penyimpanan.

                             </p>



                             <p>

                                 <Strong>

                                     Dari segi jenis dan peruntukannya, Produk Simpanan yang ada di KoSPE antara lain :

                                 </Strong>

                             <ul>

                                 <?php $this->db->order_by('id_menu', 'DESC');

                                    $produk = $this->db->get_where('tb_menu', array('acces' => 3, 'parent' => 23))->result();

                                    foreach ($produk as $key) : ?>

                                     <a href="<?= $key->attr_href ?>" style="color: black; ">

                                         <li>

                                             <?= $key->nama ?>

                                         </li>

                                     </a>

                                 <?php endforeach ?>

                             </ul>

                             </p>





                             <hr>

                             <h4>Persyaratan Umum</h4>

                             <p>

                             <ul>

                                 <li>Menjadi anggota aktif KOSPE</li>

                                 <li>Membayar biaya administrasi Rp 10.000,-</li>

                                 <li>Melakukan penyetoran awal sebesar Rp. 100.000,-</li>

                                 <li>Simpanan selanjutnya minimal Rp 100.000,-</li>

                                 <li>Simpanan hanya bisa diambil sesuai tujuan simpanan</li>

                             </ul>

                             </p>

                             <hr>

                             <h4>Tabel Bagi Hasil</h4>

                             <p>

                                 <img src="<?= base_url('asset/img/')  ?>basil.jpg" alt="">

                             </p>





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