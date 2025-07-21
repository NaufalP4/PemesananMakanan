<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
        $this->load->model('Pesanan_model');
        $this->load->model('Menu_model');
        $this->load->model('User_model');
    }

    public function index() {
        if ($this->session->userdata('role') != 'user') redirect('dashboard');

        $data['judul'] = 'Pesan Makanan';
        $data['menu'] = $this->Menu_model->get_all();
        $data['pesanan'] = $this->Pesanan_model->get_by_user($this->session->userdata('id_user'));

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('pesanan/index', $data);
        $this->load->view('layouts/footer');
    }

    public function pesan($id_menu) {
        if ($this->session->userdata('role') != 'user') redirect('dashboard');

        $data['judul'] = 'Form Pemesanan';
        $data['menu'] = $this->Menu_model->get_by_id($id_menu);

        if (!$data['menu']) {
            show_404();
        }

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('pesanan/form_pesan', $data);
        $this->load->view('layouts/footer');
    }

    public function simpan() {
        if ($this->session->userdata('role') != 'user') redirect('dashboard');

        $id_user = $this->session->userdata('id_user');
        $id_menu = $this->input->post('id_menu');
        $jumlah = $this->input->post('jumlah');

        $menu_item = $this->Menu_model->get_by_id($id_menu);
        if (!$menu_item) {
            show_error('Menu tidak ditemukan.', 404);
        }

        $data_pesanan = [
            'id_user' => $id_user,
            'status' => 'pending',
            'tanggal_pesan' => date('Y-m-d H:i:s')
        ];
        $id_pesanan = $this->Pesanan_model->insert($data_pesanan);

        $subtotal = $menu_item->harga * $jumlah;
        $detail = [
            'id_pesanan' => $id_pesanan,
            'id_menu' => $id_menu,
            'jumlah' => $jumlah,
            'subtotal' => $subtotal
        ];
        $this->Pesanan_model->insert_detail($detail);

        $this->session->set_flashdata('success', 'Pesanan berhasil dibuat.');
        redirect('pesanan');
    }

    public function riwayat() {
        if ($this->session->userdata('role') != 'user') redirect('dashboard');

        $data['judul'] = 'Riwayat Pesanan';
        $data['pesanan'] = $this->Pesanan_model->get_by_user($this->session->userdata('id_user'));

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('pesanan/index', $data);
        $this->load->view('layouts/footer');
    }

    public function kelola() {
        if ($this->session->userdata('role') != 'admin') redirect('dashboard');

        $data['judul'] = 'Kelola Pesanan';
        $data['pesanan'] = $this->Pesanan_model->get_all();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('pesanan/kelola', $data);
        $this->load->view('layouts/footer');
    }

    public function detail($id) {
        if ($this->session->userdata('role') != 'admin') redirect('dashboard');

        $data['judul'] = 'Detail Pesanan';
        $data['detail'] = $this->Pesanan_model->get_detail($id);

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('pesanan/kelola', $data);
        $this->load->view('layouts/footer');
    }

    public function ubah_status($id) {
        if ($this->session->userdata('role') != 'admin') redirect('dashboard');

        $status = $this->input->post('status');
        $this->Pesanan_model->update($id, ['status' => $status]);
        $this->session->set_flashdata('success', 'Status pesanan berhasil diperbarui.');
        redirect('pesanan');
    }

    public function konfirmasi($id) {
        if ($this->session->userdata('role') != 'admin') redirect('dashboard');

        $this->Pesanan_model->update($id, ['status' => 'selesai']);
        $this->session->set_flashdata('success', 'Pesanan telah dikonfirmasi sebagai selesai.');
        redirect('pesanan');
    }

    public function update_status($id_pesanan) {
        $status = $this->input->post('status');
        $this->db->where('id_pesanan', $id_pesanan);
        $this->db->update('pesanan', ['status' => $status]);
        $this->session->set_flashdata('success', 'Status pesanan diperbarui.');
        redirect('pesanan/kelola');
    }

    public function edit($id) {
        $data['judul'] = 'Edit Pesanan';
        $data['pesanan'] = $this->Pesanan_model->get_edit_data($id);
        $data['users'] = $this->User_model->get_all(); // pastikan ini ada
        $data['menu'] = $this->Menu_model->get_all();  // pastikan ini ada

        if (!$data['pesanan']) {
            show_404();
        }

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar', $data);
        $this->load->view('pesanan/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update() {
        $id = $this->input->post('id_pesanan');
        $id_user = $this->input->post('id_user');
        $id_menu = $this->input->post('id_menu');
        $jumlah = $this->input->post('jumlah');
        $status = $this->input->post('status');

        // Update tabel pesanan
        $data_pesanan = [
            'id_user' => $id_user,
            'status' => $status
        ];
        $this->Pesanan_model->update($id, $data_pesanan);

        // Ambil harga menu
        $menu = $this->Menu_model->get_by_id($id_menu);
        $subtotal = $menu ? $menu->harga * $jumlah : 0;

        // Update tabel detail_pesanan
        $data_detail = [
            'id_menu' => $id_menu,
            'jumlah' => $jumlah,
            'subtotal' => $subtotal
        ];
        $this->db->where('id_pesanan', $id);
        $this->db->update('detail_pesanan', $data_detail);

        $this->session->set_flashdata('success', 'Pesanan berhasil diperbarui.');
        redirect('pesanan/kelola');
    }

    public function hapus($id) {
        $this->Pesanan_model->hapusPesanan($id);
        redirect('pesanan/kelola');
    }
}
