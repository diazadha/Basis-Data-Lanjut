<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_barang extends CI_Model
{
    public function tampil_data($diskon = 0)
    {
        $this->db->select('barang.*');
        $this->db->from('barang');
        $this->db->where('diskon !=', $diskon);

        $query = $this->db->get();
        return $query;
    }
    public function tampil_barang($diskon = 0)
    {
        $this->db->select('barang.*,toko.nama_toko as toko');
        $this->db->from('barang');
        $this->db->join('toko', 'toko.id = barang.id_toko');
        $this->db->where('diskon =', $diskon);
        $query = $this->db->get();
        return $query;
    }

    public function samain_email($id_barang)
    {
        $this->db->select('barang.admin_toko');
        $this->db->from('barang');
        $result = $this->db->where('barang.id_barang', $id_barang)
            ->get();
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function data_barang()
    {
        $this->db->select('barang.id_barang,barang.nama_barang, kategori.nama_kategori, barang.harga_barang, barang.stok_barang, barang.foto_barang, barang.keterangan,barang.diskon,barang.deskripsi_barang, barang.admin_toko');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id = barang.id_kategori');
        $this->db->join('toko', 'toko.id = barang.id_toko');
        $this->db->join('admintoko', 'admintoko.id_toko = toko.id');
        $this->db->where('admintoko.email', $this->session->userdata('email'));
        return $this->db->get();
    }
    public function detail_toko($id_tk)
    {
        $this->db->select('barang.*,toko.*');
        $this->db->from('barang');
        $this->db->join('toko', 'toko.id = barang.id_toko');
        $result = $this->db->where('barang.id_toko', $id_tk)->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
    public function getbarangkategori()
    {
        $query = "SELECT `kategori`.`nama_kategori`
        FROM `barang`, `kategori`, `toko`
        where  `barang`.`id_kategori` = `kategori`.`id` and `barang`.`id_toko` = `toko`.`id`
        group by `kategori`.`nama_kategori`
        ";
        return $this->db->query($query)->result_array();
    }

    public function getbarangsesuaitoko()
    {
        $query = "SELECT `nama_barang`, `kategori`.`nama_kategori`,`harga_barang`,`stok_barang`,`toko.nama_toko`
                    FROM `barang`,`kategori`,`toko`
                    WHERE barang.id_kategori=kategori.id 
                    AND kategori.id_toko=toko.id ";
        return $this->db->query($query)->result_array();
    }

    public function detail_brg($id_brg)
    {
        $this->db->select('barang.*,toko.*');
        $this->db->from('barang');
        $this->db->join('toko', 'toko.id = barang.id_toko');
        $result = $this->db->where('id_barang', $id_brg)->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function armada()
    {
        $this->db->select('armada.*');
        $this->db->from('armada');
        $this->db->join('toko', 'toko.id = armada.id_toko');
        $this->db->where('toko.id', $this->session->userdata('id_toko'));
        return $this->db->get();
    }

    public function payment()
    {
        $this->db->select('pembayaran.*');
        $this->db->from('pembayaran');
        $this->db->join('toko', 'toko.id = pembayaran.id_toko');
        $this->db->where('toko.id', $this->session->userdata('id_toko'));
        return $this->db->get();
    }

    public function find($id)
    {
        $this->db->select('barang.*,toko.nama_toko,toko.id,toko.kodearea');
        $this->db->from('barang');
        $this->db->join('toko', 'toko.id = barang.id_toko');
        $result = $this->db->where('barang.id_barang', $id)
            ->get();
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }

    public function maxid()
    {
        $query = "SELECT MAX(`toko`.`id`) as `max` FROM  `toko`";
        return $this->db->query($query)->row_array();
    }

    // nampil pembayaran
    // select DISTINCT pembayaran.mitra_bayar,pembayaran.rekening, pembayaran.pemilik
    // from barang
    // join pembayaran on pembayaran.id_toko = barang.id_toko
    // where barang.id_toko = 3

    // nampil armada
    // select DISTINCT armada.nama_armada, armada.harga_layanan
    // from barang
    // join armada on armada.id_toko = barang.id_toko
    // where barang.id_toko = 3

    // public function detail_kurir()
    // {
    //     $this->db->select('armada.nama_armada, armada.layanan, toko.nama_toko');
    //     $this->db->from('armada');
    //     $this->db->join('toko', 'toko.id = armada.id');
    //     $result = $this->db->get();
    //     return $result->result();
    // }

    public function tambah_barang($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_barang($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }


    public function hapus_barang($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function getKeyword($keyword)
    {
        $this->db->select('barang.*, toko.nama_toko');
        $this->db->from('barang');
        $this->db->join('toko', 'toko.id = barang.id_toko');
        $this->db->like('barang.nama_barang', $keyword);
        $this->db->or_like('toko.nama_toko', $keyword);
        return $this->db->get()->result();
    }
    public function getKeyworddiskon($key)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->like('nama_barang', $key);
        $this->db->or_like('deskripsi_barang', $key);
        $this->db->or_like('keterangan', $key);
        $this->db->or_like('id_kategori', $key);
        $this->db->or_like('id_toko', $key);
        return $this->db->get()->result();
    }

    public function tampil_kurir($kurir)
    {
        $this->db->select('armada.*');
        $this->db->from('armada');
        $this->db->join('toko', 'armada.id_toko = toko.id');
        $this->db->join('barang', 'barang.id_toko = toko.id');
        $result = $this->db->where('barang.id_barang', $kurir)->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
