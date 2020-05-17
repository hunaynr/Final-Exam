<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class Transaksi extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data transaksi
    public function index_get()
    {
        // Users from a data store e.g. database
        $id = $this->get('id_trans');

        // If the id parameter doesn't exist return all the users

        if ($id === NULL) {
            $this->db->select('*');
            $this->db->from('transaksi t');

            $this->db->join('poliklinik p', 'p.id_pol = t.id_pol');
            $this->db->join('dokter d', 'd.id_dok = t.id_dok');
            $this->db->join('pasien ps', 'ps.id_pas = t.id_pas');

            $transaksi = $this->db->get()->result_array();
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($transaksi) {
                // Set the response and exit
                $this->response($transaksi, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            } else {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'Data Transaksi tidak ditemukan'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.
        else {
            $id = (int) $id;

            // Validate the id.
            if ($id <= 0) {
                // Invalid id, set the response and exit.
                $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
            }

            $this->db->query("select * from transaksi t  
                                join poliklinik p on p.id_pol = t.id_pol join dokter d on d.id_dok = t.id_dok 
                                join pasien ps on ps.id_pas = t.id_pas order by t.id_trans DESC");
            $transaksi = $this->db->get_where('transaksi', ['id_trans' => $id])->row_array();


            $this->response($transaksi, REST_Controller::HTTP_OK);
        }
    }

    //Mengirim atau menambah data kontak baru
    function index_post()
    {
        $data = array(
            'id_pas'        => $this->post('id_pas'),
            'id_pol'        => $this->post('id_pol'),
            'id_dok'        => $this->post('id_dok'),
            'tanggal_pukul' => $this->post('tanggal_pukul')
        );
        $insert = $this->db->insert('transaksi', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data kontak yang telah ada
    public function index_put()
    {

        $data = array(
            'id_pas'        => $this->put('id_pas'),
            'id_pol'        => $this->put('id_pol'),
            'id_dok'        => $this->put('id_dok'),
            'tanggal_pukul' => $this->put('tanggal_pukul')
        );

        $this->db->where('id_trans', $this->put('id_trans'));
        $this->db->update('transaksi', $data);

        $this->set_response($data, REST_Controller::HTTP_CREATED);
    }

    //Masukan function selanjutnya disini

    //Menghapus salah satu data kontak
    function index_delete()
    {
        $id = $this->delete('id_trans');

        $where = [
            'id_trans' => $id,
        ];

        $this->db->delete("transaksi", $where);
        $message = array('status' => 'success');

        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT);
    }
}

/* End of file Controllername.php */
