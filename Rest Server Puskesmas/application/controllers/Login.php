<?php

defined('BASEPATH') or exit('No direct script access allowed');

class login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->library('form_validation');
        // $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('template/header_login', $data);
        $this->load->view('login/index');
        $this->load->view('template/footer');
    }

    public function proses_login()
    {
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars($this->input->post('password'));

        $ceklogin = $this->login_model->login($username, $password);

        $data['title'] = "Login";

        if ($ceklogin) {
            foreach ($ceklogin as $row);
            $this->session->set_userdata('user', $row->username);
            $this->session->set_userdata('level', $row->level);
            $this->session->set_userdata('status', $row->status);

            if ($this->session->userdata('level') == "admin") {
                redirect('home_admin/index');
            } elseif ($this->session->userdata('level') == "user") {
                if ($this->session->userdata('status') == "aktif") {
                    redirect('home_user/index');
                } elseif ($this->session->userdata('status') == "tidak aktif") {
                    $this->session->set_flashdata('flash-data', 'Akun anda belum aktif, mohon hubungi admin');
                    $this->load->view('template/header_login', $data);
                    $this->load->view('login/index', $data);
                    $this->load->view('template/footer');
                }
            }
        } else {
            $this->session->set_flashdata('false', 'Username dan password anda salah');
            $this->load->view('template/header_login', $data);
            $this->load->view('login/index', $data);
            $this->load->view('template/footer');
            // redirect('login/index','refresh');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

    public function register()
    {
        $data['title'] = 'Register';

        // $this->form_validation->set_rules('fieldname','fieldlabel','trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/register', $data);
        } else {
            $username = htmlspecialchars($this->input->post('username'));
            $password = htmlspecialchars($this->input->post('password'));
            $check = $this->login_model->checkExistingData($username, $password);
            if ($check) {
                $this->login_model->tambahdatauser();
                $this->session->set_flashdata('flash-data', 'has been set');
                redirect('login/register_next', 'refresh');
            } else {
                $this->session->set_flashdata('flash-data-check', 'already used');
                $this->load->view('login/register', $data);
            }
        }
    }

    public function register_next()
    {
        $data['title'] = 'Register Data Diri';
        $data['jenis_kelamin'] = ['L', 'P'];

        // $this->form_validation->set_rules('fieldname','fieldlabel','trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
        $this->form_validation->set_rules('nama_pas', 'Nama Pasien', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/register_next', $data);
        } else {
            $maxVal = $this->login_model->getIdUserToPasien();
            if ($maxVal) {
                foreach ($maxVal as $row) {
                    $value[] = $row->max;
                }
            }
            $result = $value[0];
            $this->login_model->insertPasien($result);
            $this->session->set_flashdata('flash-data-diri', 'is completed');
            redirect('login/register_next', 'refresh');
        }
    }
}

/* End of file login.php */
