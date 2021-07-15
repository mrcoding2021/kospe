<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landingpage extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Model_global', 'mapp');
		$this->load->helper('rupiah');
		$this->load->helper('tgl_indo');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function core($data)
	{
		$this->db->order_by('urutan', 'ASC');
		$data['menu'] = $this->db->get_where('tb_menu', array('acces' => 3, 'parent' => 0))->result_array();
		$data['about'] = $this->db->get_where('tb_menu', array('acces' => 3, 'parent' => 43))->result_array();
		$data['slider'] = $this->mapp->get_all('tb_slider')->result_array();
		$data['post'] = $this->mapp->get_all('tb_post')->result_array();
		$this->load->view('landing-page/header', $data);
		$this->load->view('landing-page/' . $data['detail']['page'], $data);
		$this->load->view('landing-page/footer');
	}

	public function hni()
	{
		$data['detail'] = array(
			'img' => 'hni.jpg',
			'title' => 'Form Pembiayaan HalalMart',
			'page' => 'hni',
			'paremt' => 'Pembiayaan'
		);
		$this->core($data);
	}

	public function pembiayaan()
	{
		$data['detail'] = array(
			'img' => 'umum.jpg',
			'title' => 'Form Pembiayaan Reguler - KoSPE',
			'page' => 'umum',
			'paremt' => 'Pembiayaan'
		);
		$this->core($data);
	}

	public function simpro()
	{
		$data['detail'] = array(
			'img' => 'simpro.jpg',
			'title' => 'Simpanan Produktif - KoSPE',
			'page' => 'simpro',
			'paremt' => 'Simpanan'
		);
		$this->core($data);
	}

	public function simpanan()
	{
		$data['detail'] = array(
			'img' => 'simpanan.jpg',
			'title' => 'Simpanan Masa Depan - KoSPE',
			'page' => 'simapan',
			'paremt' => 'Simpanan'
		);
		$this->core($data);
	}

	public function siroh()
	{
		$data['detail'] = array(
			'img' => 'siroh.jpg',
			'title' => 'Simpanan Umroh - KoSPE',
			'page' => 'siroh',
			'paremt' => 'Simpanan'
		);
		$this->core($data);
	}

	public function siji()
	{
		$data['detail'] = array(
			'img' => 'siji.jpg',
			'title' => 'Simpanan Haji - KoSPE',
			'page' => 'siji',
			'paremt' => 'Simpanan'
		);
		$this->core($data);
	}

	public function siajid()
	{
		$data['detail'] = array(
			'img' => 'siajid.jpg',
			'title' => 'Simpanan Masjid - KoSPE',
			'page' => 'siajid',
			'paremt' => 'Simpanan'
		);
		$this->core($data);
	}

	public function cabangKospe()
	{
		$data['detail'] = array(
			'img' => 'siajid.jpg',
			'title' => 'Cabang KoSPE',
			'page' => 'cabang',
			'paremt' => 'Simpanan'
		);
		$this->core($data);
	}

	public function kirim()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data = array(
			// Data Pribadi
			'created_at'	=> date('Y-m-d'),
			'jns_biaya'		=>	htmlspecialchars($_POST['jns_biaya']),
			'pengajuan'		=>	htmlspecialchars($_POST['pengajuan']),
			'nama'				=>	htmlspecialchars($_POST['nama']),
			'ttl'					=>	htmlspecialchars($_POST['ttl']),
			'pendidikan'	=>	htmlspecialchars($_POST['pendidikan']),
			'ktp'					=>	htmlspecialchars($_POST['ktp']),
			'npwp'				=>	htmlspecialchars($_POST['npwp']),
			'sex'					=>	htmlspecialchars($_POST['sex']),
			'alamat_ktp'	=>	htmlspecialchars($_POST['alamat_ktp']),
			'tlp_rumah'		=>	htmlspecialchars($_POST['tlp_rumah']),
			'hp'					=>	htmlspecialchars($_POST['hp']),
			'domisili'		=>	htmlspecialchars($_POST['domisili']),
			'lama_tinggal' =>	htmlspecialchars($_POST['lama_tinggal']),
			'status_rmh'	=>	htmlspecialchars($_POST['status_rmh']),
			'status_kawin' =>	htmlspecialchars($_POST['status_kawin']),
			'agama'				=>	htmlspecialchars($_POST['agama']),
			'ibu'					=>	htmlspecialchars($_POST['ibu']),

			// Data Pekerjaan 
			'pt'					=>	htmlspecialchars($_POST['pt']),
			'lama_bekerja' =>	htmlspecialchars($_POST['lama_bekerja']),
			'divisi'			=>	htmlspecialchars($_POST['divisi']),
			'atasan'			=>	htmlspecialchars($_POST['atasan']),
			'alaamat_pt'	=>	htmlspecialchars($_POST['alaamat_pt']),
			'tlp_pt'			=>	htmlspecialchars($_POST['tlp_pt']),
			'ext_pt'			=>	htmlspecialchars($_POST['ext_pt']),
			'hni'					=>	htmlspecialchars($_POST['hni']),

			// Data Suami Isti
			'nama_istri'					=>	htmlspecialchars($_POST['nama_istri']),
			'pekerjaan'						=>	htmlspecialchars($_POST['pekerjaan']),
			'pt_istri'						=>	htmlspecialchars($_POST['pt_istri']),
			'divisi_istri'				=>	htmlspecialchars($_POST['divisi_istri']),
			'lama_bekerja_istri'	=>	htmlspecialchars($_POST['lama_bekerja_istri']),
			'tlp_istri'						=>	htmlspecialchars($_POST['tlp_istri']),
			'ext_istri'						=>	htmlspecialchars($_POST['ext_istri']),

			// Data Penghasilan
			'penghasilan'					=>	str_replace('.', '', htmlspecialchars($_POST['penghasilan'])),
			'pengahasilan_add'		=>	str_replace('.', '', htmlspecialchars($_POST['pengahasilan_add'])),
			'ket_usaha'						=>	str_replace('.', '', htmlspecialchars($_POST['ket_usaha'])),
			'penghasilan_istri'		=>	str_replace('.', '', htmlspecialchars($_POST['penghasilan_istri'])),
			'total_penghasilan'		=>	str_replace('.', '', htmlspecialchars($_POST['total_penghasilan'])),
			'family'							=>	htmlspecialchars($_POST['family']),
			'out_rutin'						=>	str_replace('.', '', htmlspecialchars($_POST['out_rutin'])),
			'hutang'							=>	str_replace('.', '', htmlspecialchars($_POST['hutang'])),
			'sisa'								=>	str_replace('.', '', htmlspecialchars($_POST['sisa'])),

			// Nilai  Pengajuan
			'jumlah_dimohon'		=>	str_replace('.', '', htmlspecialchars($_POST['jumlah_dimohon'])),
			'tenor'							=>	htmlspecialchars($_POST['tenor']),
			'bayar_perbulan'		=>	str_replace('.', '', htmlspecialchars($_POST['bayar_perbulan'])),

			// Detail Pengajuan
			'tujuan'		=>	htmlspecialchars($_POST['tujuan']),
			'dp'				=>	str_replace('.', '', htmlspecialchars($_POST['dp'])),
			'agunan'		=>	htmlspecialchars($_POST['agunan']),
			'kode_sandi' => 1
		);

		$this->db->insert('tb_pembiayaan', $data);
		$this->load->model('Email_model');
		$this->Email_model->send_email($_POST['nama'], $_POST['tujuan']);

		$this->session->set_flashdata('alert', '<div class="alert alert-success">Selamat Data pengajuan anda telah masuk ke sistem kami. Silahkan Downlaod berkas yang diperlukan, kemudian upload <a href="#upload" class="btn btn-success btn-sm">Download</a></div>');
		redirect('landingpage/pembiayaan#form');
	}

	public function kirim_hni()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data = array(
			// Data Pribadi
			'created_at'	=> date('Y-m-d'),
			'id_kospe'		=>	htmlspecialchars($_POST['id_kospe']),
			'jns_biaya'		=>	htmlspecialchars($_POST['jns_biaya']),
			'pengajuan'		=>	htmlspecialchars($_POST['pengajuan']),
			'nama'				=>	htmlspecialchars($_POST['nama']),
			'ttl'					=>	htmlspecialchars($_POST['ttl']),
			'pendidikan'	=>	htmlspecialchars($_POST['pendidikan']),
			'ktp'					=>	htmlspecialchars($_POST['ktp']),
			'npwp'				=>	htmlspecialchars($_POST['npwp']),
			'sex'					=>	htmlspecialchars($_POST['sex']),
			'alamat_ktp'	=>	htmlspecialchars($_POST['alamat_ktp']),
			'tlp_rumah'		=>	htmlspecialchars($_POST['tlp_rumah']),
			'hp'					=>	htmlspecialchars($_POST['hp']),
			'domisili'		=>	htmlspecialchars($_POST['domisili']),
			'lama_tinggal' =>	htmlspecialchars($_POST['lama_tinggal']),
			'status_rmh'	=>	htmlspecialchars($_POST['status_rmh']),
			'status_kawin' =>	htmlspecialchars($_POST['status_kawin']),
			'agama'				=>	htmlspecialchars($_POST['agama']),
			'ibu'					=>	htmlspecialchars($_POST['ibu']),

			// Data Suami Isti
			'nama_istri'					=>	htmlspecialchars($_POST['nama_istri']),
			'pekerjaan'						=>	htmlspecialchars($_POST['pekerjaan']),
			'tlp_istri'						=>	htmlspecialchars($_POST['tlp_istri']),

			// Data Keagenann HNI
			'id_hni'					=>	htmlspecialchars($_POST['id_hni']),
			'pangkat_agen' 		=>	htmlspecialchars($_POST['pangkat_agen']),
			'status_agen'			=>	htmlspecialchars($_POST['status_agen']),
			'hni'							=>	htmlspecialchars($_POST['hni']),
			'id_led'					=>	htmlspecialchars($_POST['id_led']),
			'nama_led'				=>	htmlspecialchars($_POST['nama_led']),

			// Data Penghasilan
			'penghasilan'					=>	str_replace('.', '', htmlspecialchars($_POST['penghasilan'])),
			'pengahasilan_add'		=>	str_replace('.', '', htmlspecialchars($_POST['pengahasilan_add'])),
			'penghasilan_istri'		=>	str_replace('.', '', htmlspecialchars($_POST['penghasilan_istri'])),
			'total_penghasilan'		=>	str_replace('.', '', htmlspecialchars($_POST['total_penghasilan'])),
			'family'							=>	str_replace('.', '', htmlspecialchars($_POST['family'])),
			'out_rutin'						=>	str_replace('.', '', htmlspecialchars($_POST['out_rutin'])),
			'hutang'							=>	str_replace('.', '', htmlspecialchars($_POST['hutang'])),
			'sisa'								=>	str_replace('.', '', htmlspecialchars($_POST['sisa'])),

			// Nilai  Pengajuan
			'jumlah_dimohon'		=>	str_replace('.', '', htmlspecialchars($_POST['jumlah_dimohon'])),
			'tenor'							=>	htmlspecialchars($_POST['tenor']),
			'bayar_perbulan'		=>	str_replace('.', '', htmlspecialchars($_POST['bayar_perbulan'])),

			// Detail Pengajuan
			'tujuan'		=>	htmlspecialchars($_POST['tujuan']),
			'agunan'		=>	htmlspecialchars($_POST['jaminan']),
			// 'dp'				=>	htmlspecialchars($_POST['dp']),

			'kode_sandi' => 2

		);

		$this->db->insert('tb_pembiayaan', $data);
		$this->session->set_userdata('id_pembiayaan', $data['hp']);
		$this->load->model('Email_model');
		$this->Email_model->send_email($_POST['nama'], $_POST['tujuan']);

		$this->session->set_flashdata('alert', '<div class="alert alert-success">Selamat Data pengajuan anda telah masuk ke sistem kami. Silahkan Downlaod berkas yang diperlukan, kemudian upload <a href="#upload" class="btn btn-success btn-sm">Download</a></div>');
		redirect('landingpage/hni#form');
	}

	public function save()
	{
		
		$data = array(
			// Data Pribadi
			'created_at'	=> date('Y-m-d'),
			'program'			=>	htmlspecialchars($_POST['program']),
			'setor_awal'	=>	htmlspecialchars($_POST['setor_awal']),
			'setor_bln'		=>	htmlspecialchars($_POST['setor_bln']),
			'tenor'				=>	htmlspecialchars($_POST['tenor']),
			'id_kospe'		=>	htmlspecialchars($_POST['id_kospe']),
			'nama'				=>	htmlspecialchars($_POST['nama']),
			'ttl'					=>	htmlspecialchars($_POST['ttl']),
			'pendidikan'	=>	htmlspecialchars($_POST['pendidikan']),
			'ktp'					=>	htmlspecialchars($_POST['ktp']),
			'npwp'				=>	htmlspecialchars($_POST['npwp']),
			'sex'					=>	htmlspecialchars($_POST['sex']),
			'alamat_ktp'	=>	htmlspecialchars($_POST['alamat_ktp']),
			'tlp_rumah'		=>	htmlspecialchars($_POST['tlp_rumah']),
			'hp'					=>	htmlspecialchars($_POST['hp']),
			'email'				=>	htmlspecialchars($_POST['email']),
			'domisili'		=>	htmlspecialchars($_POST['domisili']),
			'agama'				=>	htmlspecialchars($_POST['agama']),
			'ibu'					=>	htmlspecialchars($_POST['ibu']),
			'waris'				=>	htmlspecialchars($_POST['waris']),
			'waris2'			=>	htmlspecialchars($_POST['waris2']),
		);

		$this->db->insert('tb_simpanan', $data);

		$this->load->model('Email_model');
		$this->Email_model->send_email($_POST['nama'], $_POST['program']);

		$this->session->set_flashdata('alert', '<div class="alert alert-success">Selamat Data pengajuan Produk Simpanan anda telah masuk ke sistem kami, silahkan lakukan pembayaran ke rek. Virtual Account KoSPE Anda senilai <strong>' . rupiah($_POST['setor_awal'] + 10000)) . '</strong></div>';
		redirect('home/simpan');
	}

	public function upload()
	{
		date_default_timezone_set('Asia/Jakarta');
		$config['upload_path'] = "./asset/berkas/"; //path folder file upload
		$config['allowed_types'] = 'gif|jpg|png|doc|docx|pdf'; //type file yang boleh di upload
		$config['encrypt_name'] = TRUE; //enkripsi file name upload
		$config['max_size']   = 1024 * 2; // 1MB

		$this->load->library('upload', $config); //call library upload 


		if ($_POST['hp'] != '') {
			$this->db->where('hp', $_POST['hp']);
			$hp = $this->db->get('tb_pembiayaan')->row();
			if ($hp == null) {
				$hasil = array(
					'error' => 'No. Hp belum terdaftar, Isi form pembiayaan terlebih dahulu'
				);
			} else {
				if (!$this->upload->do_upload("file")) {
					$hasil = array(
						'error' => $this->upload->display_errors()
					);
				} else {
					// $this->upload->do_upload('file');
					$foto = $this->upload->data('file_name');
					$this->db->set('img', $foto);
					$data = array(
						'created_at'			=> date('Y-m-d H:i:s'),
						'id_pembiayaan'		=> $this->input->post('hp'),
						'kategori' 				=> $this->input->post('kategori'),
						'judul' 					=> $this->input->post('judul'),
					);
					$this->db->insert('tb_galeri', $data);

					if ($this->db->affected_rows() > 0) {
						$hasil = array(
							'sukses' => 'Berkas berhasil di upload'
						);
					} else {
						$hasil = array(
							'error' => 'Berkas gagal di upload'
						);
					}
				}
			}
		} else {
			$hasil = array(
				'error' => 'silahkan isi no hp'
			);
		}
		echo json_encode($hasil, true);
	}
}
