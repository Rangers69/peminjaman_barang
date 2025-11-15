<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

    public function tambahPeminjaman($data)
    {
        return $this->db->insert('peminjaman_tamu', $data);
    }

    public function get_all_peminjaman_tamu()
    {
        return $this->db->get('peminjaman_tamu')->result_array();
    }

    public function get_peminjaman_tamu_by_id($id)
    {
        return $this->db->get_where('peminjaman_tamu', ['id_peminjaman_tamu' => $id])->row_array();
    }

}
