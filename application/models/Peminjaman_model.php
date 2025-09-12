<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_peminjaman()
    {
        $this->db->select('peminjaman.*, user.nama as nama_peminjam, user.email');
        $this->db->from('peminjaman');
        $this->db->join('user', 'user.id_user = peminjaman.id_userpinjam', 'left');
        $this->db->where('peminjaman.status', '1');
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
        var_dump($id);
        die;

        return $this->db->update('peminjaman', $data_update);

    }

    public function delete_peminjaman($id)
    {
        $this->db->where('id_peminjaman', $id);
        return $this->db->delete('peminjaman');
    }

    
}