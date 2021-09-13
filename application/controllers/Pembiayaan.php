<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pembiayaan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('tgl_indo');
    $this->load->helper('rupiah');
    $this->load->helper('download');
  }

  public function core($view, $data)
  {
    date_default_timezone_set('Asia/Jakarta');
    $id = $this->session->userdata('id');
    if ($id) {

      $level = $this->session->userdata('level');
      $table = 'tb_user';
      $query = "SELECT `id_user`, `menu`
            FROM `tb_user_menu` JOIN `tb_menu_acces` 
              ON `tb_user_menu`.`id_user` = `tb_menu_acces`.`menu_id`
            WHERE `tb_menu_acces`.`role_id`= $level
          ORDER BY `tb_menu_acces`.`menu_id` ASC";

      $data['admin'] = $this->db->query($query)->result_array();
      $data['menu'] = $this->db->get('tb_menu')->result_array();
      $data['post'] = $this->db->get('tb_post')->result_array();
      $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
      $this->db->where('parent', 0);
      $data['analisa'] = $this->db->get('tb_analisa')->result();
      $data['pembiayaan'] = $this->db->get('tb_pembiayaan')->result();
      $data['parent'] = 'Pembiayaan';
      $this->load->view('admin/header', $data);
      $this->load->view('admin/pembiayaan/' . $view, $data);
      $this->load->view('admin/footer', $data);
    } else {
      redirect('auth');
    }
  }



  public function index()
  {
    $data['title'] = 'Pengajuan Pembiayaan';
    $data['link'] = 'pembiayaan';
    $view = 'v_pembiayaan';
    $this->core($view, $data);
  }

  public function analisa()
  {
    $data['title'] = 'Pengajuan Pembiayaan';
    $data['link'] = 'pembiayaan';
    $data['parent'] = 'Pembiayaan';
    $view = 'v_analisa';
    $this->core($view, $data);
  }

  public function persetujuan()
  {
    $data['title'] = 'Pengajuan Pembiayaan';
    $data['link'] = 'pembiayaan';
    $data['parent'] = 'Pembiayaan';
    $view = 'v_analisa';
    $this->core($view, $data);
  }

  public function delete($id)
  {
    $this->db->where('id_pengajuan', $id);
    $this->db->delete('tb_pembiayaan');
    $this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil dihapus</div>');
    redirect('pembiayaan/');
  }

  public function del($id)
  {
    $this->db->where('id_simpanan', $id);
    $this->db->delete('tb_simpanan');
    $this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil dihapus</div>');
    redirect('admin/simpanan');
  }

  public function status($id, $s)
  {
    if ($s == 0) {
      $this->db->set('status_proses', '1');
    } else {
      $this->db->set('status_proses', '0');
    }
    $this->db->where('id_pengajuan', $id);
    $this->db->update('tb_pembiayaan');
    $this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil dirubah</div>');
    redirect('pembiayaan');
  }

  public function input($id = 0)
  {
    $data['title'] = 'Input Pembiayaan';
    $data['link'] = 'pembiayaan';
    $data['parent'] = 'Pembiayaan';
    $view = 'v_inputPembiayaan';
    if ($id != 0) {
      $this->db->where('id_pembiayaan', $id);
      $data['detail'] = $this->db->get('tb_datapembiayaan')->row();
    } else {
      $data['detail'] = array();
    }
    $this->core($view, $data);
  }

  public function jumlah()
  {
    $data['title'] = 'Pengajuan Pembiayaan';
    $data['link'] = 'pembiayaan';
    $data['parent'] = 'Pembiayaan';
    $view = 'v_jumlahPembiayaan';
    $this->core($view, $data);
  }

  public function collection()
  {
    $data['title'] = 'Pengajuan Pembiayaan';
    $data['link'] = 'pembiayaan';
    $data['parent'] = 'Pembiayaan';
    $view = 'v_collectionPembiayaan';
    $this->core($view, $data);
  }

  public function laporan()
  {
    $data['title'] = 'Laporan Pembiayaan';
    $data['link'] = 'pembiayaan';
    $data['parent'] = 'Pembiayaan';
    $view = 'v_laporanPembiayaan';
    $this->core($view, $data);
  }

  public function berkas($id = '')
  {
    $data['title'] = 'Berkas Pembiayaan';
    $data['link'] = 'pembiayaan';
    $data['parent'] = 'Pembiayaan';
    $view = 'v_berkas';

    $this->db->where('id_pembiayaan', $id);
    $data['galeri'] = $this->db->get('tb_galeri')->result();
    $this->core($view, $data);
  }

  public function download($id = 0, $kategori = 0)
  {
    if ($id == 0 && $kategori == 0) {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Pilih salah satu data pengajuan</div>');
      redirect('pembiayaan');
    }
    $this->db->where('id_pembiayaan', $id);
    $this->db->where('kategori', $kategori);
    $name = $this->db->get('tb_galeri')->row_array();
    force_download('asset/berkas/' . $name['img'], NULL);
  }

  public function add()
  {
    if (!$this->input->post('no_akad')) {
      $msg = array(
        'error' => 'No. Akad tidak boleh kosng !',
      );
    } else {
      $this->db->where('no_akad', $this->input->post('no_akad'));
      $no_akad = $this->db->get('tb_datapembiayaan')->row();
      if ($no_akad != null) {
        $msg = array(
          'error' => 'No. Akad sudah terdaftar, silahkan input no akad baru!',
        );
      } else {
        $data = array(
          'no'              => htmlspecialchars($_POST['no']),
          'created_at'      => date('Y-m-d'),
          'inputer'         => $this->session->userdata('id'),
          'no_rek'          => htmlspecialchars(trim($_POST['no_rek'])),
          'no_akad'         => htmlspecialchars(strtoupper(str_replace(' ', '', $_POST['no_akad']))),
          'jns_pembiayaan'  => htmlspecialchars($_POST['jns_pembiayaan']),
          'tipe_angsuran'   => htmlspecialchars($_POST['tipe_angsuran']),
          'tgl_aplikasi'    => date('Y-m-d'),
          'tgl_setuju'      => htmlspecialchars($_POST['tgl_setuju']),
          'tgl_dropping'    => htmlspecialchars($_POST['tgl_dropping']),
          'tgl_jatuh_tempo' => htmlspecialchars($_POST['tgl_jatuh_tempo']),
          'id_kospe'        => htmlspecialchars($_POST['id_kospe']),
          'nama'            => htmlspecialchars(trim($_POST['nama'])),
          'hp'              => htmlspecialchars(trim($_POST['hp'])),
          'kantor'          => htmlspecialchars($_POST['kantor']),
          'cabang'          => htmlspecialchars($_POST['cabang']),
          'pasangan'        => htmlspecialchars(trim($_POST['pasangan'])),
          'nama_saudara'    => htmlspecialchars(trim($_POST['nama_saudara'])),
          'telp_saudara'    => htmlspecialchars(trim($_POST['telp_saudara'])),
          'alamat_saudara'  => htmlspecialchars(trim($_POST['alamat_saudara'])),
          'produk'          => htmlspecialchars($_POST['produk']),
          'akad'            => htmlspecialchars($_POST['akad']),
        );

        $this->db->insert('tb_datapembiayaan', $data);
        if ($this->db->affected_rows() > 0) {
          $this->session->set_userdata('no_akad', htmlspecialchars(strtoupper($_POST['no_akad'])));

          $angsuran = array(
            'created_at'      => date('Y-m-d'),
            'inputer'         => $this->session->userdata('id'),
            'no_akad'         => htmlspecialchars(strtoupper(str_replace(' ', '', $_POST['no_akad']))),
            'angsuran'        => 0,
            'pokok'           => 0,
            'margin'          => 0,
            'angsuran_ke'     => 0,
            'sisa_jkw'        => 0,
            'sisa_pokok'      => 0,
            'sisa_margin'     => 0,
            'jumlah'          => 0,
            'titipan'         => 0,
          );
          $this->db->insert('tb_angsuran', $angsuran);

          $msg = array(
            'sukses' => 'Semua data BERHASIL terinput ke database',
          );
        } else {
          $msg = array(
            'error' => 'Data gagal tersimpan'
          );
        }
      }
    }

    echo json_encode($msg);
  }

  public function add_jumlah()
  {
    $this->db->where('no_akad', $_POST['no_akad']);
    // $this->db->where('no_akad', '0103/AKD-MRBH/KOSPE/XII/2020');
    $jumlah = $this->db->get('tb_datapembiayaan')->row();
    if ($jumlah) {
      $jumlah = $jumlah->no_akad;
    } else {
      $jumlah = $this->session->userdata('no_akad');
    }
    //  var_dump($jumlah);die;
    if ($jumlah == null) {
      $msg = array(
        'error' => 'No. Akad Tidak terdaftar',
      );
    } else {
      $this->db->where('no_akad', $_POST['no_akad']);
      $no_akad = $this->db->get('tb_jumlahpembiayaan')->row();
      if ($no_akad) {
        $msg = array(
          'error' => 'Error',
        );
      } else {
        $data = array(
          'created_at'      => date('Y-m-d'),
          'inputer'         => $this->session->userdata('id'),
          'no_akad'         => $jumlah,
          'hrg_jual'        => htmlspecialchars($_POST['hrg_jual']),
          'pricing'         => htmlspecialchars($_POST['pricing']),
          'dp'              => htmlspecialchars($_POST['dp']),
          'jangka'          => htmlspecialchars($_POST['jangka']),
          'hrg_beli'        => htmlspecialchars($_POST['hrg_beli']),
          'hrg_akhir'       => htmlspecialchars($_POST['hrg_akhir']),
          'angsur'          => htmlspecialchars($_POST['angsur']),
          'admin'           => htmlspecialchars($_POST['admin']),
          'notaris'         => htmlspecialchars($_POST['notaris']),
          'asuransi_jiwa'   => htmlspecialchars($_POST['asuransi_jiwa']),
          'asuransi_kendaraan'    => htmlspecialchars($_POST['asuransi_kendaraan']),
          'jaminan'         => htmlspecialchars($_POST['jaminan']),
          'materai'         => htmlspecialchars($_POST['materai']),
          'total'           => htmlspecialchars($_POST['total']),
        );

        $this->db->insert('tb_jumlahpembiayaan', $data);
        if ($this->db->affected_rows() > 0) {
          $msg = array(
            'sukses' => 'Data jumlah pembiayaan berhasil tersimpan',
          );
        } else {
          $msg = array(
            'error' => 'Data gagal tersimpan'
          );
        }
      }
    }

    echo json_encode($msg);
  }

  public function hitung()
  {
    date_default_timezone_set('Asia/Jakarta');

    $data = array(
      'created_at' => date('Y-m-d'),
      'nama'      => $_POST['nama'],
      'kode_pengajuan'      => $_POST['kode'],
      'nama'      => $_POST['nama'],
      'nama'      => $_POST['nama'],
      'nama'      => $_POST['nama'],
      'nama'      => $_POST['nama'],
      'nama'      => $_POST['nama'],
      'nama'      => $_POST['nama'],
      'nama'      => $_POST['nama'],
      'nama'      => $_POST['nama'],
      'nama'      => $_POST['nama'],
      'nama'      => $_POST['nama'],
      'nama'      => $_POST['nama'],
      'nama'      => $_POST['nama'],
      'nama'      => $_POST['nama'],
      'nama'      => $_POST['nama'],
      'nama'      => $_POST['nama'],
      'nama'      => $_POST['nama'],
      'nama'      => $_POST['nama'],
      'nama'      => $_POST['nama'],

    );
  }

  public function detail()
  {

    $id = $this->input->post('cari_akad');
    // $id = '0103/AKD-MRBH/KOSPE/XII/2020';
    if ($id) {
      $this->db->where('no_akad', $id);
      $result = $this->db->get('tb_datapembiayaan')->row();
      if ($result != null) {
        $this->db->where('no_akad', $id);
        $jumlah = $this->db->get('tb_jumlahpembiayaan')->row();

        $this->db->where('no_akad', $id);
        $this->db->order_by('id', 'desc');
        $angsuran = $this->db->get('tb_angsuran')->result();
        if ($angsuran == null) {
          $angsuran = 0;
        } elseif ($angsuran[0]->angsuran_ke == $jumlah->jangka) {
          $angsuran = 'LUNAS';
        } else {
          $angsuran = count($angsuran);
        }

        $this->db->where('no_akad', $id);
        $this->db->select_sum('pokok', 'total');
        $pokok = $this->db->get('tb_angsuran')->row();
        if ($pokok == null) {
          $sisa_pokok = $jumlah->hrg_beli;
        } else {
          $sisa_pokok = $jumlah->hrg_beli - $pokok->total;
        }

        $this->db->where('no_akad', $id);
        $this->db->select_sum('margin', 'total');
        $margin = $this->db->get('tb_angsuran')->row();
        if ($margin == null) {
          $sisa_margin = $jumlah->hrg_jual - $jumlah->hrg_beli;
        } else {
          $sisa_margin = $jumlah->hrg_jual - $jumlah->hrg_beli - $margin->total;
        }

        $this->db->where('kode', $result->produk);
        $produk = $this->db->get('tb_produk_pembiayaan')->row();
        $this->db->where('kode', $result->jns_pembiayaan);
        $jns = $this->db->get('tb_kategori')->row();
        $tgl_akhir = date("Y-m-d", strtotime($result->tgl_dropping . ' + ' . $jumlah->jangka . ' Months'));

        $str = $jumlah->hrg_beli / $jumlah->jangka;
        $str_end = substr($str, -1);

        if ($str_end > 5) {
          $str = substr($str, 0, -1) . (int)$str_end + 1;
        } else {
          $str;
        }

        $hasil = array(
          'id' => $result->id,
          'jns_pembiayaan' => $jns->nama,
          'produk' => $produk->produk,
          'nama'    => $result->nama,
          'tipe_angsuran' => $result->tipe_angsuran,
          'jml_pembiayaan' => rupiah($jumlah->hrg_akhir),
          'angsuran_perbulan' => rupiah($jumlah->angsur),
          'pokok' => rupiah($jumlah->hrg_beli),
          'margin' => rupiah($jumlah->hrg_jual - $jumlah->hrg_beli),
          'jkw' => $jumlah->jangka,
          'hrg_jual' => rupiah($jumlah->hrg_jual),
          'total_margin' => rupiah($jumlah->hrg_jual - $jumlah->hrg_beli),
          'margin_bln' => rupiah(($jumlah->hrg_jual - $jumlah->hrg_beli) / $jumlah->jangka),
          'margin_thn' => rupiah((($jumlah->hrg_jual - $jumlah->hrg_beli) / $jumlah->jangka) * 12),
          'tgl_jatuh_tempo' => $result->tgl_jatuh_tempo,
          'tgl_dropping' => longdate_indo($result->tgl_dropping),
          'tgl_berakhir' => longdate_indo($tgl_akhir),
          'sisa_pokok' => rupiah($sisa_pokok),
          'pkk' => $str,
          'mgn' => ($jumlah->hrg_jual - $jumlah->hrg_beli) / $jumlah->jangka,
          'sisa_pkk' => $sisa_pokok,
          'sisa_margin' => rupiah($sisa_margin),
          'sisa_mgn' => $sisa_margin,
          'angsuran' => $jumlah->angsur,
          'angsuran_ke' => $angsuran,
        );
      } else {
        $hasil = array('error' => 'Tidak Ada Data dengan <br> No Akad : ' . $id);
      }
      echo json_encode($hasil);
    }
  }

  public function inputAngsuran()
  {
    // $akad = '0014/AKD-MRBH/USPPS/KOSPE/III/2021';
    $akad = $this->input->post('no_akad');
    $this->db->where('no_akad', $akad);
    $no_akad = $this->db->get('tb_datapembiayaan')->row();
    if ($no_akad == null) {
      $msg = array(
        'error' => 'No. Akad tidak ditemukan!',
      );
    } else {
      $data = array(
        'created_at'      => $_POST['tgl_input'],
        'inputer'         => $this->session->userdata('id'),
        'no_akad'         => $no_akad->no_akad,
        'angsuran'        => htmlspecialchars($_POST['angsuran']),
        'pokok'           => htmlspecialchars($_POST['pkk']),
        'margin'          => htmlspecialchars($_POST['mgn']),
        'angsuran_ke'     => htmlspecialchars($_POST['angsuran_ke']),
        'sisa_jkw'        => htmlspecialchars($_POST['sisa_jkw']),
        'sisa_pokok'      => htmlspecialchars($_POST['sisa_pkk'] - $_POST['pkk']),
        'sisa_margin'     => htmlspecialchars($_POST['sisa_mgn'] - $_POST['mgn']),
        'jumlah'          => htmlspecialchars($_POST['bayar']),
        'titipan'         => htmlspecialchars($_POST['titipan']),
        'diskon'          => htmlspecialchars($_POST['diskon']),
        'dpd'             => (date('d') > (int) $no_akad->tgl_jatuh_tempo) ?  date('d') - (int) $no_akad->tgl_jatuh_tempo : 0
      );

      if ($data['angsuran_ke'] == 'LUNAS') {
        $msg = array(
          'error' => 'No. Akad ' . $data["no_akad"] . ' sudah LUNAS'
        );
      } elseif ($_POST['sisa_mgn'] > 0 || $data['angsuran_ke'] != 'LUNAS') {
        $this->db->insert('tb_angsuran', $data);
        $msg = array(
          'sukses' => 'Semua data BERHASIL terinput',
        );
      } else {
        $msg = array(
          'error' => 'Transaksi Gagal Terinput'
        );
      }
    }

    echo json_encode($msg);
  }

  public function kartuAngsuran($id = '')
  {
    $this->db->where('id', $id);
    $data['user'] = $this->db->get('tb_datapembiayaan')->row();

    if ($data['user']) {
      $this->db->where('kode', $data['user']->akad);
      $data['akad'] = $this->db->get('tb_akad')->row();
      $this->db->where('no_akad', $data['user']->no_akad);
      $data['detail'] = $this->db->get('tb_jumlahpembiayaan')->row();
      $this->db->where('no_akad', $data['user']->no_akad);
      $data['angsuran'] = $this->db->get('tb_angsuran')->result();
      $this->load->view('admin/report/kartu-angsuran', $data);
    }
  }

  public function agunan()
  {
    $this->db->where('no_akad', $_POST['no_akad']);
    $no_akd = $this->db->get('tb_datapembiayaan')->row();

    if ($no_akd != null) {
      $jumlah = $no_akd->no_akad;
    } else {
      $jumlah = $this->session->userdata('no_akad');
    }

    if ($no_akd != null) {
      $this->db->where('no_akad', $jumlah);
      $no_akad = $this->db->get('tb_agunan')->row();
      if ($no_akad != null) {
        $msg = array(
          'error' => 'Data agunan ini sudah ada',
        );
      } else {
        if ($_POST['tipe_agunan'] == 'shm' || $_POST['tipe_agunan'] == 'spph') {
          $data = array(
            'created_at'      => date('Y-m-d'),
            'inputer'         => $this->session->userdata('id'),
            'no_akad'         => $jumlah,
            'tipe_agunan'     => htmlspecialchars(strtoupper($_POST['tipe_agunan'])),
            'jns_asset'       => htmlspecialchars(strtoupper($_POST['jns_asset'])),
            'no_agunan'       => htmlspecialchars(strtoupper($_POST['no_agunan'])),
            'pemilik'         => htmlspecialchars(strtoupper($_POST['pemilik'])),
            'alamat_agunan'   => htmlspecialchars(strtoupper($_POST['alamat_agunan'])),
          );
        } elseif ($_POST['tipe_agunan'] == 'bpkb-motor') {
          $data = array(
            'created_at'      => date('Y-m-d'),
            'inputer'         => $this->session->userdata('id'),
            'no_akad'         => $jumlah,
            'tipe_agunan'     => htmlspecialchars(strtoupper($_POST['tipe_agunan'])),
            'no_agunan'       => htmlspecialchars(strtoupper($_POST['no_agunan'])),
            'pemilik'         => htmlspecialchars(strtoupper($_POST['pemilik'])),
            'jns_asset'       => htmlspecialchars(strtoupper($_POST['jns_asset'])),
            'no_polisi'       => htmlspecialchars(strtoupper($_POST['no_polisi'])),
            'no_rangka'       => htmlspecialchars(strtoupper($_POST['no_rangka'])),
            'no_mesin'        => htmlspecialchars(strtoupper($_POST['no_mesin'])),
            'thn'             => htmlspecialchars(strtoupper($_POST['thn'])),
          );
        } elseif ($_POST['tipe_agunan'] == 'bpkb-mobil') {
          $data = array(
            'created_at'      => date('Y-m-d'),
            'inputer'         => $this->session->userdata('id'),
            'no_akad'         => $jumlah,
            'tipe_agunan'     => htmlspecialchars(strtoupper($_POST['tipe_agunan'])),
            'no_agunan'       => htmlspecialchars(strtoupper($_POST['no_agunan'])),
            'pemilik'         => htmlspecialchars(strtoupper($_POST['pemilik'])),
            'jns_asset'       => htmlspecialchars(strtoupper($_POST['jns_asset'])),
            'no_polisi'       => htmlspecialchars(strtoupper($_POST['no_polisi'])),
            'no_rangka'       => htmlspecialchars(strtoupper($_POST['no_rangka'])),
            'no_mesin'        => htmlspecialchars(strtoupper($_POST['no_mesin'])),
            'thn'             => htmlspecialchars(strtoupper($_POST['thn'])),
          );
        } elseif ($_POST['tipe_agunan'] == 'emas') {
          $data = array(
            'created_at'      => date('Y-m-d'),
            'inputer'         => $this->session->userdata('id'),
            'no_akad'         => $jumlah,
            'no_agunan'       => $this->session->userdata('no_akad'),
            'jns_asset'       => htmlspecialchars(strtoupper($_POST['jns_asset'])),
            'tipe_agunan'     => htmlspecialchars(strtoupper($_POST['tipe_agunan'])),
            'no_agunan'       => htmlspecialchars(strtoupper($_POST['no_agunan_emas'])),
            'taksiran_hrg'    => htmlspecialchars(strtoupper($_POST['taksiran_hrg'])),
          );
        } elseif ($_POST['tipe_agunan'] == 'cascol') {
          $data = array(
            'created_at'      => date('Y-m-d'),
            'inputer'         => $this->session->userdata('id'),
            'no_akad'         => $jumlah,
            'tipe_agunan'     => htmlspecialchars(strtoupper($_POST['tipe_agunan'])),
            'jns_asset'       => htmlspecialchars(strtoupper($_POST['jns_asset'])),
            'produk_simpanan' => htmlspecialchars(strtoupper($_POST['produk_simpanan'])),
            'nilai_simpanan'  => htmlspecialchars(strtoupper($_POST['cascol'])),
          );
        } elseif ($_POST['tipe_agunan'] == 'personal') {
          $data = array(
            'created_at'      => date('Y-m-d'),
            'inputer'         => $this->session->userdata('id'),
            'no_akad'         => $jumlah,
            'tipe_agunan'     => htmlspecialchars(strtoupper($_POST['tipe_agunan'])),
            'nama_led'        => htmlspecialchars(strtoupper($_POST['nama_led'])),
            'jns_asset'       => htmlspecialchars(strtoupper($_POST['jns_asset'])),
            'alamat_led'      => htmlspecialchars(strtoupper($_POST['alamat_led'])),
            'id_hni'          => htmlspecialchars(strtoupper($_POST['id_hni'])),
            'no_ktp'          => htmlspecialchars(strtoupper($_POST['ktp_led'])),
            'tlp_led'         => htmlspecialchars(strtoupper($_POST['tlp_led'])),
            'pangkat_hni'     => htmlspecialchars(strtoupper($_POST['pangkat_hni'])),
            'status_agen'     => htmlspecialchars(strtoupper($_POST['status_agen'])),
          );
        } elseif ($_POST['tipe_agunan'] == 'corporate') {
          $data = array(
            'created_at'        => date('Y-m-d'),
            'inputer'           => $this->session->userdata('id'),
            'no_akad'           => $jumlah,
            'no_agunan'         => $jumlah,
            'jns_asset'       => htmlspecialchars(strtoupper($_POST['jns_asset'])),
            'tipe_agunan'       => htmlspecialchars(strtoupper($_POST['tipe_agunan'])),
            'nama_corporate'    => htmlspecialchars(strtoupper($_POST['nama_corporate'])),
            'alamat_corporate'  => htmlspecialchars(strtoupper($_POST['alamat_corporate'])),
          );
        }

        $this->db->insert('tb_agunan', $data);
        if ($this->db->affected_rows() > 0) {
          $msg = array(
            'sukses' => 'Data agunan berhasil terinput',
          );
        } else {
          $msg = array(
            'error' => 'Data Gagal Terinput'
          );
        }
      }
    } else {
      $msg = array(
        'error' => 'No. Akad belum terdaftar, silahkan input Tab Data Rekening',
      );
    }

    echo json_encode($msg);
  }

  public function asuransi()
  {
    $this->db->where('no_akad', $_POST['no_akad']);
    $no_akd = $this->db->get('tb_datapembiayaan')->row();

    if ($no_akd != null) {
      $jumlah = $no_akd->no_akad;
    } else {
      $jumlah = $this->session->userdata('no_akad');
    }

    if ($no_akd  != null) {
      $this->db->where('no_akad', $jumlah);
      $no_akad = $this->db->get('tb_asuransi')->row();
      if ($no_akad != null) {
        $msg = array(
          'error' => 'Data asuransi ini sudah ada',
        );
      } else {
        $data = array(
          'created_at'        => date('Y-m-d'),
          'inputer'           => $this->session->userdata('id'),
          'no_akad'           => htmlspecialchars($_POST['no_akad']),
          'jns_asuransi'      => htmlspecialchars($_POST['jns_asuransi']),
          'tgl_polis'         => htmlspecialchars($_POST['tgl_polis']),
          'jkw_polis'         => htmlspecialchars($_POST['jkw_polis']),
          'nilai_asuransi'    => htmlspecialchars($_POST['nilai_asuransi']),
          'periode_nilai'     => htmlspecialchars($_POST['periode_nilai']),
          'bulan'             => htmlspecialchars($_POST['bulan']),
          'bulan_dijamin'     => htmlspecialchars($_POST['bulan_dijamin']),
        );

        $this->db->insert('tb_asuransi', $data);
        if ($this->db->affected_rows() > 0) {
          $msg = array(
            'sukses' => 'Semua data Asuransi dengan No. Akad: ' . $_POST['no_akad'] . ' BERHASIL terinput ke database',
          );
        } else {
          $msg = array(
            'error' => 'Data Gagal Terinput'
          );
        }
      }
    } else {
      $msg = array(
        'error' => 'No. Akad belum terdaftar, silahkan input Tab Data Rekening',
      );
    }
    echo json_encode($msg);
  }

  public function normatif($akd, $bln = '', $thn = '', $lunas = 0)
  {
    if ($akd == 0) {
      if ($bln == 0 && $thn == 0) {
        $data = $this->db->get('tb_datapembiayaan')->result();
      } elseif ($bln == 0 && $thn != 0) {
        $arr = array(
          'year(tgl_dropping)' => $thn,
        );
        $data = $this->db->get_where('tb_datapembiayaan', $arr)->result();
      } elseif ($bln != 0 && $thn == 0) {
        $arr = array(
          'month(tgl_dropping)' => $bln,
        );
        $data = $this->db->get_where('tb_datapembiayaan', $arr)->result();
      } else {
        $arr = array(
          'month(tgl_dropping)' => $bln,
          'year(tgl_dropping)' => $thn,
        );
        $data = $this->db->get_where('tb_datapembiayaan', $arr)->result();
      }
    } else {
      if ($bln == 0 && $thn == 0) {
        $arr = array(
          'akad' => $akd,
        );
        $data = $this->db->get_where('tb_datapembiayaan', $arr)->result();
      } elseif ($bln == 0 && $thn != 0) {
        $arr = array(
          'akad' => $akd,
          'year(tgl_dropping)' => $thn,
        );
        $data = $this->db->get_where('tb_datapembiayaan', $arr)->result();
      } elseif ($bln != 0 && $thn == 0) {
        $arr = array(
          'akad' => $akd,
          'month(tgl_dropping)' => $bln,
        );
        $data = $this->db->get_where('tb_datapembiayaan', $arr)->result();
      } else {
        $arr = array(
          'akad' => $akd,
          'month(tgl_dropping)' => $bln,
          'year(tgl_dropping)' => $thn,
        );
        $data = $this->db->get_where('tb_datapembiayaan', $arr)->result();
      }
    }
    $result = array();
    $no = 1;
    if ($data != null) {
      foreach ($data as $key) {
        $akad = $key->no_akad;
        // $akad = '0017/AKD-MDRBH/USPPS/KOSPE/V/2021';
        $this->db->where('no_akad', $akad);
        $detail = $this->db->get('tb_jumlahpembiayaan')->row();

        if ($detail != null) {
          $jatuh_tempo = date("Y-m-d", strtotime($key->tgl_dropping . ' + ' . $detail->jangka . ' Months'));


          $this->db->where('no_akad', $akad);
          $this->db->order_by('id', 'desc');
          $angsuran = $this->db->get('tb_angsuran')->result();

          if ($angsuran != null) {
            if (strpos(substr($angsuran[0]->created_at, 8, 2), 0) == 0) {
              $tgl_byr = str_replace('0', '', substr($angsuran[0]->created_at, 8, 2));
            } else {
              $tgl_byr = substr($angsuran[0]->created_at, 8, 2);
            }
          }

          $dpd = (int)$key->tgl_jatuh_tempo - (int)$tgl_byr;
          $dpd = ($dpd < 0) ? str_replace('-', '', $dpd) : '0';

          $pkk_bln = $detail->hrg_beli / $detail->jangka;
          $mgn_bln = ($detail->hrg_jual - $detail->hrg_beli) / $detail->jangka;

          if ($angsuran[0]->angsuran_ke == 0) {
            $tg_pokok = $pkk_bln;
            $tg_margin = $mgn_bln;
          } else {
            $tg_pokok = $pkk_bln - $angsuran[0]->pokok;
            $tg_margin = $mgn_bln - $angsuran[0]->margin;
          }

          if ($dpd == 0) {
            $col = 'LANCAR';
          } elseif ($dpd > 0 && $dpd < 120) {
            $col = 'KURANG LANCAR';
          } elseif ($dpd > 120 && $dpd < 180) {
            $col = 'DIRAGUKAN - NPF';
          } elseif ($dpd > 180) {
            $col = 'MACET - NPF';
          }

          $result[] = array(
            'no' => $no++,
            'no_rek'  => $key->no_rek . '<br>' . $key->no_akad . '<br>ID.' . $key->id_kospe,
            'pencairan' => $key->tgl_dropping . '<br>' . $key->nama,
            'jkw' => ($detail->jangka) ? $detail->jangka : '',
            'jatuh_tempo' => $jatuh_tempo,
            'pembiayaan' => rupiah($detail->hrg_beli) . '<br><a href="#angsur" data-toggle="modal" class="lihat-angsuran badge badge-primary"><form class="noAkad"><input type="hidden" name="id" value="' . $key->no_akad . '"><input type="hidden" name="' . $this->security->get_csrf_token_name() . '" value="' . $this->security->get_csrf_hash() . '" style="display: none"></form>Lihat Angsuran</a>',
            'saldo_pokok' => rupiah($angsuran[0]->sisa_pokok),
            'saldo_margin' => rupiah($angsuran[0]->sisa_margin),
            'tunggakan_pokok' => rupiah($tg_pokok),
            'tunggakan_margin' => rupiah($tg_margin),
            'dpd' => $dpd,
            'col' => $col
          );
        }
      }
    }
    echo json_encode($result);
  }

  public function laporan_normatif()
  {

    $this->db->order_by('id', 'desc');
    $data = $this->db->get('tb_datapembiayaan')->result();
    $result = array();
    $no = 1;
    if ($data != null) {
      foreach ($data as $key) {
        $this->db->where('no_akad', $key->no_akad);
        $detail = $this->db->get('tb_jumlahpembiayaan')->row();
        if ($detail != null) {
          $jatuh_tempo = date("Y-m-d", strtotime($key->tgl_dropping . ' + ' . $detail->jangka . ' Months'));

          $this->db->where('no_akad', $key->no_akad);
          $this->db->order_by('id', 'desc');
          $angsuran = $this->db->get('tb_angsuran')->result();

          if (strpos(substr($angsuran[0]->created_at, 8, 2), 0) == 0) {
            $tgl_byr = str_replace('0', '', substr($angsuran[0]->created_at, 8, 2));
          } else {
            $tgl_byr = substr($angsuran[0]->created_at, 8, 2);
          }

          $dpd = $key->tgl_jatuh_tempo - $tgl_byr;
          $dpd = ($dpd < 0) ? str_replace('-', '', $dpd) : '0';

          $pkk_bln = $detail->hrg_beli / $detail->jangka;
          $mgn_bln = ($detail->hrg_jual - $detail->hrg_beli) / $detail->jangka;

          if ($angsuran[0]->angsuran_ke == 0) {
            $tg_pokok = $pkk_bln;
            $tg_margin = $mgn_bln;
          } else {
            $tg_pokok = $pkk_bln - $angsuran[0]->pokok;
            $tg_margin = $mgn_bln - $angsuran[0]->margin;
          }

          if ($dpd == 0) {
            $col = 'LANCAR';
          } elseif ($dpd > 0 && $dpd < 120) {
            $col = 'KURANG LANCAR';
          } elseif ($dpd > 120 && $dpd < 180) {
            $col = 'DIRAGUKAN - NPF';
          } elseif ($dpd > 180) {
            $col = 'MACET - NPF';
          }

          $result['data'][] = array(
            'no' => $no++,
            'nama'  => $key->nama,
            'no_rek'  => $key->no_rek,
            'pencairan' => $key->tgl_dropping,
            'jkw' => $detail->jangka,
            'jatuh_tempo' => $jatuh_tempo,
            'pembiayaan' => rupiah($detail->hrg_beli),
            'saldo_pokok' => rupiah($angsuran[0]->sisa_pokok),
            'saldo_margin' => rupiah($angsuran[0]->sisa_margin),
            'tunggakan_pokok' => rupiah($tg_pokok),
            'tunggakan_margin' => rupiah($tg_margin),
            'dpd' => $dpd,
            'col' => $col
          );
        }
      }
    }
    $this->load->view('admin/report/laporan_normatif', $result);
  }

  public function getAngsuran()
  {
    $id = $this->input->post('id');
    // $id = '069/AKD-MRBH/KOSPE/IX/2020';
    $this->db->where('no_akad', $id);
    $data = $this->db->get('tb_datapembiayaan')->row();

    if ($data) {
      $this->db->where('kode', $data->akad);
      $akad = $this->db->get('tb_akad')->row();
      $this->db->where('no_akad', $data->no_akad);
      $detail = $this->db->get('tb_jumlahpembiayaan')->row();
      $this->db->where('no_akad', $data->no_akad);
      $angsuran = $this->db->get('tb_angsuran')->result();

      $ang = array();
      $no = 0;
      $n = 1;
      foreach ($angsuran as $angsur) {
        $ang[] = array(
          'no'      => $no,
          'jadwal'     => date("Y-m-d", strtotime($data->tgl_dropping . ' + ' . $no . ' Months')),
          'tgl_byr'   => $angsur->created_at,
          'sisa_pokok'  => rupiah($angsur->sisa_pokok),
          'sisa_margin'  => rupiah($angsur->sisa_margin),
          'pokok'  => rupiah($angsur->pokok),
          'margin'  => rupiah($angsur->margin),
          'titipan'  => rupiah($angsur->titipan),
          'kekurangan'  => rupiah($angsur->kekurangan),
          'jumlah'  => rupiah($angsur->jumlah),
          'dpd'  => $angsur->dpd,
        );
        $no++;
      }

      $result = array(
        'id'          => $data->id,
        'no_rek'        => $data->no_rek,
        'nama'        => $data->nama,
        'hrg_beli'        => rupiah($detail->hrg_beli),
        'hrg_jual'        => rupiah($detail->hrg_jual),
        'margin'        => rupiah($detail->hrg_jual - $detail->hrg_beli),
        'jangka'        => $detail->jangka . ' bulan',
        'no_akad'        => $data->no_akad,
        'akad'        => $akad->nama,
        'angsur'        => rupiah($detail->angsur),
        'tgl_jatuh'        =>  substr($data->tgl_dropping, 5, 2),
        'tgl_dropping'        => $data->tgl_dropping,
        'tgl_end'        => date("Y-m-d", strtotime($data->tgl_dropping . ' + ' . $detail->jangka . ' Months')),
        'no_rek'        => $data->no_rek,
        'angsuran'      => $ang,
        'jkw'           => $detail->jangka . ' bulan'
      );
    } else {
      $result = array('error' => 'Data tidak ditemukan');
    }

    echo json_encode($result);
  }

  public function rekap()
  {
    $data = $this->db->get('tb_datapembiayaan')->result();
    $result = array();
    $no = 1;
    if ($data != null) {
      foreach ($data as $key) {
        $akad =  $key->no_akad;
        // $akad = '0026/AKD-MRBH/USPPS/KOSPE/V/2021';
        $this->db->where('no_akad', $akad);
        $this->db->select_sum('margin', 'total');
        $angsuran = $this->db->get('tb_angsuran')->row();

        $this->db->where('no_akad', $akad);
        $agunan = $this->db->get('tb_agunan')->row();

        $this->db->where('no_akad', $akad);
        $jumlah = $this->db->get('tb_jumlahpembiayaan')->row();

        $jatuh_tempo = date("Y-m-d", strtotime($key->tgl_dropping . ' + ' . $jumlah->jangka . ' Months'));
        
        $result[] = array(
          "no" => $no++,
          "tgl_dropping" => $key->tgl_dropping,
          "tgl_jatuh_tempo" => $jatuh_tempo,
          "id_kospe" => $key->id_kospe,
          "nama" => $key->nama,
          "no_rek" => $key->no_rek,
          "no_akad" =>  $key->no_akad,
          "garansi" => (!$agunan->nama_led) ? $agunan->nama_corporate : $agunan->nama_led,
          "jml_pembiayaan" => rupiah($jumlah->hrg_beli),
          "hrg_jual" => rupiah($jumlah->hrg_jual),
          "margin" => rupiah($jumlah->hrg_jual - $jumlah->hrg_beli),
          "angsuran" => rupiah($jumlah->angsur),
          "pokok" => rupiah($jumlah->hrg_beli),
          "basil" => rupiah($angsuran->total),
          "tenor" => $jumlah->jangka,
          "bln" => $jumlah->pricing,
          "thn" => $jumlah->pricing * $jumlah->jangka
        );
      }
      // var_dump($jumlah);
      echo json_encode($result);
    }
  }

  public function laporan_rekap()
  {
    $data = $this->db->get('tb_datapembiayaan')->result();
    $result = array();
    $no = 1;
    if ($data != null) {
      foreach ($data as $key) {
        $this->db->where('no_akad', $key->no_akad);
        $this->db->select_sum('margin', 'total');
        $angsuran = $this->db->get('tb_angsuran')->row();

        $this->db->where('no_akad', $key->no_akad);
        $agunan = $this->db->get('tb_agunan')->row();

        $this->db->where('no_akad', $key->no_akad);
        $jumlah = $this->db->get('tb_jumlahpembiayaan')->row();

        $jatuh_tempo = date("Y-m-d", strtotime($key->tgl_dropping . ' + ' . $jumlah->jangka . ' Months'));
        $result['data'][] = array(
          "no" => $no++,
          "tgl_dropping" => $key->tgl_dropping,
          "tgl_jatuh_tempo" => $jatuh_tempo,
          "id_kospe" => $key->id_kospe,
          "nama" => $key->nama,
          "no_rek" => $key->no_rek,
          "no_akad" =>  $key->no_akad,
          "garansi" => ($agunan->nama_led == '') ? $agunan->nama_corporate : $agunan->nama_led,
          "jml_pembiayaan" => $jumlah->hrg_beli,
          "hrg_jual" => $jumlah->hrg_jual,
          "margin" => $jumlah->hrg_jual - $jumlah->hrg_beli,
          "angsuran" => $jumlah->angsur,
          "pokok" => $jumlah->hrg_beli,
          "basil" => $angsuran->total,
          "tenor" => $jumlah->jangka,
          "bln" => $jumlah->pricing,
          "thn" => $jumlah->pricing * $jumlah->jangka
        );
      }
    }
    $this->load->view('admin/report/laporan_rekap', $result);
  }

  public function kolaktabilitas()
  {
    $data = $this->db->get('tb_datapembiayaan')->result();
    $result = array();
    $no = 1;
    if ($data != null) {
      foreach ($data as $key) {

        $this->db->select_sum('pokok', 'total');
        $this->db->where('no_akad', $key->no_akad);
        $angsur = $this->db->get('tb_angsuran')->row();

        $this->db->where('no_akad', $key->no_akad);
        $jumlah = $this->db->get('tb_jumlahpembiayaan')->row();

        $this->db->where('no_akad', $key->no_akad);
        $this->db->order_by('id', 'desc');
        $angsuran = $this->db->get('tb_angsuran')->result();

        $jatuh_tempo = date("Y-m-d", strtotime($key->tgl_dropping . ' + ' . $jumlah->jangka . ' Months'));

        if (strpos(substr($angsuran[0]->created_at, 8, 2), 0) == 0) {
          $tgl_byr = str_replace('0', '', substr($angsuran[0]->created_at, 8, 2));
        } else {
          $tgl_byr = substr($angsuran[0]->created_at, 8, 2);
        }

        $dpd = (int)$key->tgl_jatuh_tempo - (int)$tgl_byr;
        $dpd = ($dpd < 0) ? str_replace('-', '', $dpd) : '0';

        $result[] = array(
          "no" => $no++,
          "nama_anggota" => $key->nama,
          "jml_pembiayaan" => rupiah($jumlah->hrg_beli),
          "saldo_pokok" => rupiah($jumlah->hrg_beli - $angsur->total),
          "tgl_mulai" => $key->tgl_dropping,
          "tgl_akhir" =>  $jatuh_tempo,
          "angsuran" => rupiah($jumlah->angsur),
          "menunggak" => $dpd
        );
      }
      echo json_encode($result);
    }
  }

  public function detailData()
  {

    // $id = "0024/AKD-MRBH/USPPS/KOSPE/V/2021";
    $id = $this->input->post('cari_noAkad');
    $this->db->where('no_akad', $id);
    $data = $this->db->get('tb_datapembiayaan')->row();

    if ($data != null) {
      $this->db->where('no_akad', $data->no_akad);
      $jumlah = $this->db->get('tb_jumlahpembiayaan')->row();

      $this->db->where('no_akad', $data->no_akad);
      $agunan = $this->db->get('tb_agunan')->row();

      $this->db->where('no_akad', $data->no_akad);
      $asuransi = $this->db->get('tb_asuransi')->row();

      if ($jumlah == null) {
        $result = array(
          'sukses' => 'data jumlah belum disi',
        );
      }

      if ($agunan == null) {
        $result = array(
          'sukses' => 'data agunan belum diisi',
        );
      }

      if ($asuransi == null) {
        $result = array(
          'sukses' => 'Data asuransi pembiayaan belum diisi',
        );
      }

      if ($jumlah && $agunan && $asuransi) {
        $result = array(
          // data pembiayaan
          'no_rek'          => $data->no_rek,
          'no_akad'         => $data->no_akad,
          'jns_pembiayaan'  => $data->jns_pembiayaan,
          'tipe_angsuran'   => $data->tipe_angsuran,
          'tgl_aplikasi'    => $data->tgl_aplikasi,
          'tgl_setuju'      => $data->tgl_setuju,
          'tgl_dropping'    => $data->tgl_dropping,
          'tgl_jatuh_tempo' => $data->tgl_jatuh_tempo,
          'id_kospe'        => $data->id_kospe,
          'nama'            => $data->nama,
          'hp'              => $data->hp,
          'kantor'          => $data->kantor,
          'cabang'          => $data->cabang,
          'pasangan'        => $data->pasangan,
          'tlp_pasangan'    => $data->tlp_pasangan,
          'nama_saudara'    => $data->nama_saudara,
          'telp_saudara'    => $data->telp_saudara,
          'alamat_saudara'  => $data->alamat_saudara,
          'produk'          => $data->produk,
          'akad'            => $data->akad,

          // data jumlah pekbiayan
          'hrg_jual'        => $jumlah->hrg_jual,
          'pricing'         => $jumlah->pricing,
          'dp'              => $jumlah->dp,
          'jangka'          => $jumlah->jangka,
          'hrg_beli'        => $jumlah->hrg_beli,
          'hrg_akhir'       => $jumlah->hrg_akhir,
          'angsur'          => $jumlah->angsur,
          'admin'           => $jumlah->admin,
          'notaris'    => $jumlah->notaris,
          'asuransi_jiwa'    => $jumlah->asuransi_jiwa,
          'asuransi_kendaraan'    => $jumlah->asuransi_kendaraan,
          'jaminan'    => $jumlah->jaminan,
          'materai'    => $jumlah->materai,
          'total'    => $jumlah->total,

          // data agunan
          'tipe_agunan'    => strtolower($agunan->tipe_agunan),
          'jns_asset'    => $agunan->jns_asset,
          'no_agunan'    => $agunan->no_agunan,
          'pemilik'    => $agunan->pemilik,
          'alamat_agunan'    => $agunan->alamat_agunan,
          'no_polisi'    => $agunan->no_polisi,
          'no_rangka'    => $agunan->no_rangka,
          'no_mesin'    => $agunan->no_mesin,
          'thn'    => $agunan->thn,
          'taksiran_hrg'    => $agunan->taksiran_hrg,
          'produk_simpanan'    => $agunan->produk_simpanan,
          'nilai_simpanan'    => $agunan->nilai_simpanan,
          'nama_led'    => $agunan->nama_led,
          'alamat_led'    => $agunan->alamat_led,
          'id_hni'    => $agunan->id_hni,
          'no_ktp'    => $agunan->no_ktp,
          'pangkat_hni'    => $agunan->pangkat_hni,
          'tlp_led'    => $agunan->tlp_led,
          'status_agen'    => $agunan->status_agen,
          'nama_corporate'    => $agunan->nama_corporate,
          'alamat_corporate'    => $agunan->alamat_corporate,

          // data asuransi
          'jns_asuransi'    => $asuransi->jns_asuransi,
          'tgl_polis'    => $asuransi->tgl_polis,
          'jkw_polis'    => $asuransi->jkw_polis,
          'nilai_asuransi'    => $asuransi->nilai_asuransi,
          'periode_nilai'    => $asuransi->periode_nilai,
          'bulan'    => $asuransi->bulan,
          'bulan_dijamin'    => $asuransi->bulan_dijamin,
        );
      }
    } else {
      $result = array(
        'sukses' => 'No. Akad tidak terdaftar',
      );
    }
    echo json_encode($result);
  }

  public function change()
  {
    // $val = 20;
    // $name = 'tgl_jatuh_tempo';
    // $akad = '071/AKD-MRBH/KOSPE/IX/2020';
    // $table = 'tb_datapembiayaan';
    $val = $_POST['val'];
    $name = $_POST['name'];
    $akad = $_POST['akad'];
    $table = $_POST['table'];

    $this->db->where('no_akad', $akad);
    $this->db->set($name, $val);
    $this->db->update($table);
    if ($this->db->affected_rows() > 0) {
      $res = array(
        'response' => 'Berhasil'
      );
    } else {
      $res = array(
        'response' => 'Gagal'
      );
    }
    echo json_encode($res);
  }

  public function inputAnalisa()
  {
    $akad = $_POST['kategori'];
    if ($akad) {
      for ($i = 0; $i < count($akad); $i++) {
        $data = array(
          'created_at'  => date('Y-m-d h:i:s'),
          'inputer'     => $this->session->userdata('id'),
          'nama'        => htmlspecialchars($_POST['nama']),
          'no_akad'        => htmlspecialchars($_POST['no_akad']),
          'kategori'        => htmlspecialchars($_POST['kategori'][$i]),
          'skor'        => htmlspecialchars($_POST['skor'][$i]),
        );

        $this->db->insert('analisa', $data);
      }

      if ($this->db->affected_rows() > 0) {
        $result = array(
          'sukses'  => 'Data Analisa berhasil disimpan'
        );
      } else {
        $result = array(
          'error'  => 'Data Analisa gagal disimpan'
        );
      }
    }

    echo json_encode($result);
  }
}
