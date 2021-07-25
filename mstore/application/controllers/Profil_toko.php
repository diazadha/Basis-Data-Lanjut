<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_toko extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Profil';
        $data['pesanan'] = $this->Model_invoice->pesanan_baru();
        $data['admintoko'] = $this->db->get_where('admintoko', ['email' =>
        $this->session->userdata('email')])->row_array();
        //$data['toko'] = $this->db->get('toko')->row_array();
        $data['toko'] = $this->db->get_where('toko', ['id' =>  $data['admintoko']['id_toko']])->row_array();
        $data['profil'] = $this->Model_profil->profil()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_toko', $data);
        $this->load->view('templates/topbar_admintoko', $data);
        $this->load->view('profil/toko', $data);
        $this->load->view('templates/footer', $data);
    }
    public function admin()
    {
        $data['title'] = 'Profil';
        $data['pesanan'] = $this->Model_invoice->pesanan_baru();
        $data['admintoko'] = $this->db->get_where('admintoko', ['email' =>
        $this->session->userdata('email')])->row_array();
        //$data['toko'] = $this->db->get('toko')->row_array();
        $data['toko'] = $this->db->get_where('toko', ['id' =>  $data['admintoko']['id_toko']])->row_array();
        $data['profil'] = $this->Model_profil->profil()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_toko', $data);
        $this->load->view('templates/topbar_admintoko', $data);
        $this->load->view('profil/toko_admin', $data);
        $this->load->view('templates/footer', $data);
    }

    public function update_admin()
    {
        $name   = $this->input->post('name');
        $email    = $this->input->post('email');
        $kota_admin    = $this->input->post('kota_admin');
        $kodepos    = $this->input->post('kodepos');
        $alamat_admin    = $this->input->post('alamat_admin');
        $admin = $this->session->userdata('email');

        $data = array(
            'name' => $name,
            'email' => $email,
            'kota_admin' => $kota_admin,
            'kodepos' => $kodepos,
            'alamat_admin' => $alamat_admin,
        );

        $where = array(
            'email' => $admin,
        );
        $this->Model_profil->update($where, $data, 'admintoko');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Admin Berhasil Diubah!</div>');
        redirect('profil_toko/admin');
    }
    public function update_store()
    {
        $nama_toko   = $this->input->post('nama_toko');
        $kontak_toko    = $this->input->post('kontak_toko');
        $kota_toko    = $this->input->post('kota_toko');
        $kodepos_toko    = $this->input->post('kodepos_toko');
        $alamat_toko    = $this->input->post('alamat_toko');
        $admin = $this->input->post('id_toko');
        $data = array(
            'nama_toko' => $nama_toko,
            'kontak_toko' => $kontak_toko,
            'alamat_toko' => $alamat_toko,
            'kodepos_toko' => $kodepos_toko,
            'kota_toko' => $kota_toko,
        );

        $where = array(
            'id' => $admin,
        );
        $this->Model_profil->update($where, $data, 'toko');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Toko Berhasil Diubah</div>');
        redirect('profil_toko/index');
    }

    public function update_img()
    {
        $foto_admin    = $_FILES['foto_admin']['name'];
        if ($foto_admin = '') {
        } else {
            $config['upload_path'] = './assets/img/profile';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_admin')) {
                echo "Gambar gagal di upload!";
            } else {
                $foto_admin = $this->upload->data('file_name');
            }
        }
        $admin = $this->session->userdata('email');
        $data  = array(
            'image' => $foto_admin,
        );
        $where = array(
            'email' => $admin,
        );
        $this->Model_profil->update_img($where, $data, 'admintoko');
        redirect('profil_toko/admin');
    }
    public function update_imgtoko()
    {
        $id_toko    = $this->input->post('id_toko');
        $foto_toko    = $_FILES['foto_toko']['name'];
        if ($foto_toko = '') {
        } else {
            $config['upload_path'] = './assets/img/profile';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto_toko')) {
                echo "Gambar gagal di upload!";
            } else {
                $foto_toko = $this->upload->data('file_name');
            }
        }
        $admin = $this->session->userdata('email');
        $data  = array(
            'foto_toko' =>  $foto_toko,
        );
        $where = array(
            'id' => $id_toko,
        );
        $this->Model_profil->update_imgtoko($where, $data, 'toko');
        redirect('profil_toko/index');
    }
}
