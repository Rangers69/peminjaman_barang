<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url'); // Pastikan helper URL dimuat
        // Asumsi ada fungsi is_logged_in() di helper atau gunakan otentikasi sederhana
        // if (!$this->session->userdata('email')) {
        //     redirect('auth/login');
        // }
    }

    // Tampilan utama Data Peminjaman
    public function index() 
{
    $data['title'] = 'Data Peminjaman';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    // ambil filter dari GET (format YYYY-MM-DD)
    $from = $this->input->get('from_date', true);
    $to   = $this->input->get('to_date', true);

    // teruskan ke view supaya input tetap terisi
    $data['from_date'] = $from;
    $data['to_date']   = $to;

    // gunakan method model yang mendukung filter jika tersedia
   
        // fallback: ambil semua lalu filter di PHP
        if (!empty($data['user']) && isset($data['user']['role']) && $data['user']['role'] != 'customer') {
            $rows = $this->Peminjaman_model->get_all_peminjaman();
        } else {
            $rows = $this->Peminjaman_model->get_peminjaman_by_user();
        }

        // pastikan $rows adalah array
        $rows = is_array($rows) ? $rows : [];

        if (!empty($from) || !empty($to)) {
            $fromTs = $from ? strtotime($from) : null;
            $toTs   = $to ? strtotime($to) : null;

            $rows = array_values(array_filter($rows, function($r) use ($fromTs, $toTs) {
                if (empty($r['tanggal_pinjam'])) return false;
                $d = strtotime($r['tanggal_pinjam']);
                if ($fromTs && $d < $fromTs) return false;
                if ($toTs && $d > $toTs) return false;
                return true;
            }));
        }

        $data['peminjaman'] = $rows;
    

    $this->load->view('master/header', $data);
    $this->load->view('master/sidebar', $data);
    $this->load->view('peminjaman/index', $data);
    $this->load->view('master/footer');
}

    // AJAX: Tambah data peminjaman (CREATE)
    public function add()
    {
        $this->form_validation->set_rules('id_userpinjam', 'Id_Userpinjam', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('tanggal_pinjam', 'Tanggal Pinjam', 'required');
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kembali', 'required');

        if ($this->form_validation->run() === FALSE) {
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            return;
        }

        // Pastikan folder upload bisa ditulis
        $config['upload_path']   = './uploads/peminjaman/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 2048; // 2MB
        $config['encrypt_name']  = TRUE;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }

        $this->load->library('upload', $config);

        $gambar_pengambilan = '';
        if (!empty($_FILES['gambar_pengambilan']['name'])) {
            if ($this->upload->do_upload('gambar_pengambilan')) {
                $gambar_pengambilan = $this->upload->data('file_name');
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Upload Gambar Pengambilan gagal: ' . strip_tags($this->upload->display_errors())]);
                return;
            }
        }

        $data = [
            'id_userpinjam'       => $this->input->post('id_userpinjam'),
            'email'               => $this->input->post('email'),
            'tanggal_pinjam'      => $this->input->post('tanggal_pinjam'),
            'tanggal_kembali'     => $this->input->post('tanggal_kembali'),
            'status'              => 1,
            'deskripsi'           => $this->input->post('deskripsi'),
            'gambar_pengambilan'  => $gambar_pengambilan,
            'gambar_pengembalian' => NULL
        ];

        $insert = $this->Peminjaman_model->insert_peminjaman($data);

        if ($insert) {
            echo json_encode(['status' => 'success', 'message' => 'Data peminjaman berhasil ditambahkan!']);
        } else {
            // hapus gambar kalau insert gagal
            if (!empty($gambar_pengambilan) && file_exists($config['upload_path'] . $gambar_pengambilan)) {
                unlink($config['upload_path'] . $gambar_pengambilan);
            }

            $db_error = $this->db->error(); // tampilkan error database
            echo json_encode([
                'status' => 'error',
                'message' => 'Gagal menambahkan data peminjaman.',
                'db_error' => $db_error
            ]);
        }
    }

    public function get_peminjaman_by_id($id)
    {
        $data = $this->Peminjaman_model->get_peminjaman_by_id($id);
        echo json_encode($data);
    }

    
    public function update()
    {
        // Set the validation rules using the correct form field names
        $this->form_validation->set_rules('tanggal_pinjam', 'Tanggal Pinjam', 'required');
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kembali', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

        // Check if validation passes
        if ($this->form_validation->run() == FALSE) {
            // If validation fails, return a JSON error response
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            return;
        } else {
            // Get the ID for the update from the correct field
            $id_peminjaman = $this->input->post('id_peminjaman');

            //var_dump($this->input->post('tanggal_kembali'));
            //die;
            $data_update = [
                'tanggal_pinjam'     => $this->input->post('tanggal_pinjam'),
                'tanggal_kembali'    => $this->input->post('tanggal_kembali'),
                'deskripsi'          => $this->input->post('deskripsi'), 
            ];

            $data= $this->Peminjaman_model->update_peminjaman($id_peminjaman, $data_update);


            if ($data == true) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di edit</div>');
			    redirect('peminjaman');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Gagal di edit</div>');
			    redirect('peminjaman');
            }
        }
    }

    
    public function delete($id)
    {
        //var_dump($id);
        //die;
        if ($this->Peminjaman_model->delete_peminjaman($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil di hapus</div>');
			redirect('peminjaman');
            
        } else {
           $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal dihapus</div>');
			redirect('peminjaman');
        }
    }

    public function  returned($id) {
        
        $data_edit = [
                'status'      => 0,
            ];

        $data= $this->Peminjaman_model->update_peminjaman($id, $data_edit);
        
        if ($data == true) {
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil di update</div>');
			redirect('peminjaman');  
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal di update</div>');
			redirect('peminjaman');
        }
        
    }

}