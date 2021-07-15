<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Wa extends CI_Controller
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
			$level = $this->session->userdata('level');
			$table = 'tb_user';
			$query = "SELECT `id_user`, `menu`
            FROM `tb_user_menu` JOIN `tb_menu_acces` 
              ON `tb_user_menu`.`id_user` = `tb_menu_acces`.`menu_id`
            WHERE `tb_menu_acces`.`role_id`= $level
          ORDER BY `tb_menu_acces`.`menu_id` ASC";
			$data['title'] = 'WA Blast';
			$data['admin'] = $this->db->query($query)->result_array();
			$data['menu'] = $this->db->get('tb_menu')->result_array();
			$this->db->order_by('id_wa', 'DESC');
			$data['wa'] = $this->db->get('tb_wa')->result();
			$data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();

			$this->load->view('admin/header', $data);
			$this->load->view('admin/v_wa', $data);
			$this->load->view('admin/footer', $data);
		} else {
			# code...
			redirect('home/login_page');
		}
	}

	public function qr()
	{



		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://ruangwa.com/api/info.php',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('token' => 'token service', 'username' => 'isi dengan username'),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;
	}

	public function data(){
		
	}
}


/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
