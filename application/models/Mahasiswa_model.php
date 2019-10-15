<?php
class Mahasiswa_model extends CI_Model
{

    public function getAllMahasiswa()
    {
        return $this->db->get('mahasiswa')->result_array();
        // $query = $this->db('mahasiswa');
        // return $query->result_array();
    }
}
