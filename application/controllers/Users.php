<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
        $this->load->model('User_model');
    }

    public function index() {
        $data['judul'] = 'Kelola User';
        $data['users'] = $this->User_model->get_all_user();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('users/index', $data);
        $this->load->view('layouts/footer');
    }

    public function tambah() {
        $data['judul'] = 'Tambah User';

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('users/tambah', $data);
        $this->load->view('layouts/footer');
    }

    public function simpan() {
        $data = [
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'nama'     => $this->input->post('nama'),
            'role'     => $this->input->post('role')
        ];
        $this->User_model->insert($data);
        $this->session->set_flashdata('success', 'User berhasil ditambahkan.');
        redirect('users');
    }

    public function edit($id) {
        $data['judul'] = 'Edit User';
        $data['user'] = $this->User_model->get_by_id($id);

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('users/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update() {
        $id = $this->input->post('id_user');
        $data = [
            'username' => $this->input->post('username'),
            'nama'     => $this->input->post('nama'),
            'role'     => $this->input->post('role')
        ];
        $this->User_model->update($id, $data);
        $this->session->set_flashdata('success', 'User berhasil diupdate.');
        redirect('users');
    }

    public function hapus($id) {
        $this->User_model->delete($id);
        $this->session->set_flashdata('success', 'User berhasil dihapus.');
        redirect('users');
    }
}
