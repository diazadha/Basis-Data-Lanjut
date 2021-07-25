<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_marketplace extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['toko'] = $this->db->get('toko')->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_marketplace', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('profil/marketplace', $data);
        $this->load->view('templates/footer', $data);
    }
}
