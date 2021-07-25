<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Shop extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Shop';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        $data['barang'] = $this->Model_barang->tampil_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_marketplace', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('shop/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
