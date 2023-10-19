<?php

class Post_Controller extends CI_Controller
{

    public function Dashboard()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $this->load->view('template/header');
            $this->load->view('dashboard');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    public function PurchaseOrder()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $this->load->view('template/header');
            $this->load->view('forms/po');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }

    public function InspectionAcceptance()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $this->load->view('template/header');
            $this->load->view('forms/iar');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }

    public function PropertyAcknowledgement()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $this->load->view('template/header');
            $this->load->view('forms/pal');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }

    public function InventoryCustodian()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $this->load->view('template/header');
            $this->load->view('forms/icl');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }

    public function PropertyCard()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $this->load->view('template/header');
            $this->load->view('forms/pcl');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }

    public function StockCard()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $this->load->view('template/header');
            $this->load->view('forms/stock');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
    public function accountList()
    {
        if ($this->session->userdata('is_login') == TRUE) {
            $this->load->view('template/header');
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
            $this->load->view('template/header', $data);
            $this->load->view('accounts/change-password');
            $this->load->view('template/footer');
        } else {
            redirect(base_url('login'));
        }
    }
} // End Bracket
