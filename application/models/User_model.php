<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_all_users()
    {
        return $this->db->get('user')->result_array();
    }

    public function insert_user($data)
    {
        return $this->db->insert('user', $data);
    }

    public function get_user_by_id($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    public function update_user($id, $data)
    {
        $this->db->where('id_user', $id);
        return $this->db->update('user', $data);
    }

    public function delete_user($id)
    {
        // Pastikan 'id' sesuai dengan nama kolom primary key di database Anda
        $this->db->where('id_user', $id);
        return $this->db->delete('user');
    }
}