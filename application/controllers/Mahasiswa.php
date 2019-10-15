<?php
class Mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->database();
        $this->load->model('Mahasiswa_model');
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
    { }
}
