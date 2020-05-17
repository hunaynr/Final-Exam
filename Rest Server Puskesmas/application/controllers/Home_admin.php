<?php

defined('BASEPATH') or exit('No direct script access allowed');

class home_admin extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('level') != "admin") {
            if (!isset($_SESSION['level'])) {
                redirect('login/index');
            }
        }
        $data['title'] = 'Home';
        $this->load->view('template/header', $data);
        // echo "Selamat Datang di Halaman Home";
        $this->load->view('home/index');
        $this->load->view('template/footer');
    }
}

/* End of file Home.php */
