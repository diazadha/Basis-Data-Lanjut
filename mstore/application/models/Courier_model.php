<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Courier_model extends CI_Model
{
    public function getcourierById($id)
    {
        $query = "SELECT * FROM `armada` WHERE `armada`.`id` = $id";
        return $this->db->query($query)->row_array();
    }
}
