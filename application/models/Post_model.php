<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_Model extends CI_Model
{
    public function __construct()
    {

        if (!$this->load->is_loaded('database')) {
            $this->load->database();
        }
    }
    public function get_userDetails($email)
    {
        $this->db->select('*');
        $this->db->from('tbluser');
        $this->db->where('email', $email);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function get_userlist()
    {
        $this->db->select('*');
        $this->db->from('tbluser');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function viewPOtable() {
        $this->db->select('*');
        $this->db->from('tblpo');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}
