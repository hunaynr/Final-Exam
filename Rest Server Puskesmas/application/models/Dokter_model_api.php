<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dokter_model_api extends CI_Model
{

    public function getDokter($id_dok = null)
    {
        if ($id_dok === null) {
            return $this->db->get('dokter')->result_array();
        } else {
            return $this->db->get_where('dokter', ['id_dok' => $id_dok])->result_array();
        }
    }

    public function deleteDokter($id_dok)
    {
        $this->db->delete('dokter', ['id_dok' => $id_dok]);
        return $this->db->affected_rows();
    }

    public function createDokter($data)
    {
        $this->db->insert('dokter', $data);
        return $this->db->affected_rows();
    }

    public function updateDokter($data, $id_dok)
    {
        $this->db->update('dokter', $data, ['id_dok' => $id_dok]);
        return $this->db->affected_rows();
    }
}

/* End of file mahasiswa_model.php */
