<?php

class Setting_model extends CI_Model
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

    public function jumlah_pengeluaran(){
		$sql="SELECT sum(jumlah_pengeluaran) as jumlah_pengeluaran FROM pengeluaran";
		$result=$this->db->query($sql);
		return $result->row()->jumlah_pengeluaran;
	}

	public function jumlah_uang_kas(){
		$sql="SELECT sum(minggu_ke_1 + minggu_ke_2 + minggu_ke_3 + minggu_ke_4) as jumlah_uang_kas FROM uang_kas";
		$result=$this->db->query($sql);
		return $result->row()->jumlah_uang_kas;
	}

}