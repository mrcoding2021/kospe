 <form id="input-agunan" method="post" data-table="tb_agunan">

   <div class="form-group row">
     <label class="col-sm-1 col-form-label">No. Akad</label>
     <div class="col-sm-3">
       <input type="text" name="no_akad" class="form-control">
     </div>
     <label class="col-sm-2 col-form-label">Tipe Agunan</label>
     <div class="col-sm-3">
       <select name="tipe_agunan" class="form-control">
       
         <option>Pilih Jenis Agunan</option>
         <?php $tipe = $this->db->get('tipe_agunan')->result();
          foreach ($tipe as $t) { ?>
           <option value="<?= $t->alias ?>"><?= $t->nama ?></option>
           
         <?php } ?>
       </select>
     </div>
     <label class="col-sm-1 col-form-label">Asset</label>
     <div class="col-sm-2">
       <input type="text" name="jns_asset" readonly class="form-control">
     </div>

   </div>


   <div>
     <div class="shm">
       <div class="form-group row">
         <label class="col-sm-2 col-form-label">No. SHM</label>
         <div class="col-sm-4">
           <input type="text" name="no_agunan" class="form-control">
         </div>
         <label class="col-sm-2 col-form-label">Nama Pemilik</label>
         <div class="col-sm-4">
           <input type="text" name="pemilik" class="form-control">
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-2 col-form-label">Alamat Agunan</label>
         <div class="col-sm-10">
           <textarea type="text" name="alamat_agunan" class="form-control"></textarea>
         </div>
       </div>
     </div>

     <!-- BPKB Motor  -->
     <div class="bpkb-motor">
       <div class="form-group row">
         <label class="col-sm-2 col-form-label">No. BPKB Motor</label>
         <div class="col-sm-4">
           <input type="text" name="no_agunan" class="form-control">
         </div>
         <label class="col-sm-2 col-form-label">Nama Pemilik</label>
         <div class="col-sm-4">
           <input type="text" name="pemilik" class="form-control">
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-2 col-form-label">No. Polisi</label>
         <div class="col-sm-4">
           <input type="text" name="no_polisi" class="form-control">
         </div>
         <label class="col-sm-2 col-form-label">No. Rangka</label>
         <div class="col-sm-4">
           <input type="text" name="no_rangka" class="form-control">
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-2 col-form-label">No. Mesin</label>
         <div class="col-sm-4">
           <input type="text" name="no_mesin" class="form-control">
         </div>
         <label class="col-sm-2 col-form-label">Tahun Buat</label>
         <div class="col-sm-4">
           <input type="text" name="thn" class="form-control">
         </div>
       </div>
     </div>

     <!-- BPKB Motor  -->
     <div class="bpkb-mobil">
       <div class="form-group row">
         <label class="col-sm-2 col-form-label">No. BPKB Mobil</label>
         <div class="col-sm-4">
           <input type="text" name="no_agunan" class="form-control">
         </div>
         <label class="col-sm-2 col-form-label">Nama Pemilik</label>
         <div class="col-sm-4">
           <input type="text" name="pemilik" value="1" class="form-control">
         </div>
       </div>

       <div class="form-group row">
         <label class="col-sm-2 col-form-label">No. Polisi</label>
         <div class="col-sm-4">
           <input type="text" name="no_polisi" class="form-control">
         </div>
         <label class="col-sm-2 col-form-label">No. Rangka</label>
         <div class="col-sm-4">
           <input type="text" name="no_rangka" class="form-control">
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-2 col-form-label">No. Mesin</label>
         <div class="col-sm-4">
           <input type="text" name="no_mesin" class="form-control">
         </div>
         <label class="col-sm-2 col-form-label">Tahun Buat</label>
         <div class="col-sm-4">
           <input type="text" name="thn" class="form-control">
         </div>
       </div>
     </div>

     <!-- emas  -->
     <div class="emas">
       <div class="form-group row">
         <label class="col-sm-2 col-form-label">No. Surat</label>
         <div class="col-sm-4">
           <input type="text" name="no_agunan" class="form-control">
         </div>
         <label class="col-sm-2 col-form-label">Taksiran Harga</label>
         <div class="col-sm-4">
           <input type="text" name="taksiran_hrg" class="form-control">
         </div>
       </div>
     </div>

     <!-- cascol -->
     <div class="cascol">
       <div class="form-group row">
         <label class="col-sm-2 col-form-label">Produk Simpanan</label>
         <div class="col-sm-4">
           <input type="text" name="produk_simpanan" class="form-control">
         </div>
         <label class="col-sm-2 col-form-label">Nilai Simpanan</label>
         <div class="col-sm-4">
           <input type="text" name="nilai_simpanan" class="form-control">
         </div>

       </div>
     </div>

     <!-- peronal  -->
     <div class="personal">
       <div class="form-group row">
         <label class="col-sm-2 col-form-label">Nama LED</label>
         <div class="col-sm-4">
           <input type="text" name="nama_led" class="form-control">
         </div>
         <label class="col-sm-2 col-form-label">Alamat</label>
         <div class="col-sm-4">
           <input type="text" name="alamat_led" class="form-control">
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-2 col-form-label">ID. HNI</label>
         <div class="col-sm-4">
           <input type="text" name="id_hni" class="form-control">
         </div>
         <label class="col-sm-2 col-form-label">No. KTP</label>
         <div class="col-sm-4">
           <input type="text" name="ktp_led" class="form-control">
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-2 col-form-label">No. Tlp/HP</label>
         <div class="col-sm-4">
           <input type="text" name="tlp_led" class="form-control">
         </div>
         <label class="col-sm-2 col-form-label">Pangkat HNI</label>
         <div class="col-sm-4">
           <input type="text" name="pangkat_hni" class="form-control">
         </div>
       </div>
       <div class="form-group row">
         <label class="col-sm-2 col-form-label">Status Keagenan</label>
         <div class="col-sm-4">
           <input type="text" name="status_agen" class="form-control">
         </div>
       </div>
     </div>

     <!-- guarantee  -->
     <div class="corporate">
       <div class="form-group row">
         <label class="col-sm-2 col-form-label">Nama Corporate</label>
         <div class="col-sm-4">
           <input type="text" name="nama_corporate" class="form-control">
         </div>
         <label class="col-sm-2 col-form-label">Alamat Corporate</label>
         <div class="col-sm-4">
           <input type="text" name="alamat_corporate" class="form-control">
         </div>
       </div>
     </div>

     <!-- spph -->
     <div class="spph">
       <div class="form-group row">
         <label class="col-sm-2 col-form-label">No. SPPH</label>
         <div class="col-sm-4">
           <input type="text" name="no_agunan" class="form-control">
         </div>
         <label class="col-sm-2 col-form-label">Nama Pemilik</label>
         <div class="col-sm-4">
           <input type="text" name="pemilik" class="form-control">
           <input type="hidden" value="-" name="alamat_agunan_shm" class="form-control">
         </div>
       </div>
     </div>
   </div>
   <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Simpan</button>

 </form>

 <script>
     $('.shm').hide()
     $('.bpkb-motor').hide()
     $('.bpkb-mobil').hide()
     $('.emas').hide()
     $('.cascol').hide()
     $('.personal').hide()
     $('.corporate').hide()
     $('.spph').hide()

     $("select").change(function() {
       var str = $(this).val()
       $('.view').html('')
       $("select option:selected").each(function() {
         $('.' + str).show()
         $('.' + str).siblings().hide()
         if (str == 'shm' || str == 'bpkb-motor' || str == 'bpkb-mobil' || str == 'emas') {
           $('input[name="jns_asset"]').val('FIX ASSET')
         } else {
           $('input[name="jns_asset"]').val('NON-FIX ASSET')
         }
       });
     })

     $('#input-agunan').submit(function(e) {
       e.preventDefault()
       var data = $(this).serialize()
       $.ajax({
         type: 'POST',
         url: "<?php echo base_url() ?>pembiayaan/agunan",
         data: data,
         dataType: "json",
         async: false,
         success: function(result) {
           console.log(result)
           if (result.sukses) {
             Swal.fire({
               title: 'Berhasil',
               text: `${result.sukses}`,
               icon: 'success',
               confirmButtonText: 'Ok'
             })
           }  else {
             Swal.fire({
               title: 'Stop!',
               html: `${result.error}`,
               icon: 'error',
               confirmButtonText: 'Ok'
             })
           }
         }
       });
     })
  
 </script>