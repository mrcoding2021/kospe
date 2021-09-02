 <form class="input-data-pembiayaan" data-table="tb_datapembiayaan" method="post">
   <!-- data rekening  -->

   <h6 class="text-primary">Data Rekening</h6>
   <hr>
   <div class="form-group row">
     <label class="col-sm-2 col-form-label">No. Rekening</label>
     <div class="col-sm-4">
       <?php $this->db->order_by('id', 'desc');
        $no_rek = $this->db->get('tb_datapembiayaan', 1)->row();
        if ($no_rek == null) {
          $number = 1;
        } else {
          $number = $no_rek->no + 1;
        }
        ?>
       <input type="text" name="no_rek" data-id="<?= $number ?>" id="no_rek" readonly class="form-control">
     </div>
     <label class="col-sm-2 col-form-label">No. Akad</label>
     <div class="col-sm-4">
       <input type="text" name="no_akad" class="form-control">
       <input type="hidden" name="no" value="<?= $number ?>" class="form-control">
     </div>
   </div>
   <div class="form-group row">
     <label class="col-sm-2 col-form-label">Jenis Pembiayaan</label>
     <div class="col-sm-4">
       <select name="jns_pembiayaan" class="form-control">
         <option value="">Pilih Jenis Pembiayaan</option>
         <?php $this->db->where('kategori', 2);
          $jns_biaya = $this->db->get('tb_kategori')->result();
          $kategori = $this->db->get('tb_akad')->result();
          foreach ($jns_biaya as $p) { ?>
           <option value="<?= $p->kode ?>"><?= $p->kode . ' - ' . $p->nama ?></option>
         <?php } ?>
       </select>
     </div>
     <label class="col-sm-2 col-form-label">Tipe Angsuran</label>
     <div class="col-sm-4">
       <select name="tipe_angsuran" class="form-control">
         <option value="Flat">001 - Flat</option>
         <option value="Non-Flat">002 - Non Flat</option>
       </select>
     </div>
   </div>
   <div class="form-group row">
     <label class="col-sm-2 col-form-label">Tgl. Aplikasi</label>
     <div class="col-sm-4">
       <input type="date" name="tgl_aplikasi" class="form-control">
     </div>
     <label class="col-sm-2 col-form-label">Tgl. Persetujuan</label>
     <div class="col-sm-4">
       <input type="date" name="tgl_setuju" class="form-control">
     </div>
   </div>
   <div class="form-group row">
     <label class="col-sm-2 col-form-label">Tgl..Dropping</label>
     <div class="col-sm-4">
       <input type="date" name="tgl_dropping" class="form-control">
     </div>
     <label class="col-sm-2 col-form-label">Tgl. Jatuh Tempo</label>
     <div class="col-sm-4">
       <input type="text" name="tgl_jatuh_tempo" class="form-control">
     </div>
   </div>
   <br>
   <h6 class="text-primary">Data Anggota</h6>
   <hr>
   <div class="form-group row">
     <label class="col-sm-2 col-form-label">No. ID. Anggota</label>
     <div class="col-sm-4">
       <input type="text" name="id_kospe" class="form-control">
     </div>
     <label class="col-sm-2 col-form-label">Nama Anggota</label>
     <div class="col-sm-4">
       <input type="text" name="nama" class="form-control">
     </div>
   </div>
   <div class="form-group row">
     <label class="col-sm-2 col-form-label">Kode Kantor</label>
     <div class="col-sm-4">
       <input type="text" name="kantor" value="1" class="form-control">
     </div>
     <label class="col-sm-2 col-form-label">Kode Cabang</label>
     <div class="col-sm-4">
       <select name="cabang" class="form-control">
         <option value="0">Pilih Kategori</option>
       </select>
     </div>
   </div>
   <div class="form-group row">
     <label class="col-sm-2 col-form-label">Nama Istri/Suami</label>
     <div class="col-sm-4">
       <input type="text" name="pasangan" class="form-control">
     </div>
     <label class="col-sm-2 col-form-label">No. Telp/HP</label>
     <div class="col-sm-4">
       <input type="text" name="hp" class="form-control">
     </div>
   </div>
   <div class="form-group row">
     <label class="col-sm-3 col-form-label">Saudara Tidak Serumah</label>
     <div class="col-sm-4">
       <input type="text" name="nama_saudara" class="form-control">
       <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
     </div>
     <label class="col-sm-2 col-form-label">Telp. Saudara</label>
     <div class="col-sm-3">
       <input type="text" name="telp_saudara" class="form-control">
     </div>
   </div>
   <div class="form-group row">
     <label class="col-sm-2 col-form-label">Alamat Saudara</label>
     <div class="col-sm-10">
       <input type="text" name="alamat_saudara" class="form-control">
     </div>

   </div>
   <br>
   <h6 class="text-primary">Data Produk</h6>
   <hr>
   <div class="form-group row">
     <label class="col-sm-2 col-form-label">Produk</label>
     <div class="col-sm-4">
       <select name="produk" id="produk" class="form-control">
         <option value="">Pilih Produk Pembiayaan</option>
         <?php $produk = $this->db->get('tb_produk_pembiayaan')->result();
          $kategori = $this->db->get('tb_akad')->result();
          foreach ($produk as $p) { ?>
           <option value="<?= $p->kode ?>"><?= $p->kode . ' - ' . $p->produk ?></option>
         <?php } ?>
       </select>
     </div>
     <label class="col-sm-2 col-form-label">Akad Syariah</label>
     <div class="col-sm-4">
       <select name="akad" class="form-control">
         <option>Pilih Jenis Akad</option>
         <?php foreach ($kategori as $p) { ?>
           <option value="<?= $p->kode ?>"><?= $p->kode . ' - ' . $p->nama ?></option>
         <?php } ?>
       </select>
     </div>
   </div>
   <div class="form-group row">
     <div class="col-sm-10">
       <!-- <a href="#" class="save btn btn-success"><i class="fa fa-check-circle"></i> Simpan</a> -->
       <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Simpan</button>
     </div>
   </div>
 </form>