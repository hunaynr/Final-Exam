<?php

defined('BASEPATH') or exit('No direct script access allowed');

class authorization extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('authorization_model');
        $this->load->library('form_validation');
        // $this->load->library('session');
        if ($this->session->userdata('level') != "admin") {
            if (!isset($_SESSION['level'])) {
                redirect('login/index');
            }
        }
    }

    public function index()
    {
        $data['title'] = 'List User';
        $data['user'] = $this->authorization_model->getAlluser();
        if ($this->input->post('keyword')) {
            $data['user'] = $this->authorization_model->cariDataUser();
        }
        $this->load->view('template/header', $data);
        $this->load->view('authorization/index', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Form Edit Data User';
        $data['user'] = $this->authorization_model->getuserByID($id);
        $data['status'] = ['aktif', 'tidak aktif'];
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('authorization/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->authorization_model->ubahdatauser();
            $this->session->set_flashdata('flash-data', 'diedit');
            redirect('authorization', 'refresh');
        }
    }
}

/* End of file login.php */
