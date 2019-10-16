<?php
class Mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->database();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
    }


    public function index()
    {
        // $this->load->database(); //untuk load database di function ini saja (agar semua letakkan di constructor)
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Mahasiswa';
        // $this->form_validation->set_rules('nama', 'nama yang ditampilkan ketika error', 'aturan1|aturan2|aturan3');
        $this->form_validation->set_rules('npm', 'NPM', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('mahasiswa');
        }
    }
    public function hapus($id)
    {
        $this->Mahasiswa_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mahasiswa');
    }
}
