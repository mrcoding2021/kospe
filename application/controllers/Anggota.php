<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('tgl_indo');
		$this->load->model('Model_global', 'mapp');
		$this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
		$this->load->helper('lahir');
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
			$data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();

			$this->load->view('admin/header', $data);
			$this->load->view('anggota/' . $data['link'], $data);
			$this->load->view('admin/footer', $data);
		} else {
			redirect('auth');
		}
	}

	public function index()
	{
		$data = array(
			'link'			=> 'anggota',
			'title'			=> 'Anggota KoSPE',
			'parent'		=> 'Anggota'
		);
		$this->core($data);
	}

	public function ringkasan()
	{
		$data = array(
			'link'			=> 'ringkasan',
			'title'			=> 'Ringkasan Anggota KoSPE',
			'parent'		=> 'Anggota'
		);
		$data['anggota'] = $this->db->get('anggota')->result();

		$this->db->where('month(date_created)', date('m'));
		$this->db->where('year(date_created)', date('Y'));
		$data['bulan'] = $this->db->get('anggota')->result();

		$this->db->where('month(date_created)', (int)date('m') - 1);
		$this->db->where('year(date_created)', date('Y'));
		$data['bulanLalu'] = $this->db->get('anggota')->result();

		$this->db->like('nama', 'KELUAR');
		$data['keluar'] = $this->db->get('anggota')->result();

		$this->core($data);
	}

	public function upload()
	{
		$fileName = $this->input->post('file');
		$config['upload_path'] = './upload/';
		$config['file_name'] = $fileName;
		$config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
		$config['max_size'] = 10000;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('file')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('alert', '<div class="alert alert-danger">' . $error['error'] . '</div>');
			redirect('anggota');
		} else {
			$media = $this->upload->data();
			$inputFileName = 'upload/' . $media['file_name'];
			try {
				$inputFileType = IOFactory::identify($inputFileName);
				$objReader = IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);
				// $this->db->delete('anggota');
			} catch (Exception $e) {
				die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
			}

			$sheet = $objPHPExcel->getSheet(0);
			$highestRow = $sheet->getHighestRow();
			$highestColumn = $sheet->getHighestColumn();

			$no = 1;

			$this->db->truncate('anggota');

			for ($row = 2; $row <= $highestRow; $row++) {

				$rowData = $sheet->rangeToArray(
					'A' . $row . ':' . $highestColumn . $row,
					NULL,
					TRUE,
					FALSE
				);


				$data = array(
					'id'								=> $no++,
					'kode_cabang' 			=> '01',
					"id_kospe" 					=> $rowData[0][1],
					"nama" 							=> $rowData[0][2],
					"no_id"							=> $rowData[0][3],
					"tempat_lahir" 			=> $rowData[0][4],
					"tgl_lahir" 				=> $rowData[0][5],
					"ibu" 							=> $rowData[0][6],
					"sex" 							=> $rowData[0][7],
					"hp" 								=> $rowData[0][8],
					"email" 						=> $rowData[0][9],
					"pendidikan" 				=> $rowData[0][10],
					"rek_bank" 					=> $rowData[0][11],
					"an_bank" 					=> $rowData[0][12],
					"bank"				 			=> $rowData[0][13],
					"alamat" 						=> $rowData[0][14],
					"kel" 							=> $rowData[0][15],
					"kec" 							=> $rowData[0][16],
					"kab" 							=> $rowData[0][17],
					"prov" 							=> $rowData[0][18],
					"pekerjaan" 				=> $rowData[0][19],
					"no_sponsor" 				=> $rowData[0][20],
					"nama_sponsor" 			=> $rowData[0][21],
					"date_created" 			=> $rowData[0][22],
					"umur"							=> ($rowData[0][5] == null) ? '' : umur($rowData[0][5])
				);

				$this->db->insert('anggota', $data);
			}

			$this->session->set_flashdata('alert', '<div class="alert alert-info">Upload Data murid berhasiil ditambahan</div>');

			redirect('anggota');
		}
	}

	public function getData()
	{
		$result = $this->db->get('anggota')->result();
		echo json_encode($result);
	}

	public function data($thn = '2021')
	{
		$result = array();
		for ($i = 1; $i <= 12; $i++) {
			$this->db->not_like('nama', 'KELUAR');
			$this->db->where('month(date_created)', $i);
			$this->db->where('year(date_created)', $thn);
			$anggota = $this->db->get('anggota')->result();

			$this->db->where('year(date_created)', $thn);
			$tahun = $this->db->get('anggota')->result();
			$result[] = array(
				'bulan' => substr(bulan($i), 0, 3),
				'jumlah'	=> count($anggota),
				'total'	=> count($tahun)
			);
		}
		echo json_encode($result);
	}

	public function sex($thn = '2021')
	{
		$result = array();

		$this->db->where('sex', 'PRIA');
		$this->db->where('year(date_created)', $thn);
		$pria = $this->db->get('anggota')->result();

		$this->db->where('sex', 'WANITA');
		$this->db->where('year(date_created)', $thn);
		$wanita = $this->db->get('anggota')->result();

		$data = array('0' => count($pria), '1' => count($wanita));

		for ($i = 0; $i <= 1; $i++) {
			$result[] = array(
				'jumlah'	=> $data[$i],
			);
		}

		echo json_encode($result);
	}

	public function umur($thn = '2021')
	{
		$result = array();

		$this->db->where('year(date_created)', $thn);
		$this->db->where('umur <', 24);
		$umur1 = $this->db->get('anggota')->result();

		$this->db->where('year(date_created)', $thn);
		$this->db->where('umur >', 23);
		$this->db->where('umur <', 36);
		$umur2 = $this->db->get('anggota')->result();

		$this->db->where('year(date_created)', $thn);
		$this->db->where('umur >', 35);
		$this->db->where('umur <', 46);
		$umur3 = $this->db->get('anggota')->result();

		$this->db->where('year(date_created)', $thn);
		$this->db->where('umur >', 45);
		$this->db->where('umur <', 61);
		$umur4 = $this->db->get('anggota')->result();

		$this->db->where('year(date_created)', $thn);
		$this->db->where('umur >', 60);
		$umur5 = $this->db->get('anggota')->result();

		$data = array(
			'0' => count($umur1),
			'1' => count($umur2),
			'2' => count($umur3),
			'3' => count($umur4),
			'4' => count($umur5)
		);

		for ($i = 0; $i < 5; $i++) {
			$result[] = array(
				'jumlah'	=> $data[$i],
			);
		}
		echo json_encode($result);
	}
}
