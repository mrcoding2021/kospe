 <form id="cariAngsuran" method="post" action="#">
   <!-- data rekening  -->
   <div class="angsuran">
     <div class="form-group row">
       <label class="col-sm-2 col-form-label">No. Akad</label>
       <div class="col-sm-4">
         <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
         <input type="text" autofocus name="cari_akad" class="form-control">
       </div>
       <label class="col-sm-2 col-form-label">Jenis Pembiayaan</label>
       <div class="col-sm-4">
         <input type="text" readonly class="form-control" name="jns_pembiayaan">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-sm-2 col-form-label">Nama</label>
       <div class="col-sm-10">
         <input type="text" readonly name="nama_org" class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-sm-2 col-form-label">Produk Pembiayaan</label>
       <div class="col-sm-4">
         <input type="text" name="produk" readonly class="form-control">
       </div>
       <label class="col-sm-2 col-form-label">Tipe Angsuran</label>
       <div class="col-sm-4">
         <input type="text" name="tipe_angsuran" readonly class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-sm-2 col-form-label">Jumlah Pembiayaan</label>
       <div class="col-sm-4">
         <input type="text" name="jml_pembiayaan" readonly class="form-control">
       </div>
       <label class="col-sm-2 col-form-label">Angsuran perbulan</label>
       <div class="col-sm-4">
         <input type="text" name="angsuran_perbulan" readonly class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-sm-2 col-form-label">Pokok Pembiayaan</label>
       <div class="col-sm-4">
         <input type="text" name="pokok" readonly class="form-control">
       </div>
       <label class="col-sm-2 col-form-label">Margin Pembiayaan</label>
       <div class="col-sm-4">
         <input type="text" name="margin" value="1" readonly class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-sm-2 col-form-label">Jangka Waktu</label>
       <div class="col-sm-4">
         <input type="text" name="jkw" readonly class="form-control">
       </div>
       <label class="col-sm-2 col-form-label">Harga Jual</label>
       <div class="col-sm-4">
         <input type="text" name="hrg_jual" readonly class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-sm-2 col-form-label">Total Margin</label>
       <div class="col-sm-4">
         <input type="text" name="total_margin" readonly class="form-control">
       </div>
       <label class="col-sm-2 col-form-label">Margin Bulanan</label>
       <div class="col-sm-4">
         <input type="text" name="margin_bln" readonly class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-sm-2 col-form-label">Margin Tahunan</label>
       <div class="col-sm-4">
         <input type="text" name="margin_thn" readonly class="form-control">
       </div>
       <label class="col-sm-2 col-form-label">Tgl. Jatuh Tempo</label>
       <div class="col-sm-4">
         <input type="text" name="tgl_jatuh_tempo" readonly class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-sm-2 col-form-label">Tgl. Dropping</label>
       <div class="col-sm-4">
         <input type="text" name="tgl_dropping" readonly class="form-control">
       </div>
       <label class="col-sm-2 col-form-label">Tgl. Berakhir</label>
       <div class="col-sm-4">
         <input type="text" name="tgl_berakhir" readonly class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <label class="col-sm-2 col-form-label">Sisa Pokok</label>
       <div class="col-sm-4">
         <input type="text" name="sisa_pokok" readonly class="form-control">
       </div>
       <label class="col-sm-2 col-form-label">Sisa Margin</label>
       <div class="col-sm-4">
         <input type="text" name="sisa_margin" readonly class="form-control">
       </div>
     </div>
     <div class="form-group row">
       <div class="col-sm-10">
         <a href="#input-angsuran" data-toggle="modal" class="input-angsuran btn btn-success"><i class="fa fa-money-check-alt"></i> Input Angsuran</a>
         <a href="#" target="_blank" id="kartu_angsuran" class="btn btn-primary"><i class="fa fa-file-alt"></i> Kartu Angsuran</a>
       </div>
     </div>
   </div>

 </form>

 <div class="modal fade" id="input-angsuran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header bg-danger text-white">
         <h5 class="modal-title" id="exampleModalLabel">Input Angsuran Bulanan</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body">
         <form method="post" id="input-angsuran-bulanan" action="#">
           <div class="form-group row">
             <div class="col-sm-6">
               <label for="1">Tgl. Tranasksi</label>
               <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
               <input type="date" class="form-control" value="<?= date('Y-m-d') ?>" name="tgl_input">
             </div>
             <div class="col-sm-6">
               <label for="1">Nilai Pembayaran</label>
               <input type="text" class="form-control" autofocus name="bayar">
               <input type="hidden" class="form-control" name="angsuran">
               <input type="hidden" id="akad" class=" form-control" name="no_akad">
             </div>
           </div>
         
           <div class="form-group row">
             <div class="col-sm-6">
               <label for="1">Pokok Pembayaran</label>
               <input type="text" class=" form-control" readonly name="pkk">
             </div>
             <div class="col-sm-6">
               <label for="1">Margin P-bayaran</label>
               <input type="text" class=" form-control" readonly name="mgn">
             </div>
           </div>
          
           <div class="form-group row">
             <div class="col-sm-6">
               <label for="1">Diskon Margin</label>
               <input type="text" class=" form-control" value="0" name="diskon">
             </div>
             <div class="col-sm-6">
               <label for="1">Titipan</label>
               <input type="text" class=" form-control" readonly name="titipan">
             </div>
           </div>
           <div class="form-group row">
             <div class="col-sm-6">
               <label for="1">Angsuran Ke-</label>
               <input type="text" class="form-control" value="1" readonly name="angsuran_ke">
             </div>
             <div class="col-sm-6">
               <label for="1">JKW P-bayaran</label>
               <input type="text" class=" form-control" readonly name="jkw">
             </div>
           </div>
           <div class="form-group row">
             <div class="col-sm-6">
               <label for="1">Sisa JKW</label>
               <input type="text" class="form-control" value="11" readonly name="sisa_jkw">
             </div>
             <div class="col-sm-6">
               <label for="1">Sisa Pokok</label>
               <input type="text" class=" form-control" readonly name="sisa_pkk">
             </div>
           </div>
           <div class="form-group row">
             <div class="col-sm-6">
               <label for="1">Sisa Margin</label>
               <input type="text" class="form-control" readonly name="sisa_mgn">
             </div>
           </div>
           <div class="modal-footer">
             <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
             <button type="submit" class="btn btn-success"><i class="fa fa-check-circle"></i> Simpan</button>
           </div>
         </form>
       </div>

     </div>
   </div>
 </div>

 <script>
   titipan()

   function titipan() {
     $('input[name="bayar"]').on('keyup', function(e) {
       var bayar = $(this).val()
       var pkk = $('input[name="pkk"]').val()
       var mgn = $('input[name="mgn"]').val()
       var titipan = bayar - pkk - mgn
       $('input[name="titipan"]').val(titipan)
     })
   }

   function inputAngsuran(id) {
     $.ajax({
       type: 'POST',
       url: "<?php echo base_url() ?>pembiayaan/detail",
       data: $('#cariAngsuran').serialize(),
       dataType: "json",
       success: function(result) {
         console.log(result)
         if (result.error) {
           Swal.fire({
             title: 'Tidak Ada Data',
             html: `${result.error}`,
             icon: 'error',
             confirmButtonText: 'Ok'
           })
         } else {
           $('input[name="jns_pembiayaan"]').val(result.jns_pembiayaan)
           $('input[name="nama_org"]').val(result.nama)
           $('input[name="produk"]').val(result.produk)
           $('input[name="tipe_angsuran"]').val(result.tipe_angsuran)
           $('input[name="jml_pembiayaan"]').val(result.jml_pembiayaan)
           $('input[name="angsuran_perbulan"]').val(result.angsuran_perbulan)
           $('input[name="pokok"]').val(result.pokok)
           $('input[name="margin"]').val(result.margin)
           $('input[name="jkw"]').val(result.jkw)
           $('input[name="hrg_jual"]').val(result.hrg_jual)
           $('input[name="total_margin"]').val(result.total_margin)
           $('input[name="margin_bln"]').val(result.margin_bln)
           $('input[name="margin_thn"]').val(result.margin_thn)
           $('input[name="tgl_berakhir"]').val(result.tgl_berakhir)
           $('input[name="tgl_jatuh_tempo"]').val(result.tgl_jatuh_tempo)
           $('input[name="tgl_dropping"]').val(result.tgl_dropping)
           $('input[name="sisa_pokok"]').val(result.sisa_pokok)
           $('input[name="sisa_margin"]').val(result.sisa_margin)
           $('input[name="pkk"]').val(parseInt(result.pkk))
           $('input[name="mgn"]').val(parseInt(result.mgn))
           $('input[name="sisa_pkk"]').val(result.sisa_pkk)
           $('input[name="sisa_mgn"]').val(result.sisa_mgn)
           $('input[name="angsuran"]').val(result.angsuran)
           $('input[name="bayar"]').val(result.angsuran)
           if (result.angsuran_ke == 'LUNAS') {
             $('input[name="angsuran_ke"]').val(result.angsuran_ke)
             var jkw = parseInt(result.jkw) - parseInt(result.jkw)
           } else {
             $('input[name="angsuran_ke"]').val(result.angsuran_ke)
             var jkw = parseInt(result.jkw) - parseInt(result.angsuran_ke)
           }
           $('input[name="sisa_jkw"]').val(jkw)
           $('input[name="no_akad"]').val(id)
           var akad = result.id
           $('#kartu_angsuran').attr('href', '<?= base_url('pembiayaan/kartuAngsuran/') ?>' + akad)
         }
       }
     });
   }

   $('#input-angsuran-bulanan').submit(function(e) {
     e.preventDefault()
     var id = $('input[name="no_akad"]').val()
     $.ajax({
       type: 'POST',
       url: "<?php echo base_url() ?>pembiayaan/inputAngsuran",
       data: $(this).serialize(),
       dataType: "json",
       async: false,
       success: function(result) {
         if (result.sukses) {
           Swal.fire({
             title: 'Berhasil!',
             html: `${result.sukses}`,
             icon: 'success',
             confirmButtonText: 'Ok'
           })
           $('#input-angsuran').modal('hide')
           inputAngsuran(id)
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

   $('input[name="cari_akad"]').on('change', function(e) {
     var id = $(this).val()
     inputAngsuran(id)
   })
 </script>