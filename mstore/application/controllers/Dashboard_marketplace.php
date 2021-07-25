<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_marketplace extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['report'] = $this->Model_report->dashboard_marketplace();
        $data['order'] = $this->Model_report->jumlah_orders_marketplace();
        $data['databarang'] = $this->Model_report->data_barang_marketplace();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_marketplace', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('dashboard/marketplace', $data);
        $this->load->view('templates/footer', $data);
    }
}
