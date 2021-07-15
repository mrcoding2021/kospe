<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Menu
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller MENU
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Adventure extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index(){
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
      $data['title'] = 'Adventure';
      $data['admin'] = $this->db->query($query)->result_array();
      $data['menu'] = $this->db->get('tb_menu')->result_array();
      $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
      $data['slider'] = $this->db->get('tb_slider')->result_array();
      $this->load->view('admin/header', $data);
      $this->load->view('admin/v_slider', $data);
      $this->load->view('admin/footer', $data);
    } else {
      
      redirect('home/login_page');
      
    }
    
  }
  public function addSlider()
  {

    $this->form_validation->set_rules('nama', 'Nama Menu', 'trim|required');
    $this->form_validation->set_rules('akses', 'Hak Akses', 'trim|required');
    $this->form_validation->set_rules('icon', 'Menu Icon', 'trim|required');
    $this->form_validation->set_rules('link', 'Menu Link', 'trim|required');

    $nama = htmlspecialchars($this->input->post('nama'));
    $akses = $this->input->post('akses');
    $icon = htmlspecialchars($this->input->post('icon'));
    $link = htmlspecialchars($this->input->post('link'));

    $data = array(
      'nama' => $nama,
      'acces'   => $akses,
      'icon'    => $icon,
      'attr_href'    => $link,
    );

    $config['upload_path']          = '../../upload/product/';
    $config['allowed_types']        = 'jpg|png';
    $config['file_name']            = $this->product_id;
    $config['overwrite']			= true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->form_validation->run() == TRUE) {
      $this->db->insert('tb_menu', $data);
      $this->session->set_flashdata('alert', '<div class="alert alert-info">Menu baru berhasiil ditambahan</div>');
      redirect('admin/menu');
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf, menu baru gagal di tambahkan</div>');
      redirect('admin/menu');
    }
  }

  public function editSlider()
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

    $data = array(
      'nama' => $nama,
      'acces'   => $akses,
      'icon'    => $icon,
      'attr_href'    => $link
    );
    $this->db->where('id_menu', $$id);

    if ($this->form_validation->run() == TRUE) {
      $this->db->update('tb_menu', $data);
      $this->session->set_flashdata('alert', '<div class="alert alert-info">Menu baru berhasiil dirubah</div>');
      redirect('admin/menu');
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf, menu baru gagal dirubah</div>');
      redirect('admin/menu');
    }
  }

  
}


/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
