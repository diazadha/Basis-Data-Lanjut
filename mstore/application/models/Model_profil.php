<?php
class Model_profil extends CI_Model
{
    public function profil()
    {
        $this->db->select('toko.*, admintoko.*');
        $this->db->from('toko');
        $this->db->join('admintoko', 'admintoko.id_toko = toko.id');
        $this->db->where('admintoko.email', $this->session->userdata('email'));
        return $this->db->get();
    }
    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function update_img($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function update_imgtoko($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
