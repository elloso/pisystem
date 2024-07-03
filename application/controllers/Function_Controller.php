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
        $txtSpecificDescription = $this->input->post('txtSpecificItem');
        $txtDescription = $this->input->post('txtDescription');
        $txtItemUnitCost = $this->input->post('txtItemUnitCost');
        $txtUnit = $this->input->post('txtUnit');
        $txtTotalUnitCost = $this->input->post('txtTotalUnitCost');
        $txtPropNo = $this->input->post('txtPropNo');
        
        if (
            is_array($txtItemNo) && is_array($txtPropNo) && is_array($txtItemQuantity) && is_array($txtDescription) && is_array($txtItemUnitCost) && is_array($txtUnit) && is_array($txtTotalUnitCost) &&
            count($txtItemNo) === count($txtPropNo) && count($txtItemQuantity) === count($txtSpecificDescription) && count($txtItemQuantity) === count($txtDescription) && count($txtItemUnitCost) === count($txtUnit) && count($txtTotalUnitCost)
        ) {
            $count = count($txtItemNo);
            $currentYear = date('Y');
            $lastPropertyNumber = $this->Function_Model->getLastPropertyNumber();
        
            $propertyNumbers = array(); 
            $poIds = array(); 
        
            for ($i = 0; $i < $count; $i++) {
                $sequenceNumber = sprintf('%05d', intval(substr($lastPropertyNumber, -5)) + 1);
            
                if ($txtItemQuantity[$i] == 1) {
                    if($txtItemUnitCost[$i] <= 4999){
                        $propertyNumber = 'SLSU' . $currentYear . '-' . $sequenceNumber. 'LV';
                    }else{
                        $propertyNumber = 'SLSU' . $currentYear . '-' . $sequenceNumber. 'HV';
                    }
                } else {
                    if($txtItemUnitCost[$i] <= 4999){
                        $propertyNumber = 'SLSU' . $currentYear . '-' . $sequenceNumber . '-' . sprintf('%05d', intval(substr($lastPropertyNumber, -5)) + $txtItemQuantity[$i]). 'LV';
                    }else{
                        $propertyNumber = 'SLSU' . $currentYear . '-' . $sequenceNumber . '-' . sprintf('%05d', intval(substr($lastPropertyNumber, -5)) + $txtItemQuantity[$i]). 'HV'                             ;
                    }
                }
            
                $lastPropertyNumber = $propertyNumber;
            
                $propertyNumbers[] = $propertyNumber;
        
                $itemData = array(
                    'po_id' => $po_id,
                    'po_number' => $txtPONumber,
                    'pr_number' => $txtPRNumber,
                    'pgr_number' => $txtPGEFNumber,
                    'item_no' => $txtItemNo[$i],
                    'property_no' => $propertyNumber,
                    'quantity' => $txtItemQuantity[$i],
                    'remaining_quantity' => $txtItemQuantity[$i],
                    'unit' => $txtUnit[$i],
                    'specific_description' => $txtSpecificDescription[$i],
                    'item_description' => $txtDescription[$i],
                    'unit_cost' => $txtItemUnitCost[$i],
                    'total_unit_cost' => $txtTotalUnitCost[$i],
                    'useful_life' => "3 years",
                );
        
                $poId = $this->Function_Model->SubmitPoItemData($itemData);
                $poIds[] = $poId; 
            }
         
        } else {
            $this->session->set_flashdata('error', 'Insert Data Failed!');
            redirect(base_url('purchase'));
        }
        $this->session->set_flashdata('success', 'Insert Data Success!');
        redirect(base_url('purchase'));
    }
    public function deletepoItem($delPoItem)
    {
        if (!$delPoItem) {
            $this->session->set_flashdata('error', 'ID does not exist');
            echo '<script>window.history.back();</script>';
            return;
        }
        $result = $this->Function_Model->remove_poItem($delPoItem);
        if ($result) {
            $this->session->set_flashdata('success', 'Remove item success! click save to update the data!');
            echo '<script>window.history.back();</script>';
        } else {
            $this->session->set_flashdata('error', 'Remove item failed!');
            echo '<script>window.history.back();</script>';
        }
    }
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

            $unitCosts = $this->Function_Model->getUnitCosts($iar_po_id); 

            $icsCreated = false; 
            $parCreated = false; 

            foreach ($unitCosts as $unitCost) {
                if ($unitCost <= 50000) {
                    if (!$icsCreated) {
                        $dataIARtoICS = array(
                            'ics_po_id' => $iar_po_id,
                            'ics_iar_no' => $iar_iarnumber,
                            'ics_fund' => $iar_fundcluster,
                            'ics_supplier' => $iar_supplier
                        );

                        if ($this->Function_Model->updateIARData($iar_po_number, $IAR_Data) && $this->Function_Model->SubmitIARtoICSData($dataIARtoICS)) {
                            $icsCreated = true;
                        } else {
                            echo "Error Updating ICS";
                        }
                    }
                } elseif ($unitCost > 50000) {
                    if (!$parCreated) {
                        $dataIARtoPAR = array(
                            'par_po_id' => $iar_po_id,
                            'par_iarno' => $iar_iarnumber,
                            'par_fund' => $iar_fundcluster,
                            'par_supplier' => $iar_supplier
                        );
                        if ($this->Function_Model->updateIARData($iar_po_number, $IAR_Data) && $this->Function_Model->SubmitIARtoPARData($dataIARtoPAR)) {
                            $parCreated = true;
                        } else {
                            echo "Error Updating PAR";
                        }
                    }
                } else {
                    echo "Unit cost is not within the specified range (1500 - 50000).";
                }
            }

            if (!$icsCreated) {
                echo "No data within the ICS range (1500 - 50000).";
            }

            if (!$parCreated) {
                echo "No data above 50,000 for PAR.";
            }

            $this->session->set_flashdata('success', 'Data updated successfully.');
            redirect(base_url('inspection'));
        } else {
            redirect(base_url('login'));
        }
    }
    public function updatetIcs()
    {
        $selectICSIARNo = strip_tags($this->input->post('selectICSIARNo'));
        $txtICSNo = strip_tags($this->input->post('txtICSNo'));
        $txtReceivedby = strip_tags($this->input->post('txtReceivedby'));
        $txtDateRecivedBy = strip_tags($this->input->post('txtDateRecivedBy'));
        $txtReceivedfrom = strip_tags($this->input->post('txtReceivedfrom'));
        $txtDateInspectedFrom = strip_tags($this->input->post('txtDateInspectedFrom'));
        $txtICSDate = $this->input->post('txtICSDate');
        $txtrole = $this->input->post('txtRole');
        $data = array(
            'ics_no' => $txtICSNo,
            'ics_receivedby' => $txtReceivedby,
            'ics_received_date' => $txtDateRecivedBy,
            'ics_receivedfrom' => $txtReceivedfrom,
            'ics_receivedfrom_date' => $txtDateInspectedFrom,
            'ics_date' => $txtICSDate,
            'ics_position' => $txtrole,
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
        $txtPOItem_id = $this->input->post('txtPOItem_id');
        $txtItemNo = $this->input->post('txtItemNo');
        foreach ($txtPOItem_id as $key => $item_id) {
            $itemNo = $txtItemNo[$key];
            $this->Function_Model->editPOItemData($item_id, $itemNo);
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
        $UtxtItemNo = $this->input->post('UtxtItemNo');
        $UtxtItemQuantity = $this->input->post('UtxtItemQuantity');
        $UtxtUnit = $this->input->post('UtxtUnit');
        $UtxtDescriptionSpecific = $this->input->post('UtxtDescriptionSpecific');
        $UtxtDescription = $this->input->post('UtxtDescription');
        $UtxtItemUnitCost = $this->input->post('UtxtItemUnitCost');
        $UtxtStockProperty = $this->input->post('UtxtStockProperty');
        $UtxtTotalUnitCost = $this->input->post('UtxtTotalUnitCost');
        
        if (
            is_array($UtxtItemNo) && is_array($UtxtItemQuantity) && is_array($UtxtUnit) && is_array($UtxtDescriptionSpecific) && is_array($UtxtDescription) && is_array($UtxtItemUnitCost) && is_array($UtxtStockProperty) && is_array($UtxtTotalUnitCost) && count($UtxtItemNo) === count($UtxtStockProperty) && count($UtxtItemQuantity) === count($UtxtUnit) && count($UtxtDescription) === count($UtxtItemUnitCost) && count($UtxtTotalUnitCost)
        ) {
            $count = count($UtxtItemNo);
            $currentYear = date('Y');
            $lastPropertyNumber = $this->Function_Model->getLastPropertyNumber(); 
        
            for ($i = 0; $i < $count; $i++) {
                $formattedItemNumber = sprintf('%05d', $UtxtItemNo[$i]);
                $formattedQuantity = sprintf('%05d', $UtxtItemQuantity[$i]);
                $propertyNumber = 'SLSU' . $currentYear . '-' . sprintf('%05d', intval(substr($lastPropertyNumber, -5)) + 1) . '-' . sprintf('%05d', intval(substr($lastPropertyNumber, -5)) + $UtxtItemQuantity[$i]);
        
                $lastPropertyNumber = $propertyNumber;
        
                $itemData = array(
                    'po_id' => $po_id,
                    'po_number' => $txtPONumber,
                    'pr_number' => $txtPRNumber,
                    'pgr_number' => $txtPGEFNumber,
                    'item_no' => $UtxtItemNo[$i],
                    'property_no' => $propertyNumber,
                    'quantity' => $UtxtItemQuantity[$i],    
                    'remaining_quantity' => $UtxtItemQuantity[$i],
                    'unit' => $UtxtUnit[$i],
                    'specific_description' => $UtxtDescriptionSpecific[$i],
                    'item_description' => $UtxtDescription[$i],
                    'unit_cost' => $UtxtItemUnitCost[$i],
                    'total_unit_cost' => $UtxtTotalUnitCost[$i],
                    'useful_life' => "3 years",
                );
        
                $this->db->where('po_id', $po_id);
                $this->db->insert('tblpo_item', $itemData);
                $this->session->set_flashdata('info-success', 'Item successfully added! Please click save to update the data');
                echo '<script>window.history.back();</script>';
            }
        
        } else {
            $this->session->set_flashdata('error', 'Insert Data Failed!');
            echo '<script>window.history.back();</script>';
        }
        $this->db->where('po_id', $po_id);
        $this->db->update('tblpo_item', $dataItem);
        $this->db->where('iar_po_id', $po_id);
        $this->db->update('tbliar', $dataPotoIar);
        $this->db->where('po_id', $po_id);
        $this->db->update('tblpo', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data updated successfully!');
        } else {
            $this->session->set_flashdata('info-error', 'No changes have occurred.');
        }
        echo '<script>window.history.back();</script>';
    }
    public function updateicsDetails()
    {
        $ics_id = $this->input->post('icsid');
        $txtIarno = strip_tags($this->input->post('txtIarno'));
        $txtICSDate = $this->input->post('txtICSDate');
        $txtFund = strip_tags($this->input->post('txtFund'));
        $txtReceivedby = strip_tags($this->input->post('txtReceivedby'));
        $txtDateby = strip_tags($this->input->post('txtDateby'));
        $txtICSnumber = strip_tags($this->input->post('txtICSnumber'));
        $txtReceivedfrom = strip_tags($this->input->post('txtReceivedfrom'));
        $txtdatefrom = strip_tags($this->input->post('txtdatefrom'));
        $icsTotalCost = strip_tags($this->input->post('icsTotalCost'));
        $currentPoInfo = $this->Function_Model->getICSInfoById($ics_id);
        $ics_poitem_ids = $this->input->post('txtPOItem_id');
        $ics_poitem_usefuls = $this->input->post('txtPOItem_useful');
        $txtDateacquired = $this->input->post('txtDateacq');
        if ($txtICSnumber !== $currentPoInfo['ics_no']) {
            if ($this->Function_Model->isICSIdExists($txtICSnumber)) {
                $this->session->set_flashdata('trn-error', 'ICS number already exists!');
                echo '<script>window.history.back();</script>';
                return;
            }
        }
        $ICS_editData = array(
            'ics_fund' => $txtFund,
            'ics_no' => $txtICSnumber,
            'ics_date' => $txtICSDate,
            'ics_receivedby' => $txtReceivedby,
            'ics_received_date' => $txtDateby,
            'ics_receivedfrom' => $txtReceivedfrom,
            'ics_receivedfrom_date' => $txtdatefrom,
            'ics_total_cost' => $icsTotalCost
        );

        foreach ($ics_poitem_ids as $key => $ics_poitem_id) {
            $ics_poitem_useful = $ics_poitem_usefuls[$key];
            $txtDateacq = $txtDateacquired[$key];
            $this->Function_Model->editICStoPOItemData($ics_poitem_id, $ics_poitem_useful, $txtDateacq);
        }
        if ($this->Function_Model->editICSData($ics_id, $ICS_editData)) {
            $this->session->set_flashdata('success', 'Data updated successfully.');
            echo '<script>window.history.back();</script>';
        } else {
            echo "Error Updating";
        }
        // $this->db->where('ics_id ', $ics_id);
        // $this->db->update('tblics', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Data update failed!');
        }
        echo '<script>window.history.back();</script>';
    }
    public function editItemDetails()
    {
        $mtxtTotalCost = $this->input->post('mtxtTotalCost');
        $txtPo_id = $this->input->post('txtPo_id');
        $id = $this->input->post('id');
        $quantity = $this->input->post('quantity');
        $unit = $this->input->post('unit');
        $description = $this->input->post('description');
        $unit_cost = $this->input->post('unit_cost');
        $property_no = $this->input->post('property_no');
        $total_unit_cost = $this->input->post('total_unit_cost');
        $data = array(
            'quantity' => $quantity,
            'unit' => $unit,
            'item_description' => $description,
            'unit_cost' => $unit_cost,
            'property_no' => $property_no,
            'total_unit_cost' => $total_unit_cost
        );
        $dataTotalCost = array(
            'total_cost' => $mtxtTotalCost
        );
        $this->db->where('po_id', $txtPo_id);
        $this->db->update('tblpo', $dataTotalCost);
        $this->db->where('id', $id);
        $this->db->update('tblpo_item', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('info-success', 'Click save if unit or unit cost are updated');
            echo '<script>window.history.back();</script>';
        } else {
            $this->session->set_flashdata('info-error', 'No changes have occurred!');
            echo '<script>window.history.back();</script>';
        }
    }
    public function edit_IARDetails()
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

            if ($this->Function_Model->editIARData($iar_id, $editdataiar) || $this->Function_Model->editIARNOtoICSData($iar_ics_id, $editdataIARtoICS)) {
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data updated successfully.');
                } else {
                    $this->session->set_flashdata('info-error', 'No changes have occurred.');
                }
                echo '<script>window.history.back();</script>';
            } else {
                echo "Error Updating";
            }
        } else {
            redirect(base_url('login'));
        }
    }
    public function updateData_PAR()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $par_po_number = $this->input->post('selectPARIARNo');

            $par_updatenumber = $this->input->post('txtPARNo');
            $par_updatedate = $this->input->post('txtPARDate');
            $par_updatereceivedby = $this->input->post('txtReceivedby');
            $par_updatepar_receivedby_date = $this->input->post('txtDateRecivedBy');
            $par_updatereceived_from = $this->input->post('txtReceivedfrom');
            $par_updatedatereceived_from = $this->input->post('txtDateReceivedfrom');
            $par_position = $this->input->post('txtRole');

            $PAR_Data = array(
                'par_no' => $par_updatenumber,
                'par_date' => $par_updatedate,
                'par_receivedby' => $par_updatereceivedby,
                'par_received_date' => $par_updatepar_receivedby_date,
                'par_receivedfrom' => $par_updatereceived_from,
                'par_receivedfrom_date' => $par_updatedatereceived_from,
                'par_position' => $par_position
            );


            if ($this->Function_Model->updatePARData($par_po_number, $PAR_Data)) {
                $this->session->set_flashdata('success', 'Data updated successfully.');
                redirect(base_url('acknowledgement'));
            } else {
                echo "Error Updating";
            }
        } else {
            redirect(base_url('login'));
        }
    }
    public function editData_PAR()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $par_id = $this->input->post('par_id');
            $par_editenumber = $this->input->post('txtPARnumber');
            $par_editfund = $this->input->post('txtFund');
            $par_editreceivedby = $this->input->post('txtReceivedby');
            $par_editpar_receivedby_date = $this->input->post('txtDateby');
            $par_editreceived_from = $this->input->post('txtReceivedfrom');
            $par_editdatereceived_from = $this->input->post('txtdatefrom');
            $parTotalCost = $this->input->post('parTotalCost');
            $par_poitem_ids = $this->input->post('txtPOItem_id');
            $par_poitem_usefuls = $this->input->post('txtPOItem_useful');
            $par_poitem_dacquireds = $this->input->post('txtDateAcquired');

            $PAR_editData = array(
                'par_no' => $par_editenumber,
                'par_fund' => $par_editfund,
                'par_receivedby' => $par_editreceivedby,
                'par_received_date' => $par_editpar_receivedby_date,
                'par_receivedfrom' => $par_editreceived_from,
                'par_receivedfrom_date' => $par_editdatereceived_from,
                'par_total_cost' => $parTotalCost
            );

            foreach ($par_poitem_ids as $key => $par_poitem_id) {
                $par_poitem_useful = $par_poitem_usefuls[$key];
                $par_poitem_dacquired = $par_poitem_dacquireds[$key];
                $this->Function_Model->editPARtoPOItemData($par_poitem_id, $par_poitem_useful, $par_poitem_dacquired);
            }

            if ($this->Function_Model->editPARData($par_id, $PAR_editData)) {
                $this->session->set_flashdata('success', 'Data updated successfully.');
                echo '<script>window.history.back();</script>';
            } else {
                echo "Error Updating";
            }
        }
    }
    public function deleteData_po_id($delete_po_id)
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $affected_rows = $this->Function_Model->deletePOData($delete_po_id);
            $this->session->set_flashdata('delete', 'Data deleted successfully.');
            redirect(base_url('purchase'));
        } else {
            redirect(base_url('login'));
        }
    }
    public function updateItem_return()
    {
        $idpo = $this->input->post('hidden_id_tblpo_item');
        $id = $this->input->post('hidden_pcid');
        $txtreturn = $this->input->post('returnedconfirmButton');
        $txtreturnname = $this->input->post('txtReturnedName');
        $itemId = $this->input->post('hidden_uniqueid'); 
    
        $Item_return = array(
            'Monitoring_Status' => $txtreturn,
            'returned_name' => $txtreturnname,
            'mnew_assignee' => NULL,
            'mquantity_reissued' => 0,
            'mquantity_returned' => 1,

        );
    
        $this->Function_Model->updateItemReturn($itemId, $Item_return);
        $this->session->set_flashdata('returned', 'Item was already returned.');
        redirect(base_url('sepc-monitoring/'.$idpo.'/'.$id));
        
    }
    public function updateItem_returnPAR()
    {
        $txtreturn = $this->input->post('returnedconfirmButton');
        $txtreturnname = $this->input->post('txtReturnedName');
        $itemId = $this->input->post('recordId'); 
    
        $Item_return = array(
            'remarks' => $txtreturn,
            'returned' => $txtreturnname
        );
    
        $this->Function_Model->updateItemReturn($itemId, $Item_return);
        $this->session->set_flashdata('returned', 'Item was already returned.');
        redirect(base_url('respi-par'));
        
    }
    public function updateItem_reissued()
    {
        $idpo = $this->input->post('hidden_id_tblpo_item');
        $id = $this->input->post('hidden_pcid');
        $itemId = $this->input->post('hidden_uniqueid');
        $txtreissued = $this->input->post('reissuedconfirmButton');
        $newname = $this->input->post('txtOfficeOfficerReissue');

        $ReissueDate = $this->input->post('txtReissueDate'); 
        $TransferType = $this->input->post('OptionTT'); 
        $Specify = $this->input->post('txtSpecify'); 
        $ITRno = $this->input->post('txtITRNo');    
        $Condition = $this->input->post('OptionCondiditon'); 
        $Reasontransfer = $this->input->post('txtReason'); 
        $Approved = $this->input->post('txtApproved'); 
        $ReleasedReissue = $this->input->post('txtReleased'); 
        $ReceivedReissue = $this->input->post('txtReceived'); 
        
        $Item_reissued = array(
            'Monitoring_Status' => $txtreissued,
            'mnew_assignee' => $newname,
            'date_transfer' => $ReissueDate,
            'transfer_type' => $TransferType,
            'others_type' => $Specify,
            'ITRNo' => $ITRno,
            'condition_inventory' => $Condition,
            'approvedby' => $Approved,
            'releaseby' => $ReleasedReissue,
            'receiveby' => $ReceivedReissue,
            'reason' => $Reasontransfer,
            'mquantity_reissued' => 1,
            'mquantity_returned' => 0,
            'returned_name' => null,
        );
    
        $this->Function_Model->updateItemReturn($itemId, $Item_reissued);
        $this->session->set_flashdata('reissued', 'Item already re-issued.');
        redirect(base_url('sepc-monitoring/'.$idpo.'/'.$id));
    }
    public function updateItem_reissuedPAR()
    {
        $txtreissued = $this->input->post('reissuedconfirmButton');
        $newname = $this->input->post('txtOfficeOfficerReissue');
        $itemId = $this->input->post('recordIdReissue'); 

        $ReissueDate = $this->input->post('txtReissueDate'); 
        $TransferType = $this->input->post('OptionTT'); 
        $Specify = $this->input->post('txtSpecify'); 
        $ITRno = $this->input->post('txtITRNo');    
        $Condition = $this->input->post('OptionCondiditon'); 
        $Reasontransfer = $this->input->post('txtReason'); 
        $Approved = $this->input->post('txtApproved'); 
        $ReleasedReissue = $this->input->post('txtReleased'); 
        $ReceivedReissue = $this->input->post('txtReceived'); 
        
    
        $Item_reissued = array(
            'remarks' => $txtreissued,
            'reissued' => $newname,
            'date_transfer' => $ReissueDate,
            'transfer_type' => $TransferType,
            'others_specifiy' => $Specify,
            'itr_no' => $ITRno,
            'condition_inventory' => $Condition,
            'approved' => $Approved,
            'released' => $ReleasedReissue,
            'received' => $ReceivedReissue,
            'reason_transfer' => $Reasontransfer
            
        );
    
        $this->Function_Model->updateItemReturn($itemId, $Item_reissued);
        $this->session->set_flashdata('reissued', 'Item already re-issued.');
        redirect(base_url('respi_par'));
    }
    public function updateItem_disposed()
    {
        $idpo = $this->input->post('hidden_id_tblpo_item');
        $id = $this->input->post('hidden_pcid');
        $itemId = $this->input->post('hidden_uniqueid');

        $txtdisposed = $this->input->post('txtDisposed');
        $reason = $this->input->post('txtReasonDisposal');
        $datedisposed = $this->input->post('txtDateDisposal');
    
        $Item_redisposed = array(
            'Monitoring_Status' => $txtdisposed,
            'disposal_reason' => $reason,
            'date_disposed' => $datedisposed,
            'mquantity_disposal' => 1,
            'mquantity_reissued' => 0,

        );
        $this->Function_Model->updateItemReturn($itemId, $Item_redisposed);
        $this->session->set_flashdata('dispose', 'Item already disposed.');
       redirect(base_url('sepc-monitoring/'.$idpo.'/'.$id));
    }
    public function updateItem_disposedPAR()
    {
        $txtdisposed = $this->input->post('txtDisposed');
        $reason = $this->input->post('txtReasonDisposal');
        $datedisposed = $this->input->post('txtDateDisposal');
        $itemId = $this->input->post('recordIdDisposed'); 
    
        $Item_redisposed = array(
            'remarks' => $txtdisposed,
            'disposal_reason' => $reason,
            'date_disposed' => $datedisposed
        );
        $this->Function_Model->updateItemReturn($itemId, $Item_redisposed);
        $this->session->set_flashdata('dispose', 'Item already disposed.');
        redirect(base_url('respi_par'));
    }
    public function insertSEPCData()
    {
        $encryptpoid = $this->input->post('hidden_po_id');
        $encrypttblpoid = $this->input->post('hidden_tblepoitem_id');
        $date = $this->input->post('txtDate');
        $po_id = $this->input->post('hidden_poid');
        $id = $this->input->post('hidden_id');
        $assignee = $this->input->post('txtAssignee');
        $quantity = $this->input->post('txtQuantity');
        $semiExpendable = $this->input->post('txtSemiExpendable');
        $txtRemarksFC= $this->input->post('txtRemarksFC');
        $O_propertyno = $this->input->post('hidden_property_no');
    
        $O_Quantity = $this->input->post('hidden_quantity');
        $R_Quantity = $this->input->post('hidden_rquantity');
        $UnitCost = $this->input->post('hidden_unitcost');

        $yearDate = date('Y');
        $monthDate = date('n');
    
        if($O_Quantity == $R_Quantity){
            $DeductQuantity1 = ($O_Quantity - $quantity);
        }else{
            $DeductQuantity1 = ($R_Quantity - $quantity);
        }

        $O_propertyno = $this->input->post('hidden_property_no');
        $range = explode('-', $O_propertyno);
        $start = intval($range[1]);
        $end = intval($range[2]);
        
        $last_property_number = $this->Function_Model->getLastPropertyNumberICS($id);
        
        if (!$last_property_number) {
            $next_start = $start;
            $next_end = $start + $quantity - 1;
        } else {
            $last_range = explode('-', $last_property_number);
            $last_end = intval($last_range[2]);
        
            $next_start = $last_end + 1;
            $next_end = $next_start + $quantity - 1;
        }
        
        if ($O_Quantity == 1) {
            if ($UnitCost <= 4999) {
                $Modified_propertyno = $range[0] . '-' . str_pad($next_start, 5, '0', STR_PAD_LEFT) . 'LV';
            } else {
                $Modified_propertyno = $range[0] . '-' . str_pad($next_start, 5, '0', STR_PAD_LEFT) . 'HV';
            }
        } else {
            if ($UnitCost <= 4999) {
                $Modified_propertyno = $range[0] . '-' . str_pad($next_start, 5, '0', STR_PAD_LEFT) . '-' . str_pad($next_end, 5, '0', STR_PAD_LEFT) . 'LV';
            } else {
                $Modified_propertyno = $range[0] . '-' . str_pad($next_start, 5, '0', STR_PAD_LEFT) . '-' . str_pad($next_end, 5, '0', STR_PAD_LEFT) . 'HV';
            }
        }
        
        if ($this->Function_Model->checkExistingRecord($id)) {
            $existingData = $this->Function_Model->getSemiExpendableData($id);
            $semiExpendable = $existingData['semi_expendable'];
            $txtRemarksFC = $existingData['remarksFC'];
        }
     
        $dataSEPC = array(
            'date' => $date,
            'id_tblpo_item' => $po_id,
            'ics_sepc_id' => $id,
            'assignee ' => $assignee,
            'issued_quantity ' => $quantity,
            'balance_quantity ' => $DeductQuantity1,
            'semi_expendable' => $semiExpendable,
            'quantity_property_no' => $Modified_propertyno,
            'rspi_month' => $monthDate,
            'rspi_year' => $yearDate,
            'remarksFC' => $txtRemarksFC,
        );
    
        $icssepc_id = $this->Function_Model->SubmitPotoSEPCData($dataSEPC);

        //Second Table
        if ($O_Quantity == 1) {
            $dataSEPCMonitoring = array(
                'mpcid' => $icssepc_id,
                'mid_tblpo_item' => $po_id,
                'mics_sepc_id' => $id,
                'mextracted_property' => $Modified_propertyno, 
            );
        
            $this->Function_Model->SubmitSEPCMonitoring($dataSEPCMonitoring);
        } else {
            $propertyNumbers = explode('-', $Modified_propertyno);
            $start_number = (int)$propertyNumbers[1];
            $end_number = (int)$propertyNumbers[2];
        
            for ($i = $start_number; $i <= $end_number; $i++) {
                if($UnitCost <= 4999){
                    $individual_property_no = $propertyNumbers[0] . '-' . str_pad($i, strlen($propertyNumbers[1]), '0', STR_PAD_LEFT).'LV';
                }else{
                    $individual_property_no = $propertyNumbers[0] . '-' . str_pad($i, strlen($propertyNumbers[1]), '0', STR_PAD_LEFT).'HV';

                }
                $dataSEPCMonitoring = array(
                    'mpcid' => $icssepc_id,
                    'mid_tblpo_item' => $po_id,
                    'mics_sepc_id' => $id,
                    'mextracted_property' => $individual_property_no,
                );
        
                $this->Function_Model->SubmitSEPCMonitoring($dataSEPCMonitoring);
            }
        }
        
        if($O_Quantity == $R_Quantity){
            $DeductQuantity = ($O_Quantity - $quantity);
        }else{
            $DeductQuantity = ($R_Quantity - $quantity);
        }
        $dataICS = array(
            'remaining_quantity' => $DeductQuantity,
            
        );
        $this->Function_Model->SubmitSEPCtoICSData($encrypttblpoid,$dataICS);
        $this->session->set_flashdata('success', 'Item was successfully assigned.');
        redirect(base_url('sepc-assignee/'.$encryptpoid.'/'.$encrypttblpoid));
    }

    public function insertPPEPCData()
    {
        $encryptpoid = $this->input->post('hidden_po_id');
        $encrypttblpoid = $this->input->post('hidden_tblepoitem_id');
        $date = $this->input->post('txtDate');
        $po_id = $this->input->post('hidden_poid');
        $id = $this->input->post('hidden_id');
        $assignee = $this->input->post('txtAssignee');
        $quantity = $this->input->post('txtQuantity');
        $semiExpendable = $this->input->post('txtSemiExpendable');
        $txtRemarksFC= $this->input->post('txtRemarksFC');
        $O_propertyno = $this->input->post('hidden_property_no');
    
        $O_Quantity = $this->input->post('hidden_quantity');
        $R_Quantity = $this->input->post('hidden_rquantity');
        $UnitCost = $this->input->post('hidden_unitcost');

        $yearDate = date('Y');
        $monthDate = date('n');
    
        if($O_Quantity == $R_Quantity){
            $DeductQuantity1 = ($O_Quantity - $quantity);
        }else{
            $DeductQuantity1 = ($R_Quantity - $quantity);
        }

        $O_propertyno = $this->input->post('hidden_property_no');
        $range = explode('-', $O_propertyno);
        $start = intval($range[1]);
        $end = intval($range[2]);

        $last_property_number = $this->Function_Model->getLastPropertyNumberICS($id);

        if (!$last_property_number) {
            $next_start = $start;
            $next_end = $start + $quantity - 1;
        } else {
            $last_range = explode('-', $last_property_number);
            $last_end = intval($last_range[2]);
            
            $next_start = $last_end + 1;
            $next_end = $next_start + $quantity - 1;
        }

        if ($O_Quantity == 1) {
            if ($UnitCost <= 4999) {
                $Modified_propertyno = $range[0] . '-' . str_pad($next_start, 5, '0', STR_PAD_LEFT) . 'LV';
            } else {
                $Modified_propertyno = $range[0] . '-' . str_pad($next_start, 5, '0', STR_PAD_LEFT) . 'HV';
            }
        } else {
            if ($UnitCost <= 4999) {
                $Modified_propertyno = $range[0] . '-' . str_pad($next_start, 5, '0', STR_PAD_LEFT) . '-' . str_pad($next_end, 5, '0', STR_PAD_LEFT) . 'LV';
            } else {
                $Modified_propertyno = $range[0] . '-' . str_pad($next_start, 5, '0', STR_PAD_LEFT) . '-' . str_pad($next_end, 5, '0', STR_PAD_LEFT) . 'HV';
            }
        }

        if ($this->Function_Model->checkExistingRecord($id)) {
            $existingData = $this->Function_Model->getSemiExpendableData($id);
            $semiExpendable = $existingData['semi_expendable'];
            $txtRemarksFC = $existingData['remarksFC'];
        }
    
        $dataSEPC = array(
            'date' => $date,
            'id_tblpo_item' => $po_id,
            'ics_sepc_id' => $id,
            'assignee ' => $assignee,
            'issued_quantity ' => $quantity,
            'balance_quantity ' => $DeductQuantity1,
            'semi_expendable' => $semiExpendable,
            'quantity_property_no' => $Modified_propertyno,
            'rspi_month' => $monthDate,
            'rspi_year' => $yearDate,
            'remarksFC' => $txtRemarksFC,
        );
    
        $parsepc_id = $this->Function_Model->SubmitPotoSEPCData($dataSEPC);
         //Second Table
         if ($O_Quantity == 1) {
            $dataSEPCMonitoring = array(
                'mpcid' => $parsepc_id,
                'mid_tblpo_item' => $po_id,
                'mics_sepc_id' => $id,
                'mextracted_property' => $Modified_propertyno,
            );
        
            $this->Function_Model->SubmitSEPCMonitoring($dataSEPCMonitoring);
        } else {
            $propertyNumbers = explode('-', $Modified_propertyno);
            $start_number = (int)$propertyNumbers[1];
            $end_number = (int)$propertyNumbers[2];
        
            for ($i = $start_number; $i <= $end_number; $i++) {
                if($UnitCost <= 4999){
                    $individual_property_no = $propertyNumbers[0] . '-' . str_pad($i, strlen($propertyNumbers[1]), '0', STR_PAD_LEFT).'LV';
                }else{
                    $individual_property_no = $propertyNumbers[0] . '-' . str_pad($i, strlen($propertyNumbers[1]), '0', STR_PAD_LEFT).'HV';
                }
                $dataSEPCMonitoring = array(
                    'mpcid' => $parsepc_id,
                    'mid_tblpo_item' => $po_id,
                    'mics_sepc_id' => $id,
                    'mextracted_property' => $individual_property_no,
                );
        
                $this->Function_Model->SubmitSEPCMonitoring($dataSEPCMonitoring);
            }
        }

        if($O_Quantity == $R_Quantity){
            $DeductQuantity = ($O_Quantity - $quantity);
        }else{
            $DeductQuantity = ($R_Quantity - $quantity);
        }
        $dataICS = array(
            'remaining_quantity' => $DeductQuantity,
            
        );
        $this->Function_Model->SubmitPPEPCtoICSData($encrypttblpoid,$dataICS);
        $this->session->set_flashdata('success', 'Item was successfully assigned.');
        redirect(base_url('ppepc-assignee/'.$encryptpoid.'/'.$encrypttblpoid));
    }

    public function Updatetblpoitem_wcc()
    {
        $txtHiddenID = strip_tags($this->input->post('hidden_tblpoitem_id'));
        $txtwhereabouts = strip_tags($this->input->post('txtWhereabouts'));
        $txtcondition = strip_tags($this->input->post('txtCondition'));
        $txtcustodian= strip_tags($this->input->post('txtCustodian'));

        $datatblpoitem_wcc = array(
            'whereabouts' => $txtwhereabouts,
            'condition_text' => $txtcondition,
            'custodian' => $txtcustodian,
        );

        $this->Function_Model->Updatetblpoitem_wcc($datatblpoitem_wcc,$txtHiddenID);
    
    }
    public function updateRPCSEPData()
    {
        $IDrpcsep = strip_tags($this->input->post('hidden_tblpoitem_id'));
        $Actualcount = strip_tags($this->input->post('txtactualCount'));
        $Whereabout = strip_tags($this->input->post('txtWhereabouts'));
        $Condition = strip_tags($this->input->post('txtCondition'));
        $Custodian= strip_tags($this->input->post('txtCustodian'));
        $RPCSEP_editData = array(
            'onhand_percount' => $Actualcount,
            'whereabouts' => $Whereabout,
            'condition_text' => $Condition,
            'custodian' => $Custodian,
        );
        $result = $this->Function_Model->editRPCSEPData($IDrpcsep,$RPCSEP_editData);
        if ($result) {
            $this->session->set_flashdata('success', 'Data updated successfully.');
            redirect(base_url('ReportRPCSEP'));
        } else {
            echo "Error Updating";
        }
    }
    public function updateRPCPPEData()
    {
        $IDrpcppe = strip_tags($this->input->post('hidden_tblpoitem_id'));
        $Actualcount = strip_tags($this->input->post('txtactualCount'));
        $Whereabout = strip_tags($this->input->post('txtWhereabouts'));
        $Custodian= strip_tags($this->input->post('txtCustodian'));
        $RPCPPE_editData = array(
            'onhand_percount' => $Actualcount,
            'whereabouts' => $Whereabout,
            'custodian' => $Custodian,
        );
        $result = $this->Function_Model->editRPCPPEData($IDrpcppe,$RPCPPE_editData);
        if ($result) {
            $this->session->set_flashdata('success', 'Data updated successfully.');
            redirect(base_url('ReportRPCPPE'));
        } else {
            echo "Error Updating";
        }
    }
    public function UpdateSupplyHead() {
        $result = $this->Function_Model->ChangeSupplyHead();
        if ( $result ) {
            $this->session->set_flashdata( 'success', 'New Supply Head Successfully Changed' );
        } else {
            $this->session->set_flashdata( 'error', 'Failed to Change Supply Head' );
        }
        redirect(base_url('account-list'));
    
    }
    public function addics_propertyname()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $newics_propertyname = $this->input->post('txtICSPropertyname');
            $dataICSPname = array(
                'P_NAME' => $newics_propertyname,
            );
            $this->Function_Model->SubmitICSPnameData($dataICSPname);
            $this->session->set_flashdata('success', 'New ICS Property name already Added.');
            redirect(base_url('data-list'));
        } else {
            redirect(base_url('login'));
        }
    }
    public function addpar_propertyname()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $newpar_propertyname = $this->input->post('txtPARPropertyname');
            $dataPARPname = array(
                'P_NAME' => $newpar_propertyname,
            );
            $this->Function_Model->SubmitPARPnameData($dataPARPname);
            $this->session->set_flashdata('success', 'New PAR Property name already Added.');
            redirect(base_url('data-list'));
        } else {
            redirect(base_url('login'));
        }
    }
    
    public function deleteics_propertyname_id($delete_icspnameid)
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $this->Function_Model->deleteICSPropertynameData($delete_icspnameid);
            $this->session->set_flashdata('delete', 'Data deleted successfully.');
            redirect(base_url('data-list'));
        } else {
            redirect(base_url('login'));
        }
    }
    public function deletepar_propertyname_id($delete_parpnameid)
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $this->Function_Model->deletePARPropertynameData($delete_parpnameid);
            $this->session->set_flashdata('delete', 'Data deleted successfully.');
            redirect(base_url('data-list'));
        } else {
            redirect(base_url('login'));
        }
    }
    public function uploadforms() {
        $this->load->library('upload');
        $forms_name = $this->input->post('txtforms');
        $forms_description = $this->input->post('txtformsdescription');
        $config['upload_path'] = 'assets/uploads/'; 
        $config['allowed_types'] = 'pdf|doc|docx|xlsx|xls'; 
    
        $this->upload->initialize($config);
    
        if ($this->upload->do_upload('forms_download')) {
            $upload_data = $this->upload->data();
            $forms_filename = $upload_data['file_name'];
    
            $data = array(
                'form' => $forms_name,
                'Description' => $forms_description,
                'file_form' => $forms_filename
            );
    
            if ($this->Function_Model->insert_form($data)) {
                $this->session->set_flashdata('success', 'New Forms successfully added.');
                redirect(base_url('data-list'));
            } else {
                $this->session->set_flashdata('error', 'New Forms denied.');
            }
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect(base_url('data-list')); 
        }
    }
    
    public function deleteforms_id($delete_forms)
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $file_name = $this->Function_Model->getFileName($delete_forms);
    
            if ($file_name) {
                $this->Function_Model->deleteFormsData($delete_forms);
                $file_path = FCPATH . 'assets/uploads/' . $file_name; // Adjust 'assets/uploads/' according to your directory structure
                
                if (file_exists($file_path)) {
                    if (unlink($file_path)) {
                        $this->session->set_flashdata('delete', 'Forms deleted successfully.');
                    } else {
                        $this->session->set_flashdata('error', 'Failed to delete file.');
                    }
                } else {
                    $this->session->set_flashdata('error', 'File not found on server.');
                }
                redirect(base_url('data-list'));
            } else {
                $this->session->set_flashdata('error', 'File not found for deletion.');
                redirect(base_url('data-list'));
            }
        } else {
            redirect(base_url('login'));
        }
    }
    
    
    // public function uploadforms() {
    //     $forms_name = $this->input->post('txtforms');
    //     $forms_description = $this->input->post('txtformsdescription');
    //     $forms_filename = $this->input->post('forms_dowload');

    //     $data = array(
    //         'form' => $forms_name,
    //         'Description' => $forms_description,
    //         'file_form' => $forms_filename
    //     );

    //     if ($this->Function_Model->insert_form($data)) {
    //         $this->session->set_flashdata('success', 'New Forms successfully added.');
    //         redirect(base_url('data-list'));
    //     } else {
    //         $this->session->set_flashdata('error', 'New Forms denied.');
    //     }
    // }
   
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
    // ajax
    public function checkIARNumber()
    {
        $txtIARNo = $this->input->post('txtIARNo');

        $this->load->model('Function_Model');
        $result = $this->Function_Model->checkIARNumber($txtIARNo);

        header('Content-Type: application/json');
        echo json_encode(array('exists' => $result));
    }
    // ajax
    public function checkInvoiceNumber()
    {
        $txtInvoice = $this->input->post('txtInvoice');

        $this->load->model('Function_Model');
        $result = $this->Function_Model->checkInvoiceNumber($txtInvoice);

        header('Content-Type: application/json');
        echo json_encode(array('exists' => $result));
    }
    // ajax
    public function checkICSNumber()
    {
        $txtICSNo = $this->input->post('txtICSNo');

        $this->load->model('Function_Model');
        $result = $this->Function_Model->checkICSNumber($txtICSNo);

        header('Content-Type: application/json');
        echo json_encode(array('exists' => $result));
    }
    // ajax
    public function checkPARNumber()
    {
        $txtPARNo = $this->input->post('txtPARNo');

        $this->load->model('Function_Model');
        $result = $this->Function_Model->checkPARNumber($txtPARNo);

        header('Content-Type: application/json');
        echo json_encode(array('exists' => $result));
    }
}
