<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_global extends CI_Model
{

    public function get_all($table)
    {
        $result = $this->db->get($table);
        return $result;
    }

    public function get_by_id($table)
    {
        $this->db->get_where($table, array('acces' => 2))->result_array();
    }
}
