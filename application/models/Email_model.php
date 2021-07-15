<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email_model extends CI_Model
{

  public function send_email($nama = 'KoSPE', $pembiayaan = 'HalalMart')
  {

    $email = 'koperasisyariahpe@gmail.com';
    $config['protocol'] = "smtp";
    $config['smtp_host'] = "ssl://indo4.koneksiaman.net";
    $config['smtp_port'] = "465";
    $config['smtp_user'] = "email@kospe.net";
    $config['smtp_pass'] = "tfye3mA4M^v9";
    $config['charset'] = "utf-8";
    $config['mailtype'] = "html";
    $config['newline'] = "\r\n";

    $this->load->library('email', $config);
    $this->email->from('email@kospe.net', 'Pengajuan Pembiayaan KoSPE');
    $this->email->to($email);

    $data = array(
      'name' => $nama,
      'biaya' => $pembiayaan
    );

    $body = $this->load->view("template/email", $data, true);

    $this->email->subject('Pengajuan Pembiayaan Baru');
    $this->email->message($body);
    $this->email->send();
    
  }
}
