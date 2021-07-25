<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_store extends CI_Model
{
    public function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('toko');
        $query = $this->db->get();
        return $query;
    }
    public function tampil_namatoko()
    {
        $this->db->select('id,nama_toko');
        $this->db->from('toko');
        $this->db->order_by('nama_toko', 'ASC');
        $query = $this->db->get();
        return $query;
    }
    public function tampil_jauh()
    {
        $this->db->select('toko.*');
        $this->db->from('toko');
        $this->db->join('terdekat', 'terdekat.kodearea != toko.kodearea');
        $query = $this->db->get();
        return $query;
    }
    public function tampil_dekat($id = 1)
    {
        $this->db->select('toko.*,terdekat.desa');
        $this->db->from('toko');
        $this->db->join('terdekat', 'terdekat.kodearea=toko.kodearea');
        $this->db->where('terdekat.id =', $id);
        return $this->db->get();
    }
    public function location()
    {
        $this->db->select('terdekat.*');
        $this->db->from('terdekat');
        return $this->db->get();
    }
    public function update_location($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function admin_toko($id)
    {
        $this->db->select('COUNT(id_toko) as jumlah');
        $this->db->from('admintoko');
        $this->db->join('toko', 'toko.id = admintoko.id_toko');
        $this->db->where('toko.id =', $id);
        return $this->db->get();
    }

    public function detail_toko($id)
    {
        $this->db->select('toko.*');
        $this->db->from('toko');
        $this->db->where('toko.id =', $id);
        return $this->db->get();
    }

    public function student_list()
    {
        return $this->db->select('s.*, as.student_id')
            ->from('students as s')
            ->join('added_student as as', 'as.student_id = s.id', 'left')
            ->get()
            ->result();
    }
}
