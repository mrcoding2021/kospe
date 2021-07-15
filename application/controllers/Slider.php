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

class Slider extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
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
      $data['title'] = 'Slider';
      $data['link'] = 'Slider';
      $data['parent'] = 'Dashboard';
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
    date_default_timezone_set('Asia/Jakarta');
    $config['upload_path']          = './asset/img/slides/nivo/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['overwrite']      = true;
    $config['max_size']             = 2048; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->form_validation->set_rules('nama', 'Nama Slider', 'trim|required');
    $this->form_validation->set_rules('caption', 'Caption Slider', 'trim|required');

    $id = htmlspecialchars($this->input->post('id_slider'));
    $nama = htmlspecialchars($this->input->post('nama'));
    $caption = htmlspecialchars($this->input->post('caption'));
    $data = array(
      'nama' => $nama,
      'caption' => $caption,
      'date' => date('Y-m-d')
    );

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('img')) {
      echo  $this->upload->display_errors();
    } else {
      $img = $this->upload->data('file_name');
      $this->db->set('img', $img);
      
    }
    if ($this->form_validation->run() == TRUE) {
      $this->db->insert('tb_slider', $data);
      $this->session->set_flashdata('alert', '<div class="alert alert-info">Data baru berhasiil dirubah</div>');
      redirect('slider');
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf. data gagal dirubah</div>');
      redirect('slider');
    }
  }

  public function editSlider()
  {
    $config['upload_path']          = './asset/img/slides/nivo/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 2048; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;
    $this->load->library('upload', $config);
    $this->form_validation->set_rules('nama', 'Nama Menu', 'trim|required');
    $this->form_validation->set_rules('caption', 'Caption Slider', 'trim|required');

    $id = $this->uri->segment(3);
    $nama = htmlspecialchars($this->input->post('nama'));
    $caption = htmlspecialchars($this->input->post('caption'));
    $data = array(
      'nama' => $nama,
      'caption' => $caption
    );

    if (!$this->upload->do_upload('img')) {
      echo $this->upload->display_errors();
    } else {
      $size = $this->upload->data('fie_size');
      $dimensi = $this->upload->data('image_size_str');
      $img = $this->upload->data('file_name');
      $this->db->set('img', $img);
      $this->db->set('size', $size);
      $this->db->set('dimensi', $dimensi);
      $this->db->where('id_slider', $id);
      $this->db->update('tb_slider', $data);
    };

    if ($this->form_validation->run() == TRUE) {
      $this->db->where('id_slider', $id);
      $this->db->update('tb_slider', $data);
      $this->session->set_flashdata('alert', '<div class="alert alert-info">Data baru berhasiil dirubah</div>');
      redirect('slider');
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf. data gagal dirubah</div>');
      redirect('slider');
    }
  }

  public function delete()
  {
    $id = $this->uri->segment(3);
    $this->db->where('id_slider', $id);
    $this->db->delete('tb_slider');
    redirect('slider');
  }
}


/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
