<?php

class Profile_model extends CI_Model
{
	private $_table = "user";

	public function profile_rules()
	{
		return [
			[
				'field' => 'nama_lengkap',
				'label' => 'Name',
				'rules' => 'required|max_length[32]'
			],
			[
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|max_length[32]'
			],
			[
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required|max_length[32]'
			],
		];
	}

	public function password_rules()
	{
		return [
			[
				'field' => 'password',
				'label' => 'New Password',
				'rules' => 'required'
			],
			[
				'field' => 'password_confirm',
				'label' => 'Password Confirmation',
				'rules' => 'required|matches[password]'
			],
		];
	}

	public function update($data)
	{
		if (!$data['id_user']) {
			return;
		}
		return $this->db->update($this->_table, $data, ['id_user' => $data['id_user']]);
	}
}