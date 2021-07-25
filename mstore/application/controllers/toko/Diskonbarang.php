<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diskonbarang extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Diskon Barang';
        $data['admintoko'] = $this->db->get_where('admintoko', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['toko'] = $this->db->get('toko')->row_array();
        $data['diskon'] = $this->Model_diskon->getDiscount_code();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_toko', $data);
        $this->load->view('templates/topbar_admintoko', $data);
        $this->load->view('manajemen_toko/diskonbarang', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_diskon()
    {
        $data['title'] = 'Diskon Barang';
        $data['admintoko'] = $this->db->get_where('admintoko', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['toko'] = $this->db->get('toko')->row_array();
        $data['diskon'] = $this->Model_diskon->getDiscount_code();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_toko', $data);
        $this->load->view('templates/topbar_admintoko', $data);
        $this->load->view('manajemen_toko/tambahdiskon', $data);
        $this->load->view('templates/footer', $data);
    }

    public function kode_diskon()
    {
        $this->load->library('form_validation');
        //error message
        $this->form_validation->set_rules('name', 'Nama', 'trim|required');
        $this->form_validation->set_rules('code', 'Kode', 'trim|required');

        // if ($this->form_validation->run() = false) {
        $data['name'] = $this->input->post['name'];
        $data['code'] = $this->input->post['code'];
        $data['startdate'] = $this->input->post['startdate'];
        $data['enddate'] = $this->input->post['enddate'];
        $data['discount'] = $this->input->post['discount'];
        $data['percent'] = $this->input->post['percent'];

        $pagedata  = array(
            'data'   => $data
        );
        $this->load->view('templates/header', $pagedata);
        $this->load->view('templates/sidebar_toko', $pagedata);
        $this->load->view('templates/topbar_admintoko', $pagedata);
        $this->load->view('manajemen_toko/diskoneror', $pagedata);
        $this->load->view('templates/footer', $pagedata);
        // } else {
        $discountcode = $this->model_diskon->get_allcodes();
        $discountcodecheck = $this->model_diskon->check_codes();

        $code = $this->input->post('code');
        $code2 = strtolower($code);
        $chars = array(
            ',', '>', '<', '$', '%', '&', '*', '#', '@', ':', ';', '-', '+', '='
        );

        $change1 = '';
        $code3 = str_replace($chars, $change1, $code2);
        $check2 = array('code' => $code3);

        if (in_array($check2, $discountcodecheck, true)) {
            $n = 2;
            foreach ($discountcode as $dc) {
                $finalcodes = explode('-', $dc['code']);
                if (isset($finalcodes['0'])) {
                    $finalcodes = $finalcodes['0'];
                } else {
                    $finalcodes = $dc['code'];
                }
                if ($code3 != $finalcodes) {
                    $check2 = 2;
                } else {
                    $check2 = $n++;
                }
            }
            $newcode = $code3 . '-' . $check2;
        } else {
            $newcode = $code3;
        }

        $data = array(
            'name' => $this->input->post('name'),
            'code' => $this->$newcode,
            'startdate' => $this->input->post('startdate'),
            'enddate' => $this->input->post('enddate'),
            'discount' => $this->input->post('discount'),
            'percent' => $this->input->post('percent')
        );
        $this->model_diskon->add_record($data);
        redirect('Diskonbarang/index');
        // }
    }
}
