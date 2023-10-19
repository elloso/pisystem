<?php

class Post_Controller extends CI_Controller{

    public function Dashboard(){
        $this->load->view('template/header');
        $this->load->view('dashboard');
        $this->load->view('template/footer');
    }
    public function PurchaseOrder(){
        $this->load->view('template/header');
        $this->load->view('forms/po');
        $this->load->view('template/footer');
    }

    public function InspectionAcceptance(){
        $this->load->view('template/header');
        $this->load->view('forms/iar');
        $this->load->view('template/footer');
    }

    public function PropertyAcknowledgement(){
        $this->load->view('template/header');
        $this->load->view('forms/pal');
        $this->load->view('template/footer');
    }

    public function InventoryCustodian(){
        $this->load->view('template/header');
        $this->load->view('forms/icl');
        $this->load->view('template/footer');
    }

    public function PropertyCard(){
        $this->load->view('template/header');
        $this->load->view('forms/pcl');
        $this->load->view('template/footer');
    }

    public function StockCard(){
        $this->load->view('template/header');
        $this->load->view('forms/stock');
        $this->load->view('template/footer');
    }


} // End Bracket
