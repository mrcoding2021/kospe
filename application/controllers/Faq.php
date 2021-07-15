<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Faq extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->helper('tgl_indo');
    
    $this->load->model('Model_global','mapp');
    
  }

  public function index()
  {
    $data['title'] = 'FAQ';
    $data['parent'] = '';
    
    $this->db->order_by('urutan', 'ASC');
    $data['menu'] = $this->db->get_where('tb_menu', array('acces' => 3, 'parent' => 0))->result_array();
    $data['about'] = $this->db->get_where('tb_menu', array('acces' => 3, 'parent' => 18))->result_array();
    $data['slider'] = $this->mapp->get_all('tb_slider')->result_array();
    $data['post'] = $this->mapp->get_all('tb_post')->result_array();
    $data['parent'] = 'Tentang Kami';
    $this->load->view('template/header', $data);
    $this->load->view('pages/faq', $data);
    $this->load->view('template/footer');
  }
  public function addFaq()
  {
    $url = $this->uri->segment(3);

    if ($url) {
      $this->form_validation->set_rules('nama', 'Judul Post', 'trim|required');


      $this->form_validation->set_rules('isi', 'Isi Post', 'trim|required');

      $judul = htmlspecialchars($this->input->post('nama'));

      $isi = htmlspecialchars($this->input->post('isi'));
      $kategori = $this->input->post('kategori');
      $slug = str_replace(" ", "-", strtolower($judul));

      $data = array(
        'judul' => $judul,

        'date' => date('Y-m-d'),
        'isi'    => $isi,
        'slug'    => $slug,
      );

      $config['upload_path']          = './asset/img/post/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 1024; // 1MB
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;

      $this->load->library('upload', $config);

      if ($this->form_validation->run() == TRUE) {
        if (!$this->upload->do_upload('img')) {
          echo $this->upload->display_errors();
        } else {
          $img = $this->upload->data('file_name');
          $this->db->set('img', $img);
        }
        $this->db->insert('tb_post', $data);
        $this->session->set_flashdata('alert', '<div class="alert alert-info">Data baru berhasiil ditambahkan</div>');
        redirect('post');
      } else {
        $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf. data gagal ditambahkanh</div>');
        redirect('post');
      }
    } else {
      $id = $this->session->userdata('id');
      $level = $this->session->userdata('level');
      $table = 'tb_user';
      $query = "SELECT `id_user`, `menu`
            FROM `tb_user_menu` JOIN `tb_menu_acces` 
              ON `tb_user_menu`.`id_user` = `tb_menu_acces`.`menu_id`
            WHERE `tb_menu_acces`.`role_id`= $level
          ORDER BY `tb_menu_acces`.`menu_id` ASC";
      $data['title'] = 'Add New Post';
      $data['admin'] = $this->db->query($query)->result_array();
      $data['menu'] = $this->db->get('tb_menu')->result_array();

      $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
      $this->load->view('admin/header', $data);
      $this->load->view('admin/v_addPost', $data);
      $this->load->view('admin/footer', $data);
    }
  }

  public function editFaq($idPost)
  {

    $url = $this->uri->segment(4);

    if ($url == 0) {
      $id = $this->session->userdata('id');
      $level = $this->session->userdata('level');
      $table = 'tb_user';
      $query = "SELECT `id_user`, `menu`
            FROM `tb_user_menu` JOIN `tb_menu_acces` 
              ON `tb_user_menu`.`id_user` = `tb_menu_acces`.`menu_id`
            WHERE `tb_menu_acces`.`role_id`= $level
          ORDER BY `tb_menu_acces`.`menu_id` ASC";
      $data['title'] = 'Edit Post';
      $data['admin'] = $this->db->query($query)->result_array();
      $data['menu'] = $this->db->get('tb_menu')->result_array();
      $data['key'] = $this->db->get_where('tb_post', array('id_post' => $idPost))->row_array();
      $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();

      $this->load->view('admin/header', $data);
      $this->load->view('admin/v_editPost', $data);
      $this->load->view('admin/footer', $data);
    } else {
      $this->form_validation->set_rules('nama', 'Judul Post', 'trim|required');
      $this->form_validation->set_rules('isi', 'Isi Post', 'trim|required');

      $judul = htmlspecialchars($this->input->post('nama'));

      $isi = $this->input->post('isi');
      $kategori = $this->input->post('kategori');

      $slug = str_replace(" ", "-", strtolower($judul));

      $data = array(
        'judul' => $judul,
        'isi'    => $isi,

        'slug'    => $slug,
        'kategori' => $kategori
      );

      $config['upload_path']          = './asset/img/post/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 1024; // 1MB
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('img')) {
        $this->upload->display_errors();
      } else {
        $img = $this->upload->data('file_name');
        $this->db->set('img', $img);
        $this->db->where('id_post', $idPost);
        $this->db->update('tb_post');
      };
      if ($this->form_validation->run() == TRUE) {
        $this->db->where('id_post', $idPost);
        $this->db->update('tb_post', $data);
        $this->session->set_flashdata('alert', '<div class="alert alert-info">Data baru berhasiil dirubah</div>');
        redirect('post');
      } else {
        $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf. data gagal dirubah</div>');
        redirect('post');
      }
    }
  }

  public function delete()
  {
    $id = $this->uri->segment(3);
    $this->db->where('id_post', $id);
    $this->db->delete('tb_post');
    $this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil dihapus</div>');
    redirect('post');
  }
}


/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
