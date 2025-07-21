<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_by_username($username) {
        return $this->db->get_where('users', ['username' => $username])->row();
    }

    public function get_all_user() {
        return $this->db->get_where('users', ['role' => 'user'])->result();
    }

    public function get_all() {
        return $this->db->get('users')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('users', ['id_user' => $id])->row();
    }

    public function insert($data) {
        return $this->db->insert('users', $data);
    }

    public function update($id, $data) {
        $this->db->where('id_user', $id);
        return $this->db->update('users', $data);
    }

    public function delete($id) {
        return $this->db->delete('users', ['id_user' => $id]);
    }

    public function get_by_role($role, $include_id = null) {
        $this->db->group_start();
        $this->db->where('role', $role);
        if ($include_id !== null) {
            $this->db->or_where('id_user', $include_id);
        }
        $this->db->group_end();
        return $this->db->get('users')->result();
    }
}
