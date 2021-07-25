<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                FROM `user_sub_menu` JOIN `user_menu`
                ON `user_sub_menu`.`id_menu` = `user_menu`.`id`
                ORDER BY `user_menu`.`menu` ASC
                ";
        return $this->db->query($query)->result_array();
    }

    public function getmenuById($id)
    {
        $query = "SELECT * FROM `user_menu` WHERE `user_menu`.`id` = $id";
        return $this->db->query($query)->row_array();
    }

    public function getsubmenuById($id)
    {
        $query = "SELECT * FROM `user_menu` WHERE `user_sub_menu`.`id_sub_menu` = $id";
        return $this->db->query($query)->row_array();
    }

    public function edit($data)
    {
        $query = "UPDATE `user_menu` SET `menu` =  WHERE `user_menu`.`id` = ";
        $this->db->query($query);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Updated!</div>');
        redirect('menu');
    }

    public function submenu_edit($id_sub_menu)
    {
        $this->db->select('user_menu.menu, user_sub_menu.*');
        $this->db->from('user_sub_menu');
        $this->db->join('user_menu', 'user_menu.id = user_sub_menu.id_menu');
        $this->db->where('user_sub_menu.id_sub_menu =', $id_sub_menu);
        return $this->db->get();
    }
}
