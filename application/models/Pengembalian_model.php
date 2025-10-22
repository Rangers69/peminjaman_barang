<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_pengembalian($from_date = null, $to_date = null)
    {
        $this->db->select('peminjaman.*, user.nama as nama_peminjam, user.email');
        $this->db->from('peminjaman');
        $this->db->join('user', 'user.id_user = peminjaman.id_userpinjam', 'left');
        $this->db->where('peminjaman.status', '0');

        // Filter tanggal jika ada
        if (!empty($from_date) && !empty($to_date)) {
            $this->db->where('DATE(peminjaman.tanggal_kembali) >=', $from_date);
            $this->db->where('DATE(peminjaman.tanggal_kembali) <=', $to_date);
        } elseif (!empty($from_date)) {
            $this->db->where('DATE(peminjaman.tanggal_kembali)', $from_date);
        }

        return $this->db->get()->result_array();
    }

    public function get_pengembalian_by_user($from_date = null, $to_date = null)
    {
        $user_id = $this->session->userdata('id_user');
        $this->db->select('peminjaman.*, user.nama as nama_peminjam, user.email');
        $this->db->from('peminjaman');
        $this->db->join('user', 'user.id_user = peminjaman.id_userpinjam', 'left');
        $this->db->where('peminjaman.id_userpinjam', $user_id);
        $this->db->where('peminjaman.status', '0');

        // Filter tanggal jika ada
        if (!empty($from_date) && !empty($to_date)) {
            $this->db->where('DATE(peminjaman.tanggal_kembali) >=', $from_date);
            $this->db->where('DATE(peminjaman.tanggal_kembali) <=', $to_date);
        } elseif (!empty($from_date)) {
            $this->db->where('DATE(peminjaman.tanggal_kembali)', $from_date);
        }

        return $this->db->get()->result_array();
    }
}