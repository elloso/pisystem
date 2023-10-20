<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Function_Model extends CI_Model
{
    public function generate_password($id, $new_password)
    {
        $data = array(
            'password' => $new_password
        );
        $this->db->where('md5(id)', $id);
        $this->db->update('tbluser', $data);
        return $this->db->affected_rows() > 0;
    }
    public function remove_userModel($id)
    {
        $this->db->where('md5(id)', $id);
        $this->db->delete('tbluser');
        return $this->db->affected_rows() > 0;
    }
    public function update_user_details($id, $first_name, $last_name)
    {
        $first_name = strip_tags($first_name);
        $last_name = strip_tags($last_name);
        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
        );
        $this->db->where('id', $id);
        $this->db->update('tbluser', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
