<?php

defined('BASEPATH') or exit('No direct script access allowed');

class poliklinik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('poliklinik_model');
        if (!isset($_SESSION['level'])) {
            redirect('login/index');
        }
    }

    public function tambah()
    {
        $data['title'] = 'Form Menambahkan Data Poliklinik';

        // $this->form_validation->set_rules('fieldname','fieldlabel','trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('ruang', 'Ruang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('poliklinik/tambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->poliklinik_model->tambahdatapol();
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('poliklinik', 'refresh');
        }
    }

    public function hapus($id)
    {
        $this->poliklinik_model->hapusdatapol($id);
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('poliklinik', 'refresh');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Poliklinik';
        $data['poliklinik'] = $this->poliklinik_model->getpoliklinikByID($id);
        $this->load->view('template/header', $data);
        $this->load->view('poliklinik/detail', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Form Edit Data Poliklinik';
        $data['poliklinik'] = $this->poliklinik_model->getpoliklinikByID($id);
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('ruang', 'Ruang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('poliklinik/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->poliklinik_model->ubahdatapol();
            $this->session->set_flashdata('flash-data', 'diedit');
            redirect('poliklinik', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'List Poliklinik';
        $data['poliklinik'] = $this->poliklinik_model->getAllpoliklinik();
        if ($this->input->post('keyword')) {
            $data['poliklinik'] = $this->poliklinik_model->cariDataPoliklinik();
        }
        $this->load->view('template/header', $data);
        $this->load->view('poliklinik/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function poliklinik_pdf()
    {
        $this->load->library('pdf');

        $data['poliklinik'] = $this->poliklinik_model->getAllpoliklinik();

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "daftar-poliklinik.pdf";
        $this->pdf->load_view('poliklinik/print', $data);
    }
}

/* End of file poliklinik.php */
