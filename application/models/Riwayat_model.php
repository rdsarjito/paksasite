<?php

class Riwayat_model extends CI_Model
{
    private $_table = "user";
    const SESSION_KEY = 'id_user';

    public function current_user()
    {
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }

        $user_id = $this->session->userdata(self::SESSION_KEY);
        $query = $this->db->get_where($this->_table, ['id_user' => $user_id]);
        return $query->row();
    }

    public function riwayat()
    {
        // Dapatkan user_id dari sesi saat ini
        $user = $this->current_user();
        if (!$user) {
            return []; // Atau null atau pesan error sesuai kebutuhan Anda
        }
        $user_id = $user->id_user;

        // Query untuk mengambil riwayat berdasarkan id_user saat ini
        $sql = "SELECT * FROM riwayat 
                INNER JOIN user ON riwayat.id_user = user.id_user 
                INNER JOIN uang_kas ON riwayat.id_uang_kas = uang_kas.id_uang_kas 
                INNER JOIN siswa ON uang_kas.id_siswa = siswa.id_siswa 
                INNER JOIN bulan_pembayaran ON uang_kas.id_bulan_pembayaran = bulan_pembayaran.id_bulan_pembayaran 
                WHERE riwayat.id_user = ? 
                ORDER BY tanggal DESC";
                
        $result = $this->db->query($sql, array($user_id));
        return $result->result_array();
    }
}
