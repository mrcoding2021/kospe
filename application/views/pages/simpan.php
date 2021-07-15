 <style>
   select {
     width: 100%;
     height: 40px;
     background-color: white;
   }

   select option {
     height: 40px;
   }
 </style>
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

         <div class="row">
           <h6><?= $this->session->flashdata('alert') ?></h6>
           <div class="span8">
             <form action="<?= base_url('home/save') ?>" method="post" role="form" class="contactForm">

               <div id="errormessage"></div>
               <div class="row">
                 <h5> Bismillahirrohmanirrohim, Saya ingin mmembuka produk simpanan KoSPE</h5>
                 <div class="span4">
                   <label for="">Pilihan Program Akad Mudhorobah</label>
                   <select name="program" class="form-control">
                     <?php foreach ($program as $key) : ?>
                       <option value="<?= $key->id_kategori ?>"><?= $key->nama ?> </option>
                     <?php endforeach ?>
                   </select>
                 </div>
                 <div class="span4">
                   <label for="">Setoran Awal</label>
                   <input type="text" name="setor_awal" class="form-control" placeholder="minimal 100.000" data-rule="text" data-msg="Please enter a valid text" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4">
                   <label for="">Setoran Perbulan</label>
                   <input type="text" name="setor_bln" class="form-control" placeholder="kelipatan 50.000" data-rule="text" data-msg="Please enter a valid text" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4">
                   <label for="">Jangka Waktu Simpanan</label>
                   <select name="tenor" class="form-control">
                     <option value="12">12 bulam</option>
                     <option value="24">24 bulan</option>
                     <option value="36">36 bulan</option>
                     <option value="48">48 bulan</option>
                     <option value="60">60 bulan</option>
                     <option value="10">10 tahun</option>
                   </select>
                 </div>
                 <div class="span4">
                   <label for="">Nama Lengkap</label>
                   <input type="text" name="nama" class="form-control" placeholder="Nama lengkap" data-rule="text" data-msg="Please enter a valid text" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Tempat, tanggal lahir</label>
                   <input type="text" name="ttl" class="form-control" placeholder="Bekasi, 17-08-1990" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Pendidikan Terakhir</label>
                   <select name="pendidikan" id="" class="form-control">
                     <option value="SMA">SMA</option>
                     <option value="D3">D3</option>
                     <option value="Sarjana">Sarjana</option>
                   </select>

                 </div>
                 <div class="span4 ">
                   <label for="">No. KTP</label>
                   <input type="text" name="ktp" class="form-control" placeholder="3201126451949" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">No. NPWP</label>
                   <input type="text" name="npwp" class="form-control" placeholder="721.121.215.125" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Jenis Kelamin</label>
                   <select name="sex" id="" class="form-control">
                     <option value="Laki-laki">Laki-laki</option>
                     <option value="perempuan">Perempuan</option>
                   </select>
                 </div>
                 <div class="span8 ">
                   <label for="">Alamat Sesuai KTP</label>
                   <input type="text" name="alamat_ktp" class="form-control" placeholder="jl, gading , kec. kab, bekasi" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">No. Tlp Rumah</label>
                   <input type="text" name="tlp_rumah" class="form-control" placeholder="02129620545" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">No. HP</label>
                   <input type="text" name="hp" class="form-control" placeholder="08132233445566" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Email</label>
                   <input type="text" name="email" class="form-control" placeholder="ahmad@gmail.com" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Id. Anggota KoSPE</label>
                   <input type="text" name="id_kospe" class="form-control" placeholder="01.000011" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span8 ">
                   <label for="">Alamat Saat ini / Domisili</label>
                   <input type="text" name="domisili" class="form-control" placeholder="jl, gading , kec. kab, bekasi" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Agama</label>
                   <input type="text" name="agama" class="form-control" placeholder="islam" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Nama Ibu Kandung</label>
                   <input type="text" name="ibu" class="form-control" placeholder="Ibu Markonah" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Nama Ahli Waris 1</label>
                   <input type="text" name="waris" class="form-control" placeholder="Salim" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Nama Ahli Waris 2</label>
                   <input type="text" name="waris2" class="form-control" placeholder="Salwa" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
               </div>
               <button class="btn btn-large btn-theme margintop10" type="submit">kirim pengajuan</button>
             </form>
           </div>
         </div>




       </div>
       <div class="span4">
         <?php $this->load->view('template/sidebar'); ?>
       </div>
     </div>
   </div>
 </section>