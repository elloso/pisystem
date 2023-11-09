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
        $txtPropNo = $this->input->post('txtPropNo');
        if (
            is_array($txtItemNo) && is_array($txtPropNo) && is_array($txtItemQuantity) && is_array($txtDescription) && is_array($txtItemUnitCost) && is_array($txtUnit) && is_array($txtTotalUnitCost) && count($txtItemNo) === count($txtPropNo) && count($txtItemQuantity) === count($txtDescription) && count($txtItemUnitCost) === count($txtUnit) && count($txtTotalUnitCost)
        ) {
            $count = count($txtItemNo);
            for ($i = 0; $i < $count; $i++) {
                $itemData = array(
                    'po_id' => $po_id,
                    'po_number' => $txtPONumber,
                    'pr_number' => $txtPRNumber,
                    'pgr_number' => $txtPGEFNumber,
                    'item_no' => $txtItemNo[$i],
                    'property_no' => $txtPropNo[$i],
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

            $unitCosts = $this->Function_Model->getUnitCosts($iar_po_id); // Assuming you have a method to fetch an array of unit costs.

            $icsCreated = false; // Initialize a flag to track whether an ICS entry has been created.
            $parCreated = false; // Initialize a flag to track whether a PAR entry has been created.

            foreach ($unitCosts as $unitCost) {
                if ($unitCost >= 1500 && $unitCost <= 50000) {
                    if (!$icsCreated) {
                        $dataIARtoICS = array(
                            'ics_po_id' => $iar_po_id,
                            'ics_iar_no' => $iar_iarnumber,
                            'ics_supplier' => $iar_supplier
                        );

                        if ($this->Function_Model->updateIARData($iar_po_number, $IAR_Data) && $this->Function_Model->SubmitIARtoICSData($dataIARtoICS)) {
                            // Set the flag to true to indicate that an ICS entry has been created.
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
                            'par_supplier' => $iar_supplier
                        );
                        if ($this->Function_Model->updateIARData($iar_po_number, $IAR_Data) && $this->Function_Model->SubmitIARtoPARData($dataIARtoPAR)) {
                            // Set the flag to true to indicate that a PAR entry has been created.
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
        $txtICSFund = strip_tags($this->input->post('txtICSFund'));
        $txtICSNo = strip_tags($this->input->post('txtICSNo'));
        $txtReceivedby = strip_tags($this->input->post('txtReceivedby'));
        $txtDateRecivedBy = strip_tags($this->input->post('txtDateRecivedBy'));
        $txtReceivedfrom = strip_tags($this->input->post('txtReceivedfrom'));
        $txtDateInspectedFrom = strip_tags($this->input->post('txtDateInspectedFrom'));
        $txtICSDate = strip_tags($this->input->post('txtICSDate'));
        $data = array(
            'ics_no' => $txtICSNo,
            'ics_fund' => $txtICSFund,
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
        $UtxtDescription = $this->input->post('UtxtDescription');
        $UtxtItemUnitCost = $this->input->post('UtxtItemUnitCost');
        $UtxtStockProperty = $this->input->post('UtxtStockProperty');
        $UtxtTotalUnitCost = $this->input->post('UtxtTotalUnitCost');

        if (
            is_array($UtxtItemNo) && is_array($UtxtItemQuantity) && is_array($UtxtUnit) && is_array($UtxtDescription) && is_array($UtxtItemUnitCost) && is_array($UtxtStockProperty) && is_array($UtxtTotalUnitCost) && count($UtxtItemNo) === count($UtxtStockProperty) && count($UtxtItemQuantity) === count($UtxtUnit) && count($UtxtDescription) === count($UtxtItemUnitCost) && count($UtxtTotalUnitCost)
        ) {
            $count = count($UtxtItemNo);
            for ($i = 0; $i < $count; $i++) {
                $itemData = array(
                    'po_id' => $po_id,
                    'po_number' => $txtPONumber,
                    'pr_number' => $txtPRNumber,
                    'pgr_number' => $txtPGEFNumber,
                    'item_no' => $UtxtItemNo[$i],
                    'property_no' => $UtxtStockProperty[$i],
                    'quantity' => $UtxtItemQuantity[$i],
                    'unit' => $UtxtUnit[$i],
                    'item_description' => $UtxtDescription[$i],
                    'unit_cost' => $UtxtItemUnitCost[$i],
                    'total_unit_cost' => $UtxtTotalUnitCost[$i],
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
        $txtICSDate = strip_tags($this->input->post('txtICSDate'));
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
            $this->Function_Model->editICStoPOItemData($ics_poitem_id, $ics_poitem_useful);
        }
        if ($this->Function_Model->editICSData($ics_id, $ICS_editData)) {
            $this->session->set_flashdata('success', 'Data updated successfully.');
            echo '<script>window.history.back();</script>';
        } else {
            echo "Error Updating";
        }
        // $this->db->where('ics_id ', $ics_id);
        // $this->db->update('tblics', $data);
        // if ($this->db->affected_rows() > 0) {
        //     $this->session->set_flashdata('success', 'Data updated successfully!');
        // } else {
        //     $this->session->set_flashdata('error', 'Data update failed!');
        // }
        // echo '<script>window.history.back();</script>';
    }
    public function editItemDetails()
    {
        $txtTotalCost = $this->input->post('mtxtTotalCost');
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
            'total_cost' => $txtTotalCost
        );
        $this->db->where('po_id', $txtPo_id);
        $this->db->update('tblpo', $dataTotalCost);
        $this->db->where('id', $id);
        $this->db->update('tblpo_item', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('poedit-success', 'Click save if unit or unit cost are updated');
            echo '<script>window.history.back();</script>';
        } else {
            $this->session->set_flashdata('info', 'No changes have occurred!');
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

            if ($this->Function_Model->editIARData($iar_id, $editdataiar) && $this->Function_Model->editIARNOtoICSData($iar_ics_id, $editdataIARtoICS)) {
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data updated successfully.');
                } else {
                    $this->session->set_flashdata('info', 'No changes have occurred.');
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
            $par_updatefund = $this->input->post('txtPARFund');
            $par_updatereceivedby = $this->input->post('txtReceivedby');
            $par_updatepar_receivedby_date = $this->input->post('txtDateRecivedBy');
            $par_updatereceived_from = $this->input->post('txtReceivedfrom');
            $par_updatedatereceived_from = $this->input->post('txtDateReceivedfrom');

            $PAR_Data = array(
                'par_no' => $par_updatenumber,
                'par_date' => $par_updatedate,
                'par_fund' => $par_updatefund,
                'par_receivedby' => $par_updatereceivedby,
                'par_received_date' => $par_updatepar_receivedby_date,
                'par_receivedfrom' => $par_updatereceived_from,
                'par_receivedfrom_date' => $par_updatedatereceived_from
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
            $par_editdate = $this->input->post('txtPARDate');
            $par_editfund = $this->input->post('txtFund');
            $par_editreceivedby = $this->input->post('txtReceivedby');
            $par_editpar_receivedby_date = $this->input->post('txtDateby');
            $par_editreceived_from = $this->input->post('txtReceivedfrom');
            $par_editdatereceived_from = $this->input->post('txtdatefrom');
            $parTotalCost = $this->input->post('parTotalCost');
            $par_poitem_ids = $this->input->post('txtPOItem_id');
            $par_poitem_usefuls = $this->input->post('txtPOItem_useful');


            $PAR_editData = array(
                'par_no' => $par_editenumber,
                'par_date' => $par_editdate,
                'par_fund' => $par_editfund,
                'par_receivedby' => $par_editreceivedby,
                'par_received_date' => $par_editpar_receivedby_date,
                'par_receivedfrom' => $par_editreceived_from,
                'par_receivedfrom_date' => $par_editdatereceived_from,
                'par_total_cost' => $parTotalCost
            );

            foreach ($par_poitem_ids as $key => $par_poitem_id) {
                $par_poitem_useful = $par_poitem_usefuls[$key];
                $this->Function_Model->editPARtoPOItemData($par_poitem_id, $par_poitem_useful);
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
            if ($affected_rows > 0) {
                $this->session->set_flashdata('delete', 'Data deleted successfully.');
                redirect(base_url('purchase'));
            } else {
                // $this->session->set_flashdata('error', 'Data deleted successfully.');
            }
        } else {
            redirect(base_url('login'));
        }
    }
    // public function updatepoTotalDetails()
    // {
    //     $txtTotalCost = $this->input->post('txtTotalCost');
    //     $txtPo_id = $this->input->post('txtPo_id');
    //     $dataTotalCost = array(
    //         'total_cost' => $txtTotalCost
    //     );
    //     $this->db->where('po_id', $txtPo_id);
    //     $this->db->update('tblpo', $dataTotalCost);
    //     echo '<script>window.history.back();</script>';
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
