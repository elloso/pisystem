

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
        $this->db->join('tblpo_item', 'tblpo.po_id = tblpo_item.po_id', 'inner');
        $this->db->where('md5(tblics.ics_po_id)', $icsForm);
        $this->db->where('unit_cost <', 50000);
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
        $this->db->join('tblpo_item', 'tblpo.po_id = tblpo_item.po_id', 'inner');
        $this->db->where('md5(par_po_id)', $parForm);
        $this->db->where('unit_cost >', 50000);
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
    // public function fetchSEPCDataByPOID($po_id) {
    //     $this->db->select('tbl_icssepc.*, tblics.*, tblpo.*, tblpo_item.*'); 
    //     $this->db->from('tbl_icssepc');
    //     $this->db->join('tblics', 'tbl_icssepc.id_tblpo_item = tblics.ics_po_id');
    //     $this->db->join('tblpo', 'tbl_icssepc.id_tblpo_item = tblpo.po_id');
    //     $this->db->join('tblpo_item', 'tbl_icssepc.id_tblpo_item = tblpo_item.po_id');
    //     $this->db->where('md5(tbl_icssepc.id_tblpo_item)', $po_id);
        
    //     $query = $this->db->get();
    
    //     if ($query->num_rows() > 0) {
    //         return $query->row();
    //     } else {
    //         return null;
    //     }
    // }
    public function fetchSEPCDataByPOID($po_id,$id) {
        $this->db->select('tblics.*, tblpo_item.*,tbl_icssepc.*'); 
        $this->db->from('tblics');
        $this->db->join('tblpo_item', 'tblics.ics_po_id = tblpo_item.po_id');
        $this->db->join('tbl_icssepc', 'tblpo_item.id = tbl_icssepc.ics_sepc_id');
        $this->db->where('md5(tblics.ics_po_id)', $po_id);
        $this->db->where('md5(tblpo_item.id)', $id);
        
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    // public function fetchSEPCDataResult($po_id) {
    //     $this->db->select('tbl_icssepc.*, tblics.*, tblpo.*, tblpo_item.*'); 
    //     $this->db->from('tbl_icssepc');
    //     $this->db->join('tblics', 'tbl_icssepc.id_tblpo_item = tblics.ics_po_id');
    //     $this->db->join('tblpo', 'tbl_icssepc.id_tblpo_item = tblpo.po_id');
    //     $this->db->join('tblpo_item', 'tbl_icssepc.id_tblpo_item = tblpo_item.po_id');
    //     $this->db->where('md5(tbl_icssepc.id_tblpo_item)', $po_id);
        
    //     $query = $this->db->get();
    
    //     if ($query->num_rows() > 0) {
    //         return $query->result();
    //     } else {
    //         return null;
    //     }
    // }
    public function fetchSEPCDataResult($po_id,$id) {
        $this->db->select('tblics.*, tblpo_item.*,tbl_icssepc.*'); 
        $this->db->from('tblics');
        $this->db->join('tblpo_item', 'tblics.ics_po_id = tblpo_item.po_id');
        $this->db->join('tbl_icssepc', 'tblpo_item.id = tbl_icssepc.ics_sepc_id');
        $this->db->where('md5(tblics.ics_po_id)', $po_id);
        $this->db->where('md5(tblpo_item.id)', $id);
        
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    // public function fetchPPEPCDataByPOID($po_id) {
    //     $this->db->select('tbl_icssepc.*, tblpar.*, tblpo.*, tblpo_item.*'); 
    //     $this->db->from('tbl_icssepc');
    //     $this->db->join('tblpar', 'tbl_icssepc.id_tblpo_item = tblpar.par_po_id');
    //     $this->db->join('tblpo', 'tbl_icssepc.id_tblpo_item = tblpo.po_id');
    //     $this->db->join('tblpo_item', 'tbl_icssepc.id_tblpo_item = tblpo_item.po_id');
    //     $this->db->where('md5(tbl_icssepc.id_tblpo_item)', $po_id);
        
    //     $query = $this->db->get();
    
    //     if ($query->num_rows() > 0) {
    //         return $query->row();
    //     } else {
    //         return null;
    //     }
    // }
    public function fetchPPEPCDataByPOID($po_id,$id) {
        $this->db->select('tblpar.*, tblpo_item.*,tbl_icssepc.*'); 
        $this->db->from('tblpar');
        $this->db->join('tblpo_item', 'tblpar.par_po_id = tblpo_item.po_id');
        $this->db->join('tbl_icssepc', 'tblpo_item.id = tbl_icssepc.ics_sepc_id');
        $this->db->where('md5(tblpar.par_po_id)', $po_id);
        $this->db->where('md5(tblpo_item.id)', $id);
        
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    // public function fetchPPEPCDataResult($po_id) {
    //     $this->db->select('tbl_icssepc.*, tblpar.*, tblpo.*, tblpo_item.*'); 
    //     $this->db->from('tbl_icssepc');
    //     $this->db->join('tblpar', 'tbl_icssepc.id_tblpo_item = tblpar.par_po_id');
    //     $this->db->join('tblpo', 'tbl_icssepc.id_tblpo_item = tblpo.po_id');
    //     $this->db->join('tblpo_item', 'tbl_icssepc.id_tblpo_item = tblpo_item.po_id');
    //     $this->db->where('md5(tbl_icssepc.id_tblpo_item)', $po_id);
        
    //     $query = $this->db->get();
    
    //     if ($query->num_rows() > 0) {
    //         return $query->result();
    //     } else {
    //         return null;
    //     }
    // }
    public function fetchPPEPCDataResult($po_id,$id) {
        $this->db->select('tblpar.*, tblpo_item.*,tbl_icssepc.*'); 
        $this->db->from('tblpar');
        $this->db->join('tblpo_item', 'tblpar.par_po_id = tblpo_item.po_id');
        $this->db->join('tbl_icssepc', 'tblpo_item.id = tbl_icssepc.ics_sepc_id');
        $this->db->where('md5(tblpar.par_po_id)', $po_id);
        $this->db->where('md5(tblpo_item.id)', $id);
        
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return null;
        }
    }
    public function rspi_item($selectMonth,$selectYear)
    {

        $this->db->select('tblpo_item.*,tbl_icssepc.*,tblics.*,tbliar.rcc,tbliar.iar_po_id'); 
        $this->db->join('tbl_icssepc', 'tblpo_item.id = tbl_icssepc.ics_sepc_id');
        $this->db->join('tblics', 'tblpo_item.po_id = tblics.ics_po_id');
        $this->db->join('tbliar', 'tblics.ics_po_id = tbliar.iar_po_id');
        $this->db->where('tblpo_item.unit_cost <', 50000);
        $this->db->where('tbl_icssepc.rspi_month', $selectMonth);
        $this->db->where('tbl_icssepc.rspi_year', $selectYear);
        $query = $this->db->get('tblpo_item');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }

    public function rspi_data($selectMonth,$selectYear)
    {
        $this->db->select('tblpo_item.*,tbl_icssepc.*,tblics.*,tbliar.rcc,tbliar.iar_po_id'); 
        $this->db->join('tbl_icssepc', 'tblpo_item.id = tbl_icssepc.ics_sepc_id');
        $this->db->join('tblics', 'tblpo_item.po_id = tblics.ics_po_id');
        $this->db->join('tbliar', 'tblics.ics_po_id = tbliar.iar_po_id');
        $this->db->where('tblpo_item.unit_cost <', 50000);
        $this->db->where('tbl_icssepc.rspi_month', $selectMonth);
        $this->db->where('tbl_icssepc.rspi_year', $selectYear);
        $query = $this->db->get('tblpo_item');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return [];
        }
    }

    public function regspi_item($Property,$PropertyYear)
    {
        $this->db->select('tblpo_item.*,tbl_icssepc.*,tblics.*,tbliar.invoice_date,tbliar.iar_po_id'); 
        $this->db->join('tbl_icssepc', 'tblpo_item.id = tbl_icssepc.ics_sepc_id');
        $this->db->join('tblics', 'tblpo_item.po_id = tblics.ics_po_id');
        $this->db->join('tbliar', 'tblics.ics_po_id = tbliar.iar_po_id');
        $this->db->where('tblpo_item.unit_cost <', 50000);
        $this->db->where('tbl_icssepc.semi_expendable', $Property);
        $this->db->where('tbl_icssepc.rspi_year', $PropertyYear);
        $query = $this->db->get('tblpo_item');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }
}
