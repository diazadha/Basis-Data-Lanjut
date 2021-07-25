<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bayar_model extends CI_Model
{
    public function getpaymentById($id)
    {
        $query = "SELECT * FROM `pembayaran` WHERE `pembayaran`.`id` = $id";
        return $this->db->query($query)->row_array();
    }
}
