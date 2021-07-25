<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authstoreadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index() //untuk login
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Admin Store Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('authstoreadmin/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('admintoko', ['email' => $email])->row_array();

        if ($user) {
            //usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'id_role' => $user['id_role']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['id_role'] == 2) {
                        redirect('Dashboard_toko');
                    } else {
                        echo 'Wrong page ! you must login at admin marketplace page login';
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password! </div>');
                    redirect('authstoreadmin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated! </div>');
                redirect('authstoreadmin');
            }
        } else { //tidak ada usernya
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered! </div>');
            redirect('authstoreadmin');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admintoko.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'password dont match!',
            'min_length' => 'Password too short min 6 characters'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'matches[password1]');
        $this->form_validation->set_rules('nametoko', 'Name', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Address', 'required|trim');
        $this->form_validation->set_rules('kodepos', 'Zipcode', 'required|trim');
        $this->form_validation->set_rules('kota', 'City', 'required|trim');
        $this->form_validation->set_rules('kontak', 'Contact', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Admin Store Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('authstoreadmin/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $kodepos_toko = $this->input->post('kodepos');
            $kodearea = substr($kodepos_toko, 0, 2);
            $datatoko = [
                'nama_toko' => htmlspecialchars($this->input->post('nametoko', true)),
                'alamat_toko' => htmlspecialchars($this->input->post('alamat', true)),
                'kodepos_toko' => $kodepos_toko,
                'foto_toko' => 'default.jpg',
                'kodearea' => $kodearea,
                'kota_toko' => $this->input->post('kota'),
                'kontak_toko' => $this->input->post('kontak'),
            ];
            $this->db->insert('toko', $datatoko);
            $max = $this->Model_barang->maxid();
            $datauser = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'id_role' => 2,
                'id_toko' => $max['max'],
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('admintoko', $datauser);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your store has been registered. Please Login!</div>');
            redirect('authstoreadmin');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_role');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('authstoreadmin/index');
    }
}
