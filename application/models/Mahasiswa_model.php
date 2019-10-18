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
            "nama_mahasiswa" => $this->input->post('nama', true),
            "jurusan_mahasiswa" => $this->input->post('jurusan', true)
        ];
        $this->db->insert('mahasiswa', $data);
    }
    public function hapusDataMahasiswa($id)
    {
        // $this->db->where('NPM', $id);
        // $this->db->delete('mahasiswa');
        $this->db->delete('mahasiswa', ['NPM' => $id]);
    }
    public function getMahasiswaById($id)
    {
        return $this->db->get_where('mahasiswa', ['NPM' => $id])->row_array();
    }
    public function ubahDataMahasiswa()
    {
        $data = [
            // "namatabel" => $this->input->post('name', true),
            "NPM" => $this->input->post('npm', true),
            "nama_mahasiswa" => $this->input->post('nama', true),
            "jurusan_mahasiswa" => $this->input->post('jurusan', true)
        ];
        $this->db->where('NPM', $this->input->post('id'));
        $this->db->update('mahasiswa', $data);
    }
    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('NPM', $keyword);
        $this->db->or_like('nama_mahasiswa', $keyword);
        $this->db->or_like('jurusan_mahasiswa', $keyword);
        return $this->db->get('mahasiswa')->result_array();
    }
}
