<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Promo extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('tgl_indo');
  }

  public function index()
  {
    $id = $this->session->userdata('id');
    if ($id) {
      # code...
      $level = $this->session->userdata('level');
      $table = 'tb_user';
      $query = "SELECT `id_user`, `menu`
            FROM `tb_user_menu` JOIN `tb_menu_acces` 
              ON `tb_user_menu`.`id_user` = `tb_menu_acces`.`menu_id`
            WHERE `tb_menu_acces`.`role_id`= $level
          ORDER BY `tb_menu_acces`.`menu_id` ASC";
      $data['title'] = 'Produk';
      $data['link'] = 'produk';
      $data['parent'] = 'Dashboard';
      $data['admin'] = $this->db->query($query)->result_array();
      $data['menu'] = $this->db->get('tb_menu')->result_array();

      $this->db->order_by('id', 'DESC');
      $this->db->where('is_active', 1);
      $data['promo'] = $this->db->get('tb_promo')->result_array();
      $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
      $data['slider'] = $this->db->get('tb_slider')->result_array();

      $this->load->view('admin/header', $data);
      $this->load->view('admin/v_promo', $data);
      $this->load->view('admin/footer', $data);
    } else {
      # code...
      redirect('home');
    }
  }
  public function add()
  {

    $this->form_validation->set_rules('judul', 'Nama Produk', 'trim|required');
    // $this->form_validation->set_rules('img', 'Gambar', 'trim|required');
    $judul = htmlspecialchars($this->input->post('judul'));

    $config['upload_path']          = './asset/img/promo/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 2024;
    $config['encrypt_name']         = true;
    $config['overwrite']            = true;

    $this->load->library('upload', $config);
    // var_dump($this->upload->display_errors()); die;
    
    if ($this->form_validation->run() == TRUE) {
      if (!$this->upload->do_upload('img')) {
        echo $this->upload->display_errors();
      } else {
        $img = $this->upload->data('file_name');
        $data = array(
          'created_at' => date('Y-m-d'),
          'inputer' => $this->session->userdata('id'),
          'judul' => strtoupper($judul),
          'ket' => htmlspecialchars($this->input->post('ket')),
          'start' => $this->input->post('start'),
          'end' => $this->input->post('end'),
          'img' => $img
        );
      }
      $this->db->insert('tb_promo', $data);
      $this->session->set_flashdata('alert', '<div class="alert alert-success">Data baru berhasil dirubah</div>');
      redirect('promo');
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Data baru gagal dirubah</div>');
      redirect('promo');
    }
  }

  public function edit()
  {

    $this->form_validation->set_rules('judul', 'Nama Produk', 'trim|required');

    $id = $this->input->post('id');
    $judul = htmlspecialchars($this->input->post('judul'));

    $config['upload_path']          = './asset/img/promo/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 2048; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('img')) {
      echo $this->upload->display_errors();
    } else {
      $img = $this->upload->data('file_name');
      $data = array(
        'created_at' => date('Y-m-d'),
        'inputer' => $this->session->userdata('id'),
        'judul' => strtoupper($judul),
        'ket' => htmlspecialchars($this->input->post('ket')),
        'start' => $this->input->post('start'),
        'end' => $this->input->post('end'),
        'img' => $img
      );
    }
    if ($this->form_validation->run() == TRUE) {
      $this->db->where('id', $id);
      $this->db->update('tb_promo', $data);
      $this->session->set_flashdata('alert', '<div class="alert alert-info">Data baru berhasiil dirubah</div>');
      redirect('promo');
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf. data gagal dirubah</div>');
      redirect('promo');
    }
  }

  public function delete($id)
  {

    $this->db->where('id', $id);
    $this->db->set('is_active', 0);
    $this->db->update('tb_promo');
    $this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil dihapus</div>');
    redirect('promo');
  }
}


/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
