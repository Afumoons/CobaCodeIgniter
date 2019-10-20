<?php
class Peoples_model extends Ci_model
{

    public function getPeoples($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('people_id', $keyword);
            $this->db->or_like('people_name', $keyword);
            $this->db->or_like('people_address', $keyword);
            $this->db->or_like('people_email', $keyword);
        }
        return $this->db->get('peoples', $limit, $start)->result_array();
    }
    public function countAllPeoples()
    {
        return $this->db->get('peoples')->num_rows();
    }
    public function addPeopleData()
    {
        $data = [
            // "namakolom" => $this->input->post('name', true),
            "people_id" => $this->input->post('id', true),
            "people_name" => $this->input->post('name', true),
            "people_address" => $this->input->post('address', true),
            "people_email" => $this->input->post('email', true)
        ];
        // $this->db->insert('namatabel', $data);
        $this->db->insert('peoples', $data);
    }
    public function getPeopleById($id)
    {
        return $this->db->get_where('peoples', ['people_id' => $id])->row_array();
    }
    public function editPeopleData()
    {
        $data = [
            // "namatabel" => $this->input->post('name', true),
            "people_id" => $this->input->post('id', true),
            "people_name" => $this->input->post('name', true),
            "people_address" => $this->input->post('address', true),
            "people_email" => $this->input->post('email', true)
        ];
        $this->db->where('people_id', $this->input->post('id'));
        $this->db->update('peoples', $data);
    }
    public function deletePeopleData($id)
    {
        // $this->db->where('NPM', $id);
        // $this->db->delete('mahasiswa');
        $this->db->delete('peoples', ['people_id' => $id]);
    }
    public function searchPeopleData()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('people_id', $keyword);
        $this->db->or_like('people_name', $keyword);
        $this->db->or_like('people_address', $keyword);
        $this->db->or_like('people_email', $keyword);
        return $this->db->get('peoples')->result_array();
    }
}
