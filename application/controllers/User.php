<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_id();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'User Page';
        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/user_footer');
    }
}
