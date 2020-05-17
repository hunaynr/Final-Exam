<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class poliklinik_model extends CI_Model {

    public function getAllpoliklinik()
    {
        $query=$this->db->get('poliklinik');
        return $query->result_array();
    }

    public function tambahdatapol() {
        $data=[
            "jenis" => $this->input->post('jenis',true),
            "ruang" => $this->input->post('ruang',true)            
        ];
        $this->db->insert('poliklinik',$data);
    }

    public function hapusdatapol($id) {
        $this->db->where('id_pol',$id);
        $this->db->delete('poliklinik');
    }

    public function getpoliklinikByID($id) {
        return $this->db->get_where('poliklinik',['id_pol'=> $id])->row_array();
    }

    public function ubahdatapol() {
        $data=[
            "jenis" => $this->input->post('jenis',true),
            "ruang" => $this->input->post('ruang',true)
        ];
        $this->db->where('id_pol', $this->input->post('id_pol'));
        $this->db->update('poliklinik', $data);
    }

    public function cariDataPoliklinik() {
        $keyword=$this->input->post('keyword');
        $this->db->like('jenis',$keyword);
        $this->db->or_like('ruang',$keyword);
        return $this->db->get('poliklinik')->result_array();
    }

}

/* End of file poliklinik_model.php */
