<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Memastikan user sudah login sebelum mengakses
        // is_logged_in(); // Aktifkan jika Anda memiliki fungsi ini
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'User Management';
        // Ambil data user dari session, sesuaikan dengan sistem otentikasi Anda
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['users'] = $this->User_model->get_all_users();

        $this->load->view('master/header', $data);
        $this->load->view('master/sidebar', $data);
        $this->load->view('user/index', $data); // Pastikan path view sesuai
        $this->load->view('master/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|trim|matches[password]');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        } else {
            $data = [
                'nama'      => htmlspecialchars($this->input->post('name', true)),
                'email'         => htmlspecialchars($this->input->post('email', true)),
                'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // Hashing password
                'role'          => htmlspecialchars($this->input->post('role', true)),
                'alamat'        => htmlspecialchars($this->input->post('alamat', true)),
                'no_telp'         => htmlspecialchars($this->input->post('no_hp', true)),
            ];

            if ($this->User_model->insert_user($data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil! menambahkan user baru</div>');
			redirect('user');
                echo json_encode(['status' => 'success', 'message' => 'Pengguna baru berhasil ditambahkan!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan pengguna baru.']);
            }
        }
    }

    public function get_user_by_id($id)
    {
        $data = $this->User_model->get_user_by_id($id);
        echo json_encode($data);
    }

    public function edit()
    {
        $id_user = $this->input->post('id_user');

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        // Hanya validasi password jika diisi
        if (!empty($this->input->post('password'))) {
            $this->form_validation->set_rules('password', 'Password', 'trim|min_length[3]|matches[confirm_password]');
            $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'trim|matches[password]');
        }
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'No Hp', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
        } else {
            $data_edit = [
                'nama'      => htmlspecialchars($this->input->post('name', true)),
                'email'         => htmlspecialchars($this->input->post('email', true)),
                'role'          => htmlspecialchars($this->input->post('role', true)),
                'alamat'        => htmlspecialchars($this->input->post('alamat', true)),
                'no_telp'         => htmlspecialchars($this->input->post('no_telp', true))
            ];

            // Update password hanya jika diisi
            if (!empty($this->input->post('password'))) {
                $data_edit['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            if ($this->User_model->update_user($id_user, $data_edit)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di edit</div>');
			    redirect('user');
                echo json_encode(['status' => 'success', 'message' => 'Data pengguna berhasil diperbarui!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data pengguna.']);
            }
        }
    }

    public function delete($id)
    {
        if ($this->User_model->delete_user($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di hapus</div>');
			redirect('user');
            echo json_encode(['status' => 'success', 'message' => 'Data pengguna berhasil dihapus!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal menghapus data pengguna.']);
        }
    }
}