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
        $this->load->view('forms/par');
        $this->load->view('template/footer');
    }

    public function InventoryCustodian(){
        $this->load->view('template/header');
        $this->load->view('forms/ics');
        $this->load->view('template/footer');
    }

    public function PropertyCard(){
        $this->load->view('template/header');
        $this->load->view('forms/pc');
        $this->load->view('template/footer');
    }

    public function StockCard(){
        $this->load->view('template/header');
        $this->load->view('forms/sc');
        $this->load->view('template/footer');
    }

    public function SuppliesLedgerCard(){
        $this->load->view('template/header');
        $this->load->view('forms/slc');
        $this->load->view('template/footer');
    }
    public function ReportPhysicalCountInventories(){
        $this->load->view('template/header');
        $this->load->view('forms/rpci');
        $this->load->view('template/footer');
    }


} // End Bracket
