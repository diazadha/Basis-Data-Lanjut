<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Metode Bayar';
        $data['pesanan'] = $this->Model_invoice->pesanan_baru();
        $data['admintoko'] = $this->db->get_where('admintoko', ['email' =>
        $this->session->userdata('email')])->row_array();
        //$data['toko'] = $this->db->get('toko')->row_array();
        $data['toko'] = $this->db->get_where('toko', ['id' =>  $data['admintoko']['id_toko']])->row_array();
        //$data['pembayaran'] = $this->db->get('pembayaran')->result_array();
        $data['pembayaran'] = $this->db->get_where('pembayaran', ['id_toko' =>  $data['toko']['id']])->result_array();
        $this->form_validation->set_rules('metodebayar', 'Paymnet Method', 'required|trim');
        $this->form_validation->set_rules('mitrabayar', 'Partner Method', 'required|trim');
        $this->form_validation->set_rules('rekening', 'Account Number', 'required|trim');
        $this->form_validation->set_rules('pemilik', 'Account Holder', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_toko', $data);
            $this->load->view('templates/topbar_admintoko');
            $this->load->view('manajemen_toko/payment', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'metode_bayar' => $this->input->post('metodebayar'),
                'mitra_bayar' => $this->input->post('mitrabayar'),
                'rekening' => $this->input->post('rekening'),
                'pemilik' => $this->input->post('pemilik'),
                'id_toko' => $this->input->post('id_toko'),
            ];
            $this->db->insert('pembayaran', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Payment Added!</div>');
            redirect('toko/payment');
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM `pembayaran` WHERE `pembayaran`.`id` = $id";
        $this->db->query($query);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success to Delete!</div>');
        redirect('toko/payment');
    }

    public function geteditbayar()
    {
        $this->load->model('Bayar_model', 'payment');

        echo json_encode($this->payment->getpaymentById($_POST['id']));
    }

    public function editbayar()
    {
        $input_id = $_POST['id'];
        $input_metode = $_POST['metodebayar'];
        $input_mitra = $_POST['mitrabayar'];
        $input_rekening = $_POST['rekening'];
        $input_pemilik = $_POST['pemilik'];
        $query = "UPDATE `pembayaran` SET `metode_bayar` = '$input_metode', `mitra_bayar` = '$input_mitra', `rekening` = '$input_rekening', `pemilik` = '$input_pemilik' WHERE `pembayaran`.`id` ='$input_id'";
        $this->db->query($query);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Payment Updated!</div>');
        redirect('toko/payment');
    }
}
