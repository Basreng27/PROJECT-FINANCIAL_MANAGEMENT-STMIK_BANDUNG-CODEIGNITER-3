<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{
    function __construct()
    {
        $this->load->database();
    }

    public function cek_login($data)
    {
        $this->db->select('*');
        $this->db->from('akun');
        $this->db->where('username', $data['username']);
        $this->db->where('password', $data['password']);
        $query = $this->db->get();
        return $query;
    }

    public function tambah_akun($data, $level)
    {
        $this->db->set('username', $data['nim']);
        $this->db->set('password', md5($data['nim']));
        $this->db->set('level', $level);
        $this->db->insert('akun');
    }

    // function cek_login($table, $data)
    // {
    //     return $this->db->get_where($table, $data);
    // }
}
