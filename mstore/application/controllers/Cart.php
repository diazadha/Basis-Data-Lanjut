<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Cart';
        $data['barang'] = $this->Model_barang->tampil_data()->result();
        $this->load->view('templates_marketplace/header', $data);
        $this->load->view('templates_marketplace/sidebar');
        $this->load->view('templates_marketplace/topbar_marketplace');
        $this->load->view('marketplace/cart', $data);
        $this->load->view('templates_marketplace/footer');
    }
}
