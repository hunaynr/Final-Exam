<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pasien extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('pasien_model');
        if (!isset($_SESSION['level'])) {
            redirect('login/index');
        }
    }

    public function tambah()
    {
        $data['title'] = 'Form Menambahkan Data Pasien';
        $data['jenis_kelamin'] = ['L', 'P'];

        // $this->form_validation->set_rules('fieldname','fieldlabel','trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
        $this->form_validation->set_rules('nama_pas', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('pasien/tambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->pasien_model->tambahdatapsn();
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('pasien', 'refresh');
        }
    }

    public function hapus($id)
    {
        $this->pasien_model->hapusdatapsn($id);
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('pasien', 'refresh');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Pasien';
        $data['pasien'] = $this->pasien_model->getpasienByID($id);
        $this->load->view('template/header', $data);
        $this->load->view('pasien/detail', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Form Edit Data Pasien';
        $data['pasien'] = $this->pasien_model->getpasienByID($id);
        $data['jenis_kelamin'] = ['L', 'P'];
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
        $this->form_validation->set_rules('nama_pas', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('pasien/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->pasien_model->ubahdatapsn();
            $this->session->set_flashdata('flash-data', 'diedit');
            redirect('pasien', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'List Pasien';
        $data['pasien'] = $this->pasien_model->getAllpasien();
        if ($this->input->post('keyword')) {
            $data['pasien'] = $this->pasien_model->cariDataPasien();
        }
        $this->load->view('template/header', $data);
        $this->load->view('pasien/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function pasien_pdf()
    {
        $this->load->library('pdf');

        $data['pasien'] = $this->pasien_model->getAllpasien();

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "daftar-pasien.pdf";
        $this->pdf->load_view('pasien/print', $data);
    }
}

/* End of file pasien.php */
