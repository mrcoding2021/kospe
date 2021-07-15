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
                                 <img src="<?= base_url('asset/img/post/') ?>legalitas.jpg" alt="" width="100%" />
                             </div>
                             <h4>
                                 LANDASAN USAHA
                             </h4>
                             <p>
                                 Undang – undang nomor 25 tahun 1992 tentang perkoperasian (Lmebaran Negara Nomor 116 Tahun 1992, Tambahan Lembaran Negara NoMor 3502).
                                 <br><br>
                                 <a class="btn btn-danger" href="http://nik.depkop.go.id/Detail.aspx?KoperasiId=3275070060001">Izin Nasional Kementrian Koperasi dan UKM</a>
                             </p>
                             <hr>
                             <div class="span4">
                                 <img src="<?= base_url('asset/img/post/') ?>7.jpg" alt="" width="100%" />
                                 <br>
                                 Pengesahan Badan Hukum No. 30/BH/INDAGKOPV2012, tanggal 4 Mei 2012 dari Kementerian Negera Koperasi dan Usaha Kecil dan Menengah Repubik Indonesia
                             </div>
                             <div class="span3">
                                 <img src="<?= base_url('asset/img/post/') ?>8.jpg" alt="" width="100%" />
                                 <br>
                                 Surat Izin Usaha Perdagangan (SIUP), No. 510/075 Kc.Bu/MIKRO/IX/2012 Dari Badan Pelayanan Perizinan Terpadu dan Penanaman Modal Pemerintah Kota Bekasi.
                             </div>
                             <div class="span4">
                                 <img src="<?= base_url('asset/img/post/') ?>9.jpg" alt="" width="100%" />
                                 <br>
                                 anda Daftar Perusahaan Koperasi (TDP) No. 102626400239 dari Badan
                                 Pelayanan Perizinan dan Penanaman Modal Pemerintah Kota Bekasi
                             </div>
                             <div class="span3">
                                 <img src="<?= base_url('asset/img/post/') ?>10.jpg" alt="" width="100%" />
                                 <br>
                                 Nomor Pokok Wajib Pajak : 31.559.333.5-407.000 dari Departemen JenderalPajak Departemen Keuangan Republik Indonesia.
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
 </section>