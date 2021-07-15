<div class="table-responsive text-center">
  <div class="form-group row text-left">
    <div class="col-sm-3">
      <label class="col-form-label">Akad</label>
      <select name="akad" class="form-control akad">
        <option value="0">Semua</option>
        <?php
        $akad = $this->db->get('tb_akad')->result();
        for ($i = 0; $i < count($akad); $i++) { ?>
          <option value="<?= $akad[$i]->kode ?>"><?= $akad[$i]->kode . ' - ' . $akad[$i]->nama ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="col-sm-2">
      <label class="col-form-label">Bulan</label>
      <select name="bulan" class="form-control bulan">
        <option value="0">Semua</option>
        <?php for ($i = 1; $i < 12; $i++) { ?>
          <option  value="<?= $i ?>"><?= bulan($i) ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="col-sm-2">
      <label class="col-form-label">Tahun</label>
      <select name="bulan" class="form-control tahun">
        <option value="0">Semua</option>
        <?php for ($i = 0; $i < 10; $i++) { ?>
          <option  value="<?= '202' . $i ?>"><?= '202' . $i ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="col-sm-1">
      <label class="col-form-label">.</label><br>
      <a href="#" class="cariData btn btn-success btn-block">Cari</a>
    </div>
  </div>
  <table class="table table-bordered" id="normatif" width="100%" cellspacing="0">
    <thead class="bg-danger text-white border-white">
      <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">No. Rekening</th>
        <th colspan="3">Tanggal</th>
        <th rowspan="2">Jml. Pembiayaan</th>
        <th colspan="2">Saldo</th>
        <th colspan="2">Tunggakan</th>
        <th rowspan="2">DPD</th>
        <th rowspan="2">COL</th>
      </tr>
      <tr>
        <th>Pencairan</th>
        <th>JKW</th>
        <th>Jatuh Tempo</th>
        <th>Pokok</th>
        <th>Margin/Basil</th>
        <th>Pokok</th>
        <th>Margin</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
</div>
<div class="cetak">
  <a href="<?= base_url('pembiayaan/laporan_normatif') ?>" class="mb-3 btn btn-success"><i class="fa fa-print"></i> CETAK LAPORAN</a><a href="<?= base_url('pdf/laporan_normatif') ?>" class="mb-3 btn btn-primary ml-2"><i class="fa fa-file"></i> CETAK PDF</a>
</div>

<div class="modal fade" id="angsur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Kartu Angsuran <a href="#" class="btn cetak btn-sm btn-primary">Cetak</a></h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <table width="100%">
          <tr style="border: 1px solid black;">
            <td class="p-1"> No. Rek</td>
            <td style="border-right: 1px solid black;" class="no_rek"></td>
            <td class="p-1"> Akad</td>
            <td style="border-right: 1px solid black;" class="akad"></td>
            <td class="p-1"> Nama </td>
            <td style="border-right: 1px solid black;" class="nama"></td>
            <td class="p-1"> Angsuran</td>
            <td style="border-right: 1px solid black;" class="angsur"></td>
          </tr>

          <tr style="border: 1px solid black;">
            <td class="p-1"> Total</td>
            <td style="border-right: 1px solid black;" class="hrg_beli"></td>
            <td class="p-1"> Jatuh Tempo</td>
            <td style="border-right: 1px solid black;" class="tgl_jatuh"> </td>
            <td class="p-1"> Harga Jual</td>
            <td style="border-right: 1px solid black;" class="hrg_jual"></td>
            <td class="p-1"> Tgl. Realisasi</td>
            <td style="border-right: 1px solid black;" class="tgl_dropping"></td>
          </tr>

          <tr style="border: 1px solid black;">
            <td class="p-1"> Margin</td>
            <td style="border-right: 1px solid black;" class="margin"></td>
            <td class="p-1"> Tgl. Akhir</td>
            <td style="border-right: 1px solid black;" class="tgl_end"></td>
            <td class="p-1"> Tenor (bulan)</td>
            <td style="border-right: 1px solid black;" class="jkw"></td>
          </tr>

        </table>
        <table class="table table-bordered table-sm mt-3 text-center">
          <thead class="bg-dark text-white ">
            <tr>
              <th rowspan="2">No</th>
              <th colspan="2">Tgl. Pembayaran Angsuran</th>
              <th colspan="4">Perhitungan Angsuran</th>
              <th rowspan="2">Realisasi Pembayaran</th>
              <th colspan="2">Sisa</th>
              <th rowspan="2">DPD</th>
            </tr>
            <tr>
              <!-- no  -->
              <td>Jadwal</td>
              <td>Tgl. Setor</td>
              <td>Sisa Pokok</td>
              <td>Sisa Margin</td>
              <td>Pokok</td>
              <td>Margin</td>
              <td>Titipan</td>
              <td>Kekurangan</td>
            </tr>
          </thead>
          <tbody id="listAngsuran">
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
<script>
  $(document).ready(function() {

    $('.cariData').click(function(e) {
      var akad = $('.akad option:selected').val()
      var bln = $('.bulan option:selected').val()
      var thn = $('.tahun option:selected').val()
      
      normatif(akad, bln, thn)
    })

    var akad = $('.akad').val()
    var bln = $('.bulan').val()
    var thn = $('.tahun').val()
    var lunas = $('.lunas').val()
    normatif(akad, bln, thn)

    function normatif(akad, bln, thn, lunas) {
      var normatif = $('#normatif').DataTable({
        'ajax': {
          "type": "GET",
          "url": '<?= base_url('pembiayaan/normatif/') ?>' + akad + '/' + bln + '/' + thn,
          "dataSrc": ""
        },
        'destroy': true,
        'columns': [{
            "data": "no"
          },
          {
            "data": "no_rek"
          },
          {
            "data": "pencairan"
          },
          {
            "data": "jkw"
          },
          {
            "data": "jatuh_tempo"
          },
          {
            "data": "pembiayaan"
          },
          {
            "data": "saldo_pokok",
          },
          {
            "data": "saldo_margin"
          },
          {
            "data": "tunggakan_pokok"
          },
          {
            "data": "tunggakan_margin"
          },
          {
            "data": "dpd"
          },
          {
            "data": "col",
          }

        ]
      });
    }

    $(document).on('click', '.lihat-angsuran', function(e) {
      $('#angsur').modal('show')
      $.ajax({
        url: '<?= base_url('pembiayaan/getAngsuran') ?>',
        data: {
          'id': $(this).data('id')
        },
        dataType: 'json',
        type: 'post',
        success: function(res) {
          console.log(res)
          if (res.error) {
            $('#listAngsuran').html('Tidak Ada data')
          } else {
            $('.cetak').attr('href', '<?= base_url('pembiayaan/kartuAngsuran/') ?>' + res.id)
            $('.no_rek').text(': ' + res.no_rek)
            $('.akad').text(': ' + res.akad)
            $('.nama').text(': ' + res.nama)
            $('.angsur').text(': ' + res.angsur)
            $('.hrg_beli').text(': ' + res.hrg_beli)
            $('.tgl_jatuh').text(': ' + res.tgl_jatuh)
            $('.hrg_jual').text(': ' + res.hrg_jual)
            $('.tgl_dropping').text(': ' + res.tgl_dropping)
            $('.margin').text(': ' + res.margin)
            $('.tgl_end').text(': ' + res.tgl_end)
            $('.jkw').text(': ' + res.jkw)

            var html = ''
            $.each(res.angsuran, function(i, v) {
              if (v.no != 0) {
                html += '<tr>' +
                  '<td>' + v.no + '</td>' +
                  '<td>' + v.jadwal + '</td>' +
                  '<td>' + v.tgl_byr + '</td>' +
                  '<td>' + v.sisa_pokok + '</td>' +
                  '<td>' + v.sisa_margin + '</td>' +
                  '<td>' + v.pokok + '</td>' +
                  '<td>' + v.margin + '</td>' +
                  '<td>' + v.jumlah + '</td>' +
                  '<td>' + v.titipan + '</td>' +
                  '<td>' + v.kekurangan + '</td>' +
                  '<td>' + v.dpd + '</td>'
                html += '</tr>'
              }
            })
            $('#listAngsuran').html(html)
          }

        }
      })

    })
  })
</script>