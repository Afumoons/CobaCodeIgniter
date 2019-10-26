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
        $data['title'] = 'User Page';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/user_footer');
    }
    public function edit()
    {
        $data['title'] = 'Edit Profile'; //harus sama dengan yang di database agar fitur aktif dapat berjalan
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // apakah input username != di database
        if ($data['user']['username'] != $this->input->post('username')) {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.user_email]', [
                'is_unique' => 'This Email has already used'
            ]);
        } else {
            $this->form_validation->set_rules('email', 'Email', 'required|trim');
        }
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/user_sidebar', $data);
            $this->load->view('templates/user_topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/user_footer');
        } else {
            $username = $this->input->post('username');
            $email = $this->input->post('email');

            //cek ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                //config
                $config['upload_path'] = './assets/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048'; //2048kb
                // $config['max_width'] = '1024';
                //  $config['max_height'] = '768';
                //initialize
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['user_image'];
                    if ($old_image != 'default.jpg') {
                        //hapus jika bukan default.jpg
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    // sudah terupload
                    //memasukkan ke database -> user,user_image
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('user_image', $new_image);
                } else {
                    $this->upload->display_errors();
                }
            }

            $this->db->set('user_email', $email);
            $this->db->where('username', $username);
            $this->db->update('user');

            $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert"><strong>Your profile has been updated!</strong></div>');
            redirect('user');
        }
    }
    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]', [
            'matches' => 'Password dont match!', 'min_length' => 'Password too short!',
        ]);
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/user_sidebar', $data);
            $this->load->view('templates/user_topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/user_footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['user_password'])) {
                $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert"><strong>Wrong current password!</strong></div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert"><strong>New password cannot be the same as current password!</strong></div>');
                    redirect('user/changepassword');
                } else {
                    //password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('user_password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert"><strong>Password changed!</strong></div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
