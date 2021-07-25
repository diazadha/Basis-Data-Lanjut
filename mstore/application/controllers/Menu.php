<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_marketplace', $data);
            $this->load->view('templates/topbar_admin', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('id_menu', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_marketplace', $data);
            $this->load->view('templates/topbar_admin', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'id_menu' => $this->input->post('id_menu'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('menu/submenu');
        }
    }

    public function deletesubmenu($id_sub_menu)
    {
        $query = "DELETE FROM `user_sub_menu` WHERE `user_sub_menu`.`id_sub_menu` = $id_sub_menu";
        $this->db->query($query);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success to Delete!</div>');
        redirect('menu/submenu');
    }
    public function deletemenu($id)
    {
        $query = "DELETE FROM `user_menu` WHERE `user_menu`.`id` = $id";
        $this->db->query($query);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success to Delete!</div>');
        redirect('menu');
    }

    public function getedit()
    {
        $this->load->model('Menu_model', 'menu');

        echo json_encode($this->menu->getmenuById($_POST['id']));
    }

    public function geteditsub()
    {
        $this->load->model('Menu_model', 'menu');

        echo json_encode($this->menu->getsubmenuById($_POST['id']));
    }

    public function edit()
    {
        $input_id = $_POST['id'];
        $input_menu = $_POST['menu'];
        $query = "UPDATE `user_menu` SET `menu` = '$input_menu' WHERE `user_menu`.`id` ='$input_id'";
        $this->db->query($query);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Updated!</div>');
        redirect('menu');
    }

    public function editsub()
    {
        //var_dump($_POST['title']);
        //var_dump($_POST['id']);
        //echo $this->input->post('title');
        //$this->input->post('id');
        $input_title = $_POST['title'];
        $input_id = $_POST['id'];
        $input_id_menu = $_POST['id_menu'];
        $input_url = $_POST['url'];
        $input_icon = $_POST['icon'];
        $input_is_active = $_POST['is_active'];

        $query = "UPDATE `user_sub_menu` SET `title` = '$input_title', `id_menu` = '$input_id_menu', `url` = '$input_url', `icon` = '$input_icon', `is_active` = '$input_is_active' WHERE `user_sub_menu`.`id` ='$input_id'";
        $this->db->query($query);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu Updated!</div>');
        redirect('menu/submenu');
    }

    public function submenu_edit($id_sub_menu)
    {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['edit'] = $this->Menu_model->submenu_edit($id_sub_menu)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_marketplace', $data);
        $this->load->view('templates/topbar_admin', $data);
        $this->load->view('menu/submenu_edit', $data);
        $this->load->view('templates/footer', $data);
    }
    public function submenu_update()
    {
        $aktif = $this->input->post('aktif');
        $nonaktif = $this->input->post('non_aktif');
        $id_sub_menu = $this->input->post('id_sub_menu');
        $url = $this->input->post('url');
        $title = $this->input->post('title');
        $menu = $this->input->post('menu');
        $icon = $this->input->post('icon');
        if (!isset($_POST['aktif'])) {
            $data = $nonaktif;
            $this->Model_admin->submenu_update($data, $id_sub_menu, $menu, $title, $icon, $url);
            redirect('menu/submenu');
        } else {
            $data = $aktif;
            $this->Model_admin->submenu_update($data, $id_sub_menu, $menu, $title, $icon, $url);
            redirect('menu/submenu');
        }
    }
}
