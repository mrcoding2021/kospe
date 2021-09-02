 <form method="post" class="input-asuransi" data-table="tb_asuransi">
   <div class="form-group row">
     <label for="1" class="col-md-1 col-form-label">No. Akad</label>
     <div class="col-sm-3">
       <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
       <input type="text" name="no_akad" class="form-control">
     </div>
     <label for="1" class="col-md-2 col-form-label">Jenis Asuransi</label>
     <div class="col-sm-2">
       <select name="jns_asuransi" class="form-control">
         <option value="Asuransi Jiwa">Asuransi Jiwa</option>
         <option value="Asuransi Kendaraan">Asuransi Kendaraan</option>
       </select>
     </div>
     <label for="1" class="col-md-2 col-form-label">Tanggal Polis Asuransi</label>
     <div class="col-sm-2">
       <input type="date" name="tgl_polis" class="form-control">
     </div>
   </div>
   <div class="form-group row">
     <label for="1" class="col-md-2 col-form-label">Jangka Waktu</label>
     <div class="col-sm-4">
       <input type="text" name="jkw_polis" class="form-control">
     </div>
     <label for="1" class="col-md-2 col-form-label">Nilai Asuransi</label>
     <div class="col-sm-4">
       <input type="text" name="nilai_asuransi" class="form-control">
     </div>
   </div>
   <div class="form-group row">
     <label for="1" class="col-md-2 col-form-label">Periode Polis</label>
     <div class="col-sm-4">
       <input type="date" name="periode_nilai" class="form-control">
     </div>
     <label for="1" class="col-md-2 col-form-label">Bulan</label>
     <div class="col-sm-4">
       <input type="date" name="bulan" class="form-control">
     </div>
   </div>
   <div class="form-group row">
     <label for="1" class="col-md-2 col-form-label">Bulan Dijaminkan</label>
     <div class="col-sm-4">
       <input type="text" name="bulan_dijamin" class="form-control">
     </div>

   </div>
   <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Simpan</button>

 </form>

 <script>
   $(document).ready(function(e) {
     $('.input-asuransi').submit(function(e) {
       e.preventDefault()
       var data = $(this).serialize()
       console.log(data)
       $.ajax({
         type: 'POST',
         url: "<?php echo base_url() ?>pembiayaan/asuransi",
         data: data,
         dataType: "json",
         async: false,
         success: function(result) {
           if (result.sukses) {
             Swal.fire({
               title: 'Berhasil',
               text: `${result.sukses}`,
               icon: 'success',
               confirmButtonText: 'Ok'
             })
           } else {
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
   })
 </script>