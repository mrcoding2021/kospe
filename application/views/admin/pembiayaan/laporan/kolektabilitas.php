<div class="table-responsive text-center">
  <table class="table table-bordered" id="kolaktabilitas" width="100%" cellspacing="0">
    <thead class="bg-danger text-white border-white">
      <tr>
        <th>No</th>
        <th>Nama Anggota</th>
        <th>Jumlah Pembiayaan Awal</th>
        <th>Sisa Pokok Pembiayaan</th>
        <th>Tgl. Mulai</th>
        <th>Tgl. Akhir</th>
        <th>Angsuran /bulan</th>
        <th>Hari Menunggak</th>
      </tr>

    </thead>
    <tbody>

    </tbody>
  </table>
</div>
<div class="cetak">
  <a href="<?= base_url('pembiayaan/laporan_normatif') ?>" class="mb-3 btn btn-success"><i class="fa fa-print"></i> CETAK LAPORAN</a><a href="<?= base_url('pdf/laporan_normatif') ?>" class="mb-3 btn btn-primary ml-2"><i class="fa fa-file"></i> CETAK PDF</a>
</div>
<script>
  $(document).ready(function() {

    var kolaktabilitas = $('#kolaktabilitas').DataTable({
      'ajax': {
        "type": "GET",
        "url": '<?= base_url('pembiayaan/kolaktabilitas') ?>',
        "dataSrc": ""
      },
      'columns': [{
          "data": "no"
        },
        {
          "data": "nama_anggota"
        },
        {
          "data": "jml_pembiayaan"
        },
        {
          "data": "saldo_pokok"
        },
        {
          "data": "tgl_mulai"
        },
        {
          "data": "tgl_akhir"
        },
        {
          "data": "angsuran"
        },
        {
          "data": "menunggak"
        }
      ]
    });

  })
</script>