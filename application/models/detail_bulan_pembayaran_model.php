<?php

class Detail_bulan_pembayaran_model extends CI_Model
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

    public function detail_bulan_pembayaran($id_bulan_pembayaran)
    {
        $user_id = $this->session->userdata(self::SESSION_KEY);
        $result = $this->db->query("SELECT * FROM bulan_pembayaran WHERE id_bulan_pembayaran = '$id_bulan_pembayaran' AND id_user = '$user_id'");
        return $result->result_array();
    }

    public function siswa()
    {
        $user_id = $this->session->userdata(self::SESSION_KEY);
        $result = $this->db->query("SELECT * FROM siswa WHERE id_user = '$user_id' ORDER BY nama_siswa ASC");
        return $result->result_array();
    }

    public function siswa_baru()
    {
        $user_id = $this->session->userdata(self::SESSION_KEY);
        $result = $this->db->query("SELECT * FROM siswa WHERE id_user = '$user_id' AND id_siswa NOT IN (SELECT id_siswa FROM uang_kas WHERE id_user = '$user_id') ORDER BY nama_siswa ASC");
        return $result->result_array();
    }

    public function uang_kas($id_bulan_pembayaran)
    {
        $user_id = $this->session->userdata(self::SESSION_KEY);
        $result = $this->db->query("SELECT * FROM uang_kas INNER JOIN siswa ON uang_kas.id_siswa = siswa.id_siswa INNER JOIN bulan_pembayaran ON uang_kas.id_bulan_pembayaran = bulan_pembayaran.id_bulan_pembayaran WHERE uang_kas.id_bulan_pembayaran = '$id_bulan_pembayaran' AND uang_kas.id_user = '$user_id' ORDER BY nama_siswa ASC");
        return $result->result_array();
    }

    function riwayat($id_user, $id_uang_kas, $aksi)
    {
        $tanggal = time();
        $this->db->query("INSERT INTO riwayat VALUES ('', '$id_user', '$id_uang_kas', '$aksi', '$tanggal')");
    }

    function minggu1($minggu_ke_1, $id_uang_kas)
    {
        $user_id = $this->session->userdata(self::SESSION_KEY);
        $this->db->query("UPDATE uang_kas SET minggu_ke_1 = '$minggu_ke_1' WHERE id_uang_kas = '$id_uang_kas' AND id_user = '$user_id'");    
    }

    function minggu2($minggu_ke_2, $id_uang_kas)
    {
        $user_id = $this->session->userdata(self::SESSION_KEY);
        $this->db->query("UPDATE uang_kas SET minggu_ke_2 = '$minggu_ke_2' WHERE id_uang_kas = '$id_uang_kas' AND id_user = '$user_id'");    
    }

    function minggu3($minggu_ke_3, $id_uang_kas)
    {
        $user_id = $this->session->userdata(self::SESSION_KEY);
        $this->db->query("UPDATE uang_kas SET minggu_ke_3 = '$minggu_ke_3' WHERE id_uang_kas = '$id_uang_kas' AND id_user = '$user_id'");    
    }

    function minggu4($minggu_ke_4, $id_uang_kas)
    {
        $user_id = $this->session->userdata(self::SESSION_KEY);
        $this->db->query("UPDATE uang_kas SET minggu_ke_4 = '$minggu_ke_4' WHERE id_uang_kas = '$id_uang_kas' AND id_user = '$user_id'");    
    }
}

