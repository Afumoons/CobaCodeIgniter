<?php
class Home extends CI_Controller
{
    public function index($nama = 'World')
    {
        if ($this->session->userdata('username')) {
            $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('email')])->row_array();
        }
        $data['judul'] = 'Halaman Home';
        $data['nama'] = $nama;
        $this->load->view('templates/header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }
}
