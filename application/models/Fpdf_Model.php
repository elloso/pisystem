

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
  
    public function ics_form($icsForm)
    {
        $this->db->where('md5(ics_po_id)', $icsForm);
        $query = $this->db->get('tblics');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function ics_item($ics_item)
    {
        $this->db->where('md5(po_id)', $ics_item);
        $query = $this->db->get('tblpo_item');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }
    public function par_form($parForm)
    {
        $this->db->where('md5(par_po_id)', $parForm);
        $query = $this->db->get('tblpar');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function par_item($par_item)
    {
        $this->db->where('md5(po_id)', $par_item);
        $query = $this->db->get('tblpo_item');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }
}
