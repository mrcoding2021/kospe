<div class="container-fluid">
  <div class="row">
    <div class="col-lg">
      <?= $this->session->flashdata('alert');
      ?>
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?= $title ?> <span class="float-right">No. Akad : <span class="no_akad"></span> </span></h6>
        </div>
        <div class="card-body">
          <ul class="nav nav-pills mb-3 border-bottom-primary" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#rekening" role="tab" aria-controls="pills-home" aria-selected="true">Pembiayaan Normatif</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link " id="pills-profile-tab" data-toggle="pill" href="#jumlah" role="tab" aria-controls="pills-profile" aria-selected="false">Rekap Pembiayan</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link " id="pills-contact-tab" data-toggle="pill" href="#angsuran" role="tab" aria-controls="pills-contact" aria-selected="false">Kolektabilitas Pembiayaan</a>
            </li>

          </ul>
          <div class="tab-content " id="pills-tabContent">
            <div class="tab-pane fade show active " id="rekening" role="tabpanel" aria-labelledby="pills-home-tab">
              <?php $this->load->view('admin/pembiayaan/laporan/normatif'); ?>
            </div>
            <div class="tab-pane fade " id="jumlah" role="tabpanel" aria-labelledby="pills-profile-tab">
              <?php $this->load->view('admin/pembiayaan/laporan/rekap'); ?>
            </div>
            <div class="tab-pane fade " id="angsuran" role="tabpanel" aria-labelledby="pills-contact-tab">
              <?php $this->load->view('admin/pembiayaan/laporan/kolektabilitas'); ?>
            </div>

          </div>



        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {

    $('.save').on('click', function(e) {
      e.preventDefault()

      var kode_unik = '001'
      var produk = $('#produk').val()
      var number = $('#no_rek').data('id')
      var no_rek = $('#no_rek').val(kode_unik + produk + '0000' + number)
      var data = $('.input-data-pembiayaan').serialize()

      // INPUT DATA PEMBIAYAAN 
      $.ajax({
        type: 'POST',
        url: "<?php echo base_url() ?>pembiayaan/add",
        data: data,
        dataType: "json",
        async: false,
        success: function(result) {
          console.log(result.sukses)
          var no_akad = $('input[name="no_akad"]').val()
          $('.no_akad').append(no_akad)
          $('#akad').val(no_akad)
          $('input[name="no_akad"]').val(no_akad)
          $('#no_akad').val(no_akad)
          $('input[name="cari_akad"]').val(no_akad)
          Swal.fire({
            title: 'Berhasil',
            text: `${result.sukses}`,
            icon: 'success',
            confirmButtonText: 'Ok'
          })
        }
      });
    })

    // HITUNG JUMLAH PEMBIAYAAN 
    $('input').on('keyup', function(e) {
      e.preventDefault()
      $('#cetakPdf').show()
      var beli = Number($('.beli').val())
      var jual = $('.jual')
      var pricing = Number($('.pricing').val())
      var dp = Number($('.dp').val())
      var jangka = Number($('.jangka').val())
      var jualx = $('.jualx')
      var angsur = $('.angsur')

      var total = (beli - dp) * (1 + (pricing / 100) * jangka)
      // jualx.val(formatRupiah(total, "Rp. ", jualx))
      jualx.val(parseInt(total))
      // jualx.autoNumeric('init')
      jual.val(parseInt(total + dp))
      // jual.autoNumeric('init')
      var totalx = total / jangka
      angsur.val(parseInt(totalx))

      var jumlah = parseInt($('input[name="admin"]').val()) + parseInt($('input[name="notaris"]').val()) + parseInt($('input[name="asuransi_jiwa"]').val()) + parseInt($('input[name="asuransi_kendaraan"]').val()) + parseInt($('input[name="jaminan"]').val()) + parseInt($('input[name="materai"]').val())
      // console.log(jumlah)
      console.log(jumlah)
      if (isNaN(jumlah)) {
        $('#total').val(0)
      } else {
        $('#total').val(jumlah)
      }
    })

    // input jumlah pembiyaan 
    $('.jumlah-pembiayaan').on('submit', function(e) {
      e.preventDefault()
      var form = $(this).serialize()
      $.ajax({
        type: 'POST',
        url: "<?php echo base_url() ?>pembiayaan/add_jumlah",
        data: form,
        dataType: "json",
        async: false,
        success: function(result) {
          Swal.fire({
            title: 'Berhasil',
            html: `${result.sukses}`,
            icon: 'success',
            confirmButtonText: 'Ok'
          })

        }
      });
    })



  })
</script>