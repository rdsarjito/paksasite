<?php

class Register_model extends CI_Model
{
    private $_table = "user";

    public function rules()
    {
        return [
            [
                'field' => 'fullname',
                'label' => 'Full Name',
                'rules' => 'required'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ],
            [
                'field' => 'password_confirm',
                'label' => 'Password Confirmation',
                'rules' => 'required|matches[password]'
            ]
        ];
    }
    public function is_username_available($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get($this->_table);
        return $query->num_rows() == 0;
    }

    public function register($fullname, $username, $email, $password)
    {
        $data = [
            'nama_lengkap' => $fullname,
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'created_at' => date("Y-m-d H:i:s")
        ];

        return $this->db->insert($this->_table, $data);
    }
}
