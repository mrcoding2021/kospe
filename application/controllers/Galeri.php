<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Galeri extends CI_Controller
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
      $data['title'] = 'Galeri dokumentasi';
      $data['admin'] = $this->db->query($query)->result_array();
      $data['menu'] = $this->db->get('tb_menu')->result_array();
      $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
      $data['galeri'] = $this->db->get('dokumentasi')->result();
      $data['link'] = "";
      $data['parent'] = "Konten";

      $this->load->view('admin/header', $data);
      $this->load->view('admin/v_galeri', $data);
      $this->load->view('admin/footer', $data);
    } else {
      redirect('auth');
    }
  }

  public function add()
  {
    $this->form_validation->set_rules('nama', 'Judul galeri', 'trim|required');
    $judul = htmlspecialchars($this->input->galeri('nama'));
    $direktori = $this->input->post('direktori');

    $data = array(
      'nama' => $judul,
      'created_at'  => date('Y-m-d H:i:s'),
      'direktor'    => $direktori,
      'kategori'    => 1,
    );

    mkdir(base_url('asset/img/dokuemntasi/') . $direktori);

    $config['upload_path']          = './asset/img/dokumentasi/' . $direktori . '/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 1024; // 1MB
    $config['encrypt_name']         = TRUE;
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
      $this->db->insert('dokumentasi', $data);
      $this->session->set_flashdata('alert', '<div class="alert alert-info">Data baru berhasiil ditambahkan</div>');
      redirect('galeri');
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf. data gagal ditambahkanh</div>');
      redirect('galeri');
    }
  }

  public function edit()
  {
    $id = $this->uri->segment(3);

    $this->form_validation->set_rules('nama', 'Judul galeri', 'trim|required');
    $this->form_validation->set_rules('date', 'Date', 'trim|required');
    $this->form_validation->set_rules('negara', 'Negara', 'trim|required');
    $this->form_validation->set_rules('isi', 'Isi galeri', 'trim|required');

    $judul = htmlspecialchars($this->input->galeri('nama'));
    $date = htmlspecialchars($this->input->galeri('date'));
    $negara = htmlspecialchars($this->input->galeri('negara'));
    $isi = htmlspecialchars($this->input->galeri('isi'));

    $slug = str_replace(" ", "-", strtolower($judul));

    $data = array(
      'judul' => $judul,
      'date'   => $date,
      'negara'    => $negara,
      'isi'    => $isi,
      'slug'    => $slug,
    );

    $config['upload_path']          = './asset/assets/images/blog/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('img')) {
      echo $this->upload->display_errors();
    } else {
      $img = $this->upload->data('file_name');
      $this->db->set('img', $img);
    }
    if ($this->form_validation->run() == TRUE) {
      $this->db->where('id_galeri', $id);
      $this->db->update('tb_galeri', $data);
      $this->session->set_flashdata('alert', '<div class="alert alert-info">Data baru berhasiil dirubah</div>');
      redirect('galeri');
    } else {
      $this->session->set_flashdata('alert', '<div class="alert alert-danger">Mohon maaf. data gagal dirubah</div>');
      redirect('galeri');
    }
  }

  public function delete()
  {
    $id = $this->uri->segment(3);
    $this->db->where('id_galeri', $id);
    $this->db->delete('paket');
    $this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil dihapus</div>');
    redirect('galeri');
  }
}


/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
