<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pesanan extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Pesanan Terbaru';
        $data['admintoko'] = $this->db->get_where('admintoko', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['toko'] = $this->db->get_where('toko', ['id' =>  $data['admintoko']['id_toko']])->row_array();
        $data['pesanan'] = $this->Model_invoice->pesanan_baru();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_toko', $data);
        $this->load->view('templates/topbar_admintoko', $data);
        $this->load->view('manajemen_toko/pesanan.php', $data);
        $this->load->view('templates/footer', $data);
    }
}
