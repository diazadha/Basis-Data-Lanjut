<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_diskon extends CI_Model
{
    public function getDiscount_code()
    {
        $query = $this->db->get_where('discountcodes', array('status' => '0'));
        return $query;
    }

    public function get_allcodes()
    {
        $this->db->select('code');
        $query = $this->db->get('discountcodes');
        return $query->result_array();
    }

    public function check_codes()
    {
        $this->db->select('code');
        $query = $this->db->get('discountcodes');
        return $query->result_array();
    }

    public function add_record($data)
    {
        $this->db->insert('discountcodes', $data);
        return;
    }
}
