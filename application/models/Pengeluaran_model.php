<?php

class Pengeluaran_model extends CI_Model
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

    public function jumlah_uang_kas()
	{
		$user = $this->current_user();
		if (!$user) return 0;
		
		$sql = "SELECT sum(minggu_ke_1 + minggu_ke_2 + minggu_ke_3 + minggu_ke_4) as jumlah_uang_kas FROM uang_kas";
		$result = $this->db->query($sql);
		return $result->row()->jumlah_uang_kas;
	}
    
	public function pengeluaran()
	{
		$user = $this->current_user();
		if (!$user) return [];
		
        $sql = "SELECT *, bulan_pembayaran.nama_bulan 
                FROM pengeluaran 
                INNER JOIN user ON pengeluaran.id_user = user.id_user 
                INNER JOIN bulan_pembayaran ON pengeluaran.id_bulan_pembayaran = bulan_pembayaran.id_bulan_pembayaran
                WHERE pengeluaran.id_user = ?";
        $result = $this->db->query($sql, [$user->id_user]);
		return $result->result_array();
	}
	
	function riwayatPengeluaran($aksi) 
	{
		$user = $this->current_user();
		if (!$user) return false;
		
		$tanggal = time();
		$data = [
			'id_user' => $user->id_user,
			'aksi' => $aksi,
			'tanggal' => $tanggal
		];
		return $this->db->insert('riwayat_pengeluaran', $data);
	}

	public function bulan_pembayaran()
	{
		$user = $this->current_user();
		if (!$user) return [];
		
        $sql = "SELECT * FROM bulan_pembayaran ORDER BY tahun ASC";
        $result = $this->db->query($sql);
		return $result->result_array();
	}

	public function input_pengeluaran($data, $datariwayat)
	{
		$user = $this->current_user();
		if (!$user) return false;

		$data['id_user'] = $user->id_user;
		$datariwayat['id_user'] = $user->id_user;

        $this->db->insert('pengeluaran', $data);
		$this->db->insert('riwayat_pengeluaran', $datariwayat);
    }

	public function delete_pengeluaran($where)
	{
		$user = $this->current_user();
		if (!$user) return false;

        $this->db->where($where);
		$this->db->where('id_user', $user->id_user);
        $this->db->delete('pengeluaran');
    }

    public function update_pengeluaran($where, $data)
	{
		$user = $this->current_user();
		if (!$user) return false;

		$this->db->where($where);
		$this->db->where('id_user', $user->id_user);
        $this->db->update('pengeluaran', $data);
    }
}

