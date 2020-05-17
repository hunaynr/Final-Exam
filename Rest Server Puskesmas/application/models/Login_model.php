<?php

defined('BASEPATH') or exit('No direct script access allowed');

class login_model extends CI_Model
{

    function login($username, $password)
    {
        // var_dump($username);
        // var_dump($password);
        // die();
        $this->db->select('username,password,level,status');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

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

    public function getIdUserToPasien()
    {
        $this->db->select_max('id', 'max');
        $query = $this->db->get('user');
        return $query->result();
    }

    public function insertPasien($result)
    {
        $data = [
            "id" => $result,
            "no_ktp" => $this->input->post('no_ktp', true),
            "nama_pas" => $this->input->post('nama_pas', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "alamat" => $this->input->post('alamat', true)
        ];
        $this->db->insert('pasien', $data);
    }

    function checkExistingData($username, $password)
    {
        // var_dump($username);
        // var_dump($password);
        // die();
        $this->db->select('username,password');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $query = $this->db->get();
        if ($query->num_rows() < 1) {
            return true;
        } else {
            return false;
        }
    }
}

/* End of file login_model.php */
