<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_pengembalian()
    {
        $this->db->select('peminjaman.*, user.nama as nama_peminjam, user.email');
        $this->db->from('peminjaman');
        $this->db->join('user', 'user.id_user = peminjaman.id_userpinjam', 'left');
        $this->db->where('peminjaman.status', '0');
        return $this->db->get()->result_array();
    }
}