<?php

class Dashboard_model extends CI_Model
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
    
    public function jumlah_pengeluaran()
    {
        $sql = "SELECT sum(p.jumlah_pengeluaran) as jumlah_pengeluaran 
                FROM pengeluaran p";
        $result = $this->db->query($sql);
        return $result->row()->jumlah_pengeluaran;
    }

    public function jumlah_pemasukan()
    {
        $sql = "SELECT sum(u.minggu_ke_1 + u.minggu_ke_2 + u.minggu_ke_3 + u.minggu_ke_4) as jumlah_pemasukan 
                FROM uang_kas u";
        $result = $this->db->query($sql);
        return $result->row()->jumlah_pemasukan;
    }

    public function jumlah_uang_kas()
    {
        $sql = "SELECT sum(u.minggu_ke_1 + u.minggu_ke_2 + u.minggu_ke_3 + u.minggu_ke_4) as jumlah_uang_kas 
                FROM uang_kas u";
        $result = $this->db->query($sql);
        return $result->row()->jumlah_uang_kas;
    }

    public function jumlah_siswa()
    {
        $sql = "SELECT count(id_siswa) as jumlah_siswa 
                FROM siswa";
        $result = $this->db->query($sql);
        return $result->row()->jumlah_siswa;
    }

    public function jumlah_user()
    {
        $user_id = $this->session->userdata(self::SESSION_KEY);
        $sql = "SELECT count(id_user) as jumlah_user 
                FROM user 
                WHERE id_user = ?";
        $result = $this->db->query($sql, [$user_id]);
        return $result->row()->jumlah_user;
    }

    public function graph_uang_kas($where)
    {
        $this->db->group_by('bulan_pembayaran.nama_bulan');
        $this->db->select('bulan_pembayaran.nama_bulan');
        $this->db->select("sum(u.minggu_ke_1 + u.minggu_ke_2 + u.minggu_ke_3 + u.minggu_ke_4) as total");
        $this->db->join('bulan_pembayaran', 'u.id_bulan_pembayaran = bulan_pembayaran.id_bulan_pembayaran');
        $this->db->where('bulan_pembayaran.tahun', $where);
        return $this->db->from('uang_kas u')->get()->result();
    }

    public function graph_pengeluaran($where)
    {
        $this->db->group_by('bulan_pembayaran.nama_bulan');
        $this->db->select('bulan_pembayaran.nama_bulan');
        $this->db->select("sum(p.jumlah_pengeluaran) as jumlah_pengeluaran");
        $this->db->join('bulan_pembayaran', 'p.id_bulan_pembayaran = bulan_pembayaran.id_bulan_pembayaran');
        $this->db->where('bulan_pembayaran.tahun', $where);
        return $this->db->from('pengeluaran p')->get()->result();
    }

    public function bulan_pembayaran()
    {        
        $sql = "SELECT DISTINCT tahun FROM bulan_pembayaran ORDER BY tahun ASC";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
}
