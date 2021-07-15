<style>
  select {
    width: 100%;
    height: 40px;
    background-color: white;
  }

  select option {
    height: 40px;
  }
</style>
<section id="inner-headline">
  <div class="container">
    <div class="row">
      <div class="span8">
        <div class="inner-heading">
          <h2><?= $detail['title'] ?></h2>
        </div>
      </div>
      <div class="span4">
        <ul class="breadcrumb">
          <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
          <li><a href="#"><?= $detail['header'] ?></a><i class="icon-angle-right"></i></li>
          <li class="active"><?= $detail['title'] ?></li>
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
                  <select name="tujuan" id="">
                    <option value="MODAL USAHA">MODAL USAHA</option>
                    <option value="PEMBELIAN BARANG ELEKTRONIK">PEMBELIAN ELEKTRONIK</option>
                    <option value="PEMBELIAN KENDARAN BERMOTOR">PEMBELIAN KENDARRAN BERMOTOR</option>
                    <option value="BIAYA PENDIDIKAN">BIAYA PENDIDIKAN</option>
                    <option value="RENOVASI RUMAH">RENOVASI RUMAH</option>
                    <option value="PENDAFTARAN HAJI">PENDAFTARAN HAJI</option>
                    <option value="PENDAFTARAN UMROH">PENDAFTARAN UMROH</option>

                  </select>
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

        <section id="upload" class="border-top py-5">
          <div class="container">
            <div class="row">
              <div class="span8">
                <div class="bg-primary text-white p-1 text-center mb-2">
                  <h4>Download Persyaratan Berkas</h4>
                </div>
                <div class="form-group row text-center">
                  <div class="span2">
                    <a href="<?= base_url('download/file/1') ?>" class="btny btn-block btn-large btn-theme"><i class="text-success fa fa-file"></i> RENCANA ANGGARAN BELANJA</a>
                  </div>
                  <div class="span2">
                    <a href="<?= base_url('download/file/2') ?>" class="btny btn-block btn-large btn-theme"><i class="text-success fa fa-file"></i> SURAT PERSONAL GARANSI LED</a>
                  </div>
                  <div class="span2">
                    <a href="<?= base_url('download/file4') ?>" class="btny btn-block btn-large btn-theme"><i class="text-success fa fa-file"></i> SURAT POTONG BONUS HNI</a>
                  </div>
                </div>
                <p>Setelah di DOWNLOAD, silahkan di PRTINT kemudian di ISI dengan benar dan lengkap, lalu di SCAN jadi bentuk FILE, kemudian di UPLOAD pada isian dibawah ini</p>
              </div>
              <hr>
              <div class="span8">

                <div class="form-group row ">
                  <h4>Upload Berkas</h4>
                  <label class=" col-form-label ktp"> No. Hp Pemohon </label>
                  <input type="text" name="id_hp" id="id_hp" class="form-control col-md-6">

                  <label class=" col-form-label ktp"> E-KTP Suami & Istri </label>
                  <input type="file" name="ktp" id="ktp" class=" form-control col-md-6">
                  <button type="button" class="u-ktp form-control col-md-2 btn btn-sm btn-success text-white mx-auto">Upload</button>

                  <label class=" col-form-label kk">Kartu Keluarga</label>
                  <input type="file" name="kk" id="kk" class="form-control col-md-6">
                  <button type="button" class="u-kk form-control col-md-2 btn btn-sm btn-success text-white mx-auto">Upload</button>

                  <label class=" col-form-label slip">Slip Gaji / Catatan Usaha 4 bln terakhir</label>
                  <input type="file" name="slip" id="slip" class="form-control col-md-6">
                  <button type="button" class="u-slip form-control col-md-2 btn btn-sm btn-success text-white mx-auto">Upload</button>

                  <label class=" col-form-label rab">Rencana Anggaran Belanja</label>
                  <input type="file" name="rab" id="rab" class="form-control col-md-6">
                  <button type="button" class="u-rab form-control col-md-2 btn btn-sm btn-success text-white mx-auto">Upload</button>

                  <label class=" col-form-label rekap">Rekap Penjualan di HSIS 1 tahun</label>
                  <input type="file" name="rekap" id="rekap" class="form-control col-md-6">
                  <button type="button" class="u-rekap form-control col-md-2 btn btn-sm btn-success text-white mx-auto">Upload</button>

                  <label class=" col-form-label garansi">Personal Garansi LED HNI</label>
                  <input type="file" name="garansi" id="garansi" class=" form-control col-md-6">
                  <button type="button" class="u-garansi form-control col-md-2 btn btn-sm btn-success text-white mx-auto">Upload</button>

                  <label class=" col-form-label bonus">Potong Bonus HNI</label>
                  <input type="file" name="bonus" id="bonus" class="form-control col-md-6">
                  <button type="button" class="u-bonus form-control col-md-2 btn btn-sm btn-success text-white mx-auto">Upload</button>

                </div>
              </div>
            </div>
          </div>
        </section>


      </div>
      <div class="span4">
        <?php $this->load->view('template/sidebar'); ?>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function() {
    function upload(judul, kategori, name) {
      var file = new FormData()
      var id_hp = $('#id_hp').val()
      file.append('file', document.getElementById(name).files[0])
      file.append('id_hp', id_hp)
      file.append('kategori', kategori)
      file.append('judul', judul)
      $.ajax({
        url: '<?= base_url('landingpage/upload/') ?>',
        type: "post", //method Submit
        data: file, //penggunaan FormData
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        async: false,
        success: function(result) {
          var sukses = result.sukses
          if (result.sukses == 'Sukses') {
            Swal.fire({
              title: 'Berhasil!',
              html: `${sukses}`,
              icon: 'success',
              confirmButtonText: 'Ok'
            })
            $('.' + name).append(' <i class="text-success fa fa-check-double"></i>')
          } else {
            Swal.fire({
              title: 'Stop!',
              html: `${sukses}`,
              icon: 'warning',
              confirmButtonText: 'Ok'
            })
            $('.' + name).append(' <i class="text-danger fa fa-close"></i>')
          }
          // alert(result)
        }
      })
    }
    $('.u-ktp').on('click', function(e) {
      e.preventDefault()
      var judul = 'E-KTP Suami & Istri'
      var name = 'ktp'
      var kategori = 1
      upload(judul, kategori, name)
    })
    $('.u-kk').on('click', function(e) {
      e.preventDefault()
      var judul = 'Kartu Keluarga'
      var name = 'kk'
      var kategori = 2
      upload(judul, kategori, name)
    })
    $('.u-slip').on('click', function(e) {
      e.preventDefault()
      var judul = 'Slip Gaji / Catatan Usaha 4 bln terakhir'
      var name = 'slip'
      var kategori = 3
      upload(judul, kategori, name)
    })
    $('.u-rab').on('click', function(e) {
      e.preventDefault()
      var judul = 'Rencana Anggaran Belanja'
      var name = 'rab'
      var kategori = 4
      upload(judul, kategori, name)
    })
    $('.u-rekap').on('click', function(e) {
      e.preventDefault()
      var judul = 'Rekap Pembelian di HSIS 1 tahun'
      var name = 'rekap'
      var kategori = 5
      upload(judul, kategori, name)
    })
    $('.u-garansi').on('click', function(e) {
      e.preventDefault()
      var judul = 'Personal Garansi LED HNI'
      var name = 'garansi'
      var kategori = 6
      upload(judul, kategori, name)
    })
    $('.u-bonus').on('click', function(e) {
      e.preventDefault()
      var judul = 'Potong Bonus HNI'
      var name = 'bonus'
      var kategori = 7
      upload(judul, kategori, name)
    })
  });
</script>