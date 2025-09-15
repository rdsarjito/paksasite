<?php

class Uang_kas_model extends CI_Model
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
    
	public function uang_kas()
	{        
        $sql = "SELECT * FROM uang_kas";
        $result = $this->db->query($sql);
		return $result->result_array();
	}

    public function bulan_pembayaran()
	{        
        $sql = "SELECT * FROM bulan_pembayaran ORDER BY tahun, nama_bulan ASC";
        $result = $this->db->query($sql);
		return $result->result_array();
	}

	public function addBulanPembayaran($data, $table)
	{
		$nama_bulan = $data['nama_bulan'];
		$tahun = $data['tahun'];
		$id_user = $this->current_user()->id_user;
	
		// Retrieve data siswa (no user scoping in current schema)
		$dataSiswa = $this->db->query("SELECT * FROM siswa")->result_array();
	
		// Check if siswa exists
		if (empty($dataSiswa)) {
			$this->session->set_flashdata('message', 'Tidak ada siswa yang tersedia. Silakan tambahkan siswa terlebih dahulu.');
			return redirect('uang_kas');
		}
	
		// check if the month has been used or not
		$check_bulan = $this->db->query("SELECT * FROM bulan_pembayaran WHERE nama_bulan = ? AND tahun = ?", array($nama_bulan, $tahun));
		if ($check_bulan->result_array()) {
			$this->session->set_flashdata('message', 'Bulan pembayaran sudah ada. Silakan pilih bulan lain.');
			return redirect('uang_kas');
		}
	
		// Insert into bulan_pembayaran table
		$this->db->insert($table, $data);
		$id_bulan_pembayaran = $this->db->insert_id($table);
	
		// Process insert into uang_kas
		$siswaInsertQuery = "INSERT INTO uang_kas (id_siswa, id_bulan_pembayaran, minggu_ke_1, minggu_ke_2, minggu_ke_3, minggu_ke_4) VALUES ";
		foreach ($dataSiswa as $ds) {
			$siswaInsertQuery .= "('{$ds['id_siswa']}', '{$id_bulan_pembayaran}', '', '', '', ''),";
		}
		$siswaInsertQuery = rtrim($siswaInsertQuery, ",");
		$this->db->query($siswaInsertQuery);
	
		return $this->db->affected_rows();
	}
	
	public function delete_bulan_pembayaran($where, $table)
	{
        $this->db->where($where);
        $this->db->delete($table);
    }
}
?>
