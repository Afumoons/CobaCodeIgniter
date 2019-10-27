<?php
class Peoples extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peoples_model', 'peoples');
        $this->load->library('pagination');
        $this->load->library('form_validation');
    }


    public function index()
    {
        // $this->load->database(); //untuk load database di function ini saja (agar semua letakkan di constructor)
        $data['judul'] = 'List Of Peoples';
        if ($this->session->userdata('username')) {
            $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('email')])->row_array();
        }
        // ambil keyword search
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
            // $data['keyword'] = null;
        }

        //pagination config
        $this->db->like('people_id', $data['keyword']);
        $this->db->or_like('people_name', $data['keyword']);
        $this->db->or_like('people_address', $data['keyword']);
        $this->db->or_like('people_email', $data['keyword']);
        $this->db->from('peoples');
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 8;


        //initialization
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['peoples'] = $this->peoples->getPeoples($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view('templates/header', $data);
        $this->load->view('peoples/index', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {
        if ($this->session->userdata('username')) {
            $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('email')])->row_array();
        }
        $data['judul'] = 'Add Peoples Data Form';
        $data['total_rows'] = $this->peoples->countAllPeoples();
        // $this->form_validation->set_rules('nama', 'nama yang ditampilkan ketika error', 'aturan1|aturan2|aturan3');
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_emails');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('peoples/add', $data);
            $this->load->view('templates/footer');
        } else {
            $this->peoples->addPeopleData();
            $this->session->set_flashdata('flash', 'Added');
            redirect('peoples');
        }
    }
    public function delete($id)
    {
        $this->peoples->deletePeopleData($id);
        $this->session->set_flashdata('flash', 'Deleted');
        redirect('peoples');
    }
    public function detail($id)
    {
        if ($this->session->userdata('username')) {
            $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('email')])->row_array();
        }
        $data['judul'] = 'People Data Detail';
        $data['peoples'] = $this->peoples->getPeopleById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('peoples/detail', $data);
        $this->load->view('templates/footer');
    }
    public function edit($id)
    {
        if ($this->session->userdata('username')) {
            $data['user'] = $this->db->get_where('user', ['user_email' => $this->session->userdata('email')])->row_array();
        }
        $data['judul'] = 'Edit Peoples Data Form';
        $data['peoples'] = $this->peoples->getPeopleById($id);
        // $this->form_validation->set_rules('nama', 'nama yang ditampilkan ketika error', 'aturan1|aturan2|aturan3');
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_emails');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('peoples/edit');
            $this->load->view('templates/footer');
        } else {
            $this->peoples->editPeopleData();
            $this->session->set_flashdata('flash', 'Edited');
            redirect('peoples');
        }
    }
}
