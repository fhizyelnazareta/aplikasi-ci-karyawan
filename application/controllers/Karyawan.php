<?php
class Karyawan extends CI_Controller
{
    public function __construct()
    {
        // wajib di construct CI
        parent::__construct();
        // meload database untuk semua method di class/controller karyawan
        // $this->load->database();

        // meload model
        $this->load->model('Karyawan_model');
        // meload validasi form
        $this->load->library('form_validation');
    }
    public function index()
    {

        $data['judul'] = 'Halaman Karyawan';
        $data['karyawan'] = $this->Karyawan_model->getAllKaryawan();

        // menjalankan bila ada pencarian
        if ($this->input->post('keyword')) {
            $data['karyawan'] = $this->Karyawan_model->cariDataKaryawan();
        }
        // tampilan index karyawan
        $this->load->view('templates/header', $data);
        $this->load->view('karyawan/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['judul'] = 'Tambah Karyawan';

        // mengisi rules untuk validasi
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // pengkondisian validasi
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('karyawan/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Karyawan_model->tambahData();
            $this->session->set_flashdata('flash', 'Data ditambahkan');
            redirect('karyawan');
        }
    }
    public function hapus($id)
    {
        $this->Karyawan_model->hapusData($id);
        $this->session->set_flashdata('flash', 'Data dihapus');
        redirect('karyawan');
    }
    public function detail($id)
    {
        $data['judul'] = 'Info karyawan';
        $data['karyawan'] = $this->Karyawan_model->getKaryawanById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('karyawan/detail', $data);
        $this->load->view('templates/footer');
    }
    public function ubah($id)
    {
        $data['judul'] = 'Ubah Informasi Karyawan';
        $data['karyawan'] = $this->Karyawan_model->getKaryawanById($id);
        $data['jabatan'] = ['Chief Executive Officer', 'Chief Technology Officer', 'Project Leader', 'IT Support', 'Leader Staff'];
        // mengisi rules untuk validasi
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        // pengkondisian validasi
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('karyawan/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Karyawan_model->ubahData();
            $this->session->set_flashdata('flash', 'Data diubah');
            redirect('karyawan');
        }
    }
}
