<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategoribarang extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Kategori Barang';
        $data['pesanan'] = $this->Model_invoice->pesanan_baru();
        $data['admintoko'] = $this->db->get_where('admintoko', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $data['toko'] = $this->db->get_where('toko', ['id' =>  $data['admintoko']['id_toko']])->row_array();
        $data['kategori'] = $this->db->get_where('kategori', ['id_toko' =>  $data['toko']['id']])->result_array();

        //$data['kategori'] = $this->Model_kategori->tampil_kategori()->result();
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_toko', $data);
            $this->load->view('templates/topbar_admintoko', $data);
            $this->load->view('manajemen_toko/kategori', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->db->insert('kategori', ['nama_kategori' => $this->input->post('nama_kategori')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New category added!</div>');
            redirect('toko/kategoribarang/index');
        }
    }

    public function tambah_kategori()
    {
        $nama_kategori    = $this->input->post('nama_kategori');
        $keterangan    = $this->input->post('keterangan');
        $id_toko    = $this->input->post('id_toko');
        $data  = array(
            'nama_kategori'   => $nama_kategori,
            'keterangan'   => $keterangan,
            'id_toko'   => $id_toko,
        );
        $this->Model_kategori->tambah_kategori($data, 'kategori');
        redirect('toko/kategoribarang/index');
    }

    public function deletekategori($id)
    {
        $where = array('id' => $id);
        $this->Model_kategori->hapus_kategori($where, 'kategori');
        redirect('toko/kategoribarang/index');
    }

    // public function edit($id)
    // {
    //     $where = array('id' => $id);
    //     $data['kategori'] = $this->Model_kategori->edit_kategori($where, 'kategori');
    // }

    public function edit()
    {
        $input_id = $_POST['id'];
        $input_nama = $_POST['nama_kategori'];
        $input_keterangan = $_POST['keterangan'];
        $query = "UPDATE `kategori` SET `nama_kategori` = '$input_nama', `keterangan` = '$input_keterangan' WHERE `kategori`.`id` ='$input_id'";
        $this->db->query($query);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Category Updated!</div>');
        redirect('toko/kategoribarang');
    }

    public function geteditkategori()
    {
        $this->load->model('Model_kategori', 'kategori');
        echo json_encode($this->kategori->geteditkategoriByID($_POST['id']));
    }


    public function update()
    {
        $id = $this->input->post('id');
        $nama_kategori = $this->input->post('nama_kategori');

        $data = array(
            'nama_kategori' => $nama_kategori,
        );

        $where = array(
            'id' => $id
        );
        $this->Model_barang->update_kategori($where, $data, 'kategori');
        redirect('toko/kategoribarang/index');
    }

    // public function store()
    // {
    //     //kategorii detail
    // }
}
