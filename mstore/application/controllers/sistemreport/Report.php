<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Report extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Report';
        $data['toko'] = $this->db->get('toko')->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['tampil'] = $this->Model_store->tampil_data()->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_marketplace', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('manajemen_marketplace/report_1', $data);
        $this->load->view('templates/footer', $data);
    }

    public function report_result($id)
    {
        $data['title'] = 'Report';
        $data['toko'] = $this->db->get('toko')->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['jumlahadmin'] = $this->Model_store->admin_toko($id)->result();
        $data['detailtoko'] = $this->Model_store->detail_toko($id)->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_marketplace', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('manajemen_marketplace/report_toko_result', $data);
        $this->load->view('templates/footer', $data);
    }

    public function income()
    {
        $data['title'] = 'Report';
        $data['toko'] = $this->db->get('toko')->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['tampil'] = $this->Model_store->tampil_data()->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kategorisemua'] = $this->Model_kategori->kategorisemua()->result();
        $data['tokosemua'] = $this->Model_store->tampil_namatoko()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_marketplace', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('manajemen_marketplace/income', $data);
        $this->load->view('templates/footer', $data);
    }
    public function proses_income()
    {
        $data['title'] = 'Report';
        $data['toko'] = $this->db->get('toko')->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['tampil'] = $this->Model_store->tampil_data()->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tokosemua'] = $this->Model_store->tampil_namatoko()->result();

        $dari = $this->input->post('dari');
        $sampe = $this->input->post('sampai');
        $data['hasil'] = $this->Model_report->income2($dari, $sampe)->result();
        $sesi = array(
            'dari' => $dari,
            'sampai' => $sampe,
        );
        $this->session->set_userdata($sesi);

        //$data['daritoko'] = $this->Model_report->toko($toko)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_marketplace', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('manajemen_marketplace/income_result', $data, $sesi);
        $this->load->view('templates/footer', $data);
    }


    public function income_kategori()
    {
        $data['title'] = 'Report';
        $data['toko'] = $this->db->get('toko')->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['tampil'] = $this->Model_store->tampil_data()->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kategoritoko'] = $this->Model_kategori->kategoritoko()->result();
        $data['namatoko'] = $this->db->get('toko')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_marketplace', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('manajemen_marketplace/income_kategori', $data);
        $this->load->view('templates/footer', $data);
    }

    public function proses_income_kategori()
    {
        $data['title'] = 'Report';
        $data['toko'] = $this->db->get('toko')->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['tampil'] = $this->Model_store->tampil_data()->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kategoritoko'] = $this->Model_kategori->kategoritoko()->result();
        $data['namatoko1'] = $this->db->get('toko')->result();

        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $kategori = $this->input->post('kategori');
        $data['namatoko'] = $this->Model_kategori->idnamakategori($kategori)->result();
        $data['hasil'] = $this->Model_report->income_kategori($dari, $sampai, $kategori)->result();
        $sesikategori = array(
            'dari' => $dari,
            'sampai' => $sampai,
        );
        $this->session->set_userdata($sesikategori);

        // $data['daritoko'] = $this->Model_report->toko()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_marketplace', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('manajemen_marketplace/income_kategori_result', $data);
        $this->load->view('templates/footer', $data);
    }

    public function favourite()
    {
        $data['title'] = 'Report';
        $data['toko'] = $this->db->get('toko')->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['tampil'] = $this->Model_store->tampil_data()->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        //$data['toko'] = $this->Model_kategori->toko()->result();
        $data['kategoritoko'] = $this->Model_kategori->kategoritoko()->result();
        $data['namatoko'] = $this->db->get('toko')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_marketplace', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('manajemen_marketplace/favourite', $data);
        $this->load->view('templates/footer', $data);
    }
    public function favourite_result()
    {
        $data['title'] = 'Report';
        $data['toko'] = $this->db->get('toko')->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['tampil'] = $this->Model_store->tampil_data()->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['toko'] = $this->Model_kategori->toko()->result();
        $data['namatoko1'] = $this->db->get('toko')->result();

        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $kategori = $this->input->post('kategori');
        $data['namatoko'] = $this->Model_kategori->idnamakategori($kategori)->result();
        $data['hasil'] = $this->Model_report->favourite_result($dari, $sampai, $kategori)->result();
        $data['kategoritoko'] = $this->Model_kategori->kategoritoko()->result();
        $sesifavourite = array(
            'darivaf' => $dari,
            'sampaivaf' => $sampai,
        );
        $this->session->set_userdata($sesifavourite);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_marketplace', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('manajemen_marketplace/favourite_result', $data);
        $this->load->view('templates/footer', $data);
    }
    public function customer()
    {
        $data['title'] = 'Report';
        $data['toko'] = $this->db->get('toko')->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['tampil'] = $this->Model_store->tampil_data()->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tokosemua'] = $this->Model_store->tampil_namatoko()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_marketplace', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('manajemen_marketplace/customer', $data);
        $this->load->view('templates/footer', $data);
    }
    public function customer_result()
    {
        $data['title'] = 'Report';
        $data['toko'] = $this->db->get('toko')->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['tampil'] = $this->Model_store->tampil_data()->result();
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tokosemua'] = $this->Model_store->tampil_namatoko()->result();
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $toko = $this->input->post('toko');

        $data['hasil'] = $this->Model_report->customer_result_fix($dari, $sampai, $toko)->result();
        $data['daritoko'] = $this->Model_report->toko($toko)->result();
        $sesicustomer = array(
            'dari' => $dari,
            'sampai' => $sampai,
        );
        $this->session->set_userdata($sesicustomer);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_marketplace', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('manajemen_marketplace/customer_result', $data);
        $this->load->view('templates/footer', $data);
    }

    public function fetch_kategori()
    {
        if ($this->input->post('id_toko')) {
            echo $this->Model_report->kategori($this->input->post('id_toko'));
        }
    }
}
