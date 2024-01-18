

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
        $this->db->select('*');
        $this->db->from('tblics');
        $this->db->join('tblpo', 'tblics.ics_po_id = tblpo.po_id', 'inner');
        $this->db->where('md5(tblics.ics_po_id)', $icsForm);
    
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    
    public function ics_item($ics_item)
    {
        $this->db->where('md5(po_id)', $ics_item);
        // $this->db->where('unit_cost >=', 1500);
        $this->db->where('unit_cost <', 50000);
        $query = $this->db->get('tblpo_item');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }
   
    public function par_form($parForm)
    {
        $this->db->select('*');
        $this->db->from('tblpar');
        $this->db->join('tblpo', 'tblpar.par_po_id = tblpo.po_id', 'inner');
        $this->db->where('md5(par_po_id)', $parForm);
    
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    
    public function par_item($par_item)
    {
        $this->db->where('md5(po_id)', $par_item);
        $this->db->where('unit_cost >', 50000);
        $query = $this->db->get('tblpo_item');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }
    public function DataRSEPI() {
        $this->db->select('tblpo_item.*, tblics.*, tblics_rsepi.*');
        $this->db->join('tblics', 'tblpo_item.po_id = tblics.ics_po_id', 'inner');
        $this->db->join('tblics_rsepi', 'tblpo_item.id = tblics_rsepi.id_tblpo_item', 'inner');
        $rsepidata = $this->db->get('tblpo_item')->result();
        return $rsepidata;
    }
    public function DataRSEPI_PTR($po_id,$id_tblpo_item) {
        $this->db->select('tblpo_item.*, tblics.*, tblics_rsepi.*'); 
        $this->db->from('tblpo_item');
        $this->db->join('tblics', 'tblpo_item.po_id = tblics.ics_po_id');
        $this->db->join('tblics_rsepi', 'tblpo_item.id = tblics_rsepi.id_tblpo_item');
        $this->db->where('md5(tblpo_item.po_id)', $po_id);
        $this->db->where('md5(tblics_rsepi.id_tblpo_item)', $id_tblpo_item);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    public function DataRSEPIPAR_PTR($po_id,$id_tblpo_item) {
        $this->db->select('tblpo_item.*, tblpar.*, tblics_rsepi.*'); 
        $this->db->from('tblpo_item');
        $this->db->join('tblpar', 'tblpo_item.po_id = tblpar.par_po_id');
        $this->db->join('tblics_rsepi', 'tblpo_item.id = tblics_rsepi.id_tblpo_item');
        $this->db->where('md5(tblpo_item.po_id)', $po_id);
        $this->db->where('md5(tblics_rsepi.id_tblpo_item)', $id_tblpo_item);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    public function DataRSEPIPAR() {
        $this->db->select('tblpo_item.*, tblpar.*, tblics_rsepi.*');
        $this->db->join('tblpar', 'tblpo_item.po_id = tblpar.par_po_id', 'inner');
        $this->db->join('tblics_rsepi', 'tblpo_item.id = tblics_rsepi.id_tblpo_item', 'inner');
        $rsepidata = $this->db->get('tblpo_item')->result();
        return $rsepidata;
    }
    public function getCheckboxData($id_tblpo_item) {
        $query = $this->db->select('transfer_type')
            ->from('tblics_rsepi')
            ->where('md5(id_tblpo_item)', $id_tblpo_item)
            ->get();
    
        return $query->row_array();
    }
    
   
}
