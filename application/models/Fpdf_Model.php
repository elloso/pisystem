<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fpdf_Model extends CI_Model
{
    public function fetchDataByPOID($iar_po_id) {
        $this->db->select('tbliar.*, tblpo.*, tblpo_item.*'); // Select specific columns from 'tbliar', 'tblpo', and 'tblpo_item'
        $this->db->from('tbliar');
        $this->db->join('tblpo', 'tbliar.iar_po_id = tblpo.po_id');
        $this->db->join('tblpo_item', 'tbliar.iar_po_id = tblpo_item.po_id');
        $this->db->where('MD5(tbliar.iar_po_id)', $iar_po_id);
        
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    public function fetchDataByPOID_Array($iar_po_id) {
        $this->db->select('tbliar.*, tblpo.*, tblpo_item.*'); // Select specific columns from 'tbliar', 'tblpo', and 'tblpo_item'
        $this->db->from('tbliar');
        $this->db->join('tblpo', 'tbliar.iar_po_id = tblpo.po_id');
        $this->db->join('tblpo_item', 'tbliar.iar_po_id = tblpo_item.po_id');
        $this->db->where('MD5(tbliar.iar_po_id)', $iar_po_id);
        
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->result(); // Fetch as an array of objects
        } else {
            return null;
        }
    }
}
