<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_toko extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['pesanan'] = $this->Model_invoice->pesanan_baru();
        $data['admintoko'] = $this->db->get_where('admintoko', ['email' =>
        $this->session->userdata('email')])->row_array();
        //$data['toko'] = $this->db->get('toko')->row_array();
        $data['toko'] = $this->db->get_where('toko', ['id' =>  $data['admintoko']['id_toko']])->row_array();
        $id_toko = $this->db->get_where('toko', ['id' =>  $data['admintoko']['id_toko']])->row_array();
        $data['report'] = $this->Model_report->dashboard_toko2($id_toko['id']);
        $data['orders'] = $this->Model_report->jumlah_orders($id_toko['id']);
        $data['databarang'] = $this->Model_report->data_barang($id_toko['id']);
        $data['jumlahadmin'] = $this->Model_report->jumlah_admin($id_toko['id']);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_toko', $data);
        $this->load->view('templates/topbar_admintoko', $data);
        $this->load->view('dashboard/toko', $data);
        $this->load->view('templates/footer', $data);
    }
}
