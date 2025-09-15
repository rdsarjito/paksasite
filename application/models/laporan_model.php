<?php

class Laporan_model extends CI_Model
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
    
	public function bulan_pembayaran()
    {
        $sql = "SELECT * FROM bulan_pembayaran ORDER BY tahun, nama_bulan ASC";
        $return = $this->db->query($sql);
        return $return->result_array();
    }

    public function laporan()
    {
        if (isset($_POST['btnLaporanPemasukkan'])) {
            $id_bulan_pembayaran = htmlspecialchars($_POST['id_bulan_pembayaran']);
    
            $query = $this->db->query("SELECT * FROM bulan_pembayaran INNER JOIN uang_kas ON bulan_pembayaran.id_bulan_pembayaran = uang_kas.id_bulan_pembayaran INNER JOIN siswa ON uang_kas.id_siswa = siswa.id_siswa WHERE bulan_pembayaran.id_bulan_pembayaran = ?", [$id_bulan_pembayaran]);
            return $query->result_array();
        }

        if (isset($_POST['btnLaporanPengeluaran'])) {
            $id_user = $this->session->userdata('id_user');
            $dari_tanggal = strtotime(htmlspecialchars($_POST['dari_tanggal'] . " 00:00:00"));
            $sampai_tanggal = strtotime(htmlspecialchars($_POST['sampai_tanggal'] . " 23:59:59"));
            $query = $this->db->query("SELECT * FROM pengeluaran WHERE id_user = ? AND tanggal_pengeluaran BETWEEN ? AND ?", [$id_user, $dari_tanggal, $sampai_tanggal]);
            return $query->result_array();
        }

        return [];
    }

    public function jml_uang_kas()
    {
        if (isset($_POST['btnLaporanPemasukkan'])) {
            $id_bulan_pembayaran = htmlspecialchars($_POST['id_bulan_pembayaran']);
    
            $return = $this->db->query("SELECT sum(minggu_ke_1 + minggu_ke_2 + minggu_ke_3 + minggu_ke_4) as jml_uang_kas FROM uang_kas WHERE id_bulan_pembayaran = ?", [$id_bulan_pembayaran]);
            return $return->result_array(); 
        }

        return [];
    }

    
}