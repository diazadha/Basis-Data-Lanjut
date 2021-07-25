<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
    public function stock_in_data()
    {
        $data['title'] = 'Stock In Product';
        $data['admintoko'] = $this->db->get_where('admintoko', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['kategori'] = $this->Model_kategori->tampil_kategori()->result();
        $data['barang'] = $this->Model_barang->tampil_data()->result();
        //$data['toko'] = $this->db->get('toko')->row_array();
        $data['toko'] = $this->db->get_where('toko', ['id' =>  $data['admintoko']['id_toko']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_toko', $data);
        $this->load->view('templates/topbar_admintoko', $data);
        $this->load->view('manajemen_toko/stock_in_data', $data);
        $this->load->view('templates/footer');
    }

    public function stock_in_add()
    {
        $data['barang'] = $this->Model_barang->tampil_data()->result();


        echo "stok in add";
    }

    public function process()
    {
        if (isset($_POST['in_add'])) {
            echo "proses stock in add";
        }
    }
}
