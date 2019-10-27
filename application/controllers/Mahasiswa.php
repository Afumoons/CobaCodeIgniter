<?php
class Mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->database();
        $this->load->model('Mahasiswa_model', 'mahasiswa');
        $this->load->library('form_validation');
        $this->load->model('Jurusan_model');
    }


    public function index()
    {
        // $this->load->database(); //untuk load database di function ini saja (agar semua letakkan di constructor)
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa->getAllMahasiswa();
        if ($this->session->userdata('username')) {
            $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('email')])->row_array();
        }
        if ($this->input->post('keyword')) {
            $data['mahasiswa'] = $this->mahasiswa->cariDataMahasiswa();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        if ($this->session->userdata('username')) {
            $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('email')])->row_array();
        }
        $data['judul'] = 'Form Tambah Data Mahasiswa';
        $data['jurusan'] = $this->Jurusan_model->getAllJurusan();
        // $this->form_validation->set_rules('nama', 'nama yang ditampilkan ketika error', 'aturan1|aturan2|aturan3');
        $this->form_validation->set_rules('npm', 'NPM', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->mahasiswa->tambahDataMahasiswa();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('mahasiswa');
        }
    }
    public function hapus($id)
    {
        $this->mahasiswa->hapusDataMahasiswa($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mahasiswa');
    }
    public function detail($id)
    {
        if ($this->session->userdata('username')) {
            $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('email')])->row_array();
        }
        $data['judul'] = 'Detail Data Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa->getMahasiswaById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/detail', $data);
        $this->load->view('templates/footer');
    }
    public function ubah($id)
    {
        if ($this->session->userdata('username')) {
            $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('email')])->row_array();
        }
        $data['judul'] = 'Form Ubah  Data Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa->getMahasiswaById($id);
        $data['jurusan'] = $this->Jurusan_model->getAllJurusan();
        // $this->form_validation->set_rules('nama', 'nama yang ditampilkan ketika error', 'aturan1|aturan2|aturan3');
        $this->form_validation->set_rules('npm', 'NPM', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->mahasiswa->ubahDataMahasiswa();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('mahasiswa');
        }
    }
}
