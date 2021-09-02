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
          <form action="#" id="dataAngsuran">
            <div class="form-group row d-flex">
              <label class="col-sm-2 col-form-label">Cari No. Akad</label>
              <div class="col-sm-4">
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <input type="text" name="cari_noAkad" id="AkadNo" class="form-control">
              </div>
              <div class="">
                <a href="#cari" class="cariAkad btn btn-info"><i class="fa fa-search"></i> Cari</a>
                <a href="<?= base_url('pembiayaan/input') ?>" class=" btn btn-danger"><i class="fa fa-eraser"></i> Clear</a>
              </div>
            </div>
          </form>
          <ul class="nav nav-pills mb-3 border-bottom-primary" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#rekening" role="tab" aria-controls="pills-home" aria-selected="true">Data Rekening</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link " id="pills-profile-tab" data-toggle="pill" href="#jumlah" role="tab" aria-controls="pills-profile" aria-selected="false">Jumlah Pembiayaan</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link " id="pills-contact-tab" data-toggle="pill" href="#angsuran" role="tab" aria-controls="pills-contact" aria-selected="false">Data Angsuran</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#agunan" role="tab" aria-controls="pills-home" aria-selected="true">Data Agunan</a>
            </li>

            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#asuransi" role="tab" aria-controls="pills-contact" aria-selected="false">Data Asuransi</a>
            </li>
          </ul>
          <div class="tab-content " id="pills-tabContent">
            <div class="tab-pane fade show active" id="rekening" role="tabpanel" aria-labelledby="pills-home-tab">
              <?php $this->load->view('admin/pembiayaan/input/input'); ?>
            </div>
            <div class="tab-pane fade " id="jumlah" role="tabpanel" aria-labelledby="pills-profile-tab">
              <?php $this->load->view('admin/pembiayaan/input/fasilitas'); ?>
            </div>
            <div class="tab-pane fade " id="angsuran" role="tabpanel" aria-labelledby="pills-contact-tab">
              <?php $this->load->view('admin/pembiayaan/input/angsuran'); ?>
            </div>
            <div class="tab-pane fade" id="agunan" role="tabpanel" aria-labelledby="pills-home-tab">
              <?php $this->load->view('admin/pembiayaan/input/agunan'); ?>
            </div>
            <div class="tab-pane fade" id="asuransi" role="tabpanel" aria-labelledby="pills-contact-tab"><?php $this->load->view('admin/pembiayaan/input/asuransi'); ?>
            </div>
          </div>



        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {

    $('.input-data-pembiayaan').on('submit', function(e) {
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
          if (result.sukses) {
            Swal.fire({
              title: 'Warning',
              text: `${result}`,
              icon: 'success',
              confirmButtonText: 'Ok'
            })
            var no_akad = $('input[name="no_akad"]').val()
            $('.no_akad').append(no_akad)
            $('#akad').val(no_akad)
            $('input[name="no_akad"]').val(no_akad)
            $('#no_akad').val(no_akad)
            $('input[name="cari_akad"]').val(no_akad)
          } else {
            Swal.fire({
              title: 'Stop !',
              text: `${result.error}`,
              icon: 'error',
              confirmButtonText: 'Ok'
            })
          }
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

    $('.cariAkad').click(function(e) {
      e.preventDefault()
      var cari = $('#AkadNo')
      console.log(cari)
      if (cari.val() == '') {
        Swal.fire({
          title: 'Stop !',
          html: `No. Akad tidak boleh kosong`,
          icon: 'error',
          confirmButtonText: 'Ok'
        })
      } else {
        $.ajax({
          type: 'POST',
          url: "<?= base_url() ?>pembiayaan/detailData",
          data: $('#dataAngsuran').serialize(),
          dataType: "json",
          success: function(res) {
            console.log(res)
            if (res.sukses) {
              Swal.fire({
                title: 'Tidak Ada Data',
                html: `${res.sukses}`,
                icon: 'error',
                confirmButtonText: 'Ok'
              })
            } else {
              $('.form-control').attr('readonly', true)
              cari.attr('readonly', false)
              // data pembiayaan 
              $('input[name="no_rek"]').val(res.no_rek)
              $('input[name="no_akad"]').val(res.no_akad)
              var jns_pembiayaan = $('select[name="jns_pembiayaan"] option[value="' + res.jns_pembiayaan + '"]')
              jns_pembiayaan.attr('selected', true)
              jns_pembiayaan.siblings().attr('selected', false)
              $('select[name="tipe_angsuran"] option[value="' + res.tipe_angsuran + '"]').attr('selected', true)
              $('input[name="tgl_aplikasi"]').val(res.tgl_aplikasi)
              $('input[name="tgl_setuju"]').val(res.tgl_setuju)
              $('input[name="tgl_dropping"]').val(res.tgl_dropping)
              $('input[name="tgl_jatuh_tempo"]').val(res.tgl_jatuh_tempo)
              $('input[name="id_kospe"]').val(res.id_kospe)
              $('input[name="nama"]').val(res.nama)
              $('input[name="kantor"]').val(res.kantor)
              $('input[name="pasangan"]').val(res.pasangan)
              $('input[name="tgl_aplikasi"]').val(res.tgl_aplikasi)
              $('input[name="tgl_setuju"]').val(res.tgl_setuju)
              $('input[name="tgl_dropping"]').val(res.tgl_dropping)
              $('input[name="tgl_jatuh_tempo"]').val(res.tgl_jatuh_tempo)
              $('input[name="id_kospe"]').val(res.id_kospe)
              $('input[name="nama"]').val(res.nama)
              $('input[name="kantor"]').val(res.kantor)
              $('input[name="pasangan"]').val(res.pasangan)
              $('input[name="hp"]').val(res.hp)
              $('input[name="tlp_pasangan"]').val(res.tlp_pasangan)
              $('input[name="nama_saudara"]').val(res.nama_saudara)
              $('input[name="alamat_saudara"]').val(res.alamat_saudara)
              $('input[name="telp_saudara"]').val(res.telp_saudara)
              $('select[name="produk"] option[value="' + res.produk + '"]').attr('selected', true)
              $('select[name="akad"] option[value="' + res.akad + '"]').attr('selected', true)

              // fasilitas pembiayaan 
              $('input[name="hrg_jual"]').val(res.hrg_jual)
              $('input[name="pricing"]').val(res.pricing)
              $('input[name="dp"]').val(res.dp)
              $('input[name="jangka"]').val(res.jangka)
              $('input[name="hrg_beli"]').val(res.hrg_beli)
              $('input[name="hrg_akhir"]').val(res.hrg_akhir)
              $('input[name="angsur"]').val(res.angsur)
              $('input[name="admin"]').val(res.admin)
              $('input[name="notaris"]').val(res.notaris)
              $('input[name="asuransi_jiwa"]').val(res.asuransi_jiwa)
              $('input[name="asuransi_kendaraan"]').val(res.asuransi_kendaraan)
              $('input[name="jaminan"]').val(res.jaminan)
              $('input[name="materai"]').val(res.materai)
              $('input[name="total"]').val(res.total)

              // data agunan 
              var tipe_agunan = $('select[name="tipe_agunan"] option[value="' + res.tipe_agunan + '"]')
              tipe_agunan.attr('selected', true)
              tipe_agunan.siblings().attr('selected', false)
              $('.' + res.tipe_agunan).show()
              $('input[name="jns_asset"]').val(res.jns_asset)
              $('input[name="no_agunan"]').val(res.no_agunan)
              $('input[name="pemilik"]').val(res.pemilik)
              $('input[name="alamat_agunan"]').val(res.alamat_agunan)
              $('input[name="no_polisi"]').val(res.no_polisi)
              $('input[name="no_rangka"]').val(res.no_rangka)
              $('input[name="no_mesin"]').val(res.no_mesin)
              $('input[name="thn"]').val(res.thn)
              $('input[name="taksiran_hrg"]').val(res.taksiran_hrg)
              $('input[name="produk_simpanan"]').val(res.produk_simpanan)
              $('input[name="nilai_simpanan"]').val(res.nilai_simpanan)
              $('input[name="nama_led"]').val(res.nama_led)
              $('input[name="alamat_led"]').val(res.alamat_led)
              $('input[name="id_hni"]').val(res.id_hni)
              $('input[name="no_ktp"]').val(res.no_ktp)
              $('input[name="pangkat_hni"]').val(res.pangkat_hni)
              $('input[name="tlp_led"]').val(res.tlp_led)
              $('input[name="status_agen"]').val(res.status_agen)
              $('input[name="nama_corporate"]').val(res.nama_corporate)
              $('input[name="alamat_corporate"]').val(res.alamat_corporate)


              // data asuransi
              $('select[name="jns_asuransi"] option[value="' + res.jns_asuransi + '"]').attr('selected', true)

              $('input[name="tgl_polis"]').val(res.tgl_polis)
              $('input[name="jkw_polis"]').val(res.jkw_polis)
              $('input[name="nilai_asuransi"]').val(res.nilai_asuransi)
              $('input[name="periode_nilai"]').val(res.periode_nilai)
              $('input[name="bulan"]').val(res.bulan)
              $('input[name="bulan_dijamin"]').val(res.bulan_dijamin)
            }
          }
        });
      }
    })

    $('.form-control').dblclick(function(e) {
      $(this).attr('readonly', false)
      var el = '<div class="tombol" style="position: absolute; left: -50px; top:3px"><a href="#"  class="change btn btn-sm btn-primary"><i class="fa fa-save"></i></a><a href="#" class="batal btn btn-sm btn-danger"><i class="fa fa-times"></i></a></div>'
      $(this).after(el)
      var name = $(this).attr('name')
      var table = $(this).parents('form').data('table')
      var akad = $('input[name="no_akad"]').val()
      $(document).on('click', '.batal', function(e) {
        e.preventDefault()
        $('.tombol').hide()
        $('.tombol').prev().attr('readonly', true)
      })
      $(document).on('click', '.change', function(e) {
        e.preventDefault()
        var isi = $('.tombol').prev().val()
        $.ajax({
          url: '<?= base_url('pembiayaan/change') ?>',
          data: {
            'name': name,
            'val': isi,
            'akad': akad,
            'table': table
          },
          dataType: 'json',
          type: 'post',
          success: function(res) {
            if (res.response = 'Berhasil') {
              Swal.fire({
                title: 'Berhasil',
                html: 'Data berhasil dirubah',
                icon: 'success',
                confirmButtonText: 'Ok'
              })
              $('.form-control').attr('readonly', true)
              $('.tombol').hide()
            }
          }
        })
      })
    })
  })
</script>