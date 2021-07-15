<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('id') == null) {
			$this->load->view('admin/v_login');
		} else {
			redirect('admin');
		}
	}

	public function login()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		$user = $this->input->post('username');
		$pass = md5($this->input->post('password'));
		$table = 'tb_user';

		$data = $this->db->get_where($table, array('email' => $user))->row_array();

		if ($this->form_validation->run() == TRUE) {

			if ($data) {
				if ($user == $data['email'] && $pass == $data['password']) {
					if ($data['is_active'] == 1) {

						$array = array(
							'user' 	=> $data['nama'],
							'id'	=> $data['id_user'],
							'level'	=> $data['level'],
							'token'	=> $data['token'],
							'table'	=> $table
						);

						$this->session->set_userdata($array);
						$this->session->set_flashdata('alert', '<div class="alert alert-success">Selamat Datang di Cuss_Aja Admin Panel</div>');
						redirect('admin');
					} else {
						$this->session->set_flashdata('alert', '<div class="alert alert-danger">Username yang anda masukkan belum aktif</div>');
						redirect('auth');
					}
				} else {

					$this->session->set_flashdata('alert', '<div class="alert alert-danger">Password yang anda masukkan salah</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('alert', '<div class="alert alert-danger">Username yang anda masukkan tidak terdaftar</div>');
				redirect('auth');
			}
		} else {

			$this->session->set_flashdata('alert', '<div class="alert alert-danger">Username dan password yang anda masukkan salah</div>');
			redirect('auth');
		}
	}
}
