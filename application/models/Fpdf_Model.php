

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
        $this->db->where('unit_cost >=', 1500);
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
        $this->db->where('unit_cost >', 50000);
        $query = $this->db->get('tblpo_item');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }
    public function DataRSEPI($po_id, $id_tblpo_item) {
        $this->db->select(
            'tblpo_item.po_id, 
            tblpo_item.po_number, 
            tblpo_item.pr_number, 
            tblpo_item.pgr_number, 
            tblpo_item.item_no, 
            tblpo_item.property_no, 
            tblpo_item.quantity, 
            tblpo_item.unit, 
            tblpo_item.item_description, 
            tblpo_item.unit_cost, 
            tblpo_item.total_unit_cost, 
            tblpo_item.useful_life, 
            tblpo_item.date_acquired,
            tblics.ics_po_id, 
            tblics.ics_supplier, 
            tblics.ics_total_cost, 
            tblics.ics_amount, 
            tblics.ics_no, 
            tblics.ics_fund, 
            tblics.ics_date, 
            tblics.ics_useful_life, 
            tblics.ics_receivedby, 
            tblics.ics_received_date, 
            tblics.ics_receivedfrom, 
            tblics.ics_receivedfrom_date, 
            tblics_rsepi.id_tblpo_item, 
            tblics_rsepi.icsrsepi_po_id, 
            tblics_rsepi.rsepi_property_no, 
            tblics_rsepi.returned, 
            tblics_rsepi.reissued, 
            tblics_rsepi.remarks, 
            tblics_rsepi.disposal_reason,  
            tblics_rsepi.date_disposed, 
            tblics_rsepi.date_transfer, 
            tblics_rsepi.transfer_type,  
            tblics_rsepi.others_specify, 
            tblics_rsepi.itr_no,  
            tblics_rsepi.condition_inventory, 
            tblics_rsepi.approved, 
            tblics_rsepi.released, 
            tblics_rsepi.received, 
            tblics_rsepi.reason_transfer'
        );
    
        $this->db->from('tblpo_item');
        $this->db->join('tblics', 'tblpo_item.po_id = tblics.ics_po_id', 'inner');
        $this->db->join('tblics_rsepi', 'tblpo_item.id = tblics_rsepi.id_tblpo_item', 'inner');
        $this->db->where('tblpo_item.po_id', $po_id);
        $this->db->where('tblics_rsepi.id_tblpo_item', $id_tblpo_item);
        $rsepidata = $this->db->get()->result();
        return $rsepidata;
    }
    
    
    
    // public function DataRSEPI_PTR() {
    //     $this->db->select('tblpo_item.*, tblics.*, tblics_rsepi.*');
    //     $this->db->join('tblics', 'tblpo_item.po_id = tblics.ics_po_id', 'inner');
    //     $this->db->join('tblics_rsepi', 'tblpo_item.id = tblics_rsepi.id_tblpo_item', 'inner');
    //     $rsepidata = $this->db->get('tblpo_item')->result();
    //     return $rsepidata;
    // }
    public function DataRSEPI_PTR($po_id) {
        $this->db->select('tblpo_item.*, tblics.*, tblics_rsepi.*'); // Select specific columns from 'tbliar', 'tblpo', and 'tblpo_item'
        $this->db->from('tblpo_item');
        $this->db->join('tblics', 'tblpo_item.po_id = tblics.ics_po_id');
        $this->db->join('tblics_rsepi', 'tblpo_item.id = tblics_rsepi.id_tblpo_item');
        $this->db->where('md5(tblpo_item.po_id)', $po_id);
        
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
   
}
