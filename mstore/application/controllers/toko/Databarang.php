<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Databarang extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Data Barang';
        $data['pesanan'] = $this->Model_invoice->pesanan_baru();
        $data['admintoko'] = $this->db->get_where('admintoko', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['barang'] = $this->Model_barang->data_barang()->result();
        $this->load->model('Model_barang', 'barang');
        $data['toko'] = $this->db->get_where('toko', ['id' =>  $data['admintoko']['id_toko']])->row_array();
        $data['kategori'] = $this->db->get_where('kategori', ['id_toko' =>  $data['toko']['id']])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_toko', $data);
        $this->load->view('templates/topbar_admintoko', $data);
        $this->load->view('manajemen_toko/databarang', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_aksi()
    {
        // $this->load->model('Model_kategori', 'nama_kategori');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('harga_barang', 'Harga Barang', 'required');
        $this->form_validation->set_rules('stok_barang', 'Stok Barang', 'required');
        $this->form_validation->set_rules('deskripsi_barang', 'Deskripsi Barang', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan Barang', 'required');

        $nama_barang    = $this->input->post('nama_barang');
        $keterangan    = $this->input->post('keterangan');
        $harga_barang    = $this->input->post('harga_barang');
        $diskon     = $this->input->post('diskon');
        $stok_barang    = $this->input->post('stok_barang');
        $deskripsi_barang = $this->input->post('deskripsi_barang');
        $foto_barang    = $_FILES['foto_barang']['name'];
        if ($foto_barang = '') {
        } else {
            $config['upload_path'] = './uploads/barang';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_barang')) {
                echo "Gambar gagal di upload!";
            } else {
                $foto_barang = $this->upload->data('file_name');
            }
        }
        $hargadiskon = $harga_barang - ($harga_barang * $diskon / 100);
        $data  = array(
            'nama_barang'   => $nama_barang,
            'keterangan'   => $keterangan,
            'harga_barang'   => $harga_barang,
            'diskon'   => $diskon,
            'stok_barang'  => $stok_barang,
            'deskripsi_barang'  => $deskripsi_barang,
            'foto_barang' => $foto_barang,
            'id_kategori' => $this->input->post('id_kategori'),
            'id_toko' => $this->input->post('id_toko'),
            'harga_setelahdiskon' => $hargadiskon,
            'admin_toko' => $this->input->post('admin'),
        );
        $this->db->insert('barang', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Product Added!</div>');
        redirect('toko/databarang/index');
    }

    public function edit($id_barang)
    {
        $admin_toko = $this->Model_barang->samain_email($id_barang);
        if ($this->session->userdata('email') == $admin_toko->admin_toko) {
            $data['title'] = 'Edit Barang';
            $data['pesanan'] = $this->Model_invoice->pesanan_baru();
            $data['admintoko'] = $this->db->get_where('admintoko', ['email' =>
            $this->session->userdata('email')])->row_array();
            $data['menu'] = $this->db->get('user_menu')->result_array();
            $data['toko'] = $this->db->get_where('toko', ['id' =>  $data['admintoko']['id_toko']])->row_array();
            $data['kategori'] = $this->db->get_where('kategori', ['id_toko' =>  $data['toko']['id']])->result_array();
            $where = array('id_barang' => $id_barang);
            $data['barang'] = $this->Model_barang->edit_barang($where, 'barang')->result();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_toko', $data);
            $this->load->view('templates/topbar_admintoko', $data);
            $this->load->view('manajemen_toko/editbarang', $data);
            $this->load->view('templates/footer', $data);
        } else {
            echo " <script>
            alert('Maaf, anda tidak punya akses untuk mengubah detail barang ini !');
            document.location.href = '..' 
            </script>
            "; //.. artinya balik ke directory sebelumnyaa
        };
    }

    public function update()
    {
        $id_barang = $this->input->post('id_barang');
        $nama_barang = $this->input->post('nama_barang');
        $harga_barang = $this->input->post('harga_barang');
        $stok_barang = $this->input->post('stok_barang');
        $diskon = $this->input->post('diskon');
        $keterangan = $this->input->post('keterangan');
        $deskripsi_barang = $this->input->post('deskripsi_barang');

        $hargadiskon = $harga_barang - ($harga_barang * $diskon / 100);
        $data = array(
            'nama_barang' => $nama_barang,
            'harga_barang' => $harga_barang,
            'stok_barang' => $stok_barang,
            'diskon' => $diskon,
            'keterangan' => $keterangan,
            'deskripsi_barang' => $deskripsi_barang,
            'harga_setelahdiskon' => $hargadiskon
        );

        $where = array(
            'id_barang' => $id_barang
        );

        $this->Model_barang->update_data($where, $data, 'barang');
        redirect('toko/databarang/index');
    }

    public function hapus_barang($id_barang)
    {
        $admin_toko = $this->Model_barang->samain_email($id_barang);
        if ($this->session->userdata('email') == $admin_toko->admin_toko) {
            //$where = array('id_barang' => $id_barang);
            //$this->Model_barang->hapus_barang($where, 'barang');
            //redirect('toko/databarang/index');
            $query = "DELETE FROM `barang` WHERE `barang`.`id_barang` = $id_barang";
            $this->db->query($query);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success to Delete!</div>');
            redirect('toko/databarang/index');
        } else {
            echo " <script>
            alert('Maaf, anda tidak punya akses untuk menghapus barang ini !');
            document.location.href = '..' 
            </script>
            "; //.. artinya balik ke directory sebelumnyaa
        };
    }

    public function detail($id_bar)
    {
        $data['title'] = 'Data Barang';
        $data['pesanan'] = $this->Model_invoice->pesanan_baru();
        $data['admintoko'] = $this->db->get_where('admintoko', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['barang'] = $this->Model_barang->detail_brg($id_bar);
        $this->load->model('Model_barang', 'barang');
        $data['toko'] = $this->db->get_where('toko', ['id' =>  $data['admintoko']['id_toko']])->row_array();
        $data['kategori'] = $this->db->get_where('kategori', ['id_toko' =>  $data['toko']['id']])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_toko', $data);
        $this->load->view('templates/topbar_admintoko', $data);
        $this->load->view('manajemen_toko/detail', $data);
        $this->load->view('templates_marketplace/footer', $data);
    }
}
