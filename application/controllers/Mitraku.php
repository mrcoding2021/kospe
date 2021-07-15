<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitraku extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
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
			$data['pembiayaan'] = $this->db->get('tb_pembiayaan')->result();
			$this->load->view('admin/header', $data);
			$this->load->view('mitraku/' . $data['page'], $data);
			$this->load->view('admin/footer', $data);
		} else {
			redirect('auth');
		}
	}

	public function index()
	{
		$data = array(
			'link'			=> 'anggota',
			'title'			=> 'Mitraku',
			'parent'		=> 'Mitraku',
			'page'			=> 'index'
		);
		$this->core($data);
	}

	public function transaksi()
	{
		$data = array(
			'link'			=> 'anggota',
			'title'			=> 'Mitraku',
			'parent'		=> 'Mitraku',
			'page'			=> 'transaksi'
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

	public function cabang()
	{
		$url = 'https://mitraku.kospe.net/mitraku/mitrakuCabang/';
		$this->api($url);
	}

	public function detail()
	{
		$id = $this->input->post('id_user');
		$url = 'https://mitraku.kospe.net/mitraku/mitrakuAgen/' . $id . '/';
		$this->api($url);
	}

	public function allTransaksi()
	{
		$url = 'https://mitraku.kospe.net/mitraku/allTransaksi/';
		$this->api($url);
	}

	public function approve($id = 0)
	{
		$url = 'https://mitraku.kospe.net/mitraku/approve/' . $id . '/';
		$this->api($url);
	}
}
