<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Collaction extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('tgl_indo');
    $this->load->helper('rupiah');
    $this->load->helper('romawi');
  }

  public function index()
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
      $data['title'] = 'Collaction';
      $data['admin'] = $this->db->query($query)->result_array();
      $data['menu'] = $this->db->get('tb_menu')->result_array();
      $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
      $data['collaction'] = $this->db->get('tb_collaction')->result();

      $this->load->view('admin/header', $data);
      $this->load->view('admin/v_collaction', $data);
      $this->load->view('admin/footer', $data);
    } else {
      redirect('auth');
    }
  }

  public function add()
  {
    date_default_timezone_set('Asia/Jakarta');

    $tgl_start = substr($_POST['tgl_start'], 6) . '-' . substr($_POST['tgl_start'], 0, 2) . '-' . substr($_POST['tgl_start'], 3, 2);

    $tgl_end = substr($_POST['tgl_end'], 6) . '-' . substr($_POST['tgl_end'], 0, 2) . '-' . substr($_POST['tgl_end'], 3, 2);

    $this->db->where('id_akad', $_POST['akad']);
    $no_akd = $this->db->get('tb_akad')->row();

    $data = array(
      'created_at'  => date('Y-m-d'),
      'nama'        =>  $_POST['nama'],
      'id_kospe'    =>  $_POST['id_kospe'],
      'akad'        =>  $_POST['akad'],
      'no_akad'     => $_POST['no_akad'],
      // 'no_akad' => '0' . ($_POST['no_akad']) . '/AKD-' . $no_akd->kode.'/KOSPE/'.getRomawi($_POST['tgl_start'], 3, 2).'/'. substr($_POST['tgl_start'], 6), 
      'tgl_start'    =>  $tgl_start,
      'tgl_end'        =>  $tgl_end,
      'tujuan'      =>  $_POST['tujuan'],
      'dropping'    =>  $_POST['dropping'],
      'angsuran'    =>  $_POST['angsuran'],
      'tenor'       =>  $_POST['tenor'],
      'jual'        =>  $_POST['jual'],
      'tlp'         =>  $_POST['tlp'],
      'email'       =>  $_POST['email']
    );

    $this->db->insert('tb_collaction', $data);
    $this->session->set_flashdata('alert', '<div class="alert alert-success">Selamat Data Ini berhasil ditmabahkan</div>');
    redirect('collaction');
  }

  public function edit($id)
  {
    date_default_timezone_set('Asia/Jakarta');

    $tgl_start = substr($_POST['tgl_start'], 6) . '-' . substr($_POST['tgl_start'], 0, 2) . '-' . substr($_POST['tgl_start'], 3, 2);

    $tgl_end = substr($_POST['tgl_end'], 6) . '-' . substr($_POST['tgl_end'], 0, 2) . '-' . substr($_POST['tgl_end'], 3, 2);



    $data = array(
      'created_at'  => date('Y-m-d'),
      'nama'        =>  $_POST['nama'],
      'id_kospe'    =>  $_POST['id_kospe'],
      'akad'        =>  $_POST['akad'],

      'tujuan'      =>  $_POST['tujuan'],
      'dropping'    =>  $_POST['dropping'],
      'angsuran'    =>  $_POST['angsuran'],
      'tenor'       =>  $_POST['tenor'],
      'jual'        =>  $_POST['jual'],
      'tlp'         =>  $_POST['tlp'],
      'email'       =>  $_POST['email']
    );

    $this->db->where('id_collaction', $id);
    $this->db->update('tb_collaction', $data);
    $this->session->set_flashdata('alert', '<div class="alert alert-success">Selamat Data Ini berhasil dirubah</div>');
    redirect('collaction');
  }


  public function delete($id)
  {
    $this->db->where('id_collaction', $id);
    $this->db->set('is_active', 0);
    $this->db->update('tb_collaction');
    $this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil dihapus</div>');
    redirect('collaction');
  }

  public function no_akad()
  {
    $no_akad = $_POST['no_akad'];
    // $no_akad = '070/AKD-MRBH/KoSPE/IX/2020';
    $this->db->where('no_akad', $no_akad);
    $data = $this->db->get('tb_collaction')->row();
    $this->db->where('id_akad', $data->akad);
    $akad = $this->db->get('tb_akad')->row();
    $this->db->where('id_tujuan', $data->tujuan);
    $tujuan = $this->db->get('tb_tujuan')->row();

    $this->db->order_by('id_bayar', 'desc');
    $this->db->where('no_akad', $no_akad);
    $bayar = $this->db->get('tb_bayar')->row();
    // var_dump($bayar);
    if ($bayar != null) {
      $angsur = $bayar->angsuran_ke;
    } else {
      $angsur = 0;
    }
    $json = array(
      'id_collaction' => $data->id_collaction,
      'nama' => $data->nama,
      'no_akad' => $data->no_akad,
      'created_at' => $data->created_at,
      'tgl_start' => shortdate_indo($data->tgl_start),
      'tgl_end' => shortdate_indo($data->tgl_end),
      'id_kospe' => $data->id_kospe,
      'akad' => $akad->nama,
      'tujuan' => $tujuan->nama,
      'dropping' => rupiah($data->dropping),
      'angsuran' => rupiah($data->angsuran),
      'angsur' => $angsur,
      'jual' => rupiah($data->jual),
      'dp' => rupiah($data->dp),
      'tlp' => $data->tlp,
      'email' => $data->email,
      'tenor' => $data->tenor . ' bulan',
    );

    echo json_encode($json);
  }

  public function mutasi()
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
      $data['title'] = 'Mutasi Collaction';
      $data['admin'] = $this->db->query($query)->result_array();
      $data['menu'] = $this->db->get('tb_menu')->result_array();
      $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
      $data['collaction'] = $this->db->get('tb_collaction')->result();
      $this->load->view('admin/header', $data);
      $this->load->view('admin/v_mutasi', $data);
      $this->load->view('admin/footer', $data);
    } else {
      redirect('auth');
    }
  }

  public function orang()
  {
    $this->db->where('no_akad', $_POST['id_akad']);
    $data = $this->db->get('tb_collaction')->row();

    $array = array(
      'nama'      => $data->nama,
      'jual'       => rupiah($data->jual),
      'dropping'       => rupiah($data->dropping),
      'tenor'       => $data->tenor . ' bulan',
      'angsuran'       => rupiah($data->angsuran),
      'margin'       => rupiah($data->jual - $data->dropping),
      'tgl_angsur' => longdate_indo(date('Y-m') . '-' . substr($data->tgl_start, 5, 2))
    );

    echo json_encode($array);
  }

  public function view_mutasi($id = 0)
  {

    $id = str_replace('_', '/', $id);
    $this->db->where('no_akad', $id);
    $datas = $this->db->get('tb_bayar')->result();
    $this->db->where('no_akad', $id);
    $user = $this->db->get('tb_collaction')->row();
    $no = 1;
    $saldo = $user->jual;
    $pokok = $user->dropping / $user->tenor;
    $margin = ($saldo - $user->dropping) / $user->tenor;
    $array = array();
    foreach ($datas as $data) {
      if ($data->bayar == 0) {
        $saldo = $saldo - $data->bayar - 0;
      } else {
        $saldo = $saldo - $data->bayar;
      }

      $array[] = array(
        'no' => $no++,
        'reff'      => $data->reff,
        'ket'       => $data->ket,
        'created_at' => shortdate_indo($data->created_at),
        'bayar'     => rupiah($data->bayar),
        'margin' => rupiah($data->bayar - $pokok),
        'pokok' => rupiah($data->bayar - $margin),
        'jumlah'     => rupiah($saldo),
      );
    }

    echo json_encode($array);
  }

  public function getData()
  {
    $id = $_POST['no_akad'];
    $no = 0;
    $this->db->where('no_akad', $id);
    $datas = $this->db->get('tb_bayar')->result();
    foreach ($datas as $data) {
      $array[$no++] = array(
        'reff'      => $data->reff,
        'created_at' => shortdate_indo($data->created_at),
        'bayar'     => rupiah($data->bayar),
      );
    }

    // var_dump($datas);
    echo json_encode($datas);
  }

  public function bayar()
  {
    // date_default_timezone_set('Asia/Jakarta');
    $data = array(
      'id_kospe' => $_POST['id_kospe'],
      'no_akad' => $_POST['no_akad'],
      'created_at' => date('Y-m-d'),
      'reff' => $_POST['reff'],
      'angsuran_ke' => $_POST['angsuran_ke'],
      'bayar' => str_replace('.', '', str_replace('Rp ', '', $_POST['angsuran'])),
      'ket' => $_POST['ket'],
    );

    $this->db->insert('tb_bayar', $data);

    echo json_encode($data);
  }
}
