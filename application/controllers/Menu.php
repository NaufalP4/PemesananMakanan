<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('role')) {
            redirect('auth'); // Redirect jika belum login
        }

        // === PERBAIKAN PENTING DI SINI ===
        $this->load->model('Menu_model');
    }

    // === ADMIN ===
    public function index() {
        $this->cek_login_admin();

        $data['judul'] = 'Kelola Menu';
        $data['menu'] = $this->Menu_model->get_all();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('layouts/footer');
    }

    public function tambah() {
        $this->cek_login_admin();

        $data['judul'] = 'Tambah Menu';
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('menu/tambah', $data);
        $this->load->view('layouts/footer');
    }

    public function simpan() {
        $this->cek_login_admin();

        $config['upload_path'] = './uploads/menu/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('menu/tambah');
        } else {
            $upload_data = $this->upload->data();
            $data = [
                'nama_menu' => $this->input->post('nama_menu'),
                'harga' => $this->input->post('harga'),
                // 'deskripsi' => $this->input->post('deskripsi'),
                'gambar' => $upload_data['file_name']
            ];
            $this->Menu_model->insert($data);
            redirect('menu');
        }
    }

    public function edit($id) {
        $this->cek_login_admin();

        $data['judul'] = 'Edit Menu';
        $data['menu'] = $this->Menu_model->get_by_id($id);
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('menu/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update() {
        $this->cek_login_admin();

        $id = $this->input->post('id_menu');
        $data = [
            'nama_menu' => $this->input->post('nama_menu'),
            'harga' => $this->input->post('harga'),
            // 'deskripsi' => $this->input->post('deskripsi')
        ];

        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './uploads/menu/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $data['gambar'] = $upload_data['file_name'];
            }
        }

        $this->Menu_model->update($id, $data);
        redirect('menu');
    }

    public function hapus($id) {
        $this->cek_login_admin();

        $this->Menu_model->delete($id);
        redirect('menu');
    }

    // === USER ===
    public function daftar()
    {
        if ($this->session->userdata('role') != 'user') {
            redirect('auth');
        }

        $data['menu'] = $this->Menu_model->get_all();
        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('menu/index', $data); // tampilan untuk user
        $this->load->view('layouts/footer');
    }

    // === Auth Helpers ===
    private function cek_login_admin() {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== 'admin') {
            redirect('auth');
        }
    }

    private function cek_login_user() {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') !== 'anggota') {
            redirect('auth');
        }
    }
}
