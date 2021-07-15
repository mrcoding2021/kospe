<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Model_global', 'mapp');
		$this->load->helper('rupiah');
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

		$this->db->order_by('id_paket', 'desc');
		$this->db->where('kategori', 2);
		$data['pembiayaan'] = $this->db->get('paket')->result();

		$this->db->order_by('id_paket', 'desc');
		$this->db->where('kategori', 1);
		$data['simpanan'] = $this->db->get('paket')->result();

		$this->load->view('template/header', $data);
		$this->load->view($data['detail']['page'], $data);
		$this->load->view('template/footer');
	}

	public function index()
	{
		$data['detail'] = array(
			'img' => 'simpanan.jpg',
			'title' => 'Koperasi Syariah PE',
			'page' => 'index',
			'parent' => '',
			'header' => ''
		);
		$this->db->order_by('id', 'desc');
		$this->db->where('is_active', 1);
		$data['promo'] = $this->db->get('tb_promo')->result();
		$data['iklan'] = 'caf9ec120cfd5cff1c09bcc5a0d578e3.jpeg';
		$this->core($data);
	}

	public function sejarah()
	{
		$data['detail'] = array(
			'img' => 'sejarah.jpg',
			'title' => 'Sejarah Koperasi Syariah PE',
			'page' => 'template/sejarah',
			'parent' => 18,
			'header' => 'Tentang Kami'
		);
		$this->core($data);
	}

	public function visi_misi()
	{
		$data['detail'] = array(
			'img' => 'visi-misi.jpg',
			'title' => 'Visi dan Misi',
			'page' => 'template/visi-misi',
			'parent' => 18,
			'header' => 'Tentang Kami'
		);
		$this->core($data);
	}

	public function legalitas()
	{
		$data['detail'] = array(
			'img' => 'legalitas.jpg',
			'title' => 'Legalitas KoSPE',
			'page' => 'template/legalitas',
			'parent' => 18,
			'header' => 'Tentang Kami'
		);
		$this->core($data);
	}
	public function struktur()
	{
		$data['detail'] = array(
			'img' => 'struktur.jpg',
			'title' => 'Struktur KoSPE',
			'page' => 'template/struktur',
			'parent' => 18,
			'header' => 'Tentang Kami'
		);
		$this->core($data);
	}

	public function mitra_kerja()
	{
		$data['detail'] = array(
			'img' => 'mitra.jpg',
			'title' => 'Mitra Kerja KoSPE',
			'page' => 'template/mitra-kerja',
			'parent' => 18,
			'header' => 'Tentang Kami'
		);
		$this->core($data);
	}

	public function kantor()
	{
		$data['detail'] = array(
			'img' => 'kantor.jpg',
			'title' => 'Kantor Pelayanan KoSPE',
			'page' => 'template/kantor',
			'parent' => 18,
			'header' => 'Tentang Kami'
		);
		$this->core($data);
	}


	public function asset()
	{
		$data['detail'] = array(
			'img' => 'kantor.jpg',
			'title' => 'Kantor Pelayanan KoSPE',
			'page' => 'template/kantor',
			'parent' => 18,
			'header' => 'Tentang Kami'
		);
		$this->core($data);
	}

	public function kontak()
	{
		$data['detail'] = array(
			'img' => 'kantor.jpg',
			'title' => 'Kantor Pelayanan KoSPE',
			'page' => 'template/kantor',
			'parent' => 18,
			'header' => 'Tentang Kami'
		);
		$this->core($data);
	}

	public function pembiayaan()
	{
		$data['detail'] = array(
			'img' => 'kantor.jpg',
			'title' => 'Kantor Pelayanan KoSPE',
			'page' => 'pages/pembiayaan',
			'parent' => 18,
			'header' => 'Tentang Kami'
		);
		$this->core($data);
	}

	public function ajukan()
	{
		$data['detail'] = array(
			'img' => 'kantor.jpg',
			'title' => 'Form Pembiayaan Reguler',
			'page' => 'pages/biaya',
			'parent' => 18,
			'header' => 'Pembiayaan'
		);
		$this->core($data);
	}

	public function hni()
	{
		$data['detail'] = array(
			'img' => 'kantor.jpg',
			'title' => 'Form Pembiayaan HNI',
			'page' => 'pages/hni',
			'parent' => 18,
			'header' => 'Pembiayaan'
		);
		$this->core($data);
	}

	public function simpan()
	{
		$data['detail'] = array(
			'img' => 'kantor.jpg',
			'title' => 'Form Pengajuan Simpanan',
			'page' => 'pages/simpan',
			'parent' => 18,
			'header' => 'Simpanan'
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

		$this->session->set_flashdata('alert', '<div class="alert alert-success">Selamat Data pengajuan anda telah masuk ke sistem kami, Silahkan upload berkas <a href="#upload">Klik ini !</a></div>');
		redirect('home/ajukan');
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

		$this->load->model('Email_model');
		$this->Email_model->send_email($_POST['nama'], $_POST['tujuan']);

		$this->session->set_flashdata('alert', '<div class="alert alert-success">Selamat Data pengajuan anda telah masuk ke sistem kami, Silahkan upload berkas <a href="#upload">Klik ini !</a></div>');
		redirect('home/hni');
	}

	public function save()
	{
		date_default_timezone_set('Asia/Jakarta');

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

	public function getHaji()
	{

		require './application/libraries/simple-html/simple_html_dom.php';
		$url = 'https://haji.kemenag.go.id/v4/index.php/waiting-list';

		// Create DOM from URL or file
		$html = file_get_html($url);

		// Find all images
	
		foreach ($html->find('table') as $e)
			echo $e . '<br>';
	}
}
