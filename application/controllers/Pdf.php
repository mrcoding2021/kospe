<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Pdf extends CI_Controller

{

  public function cetakPDF($id)
  {
    date_default_timezone_set('Asia/Jakarta');
    $this->load->helper('rupiah');

    ob_start();

    $this->db->where('id_pengajuan', $id);

    $data['key'] = $this->db->get('tb_pembiayaan')->row();

    $this->load->view('pdf/print', $data);

    $html = ob_get_contents();

    ob_end_clean();

    require './application/libraries/html2pdf/html2pdf/autoload.php';

    $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');

    $pdf->WriteHTML($html);

    $pdf->Output('Pembiayaan ' . $data['key']->nama . '.pdf', 'D');
  }

  public function cetakHNI($id)
  {
    date_default_timezone_set('Asia/Jakarta');
    $this->load->helper('rupiah');

    ob_start();

    $this->db->where('id_pengajuan', $id);

    $data['key'] = $this->db->get('tb_pembiayaan')->row();

    $this->load->view('pdf/hni', $data);

    $html = ob_get_contents();

    ob_end_clean();

    require './application/libraries/html2pdf/html2pdf/autoload.php';

    $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');

    $pdf->WriteHTML($html);

    $pdf->Output('Pembiayaan ' . $data['key']->nama . '.pdf', 'D');
  }

  public function analisa($id)
  {
    date_default_timezone_set('Asia/Jakarta');
    $this->load->helper('rupiah');

    ob_start();

    $this->db->where('no_akad', $id);
    $data['key'] = $this->db->get('analisa')->result_array();

    $this->db->where('no_akad', $id);
    $this->db->select_sum('skor', 'total');
    $data['total'] = $this->db->get('analisa')->row_array();

    $this->load->view('pdf/analisa', $data);

    $html = ob_get_contents();

    ob_end_clean();

    require './application/libraries/html2pdf/html2pdf/autoload.php';

    $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');

    $pdf->WriteHTML($html);

    $pdf->Output('Analisa Pembiayaan ' . $data['key'][0]['nama'] . '.pdf', 'D');
  }

  public function cetakSimpanan($id)
  {
    date_default_timezone_set('Asia/Jakarta');
    $this->load->helper('rupiah');

    ob_start();

    $this->db->where('id_simpanan', $id);

    $data['key'] = $this->db->get('tb_simpanan')->row();

    $this->load->view('pdf/simpanan', $data);

    $html = ob_get_contents();

    ob_end_clean();

    require './application/libraries/html2pdf/html2pdf/autoload.php';

    $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');

    $pdf->WriteHTML($html);

    $pdf->Output('Pengajuan Simpanan_' . $data['key']->nama . '.pdf', 'D');
  }
}
