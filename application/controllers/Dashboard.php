<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
        $this->load->model('Menu_model');
        $this->load->model('User_model');
        $this->load->model('Pesanan_model');
    }

    public function index() {
        $data['judul'] = 'Dashboard';

        if ($this->session->userdata('role') == 'admin') {
            $data['jml_menu'] = $this->Menu_model->count_all();
            $data['jml_user'] = count($this->User_model->get_all_user());
            $data['jml_pesanan'] = $this->Pesanan_model->count_all();

            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('layouts/footer');
        } else {
            $data['pesanan_user'] = $this->Pesanan_model->get_by_user($this->session->userdata('id_user'));

            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar', $data);
            $this->load->view('dashboard/index', $data);
            $this->load->view('layouts/footer');
        }
    }
}
