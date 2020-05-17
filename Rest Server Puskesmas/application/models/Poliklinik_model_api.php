<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Poliklinik_model_api extends CI_Model
{

    public function getPoliklinik($id_pol = null)
    {
        if ($id_pol === null) {
            return $this->db->get('poliklinik')->result_array();
        } else {
            return $this->db->get_where('poliklinik', ['id_pol' => $id_pol])->result_array();
        }
    }

    public function deletePoliklinik($id_pol)
    {
        $this->db->delete('poliklinik', ['id_pol' => $id_pol]);
        return $this->db->affected_rows();
    }

    public function createPoliklinik($data)
    {
        $this->db->insert('poliklinik', $data);
        return $this->db->affected_rows();
    }

    public function updatePoliklinik($data, $id_pol)
    {
        $this->db->update('poliklinik', $data, ['id_pol' => $id_pol]);
        return $this->db->affected_rows();
    }
}

/* End of file mahasiswa_model.php */
