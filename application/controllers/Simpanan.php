<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simpanan extends CI_Controller
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
            'title' => 'Produk Simpanan Koperasi Syariah PE',
            'page' => 'pages/simpanan',
            'parent' => 23,
            'header' => 'Simpanan'
        );
        $this->core($data);
    }


    public function simpro()
    {
        $data['detail'] = array(
            'img' => 'simpro.jpg',
            'title' => 'Simpanan Produktif',
            'page' => 'pages/simpro',
            'parent' => 23,
            'header' => 'Simpanan'
        );
        $this->core($data);
    }

    public function siroh()
    {
        $data['detail'] = array(
            'img' => 'SIROH.jpg',
            'title' => 'Simpanan Umroh',
            'page' => 'pages/siroh',
            'parent' => 23,
            'header' => 'Simpanan'
        );
        $this->core($data);
    }

    public function siji()
    {
        $data['detail'] = array(
            'img' => 'siji.jpg',
            'title' => 'Simpanan Haji',
            'page' => 'pages/simpro',
            'parent' => 23,
            'header' => 'Simpanan'
        );
        $this->core($data);
    }
    public function siwaq()
    {
        $data['detail'] = array(
            'img' => 'siwaq.jpg',
            'title' => 'Simpanan Wisata Qurani',
            'page' => 'pages/siwaq',
            'parent' => 23,
            'header' => 'Simpanan'
        );
        $this->core($data);
    }

    public function sisuka()
    {
        $data['detail'] = array(
            'img' => 'sisuka.jpg',
            'title' => 'Simpanan Sukarela',
            'page' => 'pages/sisuka',
            'parent' => 23,
            'header' => 'Simpanan'
        );
        $this->core($data);
    }

    public function saqu()
    {
        $data['detail'] = array(
            'img' => 'saqu.jpg',
            'title' => 'Simpanan Qurban',
            'page' => 'pages/saqu',
            'parent' => 23,
            'header' => 'Simpanan'
        );
        $this->core($data);
    }

    public function sidik()
    {
        $data['detail'] = array(
            'img' => 'sidiq.jpg',
            'title' => 'Simpanan Pendidikan',
            'page' => 'pages/sidik',
            'parent' => 23,
            'header' => 'Simpanan'
        );
        $this->core($data);
    }

    public function sinar()
    {
        $data['detail'] = array(
            'img' => 'sinar.jpg',
            'title' => 'Simpanan Nikah dan Resepsi',
            'page' => 'pages/sinar',
            'parent' => 23,
            'header' => 'Simpanan'
        );
        $this->core($data);
    }

    public function akad()
    {
        $data['detail'] = array(
            'img' => 'akad.jpg',
            'title' => 'Jenis-jenis Akad Syariah',
            'page' => 'pages/akad',
            'parent' => 23,
            'header' => 'Simpanan'
        );
        $this->core($data);
    }

    public function wajib()
    {
        $data['detail'] = array(
            'img' => 'wajib.jpg',
            'title' => 'Simpanan Wajib',
            'page' => 'pages/wajib',
            'parent' => 23,
            'header' => 'Simpanan'
        );
        $this->core($data);
    }

    public function pokok()
    {
        $data['detail'] = array(
            'img' => 'pokok.jpg',
            'title' => 'Simpanan Pokok',
            'page' => 'pages/pokok',
            'parent' => 23,
            'header' => 'Simpanan'
        );
        $this->core($data);
    }
}
