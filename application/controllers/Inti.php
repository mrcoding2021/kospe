<?php
defined('BASEPATH') or exit('No direct script access allowed');
include 'Core.php';

class Inti extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('tgl_indo');
  }

  public function core($data)
  {
    date_default_timezone_set('Asia/Jakarta');
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

      $data['admin'] = $this->db->query($query)->result_array();
      $data['menu'] = $this->db->get('tb_menu')->result_array();
      $data['post'] = $this->db->get('tb_post')->result_array();
      $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
      $this->db->where('parent', 0);
      $data['analisa'] = $this->db->get('tb_analisa')->result();
      $data['pembiayaan'] = $this->db->get('tb_pembiayaan')->result();
      $data['parent'] = 'Dashboard';
      $data['post'] = $this->db->get('tb_post')->result();
      $data['produk'] = $this->db->get('tb_produk')->result();
      $data['blog'] = $this->db->get('tb_post')->result();
      $this->load->view('admin/header', $data);
      $this->load->view('admin/' . $data['view'], $data);
      $this->load->view('admin/footer', $data);
    } else {
      redirect('auth');
    }
  }

  
}
