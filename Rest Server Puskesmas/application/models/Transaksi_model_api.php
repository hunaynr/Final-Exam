<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model_api extends CI_Model
{

    public function getTransaksi($id_trans = null)
    {
        if ($id_trans === null) {
            return $this->db->get('transaksi')->result_array();
        } else {
            return $this->db->get_where('transaksi', ['id_trans' => $id_trans])->result_array();
        }
    }

    public function deleteTransaksi($id_trans)
    {
        $this->db->delete('transaksi', ['id_trans' => $id_trans]);
        return $this->db->affected_rows();
    }

    public function createTransaksi($data)
    {
        $this->db->insert('transaksi', $data);
        return $this->db->affected_rows();
    }

    public function updateTransaksi($data, $id_trans)
    {
        $this->db->update('transaksi', $data, ['id_trans' => $id_trans]);
        return $this->db->affected_rows();
    }
}

/* End of file mahasiswa_model.php */
