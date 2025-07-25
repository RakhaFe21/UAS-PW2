<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {
    // Tampilkan form login dan proses login
    public function login() {
        if ($this->session->userdata('admin_logged_in')) {
            redirect('buku');
        }
        if ($this->input->post()) {
            $this->load->model('UserModel');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->UserModel->getUserByUsername($username);
            if ($user && password_verify($password, $user['password'])) {
                $this->session->set_userdata('admin_logged_in', true);
                redirect('buku');
            } else {
                $data['error'] = 'Username atau password salah';
                $this->load->view('auth/login', $data);
                return;
            }
        }
        $this->load->view('auth/login');
    }

    // Logout admin
    public function logout() {
        $this->session->unset_userdata('admin_logged_in');
        redirect('login');
    }
} 