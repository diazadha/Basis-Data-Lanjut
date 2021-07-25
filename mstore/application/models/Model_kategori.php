<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_kategori extends CI_Model
{
    public function tampil_kategori()
    {
        $this->db->select('kategori.*');
        $this->db->from('kategori');
        $this->db->join('toko', 'kategori.id_toko = toko.id');
        $this->db->join('admintoko', 'admintoko.id_toko = toko.id');
        $this->db->where('admintoko.email', $this->session->userdata('email'));
        return $this->db->get();
    }

    public function kategorisemua()
    {
        $hasil = $this->db->query("SELECT DISTINCT kategori.nama_kategori FROM kategori");
        return $hasil;
    }
    public function kategoritoko()
    {
        $this->db->select('kategori.id, kategori.nama_kategori, toko.nama_toko');
        $this->db->from('kategori');
        $this->db->join('toko', 'toko.id = kategori.id_toko');
        $this->db->order_by('nama_kategori', 'ASC');
        return $this->db->get();
    }
    public function toko()
    {
        $this->db->select('toko.id,toko.nama_toko');
        $this->db->from('toko');
        return $this->db->get();
    }
    public function idnamatoko($kategori)
    {
        $this->db->select('kategori.nama_kategori, toko.nama_toko');
        $this->db->from('kategori');
        $this->db->join('toko', 'toko.id = kategori.id_toko');
        $result = $this->db->where('kategori.id_toko =', $kategori)->get();
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function idnamakategori($kategori)
    {
        $this->db->select('kategori.nama_kategori, toko.nama_toko');
        $this->db->from('kategori');
        $this->db->join('toko', 'toko.id = kategori.id_toko');
        $this->db->where('kategori.id =', $kategori);
        return $this->db->get();
    }

    public function tampilsemuabarang($brg)
    {
        $this->db->select('barang.*, kategori.nama_kategori');
        $this->db->from('kategori');
        $this->db->join('barang', 'barang.id_kategori=kategori.id');
        $result = $this->db->where('kategori.nama_kategori', $brg)->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function tambah_kategori($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_kategori($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function geteditkategoriByID($id)
    {
        $query = "SELECT * FROM `kategori` WHERE `kategori`.`id` = $id";
        return $this->db->query($query)->row_array();
    }

    public function update_kategori($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_kategori($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function tampil_data($idtok)
    {
        $this->db->select('kategori.*');
        $this->db->from('toko');
        $this->db->join('kategori', 'kategori.id_toko = toko.id');
        $result = $this->db->where('kategori.id_toko', $idtok)->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function tampilbarang($idtok)
    {
        $this->db->select('barang.*,toko.*,kategori.nama_kategori');
        $this->db->from('kategori');
        $this->db->join('barang', 'barang.id_kategori = kategori.id');
        $this->db->join('toko', 'kategori.id_toko = toko.id');
        $result = $this->db->where('kategori.id', $idtok)->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    // public function tampil_data($idtok)
    // {
    //     $this->db->select('kategori.*');
    //     $this->db->from('toko');
    //     $this->db->join('kategori', 'kategori.id_toko = toko.id');
    //     $result = $this->db->where('kategori.id_toko', $idtok)->get();
    //     if ($result->num_rows() > 0) {
    //         return $result->result();
    //     } else {
    //         return false;
    //     }
    // }
}
