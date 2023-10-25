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
        $txtTotalCost = $this->input->post('txtTotalCost');

        $dataPO = array(
            'po_id' => $po_id,
            'po_number' => $txtPONumber,
            'pr_number' => $txtPRNumber,
            'pgr_number ' => $txtPGEFNumber,
            'supplier' => $txtSupplier,
            'po_date' => $txtDate,
            'made_of_procurment ' => $txtMOP,
            'total_cost ' => $txtTotalCost
        );
        $this->Function_Model->SubmitPoData($dataPO);
        $dataPotoIar = array(
            'iar_po_id' => $po_id,
            'iar_po_number' => $txtPONumber,
            'iar_supplier' => $txtSupplier
        );
        $this->Function_Model->SubmitPotoIarData($dataPotoIar);
        $txtItemNo = $this->input->post('txtItemNo');
        $txtItemQuantity = $this->input->post('txtItemQuantity');
        $txtDescription = $this->input->post('txtDescription');
        $txtItemUnitCost = $this->input->post('txtItemUnitCost');
        $txtUnit = $this->input->post('txtUnit');
        $txtTotalUnitCost = $this->input->post('txtTotalUnitCost');
        if (
            is_array($txtItemNo) && is_array($txtItemQuantity) && is_array($txtDescription) && is_array($txtItemUnitCost) && is_array($txtUnit) && is_array($txtTotalUnitCost) && count($txtItemNo) === count($txtItemQuantity) && count($txtDescription) === count($txtItemUnitCost) && count($txtUnit) === count($txtTotalUnitCost)
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
                    'total_unit_cost' => $txtTotalUnitCost[$i],
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
    public function updateData_IAR()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $iar_po_number = $this->input->post('txtPONo');
            $iar_supplier = $this->input->post('txtSupplier');
            $iar_po_id = $this->input->post('txtIARPOID');

            $iar_entityname = $this->input->post('txtEntityName');
            $iar_iarnumber = $this->input->post('txtIARNo');
            $iardate = $this->input->post('txtIARDate');
            $iar_invoicenumber = $this->input->post('txtInvoice');
            $iar_invoicedate = $this->input->post('txtInvoiceDate');
            $iar_fundcluster = $this->input->post('txtFundcluster');
            $iar_officedept = $this->input->post('txtOfficeDept');
            $iar_rcc = $this->input->post('txtRCC');
            $iar_inspectionOfficer = $this->input->post('txtInspectionOfficer');
            $iar_inspectionDate = $this->input->post('txtDateInspected');
            $iar_acceptance = $this->input->post('txtAccepted');
            $iar_acceptancedate = $this->input->post('txtAcceptedDate');
            $IAR_Data = array(
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
            $dataIARtoICS = array(
                'ics_po_id' => $iar_po_id,
                'ics_iar_no' => $iar_iarnumber,
                'ics_supplier' => $iar_supplier
            );
            $dataIARtoPAR = array(
                'par_po_id' => $iar_po_id,
                'par_iarno' => $iar_iarnumber,
                'par_supplier' => $iar_supplier
            );
            if ($this->Function_Model->updateIARData($iar_po_number, $IAR_Data) && $this->Function_Model->SubmitIARtoICSData($dataIARtoICS) && $this->Function_Model->SubmitIARtoPARData($dataIARtoPAR)) {
                $this->session->set_flashdata('success', 'Data updated successfully.');
                redirect(base_url('inspection'));
            } else {
                echo "Error Updating";
            }
        } else {
            redirect(base_url('login'));
        }
    }
    public function updatetIcs()
    {
        $selectICSIARNo = strip_tags($this->input->post('selectICSIARNo'));
        $txtICSFund = strip_tags($this->input->post('txtICSFund'));
        $txtICSNo = strip_tags($this->input->post('txtICSNo'));
        $txtUsefullife = strip_tags($this->input->post('txtUsefullife'));
        $txtReceivedby = strip_tags($this->input->post('txtReceivedby'));
        $txtDateRecivedBy = strip_tags($this->input->post('txtDateRecivedBy'));
        $txtReceivedfrom = strip_tags($this->input->post('txtReceivedfrom'));
        $txtDateInspectedFrom = strip_tags($this->input->post('txtDateInspectedFrom'));
        $txtICSDate = strip_tags($this->input->post('txtICSDate'));
        $data = array(
            'ics_no' => $txtICSNo,
            'ics_fund' => $txtICSFund,
            'ics_useful_life' => $txtUsefullife,
            'ics_receivedby' => $txtReceivedby,
            'ics_received_date' => $txtDateRecivedBy,
            'ics_receivedfrom' => $txtReceivedfrom,
            'ics_receivedfrom_date' => $txtDateInspectedFrom,
            'ics_date' => $txtICSDate
        );
        $result = $this->Function_Model->SubmitupdatetIcs($data, $selectICSIARNo);
        if ($result) {
            $this->session->set_flashdata('success', 'ICS successfully added.');
            echo '<script>window.history.back();</script>';
        } else {
            $this->session->set_flashdata('error', 'ICS update failed.');
            echo '<script>window.history.back();</script>';
        }
    }
    public function updatepoDetails()
    {
        $po_id = $this->input->post('po_id');
        $txtSupplier = strip_tags($this->input->post('txtSupplier'));
        $txtPONumber = strip_tags($this->input->post('txtPONumber'));
        $txtDate = strip_tags($this->input->post('txtDate'));
        $txtMOP = strip_tags($this->input->post('txtMOP'));
        $txtPRNumber = strip_tags($this->input->post('txtPRNumber'));
        $txtPGEFNumber = strip_tags($this->input->post('txtPGEFNumber'));
        $txtTotalCost = strip_tags($this->input->post('txtTotalCost'));
        $currentPoInfo = $this->Function_Model->getPoInfoById($po_id);
        if ($txtPONumber !== $currentPoInfo['po_number']) {
            if ($this->Function_Model->isPoIdExists($txtPONumber)) {
                $this->session->set_flashdata('trn-error', 'P.O. number already exists!');
                echo '<script>window.history.back();</script>';
                return;
            }
        }
        if ($txtPRNumber !== $currentPoInfo['pr_number']) {
            if ($this->Function_Model->isPrIdExists($txtPRNumber)) {
                $this->session->set_flashdata('trn-error', 'Purchase Request number already exists!');
                echo '<script>window.history.back();</script>';
                return;
            }
        }
        $data = array(
            'po_number' => $txtPONumber,
            'pr_number' => $txtPRNumber,
            'pgr_number' => $txtPGEFNumber,
            'supplier' => $txtSupplier,
            'po_date' => $txtDate,
            'made_of_procurment' => $txtMOP,
            'total_cost' => $txtTotalCost
        );
        $dataPotoIar = array(
            'iar_po_number' => $txtPONumber,
            'iar_supplier' => $txtSupplier,
        );
        $dataItem = array(
            'po_number' => $txtPONumber,
            'pr_number' => $txtPRNumber,
            'pgr_number' => $txtPGEFNumber
        );
        $this->db->where('po_id', $po_id);
        $this->db->update('tblpo_item', $dataItem);
        $this->db->where('iar_po_id', $po_id);
        $this->db->update('tbliar', $dataPotoIar);
        $this->db->where('po_id', $po_id);
        $this->db->update('tblpo', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Data update failed!');
        }
        echo '<script>window.history.back();</script>';
    }
    public function updateicsDetails()
    {
        $ics_id = $this->input->post('ics_id');
        $txtIarno = strip_tags($this->input->post('txtIarno'));
        $txtFund = strip_tags($this->input->post('txtFund'));
        $txtReceivedby = strip_tags($this->input->post('txtReceivedby'));
        $txtDateby = strip_tags($this->input->post('txtDateby'));
        $txtICSnumber = strip_tags($this->input->post('txtICSnumber'));
        $txtUsefullife = strip_tags($this->input->post('txtUsefullife'));
        $txtReceivedfrom = strip_tags($this->input->post('txtReceivedfrom'));
        $txtdatefrom = strip_tags($this->input->post('txtdatefrom'));
        $currentPoInfo = $this->Function_Model->getICSInfoById($ics_id);
        if ($txtICSnumber !== $currentPoInfo['ics_no']) {
            if ($this->Function_Model->isICSIdExists($txtICSnumber)) {
                $this->session->set_flashdata('trn-error', 'ICS number already exists!');
                echo '<script>window.history.back();</script>';
                return;
            }
        }
        $data = array(
            'ics_fund' => $txtFund,
            'ics_no' => $txtICSnumber,
            'ics_receivedby' => $txtReceivedby,
            'ics_received_date' => $txtDateby,
            'ics_useful_life' => $txtUsefullife,
            'ics_receivedfrom' => $txtReceivedfrom,
            'ics_receivedfrom_date' => $txtdatefrom
        );
        $this->db->where('ics_id ', $ics_id);
        $this->db->update('tblics', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Data update failed!');
        }
        echo '<script>window.history.back();</script>';
    }
    public function editItemDetails()
    {
        $id = $this->input->post('id');
        $quantity = $this->input->post('quantity');
        $unit = $this->input->post('unit');
        $description = $this->input->post('description');
        $unit_cost = $this->input->post('unit_cost');
        $total_unit_cost = $this->input->post('total_unit_cost');
        $data = array(
            'quantity' => $quantity,
            'unit' => $unit,
            'item_description' => $description,
            'unit_cost' => $unit_cost,
            'total_unit_cost' => $total_unit_cost
        );
        $this->db->where('id', $id);
        $result = $this->db->update('tblpo_item', $data);
        if ($result) {
            $this->session->set_flashdata('success', 'Update Data Successfully!');
            echo '<script>window.history.back();</script>';
        } else {
            $this->session->set_flashdata('error', 'Update Data Failed!');
            echo '<script>window.history.back();</script>';
        }
    }

    public function editIARDetails()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $iar_id = $this->input->post('txt_iar_id');
            $iar_ics_id = $this->input->post('txt_ics_id');

            // $iar_ics_number = $this->input->post('txtIARNo');
            $iar_editiarnumber = $this->input->post('edit_iarno');
            $iar_editdate = $this->input->post('edit_iardate');
            $iar_editinvoicenumber = $this->input->post('edit_invoice');
            $iar_editinvoicedate = $this->input->post('edit_invoicedate');
            $iar_editfundcluster = $this->input->post('edit_fundcluster');
            $iar_editofficedept = $this->input->post('edit_officedept');
            $iar_editrcc = $this->input->post('edit_rcc');
            $iar_editinspectionOfficer = $this->input->post('edit_inspectionofficer');
            $iar_editinspectionDate = $this->input->post('edit_dateinspected');
            $iar_editacceptance = $this->input->post('edit_acceptance');
            $iar_editacceptancedate = $this->input->post('edit_acceptancedate');

            $editdataiar = array(
                'iar_number' => $iar_editiarnumber,
                'iar_date' => $iar_editdate,
                'invoice_number' => $iar_editinvoicenumber,
                'invoice_date' => $iar_editinvoicedate,
                'fund_cluster' => $iar_editfundcluster,
                'office_dept' => $iar_editofficedept,
                'rcc' => $iar_editrcc,
                'inspection_officer' => $iar_editinspectionOfficer,
                'inspection_date' => $iar_editinspectionDate,
                'acceptance_custodian' => $iar_editacceptance,
                'acceptance_date' => $iar_editacceptancedate
            );

            $editdataIARtoICS = array(
                'ics_iar_no' => $iar_editiarnumber,
            );

            if ($this->Function_Model->editIARData($iar_id, $editdataiar) && $this->Function_Model->editIARNOtoICSData($iar_ics_id, $editdataIARtoICS)) {
                $this->session->set_flashdata('UpdatedIARData', 'Data updated successfully.');
                redirect(base_url('inspection'));
            } else {
                echo "Error Updating";
            }
        } else {
            redirect(base_url('login'));
        }
    }
    // ajax
    public function checkPoNumber()
    {
        $txtPONumber = $this->input->post('txtPONumber');

        $this->load->model('Function_Model');
        $result = $this->Function_Model->checkPoNumber($txtPONumber);

        header('Content-Type: application/json');
        echo json_encode(array('exists' => $result));
    }
    // ajax
    public function checkPrNumber()
    {
        $txtPRNumber = $this->input->post('txtPRNumber');

        $this->load->model('Function_Model');
        $result = $this->Function_Model->checkPrNumber($txtPRNumber);

        header('Content-Type: application/json');
        echo json_encode(array('exists' => $result));
    }
}
