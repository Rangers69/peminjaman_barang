<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengembalian_model');
        $this->load->library('session');
        $this->load->helper(['url', 'form']);
    }
    
    public function index() 
    {
        $data['title'] = 'Data Pengembalian';
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        // Ambil input filter tanggal
        $from_date = $this->input->get('from_date');
        $to_date   = $this->input->get('to_date');

        if ($data['user']['role'] != 'customer') {
            $data['pengembalian'] = $this->Pengembalian_model->get_all_pengembalian($from_date, $to_date);
        } else {
            $data['pengembalian'] = $this->Pengembalian_model->get_pengembalian_by_user($from_date, $to_date);
        }

        // Simpan tanggal agar tetap tampil di form
        $data['from_date'] = $from_date;
        $data['to_date']   = $to_date;

        $this->load->view('master/header', $data);
        $this->load->view('master/sidebar', $data);
        $this->load->view('pengembalian/index', $data);
        $this->load->view('master/footer');
    }
}