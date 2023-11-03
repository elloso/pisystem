

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fpdf_Model extends CI_Model
{
    public function fetchDataByPOID($poid)
    {
        $query = $this->db->query('SELECT * FROM tblpo_item WHERE po_id = ?', array($poid));
        return $query->row();
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
