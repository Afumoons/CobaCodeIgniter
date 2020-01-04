<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation'); //dimatikan karena sudah autoload

    }
    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('user');
        }
        $this->form_validation->set_rules('input', 'Input', 'trim|required');
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
    private function _login()
    {
        $input = $this->input->post('input');
        $password = $this->input->post('password');
        // $user = $this->db->get_where('user', ['user_email' => $input])->row_array();
        $this->db->where('username', $input);
        $this->db->or_where('user_email', $input);
        $user = $this->db->get('user')->row_array();
        //usernya ada
        if ($user) {
            //Jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['user_password'])) {
                    $data = [
                        'username' => $user['username'],
                        'email' => $user['user_email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    // cek role
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert"><strong>Wrong Password!</strong></div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert"><strong>This email has not been activated</strong></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert"><strong>We cannot find your Email or Username, try again! </strong></div>');
            redirect('auth');
        }
    }
    public function registration()
    {

        if ($this->session->userdata('username')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'This username has already used'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.user_email]', [
            'is_unique' => 'This email has already registered'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password dont match!', 'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration Page';
            $data['emailvalue'] = $this->input->get('email');
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'user_email' => htmlspecialchars($email),
                'user_password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'is_active' => 0,
                'role_id' => 2,
                'user_datecreated' => time(),
                'user_image' => 'default.jpg'
            ];
            // siapkan token
            // php base64_encode
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'user_email' => $email,
                'token' => $token,
                'date_created' => time()
            ];
            //insert db
            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            //kirim email dengan token dengan fungsi verify
            $this->_sendEmail($token, 'verify');


            $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert"><strong>Congratulation! you account has been created. Please activate your account</strong></div>');
            redirect('auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        $this->load->library('email');

        $config = array();
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        //this website email
        $config['smtp_user'] = 'axvalax@gmail.com';
        $config['smtp_pass'] = '@xv@L@x13259287';
        $config['smtp_port'] = 465;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $this->email->initialize($config);

        $this->email->set_newline("\r\n");
        $this->email->from('axvalax@gmail.com', 'Akhsan valaux');

        if ($type == 'verify') {
            $this->email->to($this->input->post('email'));
            $this->email->subject('Account Verification (No Reply)');
            $this->email->message('Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a> (This link/token expires within 24 hours)<br>This is an auto generated email do not reply');
        } else if ($type == 'forgot') {
            $this->email->to($this->input->post('input'));
            $this->email->subject('Reset Password (No Reply)');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?input=' . $this->input->post('input') . '&token=' . urlencode($token) . '">Reset Password</a> (This link/token expires within 24 hours)<br>This is an auto generated email do not reply');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('user', ['user_email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('user_email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['user_email' => $email]);
                    $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert"><strong>Email ' . $email . ' Activation Success! Please login</strong></div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['user_email' => $email]);
                    $this->db->delete('user_token', ['user_email' => $email]);
                    $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert"><strong>Account activation failed! Token Expired</strong></div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert"><strong>Account activation failed! Token Invalid</strong></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert"><strong>Account activation failed! Wrong email</strong></div>');
            redirect('auth');
        }
    }

    public function logout($home = null)
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert"><strong>You have been logged out!</strong></div>');
        //di home
        if ($home) {
            redirect('home');
        } else {
            redirect('auth');
        }
    }
    public function blocked()
    {
        $data['title'] = 'Access Blocked';
        $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_sidebar', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('auth/blocked');
        $this->load->view('templates/user_footer');
    }
    public function forgotPassword()
    {
        // var_dump($this->input->post('input'));

        $this->form_validation->set_rules('input', 'Input', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
        } else {

            $input = $this->input->post('input');
            $this->db->where('is_active', 1);
            $this->db->where('username', $input);
            $this->db->or_where('user_email', $input);
            $user = $this->db->get('user')->row_array();

            // $user = $this->db->get_where('user', ['user_email' => $input, 'is_active' => 1])->row_array();
            if ($user) {
                //buat token
                // php base64_encode
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'user_email' => $input,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert"><strong>Please check your email to reset your password!</strong></div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert"><strong>Email is not registered or activated!</strong></div>');
                redirect('auth/forgotpassword');
            }
        }
    }
    public function resetPassword()
    {
        $input = $this->input->get('input');
        $token = $this->input->get('token');
        $this->db->where('username', $input);
        $this->db->or_where('user_email', $input);
        $user = $this->db->get('user')->row_array();
        // $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $input);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', ' <div class="alert alert-Danger" role="alert"><strong>Reset password failed! wrong token</strong></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', ' <div class="alert alert-Danger" role="alert"><strong>Reset password failed! wrong email</strong></div>');
            redirect('auth');
        }
    }
    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password dont match!', 'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('user_password', $password);
            $this->db->where('user_email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert"><strong>Password has been changed! Please login...</strong></div>');
            redirect('auth');
        }
    }
}
