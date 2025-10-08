<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['total_user_aktif'] = $this->Dashboard_model->get_total_user_aktif();
        $data['total_peminjaman'] = $this->Dashboard_model->get_total_peminjaman();
        $data['total_pengembalian'] = $this->Dashboard_model->get_total_pengembalian();

        $this->load->view('master/header', $data);
        $this->load->view('master/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('master/footer');
    }
}