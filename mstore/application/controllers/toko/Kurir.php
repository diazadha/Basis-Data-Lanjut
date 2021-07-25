<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurir extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Kurir';
        $data['pesanan'] = $this->Model_invoice->pesanan_baru();
        $data['admintoko'] = $this->db->get_where('admintoko', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['toko'] = $this->db->get_where('toko', ['id' =>  $data['admintoko']['id_toko']])->row_array();
        $data['armada'] = $this->db->get_where('armada', ['id_toko' =>  $data['toko']['id']])->result_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('layanan', 'Service', 'required');
        $this->form_validation->set_rules('hargalayanan', 'Price', 'required');
        $this->form_validation->set_rules('namaarmada', 'Courier', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_toko', $data);
            $this->load->view('templates/topbar_admintoko', $data);
            $this->load->view('manajemen_toko/kurir', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'layanan' => $this->input->post('layanan'),
                'harga_layanan' => $this->input->post('hargalayanan'),
                'nama_armada' => $this->input->post('namaarmada'),
                'id_toko' => $this->input->post('id_toko'),
            ];
            $this->db->insert('armada', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Courier Added!</div>');
            redirect('toko/kurir');
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM `armada` WHERE `armada`.`id` = $id";
        $this->db->query($query);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success to Delete!</div>');
        redirect('toko/kurir');
    }

    public function geteditcourier()
    {
        $this->load->model('Courier_model', 'courier');

        echo json_encode($this->courier->getcourierById($_POST['id']));
    }

    public function editcourier()
    {
        $input_id = $_POST['id'];
        $input_layanan = $_POST['layanan'];
        $input_harga_layanan = $_POST['hargalayanan'];
        $input_nama_armada = $_POST['namaarmada'];
        $query = "UPDATE `armada` SET `layanan` = '$input_layanan', `harga_layanan` = '$input_harga_layanan', `nama_armada` = '$input_nama_armada' WHERE `armada`.`id` ='$input_id'";
        $this->db->query($query);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Payment Updated!</div>');
        redirect('toko/kurir');
    }
}
