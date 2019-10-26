<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Menu_model extends ci_model
{
    public function getSubMenu()
    {
        $query = "select `user_sub_menu`.*,`user_menu`.`menu`
        from `user_sub_menu` join `user_menu`
        on `user_sub_menu`.`menu_id`=`user_menu`.`id`
        ";
        return $this->db->query($query)->result_array();
    }
}
