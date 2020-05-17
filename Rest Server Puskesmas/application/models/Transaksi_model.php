<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi_model extends CI_Model {

    public function getAlltransaksiJoin()
    {
        $this->db->select('p.nama_pas, pl.jenis, d.nama_dok, t.tanggal_pukul, t.id_trans');
        $this->db->from('transaksi t');
        $this->db->join('pasien p', 'p.id_pas = t.id_pas');
        $this->db->join('poliklinik pl', 'pl.id_pol = t.id_pol');
        $this->db->join('dokter d', 'd.id_dok = t.id_dok');
        $query=$this->db->get();
        return $query->result_array();
    }

    public function tambahdatatrans() {
        $data=[
            "id_pas" => $this->input->post('id_pas',true),
            "id_pol" => $this->input->post('id_pol',true),
            "id_dok" => $this->input->post('id_dok',true),
            "tanggal_pukul" => $this->input->post('tanggal_pukul',true),
        ];
        $this->db->insert('transaksi',$data);
    }

    public function dropdownnama_pas() {
        $query=$this->db->get('pasien');
        return $query->result_array();
    }

    public function dropdownnama_dok() {
        $query=$this->db->get('dokter');
        return $query->result_array();
    }

    public function dropdownjenis() {
        $query=$this->db->get('poliklinik');
        return $query->result_array();
    }

    public function hapusdatatrans($id) {
        $this->db->where('id_trans',$id);
        $this->db->delete('transaksi');
    }

    public function gettransaksiByID($id) {
        return $this->db->get_where('transaksi',['id_trans'=> $id])->row_array();
    }

    public function ubahdatatrans() {
        $data=[
            "id_pas" => $this->input->post('id_pas',true),
            "id_pol" => $this->input->post('id_pol',true),
            "id_dok" => $this->input->post('id_dok',true),
            "tanggal_pukul" => $this->input->post('tanggal_pukul',true)
        ];
        $this->db->where('id_trans', $this->input->post('id_trans'));
        $this->db->update('transaksi', $data);
    }

    public function cariDataTransaksi() {
        $keyword=$this->input->post('keyword');
        $this->db->select('p.nama_pas, pl.jenis, d.nama_dok, t.tanggal_pukul, t.id_trans');
        $this->db->from('transaksi t');
        $this->db->join('pasien p', 'p.id_pas = t.id_pas');
        $this->db->join('poliklinik pl', 'pl.id_pol = t.id_pol');
        $this->db->join('dokter d', 'd.id_dok = t.id_dok');  
        $this->db->like('p.nama_pas',$keyword);
        $this->db->or_like('pl.jenis',$keyword);
        $this->db->or_like('d.nama_dok',$keyword);
        $this->db->or_like('t.tanggal_pukul',$keyword);
        return $this->db->get()->result_array();
    }

}

/* End of file transaksi_model.php */

?>