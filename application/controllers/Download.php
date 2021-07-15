<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{
	public function __construct()
	{
	  parent::__construct();
	  
	  $this->load->helper('tgl_indo');
	  $this->load->helper('download');
	
	}
	
	public function file($id){
		if($id == 1){
			force_download('asset/download/RENCANA ANGGARAN BELANJA.doc', NULL);
		} elseif ($id = 2) {
			force_download('asset/download/SURAT PERSONAL GARANSI LED.doc', NULL);
		} elseif ($id = 4) {
			// force_download('asset/download/SURAT POTONG BONUS HNI.doc', NULL);
		}
	}

	public function file4()
	{

		force_download('asset/download/SURAT POTONG BONUS HNI.doc', NULL);
	
	}
}
 