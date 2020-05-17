<?php

defined('BASEPATH') or exit('No direct script access allowed');

class transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('transaksi_model');
        if (!isset($_SESSION['level'])) {
            redirect('login/index');
        }
    }

    public function tambah()
    {
        $data['title'] = 'Form Menambahkan Data Transaksi';
        $data['nama_pas'] = $this->transaksi_model->dropdownnama_pas();
        $data['nama_dok'] = $this->transaksi_model->dropdownnama_dok();
        $data['jenis'] = $this->transaksi_model->dropdownjenis();

        // $this->form_validation->set_rules('fieldname','fieldlabel','trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('tanggal_pukul', 'Tanggal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('transaksi/tambah', $data);
            $this->load->view('template/footer');
        } else {
            $this->transaksi_model->tambahdatatrans();
            $this->session->set_flashdata('flash-data', 'ditambahkan');
            redirect('transaksi', 'refresh');
        }
    }

    public function hapus($id)
    {
        $this->transaksi_model->hapusdatatrans($id);
        $this->session->set_flashdata('flash-data', 'dihapus');
        redirect('transaksi', 'refresh');
    }

    public function edit($id)
    {
        $data['title'] = 'Form Edit Data Transaksi';
        $data['transaksi'] = $this->transaksi_model->gettransaksiByID($id);
        $data['pasien'] = $this->transaksi_model->dropdownnama_pas();
        $data['poliklinik'] = $this->transaksi_model->dropdownjenis();
        $data['dokter'] = $this->transaksi_model->dropdownnama_dok();
        $this->form_validation->set_rules('tanggal_pukul', 'Nama Pasien', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('transaksi/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->transaksi_model->ubahdatatrans();
            $this->session->set_flashdata('flash-data', 'diedit');
            redirect('transaksi', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'List Transaksi';
        $data['transaksi'] = $this->transaksi_model->getAlltransaksiJoin();
        if ($this->input->post('keyword')) {
            $data['transaksi'] = $this->transaksi_model->cariDataTransaksi();
        }
        $this->load->view('template/header', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function transaksi_pdf()
    {
        $this->load->library('pdf');

        $data['transaksi'] = $this->transaksi_model->getAlltransaksiJoin();

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-transaksi.pdf";
        $this->pdf->load_view('transaksi/print', $data);
    }
}

/* End of file transaksi.php */
