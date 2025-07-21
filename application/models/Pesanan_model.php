<?php
date_default_timezone_set('Asia/Jakarta');
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model {

    public function get_all() {
        $this->db->select('
            p.id_pesanan,
            u.nama AS nama_user,
            GROUP_CONCAT(CONCAT(m.nama_menu, " (Rp", m.harga, ")") SEPARATOR ", ") AS nama_menu,
            SUM(d.jumlah) AS jumlah,
            SUM(d.subtotal) AS total_harga,
            p.status,
            p.tanggal_pesan AS tanggal
        ');
        $this->db->from('pesanan p');
        $this->db->join('users u', 'p.id_user = u.id_user');
        $this->db->join('detail_pesanan d', 'p.id_pesanan = d.id_pesanan');
        $this->db->join('menu m', 'd.id_menu = m.id_menu');
        $this->db->group_by('p.id_pesanan');
        $this->db->order_by('p.tanggal_pesan', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_user($id_user) {
        $this->db->select("
            p.id_pesanan,
            GROUP_CONCAT(CONCAT(m.nama_menu, ' (', d.jumlah, ' x Rp', FORMAT(m.harga, 0), ')') SEPARATOR ', ') AS nama_menu,
            SUM(d.jumlah) AS jumlah,
            SUM(d.subtotal) AS total_harga,
            p.status,
            p.tanggal_pesan AS tanggal
        ");
        $this->db->from('pesanan p');
        $this->db->join('detail_pesanan d', 'p.id_pesanan = d.id_pesanan');
        $this->db->join('menu m', 'd.id_menu = m.id_menu');
        $this->db->where('p.id_user', $id_user);
        $this->db->group_by('p.id_pesanan');
        $this->db->order_by('p.tanggal_pesan', 'DESC');
        return $this->db->get()->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('pesanan', ['id_pesanan' => $id])->row();
    }

    public function insert($data) {
        $this->db->insert('pesanan', $data);
        return $this->db->insert_id();
    }

    public function update($id, $data) {
        $this->db->where('id_pesanan', $id);
        return $this->db->update('pesanan', $data);
    }

    public function hapusPesanan($id)
    {
        $this->db->delete('detail_pesanan', ['id_pesanan' => $id]);
        $this->db->delete('pesanan', ['id_pesanan' => $id]);
    }
    public function count_all() {
        return $this->db->count_all('pesanan');
    }

    public function get_detail($id_pesanan) {
        $this->db->select('d.*, m.nama_menu, m.harga');
        $this->db->from('detail_pesanan d');
        $this->db->join('menu m', 'd.id_menu = m.id_menu');
        $this->db->where('d.id_pesanan', $id_pesanan);
        return $this->db->get()->result();
    }

    public function insert_detail($data) {
        return $this->db->insert('detail_pesanan', $data);
    }

    public function delete_detail_by_pesanan($id_pesanan) {
        return $this->db->delete('detail_pesanan', ['id_pesanan' => $id_pesanan]);
    }

    public function get_riwayat_by_user($id_user)
    {
        $this->db->select('p.id_pesanan, p.tanggal_pesan, p.status, 
            GROUP_CONCAT(CONCAT(m.nama_menu, " (Rp", m.harga, ")") SEPARATOR ", ") as menu_dipesan,
            GROUP_CONCAT(pd.jumlah SEPARATOR ", ") as jumlah,
            SUM(m.harga * pd.jumlah) as total
        ');
        $this->db->from('pesanan p');
        $this->db->join('pesanan_detail pd', 'pd.id_pesanan = p.id_pesanan');
        $this->db->join('menu m', 'm.id_menu = pd.id_menu');
        $this->db->where('p.id_user', $id_user);
        $this->db->group_by('p.id_pesanan');
        $this->db->order_by('p.tanggal_pesan', 'DESC');
        return $this->db->get()->result();
    }

    public function get_edit_data($id_pesanan) {
        $this->db->select('
            p.id_pesanan,
            p.id_user,
            d.id_menu,
            u.nama AS nama_user,
            m.nama_menu,
            d.jumlah,
            p.status
        ');
        $this->db->from('pesanan p');
        $this->db->join('users u', 'p.id_user = u.id_user');
        $this->db->join('detail_pesanan d', 'p.id_pesanan = d.id_pesanan');
        $this->db->join('menu m', 'd.id_menu = m.id_menu');
        $this->db->where('p.id_pesanan', $id_pesanan);
        return $this->db->get()->row();
    }
}
