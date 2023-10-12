<?php

class PISystem_controller extends CI_Controller {

	public function index(){
		$this->load->view('login');
	}

	public function login_dashboard(){
		$this->load->view('dashboard');
		
	}
}
