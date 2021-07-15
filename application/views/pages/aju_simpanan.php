 <section id="inner-headline">
   <div class="container">
     <div class="row">
       <div class="span8">
         <div class="inner-heading">
           <h2><?= $title ?></h2>
         </div>
       </div>
       <div class="span4">
         <ul class="breadcrumb">
           <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
           <li><a href="#"><?= $parent ?></a><i class="icon-angle-right"></i></li>
           <li class="active"><?= $title ?></li>
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
             <form action="<?= base_url('home/kirim') ?>" method="post" role="form" class="contactForm">
               <div id="sendmessage">Your message has been sent. Thank you!</div>
               <div id="errormessage"></div>
               <div class="row">
                 <h4>Data Pribadi</h4>
                 <hr>
                 <div class="span4 ">
                   <label for="">Jenis Pembiayaan</label>
                   <select name="jns_biaya" id="" class="form-control">
                     <option value="Modal Usha">Modal Usaha</option>
                     <option value="Multiguna">Multiguna</option>
                     <option value="Lain-lain">Lain-lain</option>
                   </select>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Pengajuan</label>
                   <select name="pengajuan" id="" class="form-control">
                     <option value="Baru">Baru</option>
                     <option value="Penambahan">Penambahan</option>
                   </select>

                 </div>
                 <div class="span4">
                   <label for="">Nama Lengkap</label>
                   <input type="text" name="nama" id="text" class="form-control" placeholder="Nama lengkap" data-rule="text" data-msg="Please enter a valid text" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Tempat, tanggal lahir</label>
                   <input type="text" name="ttl" id="subject" class="form-control" placeholder="Bekasi, 17-08-1990" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
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
                   <input type="text" name="ktp" id="subject" class="form-control" placeholder="3201126451949" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">No. NPWP</label>
                   <input type="text" name="npwp" id="subject" class="form-control" placeholder="721.121.215.125" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
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
                   <input type="text" name="alamat_ktp" id="subject" class="form-control" placeholder="jl, gading , kec. kab, bekasi" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">No. Tlp Rumah</label>
                   <input type="text" name="tlp_rumah" id="subject" class="form-control" placeholder="02129620545" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">No. HP</label>
                   <input type="text" name="hp" id="subject" class="form-control" placeholder="08132233445566" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span8 ">
                   <label for="">Alamat Saat ini / Domisili</label>
                   <input type="text" name="domisili" id="subject" class="form-control" placeholder="jl, gading , kec. kab, bekasi" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span3 ">
                   <label for="">Lama Tinggal</label>
                   <input type="text" name="lama_tinggal" id="subject" class="form-control" placeholder="12 tahun" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span3 ">
                   <label for="">Status Rumah / Tempat Tinggal</label>
                   <select name="status_rmh" id="" class="form-control">
                     <option value="Milik Sendiri">Milik Sendiri</option>
                     <option value="Milik Orang Tua">Milik Orang Tua</option>
                     <option value="Sewa / Kontrak">Sewa / Kontrak</option>
                   </select>
                 </div>

                 <div class="span3 ">
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
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Nama Ibu Kandung</label>
                   <input type="text" name="ibu" id="subject" class="form-control" placeholder="Ibu Markonah" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>

               </div>
               <div class="row">
                 <h4>Data Pekerjaan Pemohon</h4>
                 <hr>
                 <div class="span4 ">
                   <label for="">Nama Instansi / Perusahaan</label>
                   <input type="text" name="pt" id="subject" class="form-control" placeholder="PT. Angin Ribut Sejahtera" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Lama Bekerja</label>
                   <input type="text" name="lama_bekerja" id="subject" class="form-control" placeholder="1 tahun" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Jabatan / Bagian / Divisi</label>
                   <input type="text" name="divisi" id="subject" class="form-control" placeholder="Manager Keuangan" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Nama Atasan Langsung</label>
                   <input type="text" name="atasan" id="subject" class="form-control" placeholder="Muhammad Syafii" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Alamat Instansi / Perusahaan</label>
                   <input type="text" name="alaamat_pt" id="subject" class="form-control" placeholder="Jl/ mangga Besar, Bekasi" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">No. Tlp Kantor</label>
                   <input type="text" name="tlp_pt" id="subject" class="form-control" placeholder="021.2924578" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Est. Pesawat</label>
                   <input type="text" name="ext_pt" id="subject" class="form-control" placeholder="Manager Keuangan" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Level HNI (Khusus Member)</label>
                   <input type="text" name="hni" id="subject" class="form-control" placeholder="AB / M / SM / ED / LED" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
               </div>
               <div class="row">
                 <h4>Data Suami / Istri</h4>
                 <hr>
                 <div class="span4 ">
                   <label for="">Nama Lengkap</label>
                   <input type="text" name="nama_istri" id="subject" class="form-control" placeholder="nama lengkap" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Pekerjaan</label>
                   <input type="text" name="pekerjaan" id="subject" class="form-control" placeholder="Ibu Rumah Tangga / Karyawan Swasa / PNS / Guru / dll" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Nama Instansi / Perusahaan</label>
                   <input type="text" name="pt_istri" id="subject" class="form-control" placeholder="PT. Angin Ribut Sejahtera" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Jabatan / Bagian / Divisi</label>
                   <input type="text" name="divisi_istri" id="subject" class="form-control" placeholder="Manager Keuangan" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Lama Bekerja</label>
                   <input type="text" name="lama_bekerja_istri" id="subject" class="form-control" placeholder="2 tahun" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">No. Tlp Kantor</label>
                   <input type="text" name="tlp_istri" id="subject" class="form-control" placeholder="Manager Keuangan" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Est. Pesawat</label>
                   <input type="text" name="ext_istri" id="subject" class="form-control" placeholder="Manager Keuangan" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>

               </div>
               <div class="row">
                 <h4>Data Penghasilan Perbulan</h4>
                 <hr>
                 <div class="span4 ">
                   <label for="">Penghasilan Pemohon</label>
                   <input type="text" name="penghasilan" id="subject" class="form-control" placeholder="10.000.000" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Penghasilan Tambahan</label>
                   <input type="text" name="pengahasilan_add" id="subject" class="form-control" placeholder="3.000.000" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>

                 <div class="span4 ">
                   <label for="">Keterangan Usaha Tambahan</label>
                   <input type="text" name="ket_usaha" id="subject" class="form-control" placeholder="Bisnis Galon air" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Penghasilan Suami / Istri</label>
                   <input type="text" name="penghasilan_istri" id="subject" class="form-control" placeholder="3.000.000" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Total Penghasilan</label>
                   <input type="text" name="total_penghasilan" id="subject" class="form-control" placeholder="16.000.000 " data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Jumlah Tanggungan</label>
                   <input type="text" name="family" id="subject" class="form-control" placeholder="istri dan Anak / Famili Lain serumah" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Pengeluaran Rutin</label>
                   <input type="text" name="out_rutin" id="subject" class="form-control" placeholder="11.000.000 " data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Angsuran Ditempat Lain</label>
                   <input type="text" name="hutang" id="subject" class="form-control" placeholder="3.000.000 " data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Sisa Penghasilan</label>
                   <input type="text" name="sisa" id="subject" class="form-control" placeholder="2.000.000 " data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
               </div>
               <div class="row">
                 <h4>Pengajuan Pembiayaan</h4>
                 <hr>
                 <div class="span4 ">
                   <label for="">Jumlah yang Dimohon</label>
                   <input type="text" name="jumlah_dimohon" id="subject" class="form-control" placeholder="10.000.000" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Jangka Waktu</label>
                   <input type="text" name="tenor" id="subject" class="form-control" placeholder="12/24/36 bulan" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4 ">
                   <label for="">Kemampuan Mengangsur Perbulan</label>
                   <input type="text" name="bayar_perbulan" id="subject" class="form-control" placeholder="1.000.000" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>

               </div>
               <div class="row">
                 <h4>Rincian Pembiayaan</h4>
                 <hr>
                 <div class="span8">
                   <label for="">Tujuan Pemanfaatan</label>
                   <input type="text" name="tujuan" id="subject" class="form-control" placeholder="Pengembangan Halalmart, Modal Usaha, Pembelian Sepeda Motor / Mobil, Biaya Pendidikan, Pembelian Lamat Elektronik" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4">
                   <label for="">Kesanggupan DP (Khusus Pembiayaan Kendaraan)</label>
                   <input type="text" name="dp" id="subject" class="form-control" placeholder="500.000" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required>
                   <div class="validation"></div>
                 </div>
                 <div class="span4">
                   <label for="">Agunan / Jaminan</label>
                   <select name="agunan" id="">
                     <option value="SHM">SHM</option>
                     <option value="BPKB">BPKB</option>
                     <option value="Logam Mulia">Logam Mulia</option>
                   </select>
                   
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