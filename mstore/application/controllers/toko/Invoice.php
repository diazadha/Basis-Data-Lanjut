<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Invoice extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Data Pesanan';
        $data['admintoko'] = $this->db->get_where('admintoko', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['barang'] = $this->Model_barang->tampil_data()->result();
        $data['pesanan'] = $this->Model_invoice->pesanan_baru();
        //$data['toko'] = $this->db->get('toko')->row_array();
        $data['toko'] = $this->db->get_where('toko', ['id' =>  $data['admintoko']['id_toko']])->row_array();
        $idtoko = $this->db->get_where('toko', ['id' =>  $data['admintoko']['id_toko']])->row_array();
        $id_toko = $idtoko['id'];
        //$data['invoice'] = $this->Model_invoice->tampil_data();
        //$data['invoice'] = $this->db->get_where('invoice', ['id_toko' =>  $data['toko']['id']])->result_array();
        $data['invoice'] = $this->Model_invoice->data_invoice_toko($id_toko);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_toko', $data);
        $this->load->view('templates/topbar_admintoko', $data);
        $this->load->view('manajemen_toko/invoice', $data);
        $this->load->view('templates/footer', $data);
    }
    public function detail($id_invoice)
    {
        $data['title'] = 'Detail Pesanan';
        $data['admintoko'] = $this->db->get_where('admintoko', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['pesanan'] = $this->Model_invoice->pesanan_baru();
        $data['barang'] = $this->Model_barang->tampil_data()->result();
        //$data['toko'] = $this->db->get('toko')->row_array();

        $data['toko'] = $this->db->get_where('toko', ['id' =>  $data['admintoko']['id_toko']])->row_array();
        // $id = $this->input->post('id_invoice');
        $data['invoice'] = $this->Model_invoice->getId_invoice($id_invoice);
        // $data['pesanan'] = $this->Model_invoice->getId_order($id_invoice);
        // $data['pemesan'] = $this->Model_invoice->detail_pemesan($id_invoice);
        $data['statuspesanan'] = $this->Model_invoice->status_pesanan($id_invoice);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_toko', $data);
        $this->load->view('templates/topbar_admintoko', $data);
        $this->load->view('manajemen_toko/detail_invoice', $data);
        $this->load->view('templates_marketplace/footer', $data);
    }
    public function status()
    {
        $data['title'] = 'Data Pesanan';
        $data['admintoko'] = $this->db->get_where('admintoko', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['barang'] = $this->Model_barang->tampil_data()->result();
        $data['toko'] = $this->db->get_where('toko', ['id' =>  $data['admintoko']['id_toko']])->row_array();
        $data['pesanan'] = $this->Model_invoice->pesanan_baru();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_toko', $data);
        $this->load->view('templates/topbar_admintoko', $data);
        $this->load->view('manajemen_toko/status_pesanan', $data);
        $this->load->view('templates_marketplace/footer', $data);
    }

    public function pdf($id_invoice)
    {
        $this->load->library('dompdf_gen');
        $data['export'] = $this->Model_invoice->exportinvoice($id_invoice);
        $this->load->view('manajemen_toko/pdf', $data);
        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Data_Pesanan.pdf", array('Attachment' => 0));
    }
    public function update_bukti_bayar()
    {
        $status_bayar = $this->input->post('status_bayar');
        $id_invoice = $this->input->post('id_invoice');
        $data  = array(
            'status_bayar' =>  $status_bayar,
        );
        $where = array(
            'id_invoice' => $id_invoice,
        );
        $this->Model_profil->update_img($where, $data, 'status_transaksi');
        redirect('toko/invoice/detail/' . $id_invoice);
    }
    public function update_prosespesanan()
    {
        $proses_pesanan = $this->input->post('proses_pesanan');
        $id_invoice = $this->input->post('id_invoice');
        $data  = array(
            'status_pesanan' =>  $proses_pesanan,
        );
        $where = array(
            'id_invoice' => $id_invoice,
        );
        $this->Model_profil->update_img($where, $data, 'status_transaksi');
        redirect('toko/invoice/detail/' . $id_invoice);
    }
    public function update_resi()
    {
        $resi_pengiriman = $this->input->post('resi_pengiriman');
        $id_invoice = $this->input->post('id_invoice');
        $data  = array(
            'resi_kurir' =>  $resi_pengiriman,
        );
        $where = array(
            'id_invoice' => $id_invoice,
        );
        $this->Model_profil->update_img($where, $data, 'status_transaksi');
        redirect('toko/invoice/detail/' . $id_invoice);
    }
}
