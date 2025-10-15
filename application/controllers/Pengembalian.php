<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengembalian_model');
        $this->load->library('session');
        $this->load->helper('url'); // Pastikan helper URL dimuat
        
    }

    // Tampilan utama Data Peminjaman
    public function index() 
    {
        $data['title'] = 'Data Pengembalian';
        // Ambil data user dari session, sesuaikan dengan sistem otentikasi Anda
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($data['user'] ['role'] != 'customer') {
             $data['pengembalian'] = $this->Pengembalian_model->get_all_pengembalian();
        } else {
             $data['pengembalian'] = $this->Pengembalian_model->get_pengembalian_by_user();

        }
        
        $this->load->view('master/header', $data);
        $this->load->view('master/sidebar', $data);
        $this->load->view('pengembalian/index', $data); // View utama untuk tabel
        $this->load->view('master/footer');
    }
}