<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_model_api extends CI_Model
{

    public function getUser($username, $password)
    {
        $this->db->select('username,password,level,status');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        return $query = $this->db->get()->result_array();
    }
}

/* End of file mahasiswa_model.php */
