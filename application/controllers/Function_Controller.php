<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Function_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Login_Model');
        $this->load->model('Function_Model');
    }
    public function generatePassword($genpas)
    {
        if (!$genpas) {
            $this->session->set_flashdata('error', 'User ID does not exist');
            redirect(base_url('account-list'));
            return;
        }
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&_";
        $password = substr(str_shuffle($chars), 0, 8);
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $result = $this->Function_Model->generate_password($genpas, $hash_password);
        if ($result) {
            $_SESSION['new_generated_password'] = $password;
            $this->session->set_flashdata('success', 'User new Password is: ' . $password);
            redirect(base_url('account-list'));
        } else {
            $this->session->set_flashdata('error', 'Generate password failed!');
            redirect(base_url('account-list'));
        }
    }
    public function deleteUser($rmvuser)
    {
        if (!$rmvuser) {
            $this->session->set_flashdata('error', 'User ID does not exist');
            redirect(base_url('account-list'));
            return;
        }
        $result = $this->Function_Model->remove_userModel($rmvuser);
        if ($result) {
            $this->session->set_flashdata('success', 'Remove user successful!');
            redirect('account-list');
        } else {
            $this->session->set_flashdata('error', 'Remove user failed!');
            redirect('account-list');
        }
    }
    public function updateAccount()
    {
        $id = $this->input->post('id');
        $first_name = $this->input->post('name');
        $last_name = $this->input->post('last_name');
        $result = $this->Function_Model->update_user_details($id, $first_name, $last_name);
        if ($result) {
            $this->session->set_flashdata('success', 'Profile updated successfully.');
            redirect(base_url('my-account'));
        } else {
            $this->session->set_flashdata('error', 'Profile update failed.');
            redirect(base_url('my-account'));
        }
    }
    // submit(save) form
    public function submitPo()
    {
        $po_id = $this->input->post('po_id');
        $txtSupplier = $this->input->post('txtSupplier');
        $txtPONumber = $this->input->post('txtPONumber');
        $txtDate = $this->input->post('txtDate');
        $txtMOP = $this->input->post('txtMOP');
        $txtPRNumber = $this->input->post('txtPRNumber');
        $txtPGEFNumber = $this->input->post('txtPGEFNumber');
        $txtTotaCost = $this->input->post('txtTotaCost');
        if ($this->Function_Model->isTransactionIdExists($txtPONumber, $txtPRNumber, $txtPGEFNumber)) {
            $this->session->set_flashdata('error', 'Transaction number already exists!');
            redirect(base_url('purchase'));
            return;
        }
        $dataPO = array(
            'po_id' => $po_id,
            'po_number' => $txtPONumber,
            'pr_number' => $txtPRNumber,
            'pgr_number ' => $txtPGEFNumber,
            'supplier' => $txtSupplier,
            'po_date' => $txtDate,
            'made_of_procurment ' => $txtMOP,
            'total_cost ' => $txtTotaCost
        );
        $this->Function_Model->SubmitPoData($dataPO);
        $txtItemNo = $this->input->post('txtItemNo');
        $txtItemQuantity = $this->input->post('txtItemQuantity');
        $txtDescription = $this->input->post('txtDescription');
        $txtItemUnitCost = $this->input->post('txtItemUnitCost');
        $txtUnit = $this->input->post('txtUnit');
        if (
            is_array($txtItemNo) && is_array($txtItemQuantity) && is_array($txtDescription) && is_array($txtItemUnitCost) && is_array($txtUnit) && count($txtItemNo) === count($txtItemQuantity) && count($txtDescription) === count($txtItemUnitCost)
        ) {
            $count = count($txtItemNo);
            for ($i = 0; $i < $count; $i++) {
                $itemData = array(
                    'po_id' => $po_id,
                    'po_number' => $txtPONumber,
                    'pr_number' => $txtPRNumber,
                    'pgr_number' => $txtPGEFNumber,
                    'item_no' => $txtItemNo[$i],
                    'quantity' => $txtItemQuantity[$i],
                    'unit' => $txtUnit[$i],
                    'item_description' => $txtDescription[$i],
                    'unit_cost' => $txtItemUnitCost[$i],
                );
                $this->Function_Model->SubmitPoItemData($itemData);
            }
        } else {
            $this->session->set_flashdata('error', 'Insert Data Failed!');
            redirect(base_url('purchase'));
        }
        $this->session->set_flashdata('success', 'Insert Data Success!');
        redirect(base_url('purchase'));
    }
    // submit(save) form

    public function insertData_IAR()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $iar_ponumber = $this->input->post('txtPONo');
            $iar_supplier = $this->input->post('txtSupplier');
            $iar_entityname = $this->input->post('txtEntityName');
            $iar_iarnumber = $this->input->post('txtIARNo');
            $iardate = $this->input->post('txtIARDate');
            $iar_invoicenumber = $this->input->post('txtInvoice');
            $iar_invoicedate = $this->input->post('txtInvoiceDate');
            $iar_fundcluster = $this->input->post('txtFundcluster');
            $iar_officedept = $this->input->post('txtMOPD');
            $iar_rcc = $this->input->post('txtRCC');
            $iar_inspectionOfficer = $this->input->post('txtInspectionOfficer');
            $iar_inspectionDate = $this->input->post('txtDateInspected');
            $iar_acceptance = $this->input->post('txtAccepted');
            $iar_acceptancedate = $this->input->post('txtAcceptedDate');

            $IAR_Data = array(
                'iar_po_number' => $iar_ponumber,
                'iar_supplier' => $iar_supplier,
                'entity_name' => $iar_entityname,
                'iar_number' => $iar_iarnumber,
                'iar_date' => $iardate,
                'invoice_number' => $iar_invoicenumber,
                'invoice_date' => $iar_invoicedate,
                'fund_cluster' => $iar_fundcluster,
                'office_dept' => $iar_officedept,
                'rcc' => $iar_rcc,
                'inspection_officer' => $iar_inspectionOfficer,
                'inspection_date' => $iar_inspectionDate,
                'acceptance_custodian' => $iar_acceptance,
                'acceptance_date' => $iar_acceptancedate
            );

            if ($this->Function_Model->insertIARData($IAR_Data)) {
                $this->session->set_flashdata('InsertedIARData', 'New Data successfully added.');
                redirect(base_url('inspection'));
            } else {
                echo"Error Uploading";
            }
    } else {
        redirect(base_url('login'));
    }

    }   

    public function updatepoDetails()
    {
        $poid = $this->input->post('poid');
        $po_id = $this->input->post('po_id');
        $txtSupplier = strip_tags($this->input->post('txtSupplier'));
        $txtPONumber = strip_tags($this->input->post('txtPONumber'));
        $txtDate = strip_tags($this->input->post('txtDate'));
        $txtMOP = strip_tags($this->input->post('txtMOP'));
        $txtPRNumber = strip_tags($this->input->post('txtPRNumber'));
        $txtPGEFNumber = strip_tags($this->input->post('txtPGEFNumber'));
        $txtTotalCost = strip_tags($this->input->post('txtTotalCost'));
        $data = array(
            'po_number' => $txtPONumber,
            'pr_number' => $txtPRNumber,
            'pgr_number' => $txtPGEFNumber,
            'supplier' => $txtSupplier,
            'po_date' => $txtDate,
            'made_of_procurment' => $txtMOP,
            'total_cost' => $txtTotalCost
        );
        $dataItem = array(
            'po_number' => $txtPONumber,
            'pr_number' => $txtPRNumber,
            'pgr_number' => $txtPGEFNumber
        );
        $this->db->where('po_id', $po_id);
        $this->db->update('tblpo_item', $dataItem);
        $this->db->where('po_id', $po_id);
        $this->db->update('tblpo', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Data update failed!');
        }
        echo '<script>window.history.back();</script>';
    }
}
