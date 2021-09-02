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
             <form action="<?= base_url('home/kirim_hni') ?>" method="post" role="form" class="contactForm">

               <div class="row">
                 <h4>Data Pribadi</h4>
                 <hr>
                 <div class="span8">
                   <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                   <label for="">ID. Anggota KoSPE</label>
                   <input type="text" name="id_kospe" id="text" class="form-control" placeholder="Nama lengkap" data-rule="text" data-msg="Please enter a valid text" required>
                 </div>
                 <div class="span4 ">
                   <label for="">Jenis Pembiayaan</label>
                   <select name="jns_biaya" id="" class="form-control">
                     <option value="Modal Usaha">Modal Usaha</option>
                   </select>
                 </div>
                 <div class="span4">
                   <label for="">Pengajuan</label>
                   <select name="pengajuan" id="" class="form-control">
                     <option value="Baru">Baru</option>
                     <option value="Penambahan">Penambahan</option>
                   </select>
                 </div>
                 <div class="span4">
                   <label for="">Nama Lengkap</label>
                   <input type="text" name="nama" id="text" class="form-control" placeholder="Nama lengkap" data-rule="text" data-msg="Please enter a valid text" required>
                 </div>
                 <div class="span4 ">
                   <label for="">Tempat, tanggal lahir</label>
                   <input type="text" name="ttl" id="subject" class="form-control" placeholder="Bekasi, 17-08-1990" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
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
                   <input type="text" name="ktp" id="subject" class="form-control" placeholder="3201126451949" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span4 ">
                   <label for="">No. NPWP</label>
                   <input type="text" name="npwp" id="subject" class="form-control" placeholder="721.121.215.125" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
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
                   <input type="text" name="alamat_ktp" id="subject" class="form-control" placeholder="jl, gading , kec. kab, bekasi" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span4 ">
                   <label for="">No. Tlp Rumah</label>
                   <input type="text" name="tlp_rumah" id="subject" class="form-control" placeholder="02129620545" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span4 ">
                   <label for="">No. HP</label>
                   <input type="text" name="hp" id="subject" class="form-control" placeholder="08132233445566" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span8 ">
                   <label for="">Alamat Saat ini / Domisili</label>
                   <input type="text" name="domisili" id="subject" class="form-control" placeholder="jl, gading , kec. kab, bekasi" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span4 ">
                   <label for="">Lama Tinggal</label>
                   <input type="text" name="lama_tinggal" id="subject" class="form-control" placeholder="12 tahun" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span4 ">
                   <label for="">Status Rumah / Tempat Tinggal</label>
                   <select name="status_rmh" id="" class="form-control">
                     <option value="Milik Sendiri">Milik Sendiri</option>
                     <option value="Milik Orang Tua">Milik Orang Tua</option>
                     <option value="Sewa / Kontrak">Sewa / Kontrak</option>
                   </select>
                 </div>
                 <div class="span4 ">
                   <label for="">Status</label>
                   <select name="status_kawin" id="" class="form-control">
                     <option value="Lajang">Lajang</option>
                     <option value="Menikah">Menikah</option>
                     <option value="Duda/Janda">Duda/Janda</option>
                   </select>
                 </div>
                 <div class="span4 ">
                   <label for="">Agama</label>
                   <input type="text" name="agama" id="subject" class="form-control" placeholder="08132233445566" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span4 ">
                   <label for="">Nama Ibu Kandung</label>
                   <input type="text" name="ibu" id="subject" class="form-control" placeholder="Ibu Markonah" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
               </div>
               <div class="row">
                 <h4>Data Suami / Istri / Kerabat Terdekat tidak serumah</h4>
                 <hr>
                 <div class="span4 ">
                   <label for="">Nama</label>
                   <input type="text" name="nama_istri" placeholder="Abdul Rohman" class="form-control" data-rule="minlen:4" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4">
                   <label for="">Pekerjaan</label>
                   <input type="text" name="pekerjaan" placeholder="IRT" class="form-control" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4">
                   <label for="">No. Tlp Istri / Suami</label>
                   <input type="text" name="tlp_istri" placeholder="08787816481" class="form-control" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4">
                   <label for="">Alamat Kerabat tidak serumah</label>
                   <input type="text" name="alamat_kerabat" placeholder="bekasi" class="form-control" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4">
                   <label for="">No. Kerabat tidak serumah</label>
                   <input type="text" name="tlp_kerabat" placeholder="08787816481" class="form-control" required>
                   <div class="validation"></div>
                 </div>
               </div>
               <div class="row">
                 <h4>Data Keagenan HNI</h4>
                 <hr>
                 <div class="span4 ">
                   <label for="">ID. HNI</label>
                   <input type="text" name="id_hni" id="subject" class="form-control" placeholder="00513475" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4">
                   <label for="">Pangkat HNI</label>
                   <select name="pangkat_agen" id="" class="form-control">
                     <option value="AB">AB</option>
                     <option value="M">M</option>
                     <option value="SM">SM</option>
                     <option value="D">D</option>
                     <option value="ED">ED</option>
                     <option value="LED">LED</option>
                   </select>
                 </div>
                 <div class="span4">
                   <label for="">Status Agen Stok HNI</label>
                   <select name="status_agen" id="" class="">
                     <option value="Agen Biasa">Agen Biasa (AB)</option>
                     <option value="Stock Center">Stock Center (SC)</option>
                     <option value="Distribution Center">Distribution Center (DC)</option>
                     <option value="Agency Center">Agency Center (AC)</option>
                     <option value="Business Center">Business Center (BC)</option>
                   </select>
                 </div>
                 <div class="span4 ">
                   <label for="">ID. BC Perekomendasi</label>
                   <input type="text" name="hni" id="subject" class="form-control" placeholder="00513475" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span4 ">
                   <label for="">Nama LED BC Perekomenasi</label>
                   <input type="text" name="nama_led" id="subject" class="form-control" placeholder="Agus Supriyanto" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span4 ">
                   <label for="">Id. LED BC Perekomendasi</label>
                   <input type="text" name="id_led" id="subject" class="form-control" placeholder="00513475" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
               </div>
               <div class="row">
                 <h4>Data Penghasilan Perbulan</h4>
                 <hr>
                 <div class="span4 ">
                   <label for="">Penghasilan Pemohon</label>
                   <input type="text" name="penghasilan" id="subject" class="form-control" placeholder="10.000.000" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span4 ">
                   <label for="">Penghasilan HNI</label>
                   <input type="text" name="pengahasilan_add" id="subject" class="form-control" placeholder="3.000.000" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span4 ">
                   <label for="">Penghasilan Suami / Istri</label>
                   <input type="text" name="penghasilan_istri" id="subject" class="form-control" placeholder="3.000.000" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span4 ">
                   <label for="">Total Penghasilan</label>
                   <input type="text" name="total_penghasilan" id="subject" class="form-control" placeholder="16.000.000 " data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span4 ">
                   <label for="">Jumlah Tanggungan</label>
                   <input type="text" name="family" id="subject" class="form-control" placeholder="istri dan Anak / Famili Lain serumah" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span4 ">
                   <label for="">Pengeluaran Rutin</label>
                   <input type="text" name="out_rutin" id="subject" class="form-control" placeholder="11.000.000 " data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span4 ">
                   <label for="">Angsuran Ditempat Lain</label>
                   <input type="text" name="hutang" id="subject" class="form-control" placeholder="3.000.000 " data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span4 ">
                   <label for="">Sisa Penghasilan</label>
                   <input type="text" name="sisa" id="subject" class="form-control" placeholder="2.000.000 " data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
               </div>
               <div class="row">
                 <h4>Pengajuan Pembiayaan</h4>
                 <hr>
                 <div class="span4 ">
                   <label for="">Jumlah yang Dimohon</label>
                   <input type="text" name="jumlah_dimohon" id="subject" class="form-control" placeholder="10.000.000" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span4 ">
                   <label for="">Jangka Waktu</label>
                   <input type="text" name="tenor" id="subject" class="form-control" placeholder="12/24/36 bulan" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span4 ">
                   <label for="">Kemampuan Mengangsur Perbulan</label>
                   <input type="text" name="bayar_perbulan" id="subject" class="form-control" placeholder="1.000.000" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                 </div>
                 <div class="span4">
                   <label for="">Tujuan Pemanfaatan Modal Usaha</label>
                   <select name="tujuan" id="" class="form-control">
                     <option value="Agen Biasa">Agen Biasa</option>
                     <option value="Stock Center">Stock Center</option>
                     <option value="Distribution Center">Distribution Center</option>
                     <option value="Agency Center">Agency Center</option>
                     <option value="Business Center">Business Center</option>
                   </select>
                 </div>
                 <div class="span4">
                   <label for="">Jaminan</label>
                   <select name="jaminan" id="" class="form-control">
                     <option value="Simpanan Anggota KoSPE">Simpanan Anggota KoSPE</option>
                     <option value="SHM">SHM</option>
                     <option value="BPKB">BPKB</option>
                     <option value="Logam Emas">Logal Emas</option>
                   </select>
                 </div>
               </div>
           </div>
           <button class="btn btn-large btn-theme margintop10" type="submit">kirim pengajuan</button>
           </form>

         </div>
         <section id="upload" class="border-top py-5">
           <div class="container">
             <div class="row">
               <div class="span8">
                 <div class="bg-primary text-white p-1 text-center mb-2">
                   <h4>Download Persyaratan Berkas</h4>
                 </div>
                 <div class="form-group row text-center">
                   <div class="span2">
                     <a href="<?= base_url('download/file/1') ?>" class="btny btn-block btn-large btn-theme"><i class="text-success fa fa-file"></i> RENCANA ANGGARAN BELANJA</a>
                   </div>
                   <div class="span2">
                     <a href="<?= base_url('download/file/2') ?>" class="btny btn-block btn-large btn-theme"><i class="text-success fa fa-file"></i> SURAT PERSONAL GARANSI LED</a>
                   </div>
                   <div class="span2">
                     <a href="<?= base_url('download/file4') ?>" class="btny btn-block btn-large btn-theme"><i class="text-success fa fa-file"></i> SURAT POTONG BONUS HNI</a>
                   </div>
                 </div>
                 <p>Setelah di DOWNLOAD, silahkan di PRTINT kemudian di ISI dengan benar dan lengkap, lalu di SCAN jadi bentuk FILE, kemudian di UPLOAD pada isian dibawah ini</p>
               </div>
               <hr>
               <div class="span8">

                 <div class="form-group row ">
                   <h4>Upload Berkas</h4>
                   <label class=" col-form-label ktp"> No. Hp Pemohon </label>
                   <input type="text" name="id_hp" id="id_hp" class="form-control col-md-6">

                   <label class=" col-form-label ktp"> E-KTP Suami & Istri </label>
                   <input type="file" name="ktp" id="ktp" class=" form-control col-md-6">
                   <button type="button" class="u-ktp form-control col-md-2 btn btn-sm btn-success text-white mx-auto">Upload</button>

                   <label class=" col-form-label kk">Kartu Keluarga</label>
                   <input type="file" name="kk" id="kk" class="form-control col-md-6">
                   <button type="button" class="u-kk form-control col-md-2 btn btn-sm btn-success text-white mx-auto">Upload</button>

                   <label class=" col-form-label slip">Slip Gaji / Catatan Usaha 4 bln terakhir</label>
                   <input type="file" name="slip" id="slip" class="form-control col-md-6">
                   <button type="button" class="u-slip form-control col-md-2 btn btn-sm btn-success text-white mx-auto">Upload</button>

                   <label class=" col-form-label rab">Rencana Anggaran Belanja</label>
                   <input type="file" name="rab" id="rab" class="form-control col-md-6">
                   <button type="button" class="u-rab form-control col-md-2 btn btn-sm btn-success text-white mx-auto">Upload</button>

                   <label class=" col-form-label rekap">Rekap Penjualan di HSIS 1 tahun</label>
                   <input type="file" name="rekap" id="rekap" class="form-control col-md-6">
                   <button type="button" class="u-rekap form-control col-md-2 btn btn-sm btn-success text-white mx-auto">Upload</button>

                   <label class=" col-form-label garansi">Personal Garansi LED HNI</label>
                   <input type="file" name="garansi" id="garansi" class=" form-control col-md-6">
                   <button type="button" class="u-garansi form-control col-md-2 btn btn-sm btn-success text-white mx-auto">Upload</button>

                   <label class=" col-form-label bonus">Potong Bonus HNI</label>
                   <input type="file" name="bonus" id="bonus" class="form-control col-md-6">
                   <button type="button" class="u-bonus form-control col-md-2 btn btn-sm btn-success text-white mx-auto">Upload</button>

                 </div>
               </div>
             </div>
           </div>
         </section>
       </div>

       <div class="span4">
         <?php $this->load->view('template/sidebar'); ?>
       </div>
     </div>
   </div>
   </div>
 </section>