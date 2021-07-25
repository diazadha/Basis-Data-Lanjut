<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Management_user extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Management User';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['admin'] = $this->Model_admin->admin_user()->result();
        $data['tokosemua'] = $this->Model_store->tampil_namatoko()->result();
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_marketplace', $data);
            $this->load->view('templates/topbar_admin', $data);
            $this->load->view('menu/management_user', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }
    public function add_admin()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'password dont match!',
            'min_length' => 'Password too short min 6 characters'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Management User';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_marketplace', $data);
            $this->load->view('templates/topbar_admin', $data);
            $this->load->view('menu/management_user', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $datauser = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'id_toko' => htmlspecialchars($this->input->post('id_toko', true)),
                'id_role' => 2,
                'is_active' => 1,
                'image' => 'default.jpg',
                'date_created' => time()

            ];
            $this->db->insert('admintoko', $datauser);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your user Admin has been registered.</div>');
            redirect('Management_user');
        }
    }
    public function detail($idadmin)
    {
        $data['title'] = 'Management User';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['admin'] = $this->Model_admin->detail_admin($idadmin)->result();
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_marketplace', $data);
            $this->load->view('templates/topbar_admin', $data);
            $this->load->view('menu/management_user_detail', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }

    public function update()
    {
        $aktif = $this->input->post('aktif');
        $nonaktif = $this->input->post('nama_barang');
        $id_admin = $this->input->post('id_admin');
        if (!isset($_POST['aktif'])) {
            $data = array(
                'is_active' => $nonaktif
            );
            $where = array(
                'id_admin' => $id_admin
            );
            $this->Model_admin->update_data($where, $data, 'admintoko');
            redirect('management_user/index');
        } else {
            $data = array(
                'is_active' => $aktif
            );
            $where = array(
                'id_admin' => $id_admin
            );
            $this->Model_admin->update_data($where, $data, 'admintoko');
            redirect('management_user/index');
        }
    }
}
