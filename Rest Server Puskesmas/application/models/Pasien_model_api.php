<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pasien_model_api extends CI_Model
{

    public function getPasien($id_pas = null)
    {
        if ($id_pas === null) {
            return $this->db->get('pasien')->result_array();
        } else {
            return $this->db->get_where('pasien', ['id_pas' => $id_pas])->result_array();
        }
    }

    public function deletePasien($id_pas)
    {
        $this->db->delete('pasien', ['id_pas' => $id_pas]);
        return $this->db->affected_rows();
    }

    public function createPasien($data)
    {
        $this->db->insert('pasien', $data);
        return $this->db->affected_rows();
    }

    public function updatePasien($data, $id_pas)
    {
        $this->db->update('pasien', $data, ['id_pas' => $id_pas]);
        return $this->db->affected_rows();
    }
}

/* End of file mahasiswa_model.php */
