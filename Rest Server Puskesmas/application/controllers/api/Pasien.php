<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class Pasien extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pasien_model_api', 'pasien');
    }
    public function index_get()
    {
        $id_pas = $this->get('id_pas');
        if ($id_pas === null) {
            $pasien = $this->pasien->getPasien();
        } else {
            $pasien = $this->pasien->getPasien($id_pas);
        }

        if ($pasien) {
            $this->response([
                'status' => true,
                'data' => $pasien
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
        $id_pas = $this->delete('id_pas');

        if ($id_pas === null) {
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->pasien->deletePasien($id_pas) > 0) {
                //ok
                $this->response([
                    'status' => true,
                    'id_pas' => $id_pas,
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
            'id' => $this->post('id'),
            'no_ktp' => $this->post('no_ktp'),
            'nama_pas' => $this->post('nama_pas'),
            'jenis_kelamin' => $this->post('jenis_kelamin'),
            'alamat' => $this->post('alamat'),
        ];

        if ($this->pasien->createPasien($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new patient has been created'
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
        $id_pas = $this->put('id_pas');
        $data = [
            'id' => $this->put('id'),
            'no_ktp' => $this->put('no_ktp'),
            'nama_pas' => $this->put('nama_pas'),
            'jenis_kelamin' => $this->put('jenis_kelamin'),
            'alamat' => $this->put('alamat'),
        ];

        if ($this->pasien->updatePasien($data, $id_pas) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data patient has been updated'
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
