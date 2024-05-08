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
        $this->db->distinct();
        $this->db->select('ics_id,ics_po_id,ics_no, ics_iar_no, ics_fund, ics_supplier');
        $this->db->from('tblics');
        $this->db->join('tblpo_item', 'tblics.ics_po_id = tblpo_item.po_id');
        $this->db->where('tblpo_item.unit_cost <=', 49999);

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
        $this->db->select('tblics.ics_no,tblpar.par_no, tblpo_item.*');
        $this->db->from('tblpo_item');
        $this->db->join('tblics', 'tblpo_item.po_id = tblics.ics_po_id', 'left');
        $this->db->join('tblpar', 'tblpo_item.po_id = tblpar.par_po_id', 'left');
        $this->db->where('md5(tblpo_item.po_id)', $po_id);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function get_poitemListrow($po_id)
    {
        $this->db->select('tblics.ics_no,tblpar.par_no, tblpo_item.*');
        $this->db->from('tblpo_item');
        $this->db->join('tblics', 'tblpo_item.po_id = tblics.ics_po_id', 'left');
        $this->db->join('tblpar', 'tblpo_item.po_id = tblpar.par_po_id', 'left');
        $this->db->where('md5(tblpo_item.po_id)', $po_id);
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return array();
        }
    }
    
