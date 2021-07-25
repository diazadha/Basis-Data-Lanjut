<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_report extends CI_Model
{
    // CARA1
    public function income($dari, $sampe, $toko)
    {
        $query = "SELECT year(invoice.batas_bayar) as `tahun`,month(invoice.batas_bayar) as `bulan`, `orders`.`harga`*`orders`.`jumlah` as `penghasilan`, `orders`.`ongkir` as `ongkir`
        FROM `invoice`, `orders`
        where  `orders`.`id_invoice` = `invoice`.`id` and `orders`.`id_toko` = $toko and `batas_bayar` between $dari and $sampe GROUP by year(tahun), month(bulan)
        ";
        return $this->db->query($query)->result_array();
    }
    //CARA2
    public function income2($dari, $sampe)
    {
        $this->db->select('year(invoice.batas_bayar) as tahun, month(invoice.batas_bayar) as bulan,sum(`orders`.`harga`*`orders`.`jumlah`) as `penghasilan`, toko.nama_toko');
        $this->db->from('invoice');
        $this->db->join('orders', 'orders.id_invoice = invoice.id');
        $this->db->join('toko', 'toko.id = invoice.id_toko');
        $this->db->where('batas_bayar >=', $dari);
        $this->db->where('batas_bayar <=', $sampe);
        $this->db->group_by(' year(invoice.batas_bayar), month(invoice.batas_bayar), toko.nama_toko');
        $this->db->order_by('year(invoice.batas_bayar)', 'DESC');
        return $this->db->get();
    }

    public function income_kategori($dari, $sampai, $kategori)
    {
        $this->db->select('year(invoice.batas_bayar) as Tahun,month(invoice.batas_bayar) as Bulan, kategori.nama_kategori as namakategori,SUM(orders.jumlah) as Terjual, SUM(orders.harga) as total_harga, SUM(orders.jumlah*harga) as penghasilan, toko.nama_toko as namatoko');
        $this->db->from('invoice');
        $this->db->join('orders', 'orders.id_invoice = invoice.id');
        $this->db->join('barang', 'barang.id_barang = orders.id_barang');
        $this->db->join('kategori', 'kategori.id = barang.id_kategori');
        $this->db->join('toko', 'toko.id = invoice.id_toko');
        $this->db->where('kategori.id =', $kategori);
        $this->db->where('invoice.batas_bayar >=', $dari);
        $this->db->where('invoice.batas_bayar <=', $sampai);
        $this->db->group_by('year(invoice.batas_bayar),month(invoice.batas_bayar)');
        return $this->db->get();
    }
    public function dashboard_toko2($id_toko)
    {
        $monthnow = date('m');
        $yearnow = date('Y');
        $query = "SELECT 
        sum(`orders`.`harga`*`orders`.`jumlah`) as `penghasilan`
        FROM `invoice`, `orders`, `toko`
        where  `orders`.`id_invoice` = `invoice`.`id` 
        and `toko`.`id` = `invoice`.`id_toko` 
        and `toko`.`id` = $id_toko
        AND month(batas_bayar)='$monthnow' 
        AND year(batas_bayar)='$yearnow'";
        return $this->db->query($query)->result_array();
    }

    public function jumlah_orders($id_toko)
    {
        $monthnow = date('m');
        $yearnow = date('Y');
        $query = "SELECT 
        count(`invoice`.`id`) as total 
        FROM invoice, toko
        WHERE invoice.id_toko = toko.id
        AND month(batas_bayar)='$monthnow' 
        AND year(batas_bayar)='$yearnow'
        AND invoice.id_toko = $id_toko";
        return $this->db->query($query)->result_array();
    }

    public function jumlah_orders_marketplace()
    {
        $monthnow = date('m');
        $yearnow = date('Y');
        $query = "SELECT 
        count(`invoice`.`id`) as total 
        FROM invoice 
        WHERE 
        month(batas_bayar)='$monthnow' AND
        year(batas_bayar)='$yearnow'";
        return $this->db->query($query)->result_array();
    }

    public function data_barang($id_toko)
    {
        $query = "SELECT count(`barang`.`id_barang`) as total
        FROM `barang`, `toko`
        WHERE `toko`.`id` = $id_toko AND `barang`.`id_toko` = `toko`.`id`";
        return $this->db->query($query)->result_array();
    }

    public function jumlah_admin($id_toko)
    {
        $query = "SELECT count(`admintoko`.`id_toko`) as total
        FROM `admintoko`
        WHERE `admintoko`.`id_toko`= $id_toko";
        return $this->db->query($query)->result_array();
    }

    public function data_barang_marketplace()
    {
        $query = "SELECT count(`barang`.`id_barang`) as total
        FROM `barang`, `toko`";
        return $this->db->query($query)->result_array();
    }

    public function dashboard_marketplace()
    {
        $monthnow = date('m');
        $yearnow = date('Y');
        $query = "SELECT 
        sum(`orders`.`harga`*`orders`.`jumlah`) as `penghasilan`, toko.nama_toko
        FROM `invoice`, `orders`, `toko`
        where  `orders`.`id_invoice` = `invoice`.`id` 
        and `toko`.`id` = `invoice`.`id_toko` 
        AND month(batas_bayar)='$monthnow' 
        AND year(batas_bayar)='$yearnow'
        GROUP BY toko.nama_toko";
        return $this->db->query($query)->result_array();
    }

    public function toko($toko)
    {
        $this->db->select('nama_toko');
        $this->db->from('toko');
        $this->db->where('id =', $toko);
        return $this->db->get();
    }

    public function favourite_result($dari, $sampai, $kategori)
    {
        $this->db->select('invoice.batas_bayar as tanggal, orders.nama_barang, orders.harga, kategori.nama_kategori, toko.nama_toko, orders.harga as penghasilan, orders.jumlah as terjual, barang.stok_barang');
        $this->db->from('invoice');
        $this->db->join('orders', 'orders.id_invoice = invoice.id');
        $this->db->join('barang', 'barang.id_barang = orders.id_barang');
        $this->db->join('kategori', 'kategori.id = barang.id_kategori');
        $this->db->join('toko', 'toko.id = invoice.id_toko');
        $this->db->where('kategori.id =', $kategori);
        $this->db->where('invoice.batas_bayar >=', $dari);
        $this->db->where('invoice.batas_bayar <=', $sampai);
        $this->db->order_by('terjual', 'DESC');
        return $this->db->get();
    }
    public function customer_result1($toko)
    {
        $this->db->select('invoice.nama_pemesan, invoice.email, invoice.hp_pemesan, dayname(invoice.batas_bayar), COUNT(orders.id_invoice) as Jumlah_Transaksi, toko.nama_toko');
        $this->db->from('invoice');
        $this->db->join('toko', 'toko.id = invoice.id_toko');
        $this->db->join('orders', 'orders.id_invoice = invoice.id');
        $this->db->where('toko.id =', $toko);
        $this->db->group_by('email', 'month(batas_bayar)');
        $this->db->order_by('Jumlah_Transaksi', 'DESC');
        return $this->db->get();
    }

    public function customer_result_fix($dari, $sampai, $toko)
    {
        $this->db->select('invoice.nama_pemesan, invoice.email, invoice.hp_pemesan, COUNT(invoice.email) as Jumlah_Transaksi, toko.nama_toko, invoice.batas_bayar as tanggal');
        $this->db->from('invoice');
        $this->db->join('toko', 'toko.id = invoice.id_toko');
        $this->db->join('orders', 'orders.id_invoice = invoice.id');
        $this->db->where('toko.id =', $toko);
        $this->db->where('invoice.batas_bayar >=', $dari);
        $this->db->where('invoice.batas_bayar <=', $sampai);
        $this->db->group_by('email', 'month(batas_bayar)');
        $this->db->order_by('Jumlah_Transaksi', 'DESC');
        return $this->db->get();
    }


    public function customer_result($dari, $sampai, $toko)
    {
        $query = "SELECT `invoice`.`nama_pemesan`, `invoice`.`email`, `invoice`.`hp_pemesan`, COUNT(`invoice`.`email`) as Jumlah_Transaksi, `toko`.`nama_toko`, `invoice`.`batas_bayar` as tanggal               
        FROM `orders`, `invoice`,`toko`                 
        WHERE `invoice`.`id` = `orders`.`id_invoice` 
        AND `invoice`.`id_toko` = `toko`.`id` 
        AND `toko`.`id` = $toko
        AND `invoice`.`batas_bayar` between $dari and $sampai
        GROUP BY `email` 
        ORDER BY `Jumlah_Transaksi` DESC ";
        return $this->db->query($query)->result_array();
    }
}
