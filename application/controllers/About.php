<?php
class About extends ci_controller
{
    public function index()
    {
        if ($this->session->userdata('username')) {
            $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('email')])->row_array();
        }

        $data['judul'] = 'Halaman Home';
        $this->load->view('templates/header', $data);
        $this->load->view('about/index');
        $this->load->view('templates/footer', $data);
    }
}
