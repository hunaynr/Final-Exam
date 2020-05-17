<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class Dokter extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dokter_model_api', 'dokter');
    }
    public function index_get()
    {
        $id_dok = $this->get('id_dok');
        if ($id_dok === null) {
            $dokter = $this->dokter->getDokter();
        } else {
            $dokter = $this->dokter->getDokter($id_dok);
        }

        if ($dokter) {
            $this->response([
                'status' => true,
                'data' => $dokter
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id_dok = $this->delete('id_dok');

        if ($id_dok === null) {
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->dokter->deleteDokter($id_dok) > 0) {
                //ok
                $this->response([
                    'status' => true,
                    'id_dok' => $id_dok,
                    'message' => 'deleted.'
                ], REST_Controller::HTTP_OK);
            } else {
                //id not found
                $this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'nip' => $this->post('nip'),
            'nama_dok' => $this->post('nama_dok'),
            'jenis_kelamin' => $this->post('jenis_kelamin'),
            'alamat' => $this->post('alamat'),
        ];

        if ($this->dokter->createDokter($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new doctor has been created'
            ], REST_Controller::HTTP_CREATED);
        } else {
            //id not found
            $this->response([
                'status' => false,
                'message' => 'failed to create new data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id_dok = $this->put('id_dok');
        $data = [
            'nip' => $this->put('nip'),
            'nama_dok' => $this->put('nama_dok'),
            'jenis_kelamin' => $this->put('jenis_kelamin'),
            'alamat' => $this->put('alamat'),
        ];

        if ($this->dokter->updateDokter($data, $id_dok) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data doctor has been updated'
            ], REST_Controller::HTTP_OK);
        } else {
            //id not found
            $this->response([
                'status' => false,
                'message' => 'failed to update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

/* End of file Controllername.php */
