<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{

	public function __construct() {
        parent::__construct();
		$this->load->library('form_validation');
    }

	public function login()
	{
		if ($this->session->userdata('email')) {
            redirect('user');
        }

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
	

		if($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('auth/login', $data);			
		} else {
			// validasinya success
			$this->_login();
		}
	}

	private function _login()
	{

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		// jika usernya ada
		if($user) {
			// cek password 
			if(password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role' => $user['role'],
						'nama' => $user['nama'],
						'id_user' => $user['id_user'],
					];
					$this->session->set_userdata($data);
						if ($user['role'] == 'admin') {
							redirect('welcome');
						} else {
							redirect('peminjaman');
						}
			}else{
				$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">User tidak ditemukan!</div>');
				redirect('auth/login');
			}
		}
	
	}


	public function Register()
	{
		// Memuat library form validation jika belum dimuat secara autoload
		$this->load->library('form_validation');

		// Aturan validasi untuk setiap field
		$this->form_validation->set_rules('name', 'Nama', 'required|trim'); // Mengubah label menjadi 'Nama'
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already registered!' // Pesan kustom untuk is_unique
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [ // Disarankan min_length 6 atau lebih
			'matches' => 'Password don\'t match!', // Perbaikan typo 'dont' menjadi 'don\'t'
			'min_length' => 'Password too short! Minimum 6 characters.' // Pesan lebih deskriptif
		]);
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|matches[password1]'); // Mengubah label menjadi 'Konfirmasi Password'
		// Tambahkan validasi untuk no_telp dan alamat jika diperlukan
		// $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required|numeric|max_length[15]');
		// $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

		// Jalankan validasi
		if ($this->form_validation->run() == false) {
			// Jika validasi gagal, tampilkan form registrasi kembali
			$data['title'] = 'User Register';
			$this->load->view('auth/register', $data);
		} else {
			// Jika validasi berhasil, siapkan data untuk disimpan ke database
			$data = [
				'nama' => htmlspecialchars($this->input->post('name', true)), // Santisasi input nama
				'email' => htmlspecialchars($this->input->post('email', true)), // Santisasi input email
				'password' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT), // Hash password
				'role' => 'customer', // Role default untuk pengguna baru
				'no_telp' => htmlspecialchars($this->input->post('no_telp', true)), // Santisasi input no_telp
				'alamat' => htmlspecialchars($this->input->post('alamat', true)) // Santisasi input alamat
			];

			// var_dump($this->input->post('password1', true),$data);
			// die();

			// Masukkan data ke tabel 'user'
			$this->db->insert('user', $data);

			// Set flashdata untuk pesan sukses dan redirect ke halaman login
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Akun Anda berhasil dibuat. Silakan login.</div>');
			redirect('auth/login');
		}
	}


	public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth/login');
    }
}


	