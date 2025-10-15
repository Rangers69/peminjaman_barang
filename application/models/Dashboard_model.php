<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_total_user_aktif()
    {
        return $this->db->count_all('user');
    }

    public function get_total_peminjaman()
    {
        // Asumsi status '1' adalah peminjaman aktif
        $this->db->where('status', '1');
        return $this->db->count_all_results('peminjaman');
    }

    public function get_total_pengembalian()
    {
        // Asumsi status '0' adalah sudah dikembalikan
        $this->db->where('status', '0');
        return $this->db->count_all_results('peminjaman');
    }
}