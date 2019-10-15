<?php
class About extends ci_controller
{
    public function index()
    {
        $data['judul'] = 'Halaman Home';
        $this->load->view('templates/header', $data);
        $this->load->view('about/index');
        $this->load->view('templates/footer', $data);
    }
}
