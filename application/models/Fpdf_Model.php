<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fpdf_Model extends CI_Model
{
    public function fetchDataByPOID($poid) {
        $query = $this->db->query('SELECT * FROM tblpo_item WHERE po_id = ?', array($poid));
        return $query->row(); 
    }
}
