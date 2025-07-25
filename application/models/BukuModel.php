<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BukuModel extends CI_Model {
    // Ambil daftar buku dengan search dan pagination
    public function getBuku($limit, $start, $search = null) {
        if ($search) {
            $this->db->like('judul', $search);
            $this->db->or_like('pengarang', $search);
        }
        $this->db->limit($limit, $start);
        return $this->db->get('buku')->result_array();
    }

    // Hitung total buku untuk pagination
    public function countBuku($search = null) {
        if ($search) {
            $this->db->like('judul', $search);
            $this->db->or_like('pengarang', $search);
        }
        return $this->db->count_all_results('buku');
    }

    // Ambil detail buku by id
    public function getBukuById($id) {
        return $this->db->get_where('buku', ['id' => $id])->row_array();
    }

    // Insert buku baru
    public function insertBuku($data) {
        $this->db->insert('buku', $data);
    }

    // Update buku
    public function updateBuku($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('buku', $data);
    }

    // Hapus buku
    public function deleteBuku($id) {
        $this->db->where('id', $id);
        $this->db->delete('buku');
    }
} 