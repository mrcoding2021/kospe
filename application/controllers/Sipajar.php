<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sipajar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function core($data)
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

            $data['title'] = $data['title'];
            $data['link'] = '';
            $data['parent'] = 'Dashboard';
            $data['admin'] = $this->db->query($query)->result_array();
            $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
            $data['setting'] = $this->db->get('tb_setting')->result_array();
            $this->load->view('admin/header', $data);
            $this->load->view($data['view'], $data);
            $this->load->view('admin/footer', $data);
        } else {
            redirect('home/login_page');
        }
    }

    public function index(){
        $data = array(
            'title'     => 'Sipajar',
            'view'      => 'sipajar/index',
            'nama'      => 'Data Sekolah'
        );
        $this->core($data);
    }

    public function sekolah()
    {
        $data = array(
            'title'     => 'Sipajar',
            'view'      => 'sipajar/sekolah',
            'nama'      => 'SDIT Insan Mulia'
        );
        $this->core($data);
    }

    public function transaksi()
    {
        $data = array(
            'title'     => 'Sipajar',
            'view'      => 'sipajar/detail',
            'nama'      => 'SDIT Insan Mulia'
        );
        $this->core($data);
    }

    public function mutasi()
    {
        $data = array(
            'title'     => 'Sipajar',
            'view'      => 'sipajar/mutasi',
            'nama'      => 'Mutasi Sekolah'
        );
        $this->core($data);
    }

    public function api($url)
    {
        $token = $this->session->userdata('token');
        $ch = curl_init();

        // set url 
        curl_setopt($ch, CURLOPT_URL, $url . $token);

        // return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string 
        $output = curl_exec($ch);

        // tutup curl 
        curl_close($ch);

        // mengembalikan hasil curl
        $result = json_decode($output, true);

        echo json_encode($result);
    }

    public function dataSekolah()
    {
        $url = 'http://localhost/sipajar/sipajar/dataSekolah/';
        $this->api($url);
    }

    public function murid()
    {
        $id = $this->input->post('id_user');
        $url = 'https://sipajar.kospe.net/sipajar/sipajarAgen/' . $id . '/';
        $this->api($url);
    }

    public function allTransaksi()
    {
        $url = 'https://sipajar.kospe.net/sipajar/allTransaksi/';
        $this->api($url);
    }

    public function approve($id = 0)
    {
        $url = 'https://mitraku.kospe.net/mitraku/approve/' . $id . '/';
        $this->api($url);
    }
}
