<?php
class Mahasiswa_model extends CI_Model
{

    public function getAllMahasiswa()
    {
        return $this->db->get('mahasiswa')->result_array();
        // $query = $this->db('mahasiswa');
        // return $query->result_array();
    }
    public function tambahDataMahasiswa()
    {
        $data = [
            // "namatabel" => $this->input->post('name', true),
            "NPM" => $this->input->post('npm', true),
            "nama_mahasiswa" => $this->input->post('nama', true)
        ];
        $this->db->insert('mahasiswa', $data);
    }
    public function hapusDataMahasiswa($id)
    {
        $this->db->where('NPM', $id);
        $this->db->delete('mahasiswa');
    }
}
