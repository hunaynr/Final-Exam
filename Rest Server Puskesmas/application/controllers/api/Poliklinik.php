<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class Poliklinik extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('poliklinik_model_api', 'poliklinik');
    }
    public function index_get()
    {
        $id_pol = $this->get('id_pol');
        if ($id_pol === null) {
            $poliklinik = $this->poliklinik->getPoliklinik();
        } else {
            $poliklinik = $this->poliklinik->getPoliklinik($id_pol);
        }

        if ($poliklinik) {
            $this->response([
                'status' => true,
                'data' => $poliklinik
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
        $id_pol = $this->delete('id_pol');

        if ($id_pol === null) {
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->poliklinik->deletePoliklinik($id_pol) > 0) {
                //ok
                $this->response([
                    'status' => true,
                    'id_pol' => $id_pol,
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
            'jenis' => $this->post('jenis'),
            'ruang' => $this->post('ruang'),
        ];

        if ($this->poliklinik->createPoliklinik($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new poliklinik has been created'
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
        $id_pol = $this->put('id_pol');
        $data = [
            'jenis' => $this->put('jenis'),
            'ruang' => $this->put('ruang'),
        ];

        if ($this->poliklinik->updatePoliklinik($data, $id_pol) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data poliklinik has been updated'
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
