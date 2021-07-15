<div class="table-responsive text-center">
  <table class="table table-bordered" id="rekap" width="100%" cellspacing="0">
    <thead class="bg-danger text-white border-white">
      <tr>
        <th rowspan="2">No</th>
        <th colspan="2">Periode Pembiayaan</th>
        <th colspan="2">Anggota </th>
        <th rowspan="2">No. Rekening</th>
        <th rowspan="2">No. Akad</th>
        <th rowspan="2">Pernggaransi</th>
        <th rowspan="2">Jml. Pembiayaan</th>
        <th rowspan="2">Harga Jual</th>
        <th rowspan="2">Margin</th>
        <th rowspan="2">Angsuran</th>
        <th colspan="2">Rincian Angsuran</th>
        <th rowspan="2">Tenor</th>
        <th colspan="2">Margin %</th>
      </tr>
      <tr>
        <th>Tgl. Mulai</th>
        <th>Tgl. Berakhir</th>
        <th>ID. KoSPE</th>
        <th>Nama</th>
        <th>Pokok</th>
        <th>Margin</th>
        <th>Pricing bln</th>
        <th>Pricing thn</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
  </table>
</div>
<div class="cetak mt-3">
  <a href="<?= base_url('pembiayaan/laporan_rekap') ?>" class="mb-3 btn btn-success"><i class="fa fa-print"></i> CETAK LAPORAN</a><a href="<?= base_url('pdf/laporan_normatif') ?>" class="mb-3 btn btn-primary ml-2"><i class="fa fa-file"></i> CETAK PDF</a>
</div>
<script>
  $(document).ready(function() {

    var normatif = $('#rekap').DataTable({
      'ajax': {
        "type": "GET",
        "url": '<?= base_url('pembiayaan/rekap') ?>',
        "dataSrc": ""
      },
      'columns': [{
          "data": "no"
        },
        {
          "data": "tgl_dropping"
        },
        {
          "data": "tgl_jatuh_tempo"
        },
        {
          "data": "id_kospe"
        },
        {
          "data": "nama"
        },
        {
          "data": "no_rek"
        },
        {
          "data": "no_akad",
        },
        {
          "data": "garansi",
        },
        {
          "data": "jml_pembiayaan"
        },
        {
          "data": "hrg_jual"
        },
        {
          "data": "margin"
        },
        {
          "data": "angsuran"
        },
        {
          "data": "pokok",
        },
        {
          "data": "basil"
        },
        {
          "data": "tenor"
        },

        {
          "data": "bln"
        },
        {
          "data": "thn",
        }

      ]
    });

  })
</script>