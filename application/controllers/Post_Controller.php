<?php

class Post_Controller extends CI_Controller
{
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
            $data['PO_IARDatas'] = $this->Post_model->viewPOtable();
            $data['IARDatas'] = $this->Post_model->viewIAtable();
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
            $po_number = $this->input->post('po_number');
            $supplier_name = $this->Post_model->getSupplierNameByPONumber($po_number);
            echo json_encode(['supplier' => $supplier_name]);
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
            $data['userDetails'] = $userEmail;
            $this->load->view('template/header', $data);
            $this->load->view('forms/pc');
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
            $data['poitemList'] = $poitemList;
            $data['editpo_details'] = $editpo_details;
            $data['userDetails'] = $userEmail;
            $this->load->view('template/header', $data);
            $this->load->view('view-forms/editpo-details');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
} // End Bracket
