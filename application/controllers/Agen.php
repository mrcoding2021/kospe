<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Agen extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('tgl_indo');
    $this->load->helper('xss');
    $this->load->model('Model_global', 'mapp');
  }

  public function core($data)
  {
    date_default_timezone_set('Asia/Jakarta');

    $id = $this->session->userdata('id');
    $id_agen = $this->session->userdata('id_agen');
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
      $data['agen'] = $this->db->get('agen')->result();

      $this->load->view('admin/header', $data);
      $this->load->view('agen/' . $data['view'], $data);
      $this->load->view('admin/footer', $data);
    } else {
      if ($id_agen) {
        $level = $this->session->userdata('lvl');
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

        $this->db->where('parent', $id_agen);
        $data['agen'] = $this->db->get('agen')->result();

        $this->load->view('admin/header', $data);
        $this->load->view('agen/' . $data['view'], $data);
        $this->load->view('admin/footer', $data);
      } else {
        redirect('agen/login');
      }
    }
    
  }

  public function index()
  {
    $data['title'] = 'Agen';
    $data['view'] = 'agen';
    $data['link'] = 'agen';
    $data['parent'] = 'Dashboard';
    $this->core($data);
  }

  public function dashboard()
  {
    $data['title'] = 'Dashboard';
    $data['view'] = 'dashboard';
    $data['link'] = 'agen';
    $data['parent'] = 'Agen';
    $this->core($data);
  }

  public function earn()
  {
    $data['title'] = 'Pendapatan';
    $data['view'] = 'earn';
    $data['link'] = 'agen';
    $data['parent'] = 'Agen';
    $this->core($data);
  }

  public function profil()
  {
    $data['title'] = 'Profil';
    $data['view'] = 'profil';
    $data['link'] = 'agen';
    $data['parent'] = 'Agen';
    $this->core($data);
  }

  public function login()
  {
    $this->load->view('agen/login');
  }

  public function add()
  {
    $this->form_validation->set_rules('nama', 'Judul Post', 'trim|required');
    $this->form_validation->set_rules('id_kospe', 'Isi Post', 'trim|required');
    if ($_POST['id']) {
      $data = array(
        'id_kospe'    => $this->input->post('id_kospe'),
        'nama'    => $this->input->post('nama'),
        'parent'    => $this->input->post('parent'),
        'alamat'    => $this->input->post('alamat'),
        'no_hp'    => $this->input->post('no_hp'),
        'id_hni'    => $this->input->post('id_hni'),
        'no_ktp'    => $this->input->post('no_ktp'),
        'email'    => $this->input->post('email'),
        'target'    => $this->input->post('target'),
        'ket'    => $this->input->post('ket'),
      );

      $this->db->where('id', $_POST['id']);
      $this->db->update('agen', $data);
      $res = array(
        'response' => 'Data berhasil diubah',
        'url' => base_url('agen')
      );
    } else {
      $data = array(
        'created_at'        => date('Y-m-d'),
        'inputer'     => $this->session->userdata('id'),
        'id_kospe'    => $this->input->post('id_kospe'),
        'parent'    => $this->input->post('parent'),
        'nama'    => $this->input->post('nama'),
        'alamat'    => $this->input->post('alamat'),
        'no_hp'    => $this->input->post('no_hp'),
        'id_hni'    => $this->input->post('id_hni'),
        'no_ktp'    => $this->input->post('no_ktp'),
        'email'    => $this->input->post('email'),
        'target'    => $this->input->post('target'),
        'ket'    => $this->input->post('ket'),
      );

      $this->db->insert('agen', $data);
      $res = array(
        'response' => 'Data berhasil diubah',
        'url' => base_url('agen')
      );
    }

    echo json_encode($res);
  }

  public function detail($id = 0)
  {

    $this->db->where('id', $id);
    $data = $this->db->get('agen')->row();
    $this->db->where('id', $data->parent);
    $parent = $this->db->get('agen')->row();

    $res = array(
      'id_kospe'    => $data->id_kospe,
      'id'          => $data->id,
      'nama'        => $data->nama,
      'parent'      => $data->parent,
      'parent_name' => ($data->parent == 0) ? 'KoSPE' : $parent->nama,
      'alamat'      => $data->alamat,
      'no_hp'       => $data->no_hp,
      'id_hni'      => $data->id_hni,
      'no_ktp'      => $data->no_ktp,
      'email'       => $data->email,
      'target'      => $data->target,
      'ket'         => $data->ket,
    );

    echo json_encode($res);
  }

  public function auth()
  {
    if ($_POST['username'] && $_POST['password']) {
      $this->db->where('email', $_POST['username']);
      $agen = $this->db->get('agen')->row();
      if ($agen) {
        if ($agen->pass == $_POST['password']) {
          $array = array(
            'user'   => $agen->nama,
            'id_agen'  => $agen->id,
            'lvl'  => $agen->level,
            'parent' => $agen->parent
          );

          $this->session->set_userdata($array);
          $res = array(
            'response' => 'Sukses',
            'url' => base_url('agen/index')
          );
        } else {
          $res = array(
            'response' => 'Password salah'
          );
        }
      } else {
        $res = array(
          'response' => 'Username tidak terdaftar atau belum aktif'
        );
      }
    } else {
      $res = array(
        'response' => 'Usernmae dan Password tidak boleh kosong'
      );
    }

    echo json_encode($res);
  }
}


/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
