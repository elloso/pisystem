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
    public function viewPOtable()
    {
        $this->db->select('*');
        $this->db->from('tblpo');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function getSupplierNameByPONumber($po_number)
    {
        $this->db->select('iar_supplier, iar_po_id');
        $this->db->where('iar_po_number', $po_number);
        $query = $this->db->get('tbliar');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row;
        } else {
            return null;
        }
    }
    public function viewIARtable()
    {
        $this->db->select('*');
        $this->db->from('tbliar');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function viewICStable()
    {
        $this->db->select('*');
        $this->db->from('tblics');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function get_podetails_by_id($poID)
    {
        $this->db->where('md5(id)', $poID);
        $query = $this->db->get('tblpo');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function get_poitemList($po_id)
    {
        $this->db->select('*');
        $this->db->from('tblpo_item');
        $this->db->where('md5(po_id)', $po_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function get_allPoList()
    {
        $this->db->select_max('po_id');
        $this->db->from('tblpo');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->po_id;
        } else {
            return;
        }
    }
    public function get_iardetails_by_id($iarID)
    {
        $this->db->where('md5(iar_id)', $iarID);
        $query = $this->db->get('tbliar');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function get_iaritemList($iarPoID)
    {
        $this->db->select('*');
        $this->db->from('tblpo_item');
        $this->db->where('md5(po_id)', $iarPoID);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}
