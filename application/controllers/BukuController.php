<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BukuController extends CI_Controller {
    // Cek session admin di setiap aksi kecuali index dan search
    public function __construct() {
        parent::__construct();
        $this->load->model('BukuModel');
        if (!in_array($this->router->method, ['index', 'search']) && !$this->session->userdata('admin_logged_in')) {
            redirect('login');
        }
    }

    // Daftar buku dengan search dan pagination
    public function index() {
        $search = $this->input->get('q');
        $this->load->library('pagination');
        $config['base_url'] = site_url('buku');
        $config['per_page'] = 5;
        $config['total_rows'] = $this->BukuModel->countBuku($search);
        $config['reuse_query_string'] = TRUE;
        $this->pagination->initialize($config);
        $page = $this->input->get('per_page') ?: 0;
        $data['buku'] = $this->BukuModel->getBuku($config['per_page'], $page, $search);
        $data['pagination'] = $this->pagination->create_links();
        $data['search'] = $search;
        $this->load->view('buku/index', $data);
    }

    // Form tambah buku
    public function tambah() {
        if ($this->input->post()) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 20480; // 20MB
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file_buku')) {
                $data['error'] = $this->upload->display_errors();
                $this->load->view('buku/form', $data);
                return;
            }
            $file = $this->upload->data();
            $insert = [
                'judul' => $this->input->post('judul'),
                'pengarang' => $this->input->post('pengarang'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'deskripsi' => $this->input->post('deskripsi'),
                'file_buku' => $file['file_name']
            ];
            $this->BukuModel->insertBuku($insert);
            redirect('buku');
        }
        $this->load->view('buku/form');
    }

    // Form edit buku
    public function edit($id) {
        $buku = $this->BukuModel->getBukuById($id);
        if (!$buku) redirect('buku');
        if ($this->input->post()) {
            $update = [
                'judul' => $this->input->post('judul'),
                'pengarang' => $this->input->post('pengarang'),
                'tahun_terbit' => $this->input->post('tahun_terbit'),
                'deskripsi' => $this->input->post('deskripsi')
            ];
            if (!empty($_FILES['file_buku']['name'])) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = 20480;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('file_buku')) {
                    $file = $this->upload->data();
                    $update['file_buku'] = $file['file_name'];
                } else {
                    $data['error'] = $this->upload->display_errors();
                    $data['buku'] = $buku;
                    $this->load->view('buku/form', $data);
                    return;
                }
            }
            $this->BukuModel->updateBuku($id, $update);
            redirect('buku');
        }
        $data['buku'] = $buku;
        $this->load->view('buku/form', $data);
    }

    // Hapus buku
    public function hapus($id) {
        $this->BukuModel->deleteBuku($id);
        redirect('buku');
    }
} 