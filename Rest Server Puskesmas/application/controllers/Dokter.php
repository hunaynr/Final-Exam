<?php

defined('BASEPATH') or exit('No direct script access allowed');

class dokter extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('dokter_model');
        if (!isset($_SESSION['level'])) {
            redirect('login/index');
        }
    }

    public function tambah()
    {
        $data['title'] = 'Form Menambahkan Data Dokter';
        $data['jenis_kelamin'] = ['L', 'P'];

        // $this->form_validation->set_rules('fieldname','fieldlabel','trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('nama_dok', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('dokter/tambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->dokter_model->tambahdatadok();
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('dokter', 'refresh');
        }
    }

    public function hapus($id)
    {
        $this->dokter_model->hapusdatadok($id);
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('dokter', 'refresh');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Dokter';
        $data['dokter'] = $this->dokter_model->getdokterByID($id);
        $this->load->view('template/header', $data);
        $this->load->view('dokter/detail', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Form Edit Data Dokter';
        $data['dokter'] = $this->dokter_model->getdokterByID($id);
        $data['jenis_kelamin'] = ['L', 'P'];
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('nama_dok', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('dokter/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->dokter_model->ubahdatadok();
            $this->session->set_flashdata('flash-data', 'diedit');
            redirect('dokter', 'refresh');
        }
    }

    public function index()
    {
        $data = array(
            'title' => 'List Dokter',
            'dokter' => $this->dokter_model->getAlldokter()
        );
        // $data['title']='List Dokter';
        // $data['dokter']=$this->dokter_model->getAlldokter();
        if ($this->input->post('keyword')) {
            $data['dokter'] = $this->dokter_model->cariDataDokter();
        }
        $this->load->view('template/header', $data);
        $this->load->view('dokter/index', $data);
        $this->load->view('template/footer');
    }

    public function dokter_pdf()
    {
        $this->load->library('pdf');

        $data['dokter'] = $this->dokter_model->getAlldokter();

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "daftar-dokter.pdf";
        $this->pdf->load_view('dokter/print', $data);
    }
}

/* End of file dokter.php */
