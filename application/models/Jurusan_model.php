<?php
class Jurusan_model extends ci_model
{
    public function getAllJurusan()
    {
        return $this->db->get('jurusan')->result_array();
    }
}