//    public function get_poitemList($po_id)
//     {
//         $this->db->select('*');
//         $this->db->from('tblpo_item');
//         $this->db->where('md5(po_id)', $po_id);
//         $query = $this->db->get();
//         if ($query->num_rows() > 0) {
//             return $query->result();
//         } else {
//             return array();
//         }
//     }
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
    public function get_iarproperty_no($iarPoID)
    {
        $this->db->select('*');
        $this->db->from('tblpo_item');
        $this->db->where('md5(po_id)', $iarPoID);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }
    public function get_icsdetails_by_id($icsID)
    {
        $this->db->where('md5(ics_id)', $icsID);
        $query = $this->db->get('tblics');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function get_icsitemList($icsPoID)
    {
        $this->db->select('*');
        $this->db->from('tblpo_item');
        $this->db->where('md5(po_id)', $icsPoID);
        // $this->db->where('unit_cost >', 1500);
        $this->db->where('unit_cost <=', 49999);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    // public function viewPARNo_only()
    // {
    //     $this->db->select('*');
    //     $this->db->from('tblpar');
    //     $query = $this->db->get();
    //     if ($query->num_rows() > 0) {
    //         return $query->result();
    //     } else {
    //         return array();
    //     }
    // }
    public function viewPARtable()
    {
        $this->db->distinct();
        $this->db->select('par_id,par_po_id,par_no, par_iarno, par_fund, par_supplier');
        $this->db->from('tblpar');
        $this->db->join('tblpo_item', 'tblpar.par_po_id = tblpo_item.po_id');
        $this->db->where('tblpo_item.unit_cost >=', 50000);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function get_pardetails_by_id($parID)
    {
        $this->db->where('md5(par_id)', $parID);
        $query = $this->db->get('tblpar');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function get_paritemList($parPoID)
    {
        $this->db->select('*');
        $this->db->from('tblpo_item');
        $this->db->where('md5(po_id)', $parPoID);
        $this->db->where('unit_cost >=', 50000);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function getRSEPI()
    {
        $this->db->select('tblpo_item.*, tblics.*, tblics_rsepi.*');
        $this->db->join('tblics', 'tblpo_item.po_id = tblics.ics_po_id', 'inner');
        $this->db->join('tblics_rsepi', 'tblpo_item.id = tblics_rsepi.id_tblpo_item', 'inner');
        $this->db->where('tblpo_item.unit_cost <=', 49999);
        $rsepidata = $this->db->get('tblpo_item')->result();
        return $rsepidata;
    }
    public function getRSEPIPAR()
    {
        $this->db->select('tblpo_item.*, tblpar.*, tblics_rsepi.*');
        $this->db->join('tblpar', 'tblpo_item.po_id = tblpar.par_po_id', 'inner');
        $this->db->join('tblics_rsepi', 'tblpo_item.id = tblics_rsepi.id_tblpo_item', 'inner');
        $this->db->where('tblpo_item.unit_cost >=', 50000);
        $rsepidata = $this->db->get('tblpo_item')->result();
        return $rsepidata;
    }

    public function viewSEPCtable()
    {
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('tblpo');
        $this->db->join('tblpo_item', 'tblpo.po_id = tblpo_item.po_id');
        $this->db->join('tblics', 'tblpo.po_id = tblics.ics_po_id');
        $this->db->where('tblpo_item.unit_cost <=', 49999);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_sepcitemList($sepcPoID,$id)
    {
        $this->db->select('*');
        $this->db->from('tblpo_item');
        $this->db->join('tblics', 'tblpo_item.po_id = tblics.ics_po_id');
        $this->db->where('md5(tblpo_item.po_id)', $sepcPoID); 
        $this->db->where('md5(tblpo_item.id)', $id); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    
    public function get_sepcdata($sepcPoID, $id)
    {
        $this->db->select('*');
        $this->db->from('tbl_icssepc');
        $this->db->join('tblpo_item', 'tbl_icssepc.id_tblpo_item = tblpo_item.po_id');
        $this->db->join('tblics', 'tbl_icssepc.id_tblpo_item = tblics.ics_po_id');
        $this->db->where('md5(tbl_icssepc.id_tblpo_item)', $sepcPoID); 
        $this->db->where('md5(tblpo_item.id)', $id); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_specificdata($id)
    {
        $this->db->select('*');
        $this->db->from('tblpo_item');
        $this->db->where('md5(id)', $id); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return row();
        }
    }

    public function viewPPEPCtable()
    {
        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('tblpo');
        $this->db->join('tblpo_item', 'tblpo.po_id = tblpo_item.po_id');
        $this->db->join('tblpar', 'tblpo.po_id = tblpar.par_po_id');
        $this->db->where('tblpo_item.unit_cost >=', 50000);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_ppepcitemList($ppepcPoID,$id)
    {
        $this->db->select('*');
        $this->db->from('tblpo_item');
        $this->db->join('tblpar', 'tblpo_item.po_id = tblpar.par_po_id');
        $this->db->where('md5(tblpo_item.po_id)', $ppepcPoID); 
        $this->db->where('md5(tblpo_item.id)', $id); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    
    public function get_ppepcdata($ppepcPoID, $id)
    {
        $this->db->select('*');
        $this->db->from('tbl_icssepc');
        $this->db->join('tblpo_item', 'tbl_icssepc.id_tblpo_item = tblpo_item.po_id');
        $this->db->join('tblpar', 'tbl_icssepc.id_tblpo_item = tblpar.par_po_id');
        $this->db->where('md5(tbl_icssepc.id_tblpo_item)', $ppepcPoID); 
        $this->db->where('md5(tblpo_item.id)', $id); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function get_specificppepcdata($id)
    {
        $this->db->select('*');
        $this->db->from('tblpo_item');
        $this->db->where('md5(id)', $id); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return row();
        }
    }
    public function getQuantityById($id) {
        $query = $this->db->get_where('tblpo_item', array('md5(id)' => $id));
        $row = $query->row();
        if ($row) {
            return $row->quantity;
        }
        return false; 
    }
    public function RgetQuantityById($id) {
        $query = $this->db->get_where('tblpo_item', array('md5(id)' => $id));
        $row = $query->row();
        if ($row) {
            return $row->remaining_quantity;
        }
        return false; 
    }
    public function yearShow()
    {
        $this->db->select('rspi_year, COUNT(*) as count');
        $this->db->from('tbl_icssepc');
        $this->db->join('tblpo_item', 'tbl_icssepc.id_tblpo_item = tblpo_item.po_id');
        $this->db->where('tblpo_item.unit_cost <=', 49999);
        $this->db->group_by('rspi_year');
        $this->db->order_by('rspi_year', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function monthShow()
    {
        $this->db->select('rspi_month, COUNT(*) as count');
        $this->db->from('tbl_icssepc');
        $this->db->join('tblpo_item', 'tbl_icssepc.id_tblpo_item = tblpo_item.po_id');
        $this->db->where('tblpo_item.unit_cost <=', 49999);
        $this->db->group_by('rspi_month');
        $this->db->order_by('rspi_month', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function propertyTypeShow()
    {
        $this->db->select('semi_expendable, COUNT(*) as count');
        $this->db->from('tbl_icssepc');
        $this->db->join('tblpo_item', 'tbl_icssepc.id_tblpo_item = tblpo_item.po_id');
        $this->db->where('tblpo_item.unit_cost <=', 49999);
        $this->db->group_by('semi_expendable');
        $this->db->order_by('semi_expendable', 'asc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function regspi_item()
    { 
        $this->db->select('tbl_icssepc.*,tblpo_item.*,tblics.*,tbliar.*'); 
        $this->db->join('tblpo_item', 'tbl_icssepc.ics_sepc_id = tblpo_item.id');
        $this->db->join('tblics', 'tblpo_item.po_id = tblics.ics_po_id');
        $this->db->join('tbliar', 'tblics.ics_po_id = tbliar.iar_po_id');
        $this->db->where('tblpo_item.unit_cost <=', 49999);
        $this->db->order_by('quantity_property_no', 'asc');
        $query = $this->db->get('tbl_icssepc');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }
    
    // public function get_monitoringsepcitemList($sepcPoID,$id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_icspcmonitoring');
    //     $this->db->where('md5(mpcid)', $id); 
    //     $query = $this->db->get();
    //     if ($query->num_rows() > 0) {
    //         return $query->result();
    //     } else {
    //         return array();
    //     }
    // }
    public function get_monitoringsepcdata($sepcPoID, $id)
    {
        $this->db->select('*');
        $this->db->from('tbl_icspcmonitoring');
        $this->db->join('tbl_icssepc', 'tbl_icspcmonitoring.mpcid = tbl_icssepc.pcid');
        // $this->db->join('tblics', 'tbl_icssepc.id_tblpo_item = tblics.ics_po_id');
        // $this->db->where('md5(tbl_icssepc.id_tblpo_item)', $sepcPoID); 
        // $this->db->where('md5(tblpo_item.id)', $id); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
    public function get_specificmonitoringdata($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_icssepc');
        $this->db->where('md5(pcid)', $id); 
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return row();
        }
    }
    public function rpcsep_item()
    { 
        $this->db->select('tblpo_item.*'); 
        $this->db->where('tblpo_item.unit_cost <=', 49999);
        $query = $this->db->get('tblpo_item');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }
    public function rpcppe_item()
    { 
        $this->db->select('tblpo_item.*'); 
        $this->db->where('tblpo_item.unit_cost >=', 50000);
        $query = $this->db->get('tblpo_item');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return [];
        }
    }


}
