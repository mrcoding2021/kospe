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


    public function detail($nama)
    {
        $this->db->where('nama', str_replace('-',' ',$nama));
        $produk = $this->db->get('paket')->row();
        $data['detail'] = array(
            'produk' => $produk,
            'img' => $produk->img,
            'img_big' => $produk->img_big,
            'isi' => $produk->isi,
            'akad' => $produk->akad,
            'ketentuan' => $produk->ketentuan,
            'title' => $produk->nama,
            'page' => 'pages/detailSimpanan',
            'parent' => 23,
            'header' => 'Simpanan'
        );
        $this->core($data);
    }
}
