<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Format.php';

class Login extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model_api', 'user');
    }
    public function index_get()
    {
        $username = $this->get('username');
        $password = $this->get('password');

        $login = $this->user->getUser($username, $password);

        if ($login) {
            $this->response([
                'status' => true,
                'data' => $login
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => $login
            ], REST_Controller::HTTP_OK);
        }
    }
}

/* End of file Controllername.php */
