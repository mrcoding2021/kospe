<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
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

            $data['title'] = 'Sistem Setting';
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

    public function index()
    {
        $data = array(
            'title'     => 'Sistem Setting',
            'parent'    => 'Settings',
            'view'      => 'setting/sistem'
        );
        $this->core($data);
    }

    public function menu()
    {
        $data = array(
            'title'     => 'Menu Setting',
            'parent'    => 'Konten',
            'view'      => 'setting/menu'
        );
        $this->core($data);
    }

    public function getAllMenu()
    {
        $id = $this->input->post('id');
        if (isset($id)) {
            $this->db->where('id_paket', $id);
            $data = $this->db->get('paket')->row();
        } else {
            $this->db->where('kategori', 1);
            $data = $this->db->get('paket')->result();
        }
        echo json_encode($data);
    }

    public function add()
    {
        $id = $this->input->post('id_paket');

        $data = array(
            'nama'       => $this->input->post('nama'),
            'isi'        => $this->input->post('isi'),
            'akad'       => $this->input->post('akad'),
            'ketentuan'  => $this->input->post('ketentuan'),
        );

        if (isset($id)) {
            $this->db->where('id_paket', $id);
            $this->db->update('paket', $data);
            $msg = 'Data berhasil dirubah';
        } else {
            $this->db->set('kategori', 1);
            $this->db->insert('paket', $data);
            $msg = 'Data berhasil ditambahkan';
        }

        if ($this->db->affected_rows() . 0) {
            $result = array('sukses'  => $msg);
        } else {
            $result = array('error'  => 'data gagal tersimpan');
        }

        echo json_encode($result);
    }

    public function setting()
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

            $data['title'] = 'Sistem Setting';
            $data['admin'] = $this->db->query($query)->result_array();
            $data['menu'] = $this->db->get('tb_menu')->result_array();
            $data['user'] = $this->db->get_where($table, array('id_user' => $id))->row_array();
            $this->load->view('admin/header', $data);
            $this->load->view('admin/v_setting', $data);
            $this->load->view('admin/footer', $data);
        } else {
            redirect('home/login_page');
        }
    }

    public function mitrakuAgen($id, $token = 'noisandobnabsonv2348a1s4fda5s4f891asdf')
    {
        if ($token == 'noisandobnabsonv2348a1s4fda5s4f891asdf') {
            $this->db->where('parent', $id);
            $result = $this->db->get('tb_user')->result();

            $data = array();
            foreach ($result as $key) {;
                $this->db->where('id_agen', $key->id_agen);
                $this->db->where('status', 1);
                $this->db->select_sum('kredit', 'total');
                $simpanan = $this->db->get('tb_transaksi')->row();

                $data[] = array(
                    'date_created' => $key->date_created,
                    'id_user'   => $key->id_user,
                    'id_agen' => $key->id_agen,
                    'nama' => $key->nama,
                    'hp' => $key->hp,
                    'jml_simpanan' => rupiah($simpanan->total)
                );
            }
        } else {
            $data = array('error' => 'Kode Token anda Salah',);
        }
        echo json_encode($data);
    }

    public function mitrakuDetail($token = '', $id)
    {
        if ($token == 'noisandobnabsonv2348a1s4fda5s4f891asdf') {
            $this->db->where('id_user', $id);
            $data = $this->db->get('tb_user')->row();
        } else {
            $data = array('error' => 'Kode Token anda Salah',);
        }
        echo json_encode($data);
    }

    public function allTransaksi($token = 'noisandobnabsonv2348a1s4fda5s4f891asdf')
    {
        if ($token == 'noisandobnabsonv2348a1s4fda5s4f891asdf') {

            $this->db->order_by('id_transaksi', 'desc');
            $result = $this->db->get('tb_transaksi')->result();

            $data = array();
            foreach ($result as $key) {;
                $this->db->where('id_agen', $key->id_agen);
                $agen = $this->db->get('tb_user')->row();

                $this->db->where('id_user', $key->id_parent);
                $parent = $this->db->get('tb_user')->row();

                if ($key->status == 1) {
                    $aksi = '<a href="#" class="approve badge badge-success" data-v="1" data-id="' . $key->id_transaksi . '">Approved</a>';
                } else {
                    $aksi = '<a href="#" class="approve badge badge-primary" data-v="0" data-id="' . $key->id_transaksi . '">Tolak</a>';
                }

                $data[] = array(
                    'id'           => $key->id_transaksi,
                    'date_created' => $key->date_created,
                    'tgl_trx' => $key->tgl_trx,
                    'id_trx'   => $key->id_transaksi,
                    'id_agen' => $key->id_agen,
                    'nama' => strtoupper($agen->nama),
                    'parent'    => strtoupper($parent->nama),
                    'kredit' => rupiah($key->kredit),
                    'debit' => rupiah($key->debit),
                    'keterangan' => $key->keterangan,
                    'aksi'      => $aksi
                );
            }
        } else {
            $data = array('error' => 'Kode Token anda Salah',);
        }
        echo json_encode($data);
    }

    public function approve($id = '', $token = 'noisandobnabsonv2348a1s4fda5s4f891asdf')
    {
        if ($token == 'noisandobnabsonv2348a1s4fda5s4f891asdf') {
            $this->db->where('id_transaksi', $id);
            $user = $this->db->get('tb_transaksi')->row();

            if ($user->status == 1) {
                $this->db->set('status', 0);
                $hasil = 'Transaksi berhasil dibatalkan';
            } else {
                $this->db->set('status', 1);
                $hasil = 'Transaksi sudah diterima';
            }

            $this->db->where('id_transaksi', $id);
            $this->db->update('tb_transaksi');

            if ($this->db->affected_rows() > 0) {
                $result = array(
                    'sukses' => $hasil,
                );
            } else {
                $result = array(
                    'error' => 'Proses approve transaksi gagal'
                );
            }
        } else {
            $result = array('error' => 'Kode Token anda Salah',);
        }
        echo json_encode($result);
    }
}
