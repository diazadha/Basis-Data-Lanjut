<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_admin extends CI_Model
{
    public function admin_user()
    {
        $this->db->select('admintoko.*, toko.nama_toko');
        $this->db->from('admintoko');
        $this->db->join('toko', 'toko.id = admintoko.id_toko');
        $this->db->order_by('toko.nama_toko', 'ASC');
        return $this->db->get();
    }
    public function detail_admin($idadmin)
    {
        $this->db->select('admintoko.*, toko.nama_toko');
        $this->db->from('admintoko');
        $this->db->join('toko', 'toko.id = admintoko.id_toko');
        $this->db->where('admintoko.id_admin =', $idadmin);
        return $this->db->get();
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function submenu_update($data, $id_sub_menu, $menu, $title, $icon, $url)
    {
        $query = "UPDATE `user_sub_menu`, `user_menu` SET `user_sub_menu`.`title` = '$title' , 
        `user_sub_menu`.`icon` = '$icon',
        `user_sub_menu`.`url` = '$url',
        `user_sub_menu`.`is_active` = $data,
        `user_menu`.`menu` = '$menu'
        WHERE `user_sub_menu`.`id_menu` = `user_menu`.`id`
        AND `user_sub_menu`.`id_sub_menu` = $id_sub_menu ";
        $this->db->query($query);
    }
}
