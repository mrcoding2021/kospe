<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Qna extends CI_Controller
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
      
      $this->db->where('dropdown', 1);
      $data['qna'] = $this->db->get('tb_qa')->result();
      $this->load->view('admin/header', $data);
      $this->load->view('admin/' . $data['view'], $data);
      $this->load->view('admin/footer', $data);
    } else {
      redirect('auth');
    }
  }

  public function index()
  {
    $data['title'] = 'Tambah Data';
    $data['linkForm'] = 'qna/add/1';
    $data['view'] = 'v_addQnA';
    $data['link'] = 'qna';
    $data['detail'] = array(
      'id' => '',
      'judul' => '',
      'isi' => '',
      'parent' => '',
      'img' => '',
    );
    $data['title'] = 'Q & A';
    $data['view'] = 'v_qa';
    $data['link'] = 'admin/index';
    $this->core($data);
  }

  public function getData($id = 0)
  {
    if ($id == 1) {
      $this->db->where('dropdown', 0);
      $data = $this->db->get('tb_qa')->result();
      $no = 1;
      if ($data != null) {
        foreach ($data as $key) {
          $this->db->where('id', $key->parent);
          $tema = $this->db->get('tb_qa')->row();
          $result[] = array(
            "no" => $no++,
            'id' => $key->id,
            "tema" => $tema->judul,
            "judul" => $key->judul,
            "isi" => $key->isi,
            "img" => $key->img,
            'base_url' => base_url('qna/detail/').$key->id
          );
        }
      }
    }
    echo json_encode($result);
  }

  public function add()
  {
    $this->form_validation->set_rules('title', 'Judul Post', 'trim|required');
    $this->form_validation->set_rules('content', 'Isi Post', 'trim|required');
   
    $data = array(
      'date'        => date('Y-m-d'),
      'judul'       => ucwords($_POST['title']),
      'isi'         => $_POST['content'],
      'parent'      => $_POST['parent'],
      'dropdown'    => 0
    );
  
    if ($this->form_validation->run() == TRUE) {
      $this->db->insert('tb_qa', $data);
      $res = array(
        'msg' => 'berhasil'
      );
    } 
    echo json_encode($res);

  }

  public function edit()
  {
    $this->form_validation->set_rules('judul', 'Judul Post', 'trim|required');
    $this->form_validation->set_rules('isi', 'Isi Post', 'trim|required');

    $data = array(
      'judul'       => ucwords($_POST['judul']),
      'isi'         => $_POST['isi'],
    );

    if ($this->form_validation->run() == TRUE) {
      $this->db->where('id', $_POST['id']);
      $this->db->update('tb_qa', $data);
      $res = array(
        'msg' => 'berhasil'
      );
    }
    echo json_encode($res);
    
  }

  public function delete()
  {
    $id = $this->uri->segment(3);
    $this->db->where('id_post', $id);
    $this->db->delete('tb_post');
    $this->session->set_flashdata('alert', '<div class="alert alert-info">Data berhasil dihapus</div>');
    redirect('post');
  }

  public function detail($id = 0)
  {
    $this->db->where('id', $id);
    $data['detail'] = $this->db->get('tb_qa')->row_array();
    $data['title'] = 'Detail Data';
    $data['view'] = 'v_addQnA';
    $data['link'] = 'qna';
    $data['linkForm'] = 'qna/add/2';
    $this->core($data);
  }

  public function detil()
  {
    $id = $_POST['id'];
    // $id = 6;
    $this->db->where('id', $id);
    $data = $this->db->get('tb_qa')->row();

    $this->db->where('id', $data->parent);
    $parent = $this->db->get('tb_qa')->row();

    $res = array(
      'id'  => $data->id,
      'judul'   => $data->judul,
      'parent'  => $parent->judul,
      'isi'     => $data->isi,
      'img'     => $data->img,
      'par'     => $data->parent
    );

    echo json_encode($res);
  }
}


/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
