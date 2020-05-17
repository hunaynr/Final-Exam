<?php

defined('BASEPATH') or exit('No direct script access allowed');

class authorization_model extends CI_Model
{
    public function tambahdatauser()
    {
        $data = [
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "level" => ('user'),
            "status" => ('tidak aktif')
        ];
        $this->db->insert('user', $data);
    }

    public function getuserByID($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function ubahdatauser()
    {
        $data = [
            "status" => $this->input->post('status', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }

    public function cariDataUser()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('username', $keyword);
        $this->db->or_like('password', $keyword);
        $this->db->or_like('level', $keyword);
        $this->db->or_like('status', $keyword);
        return $this->db->get('user')->result_array();
    }

    public function getAlluser()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }
}

/* End of file login_model.php */
