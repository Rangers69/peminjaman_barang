<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        $this->load->model('Pengembalian_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Jumlah peminjaman aktif
        $data['total_peminjaman'] = count($this->Peminjaman_model->get_all_peminjaman());
        // Jumlah pengembalian
        $data['total_pengembalian'] = count($this->Pengembalian_model->get_all_pengembalian());

        $this->load->view('master/header', $data);
        $this->load->view('master/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('master/footer');
    }
}