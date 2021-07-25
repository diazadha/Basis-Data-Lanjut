<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_alamat extends CI_Model
{
    public function provinsi()
    {
        $this->db->order_by('nama', 'ASC');
        $query = $this->db->get('provinsi');
        return $query->result();
    }

    public function kabupaten($id_prov)
    {
        $this->db->where('id_prov', $id_prov);
        $this->db->order_by('kabupaten.nama', 'ASC');
        $query = $this->db->get('kabupaten');
        $output = '<option value="">Select City</option>';
        foreach ($query->result() as $k) {
            $output .= '<option value="' . $k->id_kab . '">' . $k->nama . '</option>';
        }
        return $output;
    }
    public function kecamatan($id_kab)
    {
        $this->db->where('id_kab', $id_kab);
        $this->db->order_by('kecamatan.nama', 'ASC');
        $query = $this->db->get('kecamatan');
        $output = '<option value="">Select City</option>';
        foreach ($query->result() as $k) {
            $output .= '<option value="' . $k->id_kec . '">' . $k->nama . '</option>';
        }
        return $output;
    }
    public function kelurahan($id_kec)
    {
        $this->db->where('id_kec', $id_kec);
        $this->db->order_by('kelurahan.nama', 'ASC');
        $query = $this->db->get('kelurahan');
        $output = '<option value="">Select City</option>';
        foreach ($query->result() as $k) {
            $output .= '<option value="' . $k->id_kel . '">' . $k->nama . '</option>';
        }
        return $output;
    }
}
