<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_global', 'mapp');
        $this->load->helper('tgl_indo');
    }

    public function core($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->db->order_by('urutan', 'ASC');
        $data['menu'] = $this->db->get_where('tb_menu', array('acces' => 3, 'parent' => 0))->result_array();
        $data['about'] = $this->db->get_where('tb_menu', array('acces' => 3, 'parent' => $data['detail']['parent']))->result_array();
        $data['slider'] = $this->mapp->get_all('tb_slider')->result_array();

        $this->db->limit(6);
        $this->db->order_by('id_post', 'desc');
        $data['post'] = $this->mapp->get_all('tb_post')->result();
        $data['mitra'] = $this->mapp->get_all('tb_mitra')->result();
        $data['logo'] = $this->mapp->get_all('tb_mitra')->result_array();
        $query = 'SELECT * FROM paket ORDER BY id_paket DESC';
        $data['paket'] = $this->db->query($query)->result();

        $this->load->view('template/header', $data);
        $this->load->view($data['detail']['page'], $data);
        $this->load->view('template/footer');
    }

    public function index()
    {
        $data['detail'] = array(
            'img' => 'simpanan.jpg',
            'title' => 'Koperasi Syariah PE',
            'page' => 'pages/blog',
            'parent' => '',
            'header' => 'Blog-Artikel'
        );
        $this->core($data);
    }

    public function galeri()
    {
        $data['detail'] = array(
            'img' => 'galeri.jpg',
            'title' => 'Galeri Dokumentasi',
            'page' => 'pages/galeri',
            'parent' => '',
            'header' => 'Blog-Artikel'
        );
        $this->core($data);
    }

    public function unduh()
    {
        $data['detail'] = array(
            'img' => 'unduhan.jpg',
            'title' => 'Koperasi Syariah PE',
            'page' => 'pages/unduh',
            'parent' => '',
            'header' => 'Blog-Artikel'
        );
        $this->core($data);
    }

    public function blog()
    {
        $data['detail'] = array(
            'img' => 'blog.jpg',
            'title' => 'Koperasi Syariah PE',
            'page' => 'pages/blog',
            'parent' => '',
            'header' => 'Blog-Artikel'
        );
        $this->core($data);
    }

    public function detail($slug)
    {
        $data['detail'] = array(
            'img' => 'pokok.jpg',
            'title' => 'Simpanan Pokok'
        );
        $this->db->order_by('urutan', 'ASC');
        $data['menu'] = $this->db->get_where('tb_menu', array('acces' => 3, 'parent' => 0))->result_array();
        $data['about'] = $this->db->get_where('tb_menu', array('acces' => 3, 'parent' => 18))->result_array();
        $data['post'] = $this->mapp->get_all('tb_post')->result_array();
        $this->db->where('slug', $slug);
        $data['detail'] = $this->db->get('tb_post')->row_array();
        $data['judul'] = $data['detail']['judul'];
        $this->load->view('template/header', $data);
        $this->load->view('pages/detail', $data);
        $this->load->view('template/footer');
    }
}
