<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        $this->load->library('upload');
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }

    public function store()
    {
        // Konfigurasi upload
        $config['upload_path']   = './uploads/peminjaman/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']      = 2048; // 2MB

        if (!is_dir('./uploads/peminjaman/')) {
            mkdir('./uploads/peminjaman/', 0777, TRUE);
        }

        // Upload gambar pengambilan
        $gambar_pengambilan = null;
        if (!empty($_FILES['gambar_pengambilan']['name'])) {

            $this->upload->initialize($config);

            if ($this->upload->do_upload('gambar_pengambilan')) {
                $gambar_pengambilan = $this->upload->data('file_name');
            }
        }

        // Data POST
        $data = [
            'userpeminjaman_tamu' => $this->input->post('userpeminjaman_tamu', TRUE),
            'email'               => $this->input->post('email', TRUE),
            'tanggal_pinjam'      => $this->input->post('tanggal_pinjam', TRUE),
            'tanggal_kembali'     => $this->input->post('tanggal_kembali', TRUE),
            'deskripsi'           => $this->input->post('deskripsi', TRUE),
            'status'              => '1',
            'gambar_pengambilan'  => $gambar_pengambilan,
            'gambar_pengembalian' => null
        ];

        $insert = $this->Peminjaman_model->tambahPeminjaman($data);

        if ($insert) {
            echo "<script>alert('Data peminjaman berhasil disimpan'); window.location.href='" . base_url() . "';</script>";
        } else {
            echo "<script>alert('Gagal menyimpan data'); window.location.href='" . base_url() . "';</script>";
        }
    }
}
