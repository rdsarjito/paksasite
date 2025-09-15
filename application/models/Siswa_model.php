<?php

class Siswa_model extends CI_Model
{
    const SESSION_KEY = 'id_user';

    public function current_user()
    {
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
            return null;
        }

        $user_id = $this->session->userdata(self::SESSION_KEY);
        $query = $this->db->get_where('user', ['id_user' => $user_id]);
        return $query->row();
    }

    public function siswa()
    {
        $sql = "SELECT * FROM siswa ORDER BY nama_siswa ASC";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    public function input_siswa($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function delete_siswa($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_siswa($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}

