<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Menampilkan semua data peminjaman dengan filter tanggal opsional
    public function get_all_peminjaman($from_date = null, $to_date = null)
    {
        $this->db->select('peminjaman.*, user.nama as nama_peminjam, user.email');
        $this->db->from('peminjaman');
        $this->db->join('user', 'user.id_user = peminjaman.id_userpinjam', 'left');
        $this->db->where('peminjaman.status', '1');

        // Filter tanggal (opsional)
        if (!empty($from_date) && !empty($to_date)) {
            $this->db->where('DATE(peminjaman.tanggal_pinjam) >=', $from_date);
            $this->db->where('DATE(peminjaman.tanggal_pinjam) <=', $to_date);
        }

        return $this->db->get()->result_array();
    }

    // Menampilkan data peminjaman berdasarkan user login dan filter tanggal opsional
    public function get_peminjaman_by_user($from_date = null, $to_date = null)
    {
        $user_id = $this->session->userdata('id_user');
        $this->db->select('peminjaman.*, user.nama as nama_peminjam, user.email');
        $this->db->from('peminjaman');
        $this->db->join('user', 'user.id_user = peminjaman.id_userpinjam', 'left');
        $this->db->where('peminjaman.id_userpinjam', $user_id);
        $this->db->where('peminjaman.status', '1');

        // Filter tanggal (opsional)
        if (!empty($from_date) && !empty($to_date)) {
            $this->db->where('DATE(peminjaman.tanggal_pinjam) >=', $from_date);
            $this->db->where('DATE(peminjaman.tanggal_pinjam) <=', $to_date);
        }

        return $this->db->get()->result_array();
    }

    public function get_peminjaman_by_id($id)
    {
        return $this->db->get_where('peminjaman', ['id' => $id])->row_array();
    }

    public function insert_peminjaman($data)
    {
        return $this->db->insert('peminjaman', $data);
    }

    public function update_peminjaman($id, $data)
    {
        $this->db->where('id_peminjaman', $id);
        return $this->db->update('peminjaman', $data);
    }

    public function delete_peminjaman($id)
    {
        $this->db->where('id_peminjaman', $id);
        return $this->db->delete('peminjaman');
    }

}