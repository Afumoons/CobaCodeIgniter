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

        //pagination config
        $config['base_url'] = 'http://localhost/CobaCodeIgniter/peoples/index';
        $config['total_rows'] = $this->peoples->countAllPeoples();
        $config['per_page'] = 12;
        $config['num_links'] = 4;

        //styling pagination
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li">';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li">';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li">';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li">';

        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li">';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li">';

        $config['attributes'] = array('class' => 'page-link');

        //initialization
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);


        $data['peoples'] = $this->peoples->getAllPeoples($config['per_page'], $data['start']);
        $this->load->view('templates/header', $data);
        $this->load->view('peoples/index', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {
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
        $data['judul'] = 'People Data Detail';
        $data['peoples'] = $this->peoples->getPeopleById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('peoples/detail', $data);
        $this->load->view('templates/footer');
    }
    public function edit($id)
    {
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
