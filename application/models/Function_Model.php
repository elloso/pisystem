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
    public function getPoInfoById($po_id)
    {
        $this->db->where('po_id', $po_id);
        $query = $this->db->get('tblpo');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }
    public function getICSInfoById($ics_id)
    {
        $this->db->where('ics_id ', $ics_id);
        $query = $this->db->get('tblics');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function isPrIdExists($txtPRNumber)
    {
        $this->db->where("(pr_number = '$txtPRNumber')");
        $query = $this->db->get('tblpo');
        return $query->num_rows() > 0;
    }
    public function isPoIdExists($txtPONumber)
    {
        $this->db->where("(po_number = '$txtPONumber')");
        $query = $this->db->get('tblpo');
        return $query->num_rows() > 0;
    }
    public function isICSIdExists($txtICSnumber)
    {
        $this->db->where("(ics_no = '$txtICSnumber')");
        $query = $this->db->get('tblics');
        return $query->num_rows() > 0;
    }
    public function SubmitPoData($dataPO)
    {
        $this->db->insert('tblpo', $dataPO);
        return $this->db->insert_id();
    }
    public function SubmitPotoIarData($dataPotoIar)
    {
        $this->db->insert('tbliar', $dataPotoIar);
        return $this->db->insert_id();
    }
    public function SubmitPoItemData($itemData)
    {
        $this->db->insert('tblpo_item', $itemData);
        return $this->db->insert_id();
    }
    public function updateIARData($iar_po_number, $dataiar)
    {
        $this->db->where('iar_po_number', $iar_po_number);
        return $this->db->update('tbliar', $dataiar);
    }
    public function SubmitIARtoICSData($dataIARtoICS)
    {
        $this->db->insert('tblics', $dataIARtoICS);
        return $this->db->insert_id();
    }

    public function getUnitCosts($iar_po_id)
    {
        $this->db->select('unit_cost');
        $this->db->where('po_id', $iar_po_id);
        $query = $this->db->get('tblpo_item');

        $unitCosts = array(); // Initialize an array to store unit costs.

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $unitCosts[] = $row->unit_cost; // Add each unit cost to the array.
            }
        }

        return $unitCosts; // Return the array of unit costs.
    }


    public function SubmitIARtoPARData($dataIARtoPAR)
    {
        $this->db->insert('tblpar', $dataIARtoPAR);
        return $this->db->insert_id();
    }
    public function editIARData($iar_id, $editdataiar)
    {
        $this->db->where('iar_id', $iar_id);
        return $this->db->update('tbliar', $editdataiar);
    }
    public function editIARNOtoICSData($ics_id, $editdataiarnumbertoICS)
    {
        $this->db->where('ics_po_id', $ics_id);
        return $this->db->update('tblics', $editdataiarnumbertoICS);
    }
    public function SubmitupdatetIcs($data, $selectICSIARNo)
    {
        $this->db->where('ics_iar_no', $selectICSIARNo);
        return $this->db->update('tblics', $data);
    }
    public function updatePARData($par_iarno, $datapar)
    {
        $this->db->where('par_iarno', $par_iarno);
        return $this->db->update('tblpar', $datapar);
    }
    public function editPARData($par_id, $editdatapar)
    {
        $this->db->where('par_id', $par_id);
        return $this->db->update('tblpar', $editdatapar);
    }
    public function editPARtoPOItemData($par_poitem_id, $par_poitem_useful, $par_poitem_dacquired)
    {
        $this->db->where('id', $par_poitem_id);
        $this->db->update('tblpo_item', array('useful_life' => $par_poitem_useful, 'date_acquired' => $par_poitem_dacquired));
    }
    public function editICStoPOItemData($ics_poitem_id, $ics_poitem_useful, $txtDateacq)
    {
        $this->db->where('id', $ics_poitem_id);
        $this->db->update('tblpo_item', array('useful_life' => $ics_poitem_useful, 'date_acquired' => $txtDateacq));
    }
    public function editPOItemData($item_id, $itemNo)
    {
        $this->db->where('id', $item_id);
        $this->db->update('tblpo_item', array('item_no' => $itemNo));
    }
    public function editICSData($ics_id, $editdataics)
    {
        $this->db->where('ics_id', $ics_id);
        return $this->db->update('tblics', $editdataics);
    }
    public function deletePOData($delete_po_id)
    {
        $id = $delete_po_id;
        $this->db->where('md5(po_id)', $id);
        $this->db->delete('tblpo');

        $this->db->where('md5(iar_po_id)', $id);
        $this->db->delete('tbliar');

        $this->db->where('md5(ics_po_id)', $id);
        $this->db->delete('tblics');

        $this->db->where('md5(par_po_id)', $id);
        $this->db->delete('tblpar');

        $this->db->where('md5(po_id)', $id);
        $this->db->delete('tblpo_item');

        return $this->db->affected_rows();
    }
    // AJAX
    public function checkPoNumber($txtPONumber)
    {
        $this->db->where('po_number', $txtPONumber);
        $query = $this->db->get('tblpo');

        return $query->num_rows() > 0;
    }
    // AJAX
    public function checkPrNumber($txtPRNumber)
    {
        $this->db->where('pr_number', $txtPRNumber);
        $query = $this->db->get('tblpo');

        return $query->num_rows() > 0;
    }
    // AJAX
    public function checkIARNumber($txtIARNo)
    {
        $this->db->where('iar_number', $txtIARNo);
        $query = $this->db->get('tbliar');

        return $query->num_rows() > 0;
    }
    // AJAX
    public function checkInvoiceNumber($txtInvoice)
    {
        $this->db->where('invoice_number', $txtInvoice);
        $query = $this->db->get('tbliar');

        return $query->num_rows() > 0;
    }
    // AJAX
    public function checkICSNumber($txtICSNo)
    {
        $this->db->where('ics_no', $txtICSNo);
        $query = $this->db->get('tblics');

        return $query->num_rows() > 0;
    }
    // AJAX
    public function checkPARNumber($txtPARNo)
    {
        $this->db->where('par_no', $txtPARNo);
        $query = $this->db->get('tblpar');
        return $query->num_rows() > 0;
    }

    public function remove_poItem($idPoitem)
    {
        $this->db->where('md5(id)', $idPoitem);
        $this->db->delete('tblpo_item');
        return $this->db->affected_rows() > 0;
    }
}
