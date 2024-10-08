<?php

class Post_Controller extends CI_Controller
{
    public function DashboardUser()
    {
        $this->load->view('dashboard2');
        
    }
    public function Downloadforms()
    {
        $data['forms'] = $this->Post_model->SPOforms();
        $this->load->view('downloadable',$data);
        
    }
    public function Dashboard()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $this->load->view('template/header', $data);
            $this->load->view('dashboard');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    public function PurchaseOrder()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['po_id'] = $this->Post_model->get_allPoList();
            $data['PODatas'] = $this->Post_model->viewPOtable();
            $data['userDetails'] = $userEmail;
            $this->load->view('template/header', $data);
            $this->load->view('forms/po');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    public function InspectionAcceptance()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $data['PO_IARDatas'] = $this->Post_model->viewIARtable();
            $data['IARDatas'] = $this->Post_model->viewIARtable();
            $data['HeadName'] = $this->Post_model->OfficialSupplyHead();
            $this->load->view('template/header', $data);
            $this->load->view('forms/iar');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    public function getSupplierName()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $po_number = $this->input->post('iar_po_number');
            $iardata = $this->Post_model->getSupplierNameByPONumber($po_number);
            echo json_encode(['iar_supplier' => $iardata->iar_supplier, 'iar_po_id' => $iardata->iar_po_id]);
        } else {
            redirect(base_url('login'));
        }
    }

    public function PropertyAcknowledgement()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $data['IAR_PARDatas'] = $this->Post_model->viewPARtable();
            $data['PARDatas'] = $this->Post_model->viewPARtable();
            $this->load->view('template/header', $data);
            $this->load->view('forms/par');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }

    public function InventoryCustodian()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $data['PO_ICSDatas'] = $this->Post_model->viewICStable();
            $data['S_Head'] = $this->Post_model->OfficialSupplyHead();
            $this->load->view('template/header', $data);
            $this->load->view('forms/ics');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }

    public function PropertyCard()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['PO_SEPCDatas'] = $this->Post_model->viewSEPCtable();
            $data['userDetails'] = $userEmail;
            $this->load->view('template/header', $data);
            $this->load->view('forms/sepc');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }

    public function PropertyCardPar()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['PO_PPEPCDatas'] = $this->Post_model->viewPPEPCtable();
            $data['userDetails'] = $userEmail;
            $this->load->view('template/header', $data);
            $this->load->view('forms/ppepc');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }

    public function StockCard()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $this->load->view('template/header', $data);
            $this->load->view('forms/sc');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }

    public function SuppliesLedgerCard()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $this->load->view('template/header', $data);
            $this->load->view('forms/slc');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    public function ReportPhysicalCountInventories()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $this->load->view('template/header', $data);
            $this->load->view('forms/rpci');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    public function myAccount()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $this->load->view('template/header', $data);
            $this->load->view('accounts/my-account');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    public function accountList()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['userlistResult'] = $this->Post_model->get_userlist();
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $data['HeadName'] = $this->Post_model->OfficialSupplyHead();
            $this->load->view('template/header', $data);
            $this->load->view('accounts/account-list');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }   
    public function changePassword()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $this->load->view('template/header', $data);
            $this->load->view('accounts/change-password');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    public function editpoDetails($editPodetails, $itemDetails)
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $editpo_details = $this->Post_model->get_podetails_by_id($editPodetails);
            $poitemList = $this->Post_model->get_poitemList($itemDetails);
            $poitemListrow = $this->Post_model->get_poitemListrow($itemDetails);
            $data['poitemList'] = $poitemList;
            $data['editpo_details'] = $editpo_details;
            $data['add_details'] = $poitemListrow;
            $data['userDetails'] = $userEmail;
            $this->load->view('template/header', $data);
            $this->load->view('view-forms/editpo-details');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    public function editiarDetails($editiardetails, $iarPoID)
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $editiardetails = $this->Post_model->get_iardetails_by_id($editiardetails);
            $iaritemList = $this->Post_model->get_iaritemList($iarPoID);
            $iarpropertyno = $this->Post_model->get_iarproperty_no($iarPoID);
            $data['editiar_details'] = $editiardetails;
            $data['iar_details'] = $iaritemList;
            $data['iar_propertyno'] = $iarpropertyno;
            $this->load->view('template/header', $data);
            $this->load->view('view-forms/editiar-details');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));

        }
    }
    public function editicsDetails($editicsdetails, $icsPoID)
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $editicsdetails = $this->Post_model->get_icsdetails_by_id($editicsdetails);
            $icsitemList = $this->Post_model->get_icsitemList($icsPoID);
            $data['editicsdetails'] = $editicsdetails;
            $data['icsitemList'] = $icsitemList;
            $this->load->view('template/header', $data);
            $this->load->view('view-forms/editics-details');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    public function editparDetails($editpardetails, $parPoID)
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $editpardetails = $this->Post_model->get_pardetails_by_id($editpardetails);
            $paritemList = $this->Post_model->get_paritemList($parPoID);
            $data['editpar_details'] = $editpardetails;
            $data['par_details'] = $paritemList;
            $this->load->view('template/header', $data);
            $this->load->view('view-forms/editpar-details');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));

        }
    }
    public function viewRSEPI()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $data['RSEPIlists'] = $this->Post_model->regspi_item();
            $data['TypePropertys'] = $this->Post_model->propertyTypeShow();
            $data['Years'] = $this->Post_model->yearShow();
            $this->load->view('template/header', $data);
            $this->load->view('forms2/rsepi');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    public function fetch_data_by_pcid() {
        $ics_sepc_id = $this->input->post('pcid');
        $data['record'] = $this->Post_model->get_data_by_pcid($ics_sepc_id); 
        $data['datas'] = $this->Post_model->get_arraydata_by_pcid($ics_sepc_id); 
        $this->load->view('view-forms/show-rsepi', $data);
    }
    public function viewRSEPI_PAR()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $data['RSEPIlists'] = $this->Post_model->parregspi_item();
            $data['TypePropertys'] = $this->Post_model->PARPropertyTypeShow();
            $data['Years'] = $this->Post_model->yearShow();
            $this->load->view('template/header', $data);
            $this->load->view('forms2/rsepi_par', $data);
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    // public function viewRSEPI_PAR()
    // {
    //     if ($this->session->userdata('is_login') == TRUE) {
    //         $data['user_email'] = $this->session->userdata('email');
    //         $email = $data['user_email'];
    //         $userEmail = $this->Post_model->get_userDetails($email);
    //         $data['userDetails'] = $userEmail;
    //         $data['RSEPIlists'] = $this->Post_model->getRSEPIPAR();
    //         $this->load->view('template/header', $data);
    //         $this->load->view('forms2/rsepi_par', $data);
    //         $this->load->view('template/footer');
    //     } else {
    //         redirect(base_url('login'));
    //     }
    // }
    public function editsepcDetails($sepcPoID,$id)
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $data['spec_details'] =  $this->Post_model->get_sepcitemList($sepcPoID, $id);
            $data['spec_datas'] = $this->Post_model->get_sepcdata($sepcPoID, $id);
            $data['remaining'] = $this->Post_model->get_specificdata($id);
            $data['lists'] = $this->Post_model->ICSPropertyName();
            $this->load->view('template/header', $data);
            $this->load->view('view-forms/editsepc-details');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    public function editppepcDetails($ppepcPoID,$id)
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $data['ppepc_details'] = $this->Post_model->get_ppepcitemList($ppepcPoID,$id);
            $data['ppepc_datas'] = $this->Post_model->get_ppepcdata($ppepcPoID,$id);
            $data['remaining'] = $this->Post_model->get_specificppepcdata($id);
            $data['lists'] = $this->Post_model->PARPropertyName();
            $this->load->view('template/header', $data);
            $this->load->view('view-forms/editppepc-details');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));

        }
    }
    public function ReportSemiExpendable()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['Years'] = $this->Post_model->yearShow();
            $data['Months'] = $this->Post_model->monthShow();
            $data['userDetails'] = $userEmail;
            $this->load->view('template/header', $data);
            $this->load->view('forms/rspi');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    } 
    public function ReportPhysicalCount()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['Years'] = $this->Post_model->yearShow();
            // $data['Months'] = $this->Post_model->monthShow();
            $data['TypePropertys'] = $this->Post_model->propertyTypeShow();
            $data['RCSEPDatas'] = $this->Post_model->rpcsep_item();
            $data['userDetails'] = $userEmail;
            $this->load->view('template/header', $data);
            $this->load->view('forms2/rpcsep');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    } 
    public function editsepcMonitoringDetails($sepcPoID,$id)
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            // $data['spec_details'] =  $this->Post_model->get_monitoringsepcitemList($sepcPoID, $id);
            $data['spec_datas'] = $this->Post_model->get_monitoringsepcdata($sepcPoID, $id);
            $data['remaining'] = $this->Post_model->get_specificmonitoringdata($id);
            $data['userDetails'] = $userEmail;
            $this->load->view('template/header', $data);
            $this->load->view('view-forms/editsepcmonitoring-details');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    public function ReportPhysicalCountPPE()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['Years'] = $this->Post_model->yearShow();
            // $data['Months'] = $this->Post_model->monthShow();
            $data['TypePropertys'] = $this->Post_model->PARPropertyTypeShow();
            $data['RPCPPEDatas'] = $this->Post_model->rpcppe_item();
            $data['userDetails'] = $userEmail;
            $this->load->view('template/header', $data);
            $this->load->view('forms2/rpcppe');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    } 
    public function disposedlist()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $data['DisposedLists'] = $this->Post_model->disposedlist();
            $this->load->view('template/header', $data);
            $this->load->view('summary/disposed');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    public function accountablelist()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $data['CustodianLists'] = $this->Post_model->custodianlist();
            $this->load->view('template/header', $data);
            $this->load->view('summary/accountable');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    public function listdata()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $data['Datas'] = $this->Post_model->generalcustodianlist();
            $this->load->view('template/header', $data);
            $this->load->view('summary/accountablelist');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    public function dataList()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $data['userlistResult'] = $this->Post_model->get_userlist();
            $data['user_email'] = $this->session->userdata('email');
            $email = $data['user_email'];
            $userEmail = $this->Post_model->get_userDetails($email);
            $data['userDetails'] = $userEmail;
            $data['ICSDatas'] = $this->Post_model->ICSPropertynamelist();
            $data['PARDatas'] = $this->Post_model->PARPropertynamelist();
            $data['forms'] = $this->Post_model->SPOforms();
            $this->load->view('template/header', $data);
            $this->load->view('data_option/update_data');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }   
} // End Bracket
