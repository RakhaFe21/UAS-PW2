<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {
    // Ambil user berdasarkan username
    public function getUserByUsername($username) {
        return $this->db->get_where('users', ['username' => $username])->row_array();
    }
} 