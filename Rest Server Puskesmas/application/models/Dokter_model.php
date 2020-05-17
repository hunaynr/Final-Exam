<?php

defined('BASEPATH') or exit('No direct script access allowed');

class dokter_model extends CI_Model
{

    public function getAlldokter()
    {
        $query = $this->db->order_by('id_dok', 'ASC')->get('dokter');
        return $query->result_array();
    }

    public function tambahdatadok()
    {
        $data = [
            "nip" => $this->input->post('nip', true),
            "nama_dok" => $this->input->post('nama_dok', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "alamat" => $this->input->post('alamat', true),
        ];
        $this->db->insert('dokter', $data);
    }

    public function hapusdatadok($id)
    {
        $this->db->where('id_dok', $id);
        $this->db->delete('dokter');
    }

    public function getdokterByID($id)
    {
        return $this->db->get_where('dokter', ['id_dok' => $id])->row_array();
    }

    public function ubahdatadok()
    {
        $data = [
            "nip" => $this->input->post('nip', true),
            "nama_dok" => $this->input->post('nama_dok', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "alamat" => $this->input->post('alamat', true),
        ];
        $this->db->where('id_dok', $this->input->post('id_dok'));
        $this->db->update('dokter', $data);
    }

    public function cariDataDokter()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('nip', $keyword);
        $this->db->or_like('nama_dok', $keyword);
        $this->db->or_like('jenis_kelamin', $keyword);
        $this->db->or_like('alamat', $keyword);
        return $this->db->get('dokter')->result_array();
    }
}

/* End of file dokter_model.php */
