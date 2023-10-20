<?php

class Post_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->model('Login_Model');
        $this->load->library('form_validation');
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
            $this->load->view('template/header', $data);
            $this->load->view('forms/iar');
            $this->load->view('template/footer');
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
} // End Bracket
