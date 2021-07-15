<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index(){
    $id = $this->session->userdata('id');
    if ($id) {
      redirect('admin/menu');
    } else {
      redirect('home/login_page');
    }
  }

  public function addMenu()
  {

    $this->form_validation->set_rules('nama', 'Nama Menu', 'trim|required');
    $this->form_validation->set_rules('akses', 'Hak Akses', 'trim|required');
    $this->form_validation->set_rules('icon', 'Menu Icon', 'trim|required');
    $this->form_validation->set_rules('link', 'Menu Link', 'trim|required');

    $nama = htmlspecialchars($this->input->post('nama'));
    $akses = $this->input->post('akses');
    $icon = htmlspecialchars($this->input->post('icon'));
    $link = htmlspecialchars($this->input->post('link'));
    $parent = $this->input->post('parent');
    $dropdown = $this->input->post('dropdown');
    $data = array(
      'nama' => $nama,
      'acces'   => $akses,
      'icon'    => $icon,
      'attr_href'    => $link,
      'parent'  => $parent,
      'dropdown' => $dropdown
    );

    if ($this->form_validation->run() == TRUE) {
      $this->db->insert('tb_menu', $data);
      $this->session->set_flashdata('alert', '<div class="alert alert-info">Menu baru berhasiil ditambahan</div>');
      redirect('admin/menu');
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf, menu baru gagal di tambahkan</div>');
      redirect('admin/menu');
    }
  }

  public function editMenu()
  {

    $this->form_validation->set_rules('id_menu', 'Id Menu', 'trim|required');
    $this->form_validation->set_rules('nama', 'Nama Menu', 'trim|required');
    $this->form_validation->set_rules('akses', 'Hak Akses', 'trim|required');
    $this->form_validation->set_rules('icon', 'Menu Icon', 'trim|required');
    $this->form_validation->set_rules('link', 'Menu Link', 'trim|required');


    $id = htmlspecialchars($this->input->post('id_menu'));
    $nama = htmlspecialchars($this->input->post('nama'));
    $akses = $this->input->post('akses');
    $icon = htmlspecialchars($this->input->post('icon'));
    $link = htmlspecialchars($this->input->post('link'));
    $parent = $this->input->post('parent');
    $dropdown = $this->input->post('dropdown');
    
    $data = array(
      'nama' => $nama,
      'acces'   => $akses,
      'icon'    => $icon,
      'attr_href'    => $link,
      'parent'  => $parent,
      'dropdown' => $dropdown
    );
    $this->db->where('id_menu', $id);

    if ($this->form_validation->run() == TRUE) {
      $this->db->update('tb_menu', $data);
      $this->session->set_flashdata('alert', '<div class="alert alert-info">Menu baru berhasiil dirubah</div>');
      redirect('admin/menu');
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf, menu baru gagal dirubah</div>');
      redirect('admin/menu');
    }
  }

  public function akses()
  {
    $id = $this->uri->segment(3);
    $data = $this->db->get_where('tb_menu', array('id_menu' => $id))->row_array();
    $akses = $data['is_active'];
    $this->db->where('id_menu', $id);
    if ($akses == 1) {
      $this->db->update('tb_menu', array('is_active' => 2));
    } elseif ($akses == 2) {
      $this->db->update('tb_menu', array('is_active' => 1));
    }
    redirect('admin/menu');
  }

  public function delete(){
    $id = $this->uri->segment(3);

    $this->db->where('id_menu', $id); 
    $this->db->delete('tb_menu');
    redirect('admin/menu');
  }
}


/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
