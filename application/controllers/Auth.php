<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }
    public function registration()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'This username has already used'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.user_email]', [
            'is_unique' => 'This email has already registered'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2],', [
            'matches' => 'Password dont match!', 'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'user_email' => htmlspecialchars($this->input->post('email', true)),
                'user_password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'is_active' => 1,
                'role_id' => 2,
                'user_datecreated' => time(),
                'user_image' => 'default.jpg'
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert"><strong>Congratulation! you account has been created. Please Login</strong></div>');
            redirect('auth');
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['user_email' => $email])->row_array();
        //usernya ada
        if ($user) {
            //Jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['user_password'])) {
                    $data = [
                        'email' => $user['user_email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                } else {
                    $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert"><strong>Wrong Password</strong></div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert"><strong>This email has not been activated</strong></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert"><strong>Email is not registered!</strong></div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert"><strong>You have been logged out!</strong></div>');
        redirect('auth');
    }
}
