<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public function get_all() {
        return $this->db->get('menu')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('menu', ['id_menu' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('menu', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_menu', $id);
        return $this->db->update('menu', $data);
    }

    public function delete($id) {
        return $this->db->delete('menu', ['id_menu' => $id]);
    }

    public function count_all() {
        return $this->db->count_all('menu');
    }
}
