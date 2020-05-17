<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pasien_model extends CI_Model {

    public function getAllpasien()
    {
        $query=$this->db->get('pasien');
        return $query->result_array();
    }

    public function tambahdatapsn() {
        $data=[
            "no_ktp" => $this->input->post('no_ktp',true),
            "nama_pas" => $this->input->post('nama_pas',true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin',true),
            "alamat" => $this->input->post('alamat',true),
        ];
        $this->db->insert('pasien',$data);
    }

    public function hapusdatapsn($id) {
        $this->db->where('id_pas',$id);
        $this->db->delete('pasien');
    }

    public function getpasienByID($id) {
        return $this->db->get_where('pasien',['id_pas'=> $id])->row_array();
    }

    public function ubahdatapsn() {
        $data=[
            "no_ktp" => $this->input->post('no_ktp',true),
            "nama_pas" => $this->input->post('nama_pas',true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin',true),
            "alamat" => $this->input->post('alamat',true),
        ];
        $this->db->where('id_pas', $this->input->post('id_pas'));
        $this->db->update('pasien', $data);
    }

    public function cariDataPasien() {
        $keyword=$this->input->post('keyword');
        $this->db->like('no_ktp',$keyword);
        $this->db->or_like('nama_pas',$keyword);
        $this->db->or_like('jenis_kelamin',$keyword);
        $this->db->or_like('alamat',$keyword);
        return $this->db->get('pasien')->result_array();
    }

}

/* End of file pasien_model.php */

?>